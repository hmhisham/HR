<?php

namespace App\Http\Livewire\Backup;

use App\Models\Backup\Backup;
use Livewire\Component;
use ZipArchive;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class BackupManager extends Component
{
    public $backups;
    public $manualBackupPath;
    public $showModal = false;
    public $showRestoreModal = false;
    public $selectedBackup = null;
    public $backupPassword;
    public $restorePassword;
    public $backupType = 'manual';
    public $scheduleTime = '00:00';
    public $scheduleFrequency = 'daily';
    public $backupItems = ['files', 'database'];
    public $errorMessage = '';
    public $successMessage = '';

    protected $rules = [
        'manualBackupPath' => 'nullable|string',
        'backupPassword' => 'required|min:6',
        'backupType' => 'required|in:manual,automatic',
        'scheduleTime' => 'required_if:backupType,automatic',
        'scheduleFrequency' => 'required_if:backupType,automatic',
        'backupItems' => 'required|array|min:1'
    ];

    public function mount()
    {
        $this->backups = Backup::orderBy('created_at', 'desc')->get();
        $this->backupPassword = config('backup.default_password'); // كلمة المرور الافتراضية من ملف التكوين
        $this->manualBackupPath = config('backup.backup_path'); // مسار النسخ الاحتياطي من ملف التكوين
    }

    public function render()
    {
        return view('livewire.backup.backup-manager');
    }

    public function createBackup()
    {
        $this->validate();

        try {
            // إنشاء مسار النسخ الاحتياطي إذا لم يكن موجودًا
            $backupPath = $this->manualBackupPath ?: 'D:\Backups\HR';
            if (!is_dir($backupPath)) {
                if (!mkdir($backupPath, 0777, true)) {
                    $this->errorMessage = 'فشل في إنشاء مجلد النسخ الاحتياطي!';
                    return;
                }
            }

            $zipFileName = 'backup_' . date('Y-m-d_H-i-s') . '.zip';
            $zipFilePath = $backupPath . DIRECTORY_SEPARATOR . $zipFileName;

            // إنشاء ملف الزيب
            $zip = new ZipArchive();
            $zipStatus = $zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE);
            if ($zipStatus !== true) {
                $this->errorMessage = 'فشل في إنشاء ملف الضغط! خطأ رقم: ' . $zipStatus;
                \Log::error('فشل إنشاء ملف ZIP', ['error' => $zipStatus, 'path' => $zipFilePath]);
                return;
            }

            // تعيين كلمة المرور
            $zip->setPassword($this->backupPassword);

            // نسخ الملفات إذا تم اختيارها
            if (in_array('files', $this->backupItems)) {
                $folderPath = public_path('storage');
                if (is_dir($folderPath)) {
                    $files = new RecursiveIteratorIterator(
                        new RecursiveDirectoryIterator($folderPath, RecursiveDirectoryIterator::SKIP_DOTS)
                    );

                    foreach ($files as $file) {
                        $filePath = $file->getPathname();
                        $relativePath = str_replace($folderPath . DIRECTORY_SEPARATOR, '', $filePath);

                        // إضافة الملف مع التشفير
                        $zip->addFile($filePath, 'files/' . $relativePath);
                        $zip->setEncryptionName('files/' . $relativePath, ZipArchive::EM_AES_256);
                    }
                }
            }

            // نسخ قاعدة البيانات إذا تم اختيارها
            if (in_array('database', $this->backupItems)) {
                // استخراج معلومات قاعدة البيانات من ملف .env
                $dbName = env('DB_DATABASE');
                $dbUser = env('DB_USERNAME');
                $dbPassword = env('DB_PASSWORD');
                $dbHost = env('DB_HOST');

                // إنشاء ملف SQL مؤقت
                $tempSqlFile = storage_path('app/temp_backup.sql');

                // التحقق من وجود mysqldump
                $mysqldumpPath = env('MYSQLDUMP_PATH', '');
                if (empty($mysqldumpPath)) {
                    // محاولة العثور على mysqldump في المسارات الشائعة
                    $commonPaths = [
                        'C:\xampp\mysql\bin\mysqldump.exe',
                        'C:\wamp64\bin\mysql\mysql8.0.31\bin\mysqldump.exe',
                        'C:\wamp\bin\mysql\mysql5.7.36\bin\mysqldump.exe',
                        'C:\Program Files\MySQL\MySQL Server 8.0\bin\mysqldump.exe',
                        'C:\Program Files\MariaDB 10.6\bin\mysqldump.exe'
                    ];

                    foreach ($commonPaths as $path) {
                        if (file_exists($path)) {
                            $mysqldumpPath = $path;
                            break;
                        }
                    }
                }

                if (empty($mysqldumpPath)) {
                    \Log::error('أداة mysqldump غير موجودة. يرجى تحديد المسار الصحيح في ملف .env');
                    $this->errorMessage = 'فشل في إنشاء نسخة احتياطية من قاعدة البيانات: أداة mysqldump غير موجودة. يرجى تثبيت MySQL أو تحديد المسار الصحيح في ملف .env';
                    return;
                }

                // تنفيذ أمر mysqldump لإنشاء نسخة احتياطية من قاعدة البيانات
                $command = sprintf(
                    '"%s" --user=%s --password=%s --host=%s %s > %s',
                    $mysqldumpPath,
                    escapeshellarg($dbUser),
                    escapeshellarg($dbPassword),
                    escapeshellarg($dbHost),
                    escapeshellarg($dbName),
                    escapeshellarg($tempSqlFile)
                );

                // تسجيل الأمر المستخدم للتشخيص (مع إخفاء كلمة المرور للأمان)
                $logCommand = sprintf(
                    '"%s" --user=%s --password=*** --host=%s %s > %s',
                    $mysqldumpPath,
                    escapeshellarg($dbUser),
                    escapeshellarg($dbHost),
                    escapeshellarg($dbName),
                    escapeshellarg($tempSqlFile)
                );
                \Log::info('أمر mysqldump المستخدم', ['command' => $logCommand]);

                // تنفيذ الأمر مع توجيه الخطأ للتقاط رسائل الخطأ
                exec($command . ' 2>&1', $output, $returnVar);
                \Log::info('نتيجة أمر mysqldump', ['output' => $output, 'code' => $returnVar]);

                // التحقق من نجاح الأمر ووجود الملف
                if ($returnVar === 0 && file_exists($tempSqlFile) && filesize($tempSqlFile) > 0) {
                    // التحقق من محتوى الملف
                    $fileContent = trim(file_get_contents($tempSqlFile));
                    if ($fileContent === '') {
                        $this->errorMessage = 'فشل في إنشاء نسخة قاعدة البيانات - الملف الناتج فارغ!';
                        \Log::error('فشل في إنشاء نسخة قاعدة البيانات - الملف الناتج فارغ!');
                        unlink($tempSqlFile);
                        return;
                    }
                    // إضافة ملف SQL إلى الأرشيف مع التشفير
                    $zip->addFile($tempSqlFile, 'database/database_backup.sql');
                    $zip->setEncryptionName('database/database_backup.sql', ZipArchive::EM_AES_256);
                } else {
                    // تسجيل معلومات أكثر تفصيلاً عن الخطأ
                    $errorDetails = [
                        'return_code' => $returnVar,
                        'file_exists' => file_exists($tempSqlFile) ? 'نعم' : 'لا',
                        'file_size' => file_exists($tempSqlFile) ? filesize($tempSqlFile) : 0,
                        'output' => $output
                    ];
                    \Log::error('فشل في إنشاء نسخة احتياطية من قاعدة البيانات', $errorDetails);
                    $this->errorMessage = 'فشل في إنشاء نسخة احتياطية من قاعدة البيانات! كود الخطأ: ' . $returnVar;
                }
            }

            $zip->close();

            // حذف الملف المؤقت إذا كان موجودًا
            if (isset($tempSqlFile) && file_exists($tempSqlFile)) {
                unlink($tempSqlFile);
            }

            // حفظ معلومات النسخة الاحتياطية في قاعدة البيانات
            $fileSize = File::size($zipFilePath);
            $formattedSize = $this->formatFileSize($fileSize);

            $backup = new Backup();
            $backup->name = $zipFileName;
            $backup->file_path = $zipFilePath;
            $backup->size = $formattedSize;
            $backup->type = $this->backupType;
            $backup->status = 'success';
            $backup->password = $this->backupPassword;
            $backup->save();

            // إذا كان النسخ الاحتياطي تلقائيًا، أرسل بريدًا إلكترونيًا
            if ($this->backupType === 'automatic') {
                $this->sendBackupEmail($zipFilePath, $zipFileName);
            } else {
                $this->successMessage = 'تم إنشاء النسخة الاحتياطية بنجاح!';
            }

            // تحديث قائمة النسخ الاحتياطية وإعادة تعيين النموذج
            $this->backups = Backup::orderBy('created_at', 'desc')->get();
            $this->resetForm();
            $this->dispatchBrowserEvent('hideModal');
        } catch (\Exception $e) {
            $this->errorMessage = 'حدث خطأ: ' . $e->getMessage();
        }
    }

    public function downloadBackup($id)
    {
        $backup = Backup::find($id);
        if ($backup && file_exists($backup->file_path)) {
            return response()->download($backup->file_path);
        } else {
            $this->errorMessage = 'الملف غير موجود!';
        }
    }

    public function confirmRestore($id)
    {
        $this->selectedBackup = Backup::find($id);
        $this->showRestoreModal = true;
    }

    public function restoreBackup()
    {
        if (!$this->selectedBackup) {
            $this->errorMessage = 'لم يتم تحديد نسخة احتياطية!';
            return;
        }

        if ($this->restorePassword !== $this->selectedBackup->password) {
            $this->errorMessage = 'كلمة المرور غير صحيحة!';
            return;
        }

        try {
            $zipFilePath = $this->selectedBackup->file_path;

            if (!file_exists($zipFilePath)) {
                $this->errorMessage = 'ملف النسخة الاحتياطية غير موجود!';
                return;
            }

            $zip = new ZipArchive();
            if ($zip->open($zipFilePath) !== true) {
                $this->errorMessage = 'فشل في فتح ملف النسخة الاحتياطية!';
                return;
            }

            // تعيين كلمة المرور لفك التشفير
            $zip->setPassword($this->restorePassword);

            // استخراج الملفات إلى مجلد مؤقت
            $tempExtractPath = storage_path('app/temp_restore');
            if (!is_dir($tempExtractPath)) {
                mkdir($tempExtractPath, 0777, true);
            } else {
                // تنظيف المجلد المؤقت إذا كان موجودًا
                File::cleanDirectory($tempExtractPath);
            }

            // استخراج جميع الملفات
            if (!$zip->extractTo($tempExtractPath)) {
                $this->errorMessage = 'فشل في استخراج الملفات! تأكد من كلمة المرور.';
                $zip->close();
                return;
            }

            $zip->close();

            // استعادة الملفات إذا كانت موجودة
            $filesPath = $tempExtractPath . '/files';
            if (is_dir($filesPath)) {
                $storageDir = public_path('storage');
                // نسخ الملفات المستخرجة إلى مجلد التخزين
                File::copyDirectory($filesPath, $storageDir);
            }

            // استعادة قاعدة البيانات إذا كانت موجودة
            $databaseFile = $tempExtractPath . '/database/database_backup.sql';
            if (file_exists($databaseFile)) {
                // استخراج معلومات قاعدة البيانات من ملف .env
                $dbName = env('DB_DATABASE');
                $dbUser = env('DB_USERNAME');
                $dbPassword = env('DB_PASSWORD');
                $dbHost = env('DB_HOST');

                // تنفيذ أمر mysql لاستعادة قاعدة البيانات
                $command = "mysql --user={$dbUser} --password={$dbPassword} --host={$dbHost} {$dbName} < {$databaseFile}";
                exec($command, $output, $returnVar);

                if ($returnVar !== 0) {
                    $this->errorMessage = 'فشل في استعادة قاعدة البيانات!';
                    return;
                }
            }

            // تنظيف المجلد المؤقت
            File::deleteDirectory($tempExtractPath);

            $this->successMessage = 'تم استعادة النسخة الاحتياطية بنجاح!';
            $this->showRestoreModal = false;
            $this->selectedBackup = null;
            $this->restorePassword = '';
        } catch (\Exception $e) {
            $this->errorMessage = 'حدث خطأ أثناء الاستعادة: ' . $e->getMessage();
        }
    }

    public function deleteBackup($id)
    {
        $backup = Backup::find($id);
        if ($backup) {
            // حذف الملف الفعلي
            if (file_exists($backup->file_path)) {
                unlink($backup->file_path);
            }
            // حذف السجل من قاعدة البيانات
            $backup->delete();
            $this->successMessage = 'تم حذف النسخة الاحتياطية بنجاح!';
            $this->backups = Backup::orderBy('created_at', 'desc')->get();
        } else {
            $this->errorMessage = 'النسخة الاحتياطية غير موجودة!';
        }
    }

    private function sendBackupEmail($filePath, $fileName)
    {
        try {
            // إرسال البريد الإلكتروني مع مرفق النسخة الاحتياطية
            Mail::raw('مرفق نسخة احتياطية تلقائية من النظام.', function ($message) use ($filePath, $fileName) {
                $message->to('yasksalim@gmail.com')
                    ->subject('نسخة احتياطية تلقائية - ' . date('Y-m-d'))
                    ->attach($filePath, [
                        'as' => $fileName
                    ]);
            });

            // إضافة رسالة نجاح
            $this->successMessage = 'تم إنشاء النسخة الاحتياطية وإرسالها بالبريد الإلكتروني بنجاح!';
        } catch (\Exception $e) {
            // تسجيل الخطأ ولكن لا تمنع إكمال العملية
            $this->errorMessage = 'تم إنشاء النسخة الاحتياطية ولكن فشل إرسال البريد الإلكتروني: ' . $e->getMessage();
        }
    }

    private function formatFileSize($bytes)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= (1 << (10 * $pow));
        return round($bytes, 2) . ' ' . $units[$pow];
    }

    public function resetForm()
    {
        $this->showModal = false;
        $this->backupType = 'manual';
        $this->scheduleTime = '00:00';
        $this->scheduleFrequency = 'daily';
        $this->backupItems = ['files', 'database'];
        $this->errorMessage = '';
        $this->successMessage = '';
    }

    public function updatedShowModal()
    {
        if ($this->showModal) {
            $this->dispatchBrowserEvent('showModal');
        } else {
            $this->dispatchBrowserEvent('hideModal');
        }
    }
}

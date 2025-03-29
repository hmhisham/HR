<?php

namespace App\Console\Commands;

use App\Models\Backup\Backup;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use ZipArchive;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;

class AutoBackupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:auto';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'إنشاء نسخة احتياطية تلقائية وإرسالها بالبريد الإلكتروني';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('بدء عملية النسخ الاحتياطي التلقائي...');

        try {
            // إنشاء مسار النسخ الاحتياطي من ملف التكوين
            $backupPath = config('backup.backup_path');
            if (!is_dir($backupPath)) {
                if (!mkdir($backupPath, 0777, true)) {
                    $this->error('فشل في إنشاء مجلد النسخ الاحتياطي!');
                    \Illuminate\Support\Facades\Log::error('فشل في إنشاء مجلد النسخ الاحتياطي: ' . $backupPath);
                    return 1;
                }
            }

            $zipFileName = 'auto_backup_' . date('Y-m-d_H-i-s') . '.zip';
            $zipFilePath = $backupPath . DIRECTORY_SEPARATOR . $zipFileName;

            // كلمة المرور من ملف التكوين
            $zipPassword = config('backup.default_password');

            // إنشاء ملف الزيب
            $zip = new ZipArchive();
            if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
                $this->error('فشل في إنشاء ملف الضغط!');
                return 1;
            }

            // تعيين كلمة المرور
            $zip->setPassword($zipPassword);

            // نسخ الملفات
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

            // نسخ قاعدة البيانات
            // استخراج معلومات قاعدة البيانات من ملف .env
            $dbName = env('DB_DATABASE');
            $dbUser = env('DB_USERNAME');
            $dbPassword = env('DB_PASSWORD');
            $dbHost = env('DB_HOST');

            // إنشاء ملف SQL مؤقت
            $tempSqlFile = storage_path('app/temp_backup.sql');

            // تنفيذ أمر mysqldump لإنشاء نسخة احتياطية من قاعدة البيانات
            // استخدام مسار mysqldump المحدد في ملف .env إذا كان موجودًا
            $mysqldumpPath = env('MYSQLDUMP_PATH', '') ?: 'mysqldump';

            $command = sprintf(
                '%s --user=%s --password=%s --host=%s %s > %s',
                escapeshellarg($mysqldumpPath),
                escapeshellarg($dbUser),
                escapeshellarg($dbPassword),
                escapeshellarg($dbHost),
                escapeshellarg($dbName),
                escapeshellarg($tempSqlFile)
            );

            // تسجيل الأمر المستخدم للتشخيص (مع إخفاء كلمة المرور للأمان)
            $logCommand = sprintf(
                'mysqldump --user=%s --password=*** --host=%s %s > %s',
                escapeshellarg($dbUser),
                escapeshellarg($dbHost),
                escapeshellarg($dbName),
                escapeshellarg($tempSqlFile)
            );
            \Illuminate\Support\Facades\Log::info('أمر mysqldump المستخدم', ['command' => $logCommand]);

            // تنفيذ الأمر مع توجيه الخطأ للتقاط رسائل الخطأ
            exec($command . ' 2>&1', $output, $returnVar);
            \Illuminate\Support\Facades\Log::info('نتيجة أمر mysqldump', ['output' => $output, 'code' => $returnVar]);

            // التحقق من نجاح الأمر ووجود الملف
            if ($returnVar === 0 && file_exists($tempSqlFile) && filesize($tempSqlFile) > 0) {
                // التحقق من محتوى الملف
                $fileContent = trim(file_get_contents($tempSqlFile));
                if ($fileContent === '') {
                    $this->error('فشل في إنشاء نسخة قاعدة البيانات - الملف الناتج فارغ!');
                    \Illuminate\Support\Facades\Log::error('فشل في إنشاء نسخة قاعدة البيانات - الملف الناتج فارغ!');
                    unlink($tempSqlFile);
                    return 1;
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
                \Illuminate\Support\Facades\Log::error('فشل في إنشاء نسخة احتياطية من قاعدة البيانات', $errorDetails);
                $this->error('فشل في إنشاء نسخة احتياطية من قاعدة البيانات! كود الخطأ: ' . $returnVar);
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
            $backup->type = 'automatic';
            $backup->status = 'success';
            $backup->password = $zipPassword;
            $backup->save();

            // إرسال البريد الإلكتروني مع مرفق النسخة الاحتياطية
            $this->sendBackupEmail($zipFilePath, $zipFileName);

            $this->info('تم إنشاء النسخة الاحتياطية التلقائية بنجاح!');
            return 0;
        } catch (\Exception $e) {
            $this->error('حدث خطأ: ' . $e->getMessage());
            return 1;
        }
    }

    private function sendBackupEmail($filePath, $fileName)
    {
        try {
            // التحقق من إعدادات البريد الإلكتروني
            if (empty(config('mail.mailers.smtp.host')) || empty(config('mail.mailers.smtp.username')) || empty(config('mail.mailers.smtp.password'))) {
                $this->error('إعدادات البريد الإلكتروني غير مكتملة في ملف .env');
                return;
            }

            // إرسال البريد الإلكتروني مع مرفق النسخة الاحتياطية
            Mail::raw('مرفق نسخة احتياطية تلقائية من النظام.', function ($message) use ($filePath, $fileName) {
                $message->to(config('backup.email'))
                    ->subject('نسخة احتياطية تلقائية - ' . date('Y-m-d'))
                    ->attach($filePath, [
                        'as' => $fileName
                    ]);
            });
            $this->info('تم إرسال النسخة الاحتياطية بالبريد الإلكتروني بنجاح!');
        } catch (\Exception $e) {
            $this->error('فشل إرسال البريد الإلكتروني: ' . $e->getMessage());
            // كتابة الخطأ في ملف السجل
            \Illuminate\Support\Facades\Log::error('فشل إرسال البريد الإلكتروني للنسخة الاحتياطية: ' . $e->getMessage());
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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use ZipArchive;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use App\Models\Backup\Backup;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class BackupController extends Controller
{
    public function downloadBackup()
    {
        try {
            $folderPath = public_path('storage');

            if (!is_dir($folderPath)) {
                return response()->json(['error' => 'مجلد التخزين غير موجود!'], 404);
            }

            // تحديد المسار الذي سيتم حفظ النسخة الاحتياطية فيه
            $backupDirectory = 'D:\Backups\HR';
            if (!is_dir($backupDirectory)) {
                if (!mkdir($backupDirectory, 0777, true)) {
                    return response()->json(['error' => 'فشل في إنشاء مجلد النسخ الاحتياطي!'], 500);
                }
            }

            $zipFileName = 'backup_' . date('Y-m-d_H-i-s') . '.zip';
            $zipFilePath = $backupDirectory . DIRECTORY_SEPARATOR . $zipFileName;

            // تعيين كلمة السر
            $zipPassword = 'yas@1989';

            $zip = new ZipArchive();
            if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
                return response()->json(['error' => 'فشل في إنشاء ملف الضغط!'], 500);
            }

            $zip->setPassword($zipPassword);

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

            // نسخ قاعدة البيانات
            $dbName = env('DB_DATABASE');
            $dbUser = env('DB_USERNAME');
            $dbPassword = env('DB_PASSWORD');
            $dbHost = env('DB_HOST');

            // إنشاء ملف SQL مؤقت
            $tempSqlFile = storage_path('app/temp_backup.sql');

            // تنفيذ أمر mysqldump لإنشاء نسخة احتياطية من قاعدة البيانات
            $command = "mysqldump --user={$dbUser} --password={$dbPassword} --host={$dbHost} {$dbName} > {$tempSqlFile}";
            exec($command, $output, $returnVar);

            if ($returnVar === 0 && file_exists($tempSqlFile)) {
                // إضافة ملف SQL إلى الأرشيف مع التشفير
                $zip->addFile($tempSqlFile, 'database/database_backup.sql');
                $zip->setEncryptionName('database/database_backup.sql', ZipArchive::EM_AES_256);
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
            $backup->type = 'manual';
            $backup->status = 'success';
            $backup->password = $zipPassword;
            $backup->save();

            return response()->download($zipFilePath);
        } catch (\Exception $e) {
            return response()->json(['error' => 'حدث خطأ أثناء إنشاء النسخة الاحتياطية: ' . $e->getMessage()], 500);
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

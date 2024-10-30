<?php

namespace App\Models\FileDownloads;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileDownloads extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "file_downloads";
}

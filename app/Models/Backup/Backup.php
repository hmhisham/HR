<?php

namespace App\Models\Backup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Backup extends Model
{
    use HasFactory;

    protected $table = 'backups';

    protected $fillable = [
        'name',
        'file_path',
        'size',
        'type', // manual or automatic
        'status', // success, failed
        'password',
        'created_at',
        'updated_at'
    ];
}

<?php
namespace App\Models\Attendance;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
     use HasFactory;
    protected $guarded = [];
    protected $table = "attendance";
}

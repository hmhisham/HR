<?php

namespace App\Models\Jobtitles;

use App\Models\Grades\Grades;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jobtitles extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "jobtitles";



    Public function Getgrade()
    {
        return $this->belongsTo(Grades::class, 'grades_id' );
    }
}

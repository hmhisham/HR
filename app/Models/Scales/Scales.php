<?php

namespace App\Models\Scales;

use App\Models\Grades\Grades;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Scales extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "scales";

    Public function Getgrade()
    {
        return $this->belongsTo(Grades::class, 'grades_id' );
    }

}

<?php

namespace App\Models\Scalems;

use App\Models\Grades\Grades;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Scalems extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "scalems";

    Public function Getgrade()
    {
        return $this->belongsTo(Grades::class, 'grades_id' );
    }

}

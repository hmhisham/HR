<?php

namespace App\Models\Grades;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "grades";

}

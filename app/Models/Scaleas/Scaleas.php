<?php

namespace App\Models\Scaleas;

use App\Models\Grades\Grades;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Scaleas extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "scaleas";

    Public function Getgrade()
    {
        return $this->belongsTo(Grades::class, 'grades_id' );
    }

}

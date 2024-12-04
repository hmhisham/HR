<?php
namespace App\Models\Bonds;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bonds extends Model
{
     use HasFactory;
    protected $guarded = [];
    protected $table = "bonds";
}

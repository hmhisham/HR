<?php
namespace App\Models\Coaches;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coaches extends Model
{
     use HasFactory;
    protected $guarded = [];
    protected $table = "coaches";
}

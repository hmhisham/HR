<?php
namespace App\Models\Holidays;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holidays extends Model
{
     use HasFactory;
    protected $guarded = [];
    protected $table = "holidays";
}

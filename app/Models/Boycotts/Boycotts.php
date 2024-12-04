<?php
namespace App\Models\Boycotts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boycotts extends Model
{
     use HasFactory;
    protected $guarded = [];
    protected $table = "boycotts";
}

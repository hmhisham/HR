<?php
namespace App\Models\Inputs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inputs extends Model
{
     use HasFactory;
    protected $guarded = [];
    protected $table = "inputs";
}

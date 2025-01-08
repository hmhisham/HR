<?php
namespace App\Models\Emaillists;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emaillists extends Model
{
     use HasFactory;
    protected $guarded = [];
    protected $table = "emaillists";
}

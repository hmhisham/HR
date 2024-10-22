<?php
namespace App\Models\Technicians;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technicians extends Model
{
     use HasFactory;
    protected $guarded = [];
    protected $table = "technicians";
}

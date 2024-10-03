<?php
namespace App\Models\Positions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Positions extends Model
{
     use HasFactory;
    protected $guarded = [];
    protected $table = "positions";
}

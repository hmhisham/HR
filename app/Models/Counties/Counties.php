<?php
namespace App\Models\Counties;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counties extends Model
{
     use HasFactory;
    protected $guarded = [];
    protected $table = "counties";
}

<?php
namespace App\Models\Tenants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenants extends Model
{
     use HasFactory;
    protected $guarded = [];
    protected $table = "tenants";
}

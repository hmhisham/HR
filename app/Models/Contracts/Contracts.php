<?php
namespace App\Models\Contracts;
use App\Models\Tenants\Tenants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contracts extends Model
{
     use HasFactory;
    protected $guarded = [];
    protected $table = "contracts";

 


}

<?php

namespace App\Models\Employees;

use Illuminate\Database\Eloquent\Model;
use App\Http\Livewire\Districts\District;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employees extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = "employees";

 
}

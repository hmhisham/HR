<?php

namespace App\Models\Workers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workers extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "workers";
}

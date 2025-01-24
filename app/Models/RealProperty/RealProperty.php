<?php

namespace App\Models\RealProperty;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RealProperty extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "real_property";
}

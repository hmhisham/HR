<?php

namespace App\Models\Valuation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valuation extends Model
{
    use HasFactory;

    protected $table = 'valuations';
    protected $guarded = [];
}

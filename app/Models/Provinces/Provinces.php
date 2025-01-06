<?php

namespace App\Models\Provinces;

use App\Models\Plots\Plots;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provinces extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "provinces";

    public function GetPlots()
    {
        return $this->hasMany(Plots::class, 'province_id');
    }
}

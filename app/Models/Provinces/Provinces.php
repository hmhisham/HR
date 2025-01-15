<?php

namespace App\Models\Provinces;

use App\Models\Plots\Plots;
use App\Models\Sections\Sections;
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

    public function Getsection()
    {
        return $this->belongsTo(Sections::class, 'section_id');
    }
}

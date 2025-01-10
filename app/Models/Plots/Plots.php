<?php

namespace App\Models\Plots;

use App\Models\Provinces\Provinces;
use App\Models\Realities\Realities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plots extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "plots";

    public function GetRealities()
    {
        return $this->hasMany(Realities::class, 'plot_id');
    }
    public function GetProvinces()
    {
        return $this->belongsTo(Provinces::class, 'province_id');
    }
}

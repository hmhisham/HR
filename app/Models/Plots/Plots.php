<?php

namespace App\Models\Plots;

use App\Models\Provinces\Provinces;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plots extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "plots";

    public function GetProvince()
    {
        return $this->belongsTo(Provinces::class, 'province_id');
    }
}

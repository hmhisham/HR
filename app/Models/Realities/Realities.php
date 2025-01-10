<?php

namespace App\Models\Realities;

use App\Models\Plots\Plots;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Realities extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "realities";

    public function GetPlots()
    {
        return $this->belongsTo(Plots::class, 'plot_id');
    }
}

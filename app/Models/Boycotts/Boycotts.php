<?php

namespace App\Models\Boycotts;

use App\Models\Bonds\Bonds;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Boycotts extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "boycotts";

    public function GetBonds()
    {
        return $this->hasMany(Bonds::class, 'boycott_id');
    }
}

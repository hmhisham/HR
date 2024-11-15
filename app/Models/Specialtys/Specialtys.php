<?php

namespace App\Models\Specialtys;

use App\Models\Precises\Precises;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Specialtys extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "specialtys";

    public function Getprecise()
    {
        return $this->hasMany(Precises::class, 'specialtys_id' );
    }

}

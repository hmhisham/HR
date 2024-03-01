<?php

namespace App\Models\Precises;

use App\Models\Specialtys\Specialtys;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Precises extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "precises";

    public function Getspecialty()
    {
        return $this->belongsTo(Specialtys::class, 'specialtys_code' );
    }

}

<?php

namespace App\Models\Graduations;

use Illuminate\Database\Eloquent\Model;
use App\Models\Certificates\Certificates;
use App\Models\Specializations\Specializations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Graduations extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "graduations";

    public function Getcertificate()
    {
        return $this->belongsTo(Certificates::class, 'certificates_id' );
    }

    public function Getspecialization()
    {
        return $this->hasMany(Specializations::class, 'graduations_id' );
    }

}

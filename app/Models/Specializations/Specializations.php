<?php

namespace App\Models\Specializations;

use App\Models\Graduations\Graduations;
use Illuminate\Database\Eloquent\Model;
use App\Models\Certificates\Certificates;
use App\Http\Livewire\Certificates\Certificate;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Specializations extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "specializations";

    public function Getcertificate()
    {
        return $this->belongsTo(Certificates::class, 'certificates_id' );
    }

    public function Getgraduation()
    {
        return $this->belongsTo(Graduations::class, 'graduations_id' );
    }

 

}

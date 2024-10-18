<?php

namespace App\Models\Certific;

use App\Models\Workers\Workers;
use App\Models\Precises\Precises;
use App\Models\Specialtys\Specialtys;
use App\Models\Graduations\Graduations;
use Illuminate\Database\Eloquent\Model;
use App\Models\Certificates\Certificates;
use App\Models\Specializations\Specializations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Specializationclassification\Specializationclassification;

class Certific extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "certific";

    public function Getworker()
    {
        return $this->belongsTo(Workers::class, 'worker_id');
    }

    public function Getcertificate()
    {
        return $this->belongsTo(Certificates::class, 'certificates_id');
    }

    public function Getgraduation()
    {
        return $this->belongsTo(Graduations::class, 'graduations_id');
    }

    public function Getspecialization()
    {
        return $this->belongsTo(Specializations::class, 'specialization_id');
    }

    public function Getspecialty()
    {
        return $this->belongsTo(Specialtys::class, 'specialtys_id');
    }

    public function Getprecise()
    {
        return $this->belongsTo(Precises::class, 'precises_id');
    }

    public function Getspecializationclassificatio()
    {
        return $this->belongsTo(Specializationclassification::class, 'specializationclassification_id');
    }
}

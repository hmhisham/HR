<?php

namespace App\Models\Certific;

use App\Models\Workers\Workers;
use App\Models\Graduations\Graduations;
use Illuminate\Database\Eloquent\Model;
use App\Models\Certificates\Certificates;
use App\Models\Specializations\Specializations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        return $this->belongsTo(Graduations::class, 'certificates_id');
    }

    public function Getspecialization()
    {
        return $this->belongsTo(Specializations::class, 'specialization_id');
    }
}

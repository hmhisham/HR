<?php

namespace App\Models\Services;

use App\Models\Workers\Workers;
use App\Models\Jobtitles\Jobtitles;
use Illuminate\Database\Eloquent\Model;
use App\Models\Certificates\Certificates;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Services extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "services";

    public function Getworker()
    {
        return $this->belongsTo(Workers::class, 'worker_id');
    }

    public function Getcertificate()
    {
        return $this->belongsTo(Certificates::class, 'certificates_id');
    }

    public function GetjobtitleDeletion()
    {
        return $this->belongsTo(Jobtitles::class, 'job_title_deletion');
    }

    public function GetjobtitleIntroduction()
    {
        return $this->belongsTo(Jobtitles::class, 'job_title_introduction');
    }
}

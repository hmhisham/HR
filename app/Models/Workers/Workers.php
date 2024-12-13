<?php

namespace App\Models\Workers;

use App\Models\Certific\Certific;
use App\Models\Services\Services;
use App\Models\Infooffice\Infooffice;
use App\Models\Placements\Placements;
use Illuminate\Database\Eloquent\Model;
use App\Models\Notifications\Notifications;
use App\Models\Typesservices\Typesservices;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Workers extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "workers";
    protected $fillable = ['full_name'];

    public function Getinfooffic()
    {
        return $this->belongsTo(Infooffice::class, 'information_office');
    }

    public function GetCertific()
    {
        return $this->hasMany(Certific::class, 'worker_id');
    }

    public function GetServices()
    {
        return $this->hasMany(Services::class, 'worker_id');
    }


    public function GetPlacement()
    {
        return $this->hasMany(Placements::class, 'worker_id');
    }

    public function Gettypesservice()
    {
        return $this->belongsTo(Typesservices::class, 'service_status');
    }

    public function GetNotifications()
    {
        return $this->hasMany(Notifications::class, 'calculator_number');
    }
}

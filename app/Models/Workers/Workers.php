<?php

namespace App\Models\Workers;

use App\Models\Certific\Certific;
use App\Models\Infooffice\Infooffice;
use Illuminate\Database\Eloquent\Model;
use App\Models\Notifications\Notifications;
use App\Models\Typesservices\Typesservices;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Workers extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "workers";

    public function Getinfooffic()
    {
        return $this->belongsTo(Infooffice::class, 'information_office');
    }

    public function GetCertific()
    {
        return $this->hasMany(Certific::class, 'worker_id');
    }

    Public function Gettypesservice()
    {
        return $this->belongsTo(Typesservices::class, 'service_status' );
    }

    Public function GetNotifications()
    {
        return $this->hasMany(Notifications::class, 'calculator_number');
    }
}

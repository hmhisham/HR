<?php

namespace App\Models\Workers;

use App\Models\Certific\Certific;
use App\Models\Infooffice\Infooffice;
use Illuminate\Database\Eloquent\Model;
use App\Models\Specializations\Specializations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Workers extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "workers";

    Public function Getinfooffic()
    {
        return $this->belongsTo(Infooffice::class, 'information_office' );
    }

    public function GetCertific()
    {
        return $this->hasMany(Certific::class, 'worker_id');
    }
}

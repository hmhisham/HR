<?php

namespace App\Models\Workers;

use App\Models\Infooffice\Infooffice;
use Illuminate\Database\Eloquent\Model;
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
}

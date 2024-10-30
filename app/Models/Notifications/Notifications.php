<?php

namespace App\Models\Notifications;

use App\Models\Workers\Workers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notifications extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "notifications";

    Public function GetWorker()
    {
        return $this->belongsTo(Workers::class, 'calculator_number');
    }
}

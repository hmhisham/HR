<?php

namespace App\Models\Services;

use App\Models\Workers\Workers;
use Illuminate\Database\Eloquent\Model;
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
}

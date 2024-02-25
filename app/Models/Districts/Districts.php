<?php

namespace App\Models\Districts;

use Illuminate\Database\Eloquent\Model;
use App\Models\Governorates\Governorates;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Districts extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "districts";

    public function GetGovernorate()
    {
        return $this->belongsTo(Governorates::class, 'governorate_id');
    }

}

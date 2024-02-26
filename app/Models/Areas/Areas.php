<?php

namespace App\Models\Areas;

use App\Models\Districts\Districts;
use Illuminate\Database\Eloquent\Model;
use App\Models\Governorates\Governorates;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Areas extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "areas";

    public function GetGovernorate()
    {
        return $this->belongsTo(Governorates::class, 'governorate_id');
    }

    public function GetDistrict()
    {
        return $this->belongsTo(Districts::class, 'district_id', 'district_number');
    }


}

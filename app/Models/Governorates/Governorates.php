<?php

namespace App\Models\Governorates;

use App\Models\Districts\Districts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Governorates extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "governorates";

    public function GetDistrict()
    {
        return $this->hasMany(Districts::class, 'governorate_id');
    }

}

<?php

namespace App\Models\Realities;

use App\Models\Plots\Plots;
use App\Models\Branch\Branch;
use App\Models\Provinces\Provinces;
use Illuminate\Database\Eloquent\Model;
use App\Models\Propertycategory\Propertycategory;
use App\Models\RealProperty\RealEstateBondsSaleRental;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Realities extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "realities";

    public function GetProvinces()
    {
        return $this->belongsTo(Provinces::class, 'province_id');
    }

    public function GetPlots()
    {
        return $this->belongsTo(Plots::class, 'plot_id');
    }

    public function Getbranc()
    {
        return $this->belongsTo(Branch::class, 'specialized_department');
    }

    public function GetRealEstateBondsSaleRental()
    {
        return $this->belongsTo(RealEstateBondsSaleRental::class, 'property_number');
    }

    public function Getpropertycategor()
    {
        return $this->belongsTo(Propertycategory::class, 'propertycategory_id');
    }
}

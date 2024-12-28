<?php

namespace App\Models\Bonds;

use App\Models\Boycotts\Boycotts;
use App\Models\Property\Property;
use App\Models\Districts\Districts;
use App\Models\Department\Department;
use Illuminate\Database\Eloquent\Model;
use App\Models\Governorates\Governorates;
use App\Models\Propertytypes\Propertytypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bonds extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "bonds";

    public function Getboycott()
    {
        return $this->belongsTo(Boycotts::class, 'boycott_id');
    }

    public function Getdepartmen($type)
    {
        if ($type === 'ownership') {
            return $this->belongsTo(Department::class, 'ownership');
        } elseif ($type === 'registered_office') {
            return $this->belongsTo(Department::class, 'registered_office');
        }
        return null;
    }

    public function Getgovernorate()
    {
        return $this->belongsTo(Governorates::class, 'governorate');
    }

    public function Getdistrict()
    {
        return $this->belongsTo(Districts::class, 'district');
    }

    public function Getpropertytype()
    {
        return $this->belongsTo(Propertytypes::class, 'property_type');
    }

    // إضافة خصائص التحويل
    protected $dates = ['date'];

    // تحويل التاريخ إلى الصيغة المطلوبة قبل الحفظ
    public function setDateAttribute($value)
    {
        $this->attributes['date'] = \Carbon\Carbon::parse($value . '-01')->format('Y-m-d');
    }


    public function getPropert()
    {
        return $this->hasOne(Property::class, 'bonds_id', 'id')
            ->where('status', 1)
            ->where('isdeleted', 0);
    }
}

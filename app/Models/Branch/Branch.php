<?php

namespace App\Models\Branch;

use App\Models\Units\Units;
use App\Models\Linkages\Linkages;
use App\Models\Sections\Sections;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Branch extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "branch";

    Public function Getlinkage()
    {
        return $this->belongsTo(Linkages::class, 'linkage_id');
    }

    Public function Getsection()
    {
        return $this->belongsTo(Sections::class, 'section_id');
    }

    public function GetUnit()
    {
        return $this->hasMany(Units::class, 'branch_id'); // تأكد من أن 'branch_id' هو المفتاح الأجنبي الصحيح
    }


}

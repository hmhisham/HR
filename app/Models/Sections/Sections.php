<?php

namespace App\Models\Sections;


use App\Models\Branch\Branch;
use App\Models\Linkages\Linkages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sections extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "sections";


    Public function Getlinkage()
    {
        return $this->belongsTo(Linkages::class, 'linkage_id' );
    }

    Public function GetBranch()
    {
        return $this->hasMany(Branch::class, 'section_id' );
    }

    /* Public function Getsection()
    {
        return $this->belongsTo(Sections::class, 'section_id' );
    } */
}

<?php

namespace App\Models\Sections;


use App\Models\Linkages\Linkages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sections extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "sections";


    Public function Getsection()
    {
        return $this->belongsTo(Sections::class, 'section_id' );
    }
    
    Public function Getlinkage()
    {
        return $this->belongsTo(Linkages::class, 'linkage_id' );
    }

}

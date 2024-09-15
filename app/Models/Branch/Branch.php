<?php

namespace App\Models\Branch;

use App\Models\Linkages\Linkages;
use App\Models\Sections\Sections;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Branch extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "branch";

    public function Getsection()
    {
        return $this->belongsTo(Sections::class, 'section_id');
    }


    // public function Getlinkage()
    // {
    //     return $this->belongsTo(Linkages::class, 'linkage_id');
    // }


}

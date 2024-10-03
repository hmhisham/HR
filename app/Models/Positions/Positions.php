<?php

namespace App\Models\Positions;

use App\Models\Units\Units;
use App\Models\Branch\Branch;
use App\Models\Workers\Workers;
use App\Models\Linkages\Linkages;
use App\Models\Sections\Sections;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Positions extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "positions";


    public function Getworker()
    {
        return $this->belongsTo(Workers::class, 'worker_id');
    }

    public function Getlinkage()
    {
        return $this->belongsTo(Linkages::class, 'linkage_id');
    }

    public function Getsection()
    {
        return $this->belongsTo(Sections::class, 'section_id');
    }

    public function Getbranc()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function Getunit()
    {
        return $this->belongsTo(Units::class, 'unit_id');
    }
}

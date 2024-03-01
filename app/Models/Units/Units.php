<?php

namespace App\Models\Units;

use App\Models\Branch\Branch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Units extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "units";

    public function Getbranc()
    {
        return $this->belongsTo(Branch::class, 'branch_id' );
    }

}

<?php

namespace App\Models\Penalties;

use App\Models\Workers\Workers;
use App\Models\Department\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penalties extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "penalties";

    public function worker()
    {
        return $this->belongsTo(Workers::class, 'calculator_number', 'calculator_number');
    }
    Public function Getdepartmen()
    {
        return $this->belongsTo(Department::class, 'grantor' );
    }
}

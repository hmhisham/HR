<?php

namespace App\Models\Inputs;

use App\Models\Iaccts\Iaccts;
use App\Models\Itypes\Itypes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Idepartments\Idepartments;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inputs extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "inputs";

    public function Getitype()
    {
        return $this->belongsTo(Itypes::class, 'itype');
    }

    public function Getiacct()
    {
        return $this->belongsTo(Iaccts::class, 'iacct');
    }

    public function Getidepartment()
    {
        return $this->belongsTo(Idepartments::class, 'idept');
    }
}

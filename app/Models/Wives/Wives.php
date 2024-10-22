<?php

namespace App\Models\Wives;

use App\Models\Workers\Workers;
use App\Models\Department\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wives extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "wives";

    public function Getworker()
    {
        return $this->belongsTo(Workers::class, 'workers_id');
    }

    public function Getdepartmen()
    {
        return $this->belongsTo(Department::class, 'organization_name');
    }
}

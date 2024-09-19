<?php
namespace App\Models\Wives;
use App\Models\Department\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wives extends Model
{
     use HasFactory;
    protected $guarded = [];
    protected $table = "wives";

    Public function Getdepartmen()
    {
        return $this->belongsTo(Department::class, 'organization_name' );
    }


}

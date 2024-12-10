<?php
namespace App\Models\Property;
use App\Models\Workers\Workers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
     use HasFactory;
    protected $guarded = [];
    protected $table = "property";

    Public function Getworker()
    {
        return $this->belongsTo(Workers::class, 'worker_id' );
    }

}

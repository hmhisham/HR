<?php
namespace App\Models\Placements;
use App\Models\Workers\Workers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Placements extends Model
{
     use HasFactory;
    protected $guarded = [];
    protected $table = "placements";
    Public function Getworker()
    {
        return $this->belongsTo(Workers::class, 'worker_id'  );
    }

}

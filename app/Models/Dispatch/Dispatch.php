<?php
namespace App\Models\Dispatch;
use App\Models\Workers\Workers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dispatch extends Model
{
     use HasFactory;
    protected $guarded = [];
    protected $table = "dispatch";
    public function worker()
    {
        return $this->belongsTo(Workers::class, 'calculator_number', 'calculator_number');
    }

}

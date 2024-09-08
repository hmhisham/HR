<?php
namespace App\Models\Holidays;
use App\Models\Workers\Workers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Holidays extends Model
{
     use HasFactory;
    protected $guarded = [];
    protected $table = "holidays";

    public function worker()
    {
        return $this->belongsTo(Workers::class, 'calculator_number', 'calculator_number');
    }


}

<?php
namespace App\Models\Certific;
use App\Models\Workers\Workers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Certific extends Model
{
     use HasFactory;
    protected $guarded = [];
    protected $table = "certific";

    public function worker()
    {
        return $this->belongsTo(Workers::class, 'calculator_number', 'calculator_number');
    }


}

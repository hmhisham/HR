<?php
namespace App\Models\Certific;
use App\Models\Workers\Workers;
use Illuminate\Database\Eloquent\Model;
use App\Models\Certificates\Certificates;
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

    public function Getcertificate()
    {
        return $this->belongsTo(Certificates::class, 'certificates_id' );
    }

}

<?php

namespace App\Models\Certificates;

use App\Models\Graduations\Graduations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Certificates extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "certificates";

    public function Getcertificate()
    {
        return $this->belongsTo(Certificates::class, 'certificates_id' );
    }
  


}

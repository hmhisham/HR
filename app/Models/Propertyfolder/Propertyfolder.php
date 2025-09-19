<?php
namespace App\Models\Propertyfolder;
use App\Models\Provinces\Provinces;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Propertyfolder extends Model
{
     use HasFactory;
    protected $guarded = [];
    protected $table = "propertyfolder";




             Public function Getprovince()
                 {
                     return $this->belongsTo(Provinces::class, 'id_property_location' );
                 }


}

<?php
namespace App\Models\Propertyfolder;
use App\Models\Provinces\Provinces;
use Illuminate\Database\Eloquent\Model;
use App\Models\Propertytypes\Propertytypes;
use App\Http\Livewire\Propertytypes\Propertytype;
use App\Models\Propertycategory\Propertycategory;
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
                 Public function propertyType()
                 {
                     return $this->belongsTo(Propertytypes::class, 'id_property_type' );
                 }
                 Public function propertyCategory()
                 {
                     return $this->belongsTo(Propertycategory::class, 'id_property_description' );
                 }

}

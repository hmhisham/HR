<?php
namespace App\Models\Propertypayd;
use App\Models\Property\Property;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Propertypayd extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "propertypayd";
}

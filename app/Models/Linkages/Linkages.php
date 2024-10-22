<?php
namespace App\Models\Linkages;
use App\Models\Sections\Sections;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Linkages extends Model
{
     use HasFactory;
    protected $guarded = [];
    protected $table = "linkages";

    Public function GetSections()
    {
        return $this->hasMany(Sections::class, 'linkage_id');
    }

}

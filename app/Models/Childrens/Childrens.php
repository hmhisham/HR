<?php
namespace App\Models\Childrens;
use App\Models\Wives\Wives;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Childrens extends Model
{
     use HasFactory;
    protected $guarded = [];
    protected $table = "childrens";

    Public function Getwive()
    {
        return $this->belongsTo(Wives::class, 'wives_id' );
    }

}

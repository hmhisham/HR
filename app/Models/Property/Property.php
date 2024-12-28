<?php

namespace App\Models\Property;

use App\Models\Bonds\Bonds;
use App\Models\Workers\Workers;
use App\Models\Boycotts\Boycotts;
use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory ;
    protected $guarded = [];
    protected $table = "property";

    public function Getworker()
    {
        return $this->belongsTo(Workers::class, 'worker_id');
    }

    public function Getboycott()
    {
        return $this->belongsTo(Boycotts::class, 'boycott_id');
    }

    public function GetBonds()
    {
        return $this->hasMany(Bonds::class, 'property_id');
    }



        public function bond()
        {
            return $this->belongsTo(Bonds::class, 'bonds_id', 'property_number');
        }
    }

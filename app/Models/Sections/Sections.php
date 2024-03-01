<?php

namespace App\Models\Sections;

use App\Models\Links\Links;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sections extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "sections";


    public function Getlink()
    {
        return $this->belongsTo(Links::class, 'link_id' );
    }


}

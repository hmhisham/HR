<?php

namespace App\Models\Jobleavers;

use App\Models\Workers\Workers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jobleavers extends Model
{
  use HasFactory;
  protected $guarded = [];
  protected $table = "jobleavers";

  public function worker()
  {
    return $this->belongsTo(Workers::class, 'computer_number', 'computer_number');
  }
}

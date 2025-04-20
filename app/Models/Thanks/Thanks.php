<?php

namespace App\Models\Thanks;

use App\Models\Workers\Workers;
use App\Models\Department\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Thanks extends Model
{
  use HasFactory;
  protected $guarded = [];
  protected $table = "thanks";

  public function worker()
  {
    return $this->belongsTo(Workers::class, 'computer_number', 'computer_number');
  }

  public function Getdepartmen()
  {
    return $this->belongsTo(Department::class, 'grantor');
  }
}

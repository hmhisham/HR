<?php

namespace App\Models\RealProperty;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyerTenant extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "buyer_tenant";
}

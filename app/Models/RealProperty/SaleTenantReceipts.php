<?php

namespace App\Models\RealProperty;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleTenantReceipts extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "sale_tenant_receipts";
}


<?php

namespace App\Models\RealProperty;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyerTenantFiles extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'buyer_tenant_files';

    public function buyerTenant()
    {
        return $this->belongsTo(BuyerTenant::class);
    }
}

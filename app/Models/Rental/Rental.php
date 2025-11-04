<?php
namespace App\Models\Rental;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
     use HasFactory;
    protected $guarded = [];
    protected $table = "rentals";
    
    // علاقة مع جدول المستأجرين
    public function tenant()
    {
        return $this->belongsTo(\App\Models\Tenants\Tenants::class, 'tenant_name', 'id');
    }
    
    // إضافة accessor لعرض اسم المستأجر
    public function getTenantNameDisplayAttribute()
    {
        return $this->tenant ? $this->tenant->name : $this->tenant_name;
    }
}
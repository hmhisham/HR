<?php
namespace App\Models\Contracts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contracts extends Model
{
     use HasFactory;
    protected $guarded = [];
    protected $table = "contracts";
    
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

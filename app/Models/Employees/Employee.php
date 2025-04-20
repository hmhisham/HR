<?php

namespace App\Models\Employees;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $table = "employees";

    protected $dates = [
        'last_promotion_date',
        'job_title_change_order_date',
        'last_allowance_date',
        'allowance_order_date',
        'service_continuity_stop_date',
        'service_continuity_stop_order_date',
        'position_assignment_order_date',
        'position_start_date',
        'appointment_date',
        'commencement_letter_date',
        'actual_commencement_date',
        'additional_service_order_date',
        'transfer_order_date',
        'transfer_commencement_order_date',
        'transfer_commencement_date',
        'birth_date',
        'organization_date',
        'national_id_date',
    ];

    protected $casts = [
        'service_continuity' => 'boolean',
        'transferred_to_ministry' => 'boolean',
        'nominal_salary' => 'decimal:2',
        'children_count' => 'integer',
        'service_days' => 'integer',
        'service_months' => 'integer',
        'service_years' => 'integer',
        'additional_service_days' => 'integer',
        'additional_service_months' => 'integer',
        'additional_service_years' => 'integer',
    ];
}

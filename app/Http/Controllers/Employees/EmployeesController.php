<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Models\Employees\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * عرض الصفحة الرئيسية لإدارة الموظفين
     */
    public function index()
    {
        return view('content.employees.index');
    }

    /**
     * عرض صفحة استيراد بيانات الموظفين
     */
    public function import()
    {
        return view('content.employees.import');
    }

    /**
     * عرض صفحة قائمة الموظفين
     */
    public function list()
    {
        return view('content.employees.list');
    }

    /**
     * عرض تفاصيل موظف محدد
     */
    public function show(Employee $employee)
    {
        return view('content.employees.show', compact('employee'));
    }
}

<?php

namespace App\Http\Livewire\Employees;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Employees\Employee;

class EmployeesList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $employees = [];
    public $search = [
        'computer_number' => '',
        'job_number' => '',
        'full_name' => '',
        'department' => '',
        'job_title' => ''
    ];

    public function render()
    {
        $query = Employee::query();

        // تطبيق البحث على الحقول المختلفة
        if ($this->search['computer_number']) {
            $query->where('computer_number', 'LIKE', '%' . $this->search['computer_number'] . '%');
        }

        if ($this->search['job_number']) {
            $query->where('job_number', 'LIKE', '%' . $this->search['job_number'] . '%');
        }

        if ($this->search['full_name']) {
            $query->where('full_name', 'LIKE', '%' . $this->search['full_name'] . '%');
        }

        if ($this->search['department']) {
            $query->where('department', 'LIKE', '%' . $this->search['department'] . '%');
        }

        if ($this->search['job_title']) {
            $query->where('job_title', 'LIKE', '%' . $this->search['job_title'] . '%');
        }

        $employees = $query->orderBy('id', 'DESC')->paginate(10);
        $links = $employees;
        $this->employees = collect($employees->items());

        return view('livewire.employees.employees-list', [
            'employees' => $employees,
            'links' => $links
        ]);
    }

    public function resetFilters()
    {
        $this->reset('search');
    }
}

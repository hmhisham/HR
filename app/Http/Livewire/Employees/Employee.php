<?php

namespace App\Http\Livewire\Employees;

use Livewire\Component;
use App\Models\Employees\Employees;

class Employee extends Component
{
    public $Employees = [];
    public $EmployeeSearch;

    public function render()
    {
        $EmployeeSearch = $this->EmployeeSearch . '%';

        $Employees = Employees::where('FullName', 'LIKE', $EmployeeSearch)
            ->orderBy('id', 'ASC')
            ->paginate(10);




        $links = $Employees;
        $this->Employees = collect($Employees->items());


        return view('livewire.employees.employee', [
            'links' => $links
        ]);
    }

    public function AddEmployeeModalShow()
    {
        // $this->reset(['name', 'active_gold','active', 'KaratGoldCol']);
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('EmployeeModalShow');
    }
}

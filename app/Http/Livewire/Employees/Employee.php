<?php

namespace App\Http\Livewire\Employees;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Employees\Employees;

class Employee extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Employees = [];
    public $EmployeeSearch, $Employee, $EmployeeId;
    public $JobNumber, $FileNumber, $FirstName, $SecondName, $ThirdName, $FourthName, $LastName, $FullName, $MotherName, $MotherFatherName, $MotherGrandName, $MotherLastName, $FullMothersName, $Status;


    public function render()
    {
        $EmployeeSearch = $this->EmployeeSearch . '%';
        $Employees = Employees::where('JobNumber', 'LIKE', $EmployeeSearch)
            ->orWhere('FileNumber', 'LIKE', $EmployeeSearch)
            ->orWhere('FirstName', 'LIKE', $EmployeeSearch)
            ->orWhere('SecondName', 'LIKE', $EmployeeSearch)
            ->orWhere('ThirdName', 'LIKE', $EmployeeSearch)
            ->orWhere('FourthName', 'LIKE', $EmployeeSearch)
            ->orWhere('LastName', 'LIKE', $EmployeeSearch)
            ->orWhere('FullName', 'LIKE', $EmployeeSearch)
            ->orWhere('MotherName', 'LIKE', $EmployeeSearch)
            ->orWhere('MotherFatherName', 'LIKE', $EmployeeSearch)
            ->orWhere('MotherGrandName', 'LIKE', $EmployeeSearch)
            ->orWhere('MotherLastName', 'LIKE', $EmployeeSearch)
            ->orWhere('FullMothersName', 'LIKE', $EmployeeSearch)
            ->orWhere('Status', 'LIKE', $EmployeeSearch)


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
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('EmployeeModalShow');
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'JobNumber' => 'required|unique:employees',
            'FileNumber' => 'required|unique:employees',
            'FirstName' => 'required|unique:employees',
            'SecondName' => 'required|unique:employees',
            'ThirdName' => 'required|unique:employees',
            'FourthName' => 'required|unique:employees',
            'LastName' => 'required|unique:employees',
            'FullName' => 'required|unique:employees',
            'MotherName' => 'required|unique:employees',
            'MotherFatherName' => 'required|unique:employees',
            'MotherGrandName' => 'required|unique:employees',
            'MotherLastName' => 'required|unique:employees',
            'FullMothersName' => 'required|unique:employees',
            'Status' => 'required|unique:employees',

        ], [
            'JobNumber.required' => 'حقل الاسم مطلوب',
            'JobNumber.unique' => 'الأسم موجود',
            'FileNumber.required' => 'حقل الاسم مطلوب',
            'FileNumber.unique' => 'الأسم موجود',
            'FirstName.required' => 'حقل الاسم مطلوب',
            'FirstName.unique' => 'الأسم موجود',
            'SecondName.required' => 'حقل الاسم مطلوب',
            'SecondName.unique' => 'الأسم موجود',
            'ThirdName.required' => 'حقل الاسم مطلوب',
            'ThirdName.unique' => 'الأسم موجود',
            'FourthName.required' => 'حقل الاسم مطلوب',
            'FourthName.unique' => 'الأسم موجود',
            'LastName.required' => 'حقل الاسم مطلوب',
            'LastName.unique' => 'الأسم موجود',
            'FullName.required' => 'حقل الاسم مطلوب',
            'FullName.unique' => 'الأسم موجود',
            'MotherName.required' => 'حقل الاسم مطلوب',
            'MotherName.unique' => 'الأسم موجود',
            'MotherFatherName.required' => 'حقل الاسم مطلوب',
            'MotherFatherName.unique' => 'الأسم موجود',
            'MotherGrandName.required' => 'حقل الاسم مطلوب',
            'MotherGrandName.unique' => 'الأسم موجود',
            'MotherLastName.required' => 'حقل الاسم مطلوب',
            'MotherLastName.unique' => 'الأسم موجود',
            'FullMothersName.required' => 'حقل الاسم مطلوب',
            'FullMothersName.unique' => 'الأسم موجود',
            'Status.required' => 'حقل الاسم مطلوب',
            'Status.unique' => 'الأسم موجود',
        ]);

        $fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);
        Employees::create([
            'JobNumber' => $this->JobNumber,
            'FileNumber' => $this->FileNumber,
            'FirstName' => $this->FirstName,
            'SecondName' => $this->SecondName,
            'ThirdName' => $this->ThirdName,
            'FourthName' => $this->FourthName,
            'LastName' => $this->LastName,
            'FullName' => $this->$fullName,
            'MotherName' => $this->MotherName,
            'MotherFatherName' => $this->MotherFatherName,
            'MotherGrandName' => $this->MotherGrandName,
            'MotherLastName' => $this->MotherLastName,
            'FullMothersName' => $this->FullMothersName,
            'Status' => $this->Status,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('EmployeeModalShow');
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }


    
}

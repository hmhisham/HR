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

  


    public function concatFullName($fil, $value)
    {
        switch ($fil) {
            case 'FirstName':
                $this->FullName = $value . ' ' . $this->SecondName . ' ' . $this->ThirdName . ' ' . $this->FourthName;
                break;
            case 'SecondName':
                $this->FullName = $this->FirstName . ' ' . $value . ' ' . $this->ThirdName . ' ' . $this->FourthName;
                break;
            case 'ThirdName':
                $this->FullName = $this->FirstName . ' ' . $this->SecondName . ' ' . $value . ' ' . $this->FourthName;
                break;
            case 'FourthName':
                $this->FullName = $this->FirstName . ' ' . $this->SecondName . ' ' . $this->ThirdName . ' ' . $value;
                break;
            case 'MotherName':
                $this->FullMothersName = $value . ' ' . $this->MotherFatherName . ' ' . $this->MotherGrandName . ' ' . $this->MotherLastName;
                break;
            case 'MotherFatherName':
                $this->FullMothersName = $this->MotherName . ' ' . $value . ' ' . $this->MotherGrandName . ' ' . $this->MotherLastName;
                break;
            case 'MotherGrandName':
                $this->FullMothersName = $this->MotherName . ' ' . $this->MotherFatherName . ' ' . $value . ' ' . $this->MotherLastName;
                break;
            case 'MotherLastName':
                $this->FullMothersName = $this->MotherName . ' ' . $this->MotherFatherName . ' ' . $this->MotherGrandName . ' ' . $value;
                break;
            default:

                break;
        }
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

        // $fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);
        Employees::create([
            'JobNumber' => $this->JobNumber,
            'FileNumber' => $this->FileNumber,
            'FirstName' => $this->FirstName,
            'SecondName' => $this->SecondName,
            'ThirdName' => $this->ThirdName,
            'FourthName' => $this->FourthName,
            'LastName' => $this->LastName,
            'FullName' =>   $this->FullName,
            'MotherName' => $this->MotherName,
            'MotherFatherName' => $this->MotherFatherName,
            'MotherGrandName' => $this->MotherGrandName,
            'MotherLastName' => $this->MotherLastName,
            'FullMothersName' => $this->FullMothersName,
            'Status' => $this->Status,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetEmployee($EmployeeId)
    {

        $this->resetValidation();
        $this->Employee  = Employees::find($EmployeeId);
        $this->EmployeeId = $this->Employee->id;
        $this->JobNumber = $this->Employee->JobNumber;
        $this->FileNumber = $this->Employee->FileNumber;
        $this->FirstName = $this->Employee->FirstName;
        $this->SecondName = $this->Employee->SecondName;
        $this->ThirdName = $this->Employee->ThirdName;
        $this->FourthName = $this->Employee->FourthName;
        $this->LastName = $this->Employee->LastName;
        $this->FullName = $this->Employee->FullName;
        $this->MotherName = $this->Employee->MotherName;
        $this->MotherFatherName = $this->Employee->MotherFatherName;
        $this->MotherGrandName = $this->Employee->MotherGrandName;
        $this->MotherLastName = $this->Employee->MotherLastName;
        $this->FullMothersName = $this->Employee->FullMothersName;
        $this->Status = $this->Employee->Status;
    }


    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'JobNumber' => 'required:employees',
            'FileNumber' => 'required:employees',
            'FirstName' => 'required:employees',
            'SecondName' => 'required:employees',
            'ThirdName' => 'required:employees',
            'FourthName' => 'required:employees',
            'LastName' => 'required:employees',
            'FullName' => 'required:employees',
            'MotherName' => 'required:employees',
            'MotherFatherName' => 'required:employees',
            'MotherGrandName' => 'required:employees',
            'MotherLastName' => 'required:employees',
            'FullMothersName' => 'required:employees',
            'Status' => 'required:employees',

        ], [
            'JobNumber.required' => 'حقل الاسم مطلوب',
            'FileNumber.required' => 'حقل الاسم مطلوب',
            'FirstName.required' => 'حقل الاسم مطلوب',
            'SecondName.required' => 'حقل الاسم مطلوب',
            'ThirdName.required' => 'حقل الاسم مطلوب',
            'FourthName.required' => 'حقل الاسم مطلوب',
            'LastName.required' => 'حقل الاسم مطلوب',
            'FullName.required' => 'حقل الاسم مطلوب',
            'MotherName.required' => 'حقل الاسم مطلوب',
            'MotherFatherName.required' => 'حقل الاسم مطلوب',
            'MotherGrandName.required' => 'حقل الاسم مطلوب',
            'MotherLastName.required' => 'حقل الاسم مطلوب',
            'FullMothersName.required' => 'حقل الاسم مطلوب',
            'Status.required' => 'حقل الاسم مطلوب',
        ]);

        $Employees = Employees::find($this->EmployeeId);
        $Employees->update([
            'JobNumber' => $this->JobNumber,
            'FileNumber' => $this->FileNumber,
            'FirstName' => $this->FirstName,
            'SecondName' => $this->SecondName,
            'ThirdName' => $this->ThirdName,
            'FourthName' => $this->FourthName,
            'LastName' => $this->LastName,
            'FullName' => $this->FullName,
            'MotherName' => $this->MotherName,
            'MotherFatherName' => $this->MotherFatherName,
            'MotherGrandName' => $this->MotherGrandName,
            'MotherLastName' => $this->MotherLastName,
            'FullMothersName' => $this->FullMothersName,
            'Status' => $this->Status,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Employees = Employees::find($this->EmployeeId);
        $Employees->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات  بنجاح',
            'title' => 'الحذف '
        ]);
    }
}

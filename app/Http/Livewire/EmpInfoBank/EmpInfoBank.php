<?php

namespace App\Http\Livewire\EmpInfoBank;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Employees\Employees;

class EmpInfoBank extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Employees = [];
    public $EmployeeSearch, $Employee, $EmployeeId;
    public $calculator_number, $FileNumber, $FirstName, $SecondName, $ThirdName, $FourthName, $LastName, $full_name, $MotherName, $MotherFatherName, $MotherGrandName, $MotherLastName, $FullMothersName, $Status;


    public function render()
    {
        $EmployeeSearch = $this->EmployeeSearch . '%';
        $Employees = Employees::where('calculator_number', 'LIKE', $EmployeeSearch)

            ->orWhere('full_name', 'LIKE', $EmployeeSearch)

            ->paginate(10);

        $links = $Employees;
        $this->Employees = collect($Employees->items());

        return view('livewire.emp-info-bank.emp-info-bank', [
            'links' => $links
        ]);
    }

    public function AddEmployeeModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('EmployeeModalShow');
    }




    public function concatfull_name($fil, $value)
    {
        switch ($fil) {
            case 'FirstName':
                $this->full_name = $value . ' ' . $this->SecondName . ' ' . $this->ThirdName . ' ' . $this->FourthName;
                break;
            case 'SecondName':
                $this->full_name = $this->FirstName . ' ' . $value . ' ' . $this->ThirdName . ' ' . $this->FourthName;
                break;
            case 'ThirdName':
                $this->full_name = $this->FirstName . ' ' . $this->SecondName . ' ' . $value . ' ' . $this->FourthName;
                break;
            case 'FourthName':
                $this->full_name = $this->FirstName . ' ' . $this->SecondName . ' ' . $this->ThirdName . ' ' . $value;
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
            'calculator_number' => 'required|unique:employees',
            'FileNumber' => 'required|unique:employees',
            'FirstName' => 'required|unique:employees',
            'SecondName' => 'required|unique:employees',
            'ThirdName' => 'required|unique:employees',
            'FourthName' => 'required|unique:employees',
            'LastName' => 'required|unique:employees',
            'full_name' => 'required|unique:employees',
            'MotherName' => 'required|unique:employees',
            'MotherFatherName' => 'required|unique:employees',
            'MotherGrandName' => 'required|unique:employees',
            'MotherLastName' => 'required|unique:employees',
            'FullMothersName' => 'required|unique:employees',
            'Status' => 'required|unique:employees',

        ], [
            'calculator_number.required' => 'حقل الاسم مطلوب',
            'calculator_number.unique' => 'الأسم موجود',
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
            'full_name.required' => 'حقل الاسم مطلوب',
            'full_name.unique' => 'الأسم موجود',

        ]);

        // $full_name = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);
        Employees::create([
            'calculator_number' => $this->calculator_number,
            'FileNumber' => $this->FileNumber,
                    'full_name' =>   $this->full_name,

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
          $this->calculator_number = $this->Employee->calculator_number;
          $this->full_name = $this->Employee->full_name;
    }


    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'calculator_number' => 'required:employees',
                    'full_name' => 'required:employees',

        ], [
            'calculator_number.required' => 'حقل الاسم مطلوب',
                       'full_name.required' => 'حقل الاسم مطلوب',
                  ]);

        $Employees = Employees::find($this->EmployeeId);
        $Employees->update([
            'calculator_number' => $this->calculator_number,
            'full_name' => $this->full_name,


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

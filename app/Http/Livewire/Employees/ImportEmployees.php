<?php

namespace App\Http\Livewire\Employees;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Employees\Employee;
use App\Imports\EmployeesImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class ImportEmployees extends Component
{
    use WithFileUploads;

    public $file;
    public $isUploading = false;
    public $importedCount = 0;
    public $showResults = false;
    public $deleteBeforeImport = false;

    protected $rules = [
        'file' => 'required|file|mimes:xlsx,xls,csv|max:10240',
    ];

    protected $messages = [
        'file.required' => 'يرجى اختيار ملف للرفع',
        'file.file' => 'يجب أن يكون الملف المرفوع ملفًا صالحًا',
        'file.mimes' => 'يجب أن يكون الملف من نوع Excel (xlsx, xls) أو CSV',
        'file.max' => 'حجم الملف يجب أن لا يتجاوز 10 ميجابايت',
    ];

    public function render()
    {
        return view('livewire.employees.import-employees');
    }

    public function import()
    {
        $this->validate();

        $this->isUploading = true;
        $this->showResults = false;

        try {
            DB::beginTransaction();

            // حذف جميع البيانات قبل الاستيراد إذا تم اختيار هذا الخيار
            if ($this->deleteBeforeImport) {
                Employee::query()->delete();
            }

            // استيراد البيانات من الملف
            $import = new EmployeesImport();
            Excel::import($import, $this->file);

            $this->importedCount = $import->getRowCount();
            $this->showResults = true;

            DB::commit();

            session()->flash('success', 'تم استيراد البيانات بنجاح. عدد السجلات المستوردة: ' . $this->importedCount);
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'حدث خطأ أثناء استيراد البيانات: ' . $e->getMessage());
        } finally {
            $this->isUploading = false;
            $this->reset('file');
        }
    }

    public function deleteAllEmployees()
    {
        try {
            $count = Employee::count();
            Employee::query()->delete();
            session()->flash('success', 'تم حذف جميع بيانات الموظفين بنجاح. عدد السجلات المحذوفة: ' . $count);
        } catch (\Exception $e) {
            session()->flash('error', 'حدث خطأ أثناء حذف البيانات: ' . $e->getMessage());
        }
    }
}

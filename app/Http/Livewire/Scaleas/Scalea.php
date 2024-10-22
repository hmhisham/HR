<?php

namespace App\Http\Livewire\Scaleas;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Grades\Grades;
use App\Models\Scaleas\Scaleas;

class Scalea extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Scaleas = [];
    public $ScaleaSearch, $Scalea, $ScaleaId;
    public $grades_id, $phase_emp, $scaleas_salary_grade, $scaleas_salary_stage, $scaleas_amount, $scaleas_salary, $scaleas_minimum_period, $scaleas_previous_salary;


    public function render()
    {
        $ScaleaSearch = '%' . $this->ScaleaSearch . '%';
        $Scaleas = Scaleas::where('grades_id', 'LIKE', $ScaleaSearch)
            ->orWhere('phase_emp', 'LIKE', $ScaleaSearch)
            ->orWhere('scaleas_salary_grade', 'LIKE', $ScaleaSearch)
            ->orWhere('scaleas_salary_stage', 'LIKE', $ScaleaSearch)
            ->orWhere('scaleas_amount', 'LIKE', $ScaleaSearch)
            ->orWhere('scaleas_salary', 'LIKE', $ScaleaSearch)
            ->orWhere('scaleas_minimum_period', 'LIKE', $ScaleaSearch)
            ->orWhere('scaleas_previous_salary', 'LIKE', $ScaleaSearch)


            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Scaleas;
        $this->Scaleas = collect($Scaleas->items());
        return view('livewire.scaleas.scalea', [
            'grades' => Grades::get(),
            'links' => $links
        ]);
    }

    public function AddScaleaModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('ScaleaModalShow');
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'grades_id' => 'required',
            'phase_emp' => 'required',
            'scaleas_salary_grade' => 'required',
            'scaleas_salary_stage' => 'required',
            'scaleas_amount' => 'required',
            'scaleas_salary' => 'required',
            'scaleas_minimum_period' => 'required',
            'scaleas_previous_salary' => 'required',

        ], [
            'grades_id.required' => 'حقل الدرجة الوظيفية مطلوب',
            'phase_emp.required' => 'حقل المرحلة الوظيفية مطلوب',
            'scaleas_salary_grade.required' => 'حقل درجة الراتب مطلوب',
            'scaleas_salary_stage.required' => 'حقل مرحلة الراتب مطلوب',
            'scaleas_amount.required' => 'حقل مقدار العلاوة مطلوب',
            'scaleas_salary.required' => 'حقل الراتب الحالي مطلوب',
            'scaleas_minimum_period.required' => 'حقل المدة الاصغرية مطلوب',
            'scaleas_previous_salary.required' => 'حقل الراتب السابق مطلوب',
        ]);

        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);
        Scaleas::create([
            'grades_id' => $this->grades_id,
            'phase_emp' => $this->phase_emp,
            'scaleas_salary_grade' => $this->scaleas_salary_grade,
            'scaleas_salary_stage' => $this->scaleas_salary_stage,
            'scaleas_amount' => $this->scaleas_amount,
            'scaleas_salary' => $this->scaleas_salary,
            'scaleas_minimum_period' => $this->scaleas_minimum_period,
            'scaleas_previous_salary' => $this->scaleas_previous_salary,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetScalea($ScaleaId)
    {
        $this->resetValidation();

        $this->Scalea  = Scaleas::find($ScaleaId);
        $this->ScaleaId = $this->Scalea->id;
        $this->grades_id = $this->Scalea->grades_id;
        $this->phase_emp = $this->Scalea->phase_emp;
        $this->scaleas_salary_grade = $this->Scalea->scaleas_salary_grade;
        $this->scaleas_salary_stage = $this->Scalea->scaleas_salary_stage;
        $this->scaleas_amount = $this->Scalea->scaleas_amount;
        $this->scaleas_salary = $this->Scalea->scaleas_salary;
        $this->scaleas_minimum_period = $this->Scalea->scaleas_minimum_period;
        $this->scaleas_previous_salary = $this->Scalea->scaleas_previous_salary;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'grades_id' => 'required:scaleas',
            'phase_emp' => 'required:scaleas',
            'scaleas_salary_grade' => 'required:scaleas',
            'scaleas_salary_stage' => 'required:scaleas',
            'scaleas_amount' => 'required:scaleas',
            'scaleas_salary' => 'required:scaleas',
            'scaleas_minimum_period' => 'required:scaleas',
            'scaleas_previous_salary' => 'required:scaleas',

        ], [
            'grades_id.required' => 'حقل الدرجة الوظيفية مطلوب',
            'phase_emp.required' => 'حقل المرحلة الوظيفية مطلوب',
            'scaleas_salary_grade.required' => 'حقل درجة الراتب مطلوب',
            'scaleas_salary_stage.required' => 'حقل مرحلة الراتب مطلوب',
            'scaleas_amount.required' => 'حقل مقدار العلاوة مطلوب',
            'scaleas_salary.required' => 'حقل الراتب الحالي مطلوب',
            'scaleas_minimum_period.required' => 'حقل المدة الاصغرية مطلوب',
            'scaleas_previous_salary.required' => 'حقل الراتب السابق مطلوب',
        ]);

        $Scaleas = Scaleas::find($this->ScaleaId);
        $Scaleas->update([
            'grades_id' => $this->grades_id,
            'phase_emp' => $this->phase_emp,
            'scaleas_salary_grade' => $this->scaleas_salary_grade,
            'scaleas_salary_stage' => $this->scaleas_salary_stage,
            'scaleas_amount' => $this->scaleas_amount,
            'scaleas_salary' => $this->scaleas_salary,
            'scaleas_minimum_period' => $this->scaleas_minimum_period,
            'scaleas_previous_salary' => $this->scaleas_previous_salary,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Scaleas = Scaleas::find($this->ScaleaId);
        $Scaleas->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات  بنجاح',
            'title' => 'الحذف '
        ]);
    }
}

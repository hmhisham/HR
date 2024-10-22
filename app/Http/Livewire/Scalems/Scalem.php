<?php

namespace App\Http\Livewire\Scalems;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Grades\Grades;
use App\Models\Scalems\Scalems;

class Scalem extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Scalems = [];
    public $ScalemSearch, $Scalem, $ScalemId;
    public $grades_id, $phase_emp, $scalems_salary_grade, $scalems_salary_stage, $scalems_amount, $scalems_salary, $scalems_minimum_period, $scalems_previous_salary;


    public function render()
    {
        $ScalemSearch = '%' . $this->ScalemSearch . '%';
        $Scalems = Scalems::where('grades_id', 'LIKE', $ScalemSearch)
            ->orWhere('phase_emp', 'LIKE', $ScalemSearch)
            ->orWhere('scalems_salary_grade', 'LIKE', $ScalemSearch)
            ->orWhere('scalems_salary_stage', 'LIKE', $ScalemSearch)
            ->orWhere('scalems_amount', 'LIKE', $ScalemSearch)
            ->orWhere('scalems_salary', 'LIKE', $ScalemSearch)
            ->orWhere('scalems_minimum_period', 'LIKE', $ScalemSearch)
            ->orWhere('scalems_previous_salary', 'LIKE', $ScalemSearch)


            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Scalems;
        $this->Scalems = collect($Scalems->items());
        return view('livewire.scalems.scalem', [
            'grades' => Grades::get(),
            'links' => $links
        ]);
    }

    public function AddScalemModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('ScalemModalShow');
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'grades_id' => 'required',
            'phase_emp' => 'required',
            'scalems_salary_grade' => 'required',
            'scalems_salary_stage' => 'required',
            'scalems_amount' => 'required',
            'scalems_salary' => 'required',
            'scalems_minimum_period' => 'required',
            'scalems_previous_salary' => 'required',
        ], [
            'grades_id.required' => 'حقل الدرجة الوظيفية مطلوب',
            'phase_emp.required' => 'حقل المرحلة الوظيفية مطلوب',
            'scalems_salary_grade.required' => 'حقل درجة الراتب مطلوب',
            'scalems_salary_stage.required' => 'حقل مرحلة الراتب مطلوب',
            'scalems_amount.required' => 'حقل مقدار العلاوة مطلوب',
            'scalems_salary.required' => 'حقل الراتب الحالي مطلوب',
            'scalems_minimum_period.required' => 'حقل المدة الاصغرية مطلوب',
            'scalems_previous_salary.required' => 'حقل الراتب السابق مطلوب',

        ]);

        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);
        Scalems::create([
            'grades_id' => $this->grades_id,
            'phase_emp' => $this->phase_emp,
            'scalems_salary_grade' => $this->scalems_salary_grade,
            'scalems_salary_stage' => $this->scalems_salary_stage,
            'scalems_amount' => $this->scalems_amount,
            'scalems_salary' => $this->scalems_salary,
            'scalems_minimum_period' => $this->scalems_minimum_period,
            'scalems_previous_salary' => $this->scalems_previous_salary,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetScalem($ScalemId)
    {
        $this->resetValidation();

        $this->Scalem  = Scalems::find($ScalemId);
        $this->ScalemId = $this->Scalem->id;
        $this->grades_id = $this->Scalem->grades_id;
        $this->phase_emp = $this->Scalem->phase_emp;
        $this->scalems_salary_grade = $this->Scalem->scalems_salary_grade;
        $this->scalems_salary_stage = $this->Scalem->scalems_salary_stage;
        $this->scalems_amount = $this->Scalem->scalems_amount;
        $this->scalems_salary = $this->Scalem->scalems_salary;
        $this->scalems_minimum_period = $this->Scalem->scalems_minimum_period;
        $this->scalems_previous_salary = $this->Scalem->scalems_previous_salary;
    }

    public function update()
    {
        $this->resetValidation();

        $this->validate([
            'grades_id' => 'required',
            'phase_emp' => 'required',
            'scalems_salary_grade' => 'required',
            'scalems_salary_stage' => 'required',
            'scalems_amount' => 'required',
            'scalems_salary' => 'required',
            'scalems_minimum_period' => 'required',
            'scalems_previous_salary' => 'required',
        ], [
            'grades_id.required' => 'حقل الدرجة الوظيفية مطلوب',
            'phase_emp.required' => 'حقل المرحلة الوظيفية مطلوب',
            'scalems_salary_grade.required' => 'حقل درجة الراتب مطلوب',
            'scalems_salary_stage.required' => 'حقل مرحلة الراتب مطلوب',
            'scalems_amount.required' => 'حقل مقدار العلاوة مطلوب',
            'scalems_salary.required' => 'حقل الراتب الحالي مطلوب',
            'scalems_minimum_period.required' => 'حقل المدة الاصغرية مطلوب',
            'scalems_previous_salary.required' => 'حقل الراتب السابق مطلوب',

        ]);



        $Scalems = Scalems::find($this->ScalemId);
        $Scalems->update([
            'grades_id' => $this->grades_id,
            'phase_emp' => $this->phase_emp,
            'scalems_salary_grade' => $this->scalems_salary_grade,
            'scalems_salary_stage' => $this->scalems_salary_stage,
            'scalems_amount' => $this->scalems_amount,
            'scalems_salary' => $this->scalems_salary,
            'scalems_minimum_period' => $this->scalems_minimum_period,
            'scalems_previous_salary' => $this->scalems_previous_salary,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Scalems = Scalems::find($this->ScalemId);
        $Scalems->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات  بنجاح',
            'title' => 'الحذف '
        ]);
    }
}

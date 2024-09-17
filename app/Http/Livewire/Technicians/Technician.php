<?php
namespace App\Http\Livewire\Technicians;
use Livewire\Component;
  
 use Livewire\WithPagination;
use App\Models\Technicians\Technicians;
 
class Technician extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Technicians = [];
     public $TechnicianSearch, $Technician, $TechnicianId;
    public $grades_id,$phase_emp,$technicians_salary_grade,$technicians_salary_stage,$technicians_amount,$technicians_salary,$technicians_minimum_period,$technicians_previous_salary;


    Public function render()
    {
        $TechnicianSearch ='%' . $this->TechnicianSearch . '%';
        $Technicians = Technicians::where('grades_id', 'LIKE', $TechnicianSearch)
->orWhere('phase_emp', 'LIKE', $TechnicianSearch)
->orWhere('technicians_salary_grade', 'LIKE', $TechnicianSearch)
->orWhere('technicians_salary_stage', 'LIKE', $TechnicianSearch)
->orWhere('technicians_amount', 'LIKE', $TechnicianSearch)
->orWhere('technicians_salary', 'LIKE', $TechnicianSearch)
->orWhere('technicians_minimum_period', 'LIKE', $TechnicianSearch)
->orWhere('technicians_previous_salary', 'LIKE', $TechnicianSearch)
 
 
         ->orderBy('id', 'ASC')
         ->paginate(10); 
        $links = $Technicians;
        $this->Technicians = collect($Technicians->items());
        return view('livewire.technicians.technician', [
            'links' => $links
        ]);
    }

    public function AddTechnicianModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('TechnicianModalShow');
    }

 
    public function store()
    {
        $this->resetValidation();
         $this->validate(['grades_id' => 'required' ,
'phase_emp' => 'required' ,
'technicians_salary_grade' => 'required' ,
'technicians_salary_stage' => 'required' ,
'technicians_amount' => 'required' ,
'technicians_salary' => 'required' ,
'technicians_minimum_period' => 'required' ,
'technicians_previous_salary' => 'required' ,

                 ], [
                'grades_id.required' => 'حقل معرّف درجة الموظف مطلوب', 
                'phase_emp.required' => 'حقل المرحلة الوظيفية مطلوب', 
                'technicians_salary_grade.required' => 'حقل درجة الراتب مطلوب', 
                'technicians_salary_stage.required' => 'حقل مرحلة الراتب مطلوب', 
                'technicians_amount.required' => 'حقل مقدار العلاوة مطلوب', 
                'technicians_salary.required' => 'حقل الراتب مطلوب', 
                'technicians_minimum_period.required' => 'حقل المدة الأصغرية بالأشهر مطلوب', 
                'technicians_previous_salary.required' => 'حقل الراتب السابق مطلوب',  ]);
                                 
        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);


        Technicians::create([
'grades_id'=> $this->grades_id,
'phase_emp'=> $this->phase_emp,
'technicians_salary_grade'=> $this->technicians_salary_grade,
'technicians_salary_stage'=> $this->technicians_salary_stage,
'technicians_amount'=> $this->technicians_amount,
'technicians_salary'=> $this->technicians_salary,
'technicians_minimum_period'=> $this->technicians_minimum_period,
'technicians_previous_salary'=> $this->technicians_previous_salary,

]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
        'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

 public function GetTechnician($TechnicianId)
    {
        $this->resetValidation();

        $this-> Technician  = Technicians::find($TechnicianId);
        $this-> TechnicianId = $this->Technician->id;
             $this->grades_id= $this->Technician->grades_id;
      $this->phase_emp= $this->Technician->phase_emp;
      $this->technicians_salary_grade= $this->Technician->technicians_salary_grade;
      $this->technicians_salary_stage= $this->Technician->technicians_salary_stage;
      $this->technicians_amount= $this->Technician->technicians_amount;
      $this->technicians_salary= $this->Technician->technicians_salary;
      $this->technicians_minimum_period= $this->Technician->technicians_minimum_period;
      $this->technicians_previous_salary= $this->Technician->technicians_previous_salary;

    }  
          
 public function update()
    {
        $this->resetValidation();
         $this->validate(['grades_id' => 'required:technicians' ,
'phase_emp' => 'required:technicians' ,
'technicians_salary_grade' => 'required:technicians' ,
'technicians_salary_stage' => 'required:technicians' ,
'technicians_amount' => 'required:technicians' ,
'technicians_salary' => 'required:technicians' ,
'technicians_minimum_period' => 'required:technicians' ,
'technicians_previous_salary' => 'required:technicians' ,

                 ], [
                'grades_id.required' => 'حقل الاسم مطلوب',
                'phase_emp.required' => 'حقل الاسم مطلوب',
                'technicians_salary_grade.required' => 'حقل الاسم مطلوب',
                'technicians_salary_stage.required' => 'حقل الاسم مطلوب',
                'technicians_amount.required' => 'حقل الاسم مطلوب',
                'technicians_salary.required' => 'حقل الاسم مطلوب',
                'technicians_minimum_period.required' => 'حقل الاسم مطلوب',
                'technicians_previous_salary.required' => 'حقل الاسم مطلوب', ]);
                                 
             $Technicians = Technicians::find($this->TechnicianId);     $Technicians->update([
'grades_id'=> $this->grades_id,
'phase_emp'=> $this->phase_emp,
'technicians_salary_grade'=> $this->technicians_salary_grade,
'technicians_salary_stage'=> $this->technicians_salary_stage,
'technicians_amount'=> $this->technicians_amount,
'technicians_salary'=> $this->technicians_salary,
'technicians_minimum_period'=> $this->technicians_minimum_period,
'technicians_previous_salary'=> $this->technicians_previous_salary,

]);
        $this->reset();
         $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
     }
                         
public function destroy()
{
    $Technicians = Technicians::find($this->TechnicianId);

    if ($Technicians) {

        $Technicians->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات بنجاح',
            'title' => 'الحذف'
        ]);
    }
}
}

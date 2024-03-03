<?php
namespace App\Http\Livewire\Scales;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Grades\Grades;
use App\Models\Scales\Scales;

class Scale extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Scales = [];
     public $ScaleSearch, $Scale, $ScaleId;
    public $grades_id,$scales_phase,$scales_salary,$scales_quantity,$scales_period;


    Public function render()
    {
        $ScaleSearch ='%' . $this->ScaleSearch . '%';
        $Scales = Scales::where('grades_id', 'LIKE', $ScaleSearch)
->orWhere('scales_phase', 'LIKE', $ScaleSearch)
->orWhere('scales_salary', 'LIKE', $ScaleSearch)
->orWhere('scales_quantity', 'LIKE', $ScaleSearch)
->orWhere('scales_period', 'LIKE', $ScaleSearch)


         ->orderBy('id', 'ASC')
         ->paginate(10);
        $links = $Scales;
        $this->Scales = collect($Scales->items());
        return view('livewire.scales.scale', [
            'grades' => Grades::get(),
            'links' => $links
        ]);
    }

    public function AddScaleModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('ScaleModalShow');
    }


    public function store()
    {
        $this->resetValidation();
         $this->validate(['grades_id' => 'required|unique:scales' ,
'scales_phase' => 'required|unique:scales' ,
'scales_salary' => 'required|unique:scales' ,
'scales_quantity' => 'required|unique:scales' ,
'scales_period' => 'required|unique:scales' ,

                 ], [
                'grades_id.required' => 'حقل الاسم مطلوب',
                'grades_id.unique' => 'الأسم موجود',
                'scales_phase.required' => 'حقل الاسم مطلوب',
                'scales_phase.unique' => 'الأسم موجود',
                'scales_salary.required' => 'حقل الاسم مطلوب',
                'scales_salary.unique' => 'الأسم موجود',
                'scales_quantity.required' => 'حقل الاسم مطلوب',
                'scales_quantity.unique' => 'الأسم موجود',
                'scales_period.required' => 'حقل الاسم مطلوب',
                'scales_period.unique' => 'الأسم موجود',  ]);

        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);
        Scales::create([
'grades_id'=> $this->grades_id,
'scales_phase'=> $this->scales_phase,
'scales_salary'=> $this->scales_salary,
'scales_quantity'=> $this->scales_quantity,
'scales_period'=> $this->scales_period,

]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
        'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

 public function GetScale($ScaleId)
    {
        $this->resetValidation();

        $this-> Scale  = Scales::find($ScaleId);
        $this-> ScaleId = $this->Scale->id;
             $this->grades_id= $this->Scale->grades_id;
      $this->scales_phase= $this->Scale->scales_phase;
      $this->scales_salary= $this->Scale->scales_salary;
      $this->scales_quantity= $this->Scale->scales_quantity;
      $this->scales_period= $this->Scale->scales_period;

    }

 public function update()
    {
        $this->resetValidation();
         $this->validate(['grades_id' => 'required:scales' ,
'scales_phase' => 'required:scales' ,
'scales_salary' => 'required:scales' ,
'scales_quantity' => 'required:scales' ,
'scales_period' => 'required:scales' ,

                 ], [
                'grades_id.required' => 'حقل الاسم مطلوب',
                'scales_phase.required' => 'حقل الاسم مطلوب',
                'scales_salary.required' => 'حقل الاسم مطلوب',
                'scales_quantity.required' => 'حقل الاسم مطلوب',
                'scales_period.required' => 'حقل الاسم مطلوب', ]);

             $Scales = Scales::find($this->ScaleId);
             $Scales->update([
'grades_id'=> $this->grades_id,
'scales_phase'=> $this->scales_phase,
'scales_salary'=> $this->scales_salary,
'scales_quantity'=> $this->scales_quantity,
'scales_period'=> $this->scales_period,

]);
        $this->reset();
         $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
     }

  public function destroy()
    {
      $Scales = Scales::find($this->ScaleId);
        $Scales->delete();
         $this->reset();
       $this->dispatchBrowserEvent('success', [
      'message' => 'تم حذف البيانات  بنجاح',
      'title' => 'الحذف '
    ]);
    }

 }

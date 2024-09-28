<?php
namespace App\Http\Livewire\Gyears;
use Livewire\Component;
  
 use Livewire\WithPagination;
use App\Models\Gyears\Gyears;
 
class Gyear extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Gyears = [];
     public $GyearSearch, $Gyear, $GyearId;
    public $year;


    Public function render()
    {
        $GyearSearch ='%' . $this->GyearSearch . '%';
        $Gyears = Gyears::where('year', 'LIKE', $GyearSearch)
 
 
         ->orderBy('id', 'ASC')
         ->paginate(10); 
        $links = $Gyears;
        $this->Gyears = collect($Gyears->items());
        return view('livewire.gyears.gyear', [
            'links' => $links
        ]);
    }

    public function AddGyearModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('GyearModalShow');
    }

 
    public function store()
    {
        $this->resetValidation();
         $this->validate(['year' => 'required' ,

                 ], [
                'year.required' => 'حقل سنة التخرج مطلوب',  ]);
                                 
        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);


        Gyears::create([
'year'=> $this->year,

]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
        'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

 public function GetGyear($GyearId)
    {
        $this->resetValidation();

        $this-> Gyear  = Gyears::find($GyearId);
        $this-> GyearId = $this->Gyear->id;
             $this->year= $this->Gyear->year;

    }  
          
 public function update()
    {
        $this->resetValidation();
         $this->validate(['year' => 'required:gyears' ,

                 ], [
                'year.required' => 'حقل سنة التخرج مطلوب', ]);
                                 
             $Gyears = Gyears::find($this->GyearId);     $Gyears->update([
'year'=> $this->year,

]);
        $this->reset();
         $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
     }
                         
public function destroy()
{
    $Gyears = Gyears::find($this->GyearId);

    if ($Gyears) {

        $Gyears->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات بنجاح',
            'title' => 'الحذف'
        ]);
    }
}
}

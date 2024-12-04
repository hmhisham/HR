<?php
namespace App\Http\Livewire\Counties;
use Livewire\Component;
  
 use Livewire\WithPagination;
use App\Models\Counties\Counties;
 
class countie extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Counties = [];
     public $countieSearch, $countie, $countieId;
    public $user_id,$district_number,$district_name;


    Public function render()
    {
        $countieSearch ='%' . $this->countieSearch . '%';
        $Counties = Counties::where('user_id', 'LIKE', $countieSearch)
->orWhere('district_number', 'LIKE', $countieSearch)
->orWhere('district_name', 'LIKE', $countieSearch)
 
 
         ->orderBy('id', 'ASC')
         ->paginate(10); 
        $links = $Counties;
        $this->Counties = collect($Counties->items());
        return view('livewire.counties.countie', [
            'links' => $links
        ]);
    }

    public function AddcountieModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('countieModalShow');
    }

 
    public function store()
    {
        $this->resetValidation();
         $this->validate(['user_id' => 'required' ,
'district_number' => 'required' ,
'district_name' => 'required' ,

                 ], [
                'user_id.required' => 'حقل رقم المستخدم مطلوب', 
                'district_number.required' => 'حقل رقم المقاطعة مطلوب', 
                'district_name.required' => 'حقل اسم المقاطعة مطلوب',  ]);
                                 
        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);


        Counties::create([
'user_id'=> $this->user_id,
'district_number'=> $this->district_number,
'district_name'=> $this->district_name,

]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
        'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

 public function Getcountie($countieId)
    {
        $this->resetValidation();

        $this-> countie  = Counties::find($countieId);
        $this-> countieId = $this->countie->id;
             $this->user_id= $this->countie->user_id;
      $this->district_number= $this->countie->district_number;
      $this->district_name= $this->countie->district_name;

    }  
          
 public function update()
    {
        $this->resetValidation();
         $this->validate(['user_id' => 'required:counties' ,
'district_number' => 'required:counties' ,
'district_name' => 'required:counties' ,

                 ], [
                'user_id.required' => 'حقل رقم المستخدم مطلوب',
                'district_number.required' => 'حقل رقم المقاطعة مطلوب',
                'district_name.required' => 'حقل اسم المقاطعة مطلوب', ]);
                                 
             $Counties = Counties::find($this->countieId);     $Counties->update([
'user_id'=> $this->user_id,
'district_number'=> $this->district_number,
'district_name'=> $this->district_name,

]);
        $this->reset();
         $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
     }
                         
public function destroy()
{
    $Counties = Counties::find($this->countieId);

    if ($Counties) {

        $Counties->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات بنجاح',
            'title' => 'الحذف'
        ]);
    }
}
}

<?php
namespace App\Http\Livewire\Boycotts;
use Livewire\Component;
  
 use Livewire\WithPagination;
use App\Models\Boycotts\Boycotts;
 
class Boycott extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Boycotts = [];
     public $BoycottSearch, $Boycott, $BoycottId;
    public $boycott_number,$boycott_name;


    Public function render()
    {
        $BoycottSearch ='%' . $this->BoycottSearch . '%';
        $Boycotts = Boycotts::where('boycott_number', 'LIKE', $BoycottSearch)
->orWhere('boycott_name', 'LIKE', $BoycottSearch)
 
 
         ->orderBy('id', 'ASC')
         ->paginate(10); 
        $links = $Boycotts;
        $this->Boycotts = collect($Boycotts->items());
        return view('livewire.boycotts.boycott', [
            'links' => $links
        ]);
    }

    public function AddBoycottModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('BoycottModalShow');
    }

 
    public function store()
    {
        $this->resetValidation();
         $this->validate(['boycott_number' => 'required' ,
'boycott_name' => 'required' ,

                 ], [
                'boycott_number.required' => 'حقل رقم المقاطعة مطلوب', 
                'boycott_name.required' => 'حقل اسم المقاطعة مطلوب',  ]);
                                 
        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);


        Boycotts::create([
'boycott_number'=> $this->boycott_number,
'boycott_name'=> $this->boycott_name,

]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
        'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

 public function GetBoycott($BoycottId)
    {
        $this->resetValidation();

        $this-> Boycott  = Boycotts::find($BoycottId);
        $this-> BoycottId = $this->Boycott->id;
             $this->boycott_number= $this->Boycott->boycott_number;
      $this->boycott_name= $this->Boycott->boycott_name;

    }  
          
 public function update()
    {
        $this->resetValidation();
         $this->validate(['boycott_number' => 'required:boycotts' ,
'boycott_name' => 'required:boycotts' ,

                 ], [
                'boycott_number.required' => 'حقل رقم المقاطعة مطلوب',
                'boycott_name.required' => 'حقل اسم المقاطعة مطلوب', ]);
                                 
             $Boycotts = Boycotts::find($this->BoycottId);     $Boycotts->update([
'boycott_number'=> $this->boycott_number,
'boycott_name'=> $this->boycott_name,

]);
        $this->reset();
         $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
     }
                         
public function destroy()
{
    $Boycotts = Boycotts::find($this->BoycottId);

    if ($Boycotts) {

        $Boycotts->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات بنجاح',
            'title' => 'الحذف'
        ]);
    }
}
}

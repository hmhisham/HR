<?php
namespace App\Http\Livewire\Propertytypes;
use Livewire\Component;
  
 use Livewire\WithPagination;
use App\Models\Propertytypes\Propertytypes;
 
class Propertytype extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Propertytypes = [];
     public $PropertytypeSearch, $Propertytype, $PropertytypeId;
    public $type_name;


    Public function render()
    {
        $PropertytypeSearch ='%' . $this->PropertytypeSearch . '%';
        $Propertytypes = Propertytypes::where('type_name', 'LIKE', $PropertytypeSearch)
 
 
         ->orderBy('id', 'ASC')
         ->paginate(10); 
        $links = $Propertytypes;
        $this->Propertytypes = collect($Propertytypes->items());
        return view('livewire.propertytypes.propertytype', [
            'links' => $links
        ]);
    }

    public function AddPropertytypeModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('PropertytypeModalShow');
    }

 
    public function store()
    {
        $this->resetValidation();
         $this->validate(['type_name' => 'required' ,

                 ], [
                'type_name.required' => 'حقل اسم النوع مطلوب',  ]);
                                 
        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);


        Propertytypes::create([
'type_name'=> $this->type_name,

]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
        'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

 public function GetPropertytype($PropertytypeId)
    {
        $this->resetValidation();

        $this-> Propertytype  = Propertytypes::find($PropertytypeId);
        $this-> PropertytypeId = $this->Propertytype->id;
             $this->type_name= $this->Propertytype->type_name;

    }  
          
 public function update()
    {
        $this->resetValidation();
         $this->validate(['type_name' => 'required:propertytypes' ,

                 ], [
                'type_name.required' => 'حقل اسم النوع مطلوب', ]);
                                 
             $Propertytypes = Propertytypes::find($this->PropertytypeId);     $Propertytypes->update([
'type_name'=> $this->type_name,

]);
        $this->reset();
         $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
     }
                         
public function destroy()
{
    $Propertytypes = Propertytypes::find($this->PropertytypeId);

    if ($Propertytypes) {

        $Propertytypes->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات بنجاح',
            'title' => 'الحذف'
        ]);
    }
}
}

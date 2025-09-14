<?php
namespace App\Http\Livewire\Propertylocation;
use Livewire\Component;
  
 use Livewire\WithPagination;
use App\Models\Propertylocation\Propertylocation;
 
class Propertylocatio extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Propertylocation = [];
     public $PropertylocatioSearch, $Propertylocatio, $PropertylocatioId;
    public $property_location;
Public $search = ['property_location' => ''];
 
        Public Function render()
    {
        
 $property_locationSearch = '%' . $this->search['property_location'] . '%';
$Propertylocation = Propertylocation::query()
 ->when($this->search['property_location'], function ($query) use ($property_locationSearch) {
                $query->where('property_location', 'LIKE', $property_locationSearch);
            })

            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Propertylocation;
        $this->Propertylocation = collect($Propertylocation->items());
                Return View('livewire.propertylocation.propertylocatio', [
            'Propertylocation' => $Propertylocation,
            'links' => $links
        ]);
    }


     Public function AddPropertylocatioModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('PropertylocatioModalShow');
    }


    Public function store()
    {
        $this->resetValidation();
         $this->validate(['property_location' => 'required' ,

                 ], [
                'property_location.required' => 'حقل موقع العقار مطلوب',  ]);
                                 
        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);


        Propertylocation::create([
'property_location'=> $this->property_location,

]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
        'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

 public function GetPropertylocatio($PropertylocatioId)
    {
        $this->resetValidation();

        $this-> Propertylocatio  = Propertylocation::find($PropertylocatioId);
        $this-> PropertylocatioId = $this->Propertylocatio->id;
             $this->property_location= $this->Propertylocatio->property_location;

    }  
          
 public function update()
    {
        $this->resetValidation();
         $this->validate(['property_location' => 'required:propertylocation' ,

                 ], [
                'property_location.required' => 'حقل موقع العقار مطلوب', ]);
                                 
             $Propertylocation = Propertylocation::find($this->PropertylocatioId);     $Propertylocation->update([
'property_location'=> $this->property_location,

]);
        $this->reset();
         $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
     }
                         
public function destroy()
{
    $Propertylocation = Propertylocation::find($this->PropertylocatioId);

    if ($Propertylocation) {

        $Propertylocation->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات بنجاح',
            'title' => 'الحذف'
        ]);
    }
}
}

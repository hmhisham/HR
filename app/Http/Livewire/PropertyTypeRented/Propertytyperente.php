<?php
namespace App\Http\Livewire\Propertytyperented;
use Livewire\Component;
  
 use Livewire\WithPagination;
use App\Models\Propertytyperented\Propertytyperented;
 
class Propertytyperente extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Propertytyperented = [];
     public $PropertytyperenteSearch, $Propertytyperente, $PropertytyperenteId;
    public $property_type_rented;
Public $search = ['property_type_rented' => ''];
 
        Public Function render()
    {
        
 $property_type_rentedSearch = '%' . $this->search['property_type_rented'] . '%';
$Propertytyperented = Propertytyperented::query()
 ->when($this->search['property_type_rented'], function ($query) use ($property_type_rentedSearch) {
                $query->where('property_type_rented', 'LIKE', $property_type_rentedSearch);
            })

            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Propertytyperented;
        $this->Propertytyperented = collect($Propertytyperented->items());
                Return View('livewire.propertytyperented.propertytyperente', [
            'Propertytyperented' => $Propertytyperented,
            'links' => $links
        ]);
    }


     Public function AddPropertytyperenteModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('PropertytyperenteModalShow');
    }


    Public function store()
    {
        $this->resetValidation();
         $this->validate(['property_type_rented' => 'required' ,

                 ], [
                'property_type_rented.required' => 'حقل نوع عقار المؤجر مطلوب',  ]);
                                 
        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);


        Propertytyperented::create([
'property_type_rented'=> $this->property_type_rented,

]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
        'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

 public function GetPropertytyperente($PropertytyperenteId)
    {
        $this->resetValidation();

        $this-> Propertytyperente  = Propertytyperented::find($PropertytyperenteId);
        $this-> PropertytyperenteId = $this->Propertytyperente->id;
             $this->property_type_rented= $this->Propertytyperente->property_type_rented;

    }  
          
 public function update()
    {
        $this->resetValidation();
         $this->validate(['property_type_rented' => 'required:propertytyperented' ,

                 ], [
                'property_type_rented.required' => 'حقل نوع عقار المؤجر مطلوب', ]);
                                 
             $Propertytyperented = Propertytyperented::find($this->PropertytyperenteId);     $Propertytyperented->update([
'property_type_rented'=> $this->property_type_rented,

]);
        $this->reset();
         $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
     }
                         
public function destroy()
{
    $Propertytyperented = Propertytyperented::find($this->PropertytyperenteId);

    if ($Propertytyperented) {

        $Propertytyperented->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات بنجاح',
            'title' => 'الحذف'
        ]);
    }
}
}

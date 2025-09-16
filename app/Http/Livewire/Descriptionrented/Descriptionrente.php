<?php
namespace App\Http\Livewire\Descriptionrented;
use Livewire\Component;
  
 use Livewire\WithPagination;
use App\Models\Descriptionrented\Descriptionrented;
 
class Descriptionrente extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Descriptionrented = [];
     public $DescriptionrenteSearch, $Descriptionrente, $DescriptionrenteId;
    public $description;
Public $search = ['description' => ''];
 
        Public Function render()
    {
        
 $descriptionSearch = '%' . $this->search['description'] . '%';
$Descriptionrented = Descriptionrented::query()
 ->when($this->search['description'], function ($query) use ($descriptionSearch) {
                $query->where('description', 'LIKE', $descriptionSearch);
            })

            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Descriptionrented;
        $this->Descriptionrented = collect($Descriptionrented->items());
                Return View('livewire.descriptionrented.descriptionrente', [
            'Descriptionrented' => $Descriptionrented,
            'links' => $links
        ]);
    }


     Public function AddDescriptionrenteModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('DescriptionrenteModalShow');
    }


    Public function store()
    {
        $this->resetValidation();
         $this->validate(['description' => 'required' ,

                 ], [
                'description.required' => 'حقل صفة العقار المؤجر مطلوب',  ]);
                                 
        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);


        Descriptionrented::create([
'description'=> $this->description,

]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
        'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

 public function GetDescriptionrente($DescriptionrenteId)
    {
        $this->resetValidation();

        $this-> Descriptionrente  = Descriptionrented::find($DescriptionrenteId);
        $this-> DescriptionrenteId = $this->Descriptionrente->id;
             $this->description= $this->Descriptionrente->description;

    }  
          
 public function update()
    {
        $this->resetValidation();
         $this->validate(['description' => 'required:descriptionrented' ,

                 ], [
                'description.required' => 'حقل صفة العقار المؤجر مطلوب', ]);
                                 
             $Descriptionrented = Descriptionrented::find($this->DescriptionrenteId);     $Descriptionrented->update([
'description'=> $this->description,

]);
        $this->reset();
         $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
     }
                         
public function destroy()
{
    $Descriptionrented = Descriptionrented::find($this->DescriptionrenteId);

    if ($Descriptionrented) {

        $Descriptionrented->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات بنجاح',
            'title' => 'الحذف'
        ]);
    }
}
}

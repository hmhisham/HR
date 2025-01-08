<?php
namespace App\Http\Livewire\Propertycategory;
use Livewire\Component;
  
 use Livewire\WithPagination;
use App\Models\Propertycategory\Propertycategory;
 
class propertycategor extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Propertycategory = [];
     public $propertycategorSearch, $propertycategor, $propertycategorId;
    public $category,$notes;


    Public function render()
    {
        $propertycategorSearch ='%' . $this->propertycategorSearch . '%';
        $Propertycategory = Propertycategory::where('category', 'LIKE', $propertycategorSearch)
->orWhere('notes', 'LIKE', $propertycategorSearch)
 
 
         ->orderBy('id', 'ASC')
         ->paginate(10); 
        $links = $Propertycategory;
        $this->Propertycategory = collect($Propertycategory->items());
        return view('livewire.propertycategory.propertycategor', [
            'links' => $links
        ]);
    }
     public function AddpropertycategorModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('propertycategorModalShow');
    }

 
    public function store()
    {
        $this->resetValidation();
         $this->validate(['category' => 'required' ,
'notes' => 'required' ,

                 ], [
                'category.required' => 'حقل نوع العقار مطلوب', 
                'notes.required' => 'حقل ملاحظات مطلوب',  ]);
                                 
        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);


        Propertycategory::create([
'category'=> $this->category,
'notes'=> $this->notes,

]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
        'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

 public function Getpropertycategor($propertycategorId)
    {
        $this->resetValidation();

        $this-> propertycategor  = Propertycategory::find($propertycategorId);
        $this-> propertycategorId = $this->propertycategor->id;
             $this->category= $this->propertycategor->category;
      $this->notes= $this->propertycategor->notes;

    }  
          
 public function update()
    {
        $this->resetValidation();
         $this->validate(['category' => 'required:propertycategory' ,
'notes' => 'required:propertycategory' ,

                 ], [
                'category.required' => 'حقل نوع العقار مطلوب',
                'notes.required' => 'حقل ملاحظات مطلوب', ]);
                                 
             $Propertycategory = Propertycategory::find($this->propertycategorId);     $Propertycategory->update([
'category'=> $this->category,
'notes'=> $this->notes,

]);
        $this->reset();
         $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
     }
                         
public function destroy()
{
    $Propertycategory = Propertycategory::find($this->propertycategorId);

    if ($Propertycategory) {

        $Propertycategory->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات بنجاح',
            'title' => 'الحذف'
        ]);
    }
}
}

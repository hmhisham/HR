<?php
namespace App\Http\Livewire\Childrens;
use Livewire\Component;
  
 use Livewire\WithPagination;
use App\Models\Childrens\Childrens;
 
class Children extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Childrens = [];
     public $ChildrenSearch, $Children, $ChildrenId;
    public $wives_id,$first_name,$father_name,$grandfather_name,$great_grandfather_name,$surname,$full_name,$birth_date,$marital_status,$gender,$is_counted,$occupational_status,$national_id;


    Public function render()
    {
        $ChildrenSearch ='%' . $this->ChildrenSearch . '%';
        $Childrens = Childrens::where('wives_id', 'LIKE', $ChildrenSearch)
->orWhere('first_name', 'LIKE', $ChildrenSearch)
->orWhere('father_name', 'LIKE', $ChildrenSearch)
->orWhere('grandfather_name', 'LIKE', $ChildrenSearch)
->orWhere('great_grandfather_name', 'LIKE', $ChildrenSearch)
->orWhere('surname', 'LIKE', $ChildrenSearch)
->orWhere('full_name', 'LIKE', $ChildrenSearch)
->orWhere('birth_date', 'LIKE', $ChildrenSearch)
->orWhere('marital_status', 'LIKE', $ChildrenSearch)
->orWhere('gender', 'LIKE', $ChildrenSearch)
->orWhere('is_counted', 'LIKE', $ChildrenSearch)
->orWhere('occupational_status', 'LIKE', $ChildrenSearch)
->orWhere('national_id', 'LIKE', $ChildrenSearch)
 
 
         ->orderBy('id', 'ASC')
         ->paginate(10); 
        $links = $Childrens;
        $this->Childrens = collect($Childrens->items());
        return view('livewire.childrens.children', [
            'links' => $links
        ]);
    }

    public function AddChildrenModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('ChildrenModalShow');
    }

 
    public function store()
    {
        $this->resetValidation();
         $this->validate(['wives_id' => 'required' ,
'first_name' => 'required' ,
'father_name' => 'required' ,
'grandfather_name' => 'required' ,
'great_grandfather_name' => 'required' ,
'surname' => 'required' ,
'full_name' => 'required' ,
'birth_date' => 'required' ,
'marital_status' => 'required' ,
'gender' => 'required' ,
'is_counted' => 'required' ,
'occupational_status' => 'required' ,
'national_id' => 'required' ,

                 ], [
                'wives_id.required' => 'حقل اسم الام مطلوب', 
                'first_name.required' => 'حقل الاسم الأول مطلوب', 
                'father_name.required' => 'حقل اسم الأب مطلوب', 
                'grandfather_name.required' => 'حقل اسم الجد مطلوب', 
                'great_grandfather_name.required' => 'حقل اسم والد الجد مطلوب', 
                'surname.required' => 'حقل اللقب مطلوب', 
                'full_name.required' => 'حقل الاسم الكامل مطلوب', 
                'birth_date.required' => 'حقل تاريخ الميلاد مطلوب', 
                'marital_status.required' => 'حقل الحالة الزوجية مطلوب', 
                'gender.required' => 'حقل الجنس مطلوب', 
                'is_counted.required' => 'حقل هل يتم احتسابه مطلوب', 
                'occupational_status.required' => 'حقل الحالة الدراسية مطلوب', 
                'national_id.required' => 'حقل رقم البطاقة الوطنية مطلوب',  ]);
                                 
        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);


        Childrens::create([
'wives_id'=> $this->wives_id,
'first_name'=> $this->first_name,
'father_name'=> $this->father_name,
'grandfather_name'=> $this->grandfather_name,
'great_grandfather_name'=> $this->great_grandfather_name,
'surname'=> $this->surname,
'full_name'=> $this->full_name,
'birth_date'=> $this->birth_date,
'marital_status'=> $this->marital_status,
'gender'=> $this->gender,
'is_counted'=> $this->is_counted,
'occupational_status'=> $this->occupational_status,
'national_id'=> $this->national_id,

]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
        'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

 public function GetChildren($ChildrenId)
    {
        $this->resetValidation();

        $this-> Children  = Childrens::find($ChildrenId);
        $this-> ChildrenId = $this->Children->id;
             $this->wives_id= $this->Children->wives_id;
      $this->first_name= $this->Children->first_name;
      $this->father_name= $this->Children->father_name;
      $this->grandfather_name= $this->Children->grandfather_name;
      $this->great_grandfather_name= $this->Children->great_grandfather_name;
      $this->surname= $this->Children->surname;
      $this->full_name= $this->Children->full_name;
      $this->birth_date= $this->Children->birth_date;
      $this->marital_status= $this->Children->marital_status;
      $this->gender= $this->Children->gender;
      $this->is_counted= $this->Children->is_counted;
      $this->occupational_status= $this->Children->occupational_status;
      $this->national_id= $this->Children->national_id;

    }  
          
 public function update()
    {
        $this->resetValidation();
         $this->validate(['wives_id' => 'required:childrens' ,
'first_name' => 'required:childrens' ,
'father_name' => 'required:childrens' ,
'grandfather_name' => 'required:childrens' ,
'great_grandfather_name' => 'required:childrens' ,
'surname' => 'required:childrens' ,
'full_name' => 'required:childrens' ,
'birth_date' => 'required:childrens' ,
'marital_status' => 'required:childrens' ,
'gender' => 'required:childrens' ,
'is_counted' => 'required:childrens' ,
'occupational_status' => 'required:childrens' ,
'national_id' => 'required:childrens' ,

                 ], [
                'wives_id.required' => 'حقل اسم الام مطلوب',
                'first_name.required' => 'حقل الاسم الأول مطلوب',
                'father_name.required' => 'حقل اسم الأب مطلوب',
                'grandfather_name.required' => 'حقل اسم الجد مطلوب',
                'great_grandfather_name.required' => 'حقل اسم والد الجد مطلوب',
                'surname.required' => 'حقل اللقب مطلوب',
                'full_name.required' => 'حقل الاسم الكامل مطلوب',
                'birth_date.required' => 'حقل تاريخ الميلاد مطلوب',
                'marital_status.required' => 'حقل الحالة الزوجية مطلوب',
                'gender.required' => 'حقل الجنس مطلوب',
                'is_counted.required' => 'حقل هل يتم احتسابه مطلوب',
                'occupational_status.required' => 'حقل الحالة الدراسية مطلوب',
                'national_id.required' => 'حقل رقم البطاقة الوطنية مطلوب', ]);
                                 
             $Childrens = Childrens::find($this->ChildrenId);     $Childrens->update([
'wives_id'=> $this->wives_id,
'first_name'=> $this->first_name,
'father_name'=> $this->father_name,
'grandfather_name'=> $this->grandfather_name,
'great_grandfather_name'=> $this->great_grandfather_name,
'surname'=> $this->surname,
'full_name'=> $this->full_name,
'birth_date'=> $this->birth_date,
'marital_status'=> $this->marital_status,
'gender'=> $this->gender,
'is_counted'=> $this->is_counted,
'occupational_status'=> $this->occupational_status,
'national_id'=> $this->national_id,

]);
        $this->reset();
         $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
     }
                         
public function destroy()
{
    $Childrens = Childrens::find($this->ChildrenId);

    if ($Childrens) {

        $Childrens->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات بنجاح',
            'title' => 'الحذف'
        ]);
    }
}
}

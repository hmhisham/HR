<?php
namespace App\Http\Livewire\Department;
use Livewire\Component;
  
 use Livewire\WithPagination;
use App\Models\Department\Department;
 
class Departmen extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Department = [];
     public $DepartmenSearch, $Departmen, $DepartmenId;
    public $department_name;


    Public function render()
    {
        $DepartmenSearch ='%' . $this->DepartmenSearch . '%';
        $Department = Department::where('department_name', 'LIKE', $DepartmenSearch)
 
 
         ->orderBy('id', 'ASC')
         ->paginate(10); 
        $links = $Department;
        $this->Department = collect($Department->items());
        return view('livewire.department.departmen', [
            'links' => $links
        ]);
    }

    public function AddDepartmenModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('DepartmenModalShow');
    }

 
    public function store()
    {
        $this->resetValidation();
         $this->validate(['department_name' => 'required' ,

                 ], [
                'department_name.required' => 'حقل اسم الدائرة مطلوب',  ]);
                                 
        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);


        Department::create([
'department_name'=> $this->department_name,

]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
        'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

 public function GetDepartmen($DepartmenId)
    {
        $this->resetValidation();

        $this-> Departmen  = Department::find($DepartmenId);
        $this-> DepartmenId = $this->Departmen->id;
             $this->department_name= $this->Departmen->department_name;

    }  
          
 public function update()
    {
        $this->resetValidation();
         $this->validate(['department_name' => 'required:department' ,

                 ], [
                'department_name.required' => 'حقل الاسم مطلوب', ]);
                                 
             $Department = Department::find($this->DepartmenId);     $Department->update([
'department_name'=> $this->department_name,

]);
        $this->reset();
         $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
     }
                         
public function destroy()
{
    $Department = Department::find($this->DepartmenId);

    if ($Department) {

        $Department->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات بنجاح',
            'title' => 'الحذف'
        ]);
    }
}
}

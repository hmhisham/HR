<?php
namespace App\Http\Livewire\Specialtys;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Specialtys\Specialtys;
class Specialty extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Specialtys = [];
     public $SpecialtySearch, $Specialty, $SpecialtyId;
    public $specialtys_code,$specialtys_name;


    Public function render()
    {
        $SpecialtySearch ='%' . $this->SpecialtySearch . '%';
        $Specialtys = Specialtys::where('specialtys_code', 'LIKE', $SpecialtySearch)
->orWhere('specialtys_name', 'LIKE', $SpecialtySearch)


         ->orderBy('id', 'ASC')
         ->paginate(10);
        $links = $Specialtys;
        $this->Specialtys = collect($Specialtys->items());
        return view('livewire.specialtys.specialty', [
            'links' => $links
        ]);
    }

    public function AddSpecialtyModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('SpecialtyModalShow');
    }


    public function store()
    {
        $this->resetValidation();
         $this->validate(['specialtys_code' => 'required|unique:specialtys' ,
'specialtys_name' => 'required|unique:specialtys' ,

                 ], [
                'specialtys_code.required' => 'حقل الاسم مطلوب',
                'specialtys_code.unique' => 'الأسم موجود',
                'specialtys_name.required' => 'حقل الاسم مطلوب',
                'specialtys_name.unique' => 'الأسم موجود',  ]);

        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);
        Specialtys::create([
'specialtys_code'=> $this->specialtys_code,
'specialtys_name'=> $this->specialtys_name,

]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
        'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

 public function GetSpecialty($SpecialtyId)
    {
        $this->resetValidation();

        $this-> Specialty  = Specialtys::find($SpecialtyId);
        $this-> SpecialtyId = $this->Specialty->id;
             $this->specialtys_code= $this->Specialty->specialtys_code;
      $this->specialtys_name= $this->Specialty->specialtys_name;

    }

 public function update()
    {
        $this->resetValidation();
         $this->validate(['specialtys_code' => 'required:specialtys' ,
'specialtys_name' => 'required:specialtys' ,

                 ], [
                'specialtys_code.required' => 'حقل الاسم مطلوب',
                'specialtys_name.required' => 'حقل الاسم مطلوب', ]);

             $Specialtys = Specialtys::find($this->SpecialtyId);
             $Specialtys->update([
'specialtys_code'=> $this->specialtys_code,
'specialtys_name'=> $this->specialtys_name,

]);
        $this->reset();
         $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
     }

  public function destroy()
    {
      $Specialtys = Specialtys::find($this->SpecialtyId);
        $Specialtys->delete();
         $this->reset();
       $this->dispatchBrowserEvent('success', [
      'message' => 'تم حذف البيانات  بنجاح',
      'title' => 'الحذف '
    ]);
    }

 }
   
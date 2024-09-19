<?php

namespace App\Http\Livewire\Wives;

use Livewire\Component;

use App\Models\Wives\Wives;
use Livewire\WithPagination;
use App\Models\Department\Department;

class Wive extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $department= [];
    public $Wives = [];
    public $WiveSearch, $Wive, $WiveId ;
    public $first_name, $father_name, $grandfather_name, $great_grandfather_name, $surname, $full_name, $marital_status, $occupational_status, $organization_name, $is_married, $national_id;


    protected $listeners = [
      'SelectGrantor',
    ];



    public function hydrate()
    {
        $this->emit('select2');
    }


    public function mount()
    {

        $this->department = Department::all();
    }


    public function SelectGrantor($organization_nameID)
    {
        $organization_name = Department::find($organization_nameID);
         if ($organization_name) {
            $this->organization_name = $organization_nameID;
              } else {
            $this->organization_name = null;
        }
    }

    // public function SelectGrantor($organizationID)
    // {
    //     $organization = Department::where('organization_name', $organizationID)->first();

    //     if ($organization) {
    //         $this->organization_name = $organization->organization_name;
    //     } else {
    //         $this->organization_name = null;
    //         $this->dispatchBrowserEvent('error', ['message' => 'Organization not found']);
    //     }
    // }



    public function updated($field)
    {
        // تحديث الاسم الكامل عندما يتغير أي من الحقول
        $this->generateFullName();
    }

    public function generateFullName()
    {
        // توليد الاسم الكامل بناءً على الحقول المدخلة
        $this->full_name = trim("{$this->first_name} {$this->father_name} {$this->grandfather_name} {$this->great_grandfather_name} {$this->surname}");
    }

    public function render()
    {
        $WiveSearch = '%' . $this->WiveSearch . '%';
        $Wives = Wives:: Where('full_name', 'LIKE', $WiveSearch)
                       ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Wives;
        $this->Wives = collect($Wives->items());
        return view('livewire.wives.wive', [
            'links' => $links
        ]);
    }

    public function AddWiveModalShow()
    {

        // $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('WiveModalShow');
    }


    public function store()

    {
        $this->resetValidation();
        $this->validate([
            'first_name' => 'required',
            'father_name' => 'required',
            'grandfather_name' => 'required',
            'great_grandfather_name' => 'required',
            'surname' => 'required',
            'full_name' => 'required',
            'marital_status' => 'required',
            'occupational_status' => 'required',
            'organization_name' => 'required',
            'is_married' => 'required',
            'national_id' => 'required',

        ], [
            'first_name.required' => 'حقل الاسم الأول مطلوب',
            'father_name.required' => 'حقل اسم الأب مطلوب',
            'grandfather_name.required' => 'حقل اسم الجد مطلوب',
            'great_grandfather_name.required' => 'حقل اسم والد الجد مطلوب',
            'surname.required' => 'حقل اللقب مطلوب',
            'full_name.required' => 'حقل الاسم الكامل مطلوب',
            'marital_status.required' => 'حقل الحالة الزوجية مطلوب',
            'occupational_status.required' => 'حقل الحالة المهنية مطلوب',
            'organization_name.required' => 'حقل اسم الدائرة مطلوب',
            'is_married.required' => 'حقل الحالة الزوجية مطلوب',
            'national_id.required' => 'حقل رقم البطاقة الوطنية مطلوب',
        ]);

        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);


        Wives::create([

            'first_name' => $this->first_name,
            'father_name' => $this->father_name,
            'grandfather_name' => $this->grandfather_name,
            'great_grandfather_name' => $this->great_grandfather_name,
            'surname' => $this->surname,
            'full_name' => $this->full_name,
            'marital_status' => $this->marital_status,
            'occupational_status' => $this->occupational_status,
            'organization_name' => $this->organization_name,
            'is_married' => $this->is_married,
            'national_id' => $this->national_id,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetWive($WiveId)
    {
        $this->resetValidation();

        $this->Wive  = Wives::find($WiveId);
        $this->WiveId = $this->Wive->id;
        $this->first_name = $this->Wive->first_name;
        $this->father_name = $this->Wive->father_name;
        $this->grandfather_name = $this->Wive->grandfather_name;
        $this->great_grandfather_name = $this->Wive->great_grandfather_name;
        $this->surname = $this->Wive->surname;
        $this->full_name = $this->Wive->full_name;
        $this->marital_status = $this->Wive->marital_status;
        $this->occupational_status = $this->Wive->occupational_status;
        $this->organization_name = $this->Wive->organization_name;
        $this->is_married = $this->Wive->is_married;
        $this->national_id = $this->Wive->national_id;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'first_name' => 'required:wives',
            'father_name' => 'required:wives',
            'grandfather_name' => 'required:wives',
            'great_grandfather_name' => 'required:wives',
            'surname' => 'required:wives',
            'full_name' => 'required:wives',
            'marital_status' => 'required:wives',
            'occupational_status' => 'required:wives',
            'organization_name' => 'required:wives',
            'is_married' => 'required:wives',
            'national_id' => 'required:wives',

        ], [
            'first_name.required' => 'حقل الاسم مطلوب',
            'father_name.required' => 'حقل الاسم مطلوب',
            'grandfather_name.required' => 'حقل الاسم مطلوب',
            'great_grandfather_name.required' => 'حقل الاسم مطلوب',
            'surname.required' => 'حقل الاسم مطلوب',
            'full_name.required' => 'حقل الاسم مطلوب',
            'marital_status.required' => 'حقل الاسم مطلوب',
            'occupational_status.required' => 'حقل الاسم مطلوب',
            'organization_name.required' => 'حقل الاسم مطلوب',
            'is_married.required' => 'حقل الاسم مطلوب',
            'national_id.required' => 'حقل الاسم مطلوب',
        ]);

        $Wives = Wives::find($this->WiveId);
        $Wives->update([
            'first_name' => $this->first_name,
            'father_name' => $this->father_name,
            'grandfather_name' => $this->grandfather_name,
            'great_grandfather_name' => $this->great_grandfather_name,
            'surname' => $this->surname,
            'full_name' => $this->full_name,
            'marital_status' => $this->marital_status,
            'occupational_status' => $this->occupational_status,
            'organization_name' => $this->organization_name,
            'is_married' => $this->is_married,
            'national_id' => $this->national_id,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Wives = Wives::find($this->WiveId);

        if ($Wives) {

            $Wives->delete();
            $this->reset();
            $this->dispatchBrowserEvent('success', [
                'message' => 'تم حذف البيانات بنجاح',
                'title' => 'الحذف'
            ]);
        }
    }
}

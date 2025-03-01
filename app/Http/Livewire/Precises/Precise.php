<?php

namespace App\Http\Livewire\Precises;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Precises\Precises;
use App\Models\Specialtys\Specialtys;

class Precise extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Precises = [];
    public $specialtys = [];
    public $PreciseSearch, $Precise, $PreciseId;
    public $specialtys_id, $specialtys_code, $precises_code, $precises_name;

    protected $listeners = [
        'SelectSpecialtysId',
    ];
    public function hydrate()
    {
        $this->emit('select2');
    }
    public function mount()
    {
        $this->specialtys = Specialtys::all();
    }
    public function SelectSpecialtysId($SpecialtysIdID)
    {
        $specialtys_id = Specialtys::find($SpecialtysIdID);
        if ($specialtys_id) {
            $this->specialtys_id = $SpecialtysIdID;
        } else {
            $this->specialtys_id = null;
        }
    }


    public function render()
    {
        $PreciseSearch = '%' . $this->PreciseSearch . '%';
        $serchID = Specialtys::where('specialtys_code', 'LIKE', $PreciseSearch)
            ->orWhere('specialtys_name', 'LIKE', $PreciseSearch)
            ->pluck('id');

        $Precises = Precises::whereIn('specialtys_id', $serchID)
            ->orWhere('precises_code', 'LIKE', $PreciseSearch)
            ->orWhere('precises_name', 'LIKE', $PreciseSearch)
            ->orderBy('id', 'ASC')
            ->paginate(10);

        $links = $Precises;
        $this->Precises = collect($Precises->items());


        return view('livewire.precises.precise', [
            'specialtys' => Specialtys::get(),
            'links' => $links,
        ]);
    }

    public function AddPreciseModalShow()
    {
        $this->resetExcept('specialtys');
        $this->resetValidation();
        $this->dispatchBrowserEvent('PreciseModalShow');
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'specialtys_id' => 'required:precises',
            'precises_code' => 'required|unique:precises,precises_code,NULL,id,specialtys_id,' . $this->specialtys_id,
            'precises_name' => 'required|unique:precises,precises_name,NULL,id,specialtys_id,' . $this->specialtys_id,

        ], [
            'specialtys_id.required' => 'حقل التخصص العام مطلوب',
            'precises_code.required' => 'حقل رمز التخصص الدقيق مطلوب',
            'precises_code.unique' => 'رمز التخصص الدقيق موجود',
            'precises_name.required' => 'حقل اسم التخصص الدقيق مطلوب',
            'precises_name.unique' => 'اسم التخصص الدقيق موجود',
        ]);

        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);
        Precises::create([
            'specialtys_id' => $this->specialtys_id,
            'precises_code' => $this->precises_code,
            'precises_name' => $this->precises_name,

        ]);
        $this->reset(['specialtys_id', 'precises_code', 'precises_name']);
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetPrecise($PreciseId)
    {
        $this->resetValidation();

        $this->Precise  = Precises::find($PreciseId);
        $this->PreciseId = $this->Precise->id;
        $this->specialtys_code = $this->Precise->specialtys_code;
        $this->specialtys_id = $this->Precise->specialtys_id;
        $this->precises_code = $this->Precise->precises_code;
        $this->precises_name = $this->Precise->precises_name;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'specialtys_id' => 'required:precises',
            //'precises_code' => 'required|unique:precises,precises_code,NULL,id,specialtys_id,'.$this->specialtys_id,
            //'precises_name' => 'required|unique:precises,precises_name,NULL,id,specialtys_id,'.$this->specialtys_id,
            'precises_code' => 'required|unique:precises,precises_code,' . $this->Precise->id . ',id',
            'precises_name' => 'required|unique:precises,precises_name,' . $this->Precise->id . ',id',

        ], [
            'specialtys_id.required' => 'حقل التخصص العام مطلوب',
            'precises_code.required' => 'حقل رمز التخصص الدقيق مطلوب',
            'precises_code.unique' => 'رمز التخصص الدقيق موجود',
            'precises_name.required' => 'حقل اسم التخصص الدقيق مطلوب',
            'precises_name.unique' => 'اسم التخصص الدقيق موجود',
        ]);

        $Precises = Precises::find($this->PreciseId);
        $Precises->update([
            'specialtys_id' => $this->specialtys_id,
            'precises_code' => $this->precises_code,
            'precises_name' => $this->precises_name,

        ]);
        $this->reset(['specialtys_id', 'precises_code', 'precises_name']);
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Precises = Precises::find($this->PreciseId);
        $Precises->delete();
        $this->reset(['specialtys_id', 'precises_code', 'precises_name']);
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات  بنجاح',
            'title' => 'الحذف '
        ]);
    }
}

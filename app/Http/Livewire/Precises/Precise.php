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
    public $PreciseSearch, $Precise, $PreciseId;
    public $specialtys_code, $precises_code, $precises_name;


    public function render()
    {
        $PreciseSearch = '%' . $this->PreciseSearch . '%';
        $Precises = Precises::where('specialtys_code', 'LIKE', $PreciseSearch)
            ->orWhere('precises_code', 'LIKE', $PreciseSearch)
            ->orWhere('precises_name', 'LIKE', $PreciseSearch)


            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Precises;
        $this->Precises = collect($Precises->items());
        return view('livewire.precises.precise', [
            'specialtys' => Specialtys::get(),
            'links' => $links
        ]);
    }

    public function AddPreciseModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('PreciseModalShow');
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'specialtys_code' => 'required:precises',
            'precises_code' => 'required|unique:precises',
            'precises_name' => 'required|unique:precises',

        ], [
            'specialtys_code.required' => 'حقل الاسم مطلوب',
            'specialtys_code.unique' => 'الأسم موجود',
            'precises_code.required' => 'حقل الاسم مطلوب',
            'precises_code.unique' => 'الأسم موجود',
            'precises_name.required' => 'حقل الاسم مطلوب',
            'precises_name.unique' => 'الأسم موجود',
        ]);

        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);
        Precises::create([
            'specialtys_code' => $this->specialtys_code,
            'precises_code' => $this->precises_code,
            'precises_name' => $this->precises_name,

        ]);
        $this->reset();
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
        $this->precises_code = $this->Precise->precises_code;
        $this->precises_name = $this->Precise->precises_name;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'specialtys_code' => 'required:precises',
            'precises_code' => 'required:precises',
            'precises_name' => 'required|unique:precises',

        ], [
            'specialtys_code.required' => 'حقل الاسم مطلوب',
            'precises_code.required' => 'حقل الاسم مطلوب',
            'precises_name.required' => 'حقل الاسم مطلوب',
            'precises_name.unique' => 'الأسم موجود',
        ]);

        $Precises = Precises::find($this->PreciseId);
        $Precises->update([
            'specialtys_code' => $this->specialtys_code,
            'precises_code' => $this->precises_code,
            'precises_name' => $this->precises_name,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Precises = Precises::find($this->PreciseId);
        $Precises->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات  بنجاح',
            'title' => 'الحذف '
        ]);
    }
}

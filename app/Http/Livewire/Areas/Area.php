<?php

namespace App\Http\Livewire\Areas;

use App\Http\Livewire\Districts\District;
use Livewire\Component;
use App\Models\Areas\Areas;
use Livewire\WithPagination;
use App\Models\Districts\Districts;
use App\Models\Governorates\Governorates;


class Area extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Areas = [];
    public $Districts = [];
    public $AreaSearch, $Area, $AreaId;
    public $governorate_id, $district_id, $area_id, $area_name;

    public function render()
    {
        $AreaSearch = $this->AreaSearch . '%';
        $Areas = Areas::where('governorate_id', 'LIKE', $AreaSearch)
            ->orWhere('district_id', 'LIKE', $AreaSearch)
            ->orWhere('area_id', 'LIKE', $AreaSearch)
            ->orWhere('area_name', 'LIKE', $AreaSearch)
            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Areas;
        $this->Areas = collect($Areas->items());
        return view('livewire.areas.area', [
            'districts' => Districts::get(),
            'governorates' => Governorates::get(),
            'links' => $links
        ]);
    }

    public function AddAreaModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('AreaModalShow');
    }

    public function chooseGovernorate()
    {
        $Governorates = Governorates::find($this->governorate_id);
        $this->Districts = $Governorates->GetDistrict;
    }

    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'governorate_id' => 'required',
            'district_id' => 'required',
            'area_id' => 'required|unique:areas',
            'area_name' => 'required',

        ], [
            'governorate_id.required' => 'حقل الاسم مطلوب',

            'district_id.required' => 'حقل الاسم مطلوب',

            'area_id.required' => 'حقل الاسم مطلوب',
            'area_id.unique' => 'الأسم موجود',
            'area_name.required' => 'حقل الاسم مطلوب',

        ]);

        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);
        Areas::create([
            'governorate_id' => $this->governorate_id,
            'district_id' => $this->district_id,
            'area_id' => $this->area_id,
            'area_name' => $this->area_name,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetArea($AreaId)
    {
        $this->resetValidation();

        $this->Area  = Areas::find($AreaId);
        $this->AreaId = $this->Area->id;
        $this->governorate_id = $this->Area->governorate_id;
        $this->district_id = $this->Area->district_id;
        $this->area_id = $this->Area->area_id;
        $this->area_name = $this->Area->area_name;

        $Governorates = Governorates::find($this->governorate_id);
        $this->Districts = $Governorates->GetDistrict;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'governorate_id' => 'required',
            'district_id' => 'required',
            'area_id' => 'required|unique:areas,area_id,'.$this->AreaId,
            'area_name' => 'required',

        ], [
            'governorate_id.required' => 'حقل الاسم مطلوب',
            'district_id.required' => 'حقل الاسم مطلوب',
            'area_id.required' => 'حقل الاسم مطلوب',
            'area_id.unique' => 'الأسم موجود',
            'area_name.required' => 'حقل الاسم مطلوب',
        ]);

        $Areas = Areas::find($this->AreaId);
        $Areas->update([
            'governorate_id' => $this->governorate_id,
            'district_id' => $this->district_id,
            'area_id' => $this->area_id,
            'area_name' => $this->area_name,
        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Areas = Areas::find($this->AreaId);
        $Areas->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات  بنجاح',
            'title' => 'الحذف '
        ]);
    }
}

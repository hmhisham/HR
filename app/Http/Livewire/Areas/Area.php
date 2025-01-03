<?php

namespace App\Http\Livewire\Areas;

use Livewire\Component;
use App\Models\Areas\Areas;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use App\Models\Districts\Districts;
use App\Models\Governorates\Governorates;


class Area extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $Areas = [];
    public $Districts = [];
    public $Governorates = [];
    public $AreaSearch, $Area, $AreaId;
    public $governorate_id, $district_id, $area_id, $area_name;
    public $GovernorateName, $DistrictsName;

    protected $listeners = [
        'chooseGovernorate',
        'chooseDistrict',
    ];
    public function hydrate()
    {
        $this->emit('select2');
    }

    public function mount()
    {
        $this->Governorates = Governorates::all();
    }

    public function render()
    {
        $AreaSearch = '%' . $this->AreaSearch . '%';

        $governorateIDs = Governorates::where('governorate_name', 'LIKE', $AreaSearch)
            ->pluck('id');

        $districtIDs = Districts::where('district_name', 'LIKE', $AreaSearch)
            ->pluck('id');

        $Areas = Areas::whereIn('governorate_id', $governorateIDs)
            ->orWhereIn('district_id', $districtIDs)
            ->orWhere('area_id', 'LIKE', $AreaSearch)
            ->orWhere('area_name', 'LIKE', $AreaSearch)
            ->orderBy('id', 'ASC')
            ->paginate(10);

        $links = $Areas;
        $this->Areas = collect($Areas->items());

        return view('livewire.areas.area', [
            'governorates' => Governorates::get(),
            'links' => $links
        ]);
    }


    public function chooseGovernorate($GovernorateID)
    {
        $this->governorate_id = $GovernorateID;
        $Governorate = Governorates::find($GovernorateID);
        $this->Districts = $Governorate->GetDistrict;
        $this->reset('district_id');
    }
    public function chooseDistrict($DistrictID)
    {
        $this->district_id = $DistrictID;
    }

    public function AddAreaModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('AreaModalShow');
    }

    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'governorate_id' => 'required',
            'district_id' => 'required',
            'area_id' => ['required', Rule::unique('areas')->where(function ($query) {
                return $query->where('governorate_id', $this->governorate_id)->where('district_id', $this->district_id);
            })],
            'area_name' => 'required|unique:areas,area_name',
        ], [
            'governorate_id.required' => 'حقل أسم المحافظة مطلوب',
            'district_id.required' => 'حقل أسم القضاء مطلوب',
            'area_id.required' => 'حقل رقم الناحية مطلوب',
            'area_id.unique' => 'رقم الناحية موجود في نفس القضاء والمحافظة',
            'area_name.required' => 'حقل أسم الناحية مطلوب',
            'area_name.unique' => 'أسم الناحية موجود',
        ]);

        Areas::create([
            'governorate_id' => $this->governorate_id,
            'district_id' => $this->district_id,
            'area_id' => $this->area_id,
            'area_name' => $this->area_name,
        ]);

        $this->reset(['governorate_id', 'district_id', 'area_id', 'area_name']);
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

        $this->Districts = $this->Area->GetGovernorate->GetDistrict;
        $this->GovernorateName = $this->Area->GetGovernorate->governorate_name;
        $this->DistrictsName = $this->Area->Getdistrict->district_name;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'governorate_id' => 'required',
            'district_id' => 'required',
            'area_id' => ['required', Rule::unique('areas')->ignore($this->Area->id)->where(function ($query) {
                return $query->where('governorate_id', $this->governorate_id)->where('district_id', $this->district_id);
            })],
            'area_name' => 'required|unique:areas,area_name,' . $this->Area->id . ',id',
        ], [
            'governorate_id.required' => 'حقل أسم المحافظة مطلوب',
            'district_id.required' => 'حقل أسم القضاء مطلوب',
            'area_id.required' => 'حقل رقم الناحية مطلوب',
            'area_id.unique' => 'رقم الناحية موجود في نفس القضاء والمحافظة',
            'area_name.required' => 'حقل أسم الناحية مطلوب',
            'area_name.unique' => 'أسم الناحية موجود',
        ]);

        $Areas = Areas::find($this->AreaId);
        $Areas->update([
            'governorate_id' => $this->governorate_id,
            'district_id' => $this->district_id,
            'area_id' => $this->area_id,
            'area_name' => $this->area_name,
        ]);

        $this->reset(['governorate_id', 'district_id', 'area_id', 'area_name']);
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Areas = Areas::find($this->AreaId);
        $Areas->delete();
        $this->reset(['governorate_id', 'district_id', 'area_id', 'area_name']);
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات  بنجاح',
            'title' => 'الحذف '
        ]);
    }
}

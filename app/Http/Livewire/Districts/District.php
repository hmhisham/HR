<?php

namespace App\Http\Livewire\Districts;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Districts\Districts;
use App\Models\Governorates\Governorates;

class District extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Governorates = [];
    public $Districts = [];
    public $DistrictSearch, $District, $DistrictId;
    public $GovernorateName, $governorate_id,   $district_number, $district_name;

    protected $listeners = [
        'GetGovernorate'
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
        $DistrictSearch = $this->DistrictSearch . '%';

        $Districts = Districts::where('governorate_id', 'LIKE', $DistrictSearch)
            ->orWhere('district_number', 'LIKE', $DistrictSearch)
            ->orWhere('district_name', 'LIKE', $DistrictSearch)
            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Districts;
        $this->Districts = collect($Districts->items());

        return view('livewire.districts.district', [
            'links' => $links
        ]);
    }

    public function GetGovernorate($GovernorateID)
    {
        $this->governorate_id = $GovernorateID;
    }

    public function AddDistrictModalShow()
    {
        $this->reset('governorate_id', 'district_number', 'district_name');
        $this->resetValidation();
        $this->dispatchBrowserEvent('DistrictModalShow');
    }

    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'governorate_id' => 'required',
            'district_number' => 'required|unique:districts,district_number,NULL,id,governorate_id,' . $this->governorate_id,
            'district_name' => 'required|unique:districts,district_name,NULL,id,governorate_id,' . $this->governorate_id,
        ], [
            'governorate_id.required' => 'حقل أسم المحافظة مطلوب',
            'district_number.required' => 'حقل رقم القضاء مطلوب',
            'district_number.unique' => 'حقل رقم القضاء موجود',
            'district_name.required' => 'حقل أسم القضاء مطلوب',
            'district_name.unique' => 'حقل أسم القضاء موجود',
        ]);

        Districts::create([
            'governorate_id' => $this->governorate_id,
            'district_number' => $this->district_number,
            'district_name' => $this->district_name,
        ]);

        $this->reset('governorate_id', 'district_number', 'district_name');
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetDistrict($DistrictId)
    {
        $this->reset('governorate_id', 'district_number', 'district_name');

        $this->resetValidation();

        $this->District  = Districts::find($DistrictId);
        $this->DistrictId = $this->District->id;
        $this->governorate_id = $this->District->governorate_id;
        $this->district_number = $this->District->district_number;
        $this->district_name = $this->District->district_name;

        $this->GovernorateName = $this->District->GetGovernorate->governorate_name;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'governorate_id' => 'required',
            'district_number' => 'required|unique:districts,district_number,' . $this->District->id . ',id,governorate_id,' . $this->governorate_id,
            'district_name' => 'required|unique:districts,district_name,' . $this->District->id . ',id,governorate_id,' . $this->governorate_id,
        ], [
            'governorate_id.required' => 'حقل أسم المحافظة مطلوب',
            'district_number.required' => 'حقل رقم القضاء مطلوب',
            'district_number.unique' => 'حقل رقم القضاء موجود',
            'district_name.required' => 'حقل أسم القضاء مطلوب',
            'district_name.unique' => 'حقل أسم القضاء موجود',
        ]);

        $Districts = Districts::find($this->DistrictId);
        $Districts->update([
            'governorate_id' => $this->governorate_id,
            'district_number' => $this->district_number,
            'district_name' => $this->district_name,
        ]);

        $this->reset('governorate_id', 'district_number', 'district_name');
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Districts = Districts::find($this->DistrictId);
        $Districts->delete();

        $this->reset();
        $this->mount();
        
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات  بنجاح',
            'title' => 'الحذف '
        ]);
    }
}

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

    public $Districts = [];
    public $DistrictSearch, $District, $DistrictId;
    public $governorate_id,   $district_number, $district_name;


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
            'governorates' => Governorates::get(),
            'links' => $links
        ]);
    }

    public function AddDistrictModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('DistrictModalShow');
    }

    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'governorate_id' => 'required',
            'district_number' => 'required|unique:districts',
            'district_name' => 'required',
        ], [
            'governorate_id.required' => 'حقل الاسم مطلوب',
            'district_number.required' => 'حقل الاسم مطلوب',
            'district_number.unique' => 'الأسم موجود',
            'district_name.required' => 'حقل الاسم مطلوب',
        ]);

        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);
        Districts::create([
            'governorate_id' => $this->governorate_id,
            'district_number' => $this->district_number,
            'district_name' => $this->district_name,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetDistrict($DistrictId)
    {
        $this->resetValidation();

        $this->District  = Districts::find($DistrictId);
        $this->DistrictId = $this->District->id;
        $this->governorate_id = $this->District->governorate_id;
        $this->district_number = $this->District->district_number;
        $this->district_name = $this->District->district_name;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'governorate_id' => 'required:districts',
            'district_number' => 'required:districts',
            'district_name' => 'required:districts',

        ], [
            'governorate_id.required' => 'حقل الاسم مطلوب',
            'district_number.required' => 'حقل الاسم مطلوب',
            'district_name.required' => 'حقل الاسم مطلوب',
        ]);

        $Districts = Districts::find($this->DistrictId);
        $Districts->update([
            'governorate_id' => $this->governorate_id,
            'district_number' => $this->district_number,
            'district_name' => $this->district_name,

        ]);
        $this->reset();
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
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات  بنجاح',
            'title' => 'الحذف '
        ]);
    }
}

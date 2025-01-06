<?php

namespace App\Http\Livewire\Provinces;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\Provinces\Provinces;
use Illuminate\Support\Facades\Auth;

class Province extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Provinces = [];
    public $Province, $ProvinceId;
    public $user_id, $province_number, $province_name;
    public $search = ['province_number' => '', 'province_name' => ''];

    public function updated($propertyName)
    {
        $this->resetPage();
    }

    public function render()
    {
        $searchNumber = '%' . $this->search['province_number'] . '%';
        $searchName = '%' . $this->search['province_name'] . '%';

        $Provinces = Provinces::query()
            ->when($this->search['province_number'], function ($query) use ($searchNumber) {
                $query->where('province_number', 'LIKE', $searchNumber);
            })
            ->when($this->search['province_name'], function ($query) use ($searchName) {
                $query->orWhere('province_name', 'LIKE', $searchName);
            })
            ->orderBy('id', 'ASC')
            ->paginate(10);

        $links = $Provinces;
        $this->Provinces = collect($Provinces->items());

        return view('livewire.provinces.province', [
            'Provinces' => $Provinces,
            'links' => $links
        ]);
    }

    public function AddProvinceModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('ProvinceModalShow');
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'province_number' => 'required|unique:provinces,province_number',
            'province_name' => 'required',

        ], [
            'province_number.required' => 'حقل رقم المقاطعة مطلوب',
            'province_number.unique' => 'رقم المقاطعة موجود',
            'province_name.required' => 'حقل اسم المقاطعة مطلوب',
        ]);


        Provinces::create([
            'user_id' => Auth::User()->id,
            'province_number' => $this->province_number,
            'province_name' => $this->province_name,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetProvince($ProvinceId)
    {
        $this->resetValidation();

        $this->Province  = Provinces::find($ProvinceId);
        $this->ProvinceId = $this->Province->id;
        $this->province_number = $this->Province->province_number;
        $this->province_name = $this->Province->province_name;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'province_number' => 'required|unique:provinces,province_number,' . $this->Province->id . ',id',
            'province_name' => 'required:provinces',

        ], [
            'province_number.required' => 'حقل رقم المقاطعة مطلوب',
            'province_number.unique' => 'رقم المقاطعة موجود',
            'province_name.required' => 'حقل اسم المقاطعة مطلوب',
        ]);

        $Provinces = Provinces::find($this->ProvinceId);
        $Provinces->update([
            'user_id' => Auth::User()->id,
            'province_number' => $this->province_number,
            'province_name' => $this->province_name,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Provinces = Provinces::find($this->ProvinceId);

        if ($Provinces) {
            $Provinces->delete();
            $this->reset();
            $this->dispatchBrowserEvent('success', [
                'message' => 'تم حذف البيانات بنجاح',
                'title' => 'الحذف'
            ]);
        }
    }
}

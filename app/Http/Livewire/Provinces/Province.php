<?php

namespace App\Http\Livewire\Provinces;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\Sections\Sections;
use App\Models\Provinces\Provinces;
use Illuminate\Support\Facades\Auth;

class Province extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Provinces = [];
    public $sections = [];
    public $Province, $ProvinceId;
    public $section_id, $user_id, $province_number, $province_name;
    public $search = ['province_number' => '', 'province_name' => ''];

    protected $listeners = [
        'SelectSectionId',
    ];
    public function hydrate()
    {
        $this->emit('select2');
    }
    public function mount()
    {
        $this->sections = Sections::all();
    }
    public function SelectSectionId($SectionIdID)
    {
        $section_id = Sections::find($SectionIdID);
        if ($section_id) {
            $this->section_id = $SectionIdID;
        } else {
            $this->section_id = null;
        }
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
            'section_id' => 'required',

        ], [
            'province_number.required' => 'حقل رقم المقاطعة مطلوب',
            'province_number.unique' => 'رقم المقاطعة موجود',
            'province_name.required' => 'حقل اسم المقاطعة مطلوب',
            'section_id.required' => 'حقل اسم القسم مطلوب',
        ]);


        Provinces::create([
            'user_id' => Auth::User()->id,
            'province_number' => $this->province_number,
            'province_name' => $this->province_name,
            'section_id' => $this->section_id,

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
        $this->section_id = $this->Province->section_id;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'province_number' => 'required|unique:provinces,province_number,' . $this->Province->id . ',id',
            'province_name' => 'required:provinces',
            'section_id' => 'required:provinces',

        ], [
            'province_number.required' => 'حقل رقم المقاطعة مطلوب',
            'province_number.unique' => 'رقم المقاطعة موجود',
            'province_name.required' => 'حقل اسم المقاطعة مطلوب',
            'section_id.required' => 'حقل اسم القسم مطلوب',
        ]);

        $Provinces = Provinces::find($this->ProvinceId);
        $Provinces->update([
            'user_id' => Auth::User()->id,
            'province_number' => $this->province_number,
            'province_name' => $this->province_name,
            'section_id' => $this->section_id,

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

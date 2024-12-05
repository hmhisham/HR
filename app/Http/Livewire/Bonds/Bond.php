<?php

namespace App\Http\Livewire\Bonds;

use Livewire\Component;

use App\Models\Bonds\Bonds;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use App\Models\Boycotts\Boycotts;
use App\Models\Department\Department;
use App\Models\Governorates\Governorates;

class Bond extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Bonds = [];
    public $boycotts = [];
    public $department = [];
    public $governorates = [];
    public $Districts = [];
    public $BondSearch, $Bond, $BondId;
    public $boycott_id, $part_number, $property_number, $area_in_meters, $area_in_olok, $area_in_donum, $count, $date, $volume_number, $ownership, $property_type, $governorate, $district, $mortgage_notes, $registered_office, $specialized_department, $property_deed_image, $notes, $visibility;
    public $GovernorateName, $DistrictsName;

    protected $listeners = [
        'SelectBoycottId',
        'SelectOwnership',
        'SelectRegisteredOffice',
        'SelectGovernorate',
        'SelectDistrict',
    ];
    public function hydrate()
    {
        $this->emit('select2');
        $this->emit('flatpickr');
    }
    public function mount()
    {
        $this->boycotts = Boycotts::all();
        $this->department = Department::all();
        $this->governorates = Governorates::all();
    }
    public function SelectBoycottId($BoycottIdID)
    {
        $boycott_id = Boycotts::find($BoycottIdID);
        if ($boycott_id) {
            $this->boycott_id = $BoycottIdID;
        } else {
            $this->boycott_id = null;
        }
    }

    public function SelectOwnership($OwnershipID)
    {
        $ownership = Department::find($OwnershipID);
        if ($ownership) {
            $this->ownership = $OwnershipID;
        } else {
            $this->ownership = null;
        }
    }

    public function SelectRegisteredOffice($RegisteredOfficeID)
    {
        $registered_office = Department::find($RegisteredOfficeID);
        if ($registered_office) {
            $this->registered_office = $RegisteredOfficeID;
        } else {
            $this->registered_office = null;
        }
    }

    public function SelectGovernorate($GovernorateID)
    {
        $this->governorate = $GovernorateID;
        $Governorate = Governorates::find($GovernorateID);
        $this->Districts = $Governorate->GetDistrict;
        $this->reset('district');
    }
    public function SelectDistrict($DistrictID)
    {
        $this->district = $DistrictID;
    }

    public function render()
    {
        $BondSearch = '%' . $this->BondSearch . '%';
        $Bonds = Bonds::where('boycott_id', 'LIKE', $BondSearch)
            ->orWhere('part_number', 'LIKE', $BondSearch)
            ->orWhere('property_number', 'LIKE', $BondSearch)
            ->orWhere('area_in_meters', 'LIKE', $BondSearch)
            ->orWhere('area_in_olok', 'LIKE', $BondSearch)
            ->orWhere('area_in_donum', 'LIKE', $BondSearch)
            ->orWhere('count', 'LIKE', $BondSearch)
            ->orWhere('date', 'LIKE', $BondSearch)
            ->orWhere('volume_number', 'LIKE', $BondSearch)
            ->orWhere('ownership', 'LIKE', $BondSearch)
            ->orWhere('property_type', 'LIKE', $BondSearch)
            ->orWhere('governorate', 'LIKE', $BondSearch)
            ->orWhere('district', 'LIKE', $BondSearch)
            ->orWhere('mortgage_notes', 'LIKE', $BondSearch)
            ->orWhere('registered_office', 'LIKE', $BondSearch)
            ->orWhere('specialized_department', 'LIKE', $BondSearch)
            ->orWhere('property_deed_image', 'LIKE', $BondSearch)
            ->orWhere('notes', 'LIKE', $BondSearch)
            ->orWhere('visibility', 'LIKE', $BondSearch)


            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Bonds;
        $this->Bonds = collect($Bonds->items());
        return view('livewire.bonds.bond', [
            'links' => $links
        ]);
    }

    public function AddBondModalShow()
    {
        $this->reset(['boycott_id', 'part_number', 'property_number', 'area_in_meters', 'area_in_olok', 'area_in_donum', 'count', 'date', 'volume_number', 'ownership', 'property_type', 'governorate', 'district', 'mortgage_notes', 'registered_office', 'specialized_department', 'property_deed_image', 'notes', 'visibility']);
        $this->resetValidation();
        $this->dispatchBrowserEvent('BondModalShow');
    }

    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'boycott_id' => 'required',
            'part_number' => 'required',
            'property_number' => [
                'required',
                Rule::unique('bonds')->ignore($this->BondId)->where(function ($query) {
                    return $query->where('part_number', $this->part_number)
                        ->where('boycott_id', $this->boycott_id);
                })
            ],
            'area_in_meters' => 'required',
            'area_in_olok' => 'required',
            'area_in_donum' => 'required',
            'count' => 'required',
            'date' => 'required',
            'volume_number' => 'required',
            'ownership' => 'required',
            'property_type' => 'required',
            'governorate' => 'required',
            'district' => 'required',
            //'mortgage_notes' => 'required',
            'registered_office' => 'required',
            'specialized_department' => 'required',
            //'property_deed_image' => 'required',
            'visibility' => 'required',
        ], [
            'boycott_id.required' => 'حقل رقم المقاطعة مطلوب',
            'part_number.required' => 'حقل رقم القطعة مطلوب',
            'part_number.unique' => 'رقم القطعة هذا موجود بالفعل ضمن نفس المقاطعة',
            'property_number.required' => 'حقل رقم العقار مطلوب',
            'property_number.unique' => 'رقم العقار هذا موجود بالفعل ضمن نفس القطعة والمقاطعة',
            'area_in_meters.required' => 'حقل المساحة بالمتر مطلوب',
            'area_in_olok.required' => 'حقل المساحة بالأولك مطلوب',
            'area_in_donum.required' => 'حقل المساحة بالدونم مطلوب',
            'count.required' => 'حقل العدد مطلوب',
            'date.required' => 'حقل التاريخ مطلوب',
            'volume_number.required' => 'حقل رقم الجلد مطلوب',
            'ownership.required' => 'حقل العائدية مطلوب',
            'property_type.required' => 'حقل جنس العقار مطلوب',
            'governorate.required' => 'حقل المحافظة مطلوب',
            'district.required' => 'حقل القضاء مطلوب',
            //'mortgage_notes.required' => 'حقل إشارات التأمينات مطلوب',
            'registered_office.required' => 'حقل الدائرة المسجل لديها مطلوب',
            'specialized_department.required' => 'حقل الشعبة المختصة مطلوب',
            //'property_deed_image.required' => 'حقل صورة السند العقاري مطلوب',
            'visibility.required' => 'حقل إمكانية ظهوره مطلوب',
        ]);



        Bonds::create([
            'boycott_id' => $this->boycott_id,
            'part_number' => $this->part_number,
            'property_number' => $this->property_number,
            'area_in_meters' => $this->area_in_meters,
            'area_in_olok' => $this->area_in_olok,
            'area_in_donum' => $this->area_in_donum,
            'count' => $this->count,
            'date' => $this->date,
            'volume_number' => $this->volume_number,
            'ownership' => $this->ownership,
            'property_type' => $this->property_type,
            'governorate' => $this->governorate,
            'district' => $this->district,
            'mortgage_notes' => $this->mortgage_notes,
            'registered_office' => $this->registered_office,
            'specialized_department' => $this->specialized_department,
            'property_deed_image' => $this->property_deed_image,
            'notes' => $this->notes,
            'visibility' => $this->visibility,

        ]);
        $this->reset(['boycott_id', 'part_number', 'property_number', 'area_in_meters', 'area_in_olok', 'area_in_donum', 'count', 'date', 'volume_number', 'ownership', 'property_type', 'governorate', 'district', 'mortgage_notes', 'registered_office', 'specialized_department', 'property_deed_image', 'notes', 'visibility']);
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetBond($BondId)
    {
        $this->resetValidation();

        $this->Bond  = Bonds::find($BondId);
        $this->BondId = $this->Bond->id;
        $this->boycott_id = $this->Bond->boycott_id;
        $this->part_number = $this->Bond->part_number;
        $this->property_number = $this->Bond->property_number;
        $this->area_in_meters = $this->Bond->area_in_meters;
        $this->area_in_olok = $this->Bond->area_in_olok;
        $this->area_in_donum = $this->Bond->area_in_donum;
        $this->count = $this->Bond->count;
        $this->date = $this->Bond->date;
        $this->volume_number = $this->Bond->volume_number;
        $this->ownership = $this->Bond->ownership;
        $this->property_type = $this->Bond->property_type;
        $this->governorate = $this->Bond->governorate;
        $this->district = $this->Bond->district;
        $this->mortgage_notes = $this->Bond->mortgage_notes;
        $this->registered_office = $this->Bond->registered_office;
        $this->specialized_department = $this->Bond->specialized_department;
        $this->property_deed_image = $this->Bond->property_deed_image;
        $this->notes = $this->Bond->notes;
        $this->visibility = $this->Bond->visibility;

        $this->Districts = $this->Bond->GetGovernorate->GetDistrict;
        $this->GovernorateName = $this->Bond->GetGovernorate->governorate_name;
        $this->DistrictsName = $this->Bond->Getdistrict->district_name;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'boycott_id' => 'required',
            'part_number' => 'required',
            'property_number' => [
                'required',
                Rule::unique('bonds')->ignore($this->BondId)->where(function ($query) {
                    return $query->where('part_number', $this->part_number)
                        ->where('boycott_id', $this->boycott_id);
                })
            ],
            'area_in_meters' => 'required',
            'area_in_olok' => 'required',
            'area_in_donum' => 'required',
            'count' => 'required',
            'date' => 'required',
            'volume_number' => 'required',
            'ownership' => 'required',
            'property_type' => 'required',
            'governorate' => 'required',
            'district' => 'required',
            //'mortgage_notes' => 'required',
            'registered_office' => 'required',
            'specialized_department' => 'required',
            //'property_deed_image' => 'required',
            'visibility' => 'required',
        ], [
            'boycott_id.required' => 'حقل رقم المقاطعة مطلوب',
            'part_number.required' => 'حقل رقم القطعة مطلوب',
            'part_number.unique' => 'رقم القطعة هذا موجود بالفعل ضمن نفس المقاطعة',
            'property_number.required' => 'حقل رقم العقار مطلوب',
            'property_number.unique' => 'رقم العقار هذا موجود بالفعل ضمن نفس القطعة والمقاطعة',
            'area_in_meters.required' => 'حقل المساحة بالمتر مطلوب',
            'area_in_olok.required' => 'حقل المساحة بالأولك مطلوب',
            'area_in_donum.required' => 'حقل المساحة بالدونم مطلوب',
            'count.required' => 'حقل العدد مطلوب',
            'date.required' => 'حقل التاريخ مطلوب',
            'volume_number.required' => 'حقل رقم الجلد مطلوب',
            'ownership.required' => 'حقل العائدية مطلوب',
            'property_type.required' => 'حقل جنس العقار مطلوب',
            'governorate.required' => 'حقل المحافظة مطلوب',
            'district.required' => 'حقل القضاء مطلوب',
            //'mortgage_notes.required' => 'حقل إشارات التأمينات مطلوب',
            'registered_office.required' => 'حقل الدائرة المسجل لديها مطلوب',
            'specialized_department.required' => 'حقل الشعبة المختصة مطلوب',
            //'property_deed_image.required' => 'حقل صورة السند العقاري مطلوب',
            'visibility.required' => 'حقل إمكانية ظهوره مطلوب',
        ]);


        $Bonds = Bonds::find($this->BondId);
        $Bonds->update([
            'boycott_id' => $this->boycott_id,
            'part_number' => $this->part_number,
            'property_number' => $this->property_number,
            'area_in_meters' => $this->area_in_meters,
            'area_in_olok' => $this->area_in_olok,
            'area_in_donum' => $this->area_in_donum,
            'count' => $this->count,
            'date' => $this->date,
            'volume_number' => $this->volume_number,
            'ownership' => $this->ownership,
            'property_type' => $this->property_type,
            'governorate' => $this->governorate,
            'district' => $this->district,
            'mortgage_notes' => $this->mortgage_notes,
            'registered_office' => $this->registered_office,
            'specialized_department' => $this->specialized_department,
            'property_deed_image' => $this->property_deed_image,
            'notes' => $this->notes,
            'visibility' => $this->visibility,

        ]);
        $this->reset(['boycott_id', 'part_number', 'property_number', 'area_in_meters', 'area_in_olok', 'area_in_donum', 'count', 'date', 'volume_number', 'ownership', 'property_type', 'governorate', 'district', 'mortgage_notes', 'registered_office', 'specialized_department', 'property_deed_image', 'notes', 'visibility']);
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Bonds = Bonds::find($this->BondId);

        if ($Bonds) {

            $Bonds->delete();
            $this->reset(['boycott_id', 'part_number', 'property_number', 'area_in_meters', 'area_in_olok', 'area_in_donum', 'count', 'date', 'volume_number', 'ownership', 'property_type', 'governorate', 'district', 'mortgage_notes', 'registered_office', 'specialized_department', 'property_deed_image', 'notes', 'visibility']);
            $this->dispatchBrowserEvent('success', [
                'message' => 'تم حذف البيانات بنجاح',
                'title' => 'الحذف'
            ]);
        }
    }
}

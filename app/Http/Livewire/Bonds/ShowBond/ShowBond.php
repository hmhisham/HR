<?php

namespace App\Http\Livewire\Bonds\ShowBond;

use Livewire\Component;

use App\Models\Bonds\Bonds;
use Livewire\WithPagination;
use App\Models\Boycotts\Boycotts;
use Illuminate\Support\Facades\Auth;
use App\Models\Department\Department;
use App\Models\Governorates\Governorates;
use App\Models\Propertytypes\Propertytypes;

class ShowBond extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Bonds = [];
    public $boycott = [];
    public $Boycott;
    public $department = [];
    public $governorates = [];
    public $Districts = [];
    public $propertytypes = [];
    public $BoycottBonds = [];
    public $bondSearch, $bond, $bondId;
    public $user_id, $boycott_id, $part_number, $property_number, $area_in_meters, $area_in_olok, $area_in_donum, $count, $date, $volume_number, $bond_type, $ownership, $property_type, $governorate, $district, $mortgage_notes, $registered_office, $specialized_department, $property_deed_image, $notes, $visibility;
    public $GovernorateName, $DistrictsName;

    protected $listeners = [
        'SelectOwnership',
        'SelectRegisteredOffice',
        'SelectGovernorate',
        'SelectDistrict',
        'SelectPropertyType',
    ];

    public function mount()
    {
        $this->department = Department::all();
        $this->governorates = Governorates::all();
        $this->propertytypes = Propertytypes::all();


        $this->Boycott = Boycotts::find($this->boycott_id);
        $this->BoycottBonds = $this->Boycott->GetBonds;
    }

    public function hydrate()
    {
        $this->emit('select2');
        $this->emit('flatpickr');
    }

    //المقاطعات
    public function SelectOwnership($OwnershipID)
    {
        $ownership = Department::find($OwnershipID);
        if ($ownership) {
            $this->ownership = $OwnershipID;
        } else {
            $this->ownership = null;
        }
    }

    //الدوائر
    public function SelectRegisteredOffice($RegisteredOfficeID)
    {
        $registered_office = Department::find($RegisteredOfficeID);
        if ($registered_office) {
            $this->registered_office = $RegisteredOfficeID;
        } else {
            $this->registered_office = null;
        }
    }

    //المحافظة
    public function SelectGovernorate($GovernorateID)
    {
        $this->governorate = $GovernorateID;
        $Governorate = Governorates::find($GovernorateID);
        $this->Districts = $Governorate->GetDistrict;

    }

    //الاقضية
    public function SelectDistrict($DistrictID)
    {
        $this->district = $DistrictID;
    }

    //نوع السند
    public function SelectPropertyType($PropertyTypeID)
    {
        $property_type = Propertytypes::find($PropertyTypeID);
        if ($property_type) {
            $this->property_type = $PropertyTypeID;
        } else {
            $this->property_type = null;
        }
    }

    public function render()
    {
        $bondSearch = '%' . $this->bondSearch . '%';
        $Bonds = Bonds::where('boycott_id', 'LIKE', $bondSearch)
            ->orWhere('part_number', 'LIKE', $bondSearch)
            ->orWhere('property_number', 'LIKE', $bondSearch)
            ->orWhere('area_in_meters', 'LIKE', $bondSearch)
            ->orWhere('area_in_olok', 'LIKE', $bondSearch)
            ->orWhere('area_in_donum', 'LIKE', $bondSearch)
            ->orWhere('count', 'LIKE', $bondSearch)
            ->orWhere('date', 'LIKE', $bondSearch)
            ->orWhere('volume_number', 'LIKE', $bondSearch)
            ->orWhere('bond_type', 'LIKE', $bondSearch)
            ->orWhere('ownership', 'LIKE', $bondSearch)
            ->orWhere('property_type', 'LIKE', $bondSearch)
            ->orWhere('governorate', 'LIKE', $bondSearch)
            ->orWhere('district', 'LIKE', $bondSearch)
            ->orWhere('mortgage_notes', 'LIKE', $bondSearch)
            ->orWhere('registered_office', 'LIKE', $bondSearch)
            ->orWhere('specialized_department', 'LIKE', $bondSearch)
            ->orWhere('property_deed_image', 'LIKE', $bondSearch)
            ->orWhere('notes', 'LIKE', $bondSearch)
            ->orWhere('visibility', 'LIKE', $bondSearch)


            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Bonds;
        $this->Bonds = collect($Bonds->items());
        return view('livewire.bonds.show-bond.show-bond', [
            'links' => $links
        ]);
    }

    public function AddBondModal()
    {
        $this->reset('boycott_id', 'part_number', 'property_number', 'area_in_meters', 'area_in_olok', 'area_in_donum', 'count', 'date', 'volume_number', 'bond_type', 'ownership', 'property_type', 'governorate', 'district', 'mortgage_notes', 'registered_office', 'specialized_department', 'property_deed_image', 'notes', 'visibility');
        $this->resetValidation();
        $this->dispatchBrowserEvent('AddBondModal');

        $this->Boycott = Boycotts::find($this->boycott_id);
        $this->boycott_id = $this->boycott_id;
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            //'boycott_id' => 'required',
            'part_number' => 'required',
            'property_number' => 'required',
            'area_in_meters' => 'required',
            'area_in_olok' => 'required',
            'area_in_donum' => 'required',
            'count' => 'required',
            'date' => 'required',
            'volume_number' => 'required',
            'bond_type' => 'required',
            'ownership' => 'required',
            'property_type' => 'required',
            'governorate' => 'required',
            'district' => 'required',
            'mortgage_notes' => 'required',
            'registered_office' => 'required',
            'specialized_department' => 'required',
            //'property_deed_image' => 'required',
            //'notes' => 'required',
            'visibility' => 'required',

        ], [
            //'boycott_id.required' => 'حقل رقم المقاطعة مطلوب',
            'part_number.required' => 'حقل رقم القطعة مطلوب',
            'property_number.required' => 'حقل رقم العقار مطلوب',
            'area_in_meters.required' => 'حقل المساحة بالمتر مطلوب',
            'area_in_olok.required' => 'حقل المساحة بالأولك مطلوب',
            'area_in_donum.required' => 'حقل المساحة بالدونم مطلوب',
            'count.required' => 'حقل العدد مطلوب',
            'date.required' => 'حقل التاريخ مطلوب',
            'volume_number.required' => 'حقل رقم الجلد مطلوب',
            'bond_type.required' => 'حقل نوع السند مطلوب',
            'ownership.required' => 'حقل العائدية مطلوب',
            'property_type.required' => 'حقل جنس العقار مطلوب',
            'governorate.required' => 'حقل المحافظة مطلوب',
            'district.required' => 'حقل القضاء مطلوب',
            'mortgage_notes.required' => 'حقل إشارات التأمينات مطلوب',
            'registered_office.required' => 'حقل الدائرة المسجل لديها مطلوب',
            'specialized_department.required' => 'حقل الشعبة المختصة مطلوب',
            //'property_deed_image.required' => 'حقل صورة السند العقاري مطلوب',
            //'notes.required' => 'حقل ملاحظات مطلوب',
            'visibility.required' => 'حقل إمكانية ظهوره مطلوب',
        ]);

        Bonds::create([
            'user_id' => Auth::User()->id,
            'boycott_id' => $this->boycott_id,
            'part_number' => $this->part_number,
            'property_number' => $this->property_number,
            'area_in_meters' => $this->area_in_meters,
            'area_in_olok' => $this->area_in_olok,
            'area_in_donum' => $this->area_in_donum,
            'count' => $this->count,
            'date' => $this->date,
            'volume_number' => $this->volume_number,
            'bond_type' => $this->bond_type,
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
        //$this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetBond($bondId)
{
    $this->resetValidation();

    $this->bond = Bonds::find($bondId);
    if ($this->bond) {
        $this->bondId = $this->bond->id;
        $this->user_id = $this->bond->user_id;
        $this->boycott_id = $this->bond->boycott_id;
        $this->part_number = $this->bond->part_number;
        $this->property_number = $this->bond->property_number;
        $this->area_in_meters = $this->bond->area_in_meters;
        $this->area_in_olok = $this->bond->area_in_olok;
        $this->area_in_donum = $this->bond->area_in_donum;
        $this->count = $this->bond->count;
        $this->date = $this->bond->date;
        $this->volume_number = $this->bond->volume_number;
        $this->bond_type = $this->bond->bond_type;
        $this->ownership = $this->bond->ownership;
        $this->property_type = $this->bond->property_type;
        $this->governorate = $this->bond->governorate;
        $this->district = $this->bond->district;
        $this->mortgage_notes = $this->bond->mortgage_notes;
        $this->registered_office = $this->bond->registered_office;
        $this->specialized_department = $this->bond->specialized_department;
        $this->property_deed_image = $this->bond->property_deed_image;
        $this->notes = $this->bond->notes;
        $this->visibility = $this->bond->visibility;

        // تحميل بيانات المقاطعة
        $this->boycott = $this->bond->Getboycott;

        // تحميل بيانات الأقضية بناءً على المحافظة
        if ($this->governorate) {
            $Governorate = Governorates::find($this->governorate);
            $this->Districts = $Governorate ? $Governorate->GetDistrict : [];
        }
    }
}



    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'boycott_id' => 'required:bonds',
            'part_number' => 'required:bonds',
            'property_number' => 'required:bonds',
            'area_in_meters' => 'required:bonds',
            'area_in_olok' => 'required:bonds',
            'area_in_donum' => 'required:bonds',
            'count' => 'required:bonds',
            'date' => 'required:bonds',
            'volume_number' => 'required:bonds',
            'bond_type' => 'required:bonds',
            'ownership' => 'required:bonds',
            'property_type' => 'required:bonds',
            'governorate' => 'required:bonds',
            'district' => 'required:bonds',
            'mortgage_notes' => 'required:bonds',
            'registered_office' => 'required:bonds',
            'specialized_department' => 'required:bonds',
            //'property_deed_image' => 'required:bonds',
            //'notes' => 'required:bonds',
            'visibility' => 'required:bonds',

        ], [
            'boycott_id.required' => 'حقل رقم المقاطعة مطلوب',
            'part_number.required' => 'حقل رقم القطعة مطلوب',
            'property_number.required' => 'حقل رقم العقار مطلوب',
            'area_in_meters.required' => 'حقل المساحة بالمتر مطلوب',
            'area_in_olok.required' => 'حقل المساحة بالأولك مطلوب',
            'area_in_donum.required' => 'حقل المساحة بالدونم مطلوب',
            'count.required' => 'حقل العدد مطلوب',
            'date.required' => 'حقل التاريخ مطلوب',
            'volume_number.required' => 'حقل رقم الجلد مطلوب',
            'bond_type.required' => 'حقل نوع السند مطلوب',
            'ownership.required' => 'حقل العائدية مطلوب',
            'property_type.required' => 'حقل جنس العقار مطلوب',
            'governorate.required' => 'حقل المحافظة مطلوب',
            'district.required' => 'حقل القضاء مطلوب',
            'mortgage_notes.required' => 'حقل إشارات التأمينات مطلوب',
            'registered_office.required' => 'حقل الدائرة المسجل لديها مطلوب',
            'specialized_department.required' => 'حقل الشعبة المختصة مطلوب',
            //'property_deed_image.required' => 'حقل صورة السند العقاري مطلوب',
            //'notes.required' => 'حقل ملاحظات مطلوب',
            'visibility.required' => 'حقل إمكانية ظهوره مطلوب',
        ]);

        $Bonds = Bonds::find($this->bondId);
        $Bonds->update([
            'user_id' => Auth::User()->id,
            'boycott_id' => $this->boycott_id,
            'part_number' => $this->part_number,
            'property_number' => $this->property_number,
            'area_in_meters' => $this->area_in_meters,
            'area_in_olok' => $this->area_in_olok,
            'area_in_donum' => $this->area_in_donum,
            'count' => $this->count,
            'date' => $this->date,
            'volume_number' => $this->volume_number,
            'bond_type' => $this->bond_type,
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
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);

        $this->mount();
    }

    public function destroy()
    {
        $Bonds = Bonds::find($this->BondId);

        if ($Bonds) {

            $Bonds->delete();
            $this->reset();
            $this->dispatchBrowserEvent('success', [
                'message' => 'تم حذف البيانات بنجاح',
                'title' => 'الحذف'
            ]);
            $this->mount();
        }
    }
}

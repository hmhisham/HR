<?php

namespace App\Http\Livewire\Bonds\ShowBond;

use Livewire\Component;

use App\Models\Bonds\Bonds;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use App\Models\Boycotts\Boycotts;
use Illuminate\Support\Facades\Auth;
use App\Models\Department\Department;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Models\Governorates\Governorates;
use App\Models\Propertytypes\Propertytypes;

class ShowBond extends Component
{
    use WithFileUploads;
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
    public $user_id, $boycott_id, $part_number, $property_number, $area_in_meters, $area_in_olok, $area_in_donum, $count, $date, $volume_number, $bond_type, $ownership, $property_type, $governorate, $district, $mortgage_notes, $registered_office, $specialized_department, $property_deed_image, $notes;
    public $GovernorateName, $DistrictsName, $filePreview;
    public $visibility = false;


    protected $listeners = [
        'SelectOwnership',
        'SelectRegisteredOffice',
        'SelectGovernorate',
        'SelectDistrict',
        'SelectPropertyType',
        'SelectDate'
    ];

    public function hydrate()
    {
        $this->emit('select2');
        $this->emit('flatpickr');
    }

    public function mount()
    {
        $this->department = Department::all();
        $this->governorates = Governorates::all();
        $this->propertytypes = Propertytypes::all();

        $this->Boycott = Boycotts::find($this->boycott_id);
        $this->BoycottBonds = $this->Boycott->GetBonds;
    }

    public $search = [
        'part_number' => '',
        'property_number' => '',
        'mortgage_notes' => '',
        'specialized_department' => '',
    ];

    public function render()
    {
        $bonds = QueryBuilder::for(Bonds::class)
            ->allowedFilters([
                AllowedFilter::callback('part_number', function ($query, $value) {
                    $query->where('part_number', 'LIKE', '%' . $value . '%');
                }),
                AllowedFilter::partial('property_number'),
                AllowedFilter::partial('mortgage_notes'),
                AllowedFilter::partial('specialized_department'),

            ])
            ->where(function ($query) {
                foreach ($this->search as $field => $value) {
                    if (!empty($value)) {
                        $query->where($field, 'like', '%' . $value . '%');
                    }
                }
            })
            ->orderBy('id', 'ASC')
            ->paginate(10);

            return view('livewire.bonds.show-bond.show-bond', [
                'bonds' => $bonds,
            ]);
    }


    public function AddBondModal()
    {
        $this->reset('part_number', 'property_number', 'area_in_meters', 'area_in_olok', 'area_in_donum', 'count', 'date', 'volume_number', 'bond_type', 'ownership', 'property_type', 'governorate', 'district', 'mortgage_notes', 'registered_office', 'specialized_department', 'property_deed_image', 'notes', 'visibility');
        $this->resetValidation();
        $this->dispatchBrowserEvent('AddBondModal');

        $this->Boycott = Boycotts::find($this->boycott_id);
        $this->boycott_id = $this->boycott_id;
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

    public function updatedPropertyDeedImage()
    {
        $this->validate([
            'property_deed_image' => 'required|file|max:10240', // الحد الأقصى للحجم 10 ميجابايت
        ], [
            'property_deed_image.max' => 'يجب ألا يزيد حجم ملف القطعة عن 1024 كيلوبايت.'
        ]);

        $this->filePreview = $this->property_deed_image->temporaryUrl();
    }

    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'part_number' => 'required',
            'property_number' => 'required',
            'property_number' => [
                'required',
                Rule::unique('bonds')->ignore($this->bondId)->where(function ($query) {
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
            'bond_type' => 'required',
            'ownership' => 'required',
            'property_type' => 'required',
            'governorate' => 'required',
            'district' => 'required',
            'mortgage_notes' => 'required',
            'registered_office' => 'required',
            'specialized_department' => 'required',
            //'notes' => 'required',
            //'visibility' => 'required',

        ], [
            'part_number.required' => 'حقل رقم القطعة مطلوب',
            'property_number.required' => 'حقل رقم العقار مطلوب',
            'area_in_meters.required' => 'حقل المساحة بالمتر مطلوب',
            'property_number.unique' => 'رقم العقار هذا موجود بالفعل ضمن نفس القطعة والمقاطعة',
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
            //'notes.required' => 'حقل ملاحظات مطلوب',
            //'visibility.required' => 'حقل إمكانية ظهوره مطلوب',
        ]);

        if ($this->property_deed_image) {
            $this->validate([
                'property_deed_image' => 'required|file|max:1024', // الحد الأقصى للحجم 1 ميجابايت
            ], [
                'property_deed_image.required' => 'ملف السند العقاري مطلوب.',
                'property_deed_image.max' => 'يجب ألا يزيد حجم ملف السند العقاري عن 1024 كيلوبايت.',
            ]);

            $this->property_deed_image->store('public/Bonds');
        }

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
            'property_deed_image' => $this->property_deed_image->hashName(),
            'notes' => $this->notes,
            'visibility' => $this->visibility,
        ]);

        $this->resetExcept('boycott_id');
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);

        $this->mount();
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
            'property_number' => [
                'required',
                Rule::unique('bonds')->ignore($this->bondId)->where(function ($query) {
                    return $query->where('part_number', $this->part_number)
                        ->where('boycott_id', $this->boycott_id);
                })
            ],
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
            //'notes' => 'required:bonds',
            //'visibility' => 'required:bonds',

        ], [
            'boycott_id.required' => 'حقل رقم المقاطعة مطلوب',
            'part_number.required' => 'حقل رقم القطعة مطلوب',
            'property_number.required' => 'حقل رقم العقار مطلوب',
            'property_number.unique' => 'رقم العقار هذا موجود بالفعل ضمن نفس القطعة والمقاطعة',
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
            //'visibility.required' => 'حقل إمكانية ظهوره مطلوب',
        ]);

        $Bonds = Bonds::find($this->bondId);

        if ($this->filePreview) {
            $this->validate([
                'property_deed_image' => 'required|max:1024', // الحد الأقصى للحجم 1 ميجابايت
            ], [
                'property_deed_image.required' => 'ملف السند العقاري مطلوب.',
                'property_deed_image.max' => 'يجب ألا يزيد حجم ملف السند العقاري عن 1024 كيلوبايت.',
            ]);

            if (file_exists(public_path('storage/Bonds/' . $this->part_number))) {
                unlink(public_path('storage/Bonds/' . $this->part_number));
            }

            $this->property_deed_image->store('public/Bonds');
        }

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
            'property_deed_image' => $this->property_deed_image->hashName(),
            'notes' => $this->notes,
            'visibility' => $this->visibility,
        ]);

        $this->resetExcept('boycott_id');
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

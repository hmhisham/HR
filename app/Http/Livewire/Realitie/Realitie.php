<?php

namespace App\Http\Livewire\Realitie;

use Livewire\Component;

use App\Models\Plots\Plots;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use App\Models\Realities\Realities;
use Illuminate\Support\Facades\Auth;
use App\Models\Governorates\Governorates;
use App\Models\Propertytypes\Propertytypes;

class Realitie extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Plots = [];
    public $governorates = [];
    public $Districts = [];
    public $propertytypes = [];
    public $Plot, $PlotId;
    public $province_number, $province_name, $plot_number;
    public $property_number, $area_in_meters, $area_in_olok, $area_in_donum, $count, $date, $volume_number, $bond_type, $ownership, $property_type, $governorate, $district, $mortgage_notes, $registered_office, $specialized_department, $notes;
    public $filePreview, $property_deed_image;
    public $visibility = false;

    protected $listeners = [
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
        $this->Plot = Plots::all();
        $this->governorates = Governorates::all();
        $this->propertytypes = Propertytypes::all();
    }
    //المحافظة
    public function SelectGovernorate($GovernorateID)
    {
        $this->governorate = $GovernorateID;
        $Governorate = Governorates::find($GovernorateID);
        $this->Districts = $Governorate->GetDistrict;
        $this->reset('district');
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

    public $search = ['province_number' => '', 'province_name' => '', 'plot_number' => '',];

    public function render()
    {
        $searchNumber = '%' . $this->search['province_number'] . '%';
        $searchName = '%' . $this->search['province_name'] . '%';
        $searchPlotNumber = '%' . $this->search['plot_number'] . '%';

        $Plots = Plots::with(['GetProvinces', 'GetRealities'])
            ->when($this->search['province_number'], function ($query) use ($searchNumber) {
                $query->whereHas('GetProvinces', function ($q) use ($searchNumber) {
                    $q->where('province_number', 'LIKE', $searchNumber);
                });
            })
            ->when($this->search['province_name'], function ($query) use ($searchName) {
                $query->whereHas('GetProvinces', function ($q) use ($searchName) {
                    $q->where('province_name', 'LIKE', $searchName);
                });
            })
            ->when($this->search['plot_number'], function ($query) use ($searchPlotNumber) {
                $query->where('plot_number', 'LIKE', $searchPlotNumber);
            })
            ->orderBy('id', 'ASC')
            ->paginate(10);

        $links = $Plots;
        $this->Plots = collect($Plots->items());

        return view('livewire.realitie.realitie', [
            'links' => $links,
        ]);
    }

    public function GetPlot($PlotId, $province_number, $province_name, $plot_number)
    {
        $this->resetValidation();

        $this->Plot = Plots::find($PlotId);
        $this->PlotId = $this->Plot->id;
        $this->plot_number = $plot_number;
        $this->province_number = $province_number;
        $this->province_name = $province_name;
    }

    public function addRealitieToPlot($PlotID)
    {
        $this->reset('property_number', 'area_in_meters', 'area_in_olok', 'area_in_donum', 'count', 'date', 'volume_number', 'bond_type', 'ownership', 'property_type', 'governorate', 'district', 'mortgage_notes', 'registered_office', 'specialized_department', 'property_deed_image', 'notes', 'visibility');
        $this->resetValidation();
        $this->dispatchBrowserEvent('addRealitieToPlotModal');
    }

    public function updatedRealitieImage()
    {
        $this->validate([
            'property_deed_image' => 'required|file|mimes:jpeg,png,jpg,pdf|max:1024',
        ], [
            'property_deed_image.required' => 'ملف القطعة مطلوب.',
            'property_deed_image.max' => 'يجب ألا يزيد حجم ملف القطعة عن 1024 كيلوبايت.',
            'property_deed_image.mimes' => 'الملف ليس صورة أو PDF',
        ]);
        $this->filePreview = $this->property_deed_image->temporaryUrl();
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'property_number' => [
                'required',
                Rule::unique('realities')->where(function ($query) {
                    return $query->where('plot_id', $this->PlotId);
                }),
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
            'property_deed_image' => 'required|file|mimes:jpeg,png,jpg,pdf|max:1024',
        ], [
            'property_number.required' => 'حقل رقم العقار مطلوب',
            'property_number.unique' => 'رقم السند موجود بالفعل في هذه القطعة',
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
            'property_deed_image.required' => 'ملف السند العقاري مطلوب.',
            'property_deed_image.max' => 'يجب ألا يزيد حجم ملف السند العقاري عن 1024 كيلوبايت.',
            'property_deed_image.mimes' => 'الملف ليس صورة أو PDF',
        ]);

        $this->property_deed_image->store('public/Realities/' . $this->property_number);

        Realities::create([
            'user_id' => Auth::User()->id,
            'plot_id' => $this->PlotId,
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
        $this->reset('property_number', 'area_in_meters', 'area_in_olok', 'area_in_donum', 'count', 'date', 'volume_number', 'bond_type', 'ownership', 'property_type', 'governorate', 'district', 'mortgage_notes', 'registered_office', 'specialized_department', 'property_deed_image', 'notes', 'visibility', 'filePreview');
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
        $this->mount();
    }
}

<?php

namespace App\Http\Livewire\Realities;

use Livewire\Component;

use App\Models\Plots\Plots;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use App\Models\Tracking\Tracking;
use App\Models\Districts\Districts;
use App\Models\Provinces\Provinces;
use App\Models\Realities\Realities;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Governorates\Governorates;
use App\Models\Propertytypes\Propertytypes;
use App\Models\Propertycategory\Propertycategory;

class Show extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Plot;
    public $Province;
    public $Plotid, $Provinceid;
    public $Realities = [];
    public $governorates = [];
    public $Districts = [];
    public $propertytypes = [];
    public $branches = [];
    public $propertycategory = [];
    public $RealitieSearch, $Realitie, $RealitieId;
    public $province_number, $province_name, $plot_number;
    public $province_id, $plot_id, $property_number, $area_in_meters, $area_in_olok, $area_in_donum, $count, $date, $volume_number, $propertycategory_id, $ownership, $property_type, $governorate, $district, $mortgage_notes, $registered_office, $specialized_department,  $notes;
    public $filePreview, $property_deed_image, $previewRealitieDeedImage,    $bond_type;
    public $visibility = false;
    public $selectedRealities = [];
    public $selectedBranch;
    public $selectedVisibility;
    public $selectAll = false;
    public $search = ['property_number' => '', 'count' => '', 'mortgage_notes' => '', 'volume_number' => '', 'specialized_department' => '', 'visibility' => '', 'property_deed_image' => ''];


    protected $listeners = [
        'SelectGovernorate',
        'SelectDistrict',
        'SelectPropertyType',
        'SelectDate',
        'SelectPropertycategoryId',
    ];

    public function hydrate()
    {
        $this->emit('select2');
        $this->emit('flatpickr');
    }

    public function mount($Plotid, $Provinceid)
    {
        $this->Plotid = $Plotid;
        $this->Provinceid = $Provinceid;

        // جلب بيانات المقاطعة والقطعة
        $this->Plot = Plots::with('GetProvinces')->find($this->Plotid);

        if ($this->Plot) {
            $this->Province = $this->Plot->GetProvinces;
            $this->province_number = $this->Province->province_number ?? '';
            $this->province_name = $this->Province->province_name ?? '';
            $this->plot_number = $this->Plot->plot_number ?? '';
        }

        $this->governorates = Governorates::all();
        $this->propertytypes = Propertytypes::all();
        $this->propertycategory = Propertycategory::all();

        $this->Province = Provinces::find($this->Provinceid);
        if ($this->Province) {
            $section = $this->Province->Getsection;
            if ($section) {
                $this->branches = $section->GetBranch;
            }
        }
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

    //نوع العقار
    public function SelectPropertycategoryId($PropertycategoryIdID)
    {
        $propertycategory_id = Propertycategory::find($PropertycategoryIdID);
        if ($propertycategory_id) {
            $this->propertycategory_id = $PropertycategoryIdID;
        } else {
            $this->propertycategory_id = null;
        }
    }

    public function updatedSearch($value, $key)
    {
        // إعادة تعيين الصفحة إلى الأولى فقط إذا كان البحث قد تغير
        if (in_array($key, ['property_number', 'count', 'mortgage_notes', 'volume_number', 'visibility','property_deed_image'])) {
            $this->resetPage();
        }
    }

    public function render()
    {
        $searchPropertyNumber = '%' . $this->search['property_number'] . '%';
        $searchCount = '%' . $this->search['count'] . '%';
        $searchMortgageNotes = $this->search['mortgage_notes'];
        $searchVolumeNumber = '%' . $this->search['volume_number'] . '%';
        $searchSpecializedDepartment = '%' . $this->search['specialized_department'] . '%';
        $searchVisibility = $this->search['visibility'];
        $searchPropertyDeedImage = $this->search['property_deed_image'];

        $Realities = Realities::query()
            ->where('plot_id', $this->Plotid)
            ->when($this->search['property_number'], function ($query) use ($searchPropertyNumber) {
                $query->where('property_number', 'LIKE', $searchPropertyNumber);
            })
            ->when($this->search['count'], function ($query) use ($searchCount) {
                $query->where('count', 'LIKE', $searchCount);
            })
            ->when($this->search['mortgage_notes'], function ($query) use ($searchMortgageNotes) {
                $query->where('mortgage_notes', $searchMortgageNotes);
            })
            ->when($this->search['volume_number'], function ($query) use ($searchVolumeNumber) {
                $query->where('volume_number', 'LIKE', $searchVolumeNumber);
            })
            ->when($this->search['specialized_department'], function ($query) use ($searchSpecializedDepartment) {
                $query->where('specialized_department', 'LIKE', $searchSpecializedDepartment);
            })
            ->when($this->search['visibility'] !== '', function ($query) use ($searchVisibility) {
                $query->where('visibility', $searchVisibility);
            })
            ->when(!empty($this->search['property_deed_image']), function ($query) use ($searchPropertyDeedImage) {
                if ($searchPropertyDeedImage === 'مرفقة') {
                    $query->whereNotNull('property_deed_image');
                } elseif ($searchPropertyDeedImage === 'غير مرفقة') {
                    $query->whereNull('property_deed_image');
                }
            })
            ->orderByRaw('CAST(property_number AS UNSIGNED) ASC')
            ->paginate(10);

        $links = $Realities;
        $this->Realities = collect($Realities->items());

        if ($this->Province) {
            $section = $this->Province->Getsection;
            if ($section) {
                $this->branches = $section->GetBranch;
            }
        }

        return view('livewire.realities.show', [
            'links' => $links,
            'Realities' => $Realities,
        ]);
    }

    public function addRealitieModal()
    {
        $this->reset('province_id', 'plot_id', 'property_number', 'area_in_meters', 'area_in_olok', 'area_in_donum', 'count', 'date', 'volume_number', 'propertycategory_id', 'ownership', 'property_type', 'governorate', 'district', 'mortgage_notes', 'registered_office', 'specialized_department', 'property_deed_image', 'notes', 'visibility');
        $this->resetValidation();
        $this->dispatchBrowserEvent('addRealitieModal');
    }

    public function updatedPropertyDeedImage()
    {
        $this->validate([
            'property_deed_image' => 'required|file|mimes:jpeg,png,jpg,pdf',
        ], [
            'property_deed_image.required' => 'الملف مطلوب',
            'property_deed_image.mimes' => 'الملف ليس صورة أو PDF',
        ]);

        $this->filePreview = $this->property_deed_image->temporaryUrl();
        $this->previewRealitieDeedImage = null;
    }

    //تحديث السجلات المحددة
    public function updateBatch()
    {
        if (empty($this->selectedRealities)) {
            $this->dispatchBrowserEvent('error', [
                'message' => 'يرجى تحديد سجل واحد على الأقل',
                'title' => 'تحديد'
            ]);
            return;
        }
        foreach ($this->selectedRealities as $realitieId) {
            $realitie = Realities::find($realitieId);
            if ($realitie) {
                $data = [];
                if ($this->selectedBranch !== null && $this->selectedBranch !== '') {
                    $data['specialized_department'] = $this->selectedBranch;
                }
                if ($this->selectedVisibility !== null && $this->selectedVisibility !== '') {
                    $data['visibility'] = $this->selectedVisibility;
                }
                if (!empty($data)) {
                    $realitie->update($data);
                }
            }
        }
        $this->selectedRealities = [];
        $this->selectedBranch = '';
        $this->selectedVisibility = '';
        $this->dispatchBrowserEvent('success', ['message' => 'تم تحديث السجلات المحددة بنجاح', 'title' => 'تعديل']);
    }

    // تحديد الكل
    public function updatedSelectAll($value)
    {
        if ($value) {
            // الحصول على جميع العناصر من قاعدة البيانات بدلاً من الصفحة الحالية فقط
            $allRealities = Realities::where('plot_id', $this->Plotid)->pluck('id')->toArray();
            $this->selectedRealities = $allRealities;
        } else {
            $this->selectedRealities = [];
        }
    }

    // إذا كانت جميع الصفوف محددة، نقوم بتحديد مربع "تحديد الكل"
    public function updatedSelectedRealities()
    {
        $allRealities = Realities::where('plot_id', $this->Plotid)->pluck('id')->toArray();
        $this->selectAll = count($this->selectedRealities) === count($allRealities);
    }

    public function selectAllRecords($allRealities)
    {
        $this->selectedRealities = $allRealities;
        $this->selectAll = true;
    }

    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'property_number' => [
                'required',
                Rule::unique('realities')->where(function ($query) {
                    return $query->where('plot_id', $this->Plotid);
                }),
            ],
            'area_in_meters' => 'required',
            'area_in_olok' => 'required',
            'area_in_donum' => 'required',
            'count' => 'required',
            'date' => 'required',
            'volume_number' => 'required',
            'propertycategory_id' => 'required',
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
            'property_number.unique' => 'رقم العقار موجود مسبقًا ضمن هذه القطعة',
            'area_in_meters.required' => 'حقل المساحة بالمتر مطلوب',
            'area_in_olok.required' => 'حقل المساحة بالأولك مطلوب',
            'area_in_donum.required' => 'حقل المساحة بالدونم مطلوب',
            'count.required' => 'حقل العدد مطلوب',
            'date.required' => 'حقل التاريخ مطلوب',
            'volume_number.required' => 'حقل رقم الجلد مطلوب',
            'propertycategory_id.required' => 'حقل نوع السند مطلوب',
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

        $plot = Plots::find($this->Plotid);
        $province_id = $plot->province_id;
        $this->property_deed_image->store('public/Realities/' . $this->province_number . '/' . $this->plot_number . '/' . $this->property_number);

        Realities::create([
            'user_id' => Auth::User()->id,
            'province_id' => $province_id,
            'plot_id' => $this->Plotid,
            'property_number' => $this->property_number,
            'area_in_meters' => $this->area_in_meters,
            'area_in_olok' => $this->area_in_olok,
            'area_in_donum' => $this->area_in_donum,
            'count' => $this->count,
            'date' => $this->date,
            'volume_number' => $this->volume_number,
            'propertycategory_id' => $this->propertycategory_id,
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

        // =================================
        Tracking::create([
            'user_id' => Auth::id(),
            'page_name' => 'السند العقاري',
            'operation_type' => 'اضافة',
            'operation_time' => now()->format('Y-m-d H:i:s'),
            'details' => "رقم المقاطعة: " . $this->province_id . ' - '  . " \nرقم القطعة: " . $this->plot_id . ' - '  . " \nرقم العقار: " . $this->property_number . ' - '  . " \nالمساحة بالمتر: " . $this->area_in_meters . ' - '  . " \nالمساحة بالأولك: " . $this->area_in_olok . ' - '  . " \nالمساحة بالدونم: " . $this->area_in_donum . ' - '  . " \nالعدد: " . $this->count . ' - '  . " \nالتاريخ: " . $this->date . ' - '  . " \nرقم الجلد: " . $this->volume_number . ' - '  . " \nنوع السند: " . $this->bond_type . ' - '  . " \nالعائدية: " . $this->ownership . ' - '  . " \nجنس العقار: " . $this->property_type . ' - '  . " \nالمحافظة: " . $this->governorate . ' - '  . " \nالقضاء: " . $this->district . ' - '  . " \nإشارات التأمينات: " . $this->mortgage_notes . ' - '  . " \nالدائرة المسجل لديها: " . $this->registered_office . ' - '  . " \nالشعبة المختصة: " . $this->specialized_department . ' - '  . " \nصورة السند العقاري: " . $this->property_deed_image . ' - '  . " \nملاحظات: " . $this->notes . ' - '  . " \nإمكانية ظهوره: " . $this->visibility,
        ]);
        // ==================================

        $this->reset('property_number', 'area_in_meters', 'area_in_olok', 'area_in_donum', 'count', 'date', 'volume_number', 'propertycategory_id', 'ownership', 'property_type', 'governorate', 'district', 'mortgage_notes', 'registered_office', 'specialized_department', 'property_deed_image', 'notes', 'visibility');
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
        /* $this->mount(); */
    }

    public function GetRealitie($RealitieId)
    {

        $this->reset('property_number', 'area_in_meters', 'area_in_olok', 'area_in_donum', 'count', 'date', 'volume_number', 'propertycategory_id', 'ownership', 'property_type', 'governorate', 'district', 'mortgage_notes', 'registered_office', 'specialized_department', 'property_deed_image', 'filePreview', 'notes', 'visibility');
        $this->resetValidation();
        $this->dispatchBrowserEvent('editRealitieModalShow');

        $this->Realitie = Realities::find($RealitieId);
        $this->RealitieId = $RealitieId;
        $this->plot_id = $this->Realitie->plot_id;
        $this->property_number = $this->Realitie->property_number;
        $this->area_in_meters = $this->Realitie->area_in_meters;
        $this->area_in_olok = $this->Realitie->area_in_olok;
        $this->area_in_donum = $this->Realitie->area_in_donum;
        $this->count = $this->Realitie->count;
        $this->date = $this->Realitie->date;
        $this->volume_number = $this->Realitie->volume_number;
        $this->propertycategory_id = $this->Realitie->propertycategory_id;
        $this->ownership = $this->Realitie->ownership;
        $this->property_type = $this->Realitie->property_type;
        $this->governorate = $this->Realitie->governorate;
        $this->district = $this->Realitie->district;
        $this->mortgage_notes = $this->Realitie->mortgage_notes;
        $this->registered_office = $this->Realitie->registered_office;
        $this->specialized_department = $this->Realitie->specialized_department;
        $this->previewRealitieDeedImage = $this->Realitie->property_deed_image;
        $this->notes = $this->Realitie->notes;
        $this->visibility = $this->Realitie->visibility;

        $this->Districts = Districts::where('governorate_id', $this->governorate)->get();
    }

    public function printt($RealitieId)
    {

        $this->Realitie = Realities::find($RealitieId);
        $this->RealitieId = $RealitieId;
        $this->plot_id = $this->Realitie->plot_id;
        $this->property_number = $this->Realitie->property_number;
        $this->area_in_meters = $this->Realitie->area_in_meters;
        $this->area_in_olok = $this->Realitie->area_in_olok;
        $this->area_in_donum = $this->Realitie->area_in_donum;
        $this->count = $this->Realitie->count;
        $this->date = $this->Realitie->date;
        $this->volume_number = $this->Realitie->volume_number;
        $this->propertycategory_id = $this->Realitie->propertycategory_id;
        $this->ownership = $this->Realitie->ownership;
        $this->property_type = $this->Realitie->property_type;
        $this->governorate = $this->Realitie->governorate;
        $this->district = $this->Realitie->district;
        $this->mortgage_notes = $this->Realitie->mortgage_notes;
        $this->registered_office = $this->Realitie->registered_office;
        $this->specialized_department = $this->Realitie->specialized_department;
        $this->previewRealitieDeedImage = $this->Realitie->property_deed_image;
        $this->notes = $this->Realitie->notes;
        $this->visibility = $this->Realitie->visibility;
        Tracking::create([
            'user_id' => Auth::id(),
            'page_name' => 'السندات العقارية',
            'operation_type' => 'طباعة',
            'operation_time' => now()->format('Y-m-d H:i:s'),
            'details' =>   " \nرقم القطعة: " . $this->plot_id . ' - '  . " \nرقم العقار: " . $this->property_number . ' - '  . " \nالمساحة بالمتر: " . $this->area_in_meters . ' - '  . " \nالمساحة بالأولك: " . $this->area_in_olok . ' - '  . " \nالمساحة بالدونم: " . $this->area_in_donum . ' - '  . " \nالعدد: " . $this->count . ' - '  . " \nالتاريخ: " . $this->date . ' - '  . " \nرقم الجلد: " . $this->volume_number . ' - '  . " \nنوع العقار: " . $this->propertycategory_id . ' - '  . " \nالعائدية: " . $this->ownership . ' - '  . " \nجنس العقار: " . $this->property_type . ' - '  . " \nالمحافظة: " . $this->governorate . ' - '  . " \nالقضاء: " . $this->district . ' - '  . " \nإشارات التأمينات: " . $this->mortgage_notes . ' - '  . " \nالدائرة المسجل لديها: " . $this->registered_office . ' - '  . " \nالشعبة المختصة: " . $this->specialized_department . ' - '  . " \nصورة السند العقاري: " . $this->property_deed_image . ' - '  . " \nملاحظات: " . $this->notes . ' - '  . " \nإمكانية ظهوره: " . $this->visibility,
        ]);
    }
    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'property_number' => [
                'required',
                Rule::unique('realities')->where(function ($query) {
                    return $query->where('plot_id', $this->Plotid);
                })->ignore($this->RealitieId),
            ],
            'area_in_meters' => 'required:realities',
            'area_in_olok' => 'required:realities',
            'area_in_donum' => 'required:realities',
            'count' => 'required:realities',
            'date' => 'required:realities',
            'volume_number' => 'required:realities',
            'propertycategory_id' => 'required:realities',
            'ownership' => 'required:realities',
            'property_type' => 'required:realities',
            'governorate' => 'required:realities',
            'district' => 'required:realities',
            'mortgage_notes' => 'required:realities',
            'registered_office' => 'required:realities',
            'specialized_department' => 'required:realities',
            'property_deed_image' => $this->Realitie->property_deed_image && !$this->filePreview
                ? 'nullable|file|mimes:jpeg,png,jpg,pdf|max:1024'
                : 'required|file|mimes:jpeg,png,jpg,pdf|max:1024',
        ], [
            'property_number.required' => 'حقل رقم العقار مطلوب',
            'property_number.unique' => 'رقم العقار موجود مسبقًا ضمن هذه القطعة',
            'area_in_meters.required' => 'حقل المساحة بالمتر مطلوب',
            'area_in_olok.required' => 'حقل المساحة بالأولك مطلوب',
            'area_in_donum.required' => 'حقل المساحة بالدونم مطلوب',
            'count.required' => 'حقل العدد مطلوب',
            'date.required' => 'حقل التاريخ مطلوب',
            'volume_number.required' => 'حقل رقم الجلد مطلوب',
            'propertycategory_id.required' => 'حقل نوع السند مطلوب',
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

        $plot = Plots::find($this->Plotid);
        $province_id = $plot->province_id;

        if ($this->filePreview) {
            Storage::delete('public/Realities/' . $this->province_number . '/' . $this->plot_number . '/' . $this->Realitie->property_number . '/' . $this->Realitie->property_deed_image);
            $this->property_deed_image->store('public/Realities/' . $this->province_number . '/' . $this->plot_number . '/' . $this->property_number);
            $fileDeepImage = $this->property_deed_image->hashName();
        }

        if ($this->Realitie->property_number !== $this->property_number) {
            Storage::move(
                'public/Realities/' . $this->province_number . '/' . $this->plot_number . '/' . $this->Realitie->property_number,
                'public/Realities/' . $this->province_number . '/' . $this->plot_number . '/' . $this->property_number
            );
        }

        $Realities = Realities::find($this->RealitieId);
        $Realities->update([
            'user_id' => Auth::User()->id,
            'province_id' => $province_id,
            'plot_id' => $this->plot_id,
            'property_number' => $this->property_number,
            'area_in_meters' => $this->area_in_meters,
            'area_in_olok' => $this->area_in_olok,
            'area_in_donum' => $this->area_in_donum,
            'count' => $this->count,
            'date' => $this->date,
            'volume_number' => $this->volume_number,
            'propertycategory_id' => $this->propertycategory_id,
            'ownership' => $this->ownership,
            'property_type' => $this->property_type,
            'governorate' => $this->governorate,
            'district' => $this->district,
            'mortgage_notes' => $this->mortgage_notes,
            'registered_office' => $this->registered_office,
            'specialized_department' => $this->specialized_department,
            'property_deed_image' => $fileDeepImage ?? $this->Realitie->property_deed_image,
            'notes' => $this->notes,
            'visibility' => $this->visibility,

        ]);

        // =================================
        Tracking::create([
            'user_id' => Auth::id(),
            'page_name' => 'السند العقاري',
            'operation_type' => 'تعديل',
            'operation_time' => now()->format('Y-m-d H:i:s'),
            'details' => "رقم المقاطعة: " . $this->province_id . ' - '  . " \nرقم القطعة: " . $this->plot_id . ' - '  . " \nرقم العقار: " . $this->property_number . ' - '  . " \nالمساحة بالمتر: " . $this->area_in_meters . ' - '  . " \nالمساحة بالأولك: " . $this->area_in_olok . ' - '  . " \nالمساحة بالدونم: " . $this->area_in_donum . ' - '  . " \nالعدد: " . $this->count . ' - '  . " \nالتاريخ: " . $this->date . ' - '  . " \nرقم الجلد: " . $this->volume_number . ' - '  . " \nنوع السند: " . $this->bond_type . ' - '  . " \nالعائدية: " . $this->ownership . ' - '  . " \nجنس العقار: " . $this->property_type . ' - '  . " \nالمحافظة: " . $this->governorate . ' - '  . " \nالقضاء: " . $this->district . ' - '  . " \nإشارات التأمينات: " . $this->mortgage_notes . ' - '  . " \nالدائرة المسجل لديها: " . $this->registered_office . ' - '  . " \nالشعبة المختصة: " . $this->specialized_department . ' - '  . " \nصورة السند العقاري: " . $this->property_deed_image . ' - '  . " \nملاحظات: " . $this->notes . ' - '  . " \nإمكانية ظهوره: " . $this->visibility,
        ]);
        // ==================================
        $this->reset('property_number', 'area_in_meters', 'area_in_olok', 'area_in_donum', 'count', 'date', 'volume_number', 'propertycategory_id', 'ownership', 'property_type', 'governorate', 'district', 'mortgage_notes', 'registered_office', 'specialized_department', 'property_deed_image', 'filePreview', 'notes', 'visibility');
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
        /* $this->mount(); */
    }

    public function destroy()
    {
        // =================================
        Tracking::create([
            'user_id' => Auth::id(),
            'page_name' => 'السند العقاري',
            'operation_type' => 'حذف',
            'operation_time' => now()->format('Y-m-d H:i:s'),
            'details' => "رقم المقاطعة: " . $this->province_id . ' - '  . " \nرقم القطعة: " . $this->plot_id . ' - '  . " \nرقم العقار: " . $this->property_number . ' - '  . " \nالمساحة بالمتر: " . $this->area_in_meters . ' - '  . " \nالمساحة بالأولك: " . $this->area_in_olok . ' - '  . " \nالمساحة بالدونم: " . $this->area_in_donum . ' - '  . " \nالعدد: " . $this->count . ' - '  . " \nالتاريخ: " . $this->date . ' - '  . " \nرقم الجلد: " . $this->volume_number . ' - '  . " \nنوع السند: " . $this->bond_type . ' - '  . " \nالعائدية: " . $this->ownership . ' - '  . " \nجنس العقار: " . $this->property_type . ' - '  . " \nالمحافظة: " . $this->governorate . ' - '  . " \nالقضاء: " . $this->district . ' - '  . " \nإشارات التأمينات: " . $this->mortgage_notes . ' - '  . " \nالدائرة المسجل لديها: " . $this->registered_office . ' - '  . " \nالشعبة المختصة: " . $this->specialized_department . ' - '  . " \nصورة السند العقاري: " . $this->property_deed_image . ' - '  . " \nملاحظات: " . $this->notes . ' - '  . " \nإمكانية ظهوره: " . $this->visibility,
        ]);
        // ==================================
        $this->Realitie->delete();
        Storage::deleteDirectory('public/Realities/' . $this->province_number . '/' . $this->plot_number . '/' . $this->property_number);

        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الحذف بنجاح',
            'title' => 'حذف'
        ]);
        /* $this->mount(); */
    }
}

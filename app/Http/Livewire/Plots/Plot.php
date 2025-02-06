<?php

namespace App\Http\Livewire\Plots;

use Livewire\Component;
use App\Models\Plots\Plots;
use Livewire\WithPagination;
use App\Models\Branch\Branch;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use App\Models\Tracking\Tracking;
use App\Models\Provinces\Provinces;
use Illuminate\Support\Facades\Auth;

class Plot extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Provinces = [];
    public $branch = [];
    public $Province, $ProvinceId;
    public $specialized_department, $province_number, $province_name, $section_id;
    public $plot_number, $Plot, $property_deed_image, $property_map_image;
    public $filePreviewDeep, $filePreviewMap, $previewPropertyDeedImage, $previewPropertyMapImage;
    public $visibility = false;
    public $search = ['province_number' => '', 'province_name' => ''];

    public $latitude;
    public $longitude;

    protected $listeners = [
        'SelectSpecializedDepartment',
    ];
    public function hydrate()
    {
        $this->emit('select2');
    }
    public function mount()
    {
        $this->branch = Branch::all();
    }
    public function SelectSpecializedDepartment($SpecializedDepartmentID)
    {
        $specialized_department = Branch::find($SpecializedDepartmentID);
        if ($specialized_department && $specialized_department->section_id == $this->section_id) {
            $this->specialized_department = $SpecializedDepartmentID;
        } else {
            $this->specialized_department = null;
        }
    }

    public function updatedSearch($value, $key)
    {
        // إعادة تعيين الصفحة إلى الأولى فقط إذا كان البحث قد تغير
        if (in_array($key, ['province_number', 'province_name'])) {
            $this->resetPage();
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
            ->orderByRaw('CAST(province_number AS UNSIGNED) ASC')
            ->paginate(10);

        $links = $Provinces;
        $this->Provinces = collect($Provinces->items());

        if ($this->section_id) {
            $this->branch = $this->getBranchesBySectionId($this->section_id);
        }

        return view('livewire.plots.plot', [
            'Provinces' => $Provinces,
            'links' => $links,
        ]);
    }

    public function getBranchesBySectionId($sectionId)
    {
        return Branch::where('section_id', $sectionId)->get();
    }

    public function initMap()
{
    $this->dispatchBrowserEvent('init-map');
}

    public function GetProvince($ProvinceId, $openModal = false)
    {
        $this->resetValidation();

        $this->Province = Provinces::find($ProvinceId);
        $this->ProvinceId = $this->Province->id;
        $this->province_number = $this->Province->province_number;
        $this->province_name = $this->Province->province_name;
        $this->section_id = $this->Province->section_id;
        $this->previewPropertyDeedImage = $this->Province->property_deed_image;
        $this->previewPropertyMapImage = $this->Province->property_map_image;

        $this->branch = $this->getBranchesBySectionId($this->section_id);

        if ($openModal) {
            $this->dispatchBrowserEvent('init-map');
        }
    }

    public function addPlotToProvince($ProvinceId)
    {
        $this->reset('plot_number', 'specialized_department', 'property_deed_image', 'property_map_image', 'visibility');
        $this->dispatchBrowserEvent('addPlotToProvinceModal');
    }

    public function updatedPropertyDeedImage()
    {
        $this->validate([
            'property_deed_image' => 'required|file|mimes:jpeg,png,jpg,pdf',
        ], [
            'property_deed_image.required' => 'الملف مطلوب',
            'property_deed_image.mimes' => 'الملف ليس صورة أو PDF',
        ]);
        $this->filePreviewDeep = $this->property_deed_image->temporaryUrl();
    }

    public function updatedPropertyMapImage()
    {
        $this->validate([
            'property_deed_image' => 'nullable|file|mimes:jpeg,png,jpg,pdf',
        ], [
            //'property_map_image.required' => 'الملف مطلوب',
            'property_map_image.mimes' => 'الملف ليس صورة أو PDF',
        ]);
        $this->filePreviewMap = $this->property_map_image->temporaryUrl();
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'plot_number' => [
                'required',
                Rule::unique('plots')->where(function ($query) {
                    return $query->where('province_id', $this->ProvinceId);
                }),
            ],
            'specialized_department' => 'required',
            'property_deed_image' => 'required|file|mimes:jpeg,png,jpg,pdf',
            'property_deed_image' => 'nullable|file|mimes:jpeg,png,jpg,pdf',
        ], [
            'plot_number.required' => 'رقم القطعة مطلوب',
            'plot_number.unique' => 'رقم القطعة موجود بالفعل في هذه المقاطعة',
            'specialized_department.required' => 'حقل الشعبة المختصة مطلوب',
            'property_deed_image.required' => 'الملف مطلوب',
            'property_deed_image.mimes' => 'الملف ليس صورة أو PDF',
            //'property_map_image.required' => 'الملف مطلوب',
            'property_map_image.mimes' => 'الملف ليس صورة أو PDF',
        ]);

        $this->property_deed_image->store('public/Plots/' . $this->Province->province_number . '/' . $this->plot_number);
        $propertyMapImageHashName = null;
        if ($this->property_map_image) {
            $this->property_map_image->store('public/Plots/' . $this->Province->province_number . '/' . $this->plot_number);
            $propertyMapImageHashName = $this->property_map_image->hashName();
        }

        Plots::create([
            'user_id' => Auth::user()->id,
            'province_id' => $this->Province->id,
            'plot_number' => $this->plot_number,
            'specialized_department' => $this->specialized_department,
            'visibility' => $this->visibility,
            'property_deed_image' => $this->property_deed_image->hashName(),
            'property_map_image' => $propertyMapImageHashName,
        ]);

        // =================================
        Tracking::create([
            'user_id' => Auth::id(),
            'page_name' => 'القطع',
            'operation_type' => 'اضافة',
            'operation_time' => now()->format('Y-m-d H:i:s'),
            'details' =>   "رقم القطعة: " . $this->plot_number . ' - '  . " \nصورة السند العقاري: " . $this->property_deed_image . ' - '  . " \nصوره الخارطة العقارية: " . $this->property_map_image . ' - '  . " \nالشعبة المختصة: " . $this->specialized_department . ' - '  . " \nإمكانية ظهوره: " . $this->visibility,
        ]);
        // ==================================

        $this->reset('plot_number', 'specialized_department', 'property_deed_image', 'property_map_image', 'filePreviewDeep', 'filePreviewMap', 'visibility');
        $this->dispatchBrowserEvent('success', [
            'message' => 'تمت الإضافة بنجاح',
            'title' => 'إضافة'
        ]);

        $this->mount();
    }
}

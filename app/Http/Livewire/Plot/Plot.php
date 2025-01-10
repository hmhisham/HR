<?php

namespace App\Http\Livewire\Plot;

use Livewire\Component;
use App\Models\Plots\Plots;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use App\Models\Provinces\Provinces;
use Illuminate\Support\Facades\Auth;

class Plot extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Provinces = [];
    public $Province, $ProvinceId;
    public $province_number, $province_name;
    public $plot_number, $Plot, $property_deed_image, $property_map_image;
    public $filePreviewDeep, $filePreviewMap, $previewPropertyDeedImage, $previewPropertyMapImage;

    /*  public function mount()
    {
        $this->Provinces = Provinces::all();
    } */

    public $search = ['province_number' => '', 'province_name' => ''];

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
        return view('livewire.plot.plot', [
            'Provinces' => $Provinces,
            'links' => $links,
        ]);
    }

    public function GetProvince($ProvinceId)
    {
        $this->resetValidation();

        $this->Province = Provinces::find($ProvinceId);
        $this->ProvinceId = $this->Province->id;
        $this->province_number = $this->Province->province_number;
        $this->province_name = $this->Province->province_name;
    }

    public function addPlotToProvince($ProvinceId)
    {
        $this->reset('plot_number', 'property_deed_image', 'property_map_image');
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
            'property_map_image' => 'required|file|mimes:jpeg,png,jpg,pdf',
        ], [
            'property_map_image.required' => 'الملف مطلوب',
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
            'property_deed_image' => 'required|file|mimes:jpeg,png,jpg,pdf',
            'property_map_image' => 'required|file|mimes:jpeg,png,jpg,pdf',
        ], [
            'plot_number.required' => 'رقم القطعة مطلوب',
            'plot_number.unique' => 'رقم القطعة موجود بالفعل في هذه المقاطعة',
            'property_deed_image.required' => 'الملف مطلوب',
            'property_deed_image.mimes' => 'الملف ليس صورة أو PDF',
            'property_map_image.required' => 'الملف مطلوب',
            'property_map_image.mimes' => 'الملف ليس صورة أو PDF',
        ]);

        $this->property_deed_image->store('public/Plots/' . $this->plot_number);
        $this->property_map_image->store('public/Plots/' . $this->plot_number);

        Plots::create([
            'user_id' => Auth::user()->id,
            'province_id' => $this->Province->id,
            'plot_number' => $this->plot_number,
            'property_deed_image' => $this->property_deed_image->hashName(),
            'property_map_image' => $this->property_map_image->hashName(),
        ]);

        $this->reset('plot_number', 'property_deed_image', 'property_map_image', 'filePreviewDeep', 'filePreviewMap');
        $this->dispatchBrowserEvent('success', [
            'message' => 'تمت الإضافة بنجاح',
            'title' => 'إضافة'
        ]);
        $this->mount();
    }
}

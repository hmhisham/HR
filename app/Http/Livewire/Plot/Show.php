<?php

namespace App\Http\Livewire\Plot;

/* use Storage; */

use Livewire\Component;
use App\Models\Plots\Plots;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use App\Models\Provinces\Provinces;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Show extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Provinceid;
    public $Province;
    public $Plots = [];
    public $plot_number, $specialized_department, $Plot, $property_deed_image, $property_map_image;
    public $filePreviewDeep, $filePreviewMap, $previewPropertyDeedImage, $previewPropertyMapImage;

    public function mount()
    {
        $this->Province = Provinces::find($this->Provinceid);
    }

    public $search = ['plot_number' => '', 'specialized_department' => ''];

    public function render()
    {
        $searchPlotNumber = '%' . $this->search['plot_number'] . '%';
        $searchSpecializedDepartment = '%' . $this->search['specialized_department'] . '%';
        $Plots = Plots::query()
            ->where('province_id', $this->Provinceid)
            ->when($this->search['plot_number'], function ($query) use ($searchPlotNumber) {
                $query->where('plot_number', 'LIKE', $searchPlotNumber);
            })
            ->when($this->search['specialized_department'], function ($query) use ($searchSpecializedDepartment) {
                $query->where('specialized_department', 'LIKE', $searchSpecializedDepartment);
            })
            ->orderBy('id', 'ASC')
            ->paginate(10);

        $links = $Plots;
        $this->Plots = collect($Plots->items());
        return view('livewire.plot.show', [
            'links' => $links,
            'Plots' => $Plots,
        ]);
    }

    public function addPlotModal()
    {
        $this->reset('plot_number', 'specialized_department', 'property_deed_image', 'property_map_image');
        $this->resetValidation();
        $this->dispatchBrowserEvent('PlotModalShow');
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
                    return $query->where('province_id', $this->Province->id);
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
            'user_id' => Auth::User()->id,
            'province_id' => $this->Province->id,
            'plot_number' => $this->plot_number,
            'specialized_department' => $this->specialized_department,
            'property_deed_image' => $this->property_deed_image->hashName(),
            'property_map_image' => $this->property_map_image->hashName(),
        ]);

        $this->reset('plot_number', 'specialized_department', 'property_deed_image', 'property_map_image', 'filePreviewDeep', 'filePreviewMap');

        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافة بنجاح',
            'title' => 'اضافة'
        ]);
        $this->mount();
    }

    public function GetPlot($Plotid)
    {
        $this->reset('plot_number', 'specialized_department', 'property_deed_image', 'property_map_image');
        $this->resetValidation();
        $this->dispatchBrowserEvent('editPlotModalShow');

        $this->Plot = Plots::find($Plotid);
        $this->plot_number = $this->Plot->plot_number;
        $this->specialized_department = $this->Plot->specialized_department;
        $this->previewPropertyDeedImage = $this->Plot->property_deed_image;
        $this->previewPropertyMapImage = $this->Plot->property_map_image;

        $this->dispatchBrowserEvent('editPlotModalShow');
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'plot_number' => [
                'required',
                Rule::unique('plots')->where(function ($query) {
                    return $query->where('province_id', $this->Province->id);
                }),
            ],
            'property_deed_image' => $this->filePreviewDeep ? 'required|file|mimes:jpeg,png,jpg,pdf' : 'nullable|file|mimes:jpeg,png,jpg,pdf',
            'property_map_image' => $this->filePreviewMap ? 'required|file|mimes:jpeg,png,jpg,pdf' : 'nullable|file|mimes:jpeg,png,jpg,pdf',
        ], [
            'plot_number.required' => 'رقم القطعة مطلوب',
            'plot_number.unique' => 'رقم القطعة موجود بالفعل في هذه المقاطعة',
            'property_deed_image.required' => 'الملف مطلوب',
            'property_deed_image.mimes' => 'الملف ليس صورة أو PDF',
            'property_map_image.required' => 'الملف مطلوب',
            'property_map_image.mimes' => 'الملف ليس صورة أو PDF',
        ]);

        if ($this->filePreviewDeep) {
            Storage::delete('public/Plots/' . $this->Plot->plot_number . '/' . $this->Plot->property_deed_image);
            $this->property_deed_image->store('public/Plots/' . $this->plot_number);
            $fileDeepImage = $this->property_deed_image->hashName();
        }

        if ($this->filePreviewMap) {
            Storage::delete('public/Plots/' . $this->Plot->plot_number . '/' . $this->Plot->property_map_image);
            $this->property_map_image->store('public/Plots/' . $this->plot_number);
            $fileMapImage = $this->property_map_image->hashName();
        }

        if ($this->Plot->plot_number !== $this->plot_number) {
            Storage::move('public/Plots/' . $this->Plot->plot_number, 'public/Plots/' . $this->plot_number);
        }

        $this->Plot->update([
            'user_id' => Auth::User()->id,
            'plot_number' => $this->plot_number,
            'property_deed_image' => $fileDeepImage ?? $this->Plot->property_deed_image,
            'property_map_image' => $fileMapImage ?? $this->Plot->property_map_image,
        ]);

        $this->reset('plot_number', 'property_deed_image', 'property_map_image', 'filePreviewDeep', 'filePreviewMap');

        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
        $this->mount();
    }

    public function destroy()
    {
        $this->Plot->delete();

        Storage::deleteDirectory('public/Plots/' . $this->Plot->plot_number);

        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الحذف بنجاح',
            'title' => 'حذف'
        ]);
        $this->mount();
    }
}

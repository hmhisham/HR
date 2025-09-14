<?php

namespace App\Http\Livewire\Plots;

/* use Storage; */

use Livewire\Component;
use App\Models\Plots\Plots;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use App\Models\Tracking\Tracking;
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
    public $branches = [];
    public $plot_number, $specialized_department, $Plot; //, $property_deed_image, $property_map_image;
    // تم إيقاف متغيرات الصور
    // public $filePreviewDeep, $filePreviewMap, $previewPropertyDeedImage, $previewPropertyMapImage;
    public $visibility = false;
    public $selectedPlots = [];
    public $selectedBranch;
    public $selectedVisibility;
    public $selectAll = false;
    public $search = ['plot_number' => '', 'specialized_department' => '', 'visibility' => '', 'property_deed_image' => ''];

    public function mount()
    {
        $this->Province = Provinces::find($this->Provinceid);
        if ($this->Province) {
            $section = $this->Province->Getsection;
            if ($section) {
                $this->branches = $section->GetBranch;
            }
        }
    }

    public function updatedSearch($value, $key)
    {
        // إعادة تعيين الصفحة إلى الأولى فقط إذا كان البحث قد تغير
        if (in_array($key, ['plot_number', 'specialized_department', 'visibility', 'property_deed_image'])) {
            $this->resetPage();
        }
    }

    public function render()
    {
        $searchPlotNumber = '%' . $this->search['plot_number'] . '%';
        $searchSpecializedDepartment = '%' . $this->search['specialized_department'] . '%';
        $searchVisibility = $this->search['visibility'];
        $searchPropertyDeedImage = $this->search['property_deed_image'];

        $Plots = Plots::query()
            ->where('province_id', $this->Provinceid)
            ->when($this->search['plot_number'], function ($query) use ($searchPlotNumber) {
                $query->where('plot_number', 'LIKE', $searchPlotNumber);
            })
            ->when($this->search['specialized_department'], function ($query) use ($searchSpecializedDepartment) {
                $query->where('specialized_department', 'LIKE', $searchSpecializedDepartment);
            })
            ->when($this->search['visibility'] !== '', function ($query) use ($searchVisibility) {
                $query->where('visibility', $searchVisibility);
            })
            ->when($searchPropertyDeedImage !== '', function ($query) use ($searchPropertyDeedImage) {
                if ($searchPropertyDeedImage == 'مرفقة') {
                    $query->whereNotNull('property_deed_image');
                } elseif ($searchPropertyDeedImage == 'غير مرفقة') {
                    $query->whereNull('property_deed_image');
                }
            })
            ->orderByRaw('CAST(plot_number AS UNSIGNED) ASC')
            ->paginate(10);

        $links = $Plots;
        $this->Plots = collect($Plots->items());

        if ($this->Province) {
            $section = $this->Province->Getsection;
            if ($section) {
                $this->branches = $section->GetBranch;
            }
        }

        return view('livewire.plots.show', [
            'links' => $links,
            'Plots' => $Plots,
        ]);
    }

    public function addPlotModal()
    {
        $this->reset('plot_number', 'specialized_department', 'visibility'); //, 'property_deed_image', 'property_map_image'
        $this->resetValidation();
        $this->dispatchBrowserEvent('PlotModalShow');
    }

    // تم إيقاف دوال التحقق من صحة الصور
    /*
    public function updatedPropertyDeedImage()
    {
        $this->validate([
            'property_deed_image' => 'required|file|mimes:jpeg,png,jpg,pdf|max:5120',
        ], [
            'property_deed_image.required' => 'الملف مطلوب',
            'property_deed_image.max' => 'يجب ألا يزيد حجم ملف السند العقاري عن 5120 كيلوبايت.',
            'property_deed_image.mimes' => 'الملف ليس صورة أو PDF',
        ]);

        if ($this->property_deed_image) {
            if ($this->property_deed_image->getClientOriginalExtension() == 'pdf') {
                $tempPath = 'temp/' . uniqid() . '.pdf';
                $this->property_deed_image->storeAs('public/' . $tempPath);
                $this->filePreviewDeep = asset('storage/' . $tempPath);
            } else {
                $this->filePreviewDeep = $this->property_deed_image->temporaryUrl();
            }
        }
    }

    public function updatedPropertyMapImage()
    {
        $this->validate([
            'property_map_image' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:5120',
        ], [
            'property_map_image.max' => 'يجب ألا يزيد حجم ملف السند العقاري عن 30720 كيلوبايت.',
            'property_map_image.mimes' => 'الملف ليس صورة أو PDF',
        ]);

        if ($this->property_map_image) {
            if ($this->property_map_image->getClientOriginalExtension() == 'pdf') {
                $tempPath = 'temp/' . uniqid() . '.pdf';
                $this->property_map_image->storeAs('public/' . $tempPath);
                $this->filePreviewMap = asset('storage/' . $tempPath);
            } else {
                $this->filePreviewMap = $this->property_map_image->temporaryUrl();
            }
        }
    }
    */

    //تحديث السجلات المحددة
    public function updateBatch()
    {
        if (empty($this->selectedPlots)) {
            $this->dispatchBrowserEvent('error', [
                'message' => 'يرجى تحديد سجل واحد على الأقل',
                'title' => 'تحديد'
            ]);
            return;
        }
        foreach ($this->selectedPlots as $plotId) {
            $plot = Plots::find($plotId);
            if ($plot) {
                $data = [];
                if ($this->selectedBranch !== null && $this->selectedBranch !== '') {
                    $data['specialized_department'] = $this->selectedBranch;
                }
                if ($this->selectedVisibility !== null && $this->selectedVisibility !== '') {
                    $data['visibility'] = $this->selectedVisibility;
                }
                if (!empty($data)) {
                    $plot->update($data);
                }
            }
        }
        $this->selectedPlots = [];
        $this->selectedBranch = '';
        $this->selectedVisibility = '';
        $this->dispatchBrowserEvent('success', ['message' => 'تم تحديث السجلات المحددة بنجاح', 'title' => 'تعديل']);
    }

    // تحديد الكل
    public function updatedSelectAll($value)
    {
        if ($value) {
            // الحصول على جميع العناصر من قاعدة البيانات بدلاً من الصفحة الحالية فقط
            $allPlots = Plots::where('province_id', $this->Provinceid)->pluck('id')->toArray();
            $this->selectedPlots = $allPlots;
        } else {
            $this->selectedPlots = [];
        }
    }

    // إذا كانت جميع الصفوف محددة، نقوم بتحديد مربع "تحديد الكل"
    public function updatedSelectedPlots()
    {
        $allPlots = Plots::where('province_id', $this->Provinceid)->pluck('id')->toArray();
        $this->selectAll = count($this->selectedPlots) === count($allPlots);
    }

    public function selectAllRecords($allPlots)
    {
        $this->selectedPlots = $allPlots;
        $this->selectAll = true;
    }

    //تتبع الطباعة
    public function printt($Plotid)
    {
        $this->Plot = Plots::find($Plotid);
        $this->plot_number = $this->Plot->plot_number;
        $this->specialized_department = $this->Plot->specialized_department;
        $this->visibility = $this->Plot->visibility;
        // تم إيقاف تحميل الصور
        // $this->previewPropertyDeedImage = $this->Plot->property_deed_image;
        // $this->previewPropertyMapImage = $this->Plot->property_map_image;
        // =================================
        Tracking::create([
            'user_id' => Auth::id(),
            'page_name' => 'القطع',
            'operation_type' => 'طباعة',
            'operation_time' => now()->format('Y-m-d H:i:s'),
            'details' =>   "رقم القطعة: " . $this->plot_number . ' - '  . " \nالشعبة المختصة: " . $this->specialized_department,
            // تم إزالة الصور من التفاصيل
            // . ' - '  . " \nصورة السند العقاري: " . $this->previewPropertyDeedImage . ' - '  . " \nصوره الخارطة العقارية: " . $this->previewPropertyMapImage
        ]);
        // ==================================
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
            'specialized_department' => 'required',
            // تم إيقاف التحقق من صحة الصور
            // 'property_deed_image' => 'required|file|mimes:jpeg,png,jpg,pdf|max:5120',
            // 'property_map_image' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:5120',
        ], [
            'plot_number.required' => 'رقم القطعة مطلوب',
            'plot_number.unique' => 'رقم القطعة موجود بالفعل في هذه المقاطعة',
            'specialized_department.required' => 'حقل الشعبة المختصة مطلوب',
            // تم إيقاف رسائل الخطأ للصور
            // 'property_deed_image.required' => 'الملف مطلوب',
            // 'property_deed_image.max' => 'يجب ألا يزيد حجم ملف السند العقاري عن 5120 كيلوبايت.',
            // 'property_deed_image.mimes' => 'الملف ليس صورة أو PDF',
            // 'property_map_image.max' => 'يجب ألا يزيد حجم ملف السند العقاري عن 30720 كيلوبايت.',
            // 'property_map_image.mimes' => 'الملف ليس صورة أو PDF',
        ]);

        // تم إيقاف تخزين الصور
        /*
        $this->property_deed_image->store('public/Plots/' . $this->Province->province_number . '/' . $this->plot_number);

        $propertyMapImageHashName = null;
        if ($this->property_map_image) {
            $this->property_map_image->store('public/Plots/' . $this->Province->province_number . '/' . $this->plot_number);
            $propertyMapImageHashName = $this->property_map_image->hashName();
        }
        */

        Plots::create([
            'user_id' => Auth::User()->id,
            'province_id' => $this->Province->id,
            'plot_number' => $this->plot_number,
            'specialized_department' => $this->specialized_department,
            'visibility' => $this->visibility,
            // تم إيقاف حفظ الصور
            // 'property_deed_image' => $this->property_deed_image->hashName(),
            // 'property_map_image' => $propertyMapImageHashName,
        ]);

        // =================================
        Tracking::create([
            'user_id' => Auth::id(),
            'page_name' => 'القطع',
            'operation_type' => 'اضافة',
            'operation_time' => now()->format('Y-m-d H:i:s'),
            'details' =>   "رقم القطعة: " . $this->plot_number . ' - '  . " \nالشعبة المختصة: " . $this->specialized_department . ' - '  . " \nإمكانية ظهوره: " . $this->visibility,
            // تم إزالة الصور من التفاصيل
            // . ' - '  . " \nصورة السند العقاري: " . $this->property_deed_image . ' - '  . " \nصوره الخارطة العقارية: " . $this->property_map_image
        ]);
        // ==================================

        $this->reset('plot_number', 'specialized_department', 'visibility'); //, 'property_deed_image', 'property_map_image', 'filePreviewDeep', 'filePreviewMap'
        $this->mount();

        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافة بنجاح',
            'title' => 'اضافة'
        ]);
    }

    public function GetPlot($Plotid)
    {
        $this->reset('plot_number', 'specialized_department', 'visibility'); //, 'property_deed_image', 'property_map_image'
        $this->resetValidation();
        $this->dispatchBrowserEvent('editPlotModalShow');

        $this->Plot = Plots::find($Plotid);
        $this->plot_number = $this->Plot->plot_number;
        $this->specialized_department = $this->Plot->specialized_department;
        $this->visibility = $this->Plot->visibility;
        // تم إيقاف تحميل الصور
        // $this->previewPropertyDeedImage = $this->Plot->property_deed_image;
        // $this->previewPropertyMapImage = $this->Plot->property_map_image;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'plot_number' => [
                'required',
                Rule::unique('plots')->where(function ($query) {
                    return $query->where('province_id', $this->Province->id);
                })->ignore($this->Plot->id),
            ],
            'specialized_department' => 'required',
            // تم إيقاف التحقق من صحة الصور
            // 'property_deed_image' => $this->filePreviewDeep ? 'required|file|mimes:jpeg,png,jpg,pdf|max:5120' : 'nullable|file|mimes:jpeg,png,jpg,pdf|max:5120',
            // 'property_map_image' => $this->filePreviewMap ? 'nullable|file|mimes:jpeg,png,jpg,pdf|max:30720' : 'nullable|file|mimes:jpeg,png,jpg,pdf|max:30720',
        ], [
            'plot_number.required' => 'رقم القطعة مطلوب',
            'plot_number.unique' => 'رقم القطعة موجود بالفعل في هذه المقاطعة',
            'specialized_department.required' => 'حقل الشعبة المختصة مطلوب',
            // تم إيقاف رسائل الخطأ للصور
            // 'property_deed_image.required' => 'الملف مطلوب',
            // 'property_deed_image.max' => 'يجب ألا يزيد حجم ملف السند العقاري عن 5120 كيلوبايت.',
            // 'property_deed_image.mimes' => 'الملف ليس صورة أو PDF',
            // 'property_map_image.max' => 'يجب ألا يزيد حجم ملف السند العقاري عن 30720 كيلوبايت.',
            // 'property_map_image.mimes' => 'الملف ليس صورة أو PDF',
        ]);

        // تم إيقاف معالجة الصور
        /*
        if ($this->filePreviewDeep) {
            Storage::delete('public/Plots/' . $this->Province->province_number . '/' . $this->plot_number . '/' . $this->Plot->property_deed_image);
            $this->property_deed_image->store('public/Plots/' . $this->Province->province_number . '/' . $this->plot_number);
            $fileDeepImage = $this->property_deed_image->hashName();
        }

        if ($this->filePreviewMap) {
            Storage::delete('public/Plots/' . $this->Province->province_number . '/' . $this->plot_number . '/' . $this->Plot->property_map_image);
            $this->property_map_image->store('public/Plots/' . $this->Province->province_number . '/' . $this->plot_number);
            $fileMapImage = $this->property_map_image->hashName();
        }

        if ($this->Plot->plot_number !== $this->plot_number) {
            Storage::move(
                'public/Plots/' . $this->Province->province_number . '/' . $this->Plot->plot_number,
                'public/Plots/' . $this->Province->province_number . '/' . $this->plot_number
            );
        }
        */

        $this->Plot->update([
            'user_id' => Auth::User()->id,
            'plot_number' => $this->plot_number,
            'specialized_department' => $this->specialized_department,
            'visibility' => $this->visibility,
            // تم إيقاف تحديث الصور
            // 'property_deed_image' => $fileDeepImage ?? $this->Plot->property_deed_image,
            // 'property_map_image' => $fileMapImage ?? $this->Plot->property_map_image,
        ]);
        // =================================
        Tracking::create([
            'user_id' => Auth::id(),
            'page_name' => 'القطع',
            'operation_type' => 'تعديل',
            'operation_time' => now()->format('Y-m-d H:i:s'),
            'details' =>   "رقم القطعة: " . $this->plot_number . ' - '  . " \nالشعبة المختصة: " . $this->specialized_department . ' - '  . " \nإمكانية ظهوره: " . $this->visibility,
            // تم إزالة الصور من التفاصيل
            // . ' - '  . " \nصورة السند العقاري: " . $this->property_deed_image . ' - '  . " \nصوره الخارطة العقارية: " . $this->property_map_image
        ]);
        // ==================================
        $this->reset('plot_number', 'specialized_department', 'visibility'); //, 'property_deed_image', 'property_map_image', 'filePreviewDeep', 'filePreviewMap'
        $this->mount();

        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {

        // =================================
        Tracking::create([
            'user_id' => Auth::id(),
            'page_name' => 'القطع',
            'operation_type' => 'حذف',
            'operation_time' => now()->format('Y-m-d H:i:s'),
            'details' =>   "رقم القطعة: " . $this->plot_number . ' - '  . " \nالشعبة المختصة: " . $this->specialized_department . ' - '  . " \nإمكانية ظهوره: " . $this->visibility,
            // تم إزالة الصور من التفاصيل
            // . ' - '  . " \nصورة السند العقاري: " . $this->property_deed_image . ' - '  . " \nصوره الخارطة العقارية: " . $this->property_map_image
        ]);
        // ==================================

        $this->Plot->delete();

        // تم إيقاف حذف مجلد الصور
        // Storage::deleteDirectory('public/Plots/' . $this->Province->province_number . '/' . $this->plot_number);

        $this->mount();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الحذف بنجاح',
            'title' => 'حذف'
        ]);
    }
}

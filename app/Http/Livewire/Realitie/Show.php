<?php

namespace App\Http\Livewire\Realitie;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\Realities\Realities;
use App\Models\Plots\Plots;
use Illuminate\Support\Facades\Auth;

class Show extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Plotid;
    public $Plot;
    public $Realities = [];
    public $RealitieSearch, $Realitie, $RealitieId;
    public $province_id, $plot_id, $property_number, $area_in_meters, $area_in_olok, $area_in_donum, $count, $date, $volume_number, $bond_type, $ownership, $property_type, $governorate, $district, $mortgage_notes, $registered_office, $specialized_department, $property_deed_image, $notes, $visibility;
    public $filePreview;

    public function mount()
    {
        $this->Plot = Plots::find($this->Plotid);
    }


    public $search = ['property_number' => '', 'bond_type' => '', 'mortgage_notes' => '', 'visibility' => '',];

    public function render()
    {
        $searchPropertyNumber = '%' . $this->search['property_number'] . '%';
        $searchBondType = '%' . $this->search['bond_type'] . '%';
        $searchMortgageNotes = $this->search['mortgage_notes'];
        $searchVisibility = $this->search['visibility'];

        $Realities = Realities::query()
            ->where('plot_id', $this->Plotid)
            ->when($this->search['property_number'], function ($query) use ($searchPropertyNumber) {
                $query->where('property_number', 'LIKE', $searchPropertyNumber);
            })
            ->when($this->search['bond_type'], function ($query) use ($searchBondType) {
                $query->orWhere('bond_type', 'LIKE', $searchBondType);
            })
            ->when($this->search['mortgage_notes'], function ($query) use ($searchMortgageNotes) {
                $query->orWhere('mortgage_notes', $searchMortgageNotes);
            })
            ->when($this->search['visibility'] !== '', function ($query) use ($searchVisibility) {
                $query->orWhere('visibility', $searchVisibility);
            })
            ->orderBy('id', 'ASC')
            ->paginate(10);

        $links = $Realities;
        $this->Realities = collect($Realities->items());

        return view('livewire.realitie.show', [
            'links' => $links,
            'Realities' => $Realities,
        ]);
    }

    public function AddRealitieModal()
    {
        $this->reset('province_id', 'plot_id', 'property_number', 'area_in_meters', 'area_in_olok', 'area_in_donum', 'count', 'date', 'volume_number', 'bond_type', 'ownership', 'property_type', 'governorate', 'district', 'mortgage_notes', 'registered_office', 'specialized_department', 'property_deed_image', 'notes', 'visibility');
        $this->resetValidation();
        $this->dispatchBrowserEvent('AddRealitieModal');
    }

    public function updatedRealitieImage()
    {
        $this->validate([
            'property_deed_image' => 'required|file|mimes:jpeg,png,jpg,pdf',
        ], [
            'property_deed_image.required' => 'الملف مطلوب',
            'property_deed_image.mimes' => 'الملف ليس صورة أو PDF',
        ]);
        $this->filePreview = $this->property_deed_image->temporaryUrl();
    }

    public function store()
    {
        $this->resetValidation();
        $this->validate([
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
            'property_deed_image' => 'required|file|mimes:jpeg,png,jpg,pdf|max:1024',

        ], [
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
            'property_deed_image.required' => 'ملف السند العقاري مطلوب.',
            'property_deed_image.max' => 'يجب ألا يزيد حجم ملف السند العقاري عن 1024 كيلوبايت.',
            'property_deed_image.mimes' => 'الملف ليس صورة أو PDF',
        ]);

        $this->property_deed_image->store('public/Realities/' . $this->property_number);

        Realities::create([
            'user_id' => Auth::User()->id,
            'plot_id' => $this->Plotid,
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
        $this->reset('property_number', 'area_in_meters', 'area_in_olok', 'area_in_donum', 'count', 'date', 'volume_number', 'bond_type', 'ownership', 'property_type', 'governorate', 'district', 'mortgage_notes', 'registered_office', 'specialized_department', 'property_deed_image', 'notes', 'visibility');
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetRealitie($RealitieId)
    {
        $this->reset('property_number', 'area_in_meters', 'area_in_olok', 'area_in_donum', 'count', 'date', 'volume_number', 'bond_type', 'ownership', 'property_type', 'governorate', 'district', 'mortgage_notes', 'registered_office', 'specialized_department', 'property_deed_image', 'notes', 'visibility');
        $this->resetValidation();
        $this->dispatchBrowserEvent('editRealitieModalShow');

        $this->Realitie  = Realities::find($RealitieId);
        $this->property_number = $this->Realitie->property_number;
        $this->area_in_meters = $this->Realitie->area_in_meters;
        $this->area_in_olok = $this->Realitie->area_in_olok;
        $this->area_in_donum = $this->Realitie->area_in_donum;
        $this->count = $this->Realitie->count;
        $this->date = $this->Realitie->date;
        $this->volume_number = $this->Realitie->volume_number;
        $this->bond_type = $this->Realitie->bond_type;
        $this->ownership = $this->Realitie->ownership;
        $this->property_type = $this->Realitie->property_type;
        $this->governorate = $this->Realitie->governorate;
        $this->district = $this->Realitie->district;
        $this->mortgage_notes = $this->Realitie->mortgage_notes;
        $this->registered_office = $this->Realitie->registered_office;
        $this->specialized_department = $this->Realitie->specialized_department;
        $this->property_deed_image = $this->Realitie->property_deed_image;
        $this->notes = $this->Realitie->notes;
        $this->visibility = $this->Realitie->visibility;

        $this->dispatchBrowserEvent('editRealitieModalShow');
    }

    /* public function update()
    {
        $this->resetValidation();
        $this->validate([
            'property_number' => 'required:realities',
            'area_in_meters' => 'required:realities',
            'area_in_olok' => 'required:realities',
            'area_in_donum' => 'required:realities',
            'count' => 'required:realities',
            'date' => 'required:realities',
            'volume_number' => 'required:realities',
            'bond_type' => 'required:realities',
            'ownership' => 'required:realities',
            'property_type' => 'required:realities',
            'governorate' => 'required:realities',
            'district' => 'required:realities',
            'mortgage_notes' => 'required:realities',
            'registered_office' => 'required:realities',
            'specialized_department' => 'required:realities',
            'property_deed_image' => 'required:realities',
            'notes' => 'required:realities',
            'visibility' => 'required:realities',

        ], [
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
            'property_deed_image.required' => 'حقل صورة السند العقاري مطلوب',
            'notes.required' => 'حقل ملاحظات مطلوب',
            'visibility.required' => 'حقل إمكانية ظهوره مطلوب',
        ]);

        $Realities = Realities::find($this->RealitieId);
        $Realities->update([
            'user_id' => Auth::User()->id,
            'id' => $this->id,
            'province_id' => $this->province_id,
            'plot_id' => $this->plot_id,
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
        $this->reset('property_number', 'area_in_meters', 'area_in_olok', 'area_in_donum', 'count', 'date', 'volume_number', 'bond_type', 'ownership', 'property_type', 'governorate', 'district', 'mortgage_notes', 'registered_office', 'specialized_department', 'property_deed_image', 'notes', 'visibility');
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
        $this->mount();
    }

    public function destroy()
    {
        $Realities = Realities::find($this->RealitieId);
        if ($Realities) {

            $Realities->delete();
            $this->reset();
            $this->dispatchBrowserEvent('success', [
                'message' => 'تم حذف البيانات بنجاح',
                'title' => 'الحذف'
            ]);
            $this->mount();
        }
    } */
}

<?php

namespace App\Http\Livewire\Realities\ShowRealitie;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\Realities\Realities;
use App\Models\Plots\Plots;
use Illuminate\Support\Facades\Auth;

class ShowRealitie extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Realities = [];
    protected $PlotRealities = [];
    public $plot = [];
    public $Plot;
    public $RealitieSearch, $Realitie, $RealitieId;
    public $id, $province_id, $plot_id, $property_number, $area_in_meters, $area_in_olok, $area_in_donum, $count, $date, $volume_number, $bond_type, $ownership, $property_type, $governorate, $district, $mortgage_notes, $registered_office, $specialized_department, $property_deed_image, $notes, $visibility;

    public function mount()
    {
        $this->Plot = Plots::find($this->plot_id);
    }

    public function render()
    {
        $RealitieSearch = '%' . $this->RealitieSearch . '%';
        $Realities = Realities::where('plot_id', $this->plot_id)
            ->where(function ($query) use ($RealitieSearch) {
                $query->where('property_number', 'LIKE', $RealitieSearch)
                    ->orWhere('bond_type', 'LIKE', $RealitieSearch)
                    ->orWhere('mortgage_notes', 'LIKE', $RealitieSearch)
                    ->orWhere('specialized_department', 'LIKE', $RealitieSearch)
                    ->orWhere('visibility', 'LIKE', $RealitieSearch);
            })

            ->orderBy('id', 'ASC')
            ->paginate(10);
        return view('livewire.realitie.show', [
            'PlotRealities' => $Realities,
            'links' => $Realities
        ]);
    }

    public function AddRealitieModal()
    {
        $this->reset('province_id', 'plot_id', 'property_number', 'area_in_meters', 'area_in_olok', 'area_in_donum', 'count', 'date', 'volume_number', 'bond_type', 'ownership', 'property_type', 'governorate', 'district', 'mortgage_notes', 'registered_office', 'specialized_department', 'property_deed_image', 'notes', 'visibility');
        $this->resetValidation();
        $this->dispatchBrowserEvent('AddRealitieModal');

        $this->Plot = Plots::find($this->plot_id);
        $this->plot_id = $this->plot_id;
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
            'property_deed_image' => 'required',
            'notes' => 'required',
            'visibility' => 'required',

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


        Realities::create([
            'user_id' => Auth::User()->id,
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
        $this->reset('province_id', 'plot_id', 'property_number', 'area_in_meters', 'area_in_olok', 'area_in_donum', 'count', 'date', 'volume_number', 'bond_type', 'ownership', 'property_type', 'governorate', 'district', 'mortgage_notes', 'registered_office', 'specialized_department', 'property_deed_image', 'notes', 'visibility');
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetRealitie($RealitieId)
    {
        $this->resetValidation();

        $this->Realitie  = Realities::find($RealitieId);
        $this->RealitieId = $this->Realitie->id;
        $this->id = $this->Realitie->id;
        $this->province_id = $this->Realitie->province_id;
        $this->plot_id = $this->Realitie->plot_id;
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
    }

    public function update()
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
        $this->reset('province_id', 'plot_id', 'property_number', 'area_in_meters', 'area_in_olok', 'area_in_donum', 'count', 'date', 'volume_number', 'bond_type', 'ownership', 'property_type', 'governorate', 'district', 'mortgage_notes', 'registered_office', 'specialized_department', 'property_deed_image', 'notes', 'visibility');
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
    }
}

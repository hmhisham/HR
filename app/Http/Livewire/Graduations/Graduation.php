<?php

namespace App\Http\Livewire\Graduations;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Graduations\Graduations;
use App\Models\Certificates\Certificates;

class Graduation extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Graduations = [];
    public $GraduationSearch, $Graduation, $GraduationId;
    public $certificates_id, $graduations_name;


    public function render()
    {
        $GraduationSearch = '%' . $this->GraduationSearch . '%';
        $serchID = Certificates::where('certificates_name', 'LIKE', $GraduationSearch)->pluck('id');

        $Graduations = Graduations::whereIn('certificates_id', $serchID)
            ->orWhere('graduations_name', 'LIKE', $GraduationSearch)
            ->orderBy('id', 'ASC')
            ->paginate(10);

        $links = $Graduations;
        $this->Graduations = collect($Graduations->items());
        return view('livewire.graduations.graduation', [
            'certificates' => Certificates::get(),
            'links' => $links
        ]);
    }

    public function AddGraduationModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('GraduationModalShow');
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'certificates_id' => 'required',
            'graduations_name' => 'required|unique:graduations',

        ], [
            'certificates_id.required' => 'حقل اسم الشهادة مطلوب',
            'graduations_name.required' => 'حقل اسم جهة التخرج مطلوب',
            'graduations_name.unique' => 'اسم جهة التخرج موجود',

        ]);

        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);
        Graduations::create([
            'certificates_id' => $this->certificates_id,
            'graduations_name' => $this->graduations_name,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetGraduation($GraduationId)
    {
        $this->resetValidation();

        $this->Graduation  = Graduations::find($GraduationId);
        $this->GraduationId = $this->Graduation->id;
        $this->certificates_id = $this->Graduation->certificates_id;
        $this->graduations_name = $this->Graduation->graduations_name;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'certificates_id' => 'required:graduations',
            'graduations_name' => 'required|unique:graduations,graduations_name,' . $this->Graduation->id . ',id',

        ], [
            'certificates_id.required' => 'حقل اسم الشهادة مطلوب',
            'graduations_name.required' => 'حقل اسم جهة التخرج مطلوب',
            'graduations_name.unique' => 'اسم جهة التخرج موجود',

        ]);

        $Graduations = Graduations::find($this->GraduationId);
        $Graduations->update([
            'certificates_id' => $this->certificates_id,
            'graduations_name' => $this->graduations_name,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Graduations = Graduations::find($this->GraduationId);
        $Graduations->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات  بنجاح',
            'title' => 'الحذف '
        ]);
    }
}

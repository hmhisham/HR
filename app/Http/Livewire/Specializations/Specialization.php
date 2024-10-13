<?php

namespace App\Http\Livewire\Specializations;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Graduations\Graduations;
use App\Models\Certificates\Certificates;

use App\Http\Livewire\Certificates\Certificate;
use App\Models\Specializations\Specializations;

class Specialization extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Specializations = [];
    public $Graduations = [];
    public $SpecializationSearch, $Specialization, $SpecializationId;
    public $certificates_id, $graduations_id, $specializations_name;

    protected $listeners = [
        'SelectGraduationsId',
    ];
    public function hydrate()
    {
        $this->emit('select2');
    }

    public function mount()
    {
        $this->Graduations = Graduations::all();
    }

    public function render()
    {
        $SpecializationSearch = '%' . $this->SpecializationSearch . '%';
        $Specializations = Specializations::where('specializations_name', 'LIKE', $SpecializationSearch)
            ->orderBy('id', 'ASC')
            ->paginate(10);

        $links = $Specializations;
        $this->Specializations = collect($Specializations->items());

        return view('livewire.specializations.specialization', [
            'certificates' => Certificates::get(),
            'graduations' => Graduations::get(),
            'links' => $links
        ]);
    }

    public function SelectGraduationsId($GraduationsIdID)
    {
        $graduations_id = Graduations::find($GraduationsIdID);
        if ($graduations_id) {
            $this->graduations_id = $GraduationsIdID;
        } else {
            $this->graduations_id = null;
        }
    }

    public function AddSpecializationModalShow()
    {
        $this->reset(['certificates_id','graduations_id','specializations_name']);
        $this->resetValidation();
        $this->dispatchBrowserEvent('SpecializationModalShow');
    }

    public function chooseCertificate()
    {
        $Certificates = Certificates::find($this->certificates_id);
        $this->Graduations = $Certificates->Getgraduation;
    }

    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'certificates_id' => 'required',
            'graduations_id' => 'required',
            'specializations_name' => 'required|unique:specializations,specializations_name,NULL,id,graduations_id,' . $this->graduations_id.',certificates_id,'.$this->certificates_id,
        ], [
            'certificates_id.required' => 'حقل التحصيل الدراسي مطلوب',
            'graduations_id.required' => 'حقل جهة التخرج مطلوب',
            'specializations_name.required' => 'حقل الاختصاص مطلوب',
            'specializations_name.unique' => 'الاختصاص موجود',
        ]);

        Specializations::create([
            'certificates_id' => $this->certificates_id,
            'graduations_id' => $this->graduations_id,
            'specializations_name' => $this->specializations_name,

        ]);

        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetSpecialization($SpecializationId)
    {
        $this->resetValidation();

        $this->Specialization  = Specializations::find($SpecializationId);
        $this->SpecializationId = $this->Specialization->id;
        $this->certificates_id = $this->Specialization->certificates_id;
        $this->graduations_id = $this->Specialization->graduations_id;
        $this->specializations_name = $this->Specialization->specializations_name;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'certificates_id' => 'required',
            'graduations_id' => 'required',
            'specializations_name' => 'required|unique:specializations,specializations_name,'.$this->Specialization->id.',id,graduations_id,' . $this->graduations_id.',certificates_id,'.$this->certificates_id,
        ], [
            'certificates_id.required' => 'حقل التحصيل الدراسي مطلوب',
            'graduations_id.required' => 'حقل جهة التخرج مطلوب',
            'specializations_name.required' => 'حقل الاختصاص مطلوب',
            'specializations_name.unique' => 'الاختصاص موجود',
        ]);

        $Specializations = Specializations::find($this->SpecializationId);
        $Specializations->update([
            'certificates_id' => $this->certificates_id,
            'graduations_id' => $this->graduations_id,
            'specializations_name' => $this->specializations_name,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Specializations = Specializations::find($this->SpecializationId);
        $Specializations->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات  بنجاح',
            'title' => 'الحذف '
        ]);
    }
}

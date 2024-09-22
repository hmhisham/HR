<?php

namespace App\Http\Livewire\Specializationclassification;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Specializationclassification\Specializationclassification;

class Specializationclassificatio extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Specializationclassification = [];
    public $SpecializationclassificatioSearch, $Specializationclassificatio, $SpecializationclassificatioId;
    public $specializationclassification_name;


    public function render()
    {
        $SpecializationclassificatioSearch = '%' . $this->SpecializationclassificatioSearch . '%';
        $Specializationclassification = Specializationclassification::where('specializationclassification_name', 'LIKE', $SpecializationclassificatioSearch)


            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Specializationclassification;
        $this->Specializationclassification = collect($Specializationclassification->items());
        return view('livewire.specializationclassification.specializationclassificatio', [
            'links' => $links
        ]);
    }

    public function AddSpecializationclassificatioModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('SpecializationclassificatioModalShow');
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'specializationclassification_name' => 'required|unique:specializationclassification',

        ], [
            'specializationclassification_name.required' => 'حقل الاسم مطلوب',
            'specializationclassification_name.unique' => 'الاسم موجود',
        ]);

        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);
        Specializationclassification::create([
            'specializationclassification_name' => $this->specializationclassification_name,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetSpecializationclassificatio($SpecializationclassificatioId)
    {
        $this->resetValidation();

        $this->Specializationclassificatio  = Specializationclassification::find($SpecializationclassificatioId);
        $this->SpecializationclassificatioId = $this->Specializationclassificatio->id;
        $this->specializationclassification_name = $this->Specializationclassificatio->specializationclassification_name;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'specializationclassification_name' => 'required|unique:specializationclassification',

        ], [
            'specializationclassification_name.required' => 'حقل الاسم مطلوب',
            'specializationclassification_name.unique' => 'الاسم موجود',
        ]);

        $Specializationclassification = Specializationclassification::find($this->SpecializationclassificatioId);
        $Specializationclassification->update([
            'specializationclassification_name' => $this->specializationclassification_name,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Specializationclassification = Specializationclassification::find($this->SpecializationclassificatioId);
        $Specializationclassification->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات  بنجاح',
            'title' => 'الحذف '
        ]);
    }
}

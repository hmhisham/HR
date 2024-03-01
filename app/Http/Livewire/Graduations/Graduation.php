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
    public $certificates_id, $graduation_name;


    public function render()
    {
        $GraduationSearch = '%' . $this->GraduationSearch . '%';
        $Graduations = Graduations::where('certificates_id', 'LIKE', $GraduationSearch)
            ->orWhere('graduation_name', 'LIKE', $GraduationSearch)


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
            'certificates_id' => 'required|unique:graduations',
            'graduation_name' => 'required|unique:graduations',

        ], [
            'certificates_id.required' => 'حقل الاسم مطلوب',
            'certificates_id.unique' => 'الأسم موجود',
            'graduation_name.required' => 'حقل الاسم مطلوب',
            'graduation_name.unique' => 'الأسم موجود',
        ]);

        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);
        Graduations::create([
            'certificates_id' => $this->certificates_id,
            'graduation_name' => $this->graduation_name,

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
        $this->graduation_name = $this->Graduation->graduation_name;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'certificates_id' => 'required:graduations',
            'graduation_name' => 'required:graduations',

        ], [
            'certificates_id.required' => 'حقل الاسم مطلوب',
            'graduation_name.required' => 'حقل الاسم مطلوب',
        ]);

        $Graduations = Graduations::find($this->GraduationId);
        $Graduations->update([
            'certificates_id' => $this->certificates_id,
            'graduation_name' => $this->graduation_name,

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

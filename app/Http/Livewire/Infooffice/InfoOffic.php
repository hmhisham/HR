<?php

namespace App\Http\Livewire\Infooffice;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Infooffice\Infooffice;

class InfoOffic extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Infooffice = [];
    public $InfoOfficSearch, $InfoOffic, $InfoOfficId;
    public $Infooffice_id, $Infooffice_name;


    public function render()
    {
        $InfoOfficSearch = $this->InfoOfficSearch . '%';
        $Infooffice = Infooffice::where('Infooffice_id', 'LIKE', $InfoOfficSearch)
            ->orWhere('Infooffice_name', 'LIKE', $InfoOfficSearch)


            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Infooffice;
        $this->Infooffice = collect($Infooffice->items());
        return view('livewire.infooffice.infooffic', [
            'links' => $links
        ]);
    }

    public function AddInfoOfficModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('InfoOfficModalShow');
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'Infooffice_id' => 'required|unique:infooffice',
            'Infooffice_name' => 'required|unique:infooffice',

        ], [
            'Infooffice_id.required' => 'حقل رقم مكتب المعلومات مطلوب',
            'Infooffice_id.unique' => 'الرقم موجود',
            'Infooffice_name.required' => 'حقل اسم مكتب المعلومات مطلوب',
            'Infooffice_name.unique' => 'الأسم موجود',
        ]);

        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);
        Infooffice::create([
            'Infooffice_id' => $this->Infooffice_id,
            'Infooffice_name' => $this->Infooffice_name,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetInfoOffic($InfoOfficId)
    {
        $this->resetValidation();

        $this->InfoOffic  = Infooffice::find($InfoOfficId);
        $this->InfoOfficId = $this->InfoOffic->id;
        $this->Infooffice_id = $this->InfoOffic->Infooffice_id;
        $this->Infooffice_name = $this->InfoOffic->Infooffice_name;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'Infooffice_id' => 'required|unique:infooffice,Infooffice_id,' . $this->InfoOffic->id . ',id',
            'Infooffice_name' => 'required|unique:infooffice,Infooffice_name,' . $this->InfoOffic->id . ',id',

        ], [
            'Infooffice_id.required' => 'حقل رقم مكتب المعلومات مطلوب',
            'Infooffice_id.unique' => 'الرقم موجود',
            'Infooffice_name.required' => 'حقل اسم مكتب المعلومات مطلوب',
            'Infooffice_name.unique' => 'الأسم موجود',
        ]);

        $Infooffice = Infooffice::find($this->InfoOfficId);
        $Infooffice->update([
            'Infooffice_id' => $this->Infooffice_id,
            'Infooffice_name' => $this->Infooffice_name,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Infooffice = Infooffice::find($this->InfoOfficId);
        $Infooffice->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات  بنجاح',
            'title' => 'الحذف '
        ]);
    }
}

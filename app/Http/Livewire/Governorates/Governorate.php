<?php

namespace App\Http\Livewire\Governorates;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Governorates\Governorates;

class Governorate extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Governorates = [];
    public $GovernorateSearch, $Governorate, $GovernorateId;
    public $governorate_number, $governorate_name;

    // public function mount() {
    //     $this->Governorates = Governorates::get();

    // }

    public function render()
    {
        $GovernorateSearch = $this->GovernorateSearch . '%';
        $Governorates = Governorates::where('governorate_number', 'LIKE', $GovernorateSearch)
            ->orWhere('governorate_name', 'LIKE', $GovernorateSearch)


            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Governorates;
        $this->Governorates = collect($Governorates->items());
        return view('livewire.governorates.governorate', [
            'links' => $links
        ]);
    }

    public function AddGovernorateModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('GovernorateModalShow');
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'governorate_number' => 'required|unique:governorates',
            'governorate_name' => 'required|unique:governorates',

        ], [
            'governorate_number.required' => 'حقل الاسم مطلوب',
            'governorate_number.unique' => 'الأسم موجود',
            'governorate_name.required' => 'حقل الاسم مطلوب',
            'governorate_name.unique' => 'الأسم موجود',
        ]);

        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);
        Governorates::create([
            'governorate_number' => $this->governorate_number,
            'governorate_name' => $this->governorate_name,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetGovernorate($GovernorateId)
    {
        $this->resetValidation();

        $this->Governorate = Governorates::find($GovernorateId);

        if ($this->Governorate !== null) {
            $this->GovernorateId = $this->Governorate->id;
            $this->governorate_number = $this->Governorate->governorate_number;
            $this->governorate_name = $this->Governorate->governorate_name;
        }
    }


    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'governorate_number' => 'required:governorates',
            'governorate_name' => 'required:governorates',
        ], [
            'governorate_number.required' => 'حقل الاسم مطلوب',
            'governorate_name.required' => 'حقل الاسم مطلوب',
        ]);

        $Governorates = Governorates::find($this->GovernorateId);
        $Governorates->update([
            'governorate_number' => $this->governorate_number,
            'governorate_name' => $this->governorate_name,
        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }
    public function destroy()
    {
        $Governorates = Governorates::find($this->GovernorateId);
        $Governorates->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات  بنجاح',
            'title' => 'الحذف '
        ]);
    }
}

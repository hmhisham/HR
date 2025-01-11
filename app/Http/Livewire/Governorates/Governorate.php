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
    public $Governorate, $GovernorateId;
    public $governorate_number, $governorate_name;
    public $search = ['governorate_number' => '', 'governorate_name' => ''];

    public function render()
    {
        $searchNumber = '%' . $this->search['governorate_number'] . '%';
        $searchName = '%' . $this->search['governorate_name'] . '%';

        $Governorates = Governorates::query()
            ->when($this->search['governorate_number'], function ($query) use ($searchNumber) {
                $query->where('governorate_number', 'LIKE', $searchNumber);
            })
            ->when($this->search['governorate_name'], function ($query) use ($searchName) {
                $query->orWhere('governorate_name', 'LIKE', $searchName);
            })
            ->orderBy('id', 'ASC')
            ->paginate(10);

        $links = $Governorates;
        $this->Governorates = collect($Governorates->items());

        return view('livewire.governorates.governorate', [
            'Governorates' => $Governorates,
            'links' => $links
        ]);
    }

    public function AddGovernorateModalShow()
    {
        $this->reset('governorate_number', 'governorate_name');
        $this->resetValidation();
        $this->dispatchBrowserEvent('GovernorateModalShow');
    }

    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'governorate_number' => 'required|unique:governorates,governorate_number',
            'governorate_name' => 'required|unique:governorates,governorate_name',
        ], [
            'governorate_number.required' => 'حقل رقم المحافظة مطلوب',
            'governorate_number.unique' => 'الرقم موجود',
            'governorate_name.required' => 'حقل اسم المحافظة مطلوب',
            'governorate_name.unique' => 'الأسم موجود',
        ]);

        Governorates::create([
            'governorate_number' => $this->governorate_number,
            'governorate_name' => $this->governorate_name,
        ]);

        $this->reset('governorate_number', 'governorate_name');
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
            'governorate_number' => 'required|unique:governorates,governorate_number,' . $this->Governorate->id . ',id',
            'governorate_name' => 'required|unique:governorates,governorate_name,' . $this->Governorate->id . ',id',
        ], [
            'governorate_number.required' => 'حقل رقم المحافظة مطلوب',
            'governorate_number.unique' => 'رقم المحافظة موجود',
            'governorate_name.required' => 'حقل اسم المحافظة مطلوب',
            'governorate_name.unique' => 'اسم المحافظة موجود',
        ]);

        $Governorates = Governorates::find($this->GovernorateId);
        $Governorates->update([
            'governorate_number' => $this->governorate_number,
            'governorate_name' => $this->governorate_name,
        ]);

        $this->reset('governorate_number', 'governorate_name');
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }
    public function destroy()
    {
        $Governorates = Governorates::find($this->GovernorateId);
        $Governorates->delete();
        $this->reset('governorate_number', 'governorate_name');
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات  بنجاح',
            'title' => 'الحذف '
        ]);
    }
}

<?php

namespace App\Http\Livewire\Units;

use Livewire\Component;
use App\Models\Units\Units;
use Livewire\WithPagination;
use App\Models\Branch\Branch;

class Unit extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Units = [];
    public $UnitSearch, $Unit, $UnitId;
    public $branch_id, $units_name;


    public function render()
    {
        $UnitSearch = '%' . $this->UnitSearch . '%';
        $Units = Units::where('branch_id', 'LIKE', $UnitSearch)
            ->orWhere('units_name', 'LIKE', $UnitSearch)


            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Units;
        $this->Units = collect($Units->items());
        return view('livewire.units.unit', [
            'branch' => Branch::get(),
            'links' => $links
        ]);
    }

    public function AddUnitModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('UnitModalShow');
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'branch_id' => 'required|unique:units',
            'units_name' => 'required|unique:units',

        ], [
            'branch_id.required' => 'حقل الاسم مطلوب',
            'branch_id.unique' => 'الأسم موجود',
            'units_name.required' => 'حقل الاسم مطلوب',
            'units_name.unique' => 'الأسم موجود',
        ]);

        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);
        Units::create([
            'branch_id' => $this->branch_id,
            'units_name' => $this->units_name,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetUnit($UnitId)
    {
        $this->resetValidation();

        $this->Unit  = Units::find($UnitId);
        $this->UnitId = $this->Unit->id;
        $this->branch_id = $this->Unit->branch_id;
        $this->units_name = $this->Unit->units_name;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'branch_id' => 'required:units',
            'units_name' => 'required:units',

        ], [
            'branch_id.required' => 'حقل الاسم مطلوب',
            'units_name.required' => 'حقل الاسم مطلوب',
        ]);

        $Units = Units::find($this->UnitId);
        $Units->update([
            'branch_id' => $this->branch_id,
            'units_name' => $this->units_name,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Units = Units::find($this->UnitId);
        $Units->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات  بنجاح',
            'title' => 'الحذف '
        ]);
    }
}

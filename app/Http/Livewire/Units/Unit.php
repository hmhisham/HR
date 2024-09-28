<?php

namespace App\Http\Livewire\Units;

use Livewire\Component;
use App\Models\Units\Units;
use Livewire\WithPagination;
use App\Models\Branch\Branch;
use App\Models\Sections\Sections;

class Unit extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Units = [];
    public $UnitSearch, $Unit, $UnitId;
    public $branch_id, $units_name;
    public $section_id, $branch_name, $units_id;

    public $branch = [];
    public $sections = [];

    public function mount()
    {
        $this->branch = Branch::all();
        $this->sections = Sections::all();
    }

    public function sectionid($section_id)
    {
        $this->section_id = $section_id;
        $this->branch = Branch::where('section_id', $section_id)->get();
    }



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

            'links' => $links
        ]);
    }

    public function AddUnitModalShow()
    {
        $this->reset(['section_id', 'branch_id', 'units_name']);
        $this->resetValidation();
        $this->dispatchBrowserEvent('UnitModalShow');
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'section_id' => 'required:branch',
            'branch_id' => 'required:units',
            'units_name' => 'required|unique:units,units_name,NULL,id,branch_id,'. $this->branch_id.',section_id,'.$this->section_id
        ], [
            'section_id.required' => 'حقل الاسم مطلوب',
            'branch_id.required' => 'حقل الاسم مطلوب',
            'units_name.required' => 'حقل الاسم مطلوب',
            'units_name.unique' => 'الاسم موجود',
        ]);


        Units::create([
            'section_id' => $this->section_id,
            'branch_id' => $this->branch_id,
            'units_name' => $this->units_name,

        ]);
        $this->reset(['section_id', 'branch_id', 'units_name']);
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
        $this->section_id = $this->Unit->sections_id;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'section_id' => 'required:branch',
            'branch_id' => 'required:units',
            'units_name' => 'required|unique:units,units_name,NULL,id,branch_id,'. $this->branch_id.',section_id,'.$this->section_id

        ], [
            'section_id.required' => 'حقل الاسم مطلوب',
            'branch_id.required' => 'حقل الاسم مطلوب',
            'units_name.required' => 'حقل الاسم مطلوب',
            'units_name.unique' => 'الاسم موجود',
        ]);

        $Units = Units::find($this->UnitId);
        $Units->update([
            'section_id' => $this->section_id,
            'branch_id' => $this->branch_id,
            'units_name' => $this->units_name,

        ]);
        $this->reset(['section_id', 'branch_id', 'units_name']);
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Units = Units::find($this->UnitId);
        $Units->delete();
        $this->reset(['section_id', 'branch_id', 'units_name']);
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات  بنجاح',
            'title' => 'الحذف '
        ]);
    }
}

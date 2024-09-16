<?php

namespace App\Http\Livewire\Branch;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Branch\Branch;
use App\Models\Linkages\Linkages;
use App\Models\Sections\Sections;

class Branc extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Branch = [];
    public $BranchSearch, $Branc, $BrancId;
    public $linkage_id, $section_id, $branch_name;
    public $linkages = [];

    public function mount()
    {
        $this->linkages = Linkages::all();
    }

    public function render()
    {
        $BranchSearch = $this->BranchSearch . '%';

        // البحث عن البيانات في جدول الفروع Branch
        $Branch = Branch::where('section_id', 'LIKE', $BranchSearch)
            ->orWhere('branch_name', 'LIKE', $BranchSearch)
            ->orderBy('id', 'ASC')
            ->paginate(10);

        $this->Branch = collect($Branch->items());

        return view('livewire.branch.branc', [
            'sections' => Sections::get(),
            'links' => $Branch,
        ]);
    }

    public function AddBrancModalShow()
    {
        //$this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('BrancModalShow');
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'section_id' => 'required',
            'branch_name' => 'required|unique:branch',

        ], [
            'section_id.required' => 'حقل الاسم مطلوب',

            'branch_name.required' => 'حقل الاسم مطلوب',

        ]);

        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);
        Branch::create([
            'section_id' => $this->section_id,
            'branch_name' => $this->branch_name,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetBranc($BrancId)
    {
        $this->resetValidation();

        $this->Branc  = Branch::find($BrancId);
        $this->BrancId = $this->Branc->id;
        $this->section_id = $this->Branc->section_id;
        $this->branch_name = $this->Branc->branch_name;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'section_id' => 'required:branch',
            'branch_name' => 'required:branch',

        ], [
            'section_id.required' => 'حقل الاسم مطلوب',
            'branch_name.required' => 'حقل الاسم مطلوب',
        ]);

        $Branch = Branch::find($this->BrancId);
        $Branch->update([
            'section_id' => $this->section_id,
            'branch_name' => $this->branch_name,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Branch = Branch::find($this->BrancId);
        $Branch->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات  بنجاح',
            'title' => 'الحذف '
        ]);
    }
}

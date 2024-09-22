<?php

namespace App\Http\Livewire\Branch;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Branch\Branch;
use App\Models\Linkages\Linkages;
use App\Models\Sections\Sections;
use App\Http\Livewire\Linkages\Linkage;

class Branc extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Branch = [];
    public $BrancSearch, $Branc, $BrancId;
    public $section_id, $branch_name, $linkage_id;

    public $linkages = [];
    public $sections = [];

    public function mount()
    {
        $this->linkages = Linkages::all();
        $this->sections = Sections::all();
    }

    public function render()
    {
        $BrancSearch = $this->BrancSearch . '%';
        $Branch = Branch::where('section_id', 'LIKE', $BrancSearch)
            ->orWhere('branch_name', 'LIKE', $BrancSearch)
            ->orderBy('id', 'ASC')
            ->paginate(10);
        $this->Branch = collect($Branch->items());
        return view('livewire.branch.branc', [
            'links' => $Branch,
        ]);
    }




    public function LinkageId($linkage_id)
    {
        $this->linkage_id = $linkage_id;
        $this->sections = Sections::where('linkage_id', $linkage_id)->get();
    }

    public function AddBrancModalShow()
    {
        $this->reset(['linkage_id', 'section_id', 'branch_name']);
        $this->resetValidation();
        $this->dispatchBrowserEvent('BrancModalShow');
    }

    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'linkage_id' => 'required:branch',
            'section_id' => 'required:branch',
            'branch_name' => 'required:branch',
        ], [
            'linkage_id.required' => 'حقل الاسم مطلوب',
            'section_id.required' => 'حقل الاسم مطلوب',
            'branch_name.required' => 'حقل الاسم مطلوب',
        ]);

        Branch::create([
            'linkage_id' => $this->linkage_id,
            'section_id' => $this->section_id,
            'branch_name' => $this->branch_name,
        ]);
        $this->reset(['linkage_id', 'section_id', 'branch_name']);
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
        $this->linkage_id = $this->Branc->linkage_id;
        $this->branch_name = $this->Branc->branch_name;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'linkage_id' => 'required:branch',
            'section_id' => 'required:branch',
            'branch_name' => 'required:branch',
        ], [
            'linkage_id.required' => 'حقل الاسم مطلوب',
            'section_id.required' => 'حقل الاسم مطلوب',
            'branch_name.required' => 'حقل الاسم مطلوب',
        ]);

        $Branch = Branch::find($this->BrancId);
        $Branch->update([
            'linkage_id' => $this->linkage_id,
            'section_id' => $this->section_id,
            'branch_name' => $this->branch_name,
        ]);
        $this->reset(['linkage_id', 'section_id', 'branch_name']);
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Branch = Branch::find($this->BrancId);
        $Branch->delete();
        $this->reset(['linkage_id', 'section_id', 'branch_name']);
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات  بنجاح',
            'title' => 'الحذف '
        ]);
    }
}

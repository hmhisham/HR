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

    public $linkages = [];
    public $sections = [];
    public $Branches = [];
    public $BranchSearch, $BranchId, $Branch, $linkageName, $SectionsName;
    public $section_id, $branch_name, $linkage_id, $SectionName;

    protected $listeners = [
        'GetLinkage',
        'GetSection',
    ];
    public function hydrate()
    {
        $this->emit('select2');
    }

    public function mount()
    {
        $this->linkages = Linkages::all();
    }

    public function render()
    {
        $BranchSearch = $this->BranchSearch . '%';
        $Branch = Branch::where('section_id', 'LIKE', $BranchSearch)
            ->orWhere('branch_name', 'LIKE', $BranchSearch)
            ->orderBy('id', 'ASC')
            ->paginate(10);
        $this->Branches = collect($Branch->items());
        return view('livewire.branch.branc', [
            'links' => $Branch,
        ]);
    }

    public function GetLinkage($Linkage_id)
    {
        $this->linkage_id = $Linkage_id;
        $this->sections = Sections::where('linkage_id', $Linkage_id)->get();
    }
    public function GetSection($Section_id)
    {
        $this->section_id = $Section_id;
    }

    public function AddBrancModalShow()
    {
        $this->reset(['linkage_id', 'section_id', 'branch_name', 'sections']);
        $this->resetValidation();
        $this->dispatchBrowserEvent('BrancModalShow');
    }

    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'linkage_id' => 'required:branch',
            'section_id' => 'required:branch',
            'branch_name' => 'required|unique:branch,branch_name,NULL,id,section_id,' . $this->section_id . ',linkage_id,' . $this->linkage_id,
        ], [
            'linkage_id.required' => 'حقل الارتباط مطلوب',
            'section_id.required' => 'حقل القسم مطلوب',
            'branch_name.required' => 'حقل الشعبة مطلوب',
            'branch_name.unique' => 'أسم الشعبة موجود',
        ]);
        Branch::create([
            'linkage_id' => $this->linkage_id,
            'section_id' => $this->section_id,
            'branch_name' => $this->branch_name,
        ]);
        $this->reset(['linkage_id', 'section_id', 'branch_name']);
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافة بنجاح',
            'title' => 'اضافة'
        ]);
    }

    public function GetBranch($BranchId)
    {
        $this->resetValidation();
        $this->Branch = Branch::find($BranchId);
        $this->BranchId = $this->Branch->id;
        $this->section_id = $this->Branch->section_id;
        $this->linkage_id = $this->Branch->linkage_id;
        $this->branch_name = $this->Branch->branch_name;
        $this->sections = $this->Branch->Getlinkage->GetSections;
        $this->linkageName = $this->Branch->Getsection->Getlinkage->Linkages_name;
        $this->SectionsName = $this->Branch->Getsection->section_name;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'linkage_id' => 'required:branch',
            'section_id' => 'required:branch',
            //'branch_name' => 'required|unique:branch,branch_name,NULL,id,section_id,'. $this->section_id,
            'branch_name' => 'required|unique:branch,branch_name,' . $this->Branch->id . ',id,section_id,' . $this->section_id . ',linkage_id,' . $this->linkage_id
        ], [
            'linkage_id.required' => 'حقل الارتباط مطلوب',
            'section_id.required' => 'حقل القسم مطلوب',
            'branch_name.required' => 'حقل الشعبة مطلوب',
            'branch_name.unique' => 'أسم الشعبة موجود',
        ]);
        $Branch = Branch::find($this->BranchId);
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
        $Branch = Branch::find($this->BranchId);
        $Branch->delete();
        $this->reset(['linkage_id', 'section_id', 'branch_name']);
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات  بنجاح',
            'title' => 'الحذف '
        ]);
    }
}

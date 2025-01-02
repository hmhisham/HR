<?php

namespace App\Http\Livewire\Sections;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\Linkages\Linkages;
use App\Models\Sections\Sections;

class Section extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Sections = [];
    public $linkages = [];
    public $SectionSearch, $Section, $SectionId, $linkageName;
    public $linkage_id, $section_name;

    protected $listeners = [
        'GetLinkage',
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
        $SectionSearch = '%' . $this->SectionSearch . '%';
        $serchID = Linkages::where('Linkages_name', 'LIKE', $SectionSearch)->pluck('id');

        $Sections = Sections::whereIn('linkage_id', $serchID)
            ->orWhere('section_name', 'LIKE', $SectionSearch)
            ->orderBy('id', 'ASC')->paginate(10);

        $links = $Sections;
        $this->Sections = collect($Sections->items());
        return view('livewire.sections.section', [
            'linkages' => Linkages::get(),
            'links' => $links
        ]);
    }

    public function GetLinkage($Linkage_id)
    {
        $this->linkage_id = $Linkage_id;
    }

    public function AddSectionModalShow()
    {
        $this->reset(['linkage_id', 'section_name']);
        $this->resetValidation();
        $this->dispatchBrowserEvent('SectionModalShow');
    }

    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'linkage_id' => 'required',
            'section_name' => 'required|unique:sections,section_name',
            'section_name' => 'required|unique:sections,section_name,NULL,id,linkage_id,' . $this->linkage_id,

        ], [
            'linkage_id.required' => 'حقل الارتباط مطلوب',
            'section_name.required' => 'حقل اسم القسم مطلوب',
            'section_name.unique' => 'أسم القسم موجود',
        ]);

        Sections::create([
            'linkage_id' => $this->linkage_id,
            'section_name' => $this->section_name,

        ]);

        $this->reset(['linkage_id', 'section_name']);
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetSection($SectionId)
    {
        $this->resetValidation();

        $this->Section  = Sections::find($SectionId);
        $this->SectionId = $this->Section->id;
        $this->linkage_id = $this->Section->linkage_id;
        $this->section_name = $this->Section->section_name;

        $this->linkageName = $this->Section->Getlinkage->Linkages_name;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'linkage_id' => 'required:sections',
            'section_name' => 'required|unique:sections',
            'section_name' => 'required|unique:sections,section_name,' . $this->Section->id . ',id,linkage_id,' . $this->linkage_id

        ], [
            'linkage_id.required' => 'حقل الارتباط مطلوب',
            'section_name.required' => 'حقل اسم القسم مطلوب',
            'section_name.unique' => 'أسم القسم موجود',
        ]);

        $Sections = Sections::find($this->SectionId);
        $Sections->update([
            'linkage_id' => $this->linkage_id,
            'section_name' => $this->section_name,
        ]);

        $this->reset(['linkage_id', 'section_name']);
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Sections = Sections::find($this->SectionId);
        $Sections->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات  بنجاح',
            'title' => 'الحذف '
        ]);
    }
}

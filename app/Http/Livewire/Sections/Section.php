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
    public $SectionSearch, $Section, $SectionId;
    public $linkage_id, $section_name;


    public function render()
    {
        $SectionSearch = $this->SectionSearch . '%';
        $Sections = Sections::where('linkage_id', 'LIKE', $SectionSearch)
            ->orWhere('section_name', 'LIKE', $SectionSearch)
            ->orderBy('id', 'ASC')
            ->paginate(10);
        $linkss = $Sections;
        $this->Sections = collect($Sections->items());
        return view('livewire.sections.section', [
            'linkages' => Linkages::get(),
            'linkss' => $linkss
        ]);
    }

    public function AddSectionModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('SectionModalShow');
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'linkage_id' => 'required:sections',
            'section_name' => 'required|unique:sections',

        ], [
            'linkage_id.required' => 'حقل الاسم مطلوب',
            'section_name.required' => 'حقل الاسم مطلوب',
            'section_name.unique' => 'الأسم موجود',
        ]);

        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);
        Sections::create([
            'linkage_id' => $this->linkage_id,
            'section_name' => $this->section_name,

        ]);
        $this->reset();
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
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'linkage_id' => 'required:sections',
            'section_name' => 'required|unique:sections',

        ], [
            'linkage_id.required' => 'حقل الاسم مطلوب',
            'section_name.required' => 'حقل الاسم مطلوب',
            'section_name.unique' => 'الأسم موجود',
        ]);

        $Sections = Sections::find($this->SectionId);
        $Sections->update([
            'linkage_id' => $this->linkage_id,
            'section_name' => $this->section_name,

        ]);
        $this->reset();
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

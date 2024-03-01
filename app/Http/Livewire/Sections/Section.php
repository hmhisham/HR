<?php

namespace App\Http\Livewire\Sections;

use Livewire\Component;
use App\Models\Links\Links;
use Livewire\WithPagination;
use App\Models\Sections\Sections;

class Section extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Sections = [];
    public $SectionSearch, $Section, $SectionId;
    public $link_id, $section_name;


    public function render()
    {
        $SectionSearch = $this->SectionSearch . '%';
        $Sections = Sections::where('link_id', 'LIKE', $SectionSearch)
            ->orWhere('section_name', 'LIKE', $SectionSearch)


            ->orderBy('id', 'ASC')
            ->paginate(10);
        $linkss = $Sections;
        $this->Sections = collect($Sections->items());
        return view('livewire.sections.section', [
            'links' => Links::get(),
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
            'link_id' => 'required',
            'section_name' => 'required|unique:sections',

        ], [
            'link_id.required' => 'حقل الاسم مطلوب',
            'link_id.unique' => 'الأسم موجود',
            'section_name.required' => 'حقل الاسم مطلوب',
            'section_name.unique' => 'الأسم موجود',
        ]);

        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);
        Sections::create([
            'link_id' => $this->link_id,
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
        $this->link_id = $this->Section->link_id;
        $this->section_name = $this->Section->section_name;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'link_id' => 'required:sections',
            'section_name' => 'required:sections',

        ], [
            'link_id.required' => 'حقل الاسم مطلوب',
            'section_name.required' => 'حقل الاسم مطلوب',
        ]);

        $Sections = Sections::find($this->SectionId);
        $Sections->update([
            'link_id' => $this->link_id,
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

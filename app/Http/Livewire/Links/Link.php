<?php

namespace App\Http\Livewire\Links;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Links\Links;

class Link extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Links = [];
    public $LinkSearch, $Link, $LinkId;
    public $link_name;


    public function render()
    {
        $LinkSearch = $this->LinkSearch . '%';
        $Links = Links::where('link_name', 'LIKE', $LinkSearch)


            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Links;
        $this->Links = collect($Links->items());
        return view('livewire.links.link', [
            'links' => $links
        ]);
    }

    public function AddLinkModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('LinkModalShow');
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'link_name' => 'required|unique:links',

        ], [
            'link_name.required' => 'حقل الاسم مطلوب',
            'link_name.unique' => 'الأسم موجود',
        ]);

        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);
        Links::create([
            'link_name' => $this->link_name,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetLink($LinkId)
    {
        $this->resetValidation();

        $this->Link  = Links::find($LinkId);
        $this->LinkId = $this->Link->id;
        $this->link_name = $this->Link->link_name;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'link_name' => 'required:links',

        ], [
            'link_name.required' => 'حقل الاسم مطلوب',
        ]);

        $Links = Links::find($this->LinkId);
        $Links->update([
            'link_name' => $this->link_name,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Links = Links::find($this->LinkId);
        $Links->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات  بنجاح',
            'title' => 'الحذف '
        ]);
    }
}

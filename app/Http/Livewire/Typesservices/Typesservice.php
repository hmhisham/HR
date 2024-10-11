<?php

namespace App\Http\Livewire\Typesservices;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Typesservices\Typesservices;

class Typesservice extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Typesservices = [];
    public $TypesserviceSearch, $Typesservice, $TypesserviceId;
    public $typesservices_name;


    public function render()
    {
        $TypesserviceSearch = '%' . $this->TypesserviceSearch . '%';
        $Typesservices = Typesservices::where('typesservices_name', 'LIKE', $TypesserviceSearch)


            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Typesservices;
        $this->Typesservices = collect($Typesservices->items());
        return view('livewire.typesservices.typesservice', [
            'links' => $links
        ]);
    }

    public function AddTypesserviceModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('TypesserviceModalShow');
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'typesservices_name' => 'required|unique:typesservices',

        ], [
            'typesservices_name.required' => 'حقل الاسم مطلوب',
            'typesservices_name.unique' => 'الاسم موجود',
        ]);

        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);
        Typesservices::create([
            'typesservices_name' => $this->typesservices_name,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetTypesservice($TypesserviceId)
    {
        $this->resetValidation();

        $this->Typesservice  = Typesservices::find($TypesserviceId);
        $this->TypesserviceId = $this->Typesservice->id;
        $this->typesservices_name = $this->Typesservice->typesservices_name;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'typesservices_name' => 'required',

        ], [
            'typesservices_name.required' => 'حقل الاسم مطلوب',
        ]);

        $Typesservices = Typesservices::find($this->TypesserviceId);
        $Typesservices->update([
            'typesservices_name' => $this->typesservices_name,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Typesservices = Typesservices::find($this->TypesserviceId);
        $Typesservices->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات  بنجاح',
            'title' => 'الحذف '
        ]);
    }
}

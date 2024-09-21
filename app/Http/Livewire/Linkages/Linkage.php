<?php

namespace App\Http\Livewire\Linkages;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\Linkages\Linkages;

class Linkage extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Linkages = [];
    public $LinkageSearch, $Linkage, $LinkageId;
    public $Linkages_name;


    public function render()
    {
        $LinkageSearch = '%' . $this->LinkageSearch . '%';
        $Linkages = Linkages::where('Linkages_name', 'LIKE', $LinkageSearch)


            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Linkages;
        $this->Linkages = collect($Linkages->items());
        return view('livewire.linkages.linkage', [
            'links' => $links
        ]);
    }

    public function AddLinkageModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('LinkageModalShow');
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'Linkages_name' => 'required|unique:linkages',

        ], [
            'Linkages_name.required' => 'حقل الاسم مطلوب',
            'Linkages_name.unique' => 'الأسم موجود',
        ]);

        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);


        Linkages::create([
            'Linkages_name' => $this->Linkages_name,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetLinkage($LinkageId)
    {
        $this->resetValidation();

        $this->Linkage  = Linkages::find($LinkageId);
        $this->LinkageId = $this->Linkage->id;
        $this->Linkages_name = $this->Linkage->Linkages_name;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'Linkages_name' => 'required|unique:linkages',

        ], [
            'Linkages_name.required' => 'حقل الاسم مطلوب',
            'Linkages_name.unique' => 'الأسم موجود',
        ]);

        $Linkages = Linkages::find($this->LinkageId);
        $Linkages->update([
            'Linkages_name' => $this->Linkages_name,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Linkages = Linkages::find($this->LinkageId);

        if ($Linkages) {

            $Linkages->delete();
            $this->reset();
            $this->dispatchBrowserEvent('success', [
                'message' => 'تم حذف البيانات بنجاح',
                'title' => 'الحذف'
            ]);
        }
    }
}

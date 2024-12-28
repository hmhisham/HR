<?php

namespace App\Http\Livewire\Propertytypes;

use Livewire\Component;

use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\Propertytypes\Propertytypes;

class Propertytype extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Propertytypes = [];
    public $PropertytypeSearch, $Propertytype, $PropertytypeId;
    public $type_name;

    public function render()
    {
        $PropertytypeSearch = '%' . $this->PropertytypeSearch . '%';
        $Propertytypes = Propertytypes::where('type_name', 'LIKE', $PropertytypeSearch)
            ->orderBy('id', 'ASC')
            ->paginate(10);

        $links = $Propertytypes;
        $this->Propertytypes = collect($Propertytypes->items());
        return view('livewire.propertytypes.propertytype', [
            'links' => $links
        ]);
    }

    public function AddPropertytypeModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('PropertytypeModalShow');
    }


    public function store()
    {
        $this->resetValidation();

        $this->validate([
            'type_name' => 'required|unique:propertytypes,type_name',
        ], [
            'type_name.required' => 'حقل اسم النوع مطلوب',
            'type_name.unique' => 'نوع جنس العقار موجود بالفعل .. يرجى اختيار اسم آخر.',
        ]);

        Propertytypes::create([
            'user_id' => Auth::id(),
            'type_name' => $this->type_name,
        ]);

        $this->reset();

        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه',
        ]);
    }


    public function GetPropertytype($PropertytypeId)
    {
        $this->resetValidation();

        $this->Propertytype  = Propertytypes::find($PropertytypeId);
        $this->PropertytypeId = $this->Propertytype->id;
        $this->type_name = $this->Propertytype->type_name;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'type_name' => 'required|unique:propertytypes,type_name,' . $this->PropertytypeId,
        ], [
            'type_name.required' => 'حقل اسم النوع مطلوب',
            'type_name.unique' => 'نوع جنس العقار موجود بالفعل .. يرجى اختيار اسم آخر.',
        ]);

        $Propertytypes = Propertytypes::find($this->PropertytypeId);
        $Propertytypes->update([
            'user_id' => Auth::id(),
            'type_name' => $this->type_name,
        ]);

        $this->reset();

        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل',
        ]);
    }


    public function destroy()
    {
        $Propertytypes = Propertytypes::find($this->PropertytypeId);

        if ($Propertytypes) {
            $Propertytypes->delete();

            $this->reset();
            $this->dispatchBrowserEvent('success', [
                'message' => 'تم حذف البيانات بنجاح',
                'title' => 'الحذف'
            ]);
        }
    }
}

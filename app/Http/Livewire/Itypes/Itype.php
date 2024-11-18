<?php

namespace App\Http\Livewire\Itypes;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\Itypes\Itypes;

class Itype extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Itypes = [];
    public $ItypeSearch, $Itype, $ItypeId;
    public $user_id, $itypename, $itype, $note;


    public function render()
    {
        $ItypeSearch = '%' . $this->ItypeSearch . '%';
        $Itypes = Itypes::where('user_id', 'LIKE', $ItypeSearch)
            ->orWhere('itypename', 'LIKE', $ItypeSearch)
            ->orWhere('itype', 'LIKE', $ItypeSearch)
            ->orWhere('note', 'LIKE', $ItypeSearch)


            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Itypes;
        $this->Itypes = collect($Itypes->items());
        return view('livewire.itypes.itype', [
            'links' => $links
        ]);
    }

    public function AddItypeModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('ItypeModalShow');
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            //'user_id' => 'required',
            'itypename' => 'required',
            'itype' => 'required',
        ], [
            //'user_id.required' => 'حقل رقم المستخدم مطلوب',
            'itypename.required' => 'حقل اسم القيد مطلوب',
            'itype.required' => 'حقل نوع القيد مطلوب',
        ]);

        Itypes::create([
            //'user_id' => $this->user_id,
            'itypename' => $this->itypename,
            'itype' => $this->itype,
            'note' => $this->note,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetItype($ItypeId)
    {
        $this->resetValidation();
        $this->Itype  = Itypes::find($ItypeId);
        $this->ItypeId = $this->Itype->id;
        $this->user_id = $this->Itype->user_id;
        $this->itypename = $this->Itype->itypename;
        $this->itype = $this->Itype->itype;
        $this->note = $this->Itype->note;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            //'user_id' => 'required:itypes',
            'itypename' => 'required:itypes',
            'itype' => 'required:itypes',

        ], [
            //'user_id.required' => 'حقل رقم المستخدم مطلوب',
            'itypename.required' => 'حقل اسم القيد مطلوب',
            'itype.required' => 'حقل نوع القيد مطلوب',
        ]);

        $Itypes = Itypes::find($this->ItypeId);
        $Itypes->update([
            //'user_id' => $this->user_id,
            'itypename' => $this->itypename,
            'itype' => $this->itype,
            'note' => $this->note,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Itypes = Itypes::find($this->ItypeId);

        if ($Itypes) {

            $Itypes->delete();
            $this->reset();
            $this->dispatchBrowserEvent('success', [
                'message' => 'تم حذف البيانات بنجاح',
                'title' => 'الحذف'
            ]);
        }
    }
}

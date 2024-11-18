<?php

namespace App\Http\Livewire\Iaccts;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\Iaccts\Iaccts;

class Iacct extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Iaccts = [];
    public $IacctSearch, $Iacct, $IacctId;
    public $user_id, $iacct, $iacctname, $note;


    public function render()
    {
        $IacctSearch = '%' . $this->IacctSearch . '%';
        $Iaccts = Iaccts::where('user_id', 'LIKE', $IacctSearch)
            ->orWhere('iacct', 'LIKE', $IacctSearch)
            ->orWhere('iacctname', 'LIKE', $IacctSearch)
            ->orWhere('note', 'LIKE', $IacctSearch)


            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Iaccts;
        $this->Iaccts = collect($Iaccts->items());
        return view('livewire.iaccts.iacct', [
            'links' => $links
        ]);
    }

    public function AddIacctModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('IacctModalShow');
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            //'user_id' => 'required',
            'iacct' => 'required',
            'iacctname' => 'required',

        ], [
            //'user_id.required' => 'حقل رقم المستخدم مطلوب',
            'iacct.required' => 'حقل رقم الدليل مطلوب',
            'iacctname.required' => 'حقل اسم الدليل مطلوب',
        ]);


        Iaccts::create([
            //'user_id' => $this->user_id,
            'iacct' => $this->iacct,
            'iacctname' => $this->iacctname,
            'note' => $this->note,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetIacct($IacctId)
    {
        $this->resetValidation();

        $this->Iacct  = Iaccts::find($IacctId);
        $this->IacctId = $this->Iacct->id;
        $this->user_id = $this->Iacct->user_id;
        $this->iacct = $this->Iacct->iacct;
        $this->iacctname = $this->Iacct->iacctname;
        $this->note = $this->Iacct->note;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            //'user_id' => 'required:iaccts',
            'iacct' => 'required:iaccts',
            'iacctname' => 'required:iaccts',

        ], [
            //'user_id.required' => 'حقل رقم المستخدم مطلوب',
            'iacct.required' => 'حقل رقم الدليل مطلوب',
            'iacctname.required' => 'حقل اسم الدليل مطلوب',
        ]);

        $Iaccts = Iaccts::find($this->IacctId);
        $Iaccts->update([
            //'user_id' => $this->user_id,
            'iacct' => $this->iacct,
            'iacctname' => $this->iacctname,
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
        $Iaccts = Iaccts::find($this->IacctId);

        if ($Iaccts) {

            $Iaccts->delete();
            $this->reset();
            $this->dispatchBrowserEvent('success', [
                'message' => 'تم حذف البيانات بنجاح',
                'title' => 'الحذف'
            ]);
        }
    }
}

<?php

namespace App\Http\Livewire\Idepartments;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\Idepartments\Idepartments;

class Idepartment extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Idepartments = [];
    public $IdepartmentSearch, $Idepartment, $IdepartmentId;
    public $user_id, $idepartment, $idepartmentcname, $note;


    public function render()
    {
        $IdepartmentSearch = '%' . $this->IdepartmentSearch . '%';
        $Idepartments = Idepartments::where('idepartment', 'LIKE', $IdepartmentSearch)
            ->orWhere('idepartmentcname', 'LIKE', $IdepartmentSearch)
            ->orWhere('note', 'LIKE', $IdepartmentSearch)


            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Idepartments;
        $this->Idepartments = collect($Idepartments->items());
        return view('livewire.idepartments.idepartment', [
            'links' => $links
        ]);
    }

    public function AddIdepartmentModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('IdepartmentModalShow');
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'idepartment' => 'required',
            'idepartmentcname' => 'required',

        ], [
            'idepartment.required' => 'حقل رقم القسم مطلوب',
            'idepartmentcname.required' => 'حقل اسم القسم مطلوب',
        ]);


        Idepartments::create([
            //'user_id' => $this->user_id,
            'idepartment' => $this->idepartment,
            'idepartmentcname' => $this->idepartmentcname,
            'note' => $this->note,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetIdepartment($IdepartmentId)
    {
        $this->resetValidation();

        $this->Idepartment  = Idepartments::find($IdepartmentId);
        $this->IdepartmentId = $this->Idepartment->id;
        $this->user_id = $this->Idepartment->user_id;
        $this->idepartment = $this->Idepartment->idepartment;
        $this->idepartmentcname = $this->Idepartment->idepartmentcname;
        $this->note = $this->Idepartment->note;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'idepartment' => 'required:idepartments',
            'idepartmentcname' => 'required:idepartments',

        ], [
            'idepartment.required' => 'حقل رقم القسم مطلوب',
            'idepartmentcname.required' => 'حقل اسم القسم مطلوب',
        ]);

        $Idepartments = Idepartments::find($this->IdepartmentId);
        $Idepartments->update([
            //'user_id' => $this->user_id,
            'idepartment' => $this->idepartment,
            'idepartmentcname' => $this->idepartmentcname,
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
        $Idepartments = Idepartments::find($this->IdepartmentId);

        if ($Idepartments) {

            $Idepartments->delete();
            $this->reset();
            $this->dispatchBrowserEvent('success', [
                'message' => 'تم حذف البيانات بنجاح',
                'title' => 'الحذف'
            ]);
        }
    }
}

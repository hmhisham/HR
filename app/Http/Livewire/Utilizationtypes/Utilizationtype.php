<?php

namespace App\Http\Livewire\Utilizationtypes;

use Livewire\Component;

use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\Utilizationtypes\Utilizationtypes;

class Utilizationtype extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Utilizationtypes = [];
    public $UtilizationtypeSearch, $Utilizationtype, $UtilizationtypeId;
    public $user_id, $utilization_type, $notes;

    public $search = ['utilization_type' => '', 'notes' => ''];

    public function render()
    {
        $utilizationtypeSearch = '%' . $this->search['utilization_type'] . '%';
        $notesSearch = '%' . $this->search['notes'] . '%';

        $Utilizationtypes = Utilizationtypes::query()
            ->when($this->search['utilization_type'], function ($query) use ($utilizationtypeSearch) {
                $query->where('utilization_type', 'LIKE', $utilizationtypeSearch);
            })
            ->when($this->search['notes'], function ($query) use ($notesSearch) {
                $query->where('notes', 'LIKE', $notesSearch);
            })

            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Utilizationtypes;
        $this->Utilizationtypes = collect($Utilizationtypes->items());

        return view('livewire.utilizationtypes.utilizationtype', [
            'Utilizationtypes' => $Utilizationtypes,
            'links' => $links
        ]);
    }

    public function AddUtilizationtypeModalShow()
    {
        $this->reset(['utilization_type', 'notes']);
        $this->resetValidation();
        $this->dispatchBrowserEvent('UtilizationtypeModalShow');
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'utilization_type' => 'required|unique:utilizationtypes',

        ], [
            'utilization_type.required' => 'حقل نوع الاستغلال مطلوب',
            'utilization_type.unique' => 'حقل نوع الاستغلال موجود',
        ]);

        Utilizationtypes::create([
            'user_id' => Auth::id(),
            'utilization_type' => $this->utilization_type,
            'notes' => $this->notes,

        ]);
        $this->reset(['utilization_type', 'notes']);
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetUtilizationtype($UtilizationtypeId)
    {
        $this->resetValidation();

        $this->Utilizationtype  = Utilizationtypes::find($UtilizationtypeId);
        $this->UtilizationtypeId = $this->Utilizationtype->id;
        $this->user_id = $this->Utilizationtype->user_id;
        $this->utilization_type = $this->Utilizationtype->utilization_type;
        $this->notes = $this->Utilizationtype->notes;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'utilization_type' => 'required|unique:utilizationtypes,utilization_type,' . $this->UtilizationtypeId,

        ], [
            'utilization_type.required' => 'حقل نوع الاستغلال مطلوب',
            'utilization_type.unique' => 'حقل نوع الاستغلال موجود',
        ]);

        $Utilizationtypes = Utilizationtypes::find($this->UtilizationtypeId);
        $Utilizationtypes->update([
            'user_id' => Auth::id(),
            'utilization_type' => $this->utilization_type,
            'notes' => $this->notes,

        ]);
        $this->reset(['utilization_type', 'notes']);
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Utilizationtypes = Utilizationtypes::find($this->UtilizationtypeId);

        if ($Utilizationtypes) {

            $Utilizationtypes->delete();
            $this->reset();
            $this->dispatchBrowserEvent('success', [
                'message' => 'تم حذف البيانات بنجاح',
                'title' => 'الحذف'
            ]);
        }
    }
}

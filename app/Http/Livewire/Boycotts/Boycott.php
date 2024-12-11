<?php

namespace App\Http\Livewire\Boycotts;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\Boycotts\Boycotts;
use Illuminate\Support\Facades\Auth;

class Boycott extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Boycotts = [];
    public $BoycottSearch, $Boycott, $BoycottId;
    public $boycott_number, $boycott_name;

    public function render()
    {
        $BoycottSearch = '%' . $this->BoycottSearch . '%';
        $Boycotts = Boycotts::where('boycott_number', 'LIKE', $BoycottSearch)
            ->orWhere('boycott_name', 'LIKE', $BoycottSearch)
            ->orderBy('id', 'ASC')
            ->paginate(10);

        $links = $Boycotts;
        $this->Boycotts = collect($Boycotts->items());
        return view('livewire.boycotts.boycott', [
            'links' => $links
        ]);
    }

    public function AddBoycottModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('BoycottModalShow');
    }

    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'boycott_number' => 'required|unique:boycotts,boycott_number',
            'boycott_name' => 'required|unique:boycotts,boycott_name',
        ], [
            'boycott_number.required' => 'حقل رقم المقاطعة مطلوب',
            'boycott_number.unique' => 'رقم المقاطعة موجود',
            'boycott_name.required' => 'حقل اسم المقاطعة مطلوب',
            'boycott_name.unique' => 'اسم المقاطعة موجود',
        ]);

        Boycotts::create([
            'user_id' => Auth::id(),
            'boycott_number' => $this->boycott_number,
            'boycott_name' => $this->boycott_name,
        ]);

        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetBoycott($BoycottId)
    {
        $this->resetValidation();

        $this->Boycott  = Boycotts::find($BoycottId);
        $this->BoycottId = $this->Boycott->id;
        $this->boycott_number = $this->Boycott->boycott_number;
        $this->boycott_name = $this->Boycott->boycott_name;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'boycott_number' => 'required|unique:boycotts,boycott_number,'.$this->BoycottId.',id',
            'boycott_name' => 'required|unique:boycotts,boycott_name,'.$this->BoycottId.',id',
        ], [
            'boycott_number.required' => 'حقل رقم المقاطعة مطلوب',
            'boycott_number.unique' => 'رقم المقاطعة موجود',
            'boycott_name.required' => 'حقل اسم المقاطعة مطلوب',
            'boycott_name.unique' => 'اسم المقاطعة موجود',
        ]);

        $Boycotts = Boycotts::find($this->BoycottId);
        $Boycotts->update([
            'user_id' => Auth::id(),
            'boycott_number' => $this->boycott_number,
            'boycott_name' => $this->boycott_name,
        ]);

        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Boycotts = Boycotts::find($this->BoycottId);

        if ($Boycotts) {
            $Boycotts->delete();
            $this->reset();
            $this->dispatchBrowserEvent('success', [
                'message' => 'تم حذف البيانات بنجاح',
                'title' => 'الحذف'
            ]);
        }
    }
}

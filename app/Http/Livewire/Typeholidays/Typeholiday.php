<?php

namespace App\Http\Livewire\Typeholidays;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Typeholidays\Typeholidays;

class Typeholiday extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Typeholidays = [];
    public $TypeholidaySearch, $Typeholiday, $TypeholidayId;
    public $typeholidays_name;


    public function render()
    {
        $TypeholidaySearch = '%' . $this->TypeholidaySearch . '%';
        $Typeholidays = Typeholidays::where('typeholidays_name', 'LIKE', $TypeholidaySearch)
            ->orderBy('id', 'ASC')
            ->paginate(10);
            
        $links = $Typeholidays;
        $this->Typeholidays = collect($Typeholidays->items());
        return view('livewire.typeholidays.typeholiday', [
            'links' => $links
        ]);
    }

    public function AddTypeholidayModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('TypeholidayModalShow');
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'typeholidays_name' => 'required|unique:typeholidays',


        ], [
            'typeholidays_name.required' => 'حقل نوع الاجازة مطلوب',
            'typeholidays_name.unique' => 'نوع الاجازة موجود',
        ]);

        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);
        Typeholidays::create([
            'typeholidays_name' => $this->typeholidays_name,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetTypeholiday($TypeholidayId)
    {
        $this->resetValidation();

        $this->Typeholiday  = Typeholidays::find($TypeholidayId);
        $this->TypeholidayId = $this->Typeholiday->id;
        $this->typeholidays_name = $this->Typeholiday->typeholidays_name;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'typeholidays_name' => 'required|unique:typeholidays,typeholidays_name,'.$this->Typeholiday->id.',id',

        ], [
            'typeholidays_name.required' => 'حقل نوع الاجازة مطلوب',
            'typeholidays_name.unique' => 'نوع الاجازة موجود',
        ]);

        $Typeholidays = Typeholidays::find($this->TypeholidayId);
        $Typeholidays->update([
            'typeholidays_name' => $this->typeholidays_name,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Typeholidays = Typeholidays::find($this->TypeholidayId);
        $Typeholidays->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات  بنجاح',
            'title' => 'الحذف '
        ]);
    }
}

<?php

namespace App\Http\Livewire\Thanks;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Thanks\Thanks;
use Illuminate\Support\Facades\Auth;
use App\Models\Workers\Workers;

class Thank extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Thanks = [];
    public $ThankSearch, $Thank, $ThankId;
    public $user_id, $grantor, $ministerial_order_number, $ministerial_order_date, $reason, $notes;
    public $months_of_service = 1;

    public $search = '';
    public $workers = [];
    public $worker, $calculator_number;
    public $selectedWorker = null;

<<<<<<< HEAD
=======
    protected $listeners = [
        'SelectWorker',
    ];

    public function hydrate()
    {
        $this->emit('select2');
    }
>>>>>>> 60f1817e0d5f85c2c8d0e798760d2cc377818523

    public function mount()
    {
        $this->workers = Workers::all();
    }

    public function render()
    {
        $ThankSearch = '%' . $this->ThankSearch . '%';
        $Thanks = Thanks::where('user_id', 'LIKE', $ThankSearch)
            ->orWhere('grantor', 'LIKE', $ThankSearch)
            ->orWhere('ministerial_order_number', 'LIKE', $ThankSearch)
            ->orWhere('ministerial_order_date', 'LIKE', $ThankSearch)
            ->orWhere('reason', 'LIKE', $ThankSearch)
            ->orWhere('months_of_service', 'LIKE', $ThankSearch)
            ->orWhere('notes', 'LIKE', $ThankSearch)
            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Thanks;
        $this->Thanks = collect($Thanks->items());

        return view('livewire.thanks.thank', [
            'links' => $links
        ]);
    }

    public function SelectWorker($workerID)
    {
        $this->worker = $workerID;
        $this->calculator_number = Workers::find($workerID)->first()->calculator_number;
    }

    public function AddThankModalShow()
    {
        //$this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('ThankModalShow');
    }

    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'grantor' => 'required',
            'ministerial_order_number' => 'required',
            'ministerial_order_date' => 'required',
            'reason' => 'required',
            'months_of_service' => 'required',
            'notes' => 'required',
        ], [
            'grantor.required' => 'حقل الاسم مطلوب',
            'ministerial_order_number.required' => 'حقل الاسم مطلوب',
            'ministerial_order_date.required' => 'حقل الاسم مطلوب',
            'reason.required' => 'حقل الاسم مطلوب',
            'months_of_service.required' => 'حقل الاسم مطلوب',
            'notes.required' => 'حقل الاسم مطلوب',
        ]);

        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);
        Thanks::create([
            'user_id' => Auth::id(),
            'grantor' => $this->grantor,
            'ministerial_order_number' => $this->ministerial_order_number,
            'ministerial_order_date' => $this->ministerial_order_date,
            'reason' => $this->reason,
            'months_of_service' => $this->months_of_service,
            'notes' => $this->notes,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetThank($ThankId)
    {
        $this->resetValidation();

        $this->Thank  = Thanks::find($ThankId);
        $this->ThankId = $this->Thank->id;
        $this->user_id = $this->Thank->user_id;
        $this->grantor = $this->Thank->grantor;
        $this->ministerial_order_number = $this->Thank->ministerial_order_number;
        $this->ministerial_order_date = $this->Thank->ministerial_order_date;
        $this->reason = $this->Thank->reason;
        $this->months_of_service = $this->Thank->months_of_service;
        $this->notes = $this->Thank->notes;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'user_id' => 'required:thanks',
            'grantor' => 'required:thanks',
            'ministerial_order_number' => 'required:thanks',
            'ministerial_order_date' => 'required:thanks',
            'reason' => 'required:thanks',
            'months_of_service' => 'required:thanks',
            'notes' => 'required:thanks',

        ], [
            'user_id.required' => 'حقل الاسم مطلوب',
            'grantor.required' => 'حقل الاسم مطلوب',
            'ministerial_order_number.required' => 'حقل الاسم مطلوب',
            'ministerial_order_date.required' => 'حقل الاسم مطلوب',
            'reason.required' => 'حقل الاسم مطلوب',
            'months_of_service.required' => 'حقل الاسم مطلوب',
            'notes.required' => 'حقل الاسم مطلوب',
        ]);

        $Thanks = Thanks::find($this->ThankId);
        $Thanks->update([
            'user_id' => $this->user_id,
            'grantor' => $this->grantor,
            'ministerial_order_number' => $this->ministerial_order_number,
            'ministerial_order_date' => $this->ministerial_order_date,
            'reason' => $this->reason,
            'months_of_service' => $this->months_of_service,
            'notes' => $this->notes,
        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Thanks = Thanks::find($this->ThankId);
        $Thanks->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات  بنجاح',
            'title' => 'الحذف '
        ]);
    }
}

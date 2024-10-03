<?php

namespace App\Http\Livewire\Penalties;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Workers\Workers;
use App\Models\Penalties\Penalties;
use Illuminate\Support\Facades\Auth;
use App\Models\Department\Department;

class Penaltie extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Penalties = [];
    public $PenaltieSearch, $Penaltie, $PenaltieId;
    public $user_id, $p_reason, $p_issuing_authority, $p_ministerial_order_number, $p_ministerial_order_date, $p_penalty_type,$duration_of_delay, $p_notes;

    public $department= [];
    public $search = '';
    public $workers = [];
    public $worker, $calculator_number, $get_departmen, $full_name;
    public $selectedWorker = null;


    protected $listeners = [
        'SelectWorker',
        'Selectauthority',
    ];

    public function hydrate()
    {
        $this->emit('select2');
        $this->emit('flatpickr');
    }


    public function mount()
    {
        $this->workers = Workers::all();
        $this->department = Department::all();
    }

    public function Selectauthority($p_issuing_authorityID)
    {
        $p_issuing_authority = Department::find($p_issuing_authorityID);
         if ($p_issuing_authority) {
            $this->p_issuing_authority = $p_issuing_authorityID;
              } else {
            $this->p_issuing_authority = null;
        }
    }


    public function SelectWorker($workerID)
    {

        $worker = Workers::find($workerID);


        if ($worker) {
            $this->worker = $workerID;
            $this->calculator_number = $worker->calculator_number;
            $this->get_departmen = $worker->department;
        } else {
            $this->worker = null;
            $this->calculator_number = null;
            $this->get_departmen = null;
        }
    }



    public function render()
    {
        $PenaltieSearch = '%' . $this->PenaltieSearch . '%';
        $Penalties = Penalties::join('workers', 'penalties.calculator_number', '=', 'workers.calculator_number')
            ->where(function ($query) use ($PenaltieSearch) {
                $query->where('penalties.calculator_number', 'LIKE', $PenaltieSearch)
                    ->orWhere('workers.full_name', 'LIKE', $PenaltieSearch);
            })
            ->orderBy('penalties.id', 'ASC')
            ->select('penalties.*')
            ->paginate(10);



        $links = $Penalties;
        $this->Penalties = collect($Penalties->items());
        return view('livewire.penalties.penaltie', [
            'links' => $links
        ]);
    }

    public function AddPenaltieModalShow()
    {
        $this->reset(['get_departmen','user_id','calculator_number','p_reason','p_issuing_authority','p_ministerial_order_number','p_ministerial_order_date','p_penalty_type','p_notes','duration_of_delay']);
        $this->resetValidation();
        $this->dispatchBrowserEvent('PenaltieModalShow');
    }


    public function store()
    {

        $this->resetValidation();
        $this->validate([


            'calculator_number' => 'required',
            'p_reason' => 'required',
            'p_issuing_authority' => 'required',
            'p_ministerial_order_number' => 'required',
            'p_ministerial_order_date' => 'required',
            'p_penalty_type' => 'required',
            'duration_of_delay' => 'required',


        ], [

            'calculator_number.required' => 'حقل الاسم مطلوب',
            'p_reason.required' => 'حقل الاسم مطلوب',
            'p_issuing_authority.required' => 'حقل الاسم مطلوب',
            'p_ministerial_order_number.required' => 'حقل الاسم مطلوب',
            'p_ministerial_order_date.required' => 'حقل الاسم مطلوب',
            'p_penalty_type.required' => 'حقل الاسم مطلوب',
            'duration_of_delay.required' => 'حقل الاسم مطلوب',

        ]);


        Penalties::create([
            'user_id' => Auth::id(),

            'calculator_number' => $this->calculator_number,
            'p_reason' => $this->p_reason,
            'p_issuing_authority' => $this->p_issuing_authority,
            'p_ministerial_order_number' => $this->p_ministerial_order_number,
            'p_ministerial_order_date' => $this->p_ministerial_order_date,
            'p_penalty_type' => $this->p_penalty_type,
            'duration_of_delay' => $this->duration_of_delay,
            'p_notes' => $this->p_notes,
        ]);
        $this->reset(['get_departmen','user_id','calculator_number','p_reason','p_issuing_authority','p_ministerial_order_number','p_ministerial_order_date','p_penalty_type','p_notes','duration_of_delay']);
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetPenaltie($PenaltieId)
    {
        $this->resetValidation();
        $this->Penaltie = Penalties::find($PenaltieId);
        $worker = $this->Penaltie->worker;
        $this->PenaltieId = $this->Penaltie->id;
        $this->user_id = $this->Penaltie->user_id;
        $this->calculator_number = $this->Penaltie->calculator_number;
        $this->p_reason = $this->Penaltie->p_reason;
        $this->p_issuing_authority = $this->Penaltie->p_issuing_authority;
        $this->p_ministerial_order_number = $this->Penaltie->p_ministerial_order_number;
        $this->p_ministerial_order_date = $this->Penaltie->p_ministerial_order_date;
        $this->p_penalty_type = $this->Penaltie->p_penalty_type;
        $this->duration_of_delay = $this->Penaltie->duration_of_delay;
        $this->p_notes = $this->Penaltie->p_notes;
        if ($worker) {
            $this->full_name = $worker->full_name;
            $this->get_departmen = $worker->get_departmen;
        } else {

            $this->full_name = 'N/A';
            $this->get_departmen = 'N/A';
        }
    }


    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'calculator_number' => 'required:penalties',
            'p_reason' => 'required:penalties',
            'p_issuing_authority' => 'required:penalties',
            'p_ministerial_order_number' => 'required:penalties',
            'p_ministerial_order_date' => 'required:penalties',
            'p_penalty_type' => 'required:penalties',
            'duration_of_delay' => 'required:penalties',
        ], [
            'calculator_number.required' => 'حقل الاسم مطلوب',
            'p_reason.required' => 'حقل الاسم مطلوب',
            'p_issuing_authority.required' => 'حقل الاسم مطلوب',
            'p_ministerial_order_number.required' => 'حقل الاسم مطلوب',
            'p_ministerial_order_date.required' => 'حقل الاسم مطلوب',
            'p_penalty_type.required' => 'حقل الاسم مطلوب',
            'duration_of_delay.required' => 'حقل الاسم مطلوب',
        ]);

        $Penalties = Penalties::find($this->PenaltieId);
        $Penalties->update([
            'user_id' => Auth::id(),
            'calculator_number' => $this->calculator_number,
            'p_reason' => $this->p_reason,
            'p_issuing_authority' => $this->p_issuing_authority,
            'p_ministerial_order_number' => $this->p_ministerial_order_number,
            'p_ministerial_order_date' => $this->p_ministerial_order_date,
            'p_penalty_type' => $this->p_penalty_type,
            'duration_of_delay' => $this->duration_of_delay,
            'p_notes' => $this->p_notes,
        ]);
        $this->reset(['get_departmen','user_id','calculator_number','p_reason','p_issuing_authority','p_ministerial_order_number','p_ministerial_order_date','p_penalty_type','p_notes','duration_of_delay']);
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Penalties = Penalties::find($this->PenaltieId);
        $Penalties->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات  بنجاح',
            'title' => 'الحذف '
        ]);
    }
}

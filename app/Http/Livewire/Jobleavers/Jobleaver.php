<?php

namespace App\Http\Livewire\Jobleavers;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Workers\Workers;
use Illuminate\Support\Facades\Auth;
use App\Models\Jobleavers\Jobleavers;

class Jobleaver extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Jobleavers = [];
    public $JobleaverSearch, $Jobleaver, $JobleaverId;
    public $user_id, $job_leaving_type, $issuing_authority, $appointment_date, $disconnection_date, $return_date, $disconnection_duration, $ministerial_order_number, $ministerial_order_date, $added_service_letter_number, $added_service_letter_date, $notes, $added_service;


    public $search = '';
    public $workers = [];
    public $worker, $calculator_number, $department, $full_name;
    public $selectedWorker = null;


    protected $listeners = [
        'SelectWorker',
    ];

    public function hydrate()
    {
        $this->emit('select2');
    }


    public function mount()
    {
        $this->workers = Workers::all();
    }

    public function SelectWorker($workerID)
    {

        $worker = Workers::find($workerID);


        if ($worker) {
            $this->worker = $workerID;
            $this->calculator_number = $worker->calculator_number;
            $this->department = $worker->department;
        } else {
            $this->worker = null;
            $this->calculator_number = null;
            $this->department = null;
        }
    }



    public function render()
    {
        $JobleaverSearch = '%' . $this->JobleaverSearch . '%';
        $Jobleavers = Jobleavers::join('workers', 'jobleavers.calculator_number', '=', 'workers.calculator_number')
            ->where(function ($query) use ($JobleaverSearch) {
                $query->where('jobleavers.calculator_number', 'LIKE', $JobleaverSearch)
                    ->orWhere('workers.full_name', 'LIKE', $JobleaverSearch);
            })
            ->orderBy('jobleavers.id', 'ASC')
            ->select('jobleavers.*')
            ->paginate(10);
        $links = $Jobleavers;
        $this->Jobleavers = collect($Jobleavers->items());
        return view('livewire.jobleavers.jobleaver', [
            'links' => $links
        ]);
    }



    public function AddJobleaverModalShow()
    {
        $this->reset(['department', 'user_id', 'added_service', 'calculator_number', 'job_leaving_type', 'issuing_authority', 'appointment_date', 'disconnection_date', 'return_date', 'disconnection_duration', 'ministerial_order_number', 'ministerial_order_date', 'added_service_letter_number', 'added_service_letter_date', 'notes']);
        $this->resetValidation();
        $this->dispatchBrowserEvent('JobleaverModalShow');
    }


    public function store()
    {

        $this->resetValidation();
        $this->validate([

            'calculator_number' => 'required',
            'job_leaving_type' => 'required',
            'issuing_authority' => 'required',
            'appointment_date' => 'required',
            'disconnection_date' => 'required',
            'return_date' => 'required',
            'disconnection_duration' => 'required',
            'ministerial_order_number' => 'required',
            'ministerial_order_date' => 'required',
            'added_service_letter_number' => 'required',
            'added_service_letter_date' => 'required',
            'added_service' => 'required',

        ], [

            'calculator_number.required' => 'حقل الاسم مطلوب',
            'job_leaving_type.required' => 'حقل الاسم مطلوب',
            'issuing_authority.required' => 'حقل الاسم مطلوب',
            'appointment_date.required' => 'حقل الاسم مطلوب',
            'disconnection_date.required' => 'حقل الاسم مطلوب',
            'return_date.required' => 'حقل الاسم مطلوب',
            'disconnection_duration.required' => 'حقل الاسم مطلوب',
            'ministerial_order_number.required' => 'حقل الاسم مطلوب',
            'ministerial_order_date.required' => 'حقل الاسم مطلوب',
            'added_service_letter_number.required' => 'حقل الاسم مطلوب',
            'added_service_letter_date.required' => 'حقل الاسم مطلوب',
            'added_service' => 'حقل الاسم مطلوب',
        ]);

        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);
        Jobleavers::create([
            'user_id' => Auth::id(),
            'calculator_number' => $this->calculator_number,
            'job_leaving_type' => $this->job_leaving_type,
            'issuing_authority' => $this->issuing_authority,
            'appointment_date' => $this->appointment_date,
            'disconnection_date' => $this->disconnection_date,
            'return_date' => $this->return_date,
            'added_service' => $this->added_service,
            'disconnection_duration' => $this->disconnection_duration,
            'ministerial_order_number' => $this->ministerial_order_number,
            'ministerial_order_date' => $this->ministerial_order_date,
            'added_service_letter_number' => $this->added_service_letter_number,
            'added_service_letter_date' => $this->added_service_letter_date,
            'notes' => $this->notes,

        ]);
        $this->reset(['department', 'user_id', 'added_service', 'calculator_number', 'job_leaving_type', 'issuing_authority', 'appointment_date', 'disconnection_date', 'return_date', 'disconnection_duration', 'ministerial_order_number', 'ministerial_order_date', 'added_service_letter_number', 'added_service_letter_date', 'notes']);
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }
    public function GetJobleaver($JobleaverId)
    {
        $this->resetValidation();
        $this->Jobleaver  = Jobleavers::find($JobleaverId);
        $this->JobleaverId = $this->Jobleaver->id;
        $this->user_id = $this->Jobleaver->user_id;
        $this->calculator_number = $this->Jobleaver->calculator_number;
        $this->job_leaving_type = $this->Jobleaver->job_leaving_type;
        $this->issuing_authority = $this->Jobleaver->issuing_authority;
        $this->appointment_date = $this->Jobleaver->appointment_date;
        $this->disconnection_date = $this->Jobleaver->disconnection_date;
        $this->return_date = $this->Jobleaver->return_date;
        $this->disconnection_duration = $this->Jobleaver->disconnection_duration;
        $this->ministerial_order_number = $this->Jobleaver->ministerial_order_number;
        $this->ministerial_order_date = $this->Jobleaver->ministerial_order_date;
        $this->added_service_letter_number = $this->Jobleaver->added_service_letter_number;
        $this->added_service_letter_date = $this->Jobleaver->added_service_letter_date;
        $this->notes = $this->Jobleaver->notes;
        $this->added_service = $this->Jobleaver->added_service;

        $worker = $this->Jobleaver->worker;
        if ($worker) {
            $this->full_name = $worker->full_name;
            $this->department = $worker->department;
        } else {
            $this->full_name = 'N/A';
            $this->department = 'N/A';
        }
    }


    public function update()
    {
        $this->resetValidation();
        $this->validate([

            'calculator_number' => 'required:jobleavers',
            'job_leaving_type' => 'required:jobleavers',
            'issuing_authority' => 'required:jobleavers',
            'appointment_date' => 'required:jobleavers',
            'disconnection_date' => 'required:jobleavers',
            'return_date' => 'required:jobleavers',
            'disconnection_duration' => 'required:jobleavers',
            'ministerial_order_number' => 'required:jobleavers',
            'ministerial_order_date' => 'required:jobleavers',
            'added_service_letter_number' => 'required:jobleavers',
            'added_service_letter_date' => 'required:jobleavers',
            'added_service' => 'required:jobleavers',

        ], [

            'calculator_number.required' => 'حقل الاسم مطلوب',
            'job_leaving_type.required' => 'حقل الاسم مطلوب',
            'issuing_authority.required' => 'حقل الاسم مطلوب',
            'appointment_date.required' => 'حقل الاسم مطلوب',
            'disconnection_date.required' => 'حقل الاسم مطلوب',
            'return_date.required' => 'حقل الاسم مطلوب',
            'disconnection_duration.required' => 'حقل الاسم مطلوب',
            'ministerial_order_number.required' => 'حقل الاسم مطلوب',
            'ministerial_order_date.required' => 'حقل الاسم مطلوب',
            'added_service_letter_number.required' => 'حقل الاسم مطلوب',
            'added_service_letter_date.required' => 'حقل الاسم مطلوب',
            'added_service.required' => 'حقل الاسم مطلوب',
        ]);

        $Jobleavers = Jobleavers::find($this->JobleaverId);
        $Jobleavers->update([
            'user_id' => Auth::id(),
            'calculator_number' => $this->calculator_number,
            'job_leaving_type' => $this->job_leaving_type,
            'issuing_authority' => $this->issuing_authority,
            'appointment_date' => $this->appointment_date,
            'disconnection_date' => $this->disconnection_date,
            'return_date' => $this->return_date,
            'disconnection_duration' => $this->disconnection_duration,
            'ministerial_order_number' => $this->ministerial_order_number,
            'ministerial_order_date' => $this->ministerial_order_date,
            'added_service' => $this->added_service,
            'added_service_letter_number' => $this->added_service_letter_number,
            'added_service_letter_date' => $this->added_service_letter_date,
            'notes' => $this->notes,

        ]);
        $this->reset(['department', 'user_id', 'added_service', 'calculator_number', 'job_leaving_type', 'issuing_authority', 'appointment_date', 'disconnection_date', 'return_date', 'disconnection_duration', 'ministerial_order_number', 'ministerial_order_date', 'added_service_letter_number', 'added_service_letter_date', 'notes']);
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Jobleavers = Jobleavers::find($this->JobleaverId);
        $Jobleavers->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات  بنجاح',
            'title' => 'الحذف '
        ]);
    }
}

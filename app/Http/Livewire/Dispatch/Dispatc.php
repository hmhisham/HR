<?php

namespace App\Http\Livewire\Dispatch;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Workers\Workers;
use App\Models\Dispatch\Dispatch;
use Illuminate\Support\Facades\Auth;

class Dispatc extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Dispatch = [];
    public $dispatcSearch, $dispatc, $dispatcId;
    public $user_id, $calculator_number, $country_status, $dispatch_subject, $funding_agency, $dispatch_location, $resident_agency, $travel_date, $travel_days, $actual_dispatch_days, $start_date, $ministerial_order_number, $ministerial_order_date, $notes;


    public $search = '';
    public $workers = [];
    public $worker, $department, $full_name;
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
        $DispatchSearch = '%' . $this->dispatcSearch . '%';
        $Dispatch = Dispatch::join('workers', 'dispatch.calculator_number', '=', 'workers.calculator_number')
            ->where(function ($query) use ($DispatchSearch) {
                $query->where('dispatch.calculator_number', 'LIKE', $DispatchSearch)
                    ->orWhere('workers.full_name', 'LIKE', $DispatchSearch);
            })
            ->orderBy('dispatch.id', 'ASC')
           ->select('dispatch.*')
           ->paginate(10);
        $links = $Dispatch;
        $this->Dispatch = collect($Dispatch->items());
        return view('livewire.dispatch.dispatc', [
            'links' => $links
        ]);
    }



    public function AdddispatcModalShow()
    {

        $this->resetValidation();
        $this->dispatchBrowserEvent('dispatcModalShow');
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([

            'calculator_number' => 'required',
            'country_status' => 'required',
            'dispatch_subject' => 'required',
            'funding_agency' => 'required',
            'dispatch_location' => 'required',
            'resident_agency' => 'required',
            'travel_date' => 'required',
            'travel_days' => 'required',
            'actual_dispatch_days' => 'required',
            'start_date' => 'required',
            'ministerial_order_number' => 'required',
            'ministerial_order_date' => 'required',


        ], [

            'calculator_number.required' => 'حقل رقم الحاسبة مطلوب',
            'country_status.required' => 'حقل الاسم مطلوب',
            'dispatch_subject.required' => 'حقل الاسم مطلوب',
            'funding_agency.required' => 'حقل الاسم مطلوب',
            'dispatch_location.required' => 'حقل الاسم مطلوب',
            'resident_agency.required' => 'حقل الاسم مطلوب',
            'travel_date.required' => 'حقل الاسم مطلوب',
            'travel_days.required' => 'حقل الاسم مطلوب',
            'actual_dispatch_days.required' => 'حقل الاسم مطلوب',
            'start_date.required' => 'حقل الاسم مطلوب',
            'ministerial_order_number.required' => 'حقل الاسم مطلوب',
            'ministerial_order_date.required' => 'حقل الاسم مطلوب',

        ]);

        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);
        Dispatch::create([
            'user_id' => Auth::id(),
            'calculator_number' => $this->calculator_number,
            'country_status' => $this->country_status,
            'dispatch_subject' => $this->dispatch_subject,
            'funding_agency' => $this->funding_agency,
            'dispatch_location' => $this->dispatch_location,
            'resident_agency' => $this->resident_agency,
            'travel_date' => $this->travel_date,
            'travel_days' => $this->travel_days,
            'actual_dispatch_days' => $this->actual_dispatch_days,
            'start_date' => $this->start_date,
            'ministerial_order_number' => $this->ministerial_order_number,
            'ministerial_order_date' => $this->ministerial_order_date,
            'notes' => $this->notes,

        ]);
        $this->reset(['department','user_id','calculator_number','country_status','dispatch_subject','funding_agency','dispatch_location','resident_agency','travel_date','travel_days','actual_dispatch_days','start_date','ministerial_order_number','ministerial_order_date','notes']);
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function Getdispatc($dispatcId)
    {
        $this->resetValidation();
        $this->dispatc  = Dispatch::find($dispatcId);
        $this->dispatcId = $this->dispatc->id;
        $this->user_id = $this->dispatc->user_id;
        $this->calculator_number = $this->dispatc->calculator_number;
        $this->country_status = $this->dispatc->country_status;
        $this->dispatch_subject = $this->dispatc->dispatch_subject;
        $this->funding_agency = $this->dispatc->funding_agency;
        $this->dispatch_location = $this->dispatc->dispatch_location;
        $this->resident_agency = $this->dispatc->resident_agency;
        $this->travel_date = $this->dispatc->travel_date;
        $this->travel_days = $this->dispatc->travel_days;
        $this->actual_dispatch_days = $this->dispatc->actual_dispatch_days;
        $this->start_date = $this->dispatc->start_date;
        $this->ministerial_order_number = $this->dispatc->ministerial_order_number;
        $this->ministerial_order_date = $this->dispatc->ministerial_order_date;
        $this->notes = $this->dispatc->notes;

         $worker = $this->dispatc->worker;
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

            'calculator_number' => 'required:dispatch',
            'country_status' => 'required:dispatch',
            'dispatch_subject' => 'required:dispatch',
            'funding_agency' => 'required:dispatch',
            'dispatch_location' => 'required:dispatch',
            'resident_agency' => 'required:dispatch',
            'travel_date' => 'required:dispatch',
            'travel_days' => 'required:dispatch',
            'actual_dispatch_days' => 'required:dispatch',
            'start_date' => 'required:dispatch',
            'ministerial_order_number' => 'required:dispatch',
            'ministerial_order_date' => 'required:dispatch',


        ], [

            'calculator_number.required' => 'حقل الاسم مطلوب',
            'country_status.required' => 'حقل الاسم مطلوب',
            'dispatch_subject.required' => 'حقل الاسم مطلوب',
            'funding_agency.required' => 'حقل الاسم مطلوب',
            'dispatch_location.required' => 'حقل الاسم مطلوب',
            'resident_agency.required' => 'حقل الاسم مطلوب',
            'travel_date.required' => 'حقل الاسم مطلوب',
            'travel_days.required' => 'حقل الاسم مطلوب',
            'actual_dispatch_days.required' => 'حقل الاسم مطلوب',
            'start_date.required' => 'حقل الاسم مطلوب',
            'ministerial_order_number.required' => 'حقل الاسم مطلوب',
            'ministerial_order_date.required' => 'حقل الاسم مطلوب',

        ]);

        $Dispatch = Dispatch::find($this->dispatcId);
        $Dispatch->update([
            'user_id' => Auth::id(),
            'calculator_number' => $this->calculator_number,
            'country_status' => $this->country_status,
            'dispatch_subject' => $this->dispatch_subject,
            'funding_agency' => $this->funding_agency,
            'dispatch_location' => $this->dispatch_location,
            'resident_agency' => $this->resident_agency,
            'travel_date' => $this->travel_date,
            'travel_days' => $this->travel_days,
            'actual_dispatch_days' => $this->actual_dispatch_days,
            'start_date' => $this->start_date,
            'ministerial_order_number' => $this->ministerial_order_number,
            'ministerial_order_date' => $this->ministerial_order_date,
            'notes' => $this->notes,

        ]);
        $this->reset(['department','user_id','calculator_number','country_status','dispatch_subject','funding_agency','dispatch_location','resident_agency','travel_date','travel_days','actual_dispatch_days','start_date','ministerial_order_number','ministerial_order_date','notes']);
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Dispatch = Dispatch::find($this->dispatcId);
        $Dispatch->delete();
        $this->reset(['department','user_id','calculator_number','country_status','dispatch_subject','funding_agency','dispatch_location','resident_agency','travel_date','travel_days','actual_dispatch_days','start_date','ministerial_order_number','ministerial_order_date','notes']);

        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات  بنجاح',
            'title' => 'الحذف '
        ]);
    }
}

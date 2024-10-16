<?php

namespace App\Http\Livewire\Thanks;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Thanks\Thanks;
use App\Models\Workers\Workers;
use Illuminate\Support\Facades\Auth;
use App\Models\Department\Department;

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
    public $department= [];
    public $worker,$thank, $calculator_number, $get_departmen, $full_name   ;
    public $selectedWorker = null;


    protected $listeners = [
        'SelectWorker',
        'SelectGrantor',
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


    public function SelectGrantor($GrantorID)
    {
        $grantor = Department::find($GrantorID);
         if ($grantor) {
            $this->grantor = $GrantorID;
              } else {
            $this->grantor = null;
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
        $ThankSearch = '%' . $this->ThankSearch . '%';
        $Thanks = Thanks::join('workers', 'thanks.calculator_number', '=', 'workers.calculator_number')
            ->where(function ($query) use ($ThankSearch) {
                $query->where('thanks.calculator_number', 'LIKE', $ThankSearch)
                    ->orWhere('workers.full_name', 'LIKE', $ThankSearch);
            })
            ->orderBy('thanks.id', 'ASC')
            ->select('thanks.*')
            ->paginate(10);

        $links = $Thanks;
        $this->Thanks = collect($Thanks->items());

        return view('livewire.thanks.thank', [
            'links' => $links
        ]);
    }


    public function AddThankModalShow()
    {
       $this->reset(['get_departmen','user_id','calculator_number','grantor','ministerial_order_number','ministerial_order_date','reason','months_of_service','notes']);
        $this->resetValidation();
        $this->dispatchBrowserEvent('ThankModalShow');
    }

    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'user_id' => 'required',
            'grantor' => 'required',
            'reason' => 'required',
            'ministerial_order_number' => 'required',
            'ministerial_order_date' => 'required',
            'months_of_service' => 'required',

        ], [
            'user_id.required' => 'حقل اسم الموظف مطلوب',
            'grantor.required' => 'حقل الجهة المانحة مطلوب',
            'reason.required' => 'حقل السبب من الشكر مطلوب',
            'ministerial_order_number.required' => 'حقل رقم الامر الوزاري مطلوب',
            'ministerial_order_date.required' => 'حقل تاريخ الامر الوزاري مطلوب',
            'months_of_service.required' => 'حقل مدة القدم مطلوب',

        ]);


        Thanks::create([
            'user_id' => Auth::id(),
            'calculator_number' => $this->calculator_number,
            'grantor' => $this->grantor,
            'ministerial_order_number' => $this->ministerial_order_number,
            'ministerial_order_date' => $this->ministerial_order_date,
            'reason' => $this->reason,
            'months_of_service' => $this->months_of_service,
            'notes' => $this->notes,

        ]);
        $this->reset(['get_departmen','user_id','calculator_number','grantor','ministerial_order_number','ministerial_order_date','reason','months_of_service','notes']);
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetThank($ThankId)
    {
        $this->resetValidation();

        // جلب بيانات الـ Thank باستخدام الـ ThankId
        $this->Thank  = Thanks::find($ThankId);
        $this->ThankId = $this->Thank->id;
        $this->user_id = $this->Thank->user_id;

        $this->grantor = $this->Thank->grantor;
        $this->ministerial_order_number = $this->Thank->ministerial_order_number;
        $this->ministerial_order_date = $this->Thank->ministerial_order_date;
        $this->reason = $this->Thank->reason;
        $this->months_of_service = $this->Thank->months_of_service;
        $this->calculator_number = $this->Thank->calculator_number;


        $worker = $this->Thank->worker;
        if ($worker) {
            $this->full_name = $worker->full_name;
            $this->get_departmen = $worker->get_departmen;
        } else {
            $this->full_name = '';
            $this->get_departmen = '';
        }

    }


    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'user_id' => 'required:thanks',
            'grantor' => 'required:thanks',
            'reason' => 'required:thanks',
            'ministerial_order_number' => 'required:thanks',
            'ministerial_order_date' => 'required:thanks',
            'months_of_service' => 'required:thanks',
        ], [
            'user_id.required' => 'حقل اسم الموظف مطلوب',
            'grantor.required' => 'حقل الجهة المانحة مطلوب',
            'reason.required' => 'حقل السبب من الشكر مطلوب',
            'ministerial_order_number.required' => 'حقل رقم الامر الوزاري مطلوب',
            'ministerial_order_date.required' => 'حقل تاريخ الامر الوزاري مطلوب',
            'months_of_service.required' => 'حقل مدة القدم مطلوب',
        ]);

        $Thanks = Thanks::find($this->ThankId);
        $Thanks->update([
            'user_id' => Auth::id(),
            'calculator_number' => $this->calculator_number,
            'grantor' => $this->grantor,
            'ministerial_order_number' => $this->ministerial_order_number,
            'ministerial_order_date' => $this->ministerial_order_date,
            'reason' => $this->reason,
            'months_of_service' => $this->months_of_service,
            'notes' => $this->notes,
        ]);
        $this->reset(['get_departmen','user_id','calculator_number','grantor','ministerial_order_number','ministerial_order_date','reason','months_of_service','notes']);
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

<?php

namespace App\Http\Livewire\Property;

use Livewire\Component;

use App\Models\Bonds\Bonds;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use App\Models\Workers\Workers;
use App\Models\Property\Property;
use Illuminate\Support\Facades\Auth;

class Propert extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Property = [];
    public $PropertSearch, $Propert, $PropertId;
    public $user_id, $worker_id, $bonds_id, $from_date, $to_date, $months_count, $total_amount, $paid_amount, $property_status, $status, $notifications, $notes, $monthly_amount;

    public $workers = [];
    public  $calculator_number, $department_name, $email;

    public $Bonds = [];

    protected $listeners = [
        'SelectWorkerId',
    ];
    public function hydrate()
    {
        $this->emit('select2');
        $this->emit('flatpickr');
    }
    public function mount()
    {
        $this->workers = Workers::all();
    }

    public function SelectWorkerId($WorkerIdID)
    {
        $worker = Workers::find($WorkerIdID);
        if ($worker) {
            $this->worker_id = $WorkerIdID;
            $this->calculator_number = $worker->calculator_number;
            $this->department_name = $worker->department_name;
            $this->email = $worker->email;
        } else {
            $this->worker_id = null;
            $this->calculator_number = null;
            $this->department_name = null;
            $this->email = null;
        }
    }


    public $months_difference;


    public function updateToDate($value)
    {
        if ($value) {
            $this->to_date = \Carbon\Carbon::parse($value)->addYears(20)->format('Y-m-d');
            $this->calculateMonthsDifference();
        }
    }
    public function calculateMonthsDifference()
    {
        if ($this->from_date && $this->to_date) {
            $start = Carbon::parse($this->from_date);
            $end = Carbon::parse($this->to_date);
            $this->months_count = $start->diffInMonths($end);
        }
    }



    // تحديث المبلغ الشهري عند تغيير عدد الأشهر أو المبلغ الكلي
    public function updated($propertyName)
    {

        if ($propertyName === 'months_count' || $propertyName === 'total_amount') {
            $this->calculateMonthlyAmount();
        }
    }

    // حساب المبلغ الشهري
    public function calculateMonthlyAmount()
    {
        $cleanTotalAmount = (float)str_replace(',', '', $this->total_amount); // Remove commas
        if ($this->months_count > 0 && $cleanTotalAmount > 0) {
            $this->monthly_amount = number_format($cleanTotalAmount / $this->months_count, 2);
        } else {
            $this->monthly_amount = 0;
        }
    }


    public function render()
    {
        $BondSearch = '%' . $this->PropertSearch . '%';
        $Bonds = Bonds::where('boycott_id', 'LIKE', $BondSearch)

            ->orWhere('part_number', 'LIKE', $BondSearch)
            ->orWhere('property_number', 'LIKE', $BondSearch)

            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Bonds;
        $this->Bonds = collect($Bonds->items());
        return view('livewire.property.propert', [
            'links' => $links
        ]);
    }
    // public function render()
    // {
    //     $PropertSearch = '%' . $this->PropertSearch . '%';
    //     $Property = Property::where('user_id', 'LIKE', $PropertSearch)

    //         ->orWhere('bonds_id', 'LIKE', $PropertSearch)


    //         ->orderBy('id', 'ASC')
    //         ->paginate(10);
    //     $links = $Property;
    //     $this->Property = collect($Property->items());
    //     return view('livewire.property.propert', [
    //         'links' => $links
    //     ]);
    // }
    public function AddPropertModalShow()
    {
        // $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('PropertModalShow');
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'worker_id' => 'required',
            'bonds_id' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'months_count' => 'required',
            'total_amount' => 'required',
            'paid_amount' => 'required',
            'property_status' => 'required',
            'status' => 'required',
            'notifications' => 'required',
            'monthly_amount' => 'required',


        ], [
            'worker_id.required' => 'حقل رقم المستخدم مطلوب',
            'bonds_id.required' => 'حقل رقم العقار مطلوب',
            'from_date.required' => 'حقل من تاريخ مطلوب',
            'to_date.required' => 'حقل الى تاريخ مطلوب',
            'months_count.required' => 'حقل عدد الاشهر مطلوب',
            'total_amount.required' => 'حقل المبلغ الكلي مطلوب',
            'paid_amount.required' => 'حقل مجموع المسدد مطلوب',
            'property_status.required' => 'حقل حالة العقار مطلوب',
            'status.required' => 'حقل الحالة مطلوب',
            'notifications.required' => 'حقل الاشعارات مطلوب',
            'monthly_amount.required' => 'حقل المبلغ الشهري مطلوب',
        ]);



        Property::create([
        'user_id' => Auth::id(),
            'worker_id' => $this->worker_id,
            'bonds_id' => $this->bonds_id,
            'from_date' => $this->from_date,
            'to_date' => $this->to_date,
            'months_count' => $this->months_count,
            'total_amount' => $this->total_amount,
            'paid_amount' => $this->paid_amount,
            'property_status' => $this->property_status,
            'status' => $this->status,
            'notifications' => $this->notifications,
            'notes' => $this->notes,
            'monthly_amount' => $this->monthly_amount,
        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetPropert($PropertId)
    {
        $this->resetValidation();

        $this->Propert  = Property::find($PropertId);
        $this->PropertId = $this->Propert->id;
        $this->user_id = $this->Propert->user_id;
        $this->worker_id = $this->Propert->worker_id;
        $this->bonds_id = $this->Propert->bonds_id;
        $this->from_date = $this->Propert->from_date;
        $this->to_date = $this->Propert->to_date;
        $this->months_count = $this->Propert->months_count;
        $this->total_amount = $this->Propert->total_amount;
        $this->paid_amount = $this->Propert->paid_amount;
        $this->property_status = $this->Propert->property_status;
        $this->status = $this->Propert->status;
        $this->notifications = $this->Propert->notifications;
        $this->notes = $this->Propert->notes;
        $this->monthly_amount = $this->Propert->monthly_amount;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'worker_id' => 'required',
            'bonds_id' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'months_count' => 'required',
            'total_amount' => 'required',
            'paid_amount' => 'required',
            'property_status' => 'required',
            'status' => 'required',
            'notifications' => 'required',
            'monthly_amount' => 'required',


        ], [
            'worker_id.required' => 'حقل رقم المستخدم مطلوب',
            'bonds_id.required' => 'حقل رقم العقار مطلوب',
            'from_date.required' => 'حقل من تاريخ مطلوب',
            'to_date.required' => 'حقل الى تاريخ مطلوب',
            'months_count.required' => 'حقل عدد الاشهر مطلوب',
            'total_amount.required' => 'حقل المبلغ الكلي مطلوب',
            'paid_amount.required' => 'حقل مجموع المسدد مطلوب',
            'property_status.required' => 'حقل حالة العقار مطلوب',
            'status.required' => 'حقل الحالة مطلوب',
            'notifications.required' => 'حقل الاشعارات مطلوب',
            'monthly_amount.required' => 'حقل المبلغ الشهري مطلوب',
        ]);


        $Property = Property::find($this->PropertId);
        $Property->update([
            'user_id' => Auth::id(),
            'worker_id' => $this->worker_id,
            'bonds_id' => $this->bonds_id,
            'from_date' => $this->from_date,
            'to_date' => $this->to_date,
            'months_count' => $this->months_count,
            'total_amount' => $this->total_amount,
            'paid_amount' => $this->paid_amount,
            'property_status' => $this->property_status,
            'status' => $this->status,
            'notifications' => $this->notifications,
            'notes' => $this->notes,
            'monthly_amount' => $this->monthly_amount,
        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Property = Property::find($this->PropertId);

        if ($Property) {

            $Property->delete();
            $this->reset();
            $this->dispatchBrowserEvent('success', [
                'message' => 'تم حذف البيانات بنجاح',
                'title' => 'الحذف'
            ]);
        }
    }
}

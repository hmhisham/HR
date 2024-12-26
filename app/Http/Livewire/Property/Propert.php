<?php

namespace App\Http\Livewire\Property;

use Livewire\Component;
use App\Models\Bonds\Bonds;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use App\Models\Property\Property;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class Propert extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $Property = [];
    public $PropertSearch, $Propert, $PropertId;
    public $user_id, $worker_id, $bonds_id, $from_date, $to_date, $months_count, $total_amount, $paid_amount, $property_status, $status, $notifications, $notes, $monthly_amount;
    public $workers = [];
    public  $calculator_number, $department_name, $email, $total_paid_amount, $full_name, $property_number, $property;
    public $Bonds = [];
    protected $listeners = [
        'SelectWorkerId',
    ];
    public function hydrate()
    {
        $this->emit('flatpickr');
    }
    public function updateToDate($value)
    {
        if ($value) {
            // إضافة 20 سنة على التاريخ المدخل
            $this->to_date = \Carbon\Carbon::parse($value)->addYears(20)->format('Y-m-d');
            // بعد تحديث to_date، حساب الفرق بين التواريخ
            // if (!empty($this->from_date) && !empty($this->to_date)) {
            try {
                // تحويل النصوص إلى تواريخ باستخدام Carbon
                $start = Carbon::parse($this->from_date);
                $end = Carbon::parse($this->to_date);
                // حساب الفرق بين التاريخين بالأشهر
                $this->months_count = $start->diffInMonths($end);
            } catch (\Exception $e) {
                // في حالة حدوث خطأ في تحويل التواريخ
                $this->months_count = null;
            }
            // }
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
        $cleanTotalAmount = (float)str_replace(',', '', $this->total_amount);
        if ($this->months_count > 0 && $cleanTotalAmount > 0) {
            $this->monthly_amount = number_format($cleanTotalAmount / $this->months_count, 2);
        } else {
            $this->monthly_amount = 0;
        }
    }

    use WithPagination;

    public $search = [
        'boycott_number' => '',
        'part_number' => '',
        'property_number' => '',
        'status' => '',
    ];

    public $sortField = 'id'; // حقل الفرز الافتراضي
    public $sortDirection = 'asc'; // اتجاه الفرز الافتراضي

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function render()
    {
        $bonds = QueryBuilder::for(Bonds::class)
            ->allowedFilters([
                AllowedFilter::callback('boycott_number', function ($query, $value) {
                    $query->whereHas('getBoycott', function ($query) use ($value) {
                        $query->where('boycott_number', 'like', '%' . $value . '%');
                    });
                }),
                AllowedFilter::partial('part_number'),
                AllowedFilter::partial('property_number'),
                AllowedFilter::callback('status', function ($query, $value) {
                    $query->whereHas('getProperty', function ($query) use ($value) {
                        $query->where('status', $value);
                    });
                }),
            ])
            ->where(function ($query) {
                foreach ($this->search as $field => $value) {
                    if (!empty($value)) {
                        $query->where($field, 'like', '%' . $value . '%');
                    }
                }
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.property.propert', [
            'bonds' => $bonds,
            'sortField' => $this->sortField,
            'sortDirection' => $this->sortDirection,
            'specialized_department' => 'شعبة الاملاك',
        ]);
    }




    public function AddPropertModalShow($data)
    {
        $BondID = $data[0];
        $propertyNumber = $data[1];
        $this->resetValidation();
        $this->dispatchBrowserEvent('PropertModalShow');
        $this->Bonds = Bonds::find($BondID);
        $this->property_number = $propertyNumber;

        $this->Property = Property::where('bonds_id', $propertyNumber)->first();
        if (is_object($this->Property)) {
            $this->status = $this->Property->status;
        } else {
            $this->status = '0';
        }
    }



    public function store()
    {
        $this->resetValidation();
        $this->validate([

            'full_name' => 'required',
            'calculator_number' => 'required',
            'department_name' => 'required',
            'email' => 'required',
            'total_paid_amount' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'months_count' => 'required',
            'total_amount' => 'required',
            'paid_amount' => 'required',
            'monthly_amount' => 'required',
        ], [

            'full_name.required' => 'حقل  الاسم مطلوب',
            'calculator_number.required' => 'حقل  رقم الحاسبة مطلوب',
            'department_name.required' => 'حقل القسم مطلوب',
            'email.required' => 'حقل email مطلوب',
            'total_paid_amount.required' => 'حقل مجموع المتبقي مطلوب',
            'from_date.required' => 'حقل من تاريخ مطلوب',
            'to_date.required' => 'حقل الى تاريخ مطلوب',
            'months_count.required' => 'حقل عدد الاشهر مطلوب',
            'total_amount.required' => 'حقل المبلغ الكلي مطلوب',
            'paid_amount.required' => 'حقل مجموع المسدد مطلوب',
            'monthly_amount.required' => 'حقل المبلغ الشهري مطلوب',
        ]);
        $this->total_paid_amount = str_replace(',', '', $this->total_paid_amount);
        $this->total_amount = str_replace(',', '', $this->total_amount);
        $this->paid_amount = str_replace(',', '', $this->paid_amount);
        $this->monthly_amount = str_replace(',', '', $this->monthly_amount);
        Property::create([
            'user_id' => Auth::id(),
            'full_name' => $this->full_name,
            'calculator_number' => $this->calculator_number,
            'department_name' => $this->department_name,
            'email' => $this->email,
            'total_paid_amount' => $this->total_paid_amount,
            'bonds_id' => $this->property_number,
            'from_date' => $this->from_date,
            'to_date' => $this->to_date,
            'months_count' => $this->months_count,
            'total_amount' => $this->total_amount,
            'paid_amount' => $this->paid_amount,
            'property_status' => $this->property_status ?: 'محجوز',
            'status' =>  '1',
            'notifications' => $this->notifications ?: '0',
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
        // إعادة التحقق من صحة البيانات
        $this->resetValidation();

        // جلب البيانات الخاصة بالعقار
        $this->Propert  = Property::find($PropertId);

        // تعبئة الخصائص المطلوبة في النموذج
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

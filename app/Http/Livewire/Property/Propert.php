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
    public  $calculator_number, $Bond, $phone, $email, $total_paid_amount, $full_name, $property_number, $property, $isdeleted;
    public $Bonds = [];
    // الاستماع للأحداث
    protected $listeners = [
        'SelectWorkerId',
    ];
    // تفعيل flatpickr عند تحميل المكون
    public function hydrate()
    {
        $this->emit('flatpickr');
    }
    // تحديث تاريخ الانتهاء وإعادة حساب عدد الأشهر
    public function updateToDate($value)
    {
        if ($value) {
            // إضافة 20 سنة على التاريخ المدخل
            $this->to_date = \Carbon\Carbon::parse($value)->addYears(20)->format('Y-m-d');
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
    // متغيرات البحث
    public $search = [
        'boycott_number' => '',
        'part_number' => '',
        'property_number' => '',
        'status' => '',
    ];
    // حقل الفرز الافتراضي
    public $sortField = 'id';
    // اتجاه الفرز الافتراضي
    public $sortDirection = 'asc';
    // تغيير حقل الفرز أو اتجاه الفرز
    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }
    // عرض البيانات
    public function render()
    {
        $bonds = QueryBuilder::for(Bonds::class)
            ->allowedFilters([
                AllowedFilter::callback('full_name', function ($query, $value) {
                    $query->whereHas('getProperty', function ($query) use ($value) {
                        $query->where('full_name', 'like', '%' . $value . '%');
                    });
                }),
                AllowedFilter::callback('boycott_number', function ($query, $value) {
                    $query->whereHas('getBoycotts', function ($query) use ($value) {
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
            ->where('specialized_department', 'شعبة الاملاك')
            ->where('visibility', true)
            ->where(function ($query) {
                foreach ($this->search as $field => $value) {
                    if (!empty($value)) {
                        if ($field === 'full_name') {
                            $query->whereHas('getProperty', function ($query) use ($value) {
                                $query->where('full_name', 'like', '%' . $value . '%');
                            });
                        } elseif ($field === 'boycott_number') {
                            $query->whereHas('getBoycotts', function ($query) use ($value) {
                                $query->where('boycott_number', 'like', '%' . $value . '%');
                            });
                        } elseif ($field === 'boycott_name') {
                            $query->whereHas('getBoycotts', function ($query) use ($value) {
                                $query->where('boycott_name', 'like', '%' . $value . '%');
                            });

                        } elseif ($field === 'status') {
                            $query->whereHas('getProperty', function ($query) use ($value) {
                                if ($value === '1') {
                                    $query->where('status', 1);
                                } elseif ($value === '00') {
                                    $query->where('status', 0);
                                } elseif ($value === 'all') {
                                    $query->whereIn('status', [0, 1]);
                                }
                            });
                        } else {
                          $query->where($field, 'like', '%' . $value . '%');
                        }
                    }
                }
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.property.propert', [
            'bonds' => $bonds,
            'sortField' => $this->sortField,
            'sortDirection' => $this->sortDirection,
        ]);
    }


    // عرض نموذج إضافة عقار
    public function AddPropertModalShow($bonds_id)
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('PropertModalShow');
        $this->Bond = Bonds::find($bonds_id);
        $this->bonds_id = $this->Bond->id;
        $this->total_amount = 0;
        $this->paid_amount = 0;
        $this->total_paid_amount = 0;
        $this->monthly_amount = 0;
    }
    // تخزين بيانات العقار
    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'full_name' => 'required',
            'calculator_number' => 'required',
            'phone' => ['required', 'regex:/^07[0-9]{9}$/'],
            'email' => 'required|email',
            'total_paid_amount' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'months_count' => 'required',
            'total_amount' => 'required',
            'paid_amount' => 'required',
            'monthly_amount' => 'required',
        ], [
            'full_name.required' => 'حقل الاسم مطلوب',
            'calculator_number.required' => 'حقل رقم الحاسبة مطلوب',
            'phone.required' => 'حقل رقم الهاتف مطلوب',
            'phone.regex' => 'رقم الهاتف غير صالح',
            'email.required' => 'حقل البريد الإلكتروني مطلوب',
            'email.email' => 'البريد الإلكتروني غير صالح',
            'total_paid_amount.required' => 'حقل مجموع المتبقي مطلوب',
            'from_date.required' => 'حقل من تاريخ مطلوب',
            'to_date.required' => 'حقل إلى تاريخ مطلوب',
            'months_count.required' => 'حقل عدد الأشهر مطلوب',
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
            'phone' => $this->phone,
            'email' => $this->email,
            'total_paid_amount' => $this->total_paid_amount,
            'bonds_id' => $this->bonds_id,
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
            'isdeleted' =>  '0',
        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }
    // تحديث بيانات العقار
    public function update()
    {
        $this->resetValidation();

        $this->validate([
            'full_name' => 'required',
            'calculator_number' => 'required',
            'phone' => ['required', 'regex:/^07[0-9]{9}$/'],
            'email' => 'required|email',
            'total_paid_amount' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'months_count' => 'required',
            'total_amount' => 'required',
            'paid_amount' => 'required',
            'monthly_amount' => 'required',
        ], [
            'full_name.required' => 'حقل الاسم مطلوب',
            'calculator_number.required' => 'حقل رقم الحاسبة مطلوب',
            'phone.required' => 'حقل رقم الهاتف مطلوب',
            'phone.regex' => 'رقم الهاتف غير صالح',
            'email.required' => 'حقل البريد الإلكتروني مطلوب',
            'email.email' => 'البريد الإلكتروني غير صالح',
            'total_paid_amount.required' => 'حقل مجموع المتبقي مطلوب',
            'from_date.required' => 'حقل من تاريخ مطلوب',
            'to_date.required' => 'حقل إلى تاريخ مطلوب',
            'months_count.required' => 'حقل عدد الأشهر مطلوب',
            'total_amount.required' => 'حقل المبلغ الكلي مطلوب',
            'paid_amount.required' => 'حقل مجموع المسدد مطلوب',
            'monthly_amount.required' => 'حقل المبلغ الشهري مطلوب',
        ]);

        $this->total_paid_amount = str_replace(',', '', $this->total_paid_amount);
        $this->total_amount = str_replace(',', '', $this->total_amount);
        $this->paid_amount = str_replace(',', '', $this->paid_amount);
        $this->monthly_amount = str_replace(',', '', $this->monthly_amount);
        $this->Propert = Property::where('bonds_id', $this->bonds_id)->first();
        $this->Propert->update([
            'user_id' => Auth::id(),
            'full_name' => $this->full_name,
            'calculator_number' => $this->calculator_number,
            'phone' => $this->phone,
            'email' => $this->email,
            'total_paid_amount' => $this->total_paid_amount,
            'bonds_id' => $this->bonds_id,
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
            'isdeleted' =>  '0',
        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'اضافه'
        ]);
    }
    // تنسيق الأرقام بإضافة الفواصل
    public function formatWithCommas($number)
    {
        return number_format($number, 0, '.', ',');
    }
    // جلب بيانات العقار
    public function GetPropert2($PropertId)
    {
        $this->resetValidation();
        $this->Propert = Property::where('bonds_id', $PropertId)->first();
        $this->PropertId = $this->Propert->id;
        $this->user_id = $this->Propert->user_id;
        $this->full_name = $this->Propert->full_name;
        $this->calculator_number = $this->Propert->calculator_number;
        $this->phone = $this->Propert->phone;
        $this->total_paid_amount = $this->formatWithCommas($this->Propert->total_paid_amount);
        $this->email = $this->Propert->email;
        $this->bonds_id = $this->Propert->bonds_id;
        $this->from_date = $this->Propert->from_date;
        $this->to_date = $this->Propert->to_date;
        $this->months_count = $this->Propert->months_count;
        $this->total_amount = $this->formatWithCommas($this->Propert->total_amount);
        $this->paid_amount = $this->formatWithCommas($this->Propert->paid_amount);
        $this->property_status = $this->Propert->property_status;
        $this->status = $this->Propert->status;
        $this->notifications = $this->Propert->notifications;
        $this->notes = $this->Propert->notes;
        $this->monthly_amount = $this->formatWithCommas($this->Propert->monthly_amount);
        $this->property_number = $this->Propert->bonds_id;
    }
    // حذف العقار
    public function destroy()
    {
        $this->resetValidation();
        $this->Propert = Property::where('bonds_id', $this->bonds_id)
            ->where('isdeleted', 0)
            ->first();
        if ($this->bonds_id) {
            $this->Propert->update([
                'status' =>  '0',
                'isdeleted' =>  '1',
            ]);
            $this->reset();
            $this->dispatchBrowserEvent('success', [
                'message' => 'تم الحذف بنجاح',
                'title' => 'حذف'
            ]);
        }
    }
}

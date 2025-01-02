<?php

namespace App\Http\Livewire\Propertypayd;

use Livewire\Component;

use App\Models\Bonds\Bonds;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Mail\NotificationMail;
use App\Models\Property\Property;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Alkoumi\LaravelArabicNumbers\Numbers;
use App\Models\Propertypayd\Propertypayd;

class Propertypay extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Bond_ID, $Bond, $PropertyNumber, $filePreview;
    public $TotalAmountsPaid, $TafqeetTotalAmountsPaid;
    public $TotalAmount, $TafqeetTotalAmount;
    public $ReceiptAmount, $TafqeetReceiptAmount;
    public $Property = [];
    protected $Propertypayd = [];
    public $PropertypaySearch, $Propertypay, $PropertypayId, $pro , $propert , $email ;
    public $user_id, $bonds_id, $receipt_number, $receipt_date, $amount, $receipt_file, $notes, $isdeleted;

    protected $listeners = [
        '',
    ];
    public function hydrate()
    {
        $this->emit('flatpickr');
    }

    // متغيرات البحث
    public $search = [
        'bonds_id' => '',
        'receipt_number' => '',
        'receipt_date' => '',
        'amount' => '',
        'notes' => '',
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

    public function mount()
    {
        $this->PropertyNumber = Bonds::find($this->Bond_ID)->property_number;

        $this->TotalAmountsPaid = Propertypayd::where('bonds_id', $this->Bond_ID)->sum('amount');
        $this->TafqeetTotalAmountsPaid = Numbers::TafqeetMoney((int)$this->removeCommas($this->TotalAmountsPaid), 'IQD');
    }

    public function render()
    {
        $this->Propertypayd = QueryBuilder::for(Propertypayd::class)
        ->allowedFilters([
            AllowedFilter::partial('bonds_id'),
            AllowedFilter::partial('receipt_number'),
            AllowedFilter::partial('receipt_date'),
            AllowedFilter::partial('amount'),
            AllowedFilter::partial('notes'),
        ])
        ->where('bonds_id', $this->Bond_ID)
        ->where(function ($query) {
            foreach ($this->search as $field => $value) {
                if (!empty($value)) {
                    $query->where($field, 'like', '%' . $value . '%');
                }
            }
        })
        ->orderBy($this->sortField, $this->sortDirection)
        ->paginate(10);

        return view('livewire.propertypayd.propertypay', [
            'Propertypayd' => $this->Propertypayd,
        ]);
    }

    public function AddPropertypaydModalShow($id)
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('PropertypaydModalShow');
    }

    public function storePropertypayd()
    {
        $this->resetValidation();
        $this->validate([
            'user_id' => 'required',
            'bonds_id' => 'required',
            'receipt_number' => 'required|unique:propertypayd',
            'receipt_date' => 'required|date',
            'amount' => 'required|numeric',
            'receipt_file' => 'required|string',
            'notes' => 'nullable|string',
            'isdeleted' => 'required|boolean',
        ], [
            'user_id.required' => 'حقل رقم المستخدم مطلوب',
            'bonds_id.required' => 'حقل رقم العقار مطلوب',
            'receipt_number.required' => 'حقل رقم الإيصال مطلوب',
            'receipt_number.unique' => 'رقم الإيصال موجود بالفعل',
            'receipt_date.required' => 'حقل تاريخ الإيصال مطلوب',
            'receipt_date.date' => 'تاريخ الإيصال غير صالح',
            'amount.required' => 'حقل المبلغ مطلوب',
            'amount.numeric' => 'المبلغ يجب أن يكون رقماً',
            'receipt_file.required' => 'حقل ملف الإيصال مطلوب',
            'receipt_file.string' => 'ملف الإيصال يجب أن يكون نصاً',
            'notes.string' => 'ملاحظات يجب أن تكون نصاً',
            'isdeleted.required' => 'حقل محذوف مطلوب',
            'isdeleted.boolean' => 'قيمة محذوف يجب أن تكون صحيحة أو خاطئة',
        ]);

        Propertypayd::create([
            'user_id' => $this->user_id,
            'bonds_id' => $this->bonds_id,
            'receipt_number' => $this->receipt_number,
            'receipt_date' => $this->receipt_date,
            'amount' => $this->amount,
            'receipt_file' => $this->receipt_file,
            'notes' => $this->notes,
            'isdeleted' => $this->isdeleted,
        ]);

        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }
    public function AddPropertypayModalShow()
    {
        $this->resetExcept('Bond_ID', 'PropertyNumber');
        $this->resetValidation();
        $this->dispatchBrowserEvent('PropertypayModalShow');

        $this->TotalAmountsPaid = Propertypayd::where('bonds_id', $this->Bond_ID)->sum('amount');
        $this->TafqeetTotalAmountsPaid = Numbers::TafqeetMoney((int)$this->removeCommas($this->TotalAmountsPaid), 'IQD');

        $this->TotalAmount = $this->TotalAmountsPaid;
        $this->TafqeetTotalAmount = $this->TafqeetTotalAmountsPaid;
    }

    public function removeCommas($number)
    {
        return str_replace(',', '', $number);
    }
    public function TafqeetAmount()
    {
        $this->ReceiptAmount = $this->removeCommas($this->amount);
        $this->TotalAmount = $this->removeCommas($this->TotalAmountsPaid) + $this->removeCommas($this->ReceiptAmount);
        $this->TafqeetTotalAmount = Numbers::TafqeetMoney((int)$this->removeCommas($this->TotalAmount), 'IQD');

        $this->TafqeetReceiptAmount = Numbers::TafqeetMoney((int)$this->removeCommas($this->amount), 'IQD');
    }

    public function updatedReceiptFile()
    {
        $this->validate([
            'receipt_file' => 'required|file|max:1024', // الحد الأقصى للحجم 10 ميجابايت
        ],[
            'receipt_file.required' => 'ملف الإيصال مطلوب.',
            'receipt_file.max' => 'يجب ألا يزيد حجم ملف الإيصال عن 1024 كيلوبايت.',
        ]);

        $this->filePreview = $this->receipt_file->temporaryUrl();
    }

    public function store()
    {
        $this->resetValidation();
        $this->validate([
            //'bonds_id' => 'required',
            'receipt_number' => 'required',
            'receipt_date' => 'required',
            'amount' => 'required',
            'receipt_file' => 'required|file|max:1024', // الحد الأقصى للحجم 1 ميجابايت
        ], [
            //'bonds_id.required' => 'حقل رقم العقار مطلوب',
            'receipt_number.required' => 'حقل رقم الإيصال مطلوب',
            'receipt_date.required' => 'حقل تاريخ الإيصال مطلوب',
            'amount.required' => 'حقل المبلغ مطلوب',
            'receipt_file.required' => 'ملف الإيصال مطلوب.',
            'receipt_file.max' => 'يجب ألا يزيد حجم ملف الإيصال عن 1024 كيلوبايت.',
        ]);

        Propertypayd::create([
            'user_id' => Auth::id(),
            'bonds_id' => $this->Bond_ID,
            'receipt_number' => $this->receipt_number,
            'receipt_date' => $this->receipt_date,
            'amount' => $this->removeCommas($this->amount),
            'receipt_file' => $this->receipt_file->hashName(),
            'notes' => $this->notes,
            'isdeleted' =>  '0',
        ]);

        $propert = Property::where('bonds_id', $this->Bond_ID)->first();
        $AmountPaid = Propertypayd::where('bonds_id', $this->Bond_ID)->sum('amount');
        $RemainingAmount = $propert->total_amount - $AmountPaid;

        $title = 'الموانيء العراقية';

        // إرسال البريد الإلكتروني
        Mail::to($propert->email)->send(new NotificationMail(
            $title,
            $propert->full_name,
            $this->receipt_number,
            $this->receipt_date,
            $this->amount,
            $propert->total_amount,
            $AmountPaid,
            $RemainingAmount,
            $this->PropertyNumber,
            $this->Bond_ID,
        ));

        $this->resetExcept('Bond_ID', 'PropertyNumber');
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافة بنجاح',
            'title' => 'اضافة'
        ]);

        $this->mount();
    }

    public function GetPropertypay($PropertypayId)
    {
        $this->resetValidation();

        $this->Propertypay  = Propertypayd::find($PropertypayId);
        $this->PropertypayId = $this->Propertypay->id;
        $this->user_id = $this->Propertypay->user_id;
        $this->bonds_id = $this->Propertypay->bonds_id;
        $this->receipt_number = $this->Propertypay->receipt_number;
        $this->receipt_date = $this->Propertypay->receipt_date;
        $this->amount = $this->Propertypay->amount;
        $this->receipt_file = $this->Propertypay->receipt_file;
        $this->notes = $this->Propertypay->notes;
        $this->isdeleted = $this->Propertypay->isdeleted;
    }

    public function update()
    {
        $this->amount = str_replace(',', '', $this->amount);

        $this->resetValidation();
        $this->validate([
            'user_id' => 'required:propertypayd',
            'bonds_id' => 'required:propertypayd',
            'receipt_number' => 'required:propertypayd',
            'receipt_date' => 'required:propertypayd',
            'amount' => 'required:propertypayd',
            'receipt_file' => 'required:propertypayd',
            'notes' => 'required:propertypayd',
            'isdeleted' => 'required:propertypayd',
        ], [
            'user_id.required' => 'حقل رقم المستخدم مطلوب',
            'bonds_id.required' => 'حقل رقم العقار مطلوب',
            'receipt_number.required' => 'حقل رقم الإيصال مطلوب',
            'receipt_date.required' => 'حقل تاريخ الإيصال مطلوب',
            'amount.required' => 'حقل المبلغ مطلوب',
            'receipt_file.required' => 'حقل ملف الإيصال مطلوب',
            'notes.required' => 'حقل ملاحظات مطلوب',
            'isdeleted.required' => 'حقل محذوف مطلوب',
        ]);

        if ($this->receipt_file) {
            $this->validate([
                'receipt_file' => 'required|file|max:1024', // الحد الأقصى للحجم 1 ميجابايت
            ], [
                'receipt_file.required' => 'ملف الإيصال مطلوب.',
                'receipt_file.max' => 'يجب ألا يزيد حجم ملف الإيصال عن 1024 كيلوبايت.',
            ]);

            $this->receipt_file->store('public/Property/Payment-Receipts');
        }

        $Propertypayd = Propertypayd::find($this->PropertypayId);
        $Propertypayd->update([
            'user_id' => $this->user_id,
            'bonds_id' => $this->Bond_ID,
            'receipt_number' => $this->receipt_number,
            'receipt_date' => $this->receipt_date,
            'amount' => $this->amount,
            'receipt_file' => $this->receipt_file,
            'notes' => $this->notes,
            'isdeleted' => $this->isdeleted,
        ]);

        // ===============================

        $this->propert = Property::find($this->Bond_ID);

        /* $this->email = $this->propert->email;

        // إرسال البريد الإلكتروني
        Mail::to($this->email)->send(new NotificationMail(
            'الموانيء العراقية',
            'مرحبا استاذ ' . $this->propert->full_name . ' تم دفع المبلغ ' . $this->amount . ' الخاص بالعقار  وحسب الوصل المرفق' . "\n" .
            'الرجاء الاحتفاظ بالرسائل كذلك الاطلاع على التطبيق الخاص بك' . "\n" .
            'شكراً لكم'
        )); */
        // ===============================
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Propertypayd = Propertypayd::find($this->PropertypayId);

        if ($Propertypayd) {

            $Propertypayd->delete();
            $this->reset();
            $this->dispatchBrowserEvent('success', [
                'message' => 'تم حذف البيانات بنجاح',
                'title' => 'الحذف'
            ]);
        }
    }
}

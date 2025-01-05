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
    public $RemainingAmount, $TafqeetRemainingAmount;
    public $Property = [];
    protected $Propertypayd = [];
    public $PropertypaySearch, $Propertypay, $PropertypayId, $pro , $propert , $email ;
    public $user_id, $bonds_id, $receipt_number, $receipt_date, $amount, $receipt_file, $notes, $isdeleted;
    public $part_number;

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

        $this->TotalAmount = Property::where('bonds_id', $this->Bond_ID)->first()->total_amount;
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

    /* public function AddPropertypaydModalShow($id)
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('PropertypaydModalShow');
    } */

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

        $propert = Property::where('bonds_id', $this->Bond_ID)->first();

        $this->TotalAmountsPaid = Propertypayd::where('bonds_id', $this->Bond_ID)->sum('amount');
        $this->TafqeetTotalAmountsPaid = Numbers::TafqeetMoney((int)$this->removeCommas($this->TotalAmountsPaid), 'IQD');

        $this->TotalAmount = $this->TotalAmountsPaid;
        $this->TafqeetTotalAmount = $this->TafqeetTotalAmountsPaid;

        $this->RemainingAmount = $propert->total_amount - ($this->TotalAmountsPaid + $this->amount);
        $this->TafqeetRemainingAmount = Numbers::TafqeetMoney((int)$this->RemainingAmount, 'IQD');
    }

    public function removeCommas($number)
    {
        return str_replace(',', '', $number);
    }
    public function TafqeetAmount()
    {
        if($this->amount == '') { $this->amount = 0; }
        $this->ReceiptAmount = $this->removeCommas($this->amount);
        $this->TotalAmount = $this->removeCommas($this->TotalAmountsPaid) + $this->removeCommas($this->ReceiptAmount);
        $this->TafqeetTotalAmount = Numbers::TafqeetMoney((int)$this->removeCommas($this->TotalAmount), 'IQD');

        $this->TafqeetReceiptAmount = Numbers::TafqeetMoney((int)$this->removeCommas($this->amount), 'IQD');

        $propert = Property::where('bonds_id', $this->Bond_ID)->first();
        $this->RemainingAmount = $propert->total_amount - ($this->TotalAmountsPaid + $this->ReceiptAmount);
        $this->TafqeetRemainingAmount = Numbers::TafqeetMoney((int)$this->RemainingAmount, 'IQD');

        $this->resetValidation();
        /* $this->validate([
            'amount' => 'regex:/^[0-9][0-9][.,][0-9]*$/|max:1000',
        ]); */

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
            'receipt_number' => 'required',
            'receipt_date' => 'required',
            'amount' => 'required',
            'receipt_file' => 'required|file|max:1024', // الحد الأقصى للحجم 1 ميجابايت
        ], [
            'receipt_number.required' => 'حقل رقم الإيصال مطلوب',
            'receipt_date.required' => 'حقل تاريخ الإيصال مطلوب',
            'amount.required' => 'حقل المبلغ مطلوب',
            'receipt_file.required' => 'ملف الإيصال مطلوب.',
            'receipt_file.max' => 'يجب ألا يزيد حجم ملف الإيصال عن 1024 كيلوبايت.',
        ]);

        if ($this->receipt_file) {
            $this->receipt_file->store('public/Property/Payment-Receipts');
        }

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
        $this->amount = number_format($this->Propertypay->amount);
        $this->receipt_file = $this->Propertypay->receipt_file;
        $this->notes = $this->Propertypay->notes;
        $this->isdeleted = $this->Propertypay->isdeleted;

        $bond = Bonds::find($this->bonds_id);
        $this->part_number = $bond->part_number;

        $this->filePreview = '';
        $this->TafqeetReceiptAmount = Numbers::TafqeetMoney((int)$this->removeCommas($this->amount), 'IQD');

        $this->TotalAmountsPaid = Propertypayd::where('bonds_id', $this->Bond_ID)->sum('amount') - $this->removeCommas($this->amount);
        $this->TafqeetTotalAmountsPaid = Numbers::TafqeetMoney((int)$this->removeCommas($this->TotalAmountsPaid), 'IQD');

        $this->TotalAmount = Propertypayd::where('bonds_id', $this->Bond_ID)->sum('amount');
        $this->TafqeetTotalAmount = Numbers::TafqeetMoney((int)$this->removeCommas($this->TotalAmount), 'IQD');

        $this->RemainingAmount = Property::where('bonds_id', $this->Bond_ID)->first()->total_amount - $this->TotalAmount;
        $this->TafqeetRemainingAmount = Numbers::TafqeetMoney((int)$this->removeCommas($this->RemainingAmount), 'IQD');

        $this->dispatchBrowserEvent('editPropertypayModalShow');
    }

    public function update()
    {
        $this->amount = str_replace(',', '', $this->amount);

        $this->resetValidation();
        $this->validate([
            'receipt_number' => 'required',
            'receipt_date' => 'required',
            'amount' => 'required',
        ], [
            'receipt_number.required' => 'حقل رقم الإيصال مطلوب',
            'receipt_date.required' => 'حقل تاريخ الإيصال مطلوب',
            'amount.required' => 'حقل المبلغ مطلوب',
        ]);

        $Propertypayd = Propertypayd::find($this->PropertypayId);

        if ($this->filePreview) {
            $this->validate([
                'receipt_file' => 'required|file|max:1024', // الحد الأقصى للحجم 1 ميجابايت
            ], [
                'receipt_file.required' => 'ملف الإيصال مطلوب.',
                'receipt_file.max' => 'يجب ألا يزيد حجم ملف الإيصال عن 1024 كيلوبايت.',
            ]);

            if (file_exists(public_path('storage/Property/Payment-Receipts/' . $Propertypayd->receipt_file))) {
                unlink(public_path('storage/Property/Payment-Receipts/' . $Propertypayd->receipt_file));
            }

            $this->receipt_file->store('public/Property/Payment-Receipts');
            $fileName = $this->receipt_file->hashName();
        }else {
            $fileName = $this->receipt_file;
        }


        $Propertypayd->update([
            'user_id' => $this->user_id,
            'bonds_id' => $this->Bond_ID,
            'receipt_number' => $this->receipt_number,
            'receipt_date' => $this->receipt_date,
            'amount' => $this->amount,
            'receipt_file' => $fileName,
            'notes' => $this->notes,
            'isdeleted' => $this->isdeleted,
        ]);

        // ===============================

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

        // ===============================

        $this->resetExcept('Bond_ID');
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);

        $this->mount();
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

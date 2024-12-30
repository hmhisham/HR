<?php

namespace App\Http\Livewire\Propertypayd;

use Livewire\Component;

 use Livewire\WithPagination;
use App\Mail\NotificationMail;
use App\Models\Property\Property;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Models\Propertypayd\Propertypayd;

class Propertypay extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $Property = [];
    protected $Propertypayd = [];
    public $PropertypaySearch, $Propertypay, $PropertypayId, $pro , $propert , $email ;
    public $user_id, $bonds_id, $receipt_number, $receipt_date, $amount, $receipt_file, $notes, $isdeleted;
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

    public function AddPropertypaydModalShow()
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
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('PropertypayModalShow');
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'bonds_id' => 'required',
            'receipt_number' => 'required',
            'receipt_date' => 'required',
            'amount' => 'required',
            'receipt_file' => 'required',
        ], [
            'bonds_id.required' => 'حقل رقم العقار مطلوب',
            'receipt_number.required' => 'حقل رقم الإيصال مطلوب',
            'receipt_date.required' => 'حقل تاريخ الإيصال مطلوب',
            'amount.required' => 'حقل المبلغ مطلوب',
            'receipt_file.required' => 'حقل ملف الإيصال مطلوب',
        ]);

        Propertypayd::create([
            'user_id' => Auth::id(),
            'bonds_id' => $this->bonds_id,
            'receipt_number' => $this->receipt_number,
            'receipt_date' => $this->receipt_date,
            'amount' => $this->amount,
            'receipt_file' => $this->receipt_file,
            'notes' => $this->notes,
            'isdeleted' =>  '0',
        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
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

        $Propertypayd = Propertypayd::find($this->PropertypayId);
        $Propertypayd->update([
            'user_id' => $this->user_id,
            'bonds_id' => $this->bonds_id,
            'receipt_number' => $this->receipt_number,
            'receipt_date' => $this->receipt_date,
            'amount' => $this->amount,
            'receipt_file' => $this->receipt_file,
            'notes' => $this->notes,
            'isdeleted' => $this->isdeleted,
        ]);

        // ===============================

        $this->propert = Property::find($this->bonds_id);

        $this->email = $this->propert->email;

        // إرسال البريد الإلكتروني
        Mail::to($this->email)->send(new NotificationMail(
            'الموانيء العراقية',
            'مرحبا استاذ ' . $this->propert->full_name . ' تم دفع المبلغ ' . $this->amount . ' الخاص بالعقار  وحسب الوصل المرفق' . "\n" .
            'الرجاء الاحتفاظ بالرسائل كذلك الاطلاع على التطبيق الخاص بك' . "\n" .
            'شكراً لكم'
        ));
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

<?php

namespace App\Http\Livewire\RealProperties;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Realities\Realities;
use Illuminate\Support\Facades\Auth;
use App\Models\RealProperty\BuyerTenant;
use App\Models\RealProperty\SaleTenantReceipts;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Tracking;

class ShowBuyerTenant extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $RealPropertyNumber, $BuyerTenantid;
    public $Realities;
    public $BuyerTenant = null;
    public $SaleTenantReceipts = [];
    public $edit_receipt_date, $edit_receipt_from_date, $edit_receipt_to_date, $old_receipt_attach, $attachFile;
    public $SaleTenantReceipt, $receipt_number, $receipt_date, $receipt_payment_amount, $receipt_from_date, $receipt_to_date, $receipt_notes, $receipt_attach;
    public $totalPaid = 0;
    public $remainingAmount = 0;

    // Add search property
    public $search = [
        'receipt_number' => '',
        'receipt_date' => '',
        'receipt_payment_amount' => '',
        'receipt_from_date' => '',
        'receipt_to_date' => ''
    ];

    protected $listeners = [
        'SelectReceiptDate',
        'SelectReceiptFromDate',
        'SelectReceiptToDate',
    ];

    public function hydrate()
    {
        $this->emit('select2');
        $this->emit('flatpickr');
    }

    public function mount()
    {
        $this->BuyerTenant = BuyerTenant::find($this->BuyerTenantid);
        $this->Realities = Realities::where('id', $this->RealPropertyNumber)->first();
        // Calculate total paid amount
        if ($this->BuyerTenant) {
            $this->calculateTotalAmounts();
        }
    }

    public function render()
    {
        $this->calculateTotalAmounts();

        $searchReceiptNumber = '%' . $this->search['receipt_number'] . '%';
        $searchReceiptDate = '%' . $this->search['receipt_date'] . '%';
        $searchPaymentAmount = '%' . $this->search['receipt_payment_amount'] . '%';
        $searchFromDate = '%' . $this->search['receipt_from_date'] . '%';
        $searchToDate = '%' . $this->search['receipt_to_date'] . '%';

        $SaleTenantReceipts = SaleTenantReceipts::query()
            ->where('buyer_tenant_id', $this->BuyerTenantid)
            ->where('property_number', $this->RealPropertyNumber)
            ->when($this->search['receipt_number'], function ($query) use ($searchReceiptNumber) {
                $query->where('receipt_number', 'LIKE', $searchReceiptNumber);
            })
            ->when($this->search['receipt_date'], function ($query) use ($searchReceiptDate) {
                $query->where('receipt_date', 'LIKE', $searchReceiptDate);
            })
            ->when($this->search['receipt_payment_amount'], function ($query) use ($searchPaymentAmount) {
                $query->where('receipt_payment_amount', 'LIKE', $searchPaymentAmount);
            })
            ->when($this->search['receipt_from_date'], function ($query) use ($searchFromDate) {
                $query->where('receipt_from_date', 'LIKE', $searchFromDate);
            })
            ->when($this->search['receipt_to_date'], function ($query) use ($searchToDate) {
                $query->where('receipt_to_date', 'LIKE', $searchToDate);
            })
            ->orderBy('receipt_date', 'ASC')
            ->paginate(10);

        $links = $SaleTenantReceipts;
        $this->SaleTenantReceipts = collect($SaleTenantReceipts->items());

        return view('livewire.real-properties.show-buyer-tenant', [
            'links' => $links,
        ]);
    }

    public function calculateTotalAmounts()
    {
        if ($this->BuyerTenant && !is_array($this->BuyerTenant)) {
            $this->totalPaid = SaleTenantReceipts::where('buyer_tenant_id', $this->BuyerTenant->id)
                ->sum('receipt_payment_amount');
            $this->remainingAmount = $this->BuyerTenant->net_amount - $this->totalPaid;
        }
    }

    public function SelectReceiptDate($ReceiptDate)
    {
        $this->edit_receipt_date = $ReceiptDate;
    }
    public function SelectReceiptFromDate($ReceiptFromDate)
    {
        $this->edit_receipt_from_date = $ReceiptFromDate;
    }
    public function SelectReceiptToDate($ReceiptToDate)
    {
        $this->edit_receipt_to_date = $ReceiptToDate;
    }

    public function GetSaleTenantReceipt($receiptId)
    {
        $this->reset('receipt_number', 'receipt_date', 'receipt_payment_amount', 'receipt_from_date', 'receipt_to_date', 'receipt_notes', 'receipt_attach', 'attachFile');
        $this->resetValidation();

        $this->SaleTenantReceipt = SaleTenantReceipts::find($receiptId);

        $this->receipt_number = $this->SaleTenantReceipt->receipt_number;
        $this->receipt_date = $this->SaleTenantReceipt->receipt_date;
        $this->receipt_payment_amount = $this->SaleTenantReceipt->receipt_payment_amount;
        $this->receipt_from_date = $this->SaleTenantReceipt->receipt_from_date;
        $this->receipt_to_date = $this->SaleTenantReceipt->receipt_to_date;
        $this->receipt_notes = $this->SaleTenantReceipt->receipt_notes;
        $this->receipt_attach = $this->SaleTenantReceipt->receipt_attach;
        $this->old_receipt_attach = $this->SaleTenantReceipt->receipt_attach;
    }

    public function updatedReceiptAttach()
    {
        $this->attachFile = $this->receipt_attach;

        $this->validate([
            'receipt_attach' => 'file|max:1024', // الحد الأقصى للحجم 1 ميجابايت
        ], [
            'receipt_attach.max' => 'يجب ألا يزيد حجم ملف الشهادة عن 1024 كيلوبايت.'
        ]);
    }

    public function update()
    {
        $this->resetValidation();

        $validationRules = [
            'receipt_number' => [
                'required',
                Rule::unique('sale_tenant_receipts')->where(function ($query) {
                    return $query->where('buyer_tenant_id', $this->BuyerTenantid);
                })->ignore($this->SaleTenantReceipt->id),
            ],
            'receipt_date' => 'required|date',
            'receipt_payment_amount' => 'required|numeric|min:0',
            'receipt_from_date' => 'required|date',
            'receipt_to_date' => 'required|date|after_or_equal:receipt_from_date',
        ];

        // Only add file validation if a new file is being uploaded
        if ($this->attachFile) {
            $validationRules['receipt_attach'] = 'required|file|mimes:jpeg,png,jpg,pdf|max:1024';
        }

        $validatedData = $this->validate($validationRules, [
            'receipt_number.required' => 'رقم الايصال مطلوب',
            'receipt_number.unique' => 'رقم الايصال موجود مسبقاً',
            'receipt_date.required' => 'تاريخ الايصال مطلوب',
            'receipt_date.date' => 'صيغة التاريخ غير صحيحة',
            'receipt_payment_amount.required' => 'المبلغ المدفوع مطلوب',
            'receipt_payment_amount.numeric' => 'المبلغ يجب ان يكون رقماً',
            'receipt_from_date.required' => 'تاريخ البداية مطلوب',
            'receipt_to_date.required' => 'تاريخ النهاية مطلوب',
            'receipt_to_date.after_or_equal' => 'تاريخ النهاية يجب ان يكون بعد تاريخ البداية',
            'receipt_attach.required' => 'ملف الايصال مطلوب',
            'receipt_attach.mimes' => 'نوع الملف غير مدعوم',
            'receipt_attach.max' => 'حجم الملف لا يجب ان يتجاوز 1 ميجابايت'
        ]);

        if ($this->attachFile && !is_string($this->attachFile)) {
            $storagePath = 'public/Realities/' .
                $this->Realities->GetProvinces->province_number . '/' .
                $this->Realities->GetPlots->plot_number . '/' .
                $this->Realities->property_number;

            if ($this->old_receipt_attach && Storage::exists($storagePath . '/' . $this->old_receipt_attach)) {
                Storage::delete($storagePath . '/' . $this->old_receipt_attach);
            }

            $this->attachFile->store($storagePath);
            $validatedData['receipt_attach'] = $this->attachFile->hashName();
        }

        $validatedData['user_id'] = Auth::id();
        $validatedData['buyer_tenant_id'] = $this->BuyerTenantid;
        $validatedData['property_number'] = $this->RealPropertyNumber;
        $validatedData['receipt_notes'] = $this->receipt_notes;
        $validatedData['receipt_type'] = $this->BuyerTenant['buyer_tenant_type'] == 'buyer' ? 'بيع' : 'ايجار';

        // Update record
        $this->SaleTenantReceipt->update($validatedData);

        // Reset form
        $this->reset(['receipt_number', 'receipt_date', 'receipt_payment_amount', 'receipt_from_date', 'receipt_to_date', 'receipt_notes', 'receipt_attach', 'attachFile']);

        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $storagePath = 'public/Realities/' .
            $this->Realities->GetProvinces->province_number . '/' .
            $this->Realities->GetPlots->plot_number . '/' .
            $this->Realities->property_number;

        if ($this->SaleTenantReceipt->receipt_attach) {
            if (file_exists(storage_path('app/' . $storagePath . '/' . $this->SaleTenantReceipt->receipt_attach))) {
                unlink(storage_path('app/' . $storagePath . '/' . $this->SaleTenantReceipt->receipt_attach));
            }
        }

        $this->SaleTenantReceipt->delete();

        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الحذف بنجاح',
            'title' => 'حذف'
        ]);
    }
}

<?php

namespace App\Http\Livewire\RealProperties;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Realities\Realities;
use Illuminate\Support\Facades\Auth;
use App\Models\RealProperty\BuyerTenant;
use App\Models\RealProperty\SaleTenantReceipts;

class ShowBuyerTenant extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $RealPropertyNumber, $BuyerTenantid;
    public $Realities = [];
    public $BuyerTenant = [];
    public $SaleTenantReceipts = [];
    public $edit_receipt_date, $edit_receipt_from_date, $edit_receipt_to_date, $old_receipt_attach, $attachFile;
    public $SaleTenantReceipt, $receipt_number, $receipt_date, $receipt_payer_name, $receipt_payment_amount, $receipt_from_date, $receipt_to_date, $receipt_notes, $receipt_attach;

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
        $this->Realities = Realities::where('property_number', $this->RealPropertyNumber)->first();
    }

    public function render()
    {
        $SaleTenantReceipts = SaleTenantReceipts::where('buyer_tenant_id', $this->BuyerTenantid)->
            where('property_number', $this->RealPropertyNumber)->
            orderBy('receipt_date', 'ASC')->
            paginate(10);

        $links = $SaleTenantReceipts;
        $this->SaleTenantReceipts = collect($SaleTenantReceipts->items());

        return view('livewire.real-properties.show-buyer-tenant', [
            'links' => $links,
        ]);
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
        $this->reset('receipt_number', 'receipt_date', 'receipt_payer_name', 'receipt_payment_amount', 'receipt_from_date', 'receipt_to_date', 'receipt_notes', 'receipt_attach', 'attachFile');
        $this->resetValidation();

        $this->SaleTenantReceipt = SaleTenantReceipts::find($receiptId);

        $this->receipt_number = $this->SaleTenantReceipt->receipt_number;
        $this->receipt_date = $this->SaleTenantReceipt->receipt_date;
        $this->receipt_payer_name = $this->SaleTenantReceipt->receipt_payer_name;
        $this->receipt_payment_amount = $this->SaleTenantReceipt->receipt_payment_amount;
        $this->receipt_from_date = $this->SaleTenantReceipt->receipt_from_date;
        $this->receipt_to_date = $this->SaleTenantReceipt->receipt_to_date;
        $this->receipt_notes = $this->SaleTenantReceipt->receipt_notes;
        $this->receipt_attach = $this->SaleTenantReceipt->receipt_attach;
        $this->old_receipt_attach = $this->SaleTenantReceipt->receipt_attach;
    }

    public function updatedReceiptAttach() {
        $this->attachFile = $this->receipt_attach;

        $this->validate([
            'receipt_attach' => 'file|max:1024', // الحد الأقصى للحجم 1 ميجابايت
        ], [
            'receipt_attach.max'=> 'يجب ألا يزيد حجم ملف الشهادة عن 1024 كيلوبايت.'
        ]);
    }

    public function update()
    {
        $this->resetValidation();
        $Validation = $this->validate([
            'receipt_number' => 'required',
            'receipt_date' => 'required',
            'receipt_payer_name' => 'required',
            'receipt_payment_amount' => 'required',
            'receipt_from_date' => 'required',
            'receipt_to_date' => 'required',
            'receipt_attach' => 'required',
        ], [
            'receipt_number.required' => 'رقم الايصال مطلوب',
            'receipt_date.required' => 'تاريخ الايصال مطلوب',
            'receipt_payer_name.required' => 'أسم المسدد مطلوب',
            'receipt_payment_amount.required' => 'المبلغ المدفوع مطلوب',
            'receipt_from_date.required' => 'الحقل مطلوب',
            'receipt_to_date.required' => 'الحقل مطلوب',
            'receipt_attach.required' => 'ملف الايصال مطلوب',
        ]);

        $Validation['user_id'] = Auth::User()->id;
        $Validation['buyer_tenant_id'] = $this->BuyerTenantid;
        $Validation['property_number'] = $this->RealPropertyNumber;
        $Validation['receipt_notes'] = $this->receipt_notes;
        $Validation['receipt_type'] = $this->BuyerTenant['buyer_tenant_type'] == 'buyer' ? 'بيع':'ايجار';

        if($this->attachFile){
            if(file_exists(public_path('storage/Real-Property/Payment-Receipts/'.$this->RealPropertyNumber.'/'.$this->BuyerTenantid.'/'.$this->old_receipt_attach)))
            {
                unlink(public_path('storage/Real-Property/Payment-Receipts/'.$this->RealPropertyNumber.'/'.$this->BuyerTenantid.'/'.$this->old_receipt_attach));
            }

            $Validation['receipt_attach'] = $this->attachFile->hashName();
            $this->attachFile->store('public/Real-Property/Payment-Receipts/'.$this->RealPropertyNumber.'/'.$this->BuyerTenantid);
        }

        $this->SaleTenantReceipt->update($Validation);

        $this->reset('receipt_number', 'receipt_date', 'receipt_payer_name', 'receipt_payment_amount', 'receipt_from_date', 'receipt_to_date', 'receipt_notes', 'receipt_attach', 'attachFile');

        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }
}

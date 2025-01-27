<?php

namespace App\Http\Livewire\RealProperties;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Realities\Realities;
use App\Models\RealProperty\BuyerTenant;
use App\Models\RealProperty\SaleTenantReceipts;

class ShowBuyerTenant extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $RealPropertyNumber, $BuyerTenantid;
    public $Realities = [];
    public $BuyerTenant = [];
    public $SaleTenantReceipts = [];
    public $SaleTenantReceipt, $receipt_number, $receipt_date, $receipt_payer_name, $receipt_payment_amount, $receipt_from_date, $receipt_to_date, $receipt_notes;

    public function mount()
    {
        $this->BuyerTenant = BuyerTenant::find($this->BuyerTenantid);
        $this->Realities = Realities::where('property_number', $this->RealPropertyNumber)->first();
        //dd($this->Realities);
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

    public function GetSaleTenantReceipt($receiptId)
    {
        $this->SaleTenantReceipt = SaleTenantReceipts::find($receiptId);

        $this->receipt_number = $this->SaleTenantReceipt->receipt_number;
        $this->receipt_date = $this->SaleTenantReceipt->receipt_date;
        $this->receipt_payer_name = $this->SaleTenantReceipt->receipt_payer_name;
        $this->receipt_payment_amount = $this->SaleTenantReceipt->receipt_payment_amount;
        $this->receipt_from_date = $this->SaleTenantReceipt->receipt_from_date;
        $this->receipt_to_date = $this->SaleTenantReceipt->receipt_to_date;
        $this->receipt_notes = $this->SaleTenantReceipt->receipt_notes;
    }
}

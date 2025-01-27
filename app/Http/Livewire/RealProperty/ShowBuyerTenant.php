<?php

namespace App\Http\Livewire\RealProperty;

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

    public function mount()
    {
        $this->BuyerTenant = BuyerTenant::find($this->BuyerTenantid);
        $this->Realities = Realities::where('property_number', $this->RealPropertyNumber)->first();

    }

    public function render()
    {
        $SaleTenantReceipts = SaleTenantReceipts::where('buyer_tenant_id', $this->BuyerTenantid)->
            where('buyer_tenant_id', $this->BuyerTenantid)->
            orderBy('receipt_date', 'ASC')->
            paginate(10);

        $links = $SaleTenantReceipts;
        $this->SaleTenantReceipts = collect($SaleTenantReceipts->items());

        return view('livewire.real-property.show-buyer-tenant', [
            'links' => $links,
        ]);
    }
}

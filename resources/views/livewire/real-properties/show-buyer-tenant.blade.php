<div class="mt-n4">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-2">
                <a href="{{ route('ShowRealProperty', ['Plotid' => $Realities->plot_id]) }}"
                    class="text-muted fw-light">الاسكان
                    <span class="mdi mdi-chevron-left mdi-24px"></span></a>
                نافذةالوصولات
            </h4>

            <div class="alert alert-outline-secondary pb-0 border-2" role="alert">
                <h5 class="d-flex justify-content-around">
                    <div>
                        <strong>رقم واسم المقاطعة : </strong>
                        <span class="text-danger">
                            {{ $Realities->GetProvinces->province_number ?? '' }} -
                            {{ $Realities->GetProvinces->province_name ?? '' }}
                        </span>
                    </div>
                    <div>
                        <strong>رقم القطعة : </strong>
                        <span class="text-danger">{{ $Realities->GetPlots->plot_number ?? '' }}</span>
                    </div>
                    <div>
                        <strong>رقم العقار : </strong>
                        <span class="text-danger">{{ $Realities->property_number ?? '' }}</span>
                    </div>

                    <strong class="text-warning" style="margin: 0 10px;">/</strong>

                    <div>
                        <strong>أسم
                            {{ $BuyerTenant ? ($BuyerTenant->buyer_tenant_type == 'مشتري' ? 'المشتري' : 'المستأجر') : '' }}
                            : </strong>
                        <span class="text-danger">
                            {{ $BuyerTenant->buyer_tenant_name ?? '' }}
                        </span>
                    </div>
                    <div>
                        <strong>رقم الحاسبة : </strong>
                        <span class="text-danger">
                            {{ $BuyerTenant->buyer_calculator_number ?? '' }}
                        </span>
                    </div>
                </h5>

                <hr>
                
                <h5 class="d-flex justify-content-around">
                    <div>
                        <strong>المبلغ الصافي : </strong>
                        <span class="text-danger">
                            {{ number_format($BuyerTenant->net_amount ?? 0) }}
                        </span>
                    </div>
                    <div>
                        <strong>المبلغ المسدد : </strong>
                        <span class="text-danger">
                            {{ number_format($totalPaid ?? 0) }}
                        </span>
                    </div>
                    <div>
                        <strong>المبلغ المتبقي : </strong>
                        <span class="text-danger">
                            {{ number_format($remainingAmount ?? 0) }}
                        </span>
                    </div>
                </h5>
            </div>
        </div>
        @can('tenant-receipt-list')
            <div class="table-responsive">
                <table class="table">
                    <thead class="">
                        <tr>
                            <th>#</th>
                            <th class="text-center">رقم الوصل</th>
                            <th class="text-center">تاريخ الوصل</th>
                            <th class="text-center">مبلغ التسديد</th>
                            <th class="text-center">من تاريخ</th>
                            <th class="text-center">الى تاريخ</th>
                            <th class="text-center">الاجراءات</th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.receipt_number" class="form-control"
                                    placeholder="بحث برقم الوصل .." onkeypress="return onlyNumberKey(event)"
                                    wire:key="search_receipt_number">
                            </th>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.receipt_date" class="form-control"
                                    placeholder="بحث بتاريخ الوصل .." wire:key="search_receipt_date">
                            </th>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.receipt_payment_amount"
                                    class="form-control" placeholder="بحث بمبلغ التسديد .."
                                    onkeypress="return onlyNumberKey(event)" wire:key="search_receipt_payment_amount">
                            </th>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.receipt_from_date"
                                    class="form-control" placeholder="بحث من تاريخ .." wire:key="search_receipt_from_date">
                            </th>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.receipt_to_date"
                                    class="form-control" placeholder="بحث الى تاريخ .." wire:key="search_receipt_to_date">
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($SaleTenantReceipts as $index => $SaleTenantReceipt)
                            <tr>
                                <td>{{ $links->firstItem() + $index }}</td>
                                <td class="text-center">{{ $SaleTenantReceipt->receipt_number }}</td>
                                <td class="text-center text-nowrap">{{ $SaleTenantReceipt->receipt_date }}</td>
                                <td class="text-center ls-1">
                                    {{ number_format($SaleTenantReceipt->receipt_payment_amount) }}</td>
                                <td class="text-center text-nowrap">{{ $SaleTenantReceipt->receipt_from_date }}</td>
                                <td class="text-center text-nowrap">{{ $SaleTenantReceipt->receipt_to_date }}</td>
                                <td class="text-end">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('tenant-receipt-edit')
                                            <button wire:click="GetSaleTenantReceipt({{ $SaleTenantReceipt->id }})"
                                                class="p-0 px-1 btn btn-text-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editSaleTenantReceiptModal">
                                                <i class="mdi mdi-text-box-edit-outline fs-3"></i>
                                            </button>
                                        @endcan
                                        @can('tenant-receipt-delete')
                                            <button wire:click="GetSaleTenantReceipt({{ $SaleTenantReceipt->id }})"
                                                class="p-0 px-1 btn btn-text-danger waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#removeSaleTenantReceiptModal">
                                                <i class="mdi mdi-delete-outline fs-3"></i>
                                            </button>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-2 d-flex justify-content-center">
                    {{ $links->onEachSide(1)->links() }}
                </div>
                <!-- Modal -->
                @include('livewire.real-properties.modals.edit-sale-tenant-receipt')
                @include('livewire.real-properties.modals.remove-sale-tenant-receipt')
                <!-- Modal -->
            </div>
        @endcan
    </div>
</div>

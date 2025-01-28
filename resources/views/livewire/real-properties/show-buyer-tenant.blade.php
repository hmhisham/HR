<div class="mt-n4">
    <div class="card">
        <div class="card-header">
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
                </h5>
            </div>

            <div class="alert alert-outline-secondary pb-0 border-2" role="alert">
                <h5 class="d-flex justify-content-around">
                    <div>
                        <strong>أسم {{ $BuyerTenant ? $BuyerTenant->buyer_tenant_type == 'buyer' ? 'المشتري':'المستأجر' : '' }} : </strong>
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
                            <th class="text-center">أسم المسدد</th>
                            <th class="text-center">مبلغ التسديد</th>
                            <th class="text-center">من تاريخ</th>
                            <th class="text-center">الى تاريخ</th>
                            <th class="text-center">الملاحظات</th>
                            <th class="text-center">الاجراءات</th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.property_number"
                                    class="form-control" placeholder="بحث برقم السند العقاري .." wire:key="search_property_number">
                            </th>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.count" class="form-control"
                                    placeholder="بحث بالعدد .." wire:key="search_count">
                            </th>
                            <th>
                                <select wire:model.debounce.300ms="search.mortgage_notes" class="form-select" wire:key="search_mortgage_notes">
                                    <option value="">اختر</option>
                                    <option value="رفع الحجز">رفع الحجز</option>
                                    <option value="عدم التصرف بالعقار الا بموافقة الموانئ">عدم التصرف بالعقار الا بموافقة
                                        الموانئ</option>
                                </select>
                            </th>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.volume_number" class="form-control"
                                    placeholder="بحث بالجلد .." wire:key="search_volume_number">
                            </th>
                            <th>
                                <select wire:model.debounce.300ms="search.visibility" class="form-select" wire:key="search_visibility">
                                    <option value="">اختر</option>
                                    <option value="1">نعم</option>
                                    <option value="0">لا</option>
                                </select>
                            </th>
                            <th>
                                <select wire:model.debounce.300ms="search.visibility" class="form-select" wire:key="search_visibility">
                                    <option value="">اختر</option>
                                    <option value="1">نعم</option>
                                    <option value="0">لا</option>
                                </select>
                            </th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($SaleTenantReceipts as $index => $SaleTenantReceipt)
                            <tr>
                                <td>{{ $links->firstItem() + $index }}</td>
                                <td class="text-center">{{ $SaleTenantReceipt->receipt_number }}</td>
                                <td class="text-center text-nowrap">{{ $SaleTenantReceipt->receipt_date }}</td>
                                <td class="text-center">{{ $SaleTenantReceipt->receipt_payer_name }}</td>
                                <td class="text-center ls-1">{{ number_format($SaleTenantReceipt->receipt_payment_amount) }}</td>
                                <td class="text-center text-nowrap">{{ $SaleTenantReceipt->receipt_from_date }}</td>
                                <td class="text-center text-nowrap">{{ $SaleTenantReceipt->receipt_to_date }}</td>
                                <td class="text-center">{{ $SaleTenantReceipt->receipt_notes }}</td>
                                <td class="text-end">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('tenant-receipt-edit')
                                            <button wire:click="GetSaleTenantReceipt({{ $SaleTenantReceipt->id }})"
                                                class="p-0 px-1 btn btn-text-success waves-effect"
                                                data-bs-toggle="modal" data-bs-target="#editTenantReceiptModal">
                                                <i class="mdi mdi-text-box-edit-outline fs-3"></i>
                                            </button>
                                        @endcan
                                        @can('tenant-receipt-delete')
                                        <button wire:click="GetSaleTenantReceipt({{ $SaleTenantReceipt->id }})"
                                            class="p-0 px-1 btn btn-text-danger waves-effect"
                                            data-bs-toggle="modal" data-bs-target="#removeTenantReceiptModal">
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
                {{-- @include('livewire.real-properties.modals.add-buyer-tenant') --}}
                <!-- Modal -->
            </div>
        @endcan
    </div>
</div>

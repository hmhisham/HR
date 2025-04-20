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
                        <strong>أسم
<<<<<<< HEAD
                            {{ $BuyerTenant ? ($BuyerTenant->buyer_tenant_type == 'مشتري' ? 'المشتري' : 'المستأجر') : '' }}
=======
                            {{ $BuyerTenant ? ($BuyerTenant->buyer_tenant_type == 'buyer' ? 'المشتري' : 'المستأجر') : '' }}
>>>>>>> 00f11ddd74f76cbca93548f9f3b4de63da9f751c
                            : </strong>
                        <span class="text-danger">
                            {{ $BuyerTenant->buyer_tenant_name ?? '' }}
                        </span>
                    </div>
                    <div>
                        <strong>رقم الحاسبة : </strong>
                        <span class="text-danger">
                            {{ $BuyerTenant->buyer_computer_number ?? '' }}
                        </span>
                    </div>
                </h5>
            </div>

            <div class="alert alert-outline-primary pb-0 border-2" role="alert">
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
<<<<<<< HEAD
                                <input type="text" wire:model.debounce.300ms="search.receipt_number"
                                    class="form-control" placeholder="بحث برقم الوصل .." onkeypress="return onlyNumberKey(event)"
                                    wire:key="search_receipt_number">
=======
                                <input type="text" wire:model.debounce.300ms="search.property_number"
                                    class="form-control" placeholder="بحث برقم السند العقاري .."
                                    wire:key="search_property_number">
>>>>>>> 00f11ddd74f76cbca93548f9f3b4de63da9f751c
                            </th>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.receipt_date" class="form-control"
                                    placeholder="بحث بتاريخ الوصل .." wire:key="search_receipt_date">
                            </th>
                            <th>
<<<<<<< HEAD
                                <input type="text" wire:model.debounce.300ms="search.receipt_payment_amount" class="form-control"
                                    placeholder="بحث بمبلغ التسديد .." onkeypress="return onlyNumberKey(event)" wire:key="search_receipt_payment_amount">
=======
                                <select wire:model.debounce.300ms="search.mortgage_notes" class="form-select"
                                    wire:key="search_mortgage_notes">
                                    <option value="">اختر</option>
                                    <option value="رفع الحجز">رفع الحجز</option>
                                    <option value="عدم التصرف بالعقار الا بموافقة الموانئ">عدم التصرف بالعقار الا بموافقة
                                        الموانئ</option>
                                </select>
>>>>>>> 00f11ddd74f76cbca93548f9f3b4de63da9f751c
                            </th>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.receipt_from_date" class="form-control"
                                    placeholder="بحث من تاريخ .." wire:key="search_receipt_from_date">
                            </th>
                            <th>
<<<<<<< HEAD
                                <input type="text" wire:model.debounce.300ms="search.receipt_to_date" class="form-control"
                                    placeholder="بحث الى تاريخ .." wire:key="search_receipt_to_date">
                            </th>
=======
                                <select wire:model.debounce.300ms="search.visibility" class="form-select"
                                    wire:key="search_visibility">
                                    <option value="">اختر</option>
                                    <option value="1">نعم</option>
                                    <option value="0">لا</option>
                                </select>
                            </th>
                            <th>
                                <select wire:model.debounce.300ms="search.visibility" class="form-select"
                                    wire:key="search_visibility">
                                    <option value="">اختر</option>
                                    <option value="1">نعم</option>
                                    <option value="0">لا</option>
                                </select>
                            </th>
                            <th></th>
>>>>>>> 00f11ddd74f76cbca93548f9f3b4de63da9f751c
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($SaleTenantReceipts as $index => $SaleTenantReceipt)
                            <tr>
                                <td>{{ $links->firstItem() + $index }}</td>
                                <td class="text-center">{{ $SaleTenantReceipt->receipt_number }}</td>
                                <td class="text-center text-nowrap">{{ $SaleTenantReceipt->receipt_date }}</td>
<<<<<<< HEAD
=======
                                <td class="text-center">{{ $SaleTenantReceipt->receipt_payer_name }}</td>
>>>>>>> 00f11ddd74f76cbca93548f9f3b4de63da9f751c
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

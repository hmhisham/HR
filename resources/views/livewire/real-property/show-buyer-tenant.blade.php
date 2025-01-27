<div class="mt-n4">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            {{-- <h4 class="mb-2">
                <span class="text-muted fw-light">الأملاك<span
                        class="mdi mdi-chevron-left mdi-24px"></span></span>
                </span>
                عرض بيانات القطعة : <span class="text-danger">{{ $Plot->plot_number }}</span>
                <strong style="margin: 0 30px;">|</strong>
                ضمن المقاطعة : <span class="text-danger">{{ $Province->province_number }} -
                    {{ $Province->province_name }}</span>
            </h5>
            <div>
                @can('real-property-create')
                    <button wire:click='addRealProperty' class="mb-3 add-new btn btn-primary mb-md-0" data-bs-toggle="modal"
                        data-bs-target="#addRealPropertyModal">أضــافــة</button>
                    @include('livewire.real-properties.modals.add-real-property')
                @endcan
            </div> --}}
        </div>
        @can('real-property-list')
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
                            <th class="text-center">نوع الوصل</th>
                            <th class="text-center">الملاحظات</th>
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
                                <td class="text-center">{{ $SaleTenantReceipt->receipt_date }}</td>
                                <td class="text-center">{{ $SaleTenantReceipt->receipt_payer_name }}</td>
                                <td class="text-center">{{ $SaleTenantReceipt->receipt_payment_amount }}</td>
                                <td class="text-center">{{ $SaleTenantReceipt->receipt_from_date }}</td>
                                <td class="text-center">{{ $SaleTenantReceipt->receipt_to_date }}</td>
                                <td class="text-center">{{ $SaleTenantReceipt->receipt_type }}</td>
                                <td class="text-center">{{ $SaleTenantReceipt->receipt_notes }}</td>
                                <td class="text-end">
                                    <div class="btn-group" role="group" aria-label="First group">

                                        {{-- <button wire:click="GetRealProperty({{ $Reality->id }})"
                                                class="p-0 px-1 btn btn-text-success waves-effect"
                                                data-bs-toggle="modal" data-bs-target="#addBuyerTenantModal">
                                                <i class="mdi mdi-account-edit-outline fs-2"></i>
                                            </button>
                                            <button wire:click="GetRealProperty({{ $Reality->id }})"
                                                class="p-0 px-1 btn btn-text-danger waves-effect"
                                                data-bs-toggle="modal" data-bs-target="#addBuyerTenantModal">
                                                <i class="mdi mdi-account-remove-outline fs-2"></i>
                                            </button> --}}
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

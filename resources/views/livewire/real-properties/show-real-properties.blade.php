<div class="mt-n4">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="mb-2">
                    <a href="{{ route('RealProperty') }}"
                        class="text-muted fw-light">الاسكان
                        <span class="mdi mdi-chevron-left mdi-24px"></span></a>
                عرض بيانات القطعة : <span class="text-danger">{{ $Plot->plot_number }}</span>
                <strong style="margin: 0 30px;">|</strong>
                ضمن المقاطعة : <span class="text-danger">{{ $Province->province_number }} -
                    {{ $Province->province_name }}</span>
            </h4>
        </div>
        @can('real-property-list')
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th class="text-center">رقم السند العقاري</th>
                            <th class="text-center">إشارات التأمينات</th>
                            <th class="text-center">اسم المشتري او المستاجر</th>
                            <th class="text-center">النوع</th>
                            <th class="text-center">المبلغ الصافي</th>
                            <th class="text-center">المبلغ المتبقي</th>
                            <th class="text-center">العملية</th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.property_number"
                                    onkeypress="return onlyNumberKey(event)" class="form-control"
                                    placeholder="بحث برقم السند العقاري .." wire:key="search_property_number">
                            </th>
                            <th>
                                <select wire:model.debounce.300ms="search.mortgage_notes" class="form-select"
                                    wire:key="search_mortgage_notes">
                                    <option value="">اختر</option>
                                    <option value="رفع الحجز">رفع الحجز</option>
                                    <option value="عدم التصرف بالعقار الا بموافقة الموانئ">عدم التصرف بالعقار الا بموافقة
                                        الموانئ</option>
                                </select>
                            </th>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.buyer_tenant_name"
                                    class="form-control" onkeypress="return onlyArabicKey(event)"
                                    placeholder="بحث بالاسم .." wire:key="search_buyer_tenant_name">
                            </th>
                            <th>
                                <select wire:model.debounce.300ms="search.buyer_tenant_type" class="form-select"
                                    wire:key="search_buyer_tenant_type">
                                    <option value="">الكل</option>
                                    <option value="مشتري">مشتري</option>
                                    <option value="مستأجر">مستأجر</option>
                                </select>
                            </th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($Realities as $Reality)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td class="text-center">{{ $Reality->property_number }}</td>
                                <td class="text-center">{{ $Reality->mortgage_notes }}</td>
                                <td class="text-center">
                                    @if ($Reality->GetBuyerTenant)
                                        <button wire:click="GetRealProperty({{ $Reality->id }})"
                                            class="p-0 px-1 btn btn-text-primary waves-effect" data-bs-toggle="modal"
                                            data-bs-target="#editBuyerTenantModal">
                                            {{ $Reality->GetBuyerTenant->buyer_tenant_name }}
                                        </button>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($Reality->GetBuyerTenant)
                                        {{ $Reality->GetBuyerTenant->buyer_tenant_type }}
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($Reality->GetBuyerTenant)
                                        {{ number_format($Reality->GetBuyerTenant->net_amount) }}
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($Reality->GetBuyerTenant)
                                        @php
                                            $totalPaid = App\Models\RealProperty\SaleTenantReceipts::where(
                                                'buyer_tenant_id',
                                                $Reality->GetBuyerTenant->id,
                                            )->sum('receipt_payment_amount');
                                            $remainingAmount = $Reality->GetBuyerTenant->net_amount - $totalPaid;
                                        @endphp
                                        @if ($remainingAmount !== null)
                                            <span class="text-{{ $remainingAmount <= 0 ? 'success' : 'danger' }}">
                                                {{ number_format($remainingAmount) }}
                                            </span>
                                        @endif
                                    @endif
                                </td>
                                <td class="text-end">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @php
                                            $buyer_tenant = App\Models\RealProperty\BuyerTenant::where(
                                                'property_number',
                                                $Reality->id,
                                            )->first();
                                            $RealEstateStatement = '';
                                        @endphp
                                        @if (!$buyer_tenant)
                                            @can('real-property-buyer_tenant')
                                                <button wire:click="GetRealProperty({{ $Reality->id }})"
                                                    class="p-0 px-1 btn btn-text-primary waves-effect" data-bs-toggle="modal"
                                                    data-bs-target="#addBuyerTenantModal">
                                                    <i class="mdi mdi-account-plus-outline fs-3"></i>
                                                </button>
                                            @endcan
                                        @else
                                            @can('real-property-rent')
                                                @if ($buyer_tenant->buyer_tenant_type == 'مشتري' || $buyer_tenant->buyer_tenant_type == 'مستأجر')
                                                    @php
                                                        $totalPaid = App\Models\RealProperty\SaleTenantReceipts::where(
                                                            'buyer_tenant_id',
                                                            $Reality->GetBuyerTenant->id,
                                                        )->sum('receipt_payment_amount');
                                                        $remainingAmount =
                                                            $Reality->GetBuyerTenant->net_amount - $totalPaid;
                                                    @endphp
                                                    <button wire:click="GetRealProperty({{ $Reality->id }})"
                                                        class="p-0 px-1 btn btn-text-primary waves-effect"
                                                        data-bs-toggle="modal" data-bs-target="#saleTenantReceiptModal"
                                                        {{ $remainingAmount <= 0 ? 'disabled' : '' }}
                                                        title="{{ $remainingAmount <= 0 ? 'تم تسديد المبلغ بالكامل' : '' }}">
                                                        <i class="mdi mdi-file-document-plus-outline fs-3"></i>
                                                    </button>
                                                @endif
                                            @endcan
                                            @can('upload_property-files')
                                                <button wire:click="openUploadFiles({{ $Reality->id }})"
                                                    class="p-0 px-1 btn btn-text-primary waves-effect" data-bs-toggle="modal"
                                                    data-bs-target="#uploadFilesModal">
                                                    <i class="mdi mdi-paperclip-plus fs-3"></i>
                                                </button>
                                            @endcan
                                            @can('show-buyer-tenant')
                                                <a href="{{ route('ShowBuyerTenant', [$Reality->id, $buyer_tenant->id]) }}"
                                                    class="p-0 px-1 btn btn-text-primary waves-effect">
                                                    <i class="mdi mdi-eye-outline fs-2"></i>
                                                </a>
                                            @endcan
                                        @endif
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
                @include('livewire.real-properties.modals.add-buyer-tenant')
                @include('livewire.real-properties.modals.edit-buyer-tenant')
                @include('livewire.real-properties.modals.sale-tenant-receipt')
                @include('livewire.real-properties.modals.upload-files')
                <!-- Modal -->
            </div>
        @endcan
    </div>
</div>

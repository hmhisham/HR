<div class="mt-n4">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="mb-2">
                <span class="text-muted fw-light">الأملاك<span
                        class="mdi mdi-chevron-left mdi-24px"></span></span>
                </span>
                عرض بيانات القطعة : <span class="text-danger">{{ $Plot->plot_number }}</span>
                <strong style="margin: 0 30px;">|</strong>
                ضمن المقاطعة : <span class="text-danger">{{ $Province->province_number }} -
                    {{ $Province->province_name }}</span>
            </h5>
            {{-- <div>
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
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th class="text-center">رقم السند العقاري</th>
                            <th class="text-center">العدد</th>
                            <th class="text-center">إشارات التأمينات</th>
                            <th class="text-center">الجلد</th>
                            <th class="text-center">العملية</th>
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
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($Realities as $Reality)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td class="text-center">{{ $Reality->property_number }}</td>
                                <td class="text-center">{{ $Reality->count }}</td>
                                <td class="text-center">{{ $Reality->mortgage_notes }}</td>
                                <td class="text-center">{{ $Reality->volume_number }}</td>
                                <td class="text-end">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @php
                                            $buyer_tenant = App\Models\RealProperty\BuyerTenant::where('property_number', $Reality->property_number)->first();
                                            $RealEstateBondsSaleRental = App\Models\RealProperty\RealEstateBondsSaleRental::where('property_number', $Reality->property_number)->first();

                                            if($RealEstateBondsSaleRental){
                                                $RealEstateStatement = $RealEstateBondsSaleRental->real_estate_statement;
                                            }else{
                                                $RealEstateStatement = '';
                                            }
                                        @endphp
                                        @if (!$buyer_tenant)
                                            @can('real-property-buyer_tenant')
                                                <button wire:click="GetRealProperty({{ $Reality->id }})"
                                                    class="p-0 px-1 btn btn-text-primary waves-effect"
                                                    data-bs-toggle="modal" data-bs-target="#addBuyerTenantModal">
                                                    <i class="mdi mdi-account-plus-outline fs-3"></i>
                                                </button>
                                            @endcan
                                        @else
                                            @can('real-property-sale')
                                                @if ($buyer_tenant->buyer_tenant_type =='buyer' && $RealEstateStatement != 'مباع')
                                                    <button wire:click="GetRealProperty({{ $Reality->id }})"
                                                        class="p-0 px-1 btn btn-text-primary waves-effect"
                                                        data-bs-toggle="modal" data-bs-target="#saleRealPropertyModal">
                                                        <i class="mdi mdi-text-box-outline fs-3"></i>
                                                    </button>
                                                @endif
                                            @endcan
                                            @can('real-property-rent')
                                                @if ($buyer_tenant->buyer_tenant_type == 'buyer' || $buyer_tenant->buyer_tenant_type == 'tenant')
                                                    <button wire:click="GetRealProperty({{ $Reality->id }})"
                                                        class="p-0 px-1 btn btn-text-primary waves-effect {{ $Reality->active ? 'disabled' : '' }}"
                                                        data-bs-toggle="modal" data-bs-target="#saleTenantReceiptModal">
                                                        <i class="mdi mdi-file-document-plus-outline fs-3"></i>
                                                    </button>
                                                @endif
                                            @endcan

                                            <a href="{{ route('ShowBuyerTenant', [$Reality->property_number, $buyer_tenant->id]) }}"
                                                class="p-0 px-1 btn btn-text-primary waves-effect">
                                                <i class="mdi mdi-eye-outline fs-2"></i>
                                            </a>
                                            {{-- <button wire:click="GetRealProperty({{ $Reality->id }})"
                                                class="p-0 px-1 btn btn-text-success waves-effect"
                                                data-bs-toggle="modal" data-bs-target="#addBuyerTenantModal">
                                                <i class="mdi mdi-text-box-edit-outline fs-3"></i>
                                            </button>
                                            <button wire:click="GetRealProperty({{ $Reality->id }})"
                                                class="p-0 px-1 btn btn-text-danger waves-effect"
                                                data-bs-toggle="modal" data-bs-target="#addBuyerTenantModal">
                                                <i class="mdi mdi-delete-outline fs-3"></i>
                                            </button> --}}
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
                @include('livewire.real-properties.modals.sale-tenant-receipt')
                @include('livewire.real-properties.modals.sale-real-property')
                @include('livewire.real-properties.modals.tenant-real-property')
                {{-- @include('livewire.realities.modals.edit-realitie')
                @include('livewire.realities.modals.remove-realitie') --}}
                <!-- Modal -->
            </div>
        @endcan
    </div>
</div>

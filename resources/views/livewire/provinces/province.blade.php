<div class="mt-n4">

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h4 class="mb-2">
                    <span class="text-muted fw-light">الاملاك والاراضي<span
                            class="mdi mdi-chevron-left mdi-24px"></span></span>
                    المقاطعات
                </h4>
                <div>
                    @can('province-create')
                        <button wire:click='AddProvinceModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addprovinceModal">أضــافــة</button>
                        @include('livewire.provinces.modals.add-province')
                    @endcan
                </div>
            </div>
        </div>
        @can('province-list')
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>ت</th>
                            <th class="text-center">رقم المقاطعة</th>
                            <th class="text-center">اسم المقاطعة</th>
                            <th class="text-center">العملية</th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.province_number"
                                    class="form-control" placeholder="بحث برقم المقاطعة .."
                                    wire:key="search_province_number">
                            </th>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.province_name" class="form-control"
                                    placeholder="بحث اسم المقاطعة .." wire:key="search_province_name">
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = $links->perPage() * ($links->currentPage() - 1) + 1;
                        @endphp
                        @foreach ($Provinces as $Province)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td class="text-center">{{ $Province->province_number }}</td>
                                <td class="text-center">{{ $Province->province_name }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('province-edit')
                                            <button wire:click="GetProvince({{ $Province->id }})"
                                                class="p-0 px-1 btn btn-text-primary waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editprovinceModal">
                                                <i class="mdi mdi-text-box-plus-outline fs-3"></i>
                                            </button>
                                        @endcan

                                        @can('province-delete')
                                            <strong style="margin: 0 10px;">|</strong>
                                            <button wire:click="GetProvince({{ $Province->id }})"
                                                class="p-0 px-1 btn btn-text-danger waves-effect {{ $Province->active ? 'disabled' : '' }}"
                                                data-bs-toggle = "modal" data-bs-target="#removeprovinceModal">
                                                <i class="tf-icons mdi mdi-delete-outline fs-3"></i>
                                            </button>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-2 d-flex justify-content-center">
                {{ $links->onEachSide(1)->links() }}
            </div>
            <!-- Modal -->
            @include('livewire.provinces.modals.edit-province')
            @include('livewire.provinces.modals.remove-province')
            <!-- Modal -->
        @endcan
    </div>
</div>

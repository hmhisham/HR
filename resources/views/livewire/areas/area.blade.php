<div class="mt-n4">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="mb-2">
                <span class="text-muted fw-light">الإعدادات <span class="mdi mdi-chevron-left mdi-24px"></span></span>
                النواحي
            </h4>
            <div>
                @can('area-create')
                    <button wire:click='AddAreaModalShow' class="mb-3 add-new btn btn-primary mb-md-0" data-bs-toggle="modal"
                        data-bs-target="#addareaModal">أضــافــة</button>
                    @include('livewire.areas.modals.add-area')
                @endcan
            </div>
        </div>
        @can('area-list')
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>ت</th>
                            <th Class="text-center">اسم المحافظة</th>
                            <th Class="text-center">اسم القضاء</th>
                            <th Class="text-center">رقم الناحية</th>
                            <th Class="text-center">اسم الناحية</th>
                            <th Class="text-center">العملية</th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.governorate_name"
                                    class="form-control" placeholder="بحث المحافظة ..">
                            </th>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.district_name" class="form-control"
                                    placeholder="بحث باسم القضاء ..">
                            </th>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.area_id" class="form-control"
                                    placeholder="بحث برقم الناحية ..">
                            </th>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.area_name" class="form-control"
                                    placeholder="بحث باسم الناحية ..">
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = $links->perPage() * ($links->currentPage() - 1) + 1;
                        @endphp
                        @foreach ($Areas as $Area)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td class="text-center">
                                    {{ $Area->GetGovernorate ? $Area->GetGovernorate->governorate_name : '' }}</td>
                                <td class="text-center">
                                    {{ $Area->GetDistrict ? $Area->GetDistrict->district_name : '' }}</td>
                                <td Class="text-center">{{ $Area->area_id }}</td>
                                <td Class="text-center">{{ $Area->area_name }}</td>
                                <td Class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('area-edit')
                                            <button wire:click="GetArea({{ $Area->id }})"
                                                class="p-0 px-1 btn btn-text-primary waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editareaModal">
                                                <i class="mdi mdi-text-box-edit-outline fs-3"></i>
                                            </button>
                                        @endcan
                                        <strong style="margin: 0 10px;">|</strong>
                                        @can('area-delete')
                                            <button wire:click="GetArea({{ $Area->id }})"
                                                class="p-0 px-1 btn btn-text-danger waves-effect {{ $Area->active ? 'disabled' : '' }}"
                                                data-bs-toggle = "modal" data-bs-target="#removeareaModal">
                                                <i class="tf-icons mdi mdi-delete-outline fs-3"></i>
                                            </button>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-2 d-flex justify-content-center">
                    {{ $links->onEachSide(0)->links() }}
                </div>
            </div>
            @include('livewire.areas.modals.edit-area')
            @include('livewire.areas.modals.remove-area')
        @endcan
    </div>
</div>

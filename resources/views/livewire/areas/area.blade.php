<div class="mt-n4">
    <h4 class="mb-2">
        <span class="text-muted fw-light">الإعدادات <span class="mdi mdi-chevron-left mdi-24px"></span></span> النواحي
    </h4>

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <input wire:model="AreaSearch" type="text" class="form-control" placeholder="بحث...">
                </div>
                <div>
                    @can('area-create')
                        <button wire:click='AddAreaModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addareaModal">أضــافــة</button>
                        @include('livewire.areas.modals.add-area')
                    @endcan
                </div>
            </div>
        </div>

        <div class="card-body">
            @can('area-list')
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th Class="text-center">اسم المحافظة</th>
                            <th Class="text-center">اسم القضاء</th>
                            <th Class="text-center">رقم الناحية</th>
                            <th Class="text-center">اسم الناحية</th>
                            <th Class="text-center">العملية</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Areas as $Area)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-center">
                                    {{ $Area->GetGovernorate ? $Area->GetGovernorate->governorate_name : '' }}</td>
                                <td class="text-center">{{ $Area->GetDistrict ? $Area->GetDistrict->district_name : '' }}
                                </td>
                                <td Class="text-center">{{ $Area->area_id }}</td>
                                <td Class="text-center">{{ $Area->area_name }}</td>
                                {{-- {{ dd($Area->GetDistrict) }} --}}
                                <td Class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('area-edit')
                                            <button wire:click="GetArea({{ $Area->id }})"
                                                class="p-0 px-1 btn btn-text-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editareaModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        @endcan
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
                    {{ $links->links() }}
                </div>
                <!-- Modal -->
                @include('livewire.areas.modals.edit-area')
                @include('livewire.areas.modals.remove-area')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>

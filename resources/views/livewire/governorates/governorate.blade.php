<div class="mt-n4">
    <h4 Class="mb-1fw-semiboyld">قائمة</h4>
    <Div Class="card">

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="GovernorateSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        @can('governorate-create')
                            <button wire:click='AddGovernorateModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addgovernorateModal">أضــافــة</button>
                            @include('livewire.governorates.modals.add-governorate')
                        @endcan
                    </div>
                </div>
            </div>
            @can('governorate-list')
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th Class="text-center">رقم المحافظة</th>
                            <th Class="text-center">اسم المحافظة</th>
                            <th Class="text-center">العملية</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Governorates as $Governorate)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td Class="text-center">{{ $Governorate->governorate_number }}</td>
                                <td Class="text-center">{{ $Governorate->governorate_name }}</td>

                                <td Class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('governorate-edit')
                                            <button wire:click="GetGovernorate({{ $Governorate->id }})"
                                                class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editgovernorateModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        @endcan
                                        @can('governorate-delete')
                                            <button wire:click="GetGovernorate({{ $Governorate->id }})"
                                                class="p-0 px-1 btn btn-outline-danger waves-effect {{ $Governorate->active ? 'disabled' : '' }}"
                                                data-bs-toggle = "modal" data-bs-target="#removegovernorateModal">
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
                @include('livewire.governorates.modals.edit-governorate')
                @include('livewire.governorates.modals.remove-governorate')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>
</div>

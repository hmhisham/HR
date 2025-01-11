<div class="mt-n4">
    <h4 class="mb-2">
        <span class="text-muted fw-light">الإعدادات <span class="mdi mdi-chevron-left mdi-24px"></span></span> المحافظات
    </h4>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 mb-3">
                    <input wire:model="GovernorateSearch" type="text" class="form-control" placeholder="بحث...">
                </div>
                <div class="col-12 col-sm-12 col-md-6 mb-3 ms-auto text-end">
                    @can('governorate-create')
                        <button wire:click='AddGovernorateModalShow' class="add-new btn btn-primary"
                            data-bs-toggle="modal" data-bs-target="#addgovernorateModal">أضــافــة</button>
                        @include('livewire.governorates.modals.add-governorate')
                    @endcan
                </div>
            </div>
        </div>

        <div class="card-body">
            @can('governorate-list')
                <div class="table-responsive">
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
                                                    class="p-0 px-1 btn btn-text-primary waves-effect" data-bs-toggle="modal"
                                                    data-bs-target="#editgovernorateModal">
                                                    <i class="mdi mdi-text-box-plus-outline fs-3"></i>
                                                </button>
                                            @endcan
                                            <strong style="margin: 0 10px;">|</strong>
                                            @can('governorate-delete')
                                                <button wire:click="GetGovernorate({{ $Governorate->id }})"
                                                    class="p-0 px-1 btn btn-text-danger waves-effect {{ $Governorate->active ? 'disabled' : '' }}"
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
                </div>
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

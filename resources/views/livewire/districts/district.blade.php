<div class="mt-n4">
    <h4 Class="mb-1fw-semiboyld">قائمة</h4>
    <Div Class="card">

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="DistrictSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        @can('district-create')
                            <button wire:click='AddDistrictModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#adddistrictModal">أضــافــة</button>
                            @include('livewire.districts.modals.add-district')
                        @endcan
                    </div>
                </div>
            </div>
            @can('district-list')
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th Class="text-center">اسم المحافظة</th>
                            <th Class="text-center">رقم القضاء</th>
                            <th Class="text-center">اسم القضاء</th>
                            <th Class="text-center">العملية</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Districts as $District)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $District->GetGovernorate ? $District->GetGovernorate->governorate_name : '' }}</td>
                                <td Class="text-center">{{ $District->district_number }}</td>
                                <td Class="text-center">{{ $District->district_name }}</td>

                                <td Class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('district-edit')
                                            <button wire:click="GetDistrict({{ $District->id }})"
                                                class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editdistrictModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        @endcan
                                        @can('district-delete')
                                            <button wire:click="GetDistrict({{ $District->id }})"
                                                class="p-0 px-1 btn btn-outline-danger waves-effect {{ $District->active ? 'disabled' : '' }}"
                                                data-bs-toggle = "modal" data-bs-target="#removedistrictModal">
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
                @include('livewire.districts.modals.edit-district')
                @include('livewire.districts.modals.remove-district')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>
</div>

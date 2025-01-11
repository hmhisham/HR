<div class="mt-n4">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div>
                <h5 class="mb-2">
                    <span class="text-muted fw-light">الإعدادات <span class="mdi mdi-chevron-left mdi-24px"></span></span>
                    المحافظات
                </h5>
            </div>
            <div>
                @can('governorate-create')
                    <button wire:click='AddGovernorateModalShow' class="add-new btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#addgovernorateModal">أضــافــة</button>
                    @include('livewire.governorates.modals.add-governorate')
                @endcan
            </div>
        </div>

        <div class="card-body">
            @can('governorate-list')
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th>ت</th>
                                <th Class="text-center">رقم المحافظة</th>
                                <th Class="text-center">اسم المحافظة</th>
                                <th Class="text-center">العملية</th>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>
                                    <input type="text" wire:model.debounce.300ms="search.governorate_number"
                                        class="form-control" placeholder="بحث برقم المحافظة ..">
                                </th>
                                <th>
                                    <input type="text" wire:model.debounce.300ms="search.governorate_name"
                                        class="form-control" placeholder="بحث باسم المحافظة ..">
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = $links->perPage() * ($links->currentPage() - 1) + 1;
                            @endphp
                            @foreach ($Governorates as $Governorate)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td Class="text-center">{{ $Governorate->governorate_number }}</td>
                                    <td Class="text-center">{{ $Governorate->governorate_name }}</td>

                                    <td Class="text-center">
                                        <div class="btn-group" role="group" aria-label="First group">
                                            @can('governorate-edit')
                                                <button wire:click="GetGovernorate({{ $Governorate->id }})"
                                                    class="p-0 px-1 btn btn-text-primary waves-effect" data-bs-toggle="modal"
                                                    data-bs-target="#editgovernorateModal">
                                                    <i class="mdi mdi-text-box-edit-outline fs-3"></i>
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
                    {{ $links->onEachSide(0)->links() }}
                </div>
                @include('livewire.governorates.modals.edit-governorate')
                @include('livewire.governorates.modals.remove-governorate')
            @endcan
        </div>
    </div>
</div>

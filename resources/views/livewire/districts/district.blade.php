<div class="mt-n4">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="mb-2">
                <span class="text-muted fw-light">الإعدادات <span class="mdi mdi-chevron-left mdi-24px"></span></span>
                الاقضية
            </h4>
            <div class="col-12 col-sm-12 col-md-6 mb-3 ms-auto text-end">
                @can('district-create')
                    <button wire:click='AddDistrictModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                        data-bs-toggle="modal" data-bs-target="#adddistrictModal">أضــافــة</button>
                    @include('livewire.districts.modals.add-district')
                @endcan
            </div>
        </div>

        @can('district-list')
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>ت</th>
                            <th Class="text-center">اسم المحافظة</th>
                            <th Class="text-center">رقم القضاء</th>
                            <th Class="text-center">اسم القضاء</th>
                            <th Class="text-center">العملية</th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.governorate_name"
                                    class="form-control" placeholder="بحث المحافظة ..">
                            </th>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.district_number"
                                    class="form-control" placeholder="بحث برقم القضاء ..">
                            </th>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.district_name" class="form-control"
                                    placeholder="بحث باسم القضاء ..">
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = $links->perPage() * ($links->currentPage() - 1) + 1;
                        @endphp
                        @foreach ($Districts as $District)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td class="text-center">
                                    {{ $District->Getgovernorate ? $District->Getgovernorate->governorate_name : '' }}
                                </td>
                                <td Class="text-center">{{ $District->district_number }}</td>
                                <td Class="text-center">{{ $District->district_name }}</td>

                                <td Class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('district-edit')
                                            <button wire:click="GetDistrict({{ $District->id }})"
                                                class="p-0 px-1 btn btn-text-primary waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editdistrictModal">
                                                <i class="mdi mdi-text-box-edit-outline fs-3"></i>
                                            </button>
                                        @endcan

                                        @can('district-delete')
                                            <strong style="margin: 0 10px;">|</strong>
                                            <button wire:click="GetDistrict({{ $District->id }})"
                                                class="p-0 px-1 btn btn-text-danger waves-effect {{ $District->active ? 'disabled' : '' }}"
                                                data-bs-toggle="modal" data-bs-target="#removedistrictModal">
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
            @include('livewire.districts.modals.edit-district')
            @include('livewire.districts.modals.remove-district')
        @endcan
    </div>
</div>

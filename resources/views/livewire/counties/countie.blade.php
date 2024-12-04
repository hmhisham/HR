<div class="mt-n4">
    <h4 class="mb-2">
        <span class="text-muted fw-light">الاراضي والاملاك <span class="mdi mdi-chevron-left mdi-24px"></span></span>المقاطعات
    </h4>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <input wire:model="countieSearch" type="text" class="form-control" placeholder="بحث...">
                </div>
                <div>
                    @can('countie-create')
                        <button wire:click='AddcountieModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addcountieModal">أضــافــة</button>
                        @include('livewire.counties.modals.add-countie')
                    @endcan
                </div>
            </div>
        </div>
        @can('countie-list')
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th class="text-center">رقم المستخدم</th>
                        <th class="text-center">رقم المقاطعة</th>
                        <th class="text-center">اسم المقاطعة</th>
                        <th class="text-center">العملية</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach ($Counties as $countie)
                        <tr>
                            <?php $i++; ?>
                            <td>{{ $i }}</td>
                            <td class="text-center">{{ $countie->user_id }}</td>
                            <td class="text-center">{{ $countie->district_number }}</td>
                            <td class="text-center">{{ $countie->district_name }}</td>

                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="First group">
                                    @can('countie-edit')
                                        <button wire:click="Getcountie({{ $countie->id }})"
                                            class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                            data-bs-target="#editcountieModal">
                                            <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                        </button>
                                    @endcan
                                    @can('countie-delete')
                                        <button wire:click="Getcountie({{ $countie->id }})"
                                            class="p-0 px-1 btn btn-outline-danger waves-effect {{ $countie->active ? 'disabled' : '' }}"
                                            data-bs-toggle = "modal" data-bs-target="#removecountieModal">
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
            @include('livewire.counties.modals.edit-countie')
            @include('livewire.counties.modals.remove-countie')
            <!-- Modal -->
        @endcan
    </div>
</div>

<div class="mt-n4">
    <h4 class="mb-2">
        <span class="text-muted fw-light">الموارد البشرية <span class="mdi mdi-chevron-left mdi-24px"></span></span> المنصب
    </h4>

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <input wire:model="PositionSearch" type="text" class="form-control" placeholder="بحث...">
                </div>
                <div>
                    @can('position-create')
                        <button wire:click='AddPositionModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addpositionModal">أضــافــة</button>
                        @include('livewire.positions.modals.add-position')
                    @endcan
                </div>
            </div>
        </div>

        <div class="card-body">
            @can('position-list')
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th class="text-center">الاسم</th>
                            <th class="text-center">اسم المنصب</th>
                            <th class="text-center">رقم امر التكليف</th>
                            <th class="text-center">العملية</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($Positions as $Position)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td class="text-center">{{ $Position->Getworker ? $Position->Getworker->full_name : '' }}</td>
                                <td class="text-center">{{ $Position->position_name }}</td>
                                <td class="text-center">{{ $Position->position_order_number }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('position-edit')
                                            <button wire:click="GetPosition({{ $Position->id }})"
                                                class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editpositionModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        @endcan
                                        @can('position-delete')
                                            <button wire:click="GetPosition({{ $Position->id }})"
                                                class="p-0 px-1 btn btn-outline-danger waves-effect {{ $Position->active ? 'disabled' : '' }}"
                                                data-bs-toggle = "modal" data-bs-target="#removepositionModal">
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
                @include('livewire.positions.modals.edit-position')
                @include('livewire.positions.modals.remove-position')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>

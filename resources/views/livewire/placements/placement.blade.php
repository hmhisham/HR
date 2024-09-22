<div class="mt-n4">
    <h4 class="mb-1 fw-semiboyld">قائمة</h4>
    <div class="card">

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="PlacementSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        @can('placement-create')
                            <button wire:click='AddPlacementModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addplacementModal">أضــافــة</button>
                            @include('livewire.placements.modals.add-placement')
                        @endcan
                    </div>
                </div>
            </div>
            @can('placement-list')
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th class="text-center">الاسم الكامل</th>
                            <th class="text-center">القسم</th>
                            <th class="text-center">رقم أمر التنسيب</th>
                            <th class="text-center">تاريخ أمر التنسيب</th>
                            <th class="text-center">العملية</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($Placements as $Placement)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td class="text-center">{{ $Placement->Getworker ? $Placement->Getworker->full_name : '' }}</td>
                                <td class="text-center">{{ $Placement->section_id }}</td>
                                <td class="text-center">{{ $Placement->placement_order_number }}</td>
                                <td class="text-center">{{ $Placement->placement_order_date }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('placement-edit')
                                            <button wire:click="GetPlacement({{ $Placement->id }})"
                                                class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editplacementModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        @endcan
                                        @can('placement-delete')
                                            <button wire:click="GetPlacement({{ $Placement->id }})"
                                                class="p-0 px-1 btn btn-outline-danger waves-effect {{ $Placement->active ? 'disabled' : '' }}"
                                                data-bs-toggle = "modal" data-bs-target="#removeplacementModal">
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
                @include('livewire.placements.modals.edit-placement')
                @include('livewire.placements.modals.remove-placement')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>
</div>

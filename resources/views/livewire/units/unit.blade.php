<div class="mt-n4">
    <h4 Class="mb-1fw-semiboyld">قائمة</h4>
    <div Class="card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="UnitSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        @can('unit-create')
                            <button wire:click='AddUnitModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addunitModal">أضــافــة</button>
                            @include('livewire.units.modals.add-unit')
                        @endcan
                    </div>
                </div>
            </div>
            @can('unit-list')
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th Class="text-center">اسم القسم</th>
                            <th Class="text-center">اسم الشعبة</th>
                            <th Class="text-center">اسم الوحدة</th>
                            <th Class="text-center">العملية</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($Units as $Unit)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td class="text-center">{{ $Unit->Getsection ? $Unit->Getsection->section_name : '' }}</td>
                                <td class="text-center">{{ $Unit->Getbranc ? $Unit->Getbranc->branch_name : '' }}</td>
                                <td Class="text-center">{{ $Unit->units_name }}</td>
                                <td Class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('unit-edit')
                                            <button wire:click="GetUnit({{ $Unit->id }})"
                                                class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editunitModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        @endcan
                                        @can('unit-delete')
                                            <button wire:click="GetUnit({{ $Unit->id }})"
                                                class="p-0 px-1 btn btn-outline-danger waves-effect {{ $Unit->active ? 'disabled' : '' }}"
                                                data-bs-toggle = "modal" data-bs-target="#removeunitModal">
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
                @include('livewire.units.modals.edit-unit')
                @include('livewire.units.modals.remove-unit')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>

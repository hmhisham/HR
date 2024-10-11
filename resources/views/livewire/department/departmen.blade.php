<div class="mt-n4">
    <h4 class="mb-1 fw-semiboyld">نافذة الدوائر</h4>
    <div class="card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="DepartmenSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        @can('departmen-create')
                            <button wire:click='AddDepartmenModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#adddepartmenModal">أضــافــة</button>
                            @include('livewire.department.modals.add-departmen')
                        @endcan
                    </div>
                </div>
            </div>
            @can('departmen-list')
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th class="text-center">اسم الدائرة</th>
                            <th class="text-center">العملية</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($Department as $Departmen)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td class="text-center">{{ $Departmen->department_name }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('departmen-edit')
                                            <button wire:click="GetDepartmen({{ $Departmen->id }})"
                                                class="p-0 px-1 btn btn-text-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editdepartmenModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        @endcan
                                        @can('departmen-delete')
                                            <button wire:click="GetDepartmen({{ $Departmen->id }})"
                                                class="p-0 px-1 btn btn-text-danger waves-effect {{ $Departmen->active ? 'disabled' : '' }}"
                                                data-bs-toggle = "modal" data-bs-target="#removedepartmenModal">
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
                @include('livewire.department.modals.edit-departmen')
                @include('livewire.department.modals.remove-departmen')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>

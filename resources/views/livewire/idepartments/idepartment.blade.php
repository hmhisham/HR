<div class="mt-n4">
    <h4 class="mb-2">
        <span class="text-muted fw-light">القسم المالي <span class="mdi mdi-chevron-left mdi-24px"></span></span> قيود
        الاقسام
    </h4>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <input wire:model="IdepartmentSearch" type="text" class="form-control" placeholder="بحث...">
                </div>
                <div>
                    @can('idepartment-create')
                        <button wire:click='AddIdepartmentModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addidepartmentModal">أضــافــة</button>
                        @include('livewire.idepartments.modals.add-idepartment')
                    @endcan
                </div>
            </div>
        </div>
        @can('idepartment-list')
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th class="text-end">رقم القسم</th>
                        <th class="text-center">اسم القسم</th>
                        <th class="text-center">ملاحظات</th>
                        <th class="text-center">العملية</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach ($Idepartments as $Idepartment)
                        <tr>
                            <?php $i++; ?>
                            <td>{{ $i }}</td>
                            <td class="text-end">{{ $Idepartment->idepartment }}</td>
                            <td class="text-center">{{ $Idepartment->idepartmentcname }}</td>
                            <td class="text-center">{{ $Idepartment->note }}</td>

                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="First group">
                                    @can('idepartment-edit')
                                        <button wire:click="GetIdepartment({{ $Idepartment->id }})"
                                            class="p-0 px-1 btn btn-text-success waves-effect" data-bs-toggle="modal"
                                            data-bs-target="#editidepartmentModal">
                                            <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                        </button>
                                    @endcan
                                    @can('idepartment-delete')
                                        <button wire:click="GetIdepartment({{ $Idepartment->id }})"
                                            class="p-0 px-1 btn btn-text-danger waves-effect {{ $Idepartment->active ? 'disabled' : '' }}"
                                            data-bs-toggle = "modal" data-bs-target="#removeidepartmentModal">
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
            @include('livewire.idepartments.modals.edit-idepartment')
            @include('livewire.idepartments.modals.remove-idepartment')
            <!-- Modal -->
        @endcan
    </div>
</div>

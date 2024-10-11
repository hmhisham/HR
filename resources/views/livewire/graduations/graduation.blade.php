<div class="mt-n4">
    <h4 Class="mb-1fw-semiboyld">نافذة جهة التخرج</h4>
    <Div Class="card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="GraduationSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        @can('graduation-create')
                            <button wire:click='AddGraduationModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addgraduationModal">أضــافــة</button>
                            @include('livewire.graduations.modals.add-graduation')
                        @endcan
                    </div>
                </div>
            </div>
            @can('graduation-list')
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th Class="text-center">الشهادة</th>
                            <th Class="text-center">جهة التخرج</th>
                            <th Class="text-center">العملية</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($Graduations as $Graduation)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td class="text-center">
                                    {{ $Graduation->Getcertificate ? $Graduation->Getcertificate->certificates_name : '' }}
                                </td>
                                <td Class="text-center">{{ $Graduation->graduations_name }}</td>
                                <td Class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('graduation-edit')
                                            <button wire:click="GetGraduation({{ $Graduation->id }})"
                                                class="p-0 px-1 btn btn-text-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editgraduationModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        @endcan
                                        @can('graduation-delete')
                                            <button wire:click="GetGraduation({{ $Graduation->id }})"
                                                class="p-0 px-1 btn btn-text-danger waves-effect {{ $Graduation->active ? 'disabled' : '' }}"
                                                data-bs-toggle = "modal" data-bs-target="#removegraduationModal">
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
                @include('livewire.graduations.modals.edit-graduation')
                @include('livewire.graduations.modals.remove-graduation')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>

<div class="mt-n4">
    <h4 class="mb-2">
        <span class="text-muted fw-light">الإعدادات <span class="mdi mdi-chevron-left mdi-24px"></span></span> تصنيف التخصص
    </h4>
    <Div Class="card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="SpecializationclassificatioSearch" type="text" class="form-control"
                            placeholder="بحث...">
                    </div>
                    <div>
                        @can('specializationclassificatio-create')
                            <button wire:click='AddSpecializationclassificatioModalShow'
                                class="mb-3 add-new btn btn-primary mb-md-0" data-bs-toggle="modal"
                                data-bs-target="#addspecializationclassificatioModal">أضــافــة</button>
                            @include('livewire.specializationclassification.modals.add-specializationclassificatio')
                        @endcan
                    </div>
                </div>
            </div>
            @can('specializationclassificatio-list')
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th Class="text-center">تصنيف التخصص</th>
                            <th Class="text-center">العملية</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($Specializationclassification as $Specializationclassificatio)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td Class="text-center">
                                    {{ $Specializationclassificatio->specializationclassification_name }}</td>
                                <td Class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('specializationclassificatio-edit')
                                            <button
                                                wire:click="GetSpecializationclassificatio({{ $Specializationclassificatio->id }})"
                                                class="p-0 px-1 btn btn-text-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editspecializationclassificatioModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        @endcan
                                        @can('specializationclassificatio-delete')
                                            <button
                                                wire:click="GetSpecializationclassificatio({{ $Specializationclassificatio->id }})"
                                                class="p-0 px-1 btn btn-text-danger waves-effect {{ $Specializationclassificatio->active ? 'disabled' : '' }}"
                                                data-bs-toggle = "modal"
                                                data-bs-target="#removespecializationclassificatioModal">
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
                @include('livewire.specializationclassification.modals.edit-specializationclassificatio')
                @include('livewire.specializationclassification.modals.remove-specializationclassificatio')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>

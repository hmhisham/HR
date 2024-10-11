<div class="mt-n4">
    <h4 Class="mb-1fw-semiboyld">نافذة الاختصاص</h4>
    <div Class="card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="SpecializationSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        @can('specialization-create')
                            <button wire:click='AddSpecializationModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addspecializationModal">أضــافــة</button>
                            @include('livewire.specializations.modals.add-specialization')
                        @endcan
                    </div>
                </div>
            </div>
            @can('specialization-list')
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th Class="text-center">الشهادة</th>
                            <th Class="text-center">جهة التخرج</th>
                            <th Class="text-center">الاختصاص</th>
                            <th Class="text-center">العملية</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($Specializations as $Specialization)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td class="text-center">
                                    {{ $Specialization->Getcertificate ? $Specialization->Getcertificate->certificates_name : '' }}
                                </td>
                                <td class="text-center">
                                    {{ $Specialization->Getgraduation ? $Specialization->Getgraduation->graduations_name : '' }}
                                </td>
                                <td Class="text-center">{{ $Specialization->specializations_name }}</td>
                                <td Class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('specialization-edit')
                                            <button wire:click="GetSpecialization({{ $Specialization->id }})"
                                                class="p-0 px-1 btn btn-text-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editspecializationModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        @endcan
                                        @can('specialization-delete')
                                            <button wire:click="GetSpecialization({{ $Specialization->id }})"
                                                class="p-0 px-1 btn btn-text-danger waves-effect {{ $Specialization->active ? 'disabled' : '' }}"
                                                data-bs-toggle = "modal" data-bs-target="#removespecializationModal">
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
                @include('livewire.specializations.modals.edit-specialization')
                @include('livewire.specializations.modals.remove-specialization')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>

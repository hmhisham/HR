<div class="mt-n4">
    <h4 Class="mb-1fw-semiboyld">نافذة المجال التدريبي</h4>
    <Div Class="card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="TrainingSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        @can('training-create')
                            <button wire:click='AddTrainingModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addtrainingModal">أضــافــة</button>
                            @include('livewire.trainings.modals.add-training')
                        @endcan
                    </div>
                </div>
            </div>
            @can('training-list')
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th Class="text-center">مجال التدريب</th>
                            <th Class="text-center">العملية</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($Trainings as $Training)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td Class="text-center">{{ $Training->trainings_name }}</td>

                                <td Class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('training-edit')
                                            <button wire:click="GetTraining({{ $Training->id }})"
                                                class="p-0 px-1 btn btn-text-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#edittrainingModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        @endcan
                                        @can('training-delete')
                                            <button wire:click="GetTraining({{ $Training->id }})"
                                                class="p-0 px-1 btn btn-text-danger waves-effect {{ $Training->active ? 'disabled' : '' }}"
                                                data-bs-toggle = "modal" data-bs-target="#removetrainingModal">
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
                @include('livewire.trainings.modals.edit-training')
                @include('livewire.trainings.modals.remove-training')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>

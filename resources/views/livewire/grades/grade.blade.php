<div class="mt-n4">
    <h4 Class="mb-1fw-semiboyld">نافذة الدرجات الوظيفية</h4>
    <Div Class="card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="GradeSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        @can('grade-create')
                            <button wire:click='AddGradeModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addgradeModal">أضــافــة</button>
                            @include('livewire.grades.modals.add-grade')
                        @endcan
                    </div>
                </div>
            </div>
            @can('grade-list')
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th Class="text-center">الدرجة</th>
                            <th Class="text-center">العملية</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($Grades as $Grade)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td Class="text-center">{{ $Grade->grades_name }}</td>
                                <td Class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('grade-edit')
                                            <button wire:click="GetGrade({{ $Grade->id }})"
                                                class="p-0 px-1 btn btn-text-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editgradeModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        @endcan
                                        @can('grade-delete')
                                            <button wire:click="GetGrade({{ $Grade->id }})"
                                                class="p-0 px-1 btn btn-text-danger waves-effect {{ $Grade->active ? 'disabled' : '' }}"
                                                data-bs-toggle = "modal" data-bs-target="#removegradeModal">
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
                @include('livewire.grades.modals.edit-grade')
                @include('livewire.grades.modals.remove-grade')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>

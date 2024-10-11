<div class="mt-n4">
    <h4 Class="mb-1fw-semiboyld">نافذة سلم رواتب الملاك الدائم</h4>
    <Div Class="card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="ScalemSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        @can('scalem-create')
                            <button wire:click='AddScalemModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addscalemModal">أضــافــة</button>
                            @include('livewire.scalems.modals.add-scalem')
                        @endcan
                    </div>
                </div>
            </div>
            @can('scalem-list')
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th Class="text-center">الدرجة الوظيفية</th>
                            <th Class="text-center">المرحلة الوظيفية</th>
                            <th Class="text-center">درجة الراتب</th>
                            <th Class="text-center">مرحلة الراتب</th>
                            <th Class="text-center">مقدار العلاوة</th>
                            <th Class="text-center">الراتب</th>
                            <th Class="text-center">المدة الاصغرية</th>
                            <th Class="text-center">الراتب السابق</th>
                            <th Class="text-center">العملية</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($Scalems as $Scalem)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td class="text-center">{{ $Scalem->Getgrade ? $Scalem->Getgrade->grades_name : '' }}</td>
                                <td Class="text-center">{{ $Scalem->phase_emp }}</td>
                                <td Class="text-center">{{ $Scalem->scalems_salary_grade }}</td>
                                <td Class="text-center">{{ $Scalem->scalems_salary_stage }}</td>
                                <td Class="text-center">{{ $Scalem->scalems_amount }}</td>
                                <td Class="text-center">{{ $Scalem->scalems_salary }}</td>
                                <td Class="text-center">{{ $Scalem->scalems_minimum_period }}</td>
                                <td Class="text-center">{{ $Scalem->scalems_previous_salary }}</td>
                                <td Class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('scalem-edit')
                                            <button wire:click="GetScalem({{ $Scalem->id }})"
                                                class="p-0 px-1 btn btn-text-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editscalemModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        @endcan
                                        @can('scalem-delete')
                                            <button wire:click="GetScalem({{ $Scalem->id }})"
                                                class="p-0 px-1 btn btn-text-danger waves-effect {{ $Scalem->active ? 'disabled' : '' }}"
                                                data-bs-toggle = "modal" data-bs-target="#removescalemModal">
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
                @include('livewire.scalems.modals.edit-scalem')
                @include('livewire.scalems.modals.remove-scalem')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>

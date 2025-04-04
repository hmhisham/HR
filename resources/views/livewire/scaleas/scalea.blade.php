<div class="mt-n4">
    <h4 class="mb-2">
        <span class="text-muted fw-light">الإعدادات <span class="mdi mdi-chevron-left mdi-24px"></span></span> سلم رواتب العقود الاداريين
    </h4>
    <Div Class="card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="ScaleaSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        @can('scalea-create')
                            <button wire:click='AddScaleaModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addscaleaModal">أضــافــة</button>
                            @include('livewire.scaleas.modals.add-scalea')
                        @endcan
                    </div>
                </div>
            </div>
            @can('scalea-list')
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
                        @foreach ($Scaleas as $Scalea)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td class="text-center">{{ $Scalea->Getgrade ? $Scalea->Getgrade->grades_name : '' }}</td>
                                <td Class="text-center">{{ $Scalea->phase_emp }}</td>
                                <td Class="text-center">{{ $Scalea->scaleas_salary_grade }}</td>
                                <td Class="text-center">{{ $Scalea->scaleas_salary_stage }}</td>
                                <td Class="text-center">{{ $Scalea->scaleas_amount }}</td>
                                <td Class="text-center">{{ $Scalea->scaleas_salary }}</td>
                                <td Class="text-center">{{ $Scalea->scaleas_minimum_period }}</td>
                                <td Class="text-center">{{ $Scalea->scaleas_previous_salary }}</td>
                                <td Class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('scalea-edit')
                                            <button wire:click="GetScalea({{ $Scalea->id }})"
                                                class="p-0 px-1 btn btn-text-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editscaleaModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        @endcan
                                        @can('scalea-delete')
                                            <button wire:click="GetScalea({{ $Scalea->id }})"
                                                class="p-0 px-1 btn btn-text-danger waves-effect {{ $Scalea->active ? 'disabled' : '' }}"
                                                data-bs-toggle = "modal" data-bs-target="#removescaleaModal">
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
                @include('livewire.scaleas.modals.edit-scalea')
                @include('livewire.scaleas.modals.remove-scalea')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>

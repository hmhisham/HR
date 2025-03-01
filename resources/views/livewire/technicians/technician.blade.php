<div class="mt-n4">
    <h4 class="mb-2">
        <span class="text-muted fw-light">الإعدادات <span class="mdi mdi-chevron-left mdi-24px"></span></span> سلم رواتب العقود الفنيين
    </h4>
    <div class="card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="TechnicianSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        @can('technician-create')
                            <button wire:click='AddTechnicianModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addtechnicianModal">أضــافــة</button>
                            @include('livewire.technicians.modals.add-technician')
                        @endcan
                    </div>
                </div>
            </div>
            @can('technician-list')
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th class="text-center">الدرجة الوظيفية</th>
                            <th class="text-center">المرحلة الوظيفية</th>
                            <th class="text-center">درجة الراتب</th>
                            <th class="text-center">مرحلة الراتب</th>
                            <th class="text-center">مقدار العلاوة</th>
                            <th class="text-center">الراتب</th>
                            <th class="text-center">المدة الأصغرية</th>
                            <th class="text-center">الراتب السابق</th>
                            <th class="text-center">العملية</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($Technicians as $Technician)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td class="text-center">{{ $Technician->grades_id }}</td>
                                <td class="text-center">{{ $Technician->phase_emp }}</td>
                                <td class="text-center">{{ $Technician->technicians_salary_grade }}</td>
                                <td class="text-center">{{ $Technician->technicians_salary_stage }}</td>
                                <td class="text-center">{{ $Technician->technicians_amount }}</td>
                                <td class="text-center">{{ $Technician->technicians_salary }}</td>
                                <td class="text-center">{{ $Technician->technicians_minimum_period }}</td>
                                <td class="text-center">{{ $Technician->technicians_previous_salary }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('technician-edit')
                                            <button wire:click="GetTechnician({{ $Technician->id }})"
                                                class="p-0 px-1 btn btn-text-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#edittechnicianModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        @endcan
                                        @can('technician-delete')
                                            <button wire:click="GetTechnician({{ $Technician->id }})"
                                                class="p-0 px-1 btn btn-text-danger waves-effect {{ $Technician->active ? 'disabled' : '' }}"
                                                data-bs-toggle = "modal" data-bs-target="#removetechnicianModal">
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
                @include('livewire.technicians.modals.edit-technician')
                @include('livewire.technicians.modals.remove-technician')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>

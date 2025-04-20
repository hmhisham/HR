<div>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title">قائمة الموظفين</h5>
            <a href="{{ route('employees.import') }}" class="btn btn-primary btn-sm">
                <i class="mdi mdi-file-excel-outline me-1"></i> استيراد بيانات
            </a>
        </div>
        <div class="card-body">
            <!-- فلاتر البحث -->
            <div class="row mb-3">
                <div class="col-md-2">
                    <input type="text" class="form-control" placeholder="رقم الموظف"
                        wire:model.debounce.300ms="search.computer_number">
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" placeholder="الرقم الوظيفي"
                        wire:model.debounce.300ms="search.job_number">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="الاسم الكامل"
                        wire:model.debounce.300ms="search.full_name">
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" placeholder="القسم"
                        wire:model.debounce.300ms="search.department">
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" placeholder="العنوان الوظيفي"
                        wire:model.debounce.300ms="search.job_title">
                </div>
                <div class="col-md-1">
                    <button class="btn btn-secondary" wire:click="resetFilters">
                        <i class="mdi mdi-refresh"></i>
                    </button>
                </div>
            </div>

            <!-- جدول البيانات -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>رقم الموظف</th>
                            <th>الرقم الوظيفي</th>
                            <th>الاسم الكامل</th>
                            <th>القسم</th>
                            <th>الشعبة</th>
                            <th>العنوان الوظيفي</th>
                            <th>الدرجة الوظيفية</th>
                            <th>الراتب الاسمي</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($employees as $employee)
                            <tr>
                                <td>{{ $employee->computer_number }}</td>
                                <td>{{ $employee->job_number }}</td>
                                <td>{{ $employee->full_name }}</td>
                                <td>{{ $employee->department }}</td>
                                <td>{{ $employee->division }}</td>
                                <td>{{ $employee->job_title }}</td>
                                <td>{{ $employee->job_grade }}</td>
                                <td>{{ $employee->nominal_salary }}</td>
                                <td>
                                    <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-info btn-sm">
                                        <i class="mdi mdi-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">لا توجد بيانات</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- الترقيم -->
            <div class="d-flex justify-content-center mt-3">
                {{ $links->links() }}
            </div>
        </div>
    </div>
</div>

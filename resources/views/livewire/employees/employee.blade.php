<div class="mt-n4">
    <h4 Class="mb-1fw-semiboyld">قائمة</h4>
    <Div Class="card">

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="EmployeeSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        @can('employee-create')
                            <button wire:click='AddEmployeeModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addemployeeModal">أضــافــة</button>
                            @include('livewire.employees.modals.add-employee')
                        @endcan
                    </div>
                </div>
            </div>
            @can('employee-list')
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th Class="text-center">الرقم الوظيفي</th>
                            <th Class="text-center">رقم الاضبارة</th>
                            <th Class="text-center">الاسم الأول</th>
                            <th Class="text-center">الاسم الثاني</th>
                            <th Class="text-center">الاسم الثالث</th>
                            <th Class="text-center">الاسم الرابع</th>
                            <th Class="text-center">اللقب</th>
                            <th Class="text-center">الاسم الكامل</th>
                            <th Class="text-center">الحالة</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Employees as $Employee)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td Class="text-center">{{ $Employee->JobNumber }}</td>
                                <td Class="text-center">{{ $Employee->FileNumber }}</td>
                                <td Class="text-center">{{ $Employee->FirstName }}</td>
                                <td Class="text-center">{{ $Employee->SecondName }}</td>
                                <td Class="text-center">{{ $Employee->ThirdName }}</td>
                                <td Class="text-center">{{ $Employee->FourthName }}</td>
                                <td Class="text-center">{{ $Employee->LastName }}</td>
                                <td Class="text-center">{{ $Employee->FullName }}</td>

                                <td Class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('employee-edit')
                                            <button wire:click="GetEmployee({{ $Employee->id }})"
                                                class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editEmployeeModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        @endcan
                                        @can('employee-delete')
                                            <button wire:click="GetEmployee({{ $Employee->id }})"
                                                class="p-0 px-1 btn btn-outline-danger waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#removeEmployeeModal">
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
                @include('livewire.employees.modals.edit-employee')
                @include('livewire.employees.modals.remove-employee')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>

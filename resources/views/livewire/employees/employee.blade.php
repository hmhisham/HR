<div class="mt-n4">
    <h4 Class="mb-1fw-semiboyld">قائمة</h4>
    <Div Class="card">
hisham

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
                            @include('livewire.employees.modals.add-employees')
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
                            <th Class="text-center">العملية</th>
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>



                <div class="mt-2 d-flex justify-content-center">
                    {{ $links->links() }}
                </div>

                {{-- <!-- Modal -->
                @include('livewire.employees.modals.edit-employee')
                @include('livewire.employees.modals.cog-employee')
                @include('livewire.employees.modals.remove-employee')
                <!-- Modal --> --}}
            @endcan
        </div>
    </div>
</div>
</div>

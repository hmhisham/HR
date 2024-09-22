<div>
    <div class="row">
        <div class="col">
            <h4 class="py-3">
                اضافة معلومات الموظف
            </h4>
        </div>
        <div class="col text-end">
            @can('worker-create')
                <button wire:click='AddWorker' class="btn btn-primary waves-effect waves-light sticky-button">حفظ
                    المعلومات</button>
            @endcan
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <ul class="nav nav-tabs" role="tablist" style="position: relative;">
                {{-- 01 --}}
                <li class="nav-item" role="presentation">
                    <button wire:click="buttonStep(1)"
                        class="btn btn-text-dark {{ $currentTap == 1 ? 'active btn btn-label-secondary  btn-fab demo waves-effect' : '' }}"
                        type="button" data-bs-toggle="tab" data-bs-target="#form-tabs-1" role="tab"
                        aria-selected="True">بيانات الأسم</button>
                </li>

                {{-- 02 --}}
                <li class="nav-item" role="presentation">
                    <button wire:click="buttonStep(2)"
                        class="btn btn-text-dark {{ $currentTap == 2 ? 'active btn btn-label-secondary  btn-fab demo waves-effect' : '' }}"
                        type="button" data-bs-toggle="tab" data-bs-target="#form-tabs-2" role="tab"
                        aria-selected="True"> البيانات الشخصية </button>
                </li>

                {{-- 03 --}}
                <li class="nav-item" role="presentation">
                    <button wire:click="buttonStep(3)"
                        class="btn btn-text-dark {{ $currentTap == 3 ? 'active btn btn-label-secondary  btn-fab demo waves-effect' : '' }}"
                        data-bs-toggle="tab" data-bs-target="#form-tabs-3" role="tab" aria-selected="True">مستمسكات
                        الموظف</button>
                </li>
            </ul>
        </div>

        <div class="tab-content">
            <div class="tab-pane fade {{ $currentTap == 1 ? 'active show' : '' }} " id="form-tabs-1" role="tabpanel">



                <!-- Bootstrap Datepicker -->
                {{-- <div class="layout-wrapper layout-content-navbar">
                    <div class="layout-container">
                        <!-- Layout container -->
                        <div class="layout-page">

                            <!-- Content wrapper -->
                            <div class="content-wrapper">
                                <!-- Content -->

                                <div class="container-xxl flex-grow-1 container-p-y">
                                    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Pickers</h4>

                                    <div class="row">
                                        <!-- Flat Picker -->
                                        <div class="col-12 mb-4">
                                            <div class="card">
                                                <h5 class="card-header">Flatpickr</h5>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <!-- Date Picker-->
                                                        <div class="col-md-6 col-12 mb-4">
                                                            <div class="form-floating form-floating-outline">
                                                                <input type="text" class="form-control" placeholder="YYYY-MM-DD"
                                                                    id="flatpickr-date" />
                                                                <label for="flatpickr-date">Date Picker</label>
                                                            </div>
                                                        </div>
                                                        <!-- /Date Picker -->

                                                        <!-- Time Picker-->
                                                        <div class="col-md-6 col-12 mb-4">
                                                            <div class="form-floating form-floating-outline">
                                                                <input type="text" class="form-control" placeholder="HH:MM"
                                                                    id="flatpickr-time" />
                                                                <label for="flatpickr-time">Time Picker</label>
                                                            </div>
                                                        </div>
                                                        <!-- /Time Picker -->

                                                        <!-- Datetime Picker-->
                                                        <div class="col-md-6 col-12 mb-4">
                                                            <div class="form-floating form-floating-outline">
                                                                <input type="text" class="form-control" placeholder="YYYY-MM-DD HH:MM"
                                                                    id="flatpickr-datetime" />
                                                                <label for="flatpickr-datetime">Datetime Picker</label>
                                                            </div>
                                                        </div>
                                                        <!-- /Datetime Picker-->

                                                        <!-- Multiple Dates Picker-->
                                                        <div class="col-md-6 col-12 mb-4">
                                                            <div class="form-floating form-floating-outline">
                                                                <input type="text" class="form-control" placeholder="YYYY-MM-DD HH:MM"
                                                                    id="flatpickr-multi" />
                                                                <label for="flatpickr-multi">Multiple Dates Picker</label>
                                                            </div>
                                                        </div>
                                                        <!-- /Multiple Dates Picker-->

                                                        <!-- Range Picker-->
                                                        <div class="col-md-6 col-12 mb-4">
                                                            <div class="form-floating form-floating-outline">
                                                                <input type="text" class="form-control" placeholder="YYYY-MM-DD to YYYY-MM-DD"
                                                                    id="flatpickr-range" />
                                                                <label for="flatpickr-range">Range Picker</label>
                                                            </div>
                                                        </div>
                                                        <!-- /Range Picker-->

                                                        <!-- Human Friendly Date Picker-->
                                                        <div class="col-md-6 col-12 mb-4">
                                                            <div class="form-floating form-floating-outline">
                                                                <input type="text" class="form-control" placeholder="Month DD, YYYY"
                                                                    id="flatpickr-human-friendly" />
                                                                <label for="flatpickr-human-friendly">Human Friendly Date Picker</label>
                                                            </div>
                                                        </div>
                                                        <!-- /Human Friendly Date Picker-->

                                                        <!-- Disabled Range-->
                                                        <div class="col-md-6 col-12 mb-md-0 mb-4">
                                                            <div class="form-floating form-floating-outline">
                                                                <input type="text" class="form-control" placeholder="YYYY-MM-DD"
                                                                    id="flatpickr-disabled-range" />
                                                                <label for="flatpickr-disabled-range">Disabled Range</label>
                                                            </div>
                                                        </div>
                                                        <!-- /Disabled Range-->

                                                        <!-- Inline Picker-->
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-floating form-floating-outline">
                                                                <input type="text" class="form-control mb-1" placeholder="YYYY-MM-DD"
                                                                    id="flatpickr-inline" />
                                                                <label for="flatpickr-inline">Inline Picker</label>
                                                            </div>
                                                        </div>
                                                        <!-- /Inline Picker-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Flatpickr -->

                                        <!-- Bootstrap Datepicker -->
                                        <div class="col-12 mb-4">
                                            <div class="card">
                                                <h5 class="card-header">Bootstrap Datepicker</h5>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6 col-12 mb-4">
                                                            <div class="form-floating form-floating-outline">
                                                                <input type="text" id="bs-datepicker-basic" placeholder="MM/DD/YYYY"
                                                                    class="form-control" />
                                                                <label for="bs-datepicker-basic">Basic</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12 mb-4">
                                                            <div class="form-floating form-floating-outline">
                                                                <input type="text" id="bs-datepicker-format" placeholder="DD/MM/YYYY"
                                                                    class="form-control" />
                                                                <label for="bs-datepicker-format">Format</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12 mb-md-0 mb-4">
                                                            <div class="form-floating form-floating-outline">
                                                                <input type="text" id="bs-datepicker-autoclose" placeholder="MM/DD/YYYY"
                                                                    class="form-control" />
                                                                <label for="bs-datepicker-autoclose">Auto Close</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12 mb-4">
                                                            <div class="form-floating form-floating-outline">
                                                                <input type="text" id="bs-datepicker-disabled-days" placeholder="MM/DD/YYYY"
                                                                    class="form-control" />
                                                                <label for="bs-datepicker-disabled-days">Disabled Days</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12 mb-4">
                                                            <div class="form-floating form-floating-outline">
                                                                <input type="text" id="bs-datepicker-multidate"
                                                                    placeholder="MM/DD/YYYY, MM/DD/YYYY" class="form-control" />
                                                                <label for="bs-datepicker-multidate">Multidate</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12 mb-4">
                                                            <div class="form-floating form-floating-outline">
                                                                <input type="text" id="bs-datepicker-options" placeholder="MM/DD/YYYY"
                                                                    class="form-control" />
                                                                <label for="bs-datepicker-options">Options</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12 mb-4">
                                                            <label for="dateRangePicker" class="form-label">Date Range</label>
                                                            <div class="input-group input-daterange" id="bs-datepicker-daterange">
                                                                <input type="text" id="dateRangePicker" placeholder="MM/DD/YYYY"
                                                                    class="form-control" />
                                                                <span class="input-group-text">to</span>
                                                                <input type="text" placeholder="MM/DD/YYYY" class="form-control" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <label class="form-label">Inline</label>
                                                            <div id="bs-datepicker-inline"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Bootstrap Datepicker -->

                                        <!-- Bootstrap Daterangepicker -->
                                        <div class="col-12 mb-4">
                                            <div class="card">
                                                <h5 class="card-header">Bootstrap Daterange Picker</h5>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6 col-12 mb-4">
                                                            <div class="form-floating form-floating-outline">
                                                                <input type="text" id="bs-rangepicker-basic" class="form-control" />
                                                                <label for="bs-rangepicker-basic">Basic</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12 mb-4">
                                                            <div class="form-floating form-floating-outline">
                                                                <input type="text" id="bs-rangepicker-single" class="form-control" />
                                                                <label for="bs-rangepicker-single">Single Picker</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12 mb-4">
                                                            <div class="form-floating form-floating-outline">
                                                                <input type="text" id="bs-rangepicker-time" class="form-control" />
                                                                <label for="bs-rangepicker-time">With Time Picker</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12 mb-4">
                                                            <div class="form-floating form-floating-outline">
                                                                <input type="text" id="bs-rangepicker-range" class="form-control" />
                                                                <label for="bs-rangepicker-range">Ranges</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12 mb-md-0 mb-4">
                                                            <div class="form-floating form-floating-outline">
                                                                <input type="text" id="bs-rangepicker-week-num" class="form-control" />
                                                                <label for="bs-rangepicker-week-num">Week Numbers</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-floating form-floating-outline">
                                                                <input type="text" id="bs-rangepicker-dropdown" class="form-control" />
                                                                <label for="bs-rangepicker-dropdown">Month & Year Dropdown</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Bootstrap Daterangepicker -->

                                        <!-- jQuery Timepicker -->
                                        <div class="col-12 mb-4">
                                            <div class="card">
                                                <h5 class="card-header">jQuery Timepicker</h5>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6 col-12 mb-4">
                                                            <div class="form-floating form-floating-outline">
                                                                <input type="text" id="timepicker-basic" placeholder="HH:MMam"
                                                                    class="form-control" />
                                                                <label for="timepicker-basic">Basic</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12 mb-4">
                                                            <div class="form-floating form-floating-outline">
                                                                <input type="text" id="timepicker-min-max" placeholder="HH:MMam"
                                                                    class="form-control" />
                                                                <label for="timepicker-min-max">Min-Max</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12 mb-4">
                                                            <div class="form-floating form-floating-outline">
                                                                <input type="text" id="timepicker-disabled-times" placeholder="HH:MMam"
                                                                    class="form-control" />
                                                                <label for="timepicker-disabled-times">Disabled Times</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12 mb-4">
                                                            <div class="form-floating form-floating-outline">
                                                                <input type="text" id="timepicker-format" placeholder="HH:MM:SS"
                                                                    class="form-control" />
                                                                <label for="timepicker-format">Format</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12 mb-md-0 mb-4">
                                                            <div class="form-floating form-floating-outline">
                                                                <input type="text" id="timepicker-step" placeholder="HH:MMam"
                                                                    class="form-control" />
                                                                <label for="timepicker-step">Step</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-floating form-floating-outline">
                                                                <input type="text" id="timepicker-24hours" placeholder="20:00:00"
                                                                    class="form-control" />
                                                                <label for="timepicker-24hours">24 Hours Format</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /jQuery Timepicker -->

                                        <!-- Color Picker -->
                                        <div class="col-12">
                                            <div class="card">
                                                <h5 class="card-header">Color Picker</h5>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="classic col col-sm-3 col-lg-2">
                                                            <p>Classic</p>
                                                            <div id="color-picker-classic"></div>
                                                        </div>
                                                        <div class="monolith col col-sm-3 col-lg-2">
                                                            <p>Monolith</p>
                                                            <div id="color-picker-monolith"></div>
                                                        </div>
                                                        <div class="nano col col-sm-3 col-lg-2">
                                                            <p>Nano</p>
                                                            <div id="color-picker-nano"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Color Picker-->
                                    </div>
                                </div>
                                <!-- / Content -->

                                <div class="content-backdrop fade"></div>
                            </div>
                            <!-- Content wrapper -->
                        </div>
                        <!-- / Layout page -->
                    </div>

                    <!-- Overlay -->
                    <div class="layout-overlay layout-menu-toggle"></div>

                    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
                    <div class="drag-target"></div>
                </div> --}}
                <!-- /Bootstrap Datepicker -->
                <div Class="row g-4">
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='calculator_number' type="text"
                                id="modalEmployeecalculator_number" placeholder="رقم الحاسبة"
                                class="form-control @error('calculator_number') is-invalid is-filled @enderror" />
                            <label for="modalEmployeecalculator_number">رقم الحاسبة</label>
                        </div>
                        @error('calculator_number')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='employee_number' type="text" id="modalEmployeeemployee_number"
                                placeholder="الرقم الوظيفي"
                                class="form-control @error('employee_number') is-invalid is-filled @enderror" />
                            <label for="modalEmployeeemployee_number">الرقم الوظيفي</label>
                        </div>
                        @error('employee_number')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='paper_folder_number' type="text"
                                id="modalEmployeepaper_folder_number" placeholder="رقم الاضبارة الورقية"
                                class="form-control @error('paper_folder_number') is-invalid is-filled @enderror" />
                            <label for="modalEmployeepaper_folder_number">رقم الاضبارة الورقية</label>
                        </div>
                        @error('paper_folder_number')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='employee_id_number' type="text"
                                id="modalEmployeeemployee_id_number" placeholder="رقم هوية الموظف"
                                class="form-control @error('employee_id_number') is-invalid is-filled @enderror" />
                            <label for="modalEmployeeemployee_id_number">رقم هوية الموظف</label>
                        </div>
                        @error('employee_id_number')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div Class="row g-4">
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='first_name' wire:keyup='changeName' type="text"
                                id="modalEmployeefirst_name" placeholder="الاسم الاول"
                                class="form-control @error('first_name') is-invalid is-filled @enderror" />
                            <label for="modalEmployeefirst_name">الاسم الاول</label>
                        </div>
                        @error('first_name')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='father_name' wire:keyup='changeName' type="text"
                                id="modalEmployeefather_name" placeholder="اسم الاب"
                                class="form-control @error('father_name') is-invalid is-filled @enderror" />
                            <label for="modalEmployeefather_name">اسم الاب</label>
                        </div>
                        @error('father_name')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='grandfather_name' wire:keyup='changeName' type="text"
                                id="modalEmployeegrandfather_name" placeholder="اسم الجد"
                                class="form-control @error('grandfather_name') is-invalid is-filled @enderror" />
                            <label for="modalEmployeegrandfather_name">اسم الجد</label>
                        </div>
                        @error('grandfather_name')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='great_grandfather_name' wire:keyup='changeName' type="text"
                                id="modalEmployeegreat_grandfather_name" placeholder="اسم والد الجد"
                                class="form-control @error('great_grandfather_name') is-invalid is-filled @enderror" />
                            <label for="modalEmployeegreat_grandfather_name">اسم والد الجد</label>
                        </div>
                        @error('great_grandfather_name')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div Class="row g-4">
                    <div class="mb-3 col-3">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='surname' wire:keyup='changeName' type="text"
                                id="modalEmployeesurname" placeholder="اللقب"
                                class="form-control @error('surname') is-invalid is-filled @enderror" />
                            <label for="modalEmployeesurname">اللقب</label>
                        </div>
                        @error('surname')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='full_name' type="text" id="modalEmployeefull_name"
                                placeholder="الاسم الكامل"
                                class="form-control @error('full_name') is-invalid is-filled @enderror" disabled/>
                            <label for="modalEmployeefull_name">الاسم الكامل</label>
                        </div>
                        @error('full_name')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div Class="row g-4">
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='mother_name' wire:keyup='changeNameMother' type="text" id="modalEmployeemother_name"
                                placeholder="اسم الام"
                                class="form-control @error('mother_name') is-invalid is-filled @enderror" />
                            <label for="modalEmployeemother_name">اسم الام</label>
                        </div>
                        @error('mother_name')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='maternal_grandfather_name' wire:keyup='changeNameMother' type="text"
                                id="modalEmployeematernal_grandfather_name" placeholder="اسم والد الام"
                                class="form-control @error('maternal_grandfather_name') is-invalid is-filled @enderror" />
                            <label for="modalEmployeematernal_grandfather_name">اسم والد الام</label>
                        </div>
                        @error('maternal_grandfather_name')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='maternal_great_grandfather_name' wire:keyup='changeNameMother' type="text"
                                id="modalEmployeematernal_great_grandfather_name" placeholder="اسم جد الام"
                                class="form-control @error('maternal_great_grandfather_name') is-invalid is-filled @enderror" />
                            <label for="modalEmployeematernal_great_grandfather_name">اسم جد الام</label>
                        </div>
                        @error('maternal_great_grandfather_name')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='maternal_surname' wire:keyup='changeNameMother' type="text"
                                id="modalEmployeematernal_surname" placeholder="لقب الام"
                                class="form-control @error('maternal_surname') is-invalid is-filled @enderror" />
                            <label for="modalEmployeematernal_surname">لقب الام</label>
                        </div>
                        @error('maternal_surname')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='mother_full_name' type="text"
                                id="modalEmployeemother_full_name" placeholder="اسم الام الكامل"
                                class="form-control @error('mother_full_name') is-invalid is-filled @enderror" disabled/>
                            <label for="modalEmployeemother_full_name">اسم الام الكامل</label>
                        </div>
                        @error('mother_full_name')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div Class="row g-4">
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='phone_number' type="text" id="modalEmployeephone_number"
                                placeholder="رقم الهاتف"
                                class="form-control @error('phone_number') is-invalid is-filled @enderror" />
                            <label for="modalEmployeephone_number">رقم الهاتف</label>
                        </div>
                        @error('phone_number')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <select wire:model.defer="blood_type" id="modalEmployeeblood_type"
                                class="form-select @error('blood_type') is-invalid is-filled @enderror">
                                <option value="" disabled selected>اختر صنف الدم</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                            <label for="modalEmployeeblood_type">صنف الدم</label>
                        </div>
                        @error('blood_type')
                            <small class="text-danger inputerror">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='email' type="text" id="modalEmployeeemail"
                                placeholder="الايميل"
                                class="form-control @error('email') is-invalid is-filled @enderror" />
                            <label for="modalEmployeeemail">الايميل</label>
                        </div>
                        @error('email')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="tab-pane fade {{ $currentTap == 2 ? 'active show' : '' }}" id="form-tabs-2" role="tabpanel">
                <div class="row g-4">
                    <!-- Date Picker-->
                    {{-- <div class="col-md-6 col-12 mb-4">
                            <div class="form-floating form-floating-outline">
                            <input wire:model='daterw' type="text" class="form-control" placeholder="YYYY-MM-DD" id="flatpickr-date" />
                            <label for="flatpickr-date">Date Picker</label>
                            </div>
                        </div> --}}
                    <!-- /Date Picker -->
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <select wire:model.defer='governorate_id' id="governorate_id"
                                class="form-select @error('governorate_id') is-invalid is-filled @enderror">
                                <option value=""></option>
                                @foreach ($Governorates as $governorate)
                                    <option value="{{ $governorate->id }}">{{ $governorate->governorate_name }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="governorate_id">المحافظة</label>
                        </div>
                        @error('governorate_id')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>

                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <select wire:model.defer='district_id' id="district_id"
                                class="form-select @error('district_id') is-invalid is-filled @enderror">
                                <option value=""></option>
                                @foreach ($Districts as $District)
                                    <option value="{{ $District->id }}">{{ $District->district_name }}</option>
                                @endforeach
                            </select>
                            <label for="district_id">القضاء</label>
                        </div>
                        @error('district_id')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>

                    <div class="mb-3 col ">
                        <div class="form-floating form-floating-outline">
                            <select wire:model.defer='area_id' id="modalEmployeearea_id"
                                class="form-select @error('area_id') is-invalid is-filled @enderror">
                                <option value=""></option>
                                @foreach ($Areas as $Area)
                                    <option value="{{ $Area->id }}">{{ $Area->area_name }}</option>
                                @endforeach
                            </select>
                            <label for="mmodalEmployeearea_id">الناحية</label>
                        </div>
                        @error('area_id')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='locality' type="text" id="modalEmployeelocality"
                                placeholder="المحلة"
                                class="form-control @error('locality') is-invalid is-filled @enderror" />
                            <label for="modalEmployeelocality">المحلة</label>
                        </div>
                        @error('locality')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div Class="row g-4">
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='birth_date' type="text" id="birth_date" autocomplete="off"
                                readonly placeholder="يوم-شهر-سنة"
                                class="form-control @error('birth_date') is-invalid is-filled @enderror" />
                            <label for="flatpickr-date">تاريخ التولد</label>
                        </div>
                        @error('birth_date')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='birth_place' type="text" id="modalEmployeebirth_place"
                                placeholder="مسقط الراس"
                                class="form-control @error('birth_place') is-invalid is-filled @enderror" />
                            <label for="modalEmployeebirth_place">مسقط الراس</label>
                        </div>
                        @error('birth_place')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>

                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <select wire:model.defer='gender' id="modalEmployeegender" placeholder="الجنس"
                                class="form-select @error('gender') is-invalid is-filled @enderror">
                                <option value=""></option>
                                <option value="ذكر">ذكر</option>
                                <option value="انثى">انثى</option>
                            </select>
                            <label for="modalEmployeegender">الجنس</label>
                        </div>
                        @error('gender')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>

                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <select wire:model.defer='religion' id="modalEmployeereligion" placeholder="الديانة"
                                class="form-select @error('religion') is-invalid is-filled @enderror">
                                <option value=""></option>
                                <option value="مسلم">مسلم</option>
                                <option value="مسلمة">مسلمة</option>
                                <option value="مسيحي">مسيحي</option>
                                <option value="مسيحية">مسيحية</option>
                                <option value="صابئي">صابئي</option>
                                <option value="صابئية">صابئية</option>
                                <option value="ايزيدي">ايزيدي</option>
                                <option value="ايزيدية">ايزيدية</option>
                                <option value="اخرى">اخرى</option>
                            </select>
                            <label for="modalEmployeereligion">الديانة</label>
                        </div>
                        @error('religion')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                </div>

                <div Class="row g-4">
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <select wire:model.defer='marital_status'
                                wire:change='getWifeNameStatus($event.target.value)' id="modalEmployeemarital_status"
                                placeholder="الحالةالاجتماعية"
                                class="form-select @error('marital_status') is-invalid is-filled @enderror">
                                <option value=""></option>
                                <option value="اعزب">اعزب</option>
                                <option value="باكر">باكر</option>
                                <option value="متزوج">متزوج</option>
                                <option value="متزوجة">متزوجة</option>
                                <option value="مطلق">مطلق</option>
                                <option value="مطلقة">مطلقة</option>
                                <option value="ارمل">ارمل</option>
                                <option value="ارملة">ارملة</option>
                            </select>
                            <label for="modalEmployeemarital_status">الحالة الاجتماعية</label>
                        </div>
                        @error('marital_status')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='wife_name' type="text" id="modalEmployeewife_name"
                                placeholder="{{ $HusbandName }}" {{ $isMaritalStatus }}
                                class="form-control @error('wife_name') is-invalid is-filled @enderror" />
                            <label for="modalEmployeewife_name">{{ $HusbandName }}</label>
                        </div>
                        @error('wife_name')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <select wire:model.defer='children_count' id="modalEmployeechildren_count"
                                {{ $isMaritalStatus }}
                                class="form-select @error('children_count') is-invalid is-filled @enderror">
                                <option value=""></option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                {{-- <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option> --}}
                            </select>
                            <label for="modalEmployeechildren_count">عدد الاطفال</label>
                        </div>
                        @error('children_count')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="tab-pane fade {{ $currentTap == 3 ? 'active show' : '' }}" id="form-tabs-3" role="tabpanel">
                <div class="divider text-start mt-n3">
                    <div class="divider-text">هوية الاحوال المدنية</div>
                </div>
                <div Class="row g-4">
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='civil_status_identity_number' type="text"
                                id="modalEmployeecivil_status_identity_number" placeholder="رقم هوية الاحوال"
                                class="form-control @error('civil_status_identity_number') is-invalid is-filled @enderror" />
                            <label for="modalEmployeecivil_status_identity_number">رقم هوية الاحوال</label>
                        </div>
                        @error('civil_status_identity_number')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>

                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='registration_number' type="text"
                                id="modalEmployeeregistration_number" placeholder="رقم السجل"
                                class="form-control @error('registration_number') is-invalid is-filled @enderror" />
                            <label for="modalEmployeeregistration_number">رقم السجل</label>
                        </div>
                        @error('registration_number')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='record_number' type="text" id="modalEmployeerecord_number"
                                placeholder="رقم الصحيفة"
                                class="form-control @error('record_number') is-invalid is-filled @enderror" />
                            <label for="modalEmployeerecord_number">رقم الصحيفة</label>
                        </div>
                        @error('record_number')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='issue_date_civil_status' type="date"
                                id="modalEmployeeissue_date_civil_status" placeholder="تاريخ الاصدار"
                                class="form-control @error('issue_date_civil_status') is-invalid is-filled @enderror" />
                            <label for="modalEmployeeissue_date_civil_status">تاريخ الاصدار</label>
                        </div>
                        @error('issue_date_civil_status')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='issuing_authority_civil_status' type="text"
                                id="modalEmployeeissuing_authority_civil_status" placeholder="جهة الاصدار"
                                class="form-control @error('issuing_authority_civil_status') is-invalid is-filled @enderror" />
                            <label for="modalEmployeeissuing_authority_civil_status">جهة الاصدار</label>
                        </div>
                        @error('issuing_authority_civil_status')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                </div>

                <div class="divider text-start">
                    <div class="divider-text">شهادة الجنسية</div>
                </div>
                <div Class="row g-4">
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='nationality_certificate_number' type="text"
                                id="modalEmployeenationality_certificate_number" placeholder="رقم شهادة الجنسية"
                                class="form-control @error('nationality_certificate_number') is-invalid is-filled @enderror" />
                            <label for="modalEmployeenationality_certificate_number">رقم شهادة الجنسية</label>
                        </div>
                        @error('nationality_certificate_number')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='wallet_number' type="text" id="modalEmployeewallet_number"
                                placeholder="رقم المحفظة"
                                class="form-control @error('wallet_number') is-invalid is-filled @enderror" />
                            <label for="modalEmployeewallet_number">رقم المحفظة</label>
                        </div>
                        @error('wallet_number')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='issue_date_nationality_certificate' type="date"
                                id="modalEmployeeissue_date_nationality_certificate" placeholder="تاريخ الاصدار"
                                class="form-control @error('issue_date_nationality_certificate') is-invalid is-filled @enderror" />
                            <label for="modalEmployeeissue_date_nationality_certificate">تاريخ الاصدار</label>
                        </div>
                        @error('issue_date_nationality_certificate')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='issuing_authority_nationality_certificate' type="text"
                                id="modalEmployeeissuing_authority_nationality_certificate" placeholder="جهة الاصدار"
                                class="form-control @error('issuing_authority_nationality_certificate') is-invalid is-filled @enderror" />
                            <label for="modalEmployeeissuing_authority_nationality_certificate">جهة
                                الاصدار</label>
                        </div>
                        @error('issuing_authority_nationality_certificate')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                </div>

                <div class="divider text-start">
                    <div class="divider-text">بطاقة السكن</div>
                </div>
                <div Class="row g-4">
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='residence_card_number' type="text"
                                id="modalEmployeeresidence_card_number" placeholder="رقم بطاقة السكن"
                                class="form-control @error('residence_card_number') is-invalid is-filled @enderror" />
                            <label for="modalEmployeeresidence_card_number">رقم بطاقة السكن</label>
                        </div>
                        @error('residence_card_number')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='information_office' type="text"
                                id="modalEmployeeinformation_office" placeholder="مكتب المعلومات"
                                class="form-control @error('information_office') is-invalid is-filled @enderror" />
                            <label for="modalEmployeeinformation_office">مكتب المعلومات</label>
                        </div>
                        @error('information_office')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='organization_date' type="date"
                                id="modalEmployeeorganization_date" placeholder="تاريخ التنظيم"
                                class="form-control @error('organization_date') is-invalid is-filled @enderror" />
                            <label for="modalEmployeeorganization_date">تاريخ التنظيم</label>
                        </div>
                        @error('organization_date')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>

                </div>

                <div class="divider text-start">
                    <div class="divider-text">البطاقة التموينية</div>
                </div>
                <div Class="row g-4">
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='ration_card_number' type="text"
                                id="modalEmployeeration_card_number" placeholder="رقم البطاقة التموينية"
                                class="form-control @error('ration_card_number') is-invalid is-filled @enderror" />
                            <label for="modalEmployeeration_card_number">رقم البطاقة التموينية</label>
                        </div>
                        @error('ration_card_number')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>

                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='ration_card_date' type="date"
                                id="modalEmployeeration_card_date" placeholder="تاريخ البطاقة التموينية"
                                class="form-control @error('ration_card_date') is-invalid is-filled @enderror" />
                            <label for="modalEmployeeration_card_date">تاريخ البطاقة التموينية</label>
                        </div>
                        @error('ration_card_date')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='national_card_number' type="text"
                                id="modalEmployeenational_card_number" placeholder="رقم البطاقة الوطنية"
                                class="form-control @error('national_card_number') is-invalid is-filled @enderror" />
                            <label for="modalEmployeenational_card_number">رقم البطاقة الوطنية</label>
                        </div>
                        @error('national_card_number')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='national_card_date' type="date"
                                id="modalEmployeenational_card_date" placeholder="تاريخ البطاقة الوطنية"
                                class="form-control @error('national_card_date') is-invalid is-filled @enderror" />
                            <label for="modalEmployeenational_card_date">تاريخ البطاقة الوطنية</label>
                        </div>
                        @error('national_card_date')
                            <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                    </div>
                </div>
            </div>

            @include('livewire.workers.modals.add-takhroj')
        </div>
    </div>
</div>

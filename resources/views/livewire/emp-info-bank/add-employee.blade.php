<div>
    @can('employee-create')
    <a href="{{ Route('AddEmployee') }}" class=" sticky-button btn btn-primary">حفظ المعلومات</a>
    @endcan
</div>

<div class="row">
    <div class="col">
        <h4 class="py-3">
            اضافة معلومات الموظف
        </h4>


        <div class="card mb-3">
            <div class="card-header">
                <ul class="nav nav-tabs" role="tablist">

                    {{-- 01 --}}
                    <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#form-tabs-1" role="tab"
                            aria-selected="True">بيانات الأسم</button>
                    </li>



                    {{-- 02 --}}
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#form-tabs-2" role="tab"
                            aria-selected="True"> البيانات الشحصية </button>
                    </li>



                    {{-- 03 --}}
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#form-tabs-3" role="tab"
                            aria-selected="True"> التحصيل الدراسي</button>
                    </li>



                    {{-- 04 --}}
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#form-tabs-4" role="tab"
                            aria-selected="True">مستمسكات الموظف</button>
                    </li>



                    {{-- 05 --}}
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#form-tabs-5" role="tab"
                            aria-selected="True">المعلومات الوظيفية</button>
                    </li>



                    {{-- 06 --}}
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#form-tabs-6" role="tab"
                            aria-selected="True"> المنصب وموقع العمل</button>
                    </li>



                    {{-- 07 --}}
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#form-tabs-7" role="tab"
                            aria-selected="True">تفاصيل الخدمة</button>
                    </li>



                    {{-- 08 --}}
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#form-tabs-8" role="tab"
                            aria-selected="True">بيانات التوطين</button>
                    </li>



                    {{-- 09 --}}
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#form-tabs-9" role="tab"
                            aria-selected="True">الارشفة الالكترونية</button>
                    </li>



                </ul>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade active show" id="form-tabs-1" role="tabpanel">
                    <form>

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
                                    <input wire:model.defer='employee_number' type="text"
                                        id="modalEmployeeemployee_number" placeholder="الرقم الوظيفي"
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
                        </div>
                        <div Class="row g-4">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='first_name' type="text" id="modalEmployeefirst_name"
                                        placeholder="الاسم الاول"
                                        class="form-control @error('first_name') is-invalid is-filled @enderror" />
                                    <label for="modalEmployeefirst_name">الاسم الاول</label>
                                </div>
                                @error('first_name')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='father_name' type="text" id="modalEmployeefather_name"
                                        placeholder="اسم الاب"
                                        class="form-control @error('father_name') is-invalid is-filled @enderror" />
                                    <label for="modalEmployeefather_name">اسم الاب</label>
                                </div>
                                @error('father_name')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='grandfather_name' type="text"
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
                                    <input wire:model.defer='great_grandfather_name' type="text"
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
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='surname' type="text" id="modalEmployeesurname"
                                        placeholder="اللقب"
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
                                        class="form-control @error('full_name') is-invalid is-filled @enderror" />
                                    <label for="modalEmployeefull_name">الاسم الكامل</label>
                                </div>
                                @error('full_name')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='mother_name' type="text" id="modalEmployeemother_name"
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
                                    <input wire:model.defer='maternal_grandfather_name' type="text"
                                        id="modalEmployeematernal_grandfather_name" placeholder="اسم والد الام"
                                        class="form-control @error('maternal_grandfather_name') is-invalid is-filled @enderror" />
                                    <label for="modalEmployeematernal_grandfather_name">اسم والد الام</label>
                                </div>
                                @error('maternal_grandfather_name')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>
                        <div Class="row g-4">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='maternal_great_grandfather_name' type="text"
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
                                    <input wire:model.defer='maternal_surname' type="text"
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
                                        class="form-control @error('mother_full_name') is-invalid is-filled @enderror" />
                                    <label for="modalEmployeemother_full_name">اسم الام الكامل</label>
                                </div>
                                @error('mother_full_name')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
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
                        </div>
                        <div Class="row g-4">
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
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='department_name' type="text"
                                        id="modalEmployeedepartment_name" placeholder="اسم الدائرة"
                                        class="form-control @error('department_name') is-invalid is-filled @enderror" />
                                    <label for="modalEmployeedepartment_name">اسم الدائرة</label>
                                </div>
                                @error('department_name')
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
                    </form>
                </div>

                <div class="tab-pane fade" id="form-tabs-2" role="tabpanel">
                    <form>


                        <div Class="row g-4">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <select wire:model.defer='governorate_id'
                                        wire:change='GetDistricts($event.target.value)' id="governorate_id"
                                        class="form-select @error('governorate_id') is-invalid is-filled @enderror">
                                        <option value=""></option>
                                        @foreach ($Governorates as $Governorate)
                                        <option value="{{ $Governorate->id }}">{{ $Governorate->governorate_name }}
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
                                        wire:change='GetAreas($event.target.value)' id="district_id"
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
                                    <input wire:model.defer='birth_date' type="date" id="modalEmployeebirth_date"
                                        placeholder="تاريخ التولد"
                                        class="form-control @error('birth_date') is-invalid is-filled @enderror" />
                                    <label for="modalEmployeebirth_date">تاريخ التولد</label>
                                </div>
                                @error('birth_date')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='birth_place' type="text" id="modalEmployeebirth_place"
                                        placeholder="محل الولادة"
                                        class="form-control @error('birth_place') is-invalid is-filled @enderror" />
                                    <label for="modalEmployeebirth_place">محل الولادة</label>
                                </div>
                                @error('birth_place')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>

                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <select wire:model.defer='marital_status' id="modalEmployeemarital_status"
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
                                        placeholder="اسم الزوجة"
                                        class="form-control @error('wife_name') is-invalid is-filled @enderror" />
                                    <label for="modalEmployeewife_name">اسم الزوجة</label>
                                </div>
                                @error('wife_name')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>

                        </div>
                        <div Class="row g-4">



                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <select wire:model.defer='children_count' id="modalEmployeechildren_count"
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


                        </div>

                    </form>
                </div>

                <div class="tab-pane fade" id="form-tabs-3" role="tabpanel">
                    <form>

                        <div Class="row g-4">


                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <select wire:model.defer='education_service' id="modalEmployeeeducation_service"
                                        placeholder="التحصيل الدراسي الحالي"
                                        class="form-select @error('education_service') is-invalid is-filled @enderror">
                                        <option value=""></option>
                                        <option value="امي">امي</option>
                                        <option value="يقرا فقط">يقرا فقط</option>
                                        <option value="يقرا ويكتب">يقرا ويكتب</option>
                                        <option value="ابتدائية">ابتدائية</option>
                                        <option value="متوسطة">متوسطة</option>
                                        <option value="اعدادية">اعدادية</option>
                                        <option value="دبلوم">دبلوم</option>
                                        <option value="بكالوريوس">بكالوريوس</option>
                                        <option value="دبلوم عالي">دبلوم عالي</option>
                                        <option value="ماجستير">ماجستير</option>
                                        <option value="دكتوراه">دكتوراه</option>
                                        <option value="اعلى شهادة اختصاص">اعلى شهادة اختصاص</option>
                                        <option value="غير مبين">غير مبين</option>
                                        <option value="محو الامية">محو الامية</option>
                                    </select>
                                    <label for="modalEmployeeeducation_service">التحصيل الدراسي الحالي</label>
                                </div>
                                @error('education_service')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>



                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <select wire:model.defer='graduation_year_service'
                                        id="modalEmployeegraduation_year_service" placeholder="سنة التخرج الحالية"
                                        class="form-select @error('graduation_year_service') is-invalid is-filled @enderror">
                                        <option value=""></option>
                                        <option value="1950-1951">1950-1951</option>
                                        <option value="1951-1952">1951-1952</option>
                                        <option value="1952-1953">1952-1953</option>
                                        <option value="1953-1954">1953-1954</option>
                                        <option value="1954-1955">1954-1955</option>
                                        <option value="1955-1956">1955-1956</option>
                                        <option value="1956-1957">1956-1957</option>
                                        <option value="1957-1958">1957-1958</option>
                                        <option value="1958-1959">1958-1959</option>
                                        <option value="1959-1960">1959-1960</option>
                                        <option value="1960-1961">1960-1961</option>
                                        <option value="1961-1962">1961-1962</option>
                                        <option value="1962-1963">1962-1963</option>
                                        <option value="1963-1964">1963-1964</option>
                                        <option value="1964-1965">1964-1965</option>
                                        <option value="1965-1966">1965-1966</option>
                                        <option value="1966-1967">1966-1967</option>
                                        <option value="1967-1968">1967-1968</option>
                                        <option value="1968-1969">1968-1969</option>
                                        <option value="1969-1970">1969-1970</option>
                                        <option value="1970-1971">1970-1971</option>
                                        <option value="1971-1972">1971-1972</option>
                                        <option value="1972-1973">1972-1973</option>
                                        <option value="1973-1974">1973-1974</option>
                                        <option value="1974-1975">1974-1975</option>
                                        <option value="1975-1976">1975-1976</option>
                                        <option value="1976-1977">1976-1977</option>
                                        <option value="1977-1978">1977-1978</option>
                                        <option value="1978-1979">1978-1979</option>
                                        <option value="1979-1980">1979-1980</option>
                                        <option value="1980-1981">1980-1981</option>
                                        <option value="1981-1982">1981-1982</option>
                                        <option value="1982-1983">1982-1983</option>
                                        <option value="1983-1984">1983-1984</option>
                                        <option value="1984-1985">1984-1985</option>
                                        <option value="1985-1986">1985-1986</option>
                                        <option value="1986-1987">1986-1987</option>
                                        <option value="1987-1988">1987-1988</option>
                                        <option value="1988-1989">1988-1989</option>
                                        <option value="1989-1990">1989-1990</option>
                                        <option value="1990-1991">1990-1991</option>
                                        <option value="1991-1992">1991-1992</option>
                                        <option value="1992-1993">1992-1993</option>
                                        <option value="1993-1994">1993-1994</option>
                                        <option value="1994-1995">1994-1995</option>
                                        <option value="1995-1996">1995-1996</option>
                                        <option value="1996-1997">1996-1997</option>
                                        <option value="1997-1998">1997-1998</option>
                                        <option value="1998-1999">1998-1999</option>
                                        <option value="1999-2000">1999-2000</option>
                                        <option value="2000-2001">2000-2001</option>
                                        <option value="2001-2002">2001-2002</option>
                                        <option value="2002-2003">2002-2003</option>
                                        <option value="2003-2004">2003-2004</option>
                                        <option value="2004-2005">2004-2005</option>
                                        <option value="2005-2006">2005-2006</option>
                                        <option value="2006-2007">2006-2007</option>
                                        <option value="2007-2008">2007-2008</option>
                                        <option value="2008-2009">2008-2009</option>
                                        <option value="2009-2010">2009-2010</option>
                                        <option value="2010-2011">2010-2011</option>
                                        <option value="2011-2012">2011-2012</option>
                                        <option value="2012-2013">2012-2013</option>
                                        <option value="2013-2014">2013-2014</option>
                                        <option value="2014-2015">2014-2015</option>
                                        <option value="2015-2016">2015-2016</option>
                                        <option value="2016-2017">2016-2017</option>
                                        <option value="2017-2018">2017-2018</option>
                                        <option value="2018-2019">2018-2019</option>
                                        <option value="2019-2020">2019-2020</option>
                                        <option value="2020-2021">2020-2021</option>
                                        <option value="2021-2022">2021-2022</option>
                                        <option value="2022-2023">2022-2023</option>
                                        <option value="2023-2024">2023-2024</option>
                                        <option value="2024-2025">2024-2025</option>
                                        <option value="2025-2026">2025-2026</option>
                                        <option value="2026-2027">2026-2027</option>
                                        <option value="2027-2028">2027-2028</option>
                                        <option value="2028-2029">2028-2029</option>
                                        <option value="2029-2030">2029-2030</option>
                                        <option value="2030-2031">2030-2031</option>
                                        <option value="2031-2032">2031-2032</option>
                                        <option value="2032-2033">2032-2033</option>
                                        <option value="2033-2034">2033-2034</option>
                                        <option value="2034-2035">2034-2035</option>
                                        <option value="2035-2036">2035-2036</option>
                                        <option value="2036-2037">2036-2037</option>
                                        <option value="2037-2038">2037-2038</option>
                                        <option value="2038-2039">2038-2039</option>
                                        <option value="2039-2040">2039-2040</option>
                                        <option value="2040-2041">2040-2041</option>
                                        <option value="2041-2042">2041-2042</option>
                                        <option value="2042-2043">2042-2043</option>
                                        <option value="2043-2044">2043-2044</option>
                                        <option value="2044-2045">2044-2045</option>
                                        <option value="2045-2046">2045-2046</option>
                                        <option value="2046-2047">2046-2047</option>
                                        <option value="2047-2048">2047-2048</option>
                                        <option value="2048-2049">2048-2049</option>
                                        <option value="2049-2050">2049-2050</option>
                                        <option value="2050-2051">2050-2051</option>
                                        <option value="2051-2052">2051-2052</option>
                                        <option value="2052-2053">2052-2053</option>
                                        <option value="2053-2054">2053-2054</option>
                                        <option value="2054-2055">2054-2055</option>
                                        <option value="2055-2056">2055-2056</option>
                                        <option value="2056-2057">2056-2057</option>
                                        <option value="2057-2058">2057-2058</option>
                                        <option value="2058-2059">2058-2059</option>
                                        <option value="2059-2060">2059-2060</option>
                                        <option value="2060-2061">2060-2061</option>
                                        <option value="2061-2062">2061-2062</option>
                                        <option value="2062-2063">2062-2063</option>
                                        <option value="2063-2064">2063-2064</option>
                                        <option value="2064-2065">2064-2065</option>
                                        <option value="2065-2066">2065-2066</option>
                                        <option value="2066-2067">2066-2067</option>
                                        <option value="2067-2068">2067-2068</option>
                                        <option value="2068-2069">2068-2069</option>
                                        <option value="2069-2070">2069-2070</option>
                                        <option value="2070-2071">2070-2071</option>
                                        <option value="2071-2072">2071-2072</option>
                                        <option value="2072-2073">2072-2073</option>
                                        <option value="2073-2074">2073-2074</option>
                                        <option value="2074-2075">2074-2075</option>
                                        <option value="2075-2076">2075-2076</option>
                                        <option value="2076-2077">2076-2077</option>
                                        <option value="2077-2078">2077-2078</option>
                                        <option value="2078-2079">2078-2079</option>
                                        <option value="2079-2080">2079-2080</option>
                                        <option value="2080-2081">2080-2081</option>
                                        <option value="2081-2082">2081-2082</option>
                                        <option value="2082-2083">2082-2083</option>
                                        <option value="2083-2084">2083-2084</option>
                                        <option value="2084-2085">2084-2085</option>
                                        <option value="2085-2086">2085-2086</option>
                                        <option value="2086-2087">2086-2087</option>
                                        <option value="2087-2088">2087-2088</option>
                                        <option value="2088-2089">2088-2089</option>
                                        <option value="2089-2090">2089-2090</option>
                                        <option value="2090-2091">2090-2091</option>
                                        <option value="2091-2092">2091-2092</option>
                                        <option value="2092-2093">2092-2093</option>
                                        <option value="2093-2094">2093-2094</option>
                                        <option value="2094-2095">2094-2095</option>
                                        <option value="2095-2096">2095-2096</option>
                                        <option value="2096-2097">2096-2097</option>
                                        <option value="2097-2098">2097-2098</option>
                                        <option value="2098-2099">2098-2099</option>
                                        <option value="2099-2100">2099-2100</option>
                                        <option value="2100-2101">2100-2101</option>
                                    </select>
                                    <label for="modalEmployeegraduation_year_service">سنة التخرج الحالية</label>
                                </div>
                                @error('graduation_year_service')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>


                            <div class="mb-3 col">
                                <div class="input-group">
                                    <div class="form-floating form-floating-outline">
                                        <select wire:model.defer="graduation_institution_service"
                                            id="modalEmployeesgraduation_institution_service"
                                            class="form-select @error('graduation_institution_service') is-invalid @enderror"
                                            aria-label="Specialization">
                                            <option value=""></option>
                                            @foreach ($graduations as $graduation)
                                            <option value="{{ $graduation->id }}">{{ $graduation->graduations_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <label for="graduation_institution_service">جهة التخرج الحالي</label>
                                    </div>
                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                        data-bs-target="#addspecializationModal">
                                        <i class="mdi mdi-playlist-plus"></i>
                                    </button>
                                </div>
                                @error('specialization_service')
                                <small class="text-danger inputerror">{{ $message }}</small>
                                @enderror
                            </div>


                            <div class="mb-3 col">
                                <div class="input-group">
                                    <div class="form-floating form-floating-outline">
                                        <select wire:model.defer="specialization_service"
                                            id="modalEmployeespecialization_service"
                                            class="form-select @error('specialization_service') is-invalid @enderror"
                                            aria-label="Specialization">
                                            <option value=""></option>
                                            @foreach ($specializations as $specialization)
                                            <option value="{{ $specialization->id }}">{{
                                                $specialization->specializations_name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="specialization_service">الاختصاص الحالي</label>
                                    </div>
                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                        data-bs-target="#addspecializationModal">
                                        <i class="mdi mdi-playlist-plus"></i>
                                    </button>
                                </div>
                                @error('specialization_service')
                                <small class="text-danger inputerror">{{ $message }}</small>
                                @enderror
                            </div>





                        </div>
                        <div Class="row g-4">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='document_number' type="text"
                                        id="modalEmployeedocument_number" placeholder="رقم الوثيقة"
                                        class="form-control @error('document_number') is-invalid is-filled @enderror" />
                                    <label for="modalEmployeedocument_number">رقم الوثيقة</label>
                                </div>
                                @error('document_number')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='document_date' type="date" id="modalEmployeedocument_date"
                                        placeholder="تاريخ الوثيقة"
                                        class="form-control @error('document_date') is-invalid is-filled @enderror" />
                                    <label for="modalEmployeedocument_date">تاريخ الوثيقة</label>
                                </div>
                                @error('document_date')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='document_verification_number' type="text"
                                        id="modalEmployeedocument_verification_number" placeholder="رقم صحة الصدور"
                                        class="form-control @error('document_verification_number') is-invalid is-filled @enderror" />
                                    <label for="modalEmployeedocument_verification_number">رقم صحة الصدور</label>
                                </div>
                                @error('document_verification_number')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='document_verification_date' type="date"
                                        id="modalEmployeedocument_verification_date" placeholder="تاريخ صحة الصدور"
                                        class="form-control @error('document_verification_date') is-invalid is-filled @enderror" />
                                    <label for="modalEmployeedocument_verification_date">تاريخ صحة الصدور</label>
                                </div>
                                @error('document_verification_date')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>
                        <div Class="row g-4">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='education_appointment' type="text"
                                        id="modalEmployeeeducation_appointment" placeholder="التحصيل الدراسي التعيين"
                                        class="form-control @error('education_appointment') is-invalid is-filled @enderror" />
                                    <label for="modalEmployeeeducation_appointment">التحصيل الدراسي التعيين</label>
                                </div>
                                @error('education_appointment')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='graduation_year_appointment' type="text"
                                        id="modalEmployeegraduation_year_appointment" placeholder="سنة تخرج التعيين"
                                        class="form-control @error('graduation_year_appointment') is-invalid is-filled @enderror" />
                                    <label for="modalEmployeegraduation_year_appointment">سنة تخرج التعيين</label>
                                </div>
                                @error('graduation_year_appointment')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='graduation_institution_appointment' type="text"
                                        id="modalEmployeegraduation_institution_appointment"
                                        placeholder="جهة تخرج التعيين"
                                        class="form-control @error('graduation_institution_appointment') is-invalid is-filled @enderror" />
                                    <label for="modalEmployeegraduation_institution_appointment">جهة تخرج
                                        التعيين</label>
                                </div>
                                @error('graduation_institution_appointment')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='specialization_appointment' type="text"
                                        id="modalEmployeespecialization_appointment" placeholder="الاختصاص التعيين"
                                        class="form-control @error('specialization_appointment') is-invalid is-filled @enderror" />
                                    <label for="modalEmployeespecialization_appointment">الاختصاص التعيين</label>
                                </div>
                                @error('specialization_appointment')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>

                    </form>
                </div>

                <div class="tab-pane fade" id="form-tabs-4" role="tabpanel">
                    <form>


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
                        <hr>
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
                                        id="modalEmployeeissuing_authority_nationality_certificate"
                                        placeholder="جهة الاصدار"
                                        class="form-control @error('issuing_authority_nationality_certificate') is-invalid is-filled @enderror" />
                                    <label for="modalEmployeeissuing_authority_nationality_certificate">جهة
                                        الاصدار</label>
                                </div>
                                @error('issuing_authority_nationality_certificate')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>
                        <hr>
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
                        <hr>
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
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>



<div class="mt-n4">
    <h4 class="py-3">
        اضافة معلومات
    </h4>

    <div>
        @can('employee-create')
            <a href="{{ Route('AddEmployee') }}" class=" sticky-button btn btn-primary">حفظ المعلومات</a>
        @endcan
    </div>

    <div class="mb-4 col-12">
        <div class="mt-2 bs-stepper wizard-vertical vertical wizard-numbered wizard-modern">
            <div class="bs-stepper-header gap-lg-2">


                                  {{--  01  --}}

                    <div class="step {{ 1 == $currentStep ? $activatedStep : '' }} {{ 1 < $currentStep ? $crossedStep : '' }}"
                    data-target="#step-01">
                    <button {{-- wire:click="buttonStep({{ $stepStep }})" --}} type="button" class="step-trigger">
                        <span class="bs-stepper-circle"><i class="mdi mdi-check"></i></span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-number">01</span>
                            <span class="gap-1 d-flex flex-column ms-2">
                                <span class="{{-- bs-stepper-title --}}">صفحة </span>
                                {{-- <span class="bs-stepper-subtitle">Question eLigibility test</span> --}}
                            </span>
                        </span>
                    </button>
                </div>


</div>

               <div class="bs-stepper-content">
                <form onSubmit="Return False">
                        <div id="step-00" class="content {{ 0 == $currentStep ? $activatedStep : '' }}">
                        <h4 class="mb-3 fw-bolder">Tests Study step</h4>
                        <hr>
                        <h4 class="mb-3 text-center fw-bolder">Tests Study Step</h4>
                        <h3 Class="mb-3 text-center fw-bolder text-danger">Instep (STOP)</h3>
                        <hr>
                    </div>



                                     <div id="step-01" class="content {{ 1 == $currentStep ? $activatedStep : '' }}">
                                     <h4 class="mb-3 fw-bolder">صفحة 1 </h4>
                                     <hr>

                <div class="row mb-n4">
                    <div class="mb-3 col">
                          <div Class="row">

                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='calculator_number' type="textarea " id="modalEmployeecalculator_number"
                                                                placeholder="رقم الحاسبة"
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


                    </div>
                                        <div Class="row">
                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='paper_folder_number' type="text" id="modalEmployeepaper_folder_number"
                                                                placeholder="رقم الاضبارة الورقية"
                                                                class="form-control @error('paper_folder_number') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeepaper_folder_number">رقم الاضبارة الورقية</label>
                                                        </div>
                                                        @error('paper_folder_number')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



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
                                                            <input wire:model.defer='father_name' type="date" id="modalEmployeefather_name"
                                                                placeholder="اسم الاب"
                                                                class="form-control @error('father_name') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeefather_name">اسم الاب</label>
                                                        </div>
                                                        @error('father_name')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>


                    </div>
                                        <div Class="row">
                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='grandfather_name' type="number" id="modalEmployeegrandfather_name"
                                                                placeholder="اسم الجد"
                                                                class="form-control @error('grandfather_name') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeegrandfather_name">اسم الجد</label>
                                                        </div>
                                                        @error('grandfather_name')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='great_grandfather_name' type="email" id="modalEmployeegreat_grandfather_name"
                                                                placeholder="اسم والد الجد"
                                                                class="form-control @error('great_grandfather_name') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeegreat_grandfather_name">اسم والد الجد</label>
                                                        </div>
                                                        @error('great_grandfather_name')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='surname' type="select" id="modalEmployeesurname"
                                                                placeholder="اللقب"
                                                                class="form-control @error('surname') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeesurname">اللقب</label>
                                                        </div>
                                                        @error('surname')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>


                    </div>
                                        <div Class="row">
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
                                                            <input wire:model.defer='mother_name' type="password" id="modalEmployeemother_name"
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
                                                            <input wire:model.defer='maternal_grandfather_name' type="file" id="modalEmployeematernal_grandfather_name"
                                                                placeholder="اسم والد الام"
                                                                class="form-control @error('maternal_grandfather_name') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeematernal_grandfather_name">اسم والد الام</label>
                                                        </div>
                                                        @error('maternal_grandfather_name')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>


                    </div>
                                        <div Class="row">
                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='maternal_great_grandfather_name' type="text" id="modalEmployeematernal_great_grandfather_name"
                                                                placeholder="اسم جد الام"
                                                                class="form-control @error('maternal_great_grandfather_name') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeematernal_great_grandfather_name">اسم جد الام</label>
                                                        </div>
                                                        @error('maternal_great_grandfather_name')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='maternal_surname' type="text" id="modalEmployeematernal_surname"
                                                                placeholder="لقب الام"
                                                                class="form-control @error('maternal_surname') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeematernal_surname">لقب الام</label>
                                                        </div>
                                                        @error('maternal_surname')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='mother_full_name' type="text" id="modalEmployeemother_full_name"
                                                                placeholder="اسم الام الكامل"
                                                                class="form-control @error('mother_full_name') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeemother_full_name">اسم الام الكامل</label>
                                                        </div>
                                                        @error('mother_full_name')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>


                    </div>
                                        <div Class="row">
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



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='district' type="text" id="modalEmployeedistrict"
                                                                placeholder="القضاء"
                                                                class="form-control @error('district') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeedistrict">القضاء</label>
                                                        </div>
                                                        @error('district')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='sub_district' type="text" id="modalEmployeesub_district"
                                                                placeholder="الناحية"
                                                                class="form-control @error('sub_district') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeesub_district">الناحية</label>
                                                        </div>
                                                        @error('sub_district')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>


                    </div>
                                        <div Class="row">
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
                                                            <input wire:model.defer='employee_id_number' type="text" id="modalEmployeeemployee_id_number"
                                                                placeholder="رقم هوية الموظف"
                                                                class="form-control @error('employee_id_number') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeeemployee_id_number">رقم هوية الموظف</label>
                                                        </div>
                                                        @error('employee_id_number')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>


                    </div>
                                        <div Class="row">
                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='department_name' type="text" id="modalEmployeedepartment_name"
                                                                placeholder="اسم الدائرة"
                                                                class="form-control @error('department_name') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeedepartment_name">اسم الدائرة</label>
                                                        </div>
                                                        @error('department_name')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='blood_type' type="text" id="modalEmployeeblood_type"
                                                                placeholder="صنف الدم"
                                                                class="form-control @error('blood_type') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeeblood_type">صنف الدم</label>
                                                        </div>
                                                        @error('blood_type')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
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
                                        <div Class="row">
                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='birth_date' type="text" id="modalEmployeebirth_date"
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
                                                            <input wire:model.defer='governorate' type="text" id="modalEmployeegovernorate"
                                                                placeholder="المحافظة"
                                                                class="form-control @error('governorate') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeegovernorate">المحافظة</label>
                                                        </div>
                                                        @error('governorate')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>


                    </div>
                                        <div Class="row">
                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='residence' type="text" id="modalEmployeeresidence"
                                                                placeholder="مسقط الراس"
                                                                class="form-control @error('residence') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeeresidence">مسقط الراس</label>
                                                        </div>
                                                        @error('residence')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='marital_status' type="text" id="modalEmployeemarital_status"
                                                                placeholder="الحالة الزوجية"
                                                                class="form-control @error('marital_status') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeemarital_status">الحالة الزوجية</label>
                                                        </div>
                                                        @error('marital_status')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='religion' type="text" id="modalEmployeereligion"
                                                                placeholder="الديانة"
                                                                class="form-control @error('religion') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeereligion">الديانة</label>
                                                        </div>
                                                        @error('religion')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>


                    </div>
                                        <div Class="row">
                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='gender' type="text" id="modalEmployeegender"
                                                                placeholder="الجنس"
                                                                class="form-control @error('gender') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeegender">الجنس</label>
                                                        </div>
                                                        @error('gender')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='children_count' type="text" id="modalEmployeechildren_count"
                                                                placeholder="عدد الاطفال"
                                                                class="form-control @error('children_count') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeechildren_count">عدد الاطفال</label>
                                                        </div>
                                                        @error('children_count')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='id_card_number' type="text" id="modalEmployeeid_card_number"
                                                                placeholder="رقم البطاقة"
                                                                class="form-control @error('id_card_number') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeeid_card_number">رقم البطاقة</label>
                                                        </div>
                                                        @error('id_card_number')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>


                    </div>
                                        <div Class="row">
                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='issue_date' type="text" id="modalEmployeeissue_date"
                                                                placeholder="تاريخ الاصدار"
                                                                class="form-control @error('issue_date') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeeissue_date">تاريخ الاصدار</label>
                                                        </div>
                                                        @error('issue_date')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='form_number' type="text" id="modalEmployeeform_number"
                                                                placeholder="رقم الاستمارة"
                                                                class="form-control @error('form_number') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeeform_number">رقم الاستمارة</label>
                                                        </div>
                                                        @error('form_number')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='information_office' type="text" id="modalEmployeeinformation_office"
                                                                placeholder="مكتب المعلومات"
                                                                class="form-control @error('information_office') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeeinformation_office">مكتب المعلومات</label>
                                                        </div>
                                                        @error('information_office')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>


                    </div>
                                        <div Class="row">
                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='center_name' type="text" id="modalEmployeecenter_name"
                                                                placeholder="اسم المركز"
                                                                class="form-control @error('center_name') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeecenter_name">اسم المركز</label>
                                                        </div>
                                                        @error('center_name')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='center_number' type="text" id="modalEmployeecenter_number"
                                                                placeholder="رقم المركز"
                                                                class="form-control @error('center_number') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeecenter_number">رقم المركز</label>
                                                        </div>
                                                        @error('center_number')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='driving_license' type="text" id="modalEmployeedriving_license"
                                                                placeholder="اجازة السوق"
                                                                class="form-control @error('driving_license') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeedriving_license">اجازة السوق</label>
                                                        </div>
                                                        @error('driving_license')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>


                    </div>
                                        <div Class="row">
                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='license_expiry_date' type="text" id="modalEmployeelicense_expiry_date"
                                                                placeholder="تاريخ الانتهاء"
                                                                class="form-control @error('license_expiry_date') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeelicense_expiry_date">تاريخ الانتهاء</label>
                                                        </div>
                                                        @error('license_expiry_date')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='education_service' type="text" id="modalEmployeeeducation_service"
                                                                placeholder="التحصيل الدراسي اثناء الخدمة"
                                                                class="form-control @error('education_service') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeeeducation_service">التحصيل الدراسي اثناء الخدمة</label>
                                                        </div>
                                                        @error('education_service')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='graduation_year_service' type="text" id="modalEmployeegraduation_year_service"
                                                                placeholder="سنة التخرج اثناء الخدمة"
                                                                class="form-control @error('graduation_year_service') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeegraduation_year_service">سنة التخرج اثناء الخدمة</label>
                                                        </div>
                                                        @error('graduation_year_service')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>


                    </div>
                                        <div Class="row">
                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='graduation_institution_service' type="text" id="modalEmployeegraduation_institution_service"
                                                                placeholder="جهة التخرج اثناء الخدمة"
                                                                class="form-control @error('graduation_institution_service') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeegraduation_institution_service">جهة التخرج اثناء الخدمة</label>
                                                        </div>
                                                        @error('graduation_institution_service')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='specialization_service' type="text" id="modalEmployeespecialization_service"
                                                                placeholder="الاختصاص اثناء الخدمة"
                                                                class="form-control @error('specialization_service') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeespecialization_service">الاختصاص اثناء الخدمة</label>
                                                        </div>
                                                        @error('specialization_service')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='document_number' type="text" id="modalEmployeedocument_number"
                                                                placeholder="رقم الوثيقة"
                                                                class="form-control @error('document_number') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeedocument_number">رقم الوثيقة</label>
                                                        </div>
                                                        @error('document_number')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>


                    </div>
                                        <div Class="row">
                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='document_date' type="text" id="modalEmployeedocument_date"
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
                                                            <input wire:model.defer='document_verification_number' type="text" id="modalEmployeedocument_verification_number"
                                                                placeholder="رقم صحة الصدور"
                                                                class="form-control @error('document_verification_number') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeedocument_verification_number">رقم صحة الصدور</label>
                                                        </div>
                                                        @error('document_verification_number')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='document_verification_date' type="text" id="modalEmployeedocument_verification_date"
                                                                placeholder="تاريخ صحة الصدور"
                                                                class="form-control @error('document_verification_date') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeedocument_verification_date">تاريخ صحة الصدور</label>
                                                        </div>
                                                        @error('document_verification_date')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>


                    </div>
                                        <div Class="row">
                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='education_appointment' type="text" id="modalEmployeeeducation_appointment"
                                                                placeholder="التحصيل الدراسي التعيين"
                                                                class="form-control @error('education_appointment') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeeeducation_appointment">التحصيل الدراسي التعيين</label>
                                                        </div>
                                                        @error('education_appointment')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='graduation_year_appointment' type="text" id="modalEmployeegraduation_year_appointment"
                                                                placeholder="سنة تخرج التعيين"
                                                                class="form-control @error('graduation_year_appointment') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeegraduation_year_appointment">سنة تخرج التعيين</label>
                                                        </div>
                                                        @error('graduation_year_appointment')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='graduation_institution_appointment' type="text" id="modalEmployeegraduation_institution_appointment"
                                                                placeholder="جهة تخرج التعيين"
                                                                class="form-control @error('graduation_institution_appointment') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeegraduation_institution_appointment">جهة تخرج التعيين</label>
                                                        </div>
                                                        @error('graduation_institution_appointment')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>


                    </div>
                                        <div Class="row">
                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='specialization_appointment' type="text" id="modalEmployeespecialization_appointment"
                                                                placeholder="الاختصاص التعيين"
                                                                class="form-control @error('specialization_appointment') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeespecialization_appointment">الاختصاص التعيين</label>
                                                        </div>
                                                        @error('specialization_appointment')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='service_type' type="text" id="modalEmployeeservice_type"
                                                                placeholder="نوع الخدمة"
                                                                class="form-control @error('service_type') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeeservice_type">نوع الخدمة</label>
                                                        </div>
                                                        @error('service_type')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='service_status' type="text" id="modalEmployeeservice_status"
                                                                placeholder="حالة الخدمة"
                                                                class="form-control @error('service_status') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeeservice_status">حالة الخدمة</label>
                                                        </div>
                                                        @error('service_status')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>


                    </div>
                                        <div Class="row">
                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='contract_type' type="text" id="modalEmployeecontract_type"
                                                                placeholder="نوع العقد"
                                                                class="form-control @error('contract_type') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeecontract_type">نوع العقد</label>
                                                        </div>
                                                        @error('contract_type')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='service_case_type' type="text" id="modalEmployeeservice_case_type"
                                                                placeholder="نوع حالة الخدمة"
                                                                class="form-control @error('service_case_type') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeeservice_case_type">نوع حالة الخدمة</label>
                                                        </div>
                                                        @error('service_case_type')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='general_specialization' type="text" id="modalEmployeegeneral_specialization"
                                                                placeholder="التخصص العام"
                                                                class="form-control @error('general_specialization') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeegeneral_specialization">التخصص العام</label>
                                                        </div>
                                                        @error('general_specialization')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>


                    </div>
                                        <div Class="row">
                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='precise_specialization' type="text" id="modalEmployeeprecise_specialization"
                                                                placeholder="التخصص الدقيق"
                                                                class="form-control @error('precise_specialization') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeeprecise_specialization">التخصص الدقيق</label>
                                                        </div>
                                                        @error('precise_specialization')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='degree' type="text" id="modalEmployeedegree"
                                                                placeholder="د / و"
                                                                class="form-control @error('degree') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeedegree">د / و</label>
                                                        </div>
                                                        @error('degree')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='position_title' type="text" id="modalEmployeeposition_title"
                                                                placeholder="العنوان الوظيفي"
                                                                class="form-control @error('position_title') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeeposition_title">العنوان الوظيفي</label>
                                                        </div>
                                                        @error('position_title')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>


                    </div>
                                        <div Class="row">
                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='appointment_order_number' type="text" id="modalEmployeeappointment_order_number"
                                                                placeholder="رقم امر التعيين"
                                                                class="form-control @error('appointment_order_number') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeeappointment_order_number">رقم امر التعيين</label>
                                                        </div>
                                                        @error('appointment_order_number')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='appointment_date' type="text" id="modalEmployeeappointment_date"
                                                                placeholder="تاريخ التعيين"
                                                                class="form-control @error('appointment_date') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeeappointment_date">تاريخ التعيين</label>
                                                        </div>
                                                        @error('appointment_date')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='start_work_date' type="text" id="modalEmployeestart_work_date"
                                                                placeholder="تاريخ المباشرة"
                                                                class="form-control @error('start_work_date') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeestart_work_date">تاريخ المباشرة</label>
                                                        </div>
                                                        @error('start_work_date')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>


                    </div>
                                        <div Class="row">
                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='promotion_order' type="text" id="modalEmployeepromotion_order"
                                                                placeholder="امر الترفيع"
                                                                class="form-control @error('promotion_order') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeepromotion_order">امر الترفيع</label>
                                                        </div>
                                                        @error('promotion_order')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='promotion_date' type="text" id="modalEmployeepromotion_date"
                                                                placeholder="تاريخ الترفيع"
                                                                class="form-control @error('promotion_date') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeepromotion_date">تاريخ الترفيع</label>
                                                        </div>
                                                        @error('promotion_date')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='entitlement_date' type="text" id="modalEmployeeentitlement_date"
                                                                placeholder="تاريخ الاستحقاق"
                                                                class="form-control @error('entitlement_date') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeeentitlement_date">تاريخ الاستحقاق</label>
                                                        </div>
                                                        @error('entitlement_date')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>


                    </div>
                                        <div Class="row">
                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='increment_order' type="text" id="modalEmployeeincrement_order"
                                                                placeholder="امر العلاوة"
                                                                class="form-control @error('increment_order') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeeincrement_order">امر العلاوة</label>
                                                        </div>
                                                        @error('increment_order')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='increment_date' type="text" id="modalEmployeeincrement_date"
                                                                placeholder="تاريخ العلاوة"
                                                                class="form-control @error('increment_date') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeeincrement_date">تاريخ العلاوة</label>
                                                        </div>
                                                        @error('increment_date')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='referral_order_number' type="text" id="modalEmployeereferral_order_number"
                                                                placeholder="رقم امر الاحالة"
                                                                class="form-control @error('referral_order_number') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeereferral_order_number">رقم امر الاحالة</label>
                                                        </div>
                                                        @error('referral_order_number')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>


                    </div>
                                        <div Class="row">
                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='referral_order_date' type="text" id="modalEmployeereferral_order_date"
                                                                placeholder="تاريخ رقم الاحالة"
                                                                class="form-control @error('referral_order_date') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeereferral_order_date">تاريخ رقم الاحالة</label>
                                                        </div>
                                                        @error('referral_order_date')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='termination_reason' type="text" id="modalEmployeetermination_reason"
                                                                placeholder="انهاء التعيين"
                                                                class="form-control @error('termination_reason') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeetermination_reason">انهاء التعيين</label>
                                                        </div>
                                                        @error('termination_reason')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='transfer_date' type="text" id="modalEmployeetransfer_date"
                                                                placeholder="تاريخ النقل الينا"
                                                                class="form-control @error('transfer_date') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeetransfer_date">تاريخ النقل الينا</label>
                                                        </div>
                                                        @error('transfer_date')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>


                    </div>
                                        <div Class="row">
                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='resumption_date' type="text" id="modalEmployeeresumption_date"
                                                                placeholder="المباشرة"
                                                                class="form-control @error('resumption_date') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeeresumption_date">المباشرة</label>
                                                        </div>
                                                        @error('resumption_date')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='binding_authority' type="text" id="modalEmployeebinding_authority"
                                                                placeholder="الارتباط"
                                                                class="form-control @error('binding_authority') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeebinding_authority">الارتباط</label>
                                                        </div>
                                                        @error('binding_authority')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='department' type="text" id="modalEmployeedepartment"
                                                                placeholder="القسم"
                                                                class="form-control @error('department') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeedepartment">القسم</label>
                                                        </div>
                                                        @error('department')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>


                    </div>
                                        <div Class="row">
                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='division' type="text" id="modalEmployeedivision"
                                                                placeholder="الشعبة"
                                                                class="form-control @error('division') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeedivision">الشعبة</label>
                                                        </div>
                                                        @error('division')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='unit' type="text" id="modalEmployeeunit"
                                                                placeholder="الوحدة"
                                                                class="form-control @error('unit') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeeunit">الوحدة</label>
                                                        </div>
                                                        @error('unit')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='secondment_authority' type="text" id="modalEmployeesecondment_authority"
                                                                placeholder="جهة التنسيب"
                                                                class="form-control @error('secondment_authority') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeesecondment_authority">جهة التنسيب</label>
                                                        </div>
                                                        @error('secondment_authority')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>


                    </div>
                                        <div Class="row">
                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='notes' type="text" id="modalEmployeenotes"
                                                                placeholder="ملاحظات"
                                                                class="form-control @error('notes') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeenotes">ملاحظات</label>
                                                        </div>
                                                        @error('notes')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='position' type="text" id="modalEmployeeposition"
                                                                placeholder="المنصب"
                                                                class="form-control @error('position') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeeposition">المنصب</label>
                                                        </div>
                                                        @error('position')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='position_start_date' type="text" id="modalEmployeeposition_start_date"
                                                                placeholder="مباشرة المنصب"
                                                                class="form-control @error('position_start_date') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeeposition_start_date">مباشرة المنصب</label>
                                                        </div>
                                                        @error('position_start_date')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>


                    </div>
                                        <div Class="row">
                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='issuing_authority' type="text" id="modalEmployeeissuing_authority"
                                                                placeholder="جهة اصدار الامر"
                                                                class="form-control @error('issuing_authority') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeeissuing_authority">جهة اصدار الامر</label>
                                                        </div>
                                                        @error('issuing_authority')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='assignment_order_number' type="text" id="modalEmployeeassignment_order_number"
                                                                placeholder="رقم امر التكليف"
                                                                class="form-control @error('assignment_order_number') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeeassignment_order_number">رقم امر التكليف</label>
                                                        </div>
                                                        @error('assignment_order_number')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='assignment_order_date' type="text" id="modalEmployeeassignment_order_date"
                                                                placeholder="تاريخ امر التكليف"
                                                                class="form-control @error('assignment_order_date') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeeassignment_order_date">تاريخ امر التكليف</label>
                                                        </div>
                                                        @error('assignment_order_date')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>


                    </div>
                                        <div Class="row">
                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='assignment_type' type="text" id="modalEmployeeassignment_type"
                                                                placeholder="نوع التكليف"
                                                                class="form-control @error('assignment_type') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeeassignment_type">نوع التكليف</label>
                                                        </div>
                                                        @error('assignment_type')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='assignment_status' type="text" id="modalEmployeeassignment_status"
                                                                placeholder="حالة التكليف"
                                                                class="form-control @error('assignment_status') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeeassignment_status">حالة التكليف</label>
                                                        </div>
                                                        @error('assignment_status')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='second_position' type="text" id="modalEmployeesecond_position"
                                                                placeholder="المنصب 2"
                                                                class="form-control @error('second_position') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeesecond_position">المنصب 2</label>
                                                        </div>
                                                        @error('second_position')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>


                    </div>
                                        <div Class="row">
                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='second_position_start_date' type="text" id="modalEmployeesecond_position_start_date"
                                                                placeholder="مباشرة المنصب 2"
                                                                class="form-control @error('second_position_start_date') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeesecond_position_start_date">مباشرة المنصب 2</label>
                                                        </div>
                                                        @error('second_position_start_date')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='second_issuing_authority' type="text" id="modalEmployeesecond_issuing_authority"
                                                                placeholder="جهة اصدار الامر 2"
                                                                class="form-control @error('second_issuing_authority') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeesecond_issuing_authority">جهة اصدار الامر 2</label>
                                                        </div>
                                                        @error('second_issuing_authority')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='second_assignment_order_number' type="text" id="modalEmployeesecond_assignment_order_number"
                                                                placeholder="رقم امر التكليف 2"
                                                                class="form-control @error('second_assignment_order_number') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeesecond_assignment_order_number">رقم امر التكليف 2</label>
                                                        </div>
                                                        @error('second_assignment_order_number')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>


                    </div>
                                        <div Class="row">
                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='second_assignment_order_date' type="text" id="modalEmployeesecond_assignment_order_date"
                                                                placeholder="تاريخ امر التكليف 2"
                                                                class="form-control @error('second_assignment_order_date') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeesecond_assignment_order_date">تاريخ امر التكليف 2</label>
                                                        </div>
                                                        @error('second_assignment_order_date')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='second_assignment_type' type="text" id="modalEmployeesecond_assignment_type"
                                                                placeholder="نوع التكليف2"
                                                                class="form-control @error('second_assignment_type') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeesecond_assignment_type">نوع التكليف2</label>
                                                        </div>
                                                        @error('second_assignment_type')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='second_assignment_status' type="text" id="modalEmployeesecond_assignment_status"
                                                                placeholder="حالة التكليف2"
                                                                class="form-control @error('second_assignment_status') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeesecond_assignment_status">حالة التكليف2</label>
                                                        </div>
                                                        @error('second_assignment_status')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>


                    </div>
                                        <div Class="row">
                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='end_date' type="text" id="modalEmployeeend_date"
                                                                placeholder="الى تاريخ"
                                                                class="form-control @error('end_date') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeeend_date">الى تاريخ</label>
                                                        </div>
                                                        @error('end_date')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='service_days' type="text" id="modalEmployeeservice_days"
                                                                placeholder="الخدمة يوم"
                                                                class="form-control @error('service_days') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeeservice_days">الخدمة يوم</label>
                                                        </div>
                                                        @error('service_days')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='service_months' type="text" id="modalEmployeeservice_months"
                                                                placeholder="الخدمة شهر"
                                                                class="form-control @error('service_months') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeeservice_months">الخدمة شهر</label>
                                                        </div>
                                                        @error('service_months')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>


                    </div>
                                        <div Class="row">
                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='service_years' type="text" id="modalEmployeeservice_years"
                                                                placeholder="الخدمة سنة"
                                                                class="form-control @error('service_years') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeeservice_years">الخدمة سنة</label>
                                                        </div>
                                                        @error('service_years')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='total_retirement_days' type="text" id="modalEmployeetotal_retirement_days"
                                                                placeholder="مجموع التقاعد يوم"
                                                                class="form-control @error('total_retirement_days') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeetotal_retirement_days">مجموع التقاعد يوم</label>
                                                        </div>
                                                        @error('total_retirement_days')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='total_retirement_months' type="text" id="modalEmployeetotal_retirement_months"
                                                                placeholder="مجموع التقاعد شهر"
                                                                class="form-control @error('total_retirement_months') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeetotal_retirement_months">مجموع التقاعد شهر</label>
                                                        </div>
                                                        @error('total_retirement_months')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>


                    </div>
                                        <div Class="row">
                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='total_retirement_years' type="text" id="modalEmployeetotal_retirement_years"
                                                                placeholder="مجموع التقاعد سنة"
                                                                class="form-control @error('total_retirement_years') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeetotal_retirement_years">مجموع التقاعد سنة</label>
                                                        </div>
                                                        @error('total_retirement_years')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='total_actual_days' type="text" id="modalEmployeetotal_actual_days"
                                                                placeholder="مجموع الفعلية يوم"
                                                                class="form-control @error('total_actual_days') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeetotal_actual_days">مجموع الفعلية يوم</label>
                                                        </div>
                                                        @error('total_actual_days')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='total_actual_months' type="text" id="modalEmployeetotal_actual_months"
                                                                placeholder="مجموع الفعلية شهر"
                                                                class="form-control @error('total_actual_months') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeetotal_actual_months">مجموع الفعلية شهر</label>
                                                        </div>
                                                        @error('total_actual_months')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>


                    </div>
                                        <div Class="row">
                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='total_actual_years' type="text" id="modalEmployeetotal_actual_years"
                                                                placeholder="مجموع الفعلية سنة"
                                                                class="form-control @error('total_actual_years') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeetotal_actual_years">مجموع الفعلية سنة</label>
                                                        </div>
                                                        @error('total_actual_years')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='total_college_days' type="text" id="modalEmployeetotal_college_days"
                                                                placeholder="مجموع الكلية يوم"
                                                                class="form-control @error('total_college_days') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeetotal_college_days">مجموع الكلية يوم</label>
                                                        </div>
                                                        @error('total_college_days')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='total_college_months' type="text" id="modalEmployeetotal_college_months"
                                                                placeholder="مجموع الكلية شهر"
                                                                class="form-control @error('total_college_months') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeetotal_college_months">مجموع الكلية شهر</label>
                                                        </div>
                                                        @error('total_college_months')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>


                    </div>
                                        <div Class="row">
                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='total_college_years' type="text" id="modalEmployeetotal_college_years"
                                                                placeholder="مجموع الكلية سنة"
                                                                class="form-control @error('total_college_years') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeetotal_college_years">مجموع الكلية سنة</label>
                                                        </div>
                                                        @error('total_college_years')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>



                                                    <div class="mb-3 col">
                                                        <div class="form-floating form-floating-outline">
                                                            <input wire:model.defer='mypassword' type="text" id="modalEmployeemypassword"
                                                                placeholder="كلمة السر"
                                                                class="form-control @error('mypassword') is-invalid is-filled @enderror" />
                                                            <label for="modalEmployeemypassword">كلمة السر</label>
                                                        </div>
                                                        @error('mypassword')
                                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                                        @enderror
                                                    </div>


                   </div>
                         </div>
                         </div>
                                                <hr>
                        <div class="row g-4">
                            <div class="col-12 d-flex justify-content-between">
                                <button wire:click="ifPre({{ $currentStep }})" disabled
                                    class="btn btn-outline-secondary {{-- btn-prev --}}">
                                    <div wire:loading.remove wire:target="ifPre">
                                        <span class="align-middle d-sm-inline-block d-none">السابق</span>
                                    </div>
                                    <div wire:loading wire:target="ifPre">
                                        <div class="spinner-border text-light" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </button>
                                <button wire:click="ifNext({{ $currentStep }})"
                                    class="btn btn-primary {{-- btn-n --}}ext">
                                    <div wire:loading.remove wire:target="ifNext">
                                        <span class="align-middle d-sm-inline-block d-none Me-sm-1">التالي</span>
                                    </div>
                                    <div wire:loading wire:target="ifNext">
                                        <div class="spinner-border text-light" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>


     </form>
</div>
        </div>
    </div>
</div>
</div>


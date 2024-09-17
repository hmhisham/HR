<div class="d-flex justify-content-end">
    @can('worker-create')
    <a href="{{ Route('AddWorker') }}" class="sticky-button btn btn-primary">حفظ المعلومات</a>
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

                    <li class="nav-item ">
                        <button wire:click="buttonStep(1)" class="nav-link  {{ $currentTap == 1 ? 'active' : '' }}"
                            type="button" data-bs-toggle="tab" data-bs-target="#form-tabs-1" role="tab"
                            aria-selected="True">بيانات الأسم</button>
                    </li>

                    <li class="nav-item">
                        <button wire:click="buttonStep(2)" class="nav-link {{ $currentTap == 2 ? 'active' : '' }}"
                            type="button" data-bs-toggle="tab" data-bs-target="#form-tabs-2" role="tab"
                            aria-selected="True"> البيانات الشخصية </button>
                    </li>

                    {{-- 04 --}}
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#form-tabs-4" role="tab"
                            aria-selected="True">مستمسكات الموظف</button>
                    </li>


                </ul>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade {{ $currentTap == 1 ? 'active show' : '' }} " id="form-tabs-1"
                    role="tabpanel">
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

                <div class="tab-pane fade {{ $currentTap == 2 ? 'active show' : '' }}" id="form-tabs-2" role="tabpanel">
                    <form>
                        <div Class="row g-4">


                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <select wire:model.defer='governorate_id'
                                        wire:change='GetDistricts($event.target.value)' id="governorate_id"
                                        class="form-select @error('governorate_id') is-invalid is-filled @enderror">
                                        <option value=""></option>
                                        @foreach ($Governorates as $governorate)
                                        <option value="{{ $governorate->id}}">{{$governorate->governorate_name}}
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
                @include('livewire.workers.modals.add-takhroj')
            </div>
        </div>
    </div>
</div>

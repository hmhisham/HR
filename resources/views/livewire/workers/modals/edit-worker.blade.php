
<!-- Edite Worker Modal -->
<div wire:ignore.self class="modal fade" id="editworkerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل</h3>
                    <p>نافذة التعديل</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetWorker" wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">جار حفظ البيانات...</h5>

                <div wire:loading.remove>
                <form id="editWorkerModalForm" autocomplete="off">
                    <div class="row row-cols-1">
                        <div class="col mb-3">
                        '<Div Class="row">

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='user_id' type="text" id="modalWorkeruser_id" placeholder=""
                                            class="form-control @error('user_id') is-invalid is-filled @enderror" />
                                        <label for="modalWorkeruser_id"></label>
                                    </div>
                                    @error('user_id')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='calculator_number' type="text" id="modalWorkercalculator_number" placeholder="رقم الحاسبة"
                                            class="form-control @error('calculator_number') is-invalid is-filled @enderror" />
                                        <label for="modalWorkercalculator_number">رقم الحاسبة</label>
                                    </div>
                                    @error('calculator_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='employee_number' type="text" id="modalWorkeremployee_number" placeholder="الرقم الوظيفي"
                                            class="form-control @error('employee_number') is-invalid is-filled @enderror" />
                                        <label for="modalWorkeremployee_number">الرقم الوظيفي</label>
                                    </div>
                                    @error('employee_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='paper_folder_number' type="text" id="modalWorkerpaper_folder_number" placeholder="رقم الاضبارة الورقية"
                                            class="form-control @error('paper_folder_number') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerpaper_folder_number">رقم الاضبارة الورقية</label>
                                    </div>
                                    @error('paper_folder_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='first_name' type="text" id="modalWorkerfirst_name" placeholder="الاسم الاول"
                                            class="form-control @error('first_name') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerfirst_name">الاسم الاول</label>
                                    </div>
                                    @error('first_name')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='father_name' type="text" id="modalWorkerfather_name" placeholder="اسم الاب"
                                            class="form-control @error('father_name') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerfather_name">اسم الاب</label>
                                    </div>
                                    @error('father_name')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='grandfather_name' type="text" id="modalWorkergrandfather_name" placeholder="اسم الجد"
                                            class="form-control @error('grandfather_name') is-invalid is-filled @enderror" />
                                        <label for="modalWorkergrandfather_name">اسم الجد</label>
                                    </div>
                                    @error('grandfather_name')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='great_grandfather_name' type="text" id="modalWorkergreat_grandfather_name" placeholder="اسم والد الجد"
                                            class="form-control @error('great_grandfather_name') is-invalid is-filled @enderror" />
                                        <label for="modalWorkergreat_grandfather_name">اسم والد الجد</label>
                                    </div>
                                    @error('great_grandfather_name')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='surname' type="text" id="modalWorkersurname" placeholder="اللقب"
                                            class="form-control @error('surname') is-invalid is-filled @enderror" />
                                        <label for="modalWorkersurname">اللقب</label>
                                    </div>
                                    @error('surname')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='full_name' type="text" id="modalWorkerfull_name" placeholder="الاسم الكامل"
                                            class="form-control @error('full_name') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerfull_name">الاسم الكامل</label>
                                    </div>
                                    @error('full_name')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='mother_name' type="text" id="modalWorkermother_name" placeholder="اسم الام"
                                            class="form-control @error('mother_name') is-invalid is-filled @enderror" />
                                        <label for="modalWorkermother_name">اسم الام</label>
                                    </div>
                                    @error('mother_name')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='maternal_grandfather_name' type="text" id="modalWorkermaternal_grandfather_name" placeholder="اسم والد الام"
                                            class="form-control @error('maternal_grandfather_name') is-invalid is-filled @enderror" />
                                        <label for="modalWorkermaternal_grandfather_name">اسم والد الام</label>
                                    </div>
                                    @error('maternal_grandfather_name')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='maternal_great_grandfather_name' type="text" id="modalWorkermaternal_great_grandfather_name" placeholder="اسم جد الام"
                                            class="form-control @error('maternal_great_grandfather_name') is-invalid is-filled @enderror" />
                                        <label for="modalWorkermaternal_great_grandfather_name">اسم جد الام</label>
                                    </div>
                                    @error('maternal_great_grandfather_name')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='maternal_surname' type="text" id="modalWorkermaternal_surname" placeholder="لقب الام"
                                            class="form-control @error('maternal_surname') is-invalid is-filled @enderror" />
                                        <label for="modalWorkermaternal_surname">لقب الام</label>
                                    </div>
                                    @error('maternal_surname')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='mother_full_name' type="text" id="modalWorkermother_full_name" placeholder="اسم الام الكامل"
                                            class="form-control @error('mother_full_name') is-invalid is-filled @enderror" />
                                        <label for="modalWorkermother_full_name">اسم الام الكامل</label>
                                    </div>
                                    @error('mother_full_name')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='wife_name' type="text" id="modalWorkerwife_name" placeholder="اسم الزوجة"
                                            class="form-control @error('wife_name') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerwife_name">اسم الزوجة</label>
                                    </div>
                                    @error('wife_name')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='district_id' type="text" id="modalWorkerdistrict_id" placeholder="القضاء"
                                            class="form-control @error('district_id') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerdistrict_id">القضاء</label>
                                    </div>
                                    @error('district_id')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='area_id' type="text" id="modalWorkerarea_id" placeholder="الناحية"
                                            class="form-control @error('area_id') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerarea_id">الناحية</label>
                                    </div>
                                    @error('area_id')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='locality' type="text" id="modalWorkerlocality" placeholder="المحلة"
                                            class="form-control @error('locality') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerlocality">المحلة</label>
                                    </div>
                                    @error('locality')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='phone_number' type="text" id="modalWorkerphone_number" placeholder="رقم الهاتف"
                                            class="form-control @error('phone_number') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerphone_number">رقم الهاتف</label>
                                    </div>
                                    @error('phone_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='employee_id_number' type="text" id="modalWorkeremployee_id_number" placeholder="رقم هوية الموظف"
                                            class="form-control @error('employee_id_number') is-invalid is-filled @enderror" />
                                        <label for="modalWorkeremployee_id_number">رقم هوية الموظف</label>
                                    </div>
                                    @error('employee_id_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='department_name' type="text" id="modalWorkerdepartment_name" placeholder="اسم الدائرة"
                                            class="form-control @error('department_name') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerdepartment_name">اسم الدائرة</label>
                                    </div>
                                    @error('department_name')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='blood_type' type="text" id="modalWorkerblood_type" placeholder="صنف الدم"
                                            class="form-control @error('blood_type') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerblood_type">صنف الدم</label>
                                    </div>
                                    @error('blood_type')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='email' type="text" id="modalWorkeremail" placeholder="الايميل"
                                            class="form-control @error('email') is-invalid is-filled @enderror" />
                                        <label for="modalWorkeremail">الايميل</label>
                                    </div>
                                    @error('email')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='birth_date' type="text" id="modalWorkerbirth_date" placeholder="تاريخ التولد"
                                            class="form-control @error('birth_date') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerbirth_date">تاريخ التولد</label>
                                    </div>
                                    @error('birth_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='birth_place' type="text" id="modalWorkerbirth_place" placeholder="محل الولادة"
                                            class="form-control @error('birth_place') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerbirth_place">محل الولادة</label>
                                    </div>
                                    @error('birth_place')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='governorate_id' type="text" id="modalWorkergovernorate_id" placeholder="المحافظة"
                                            class="form-control @error('governorate_id') is-invalid is-filled @enderror" />
                                        <label for="modalWorkergovernorate_id">المحافظة</label>
                                    </div>
                                    @error('governorate_id')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='marital_status' type="text" id="modalWorkermarital_status" placeholder="الحالة الزوجية"
                                            class="form-control @error('marital_status') is-invalid is-filled @enderror" />
                                        <label for="modalWorkermarital_status">الحالة الزوجية</label>
                                    </div>
                                    @error('marital_status')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='religion' type="text" id="modalWorkerreligion" placeholder="الديانة"
                                            class="form-control @error('religion') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerreligion">الديانة</label>
                                    </div>
                                    @error('religion')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='gender' type="text" id="modalWorkergender" placeholder="الجنس"
                                            class="form-control @error('gender') is-invalid is-filled @enderror" />
                                        <label for="modalWorkergender">الجنس</label>
                                    </div>
                                    @error('gender')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='children_count' type="text" id="modalWorkerchildren_count" placeholder="عدد الاطفال"
                                            class="form-control @error('children_count') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerchildren_count">عدد الاطفال</label>
                                    </div>
                                    @error('children_count')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='civil_status_identity_number' type="text" id="modalWorkercivil_status_identity_number" placeholder="رقم هوية الاحوال"
                                            class="form-control @error('civil_status_identity_number') is-invalid is-filled @enderror" />
                                        <label for="modalWorkercivil_status_identity_number">رقم هوية الاحوال</label>
                                    </div>
                                    @error('civil_status_identity_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='registration_number' type="text" id="modalWorkerregistration_number" placeholder="رقم السجل"
                                            class="form-control @error('registration_number') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerregistration_number">رقم السجل</label>
                                    </div>
                                    @error('registration_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='record_number' type="text" id="modalWorkerrecord_number" placeholder="رقم الصحيفة"
                                            class="form-control @error('record_number') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerrecord_number">رقم الصحيفة</label>
                                    </div>
                                    @error('record_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='issue_date_civil_status' type="text" id="modalWorkerissue_date_civil_status" placeholder="تاريخ الاصدار"
                                            class="form-control @error('issue_date_civil_status') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerissue_date_civil_status">تاريخ الاصدار</label>
                                    </div>
                                    @error('issue_date_civil_status')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='issuing_authority_civil_status' type="text" id="modalWorkerissuing_authority_civil_status" placeholder="جهة الاصدار"
                                            class="form-control @error('issuing_authority_civil_status') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerissuing_authority_civil_status">جهة الاصدار</label>
                                    </div>
                                    @error('issuing_authority_civil_status')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='nationality_certificate_number' type="text" id="modalWorkernationality_certificate_number" placeholder="رقم شهادة الجنسية"
                                            class="form-control @error('nationality_certificate_number') is-invalid is-filled @enderror" />
                                        <label for="modalWorkernationality_certificate_number">رقم شهادة الجنسية</label>
                                    </div>
                                    @error('nationality_certificate_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='wallet_number' type="text" id="modalWorkerwallet_number" placeholder="رقم المحفظة"
                                            class="form-control @error('wallet_number') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerwallet_number">رقم المحفظة</label>
                                    </div>
                                    @error('wallet_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='issue_date_nationality_certificate' type="text" id="modalWorkerissue_date_nationality_certificate" placeholder="تاريخ الاصدار"
                                            class="form-control @error('issue_date_nationality_certificate') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerissue_date_nationality_certificate">تاريخ الاصدار</label>
                                    </div>
                                    @error('issue_date_nationality_certificate')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='issuing_authority_nationality_certificate' type="text" id="modalWorkerissuing_authority_nationality_certificate" placeholder="جهة الاصدار"
                                            class="form-control @error('issuing_authority_nationality_certificate') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerissuing_authority_nationality_certificate">جهة الاصدار</label>
                                    </div>
                                    @error('issuing_authority_nationality_certificate')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='residence_card_number' type="text" id="modalWorkerresidence_card_number" placeholder="رقم بطاقة السكن"
                                            class="form-control @error('residence_card_number') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerresidence_card_number">رقم بطاقة السكن</label>
                                    </div>
                                    @error('residence_card_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='information_office' type="text" id="modalWorkerinformation_office" placeholder="مكتب المعلومات"
                                            class="form-control @error('information_office') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerinformation_office">مكتب المعلومات</label>
                                    </div>
                                    @error('information_office')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='organization_date' type="text" id="modalWorkerorganization_date" placeholder="تاريخ التنظيم"
                                            class="form-control @error('organization_date') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerorganization_date">تاريخ التنظيم</label>
                                    </div>
                                    @error('organization_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='ration_card_number' type="text" id="modalWorkerration_card_number" placeholder="رقم البطاقة التموينية"
                                            class="form-control @error('ration_card_number') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerration_card_number">رقم البطاقة التموينية</label>
                                    </div>
                                    @error('ration_card_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='ration_card_date' type="text" id="modalWorkerration_card_date" placeholder="تاريخها"
                                            class="form-control @error('ration_card_date') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerration_card_date">تاريخها</label>
                                    </div>
                                    @error('ration_card_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='national_card_number' type="text" id="modalWorkernational_card_number" placeholder="رقم البطاقة الوطنية"
                                            class="form-control @error('national_card_number') is-invalid is-filled @enderror" />
                                        <label for="modalWorkernational_card_number">رقم البطاقة الوطنية</label>
                                    </div>
                                    @error('national_card_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='national_card_date' type="text" id="modalWorkernational_card_date" placeholder="تاريخها"
                                            class="form-control @error('national_card_date') is-invalid is-filled @enderror" />
                                        <label for="modalWorkernational_card_date">تاريخها</label>
                                    </div>
                                    @error('national_card_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='education_service' type="text" id="modalWorkereducation_service" placeholder="التحصيل الدراسي اثناء الخدمة"
                                            class="form-control @error('education_service') is-invalid is-filled @enderror" />
                                        <label for="modalWorkereducation_service">التحصيل الدراسي اثناء الخدمة</label>
                                    </div>
                                    @error('education_service')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='graduation_year_service' type="text" id="modalWorkergraduation_year_service" placeholder="سنة التخرج اثناء الخدمة"
                                            class="form-control @error('graduation_year_service') is-invalid is-filled @enderror" />
                                        <label for="modalWorkergraduation_year_service">سنة التخرج اثناء الخدمة</label>
                                    </div>
                                    @error('graduation_year_service')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='graduation_institution_service' type="text" id="modalWorkergraduation_institution_service" placeholder="جهة التخرج اثناء الخدمة"
                                            class="form-control @error('graduation_institution_service') is-invalid is-filled @enderror" />
                                        <label for="modalWorkergraduation_institution_service">جهة التخرج اثناء الخدمة</label>
                                    </div>
                                    @error('graduation_institution_service')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='specialization_service' type="text" id="modalWorkerspecialization_service" placeholder="الاختصاص اثناء الخدمة"
                                            class="form-control @error('specialization_service') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerspecialization_service">الاختصاص اثناء الخدمة</label>
                                    </div>
                                    @error('specialization_service')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='document_number' type="text" id="modalWorkerdocument_number" placeholder="رقم الوثيقة"
                                            class="form-control @error('document_number') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerdocument_number">رقم الوثيقة</label>
                                    </div>
                                    @error('document_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='document_date' type="text" id="modalWorkerdocument_date" placeholder="تاريخ الوثيقة"
                                            class="form-control @error('document_date') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerdocument_date">تاريخ الوثيقة</label>
                                    </div>
                                    @error('document_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='document_verification_number' type="text" id="modalWorkerdocument_verification_number" placeholder="رقم صحة الصدور"
                                            class="form-control @error('document_verification_number') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerdocument_verification_number">رقم صحة الصدور</label>
                                    </div>
                                    @error('document_verification_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='document_verification_date' type="text" id="modalWorkerdocument_verification_date" placeholder="تاريخ صحة الصدور"
                                            class="form-control @error('document_verification_date') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerdocument_verification_date">تاريخ صحة الصدور</label>
                                    </div>
                                    @error('document_verification_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='education_appointment' type="text" id="modalWorkereducation_appointment" placeholder="التحصيل الدراسي التعيين"
                                            class="form-control @error('education_appointment') is-invalid is-filled @enderror" />
                                        <label for="modalWorkereducation_appointment">التحصيل الدراسي التعيين</label>
                                    </div>
                                    @error('education_appointment')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='graduation_year_appointment' type="text" id="modalWorkergraduation_year_appointment" placeholder="سنة تخرج التعيين"
                                            class="form-control @error('graduation_year_appointment') is-invalid is-filled @enderror" />
                                        <label for="modalWorkergraduation_year_appointment">سنة تخرج التعيين</label>
                                    </div>
                                    @error('graduation_year_appointment')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='graduation_institution_appointment' type="text" id="modalWorkergraduation_institution_appointment" placeholder="جهة تخرج التعيين"
                                            class="form-control @error('graduation_institution_appointment') is-invalid is-filled @enderror" />
                                        <label for="modalWorkergraduation_institution_appointment">جهة تخرج التعيين</label>
                                    </div>
                                    @error('graduation_institution_appointment')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='specialization_appointment' type="text" id="modalWorkerspecialization_appointment" placeholder="الاختصاص التعيين"
                                            class="form-control @error('specialization_appointment') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerspecialization_appointment">الاختصاص التعيين</label>
                                    </div>
                                    @error('specialization_appointment')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='service_type' type="text" id="modalWorkerservice_type" placeholder="نوع الخدمة"
                                            class="form-control @error('service_type') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerservice_type">نوع الخدمة</label>
                                    </div>
                                    @error('service_type')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='service_status' type="text" id="modalWorkerservice_status" placeholder="حالة الخدمة"
                                            class="form-control @error('service_status') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerservice_status">حالة الخدمة</label>
                                    </div>
                                    @error('service_status')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='contract_type' type="text" id="modalWorkercontract_type" placeholder="نوع العقد"
                                            class="form-control @error('contract_type') is-invalid is-filled @enderror" />
                                        <label for="modalWorkercontract_type">نوع العقد</label>
                                    </div>
                                    @error('contract_type')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='service_case_type' type="text" id="modalWorkerservice_case_type" placeholder="نوع حالة الخدمة"
                                            class="form-control @error('service_case_type') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerservice_case_type">نوع حالة الخدمة</label>
                                    </div>
                                    @error('service_case_type')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='general_specialization' type="text" id="modalWorkergeneral_specialization" placeholder="التخصص العام"
                                            class="form-control @error('general_specialization') is-invalid is-filled @enderror" />
                                        <label for="modalWorkergeneral_specialization">التخصص العام</label>
                                    </div>
                                    @error('general_specialization')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='precise_specialization' type="text" id="modalWorkerprecise_specialization" placeholder="التخصص الدقيق"
                                            class="form-control @error('precise_specialization') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerprecise_specialization">التخصص الدقيق</label>
                                    </div>
                                    @error('precise_specialization')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='degree' type="text" id="modalWorkerdegree" placeholder="د / و"
                                            class="form-control @error('degree') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerdegree">د / و</label>
                                    </div>
                                    @error('degree')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='position_title' type="text" id="modalWorkerposition_title" placeholder="العنوان الوظيفي"
                                            class="form-control @error('position_title') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerposition_title">العنوان الوظيفي</label>
                                    </div>
                                    @error('position_title')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='appointment_order_number' type="text" id="modalWorkerappointment_order_number" placeholder="رقم امر التعيين"
                                            class="form-control @error('appointment_order_number') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerappointment_order_number">رقم امر التعيين</label>
                                    </div>
                                    @error('appointment_order_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='appointment_date' type="text" id="modalWorkerappointment_date" placeholder="تاريخ التعيين"
                                            class="form-control @error('appointment_date') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerappointment_date">تاريخ التعيين</label>
                                    </div>
                                    @error('appointment_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='start_work_date' type="text" id="modalWorkerstart_work_date" placeholder="تاريخ المباشرة"
                                            class="form-control @error('start_work_date') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerstart_work_date">تاريخ المباشرة</label>
                                    </div>
                                    @error('start_work_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='promotion_order' type="text" id="modalWorkerpromotion_order" placeholder="امر الترفيع"
                                            class="form-control @error('promotion_order') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerpromotion_order">امر الترفيع</label>
                                    </div>
                                    @error('promotion_order')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='promotion_date' type="text" id="modalWorkerpromotion_date" placeholder="تاريخ الترفيع"
                                            class="form-control @error('promotion_date') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerpromotion_date">تاريخ الترفيع</label>
                                    </div>
                                    @error('promotion_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='entitlement_date' type="text" id="modalWorkerentitlement_date" placeholder="تاريخ الاستحقاق"
                                            class="form-control @error('entitlement_date') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerentitlement_date">تاريخ الاستحقاق</label>
                                    </div>
                                    @error('entitlement_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='increment_order' type="text" id="modalWorkerincrement_order" placeholder="امر العلاوة"
                                            class="form-control @error('increment_order') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerincrement_order">امر العلاوة</label>
                                    </div>
                                    @error('increment_order')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='increment_date' type="text" id="modalWorkerincrement_date" placeholder="تاريخ العلاوة"
                                            class="form-control @error('increment_date') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerincrement_date">تاريخ العلاوة</label>
                                    </div>
                                    @error('increment_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='referral_order_number' type="text" id="modalWorkerreferral_order_number" placeholder="رقم امر الاحالة"
                                            class="form-control @error('referral_order_number') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerreferral_order_number">رقم امر الاحالة</label>
                                    </div>
                                    @error('referral_order_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='referral_order_date' type="text" id="modalWorkerreferral_order_date" placeholder="تاريخ رقم الاحالة"
                                            class="form-control @error('referral_order_date') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerreferral_order_date">تاريخ رقم الاحالة</label>
                                    </div>
                                    @error('referral_order_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='termination_reason' type="text" id="modalWorkertermination_reason" placeholder="انهاء التعيين"
                                            class="form-control @error('termination_reason') is-invalid is-filled @enderror" />
                                        <label for="modalWorkertermination_reason">انهاء التعيين</label>
                                    </div>
                                    @error('termination_reason')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='transfer_date' type="text" id="modalWorkertransfer_date" placeholder="تاريخ النقل الينا"
                                            class="form-control @error('transfer_date') is-invalid is-filled @enderror" />
                                        <label for="modalWorkertransfer_date">تاريخ النقل الينا</label>
                                    </div>
                                    @error('transfer_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='resumption_date' type="text" id="modalWorkerresumption_date" placeholder="المباشرة"
                                            class="form-control @error('resumption_date') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerresumption_date">المباشرة</label>
                                    </div>
                                    @error('resumption_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='binding_authority' type="text" id="modalWorkerbinding_authority" placeholder="الارتباط"
                                            class="form-control @error('binding_authority') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerbinding_authority">الارتباط</label>
                                    </div>
                                    @error('binding_authority')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='department' type="text" id="modalWorkerdepartment" placeholder="القسم"
                                            class="form-control @error('department') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerdepartment">القسم</label>
                                    </div>
                                    @error('department')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='division' type="text" id="modalWorkerdivision" placeholder="الشعبة"
                                            class="form-control @error('division') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerdivision">الشعبة</label>
                                    </div>
                                    @error('division')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='unit' type="text" id="modalWorkerunit" placeholder="الوحدة"
                                            class="form-control @error('unit') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerunit">الوحدة</label>
                                    </div>
                                    @error('unit')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='secondment_authority' type="text" id="modalWorkersecondment_authority" placeholder="جهة التنسيب"
                                            class="form-control @error('secondment_authority') is-invalid is-filled @enderror" />
                                        <label for="modalWorkersecondment_authority">جهة التنسيب</label>
                                    </div>
                                    @error('secondment_authority')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='notes' type="text" id="modalWorkernotes" placeholder="ملاحظات"
                                            class="form-control @error('notes') is-invalid is-filled @enderror" />
                                        <label for="modalWorkernotes">ملاحظات</label>
                                    </div>
                                    @error('notes')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='position' type="text" id="modalWorkerposition" placeholder="المنصب"
                                            class="form-control @error('position') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerposition">المنصب</label>
                                    </div>
                                    @error('position')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='position_start_date' type="text" id="modalWorkerposition_start_date" placeholder="مباشرة المنصب"
                                            class="form-control @error('position_start_date') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerposition_start_date">مباشرة المنصب</label>
                                    </div>
                                    @error('position_start_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='issuing_authority' type="text" id="modalWorkerissuing_authority" placeholder="جهة اصدار الامر"
                                            class="form-control @error('issuing_authority') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerissuing_authority">جهة اصدار الامر</label>
                                    </div>
                                    @error('issuing_authority')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='assignment_order_number' type="text" id="modalWorkerassignment_order_number" placeholder="رقم امر التكليف"
                                            class="form-control @error('assignment_order_number') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerassignment_order_number">رقم امر التكليف</label>
                                    </div>
                                    @error('assignment_order_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='assignment_order_date' type="text" id="modalWorkerassignment_order_date" placeholder="تاريخ امر التكليف"
                                            class="form-control @error('assignment_order_date') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerassignment_order_date">تاريخ امر التكليف</label>
                                    </div>
                                    @error('assignment_order_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='assignment_type' type="text" id="modalWorkerassignment_type" placeholder="نوع التكليف"
                                            class="form-control @error('assignment_type') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerassignment_type">نوع التكليف</label>
                                    </div>
                                    @error('assignment_type')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='assignment_status' type="text" id="modalWorkerassignment_status" placeholder="حالة التكليف"
                                            class="form-control @error('assignment_status') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerassignment_status">حالة التكليف</label>
                                    </div>
                                    @error('assignment_status')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='second_position' type="text" id="modalWorkersecond_position" placeholder="المنصب 2"
                                            class="form-control @error('second_position') is-invalid is-filled @enderror" />
                                        <label for="modalWorkersecond_position">المنصب 2</label>
                                    </div>
                                    @error('second_position')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='second_position_start_date' type="text" id="modalWorkersecond_position_start_date" placeholder="مباشرة المنصب 2"
                                            class="form-control @error('second_position_start_date') is-invalid is-filled @enderror" />
                                        <label for="modalWorkersecond_position_start_date">مباشرة المنصب 2</label>
                                    </div>
                                    @error('second_position_start_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='second_issuing_authority' type="text" id="modalWorkersecond_issuing_authority" placeholder="جهة اصدار الامر 2"
                                            class="form-control @error('second_issuing_authority') is-invalid is-filled @enderror" />
                                        <label for="modalWorkersecond_issuing_authority">جهة اصدار الامر 2</label>
                                    </div>
                                    @error('second_issuing_authority')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='second_assignment_order_number' type="text" id="modalWorkersecond_assignment_order_number" placeholder="رقم امر التكليف 2"
                                            class="form-control @error('second_assignment_order_number') is-invalid is-filled @enderror" />
                                        <label for="modalWorkersecond_assignment_order_number">رقم امر التكليف 2</label>
                                    </div>
                                    @error('second_assignment_order_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='second_assignment_order_date' type="text" id="modalWorkersecond_assignment_order_date" placeholder="تاريخ امر التكليف 2"
                                            class="form-control @error('second_assignment_order_date') is-invalid is-filled @enderror" />
                                        <label for="modalWorkersecond_assignment_order_date">تاريخ امر التكليف 2</label>
                                    </div>
                                    @error('second_assignment_order_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='second_assignment_type' type="text" id="modalWorkersecond_assignment_type" placeholder="نوع التكليف2"
                                            class="form-control @error('second_assignment_type') is-invalid is-filled @enderror" />
                                        <label for="modalWorkersecond_assignment_type">نوع التكليف2</label>
                                    </div>
                                    @error('second_assignment_type')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='second_assignment_status' type="text" id="modalWorkersecond_assignment_status" placeholder="حالة التكليف2"
                                            class="form-control @error('second_assignment_status') is-invalid is-filled @enderror" />
                                        <label for="modalWorkersecond_assignment_status">حالة التكليف2</label>
                                    </div>
                                    @error('second_assignment_status')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='end_date' type="text" id="modalWorkerend_date" placeholder="الى تاريخ"
                                            class="form-control @error('end_date') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerend_date">الى تاريخ</label>
                                    </div>
                                    @error('end_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='service_days' type="text" id="modalWorkerservice_days" placeholder="الخدمة يوم"
                                            class="form-control @error('service_days') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerservice_days">الخدمة يوم</label>
                                    </div>
                                    @error('service_days')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='service_months' type="text" id="modalWorkerservice_months" placeholder="الخدمة شهر"
                                            class="form-control @error('service_months') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerservice_months">الخدمة شهر</label>
                                    </div>
                                    @error('service_months')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='service_years' type="text" id="modalWorkerservice_years" placeholder="الخدمة سنة"
                                            class="form-control @error('service_years') is-invalid is-filled @enderror" />
                                        <label for="modalWorkerservice_years">الخدمة سنة</label>
                                    </div>
                                    @error('service_years')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='total_retirement_days' type="text" id="modalWorkertotal_retirement_days" placeholder="مجموع التقاعد يوم"
                                            class="form-control @error('total_retirement_days') is-invalid is-filled @enderror" />
                                        <label for="modalWorkertotal_retirement_days">مجموع التقاعد يوم</label>
                                    </div>
                                    @error('total_retirement_days')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='total_retirement_months' type="text" id="modalWorkertotal_retirement_months" placeholder="مجموع التقاعد شهر"
                                            class="form-control @error('total_retirement_months') is-invalid is-filled @enderror" />
                                        <label for="modalWorkertotal_retirement_months">مجموع التقاعد شهر</label>
                                    </div>
                                    @error('total_retirement_months')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='total_retirement_years' type="text" id="modalWorkertotal_retirement_years" placeholder="مجموع التقاعد سنة"
                                            class="form-control @error('total_retirement_years') is-invalid is-filled @enderror" />
                                        <label for="modalWorkertotal_retirement_years">مجموع التقاعد سنة</label>
                                    </div>
                                    @error('total_retirement_years')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='total_actual_days' type="text" id="modalWorkertotal_actual_days" placeholder="مجموع الفعلية يوم"
                                            class="form-control @error('total_actual_days') is-invalid is-filled @enderror" />
                                        <label for="modalWorkertotal_actual_days">مجموع الفعلية يوم</label>
                                    </div>
                                    @error('total_actual_days')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='total_actual_months' type="text" id="modalWorkertotal_actual_months" placeholder="مجموع الفعلية شهر"
                                            class="form-control @error('total_actual_months') is-invalid is-filled @enderror" />
                                        <label for="modalWorkertotal_actual_months">مجموع الفعلية شهر</label>
                                    </div>
                                    @error('total_actual_months')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='total_actual_years' type="text" id="modalWorkertotal_actual_years" placeholder="مجموع الفعلية سنة"
                                            class="form-control @error('total_actual_years') is-invalid is-filled @enderror" />
                                        <label for="modalWorkertotal_actual_years">مجموع الفعلية سنة</label>
                                    </div>
                                    @error('total_actual_years')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='total_college_days' type="text" id="modalWorkertotal_college_days" placeholder="مجموع الكلية يوم"
                                            class="form-control @error('total_college_days') is-invalid is-filled @enderror" />
                                        <label for="modalWorkertotal_college_days">مجموع الكلية يوم</label>
                                    </div>
                                    @error('total_college_days')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='total_college_months' type="text" id="modalWorkertotal_college_months" placeholder="مجموع الكلية شهر"
                                            class="form-control @error('total_college_months') is-invalid is-filled @enderror" />
                                        <label for="modalWorkertotal_college_months">مجموع الكلية شهر</label>
                                    </div>
                                    @error('total_college_months')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='total_college_years' type="text" id="modalWorkertotal_college_years" placeholder="مجموع الكلية سنة"
                                            class="form-control @error('total_college_years') is-invalid is-filled @enderror" />
                                        <label for="modalWorkertotal_college_years">مجموع الكلية سنة</label>
                                    </div>
                                    @error('total_college_years')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='mypassword' type="text" id="modalWorkermypassword" placeholder="كلمة السر"
                                            class="form-control @error('mypassword') is-invalid is-filled @enderror" />
                                        <label for="modalWorkermypassword">كلمة السر</label>
                                    </div>
                                    @error('mypassword')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="text-center col-12 demo-vertical-spacing mb-n4">
                        <button wire:click='update' wire:loading.attr="disabled" type="button" class="btn btn-success me-sm-3 me-1">تعديل</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                            aria-label="Close">تجاهل</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 </div>
</div>
<!--/ Edite Worker Modal -->

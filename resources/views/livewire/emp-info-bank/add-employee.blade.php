<div class="mt-n4">
    <h4 class="py-3">
        اضافة معلومات الموظف
    </h4>

    <div class="mb-4 col-12">
        <div class="mt-2 bs-stepper wizard-vertical vertical wizard-numbered wizard-modern">
            <div class="bs-stepper-header gap-lg-2">
                {{--  01  --}}
                <div class="step {{ 1 == $currentStep ? $activatedStep:''  }} {{ 1 < $currentStep ? $crossedStep:'' }}"
                    data-target="#step-01">
                    <button {{--wire:click="buttonStep({{ $stepStep }})"--}} type="button" class="step-trigger">
                        <span class="bs-stepper-circle"><i class="mdi mdi-check"></i></span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-number">01</span>
                            <span class="gap-1 d-flex flex-column ms-2">
                                <span class="{{-- bs-stepper-title --}}">معلومات الاسم</span>
                                {{-- <span class="bs-stepper-subtitle">Question eLigibility test</span> --}}
                            </span>
                        </span>
                    </button>
                </div>
                <div class="line"></div>

                {{--  02  --}}
                <div class="step {{ 2 == $currentStep ? $activatedStep:''  }} {{ 2 < $currentStep ? $crossedStep:'' }}"
                    data-target="#step-02">
                    <button {{--wire:click="buttonStep({{ $stepStep }})"--}} type="button" class="step-trigger">
                        <span class="bs-stepper-circle"><i class="mdi mdi-check"></i></span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-number">02</span>
                            <span class="gap-1 d-flex flex-column ms-2">
                                <span class="{{-- bs-stepper-title --}}">البيانات الشخصية</span>
                                {{-- <span class="bs-stepper-subtitle">Question eLigibility test</span> --}}
                            </span>
                        </span>
                    </button>
                </div>
                <div class="line"></div>

                {{--  03  --}}
                <div class="step {{ 3 == $currentStep ? $activatedStep:''  }} {{ 3 < $currentStep ? $crossedStep:'' }}"
                    data-target="#step-03">
                    <button {{--wire:click="buttonStep({{ $stepStep }})"--}} type="button" class="step-trigger">
                        <span class="bs-stepper-circle"><i class="mdi mdi-check"></i></span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-number">03</span>
                            <span class="gap-1 d-flex flex-column ms-2">
                                <span class="{{-- bs-stepper-title --}}">معلومات السكن</span>
                                {{-- <span class="bs-stepper-subtitle">Question eLigibility test</span> --}}
                            </span>
                        </span>
                    </button>
                </div>
                <div class="line"></div>

                {{--  04  --}}
                <div class="step {{ 4 == $currentStep ? $activatedStep:''  }} {{ 4 < $currentStep ? $crossedStep:'' }}"
                    data-target="#step-04">
                    <button {{--wire:click="buttonStep({{ $stepStep }})"--}} type="button" class="step-trigger">
                        <span class="bs-stepper-circle"><i class="mdi mdi-check"></i></span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-number">04</span>
                            <span class="gap-1 d-flex flex-column ms-2">
                                <span class="{{-- bs-stepper-title --}}">البطاقة الوطنية</span>
                                {{-- <span class="bs-stepper-subtitle">Question eLigibility test</span> --}}
                            </span>
                        </span>
                    </button>
                </div>
                <div class="line"></div>

                {{--  05  --}}
                <div class="step {{ 5 == $currentStep ? $activatedStep:''  }} {{ 5 < $currentStep ? $crossedStep:'' }}"
                    data-target="#step-05">
                    <button {{--wire:click="buttonStep({{ $stepStep }})"--}} type="button" class="step-trigger">
                        <span class="bs-stepper-circle"><i class="mdi mdi-check"></i></span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-number">05</span>
                            <span class="gap-1 d-flex flex-column ms-2">
                                <span class="{{-- bs-stepper-title --}}">شهادة الجنسية</span>
                                {{-- <span class="bs-stepper-subtitle">Question eLigibility test</span> --}}
                            </span>
                        </span>
                    </button>
                </div>
                <div class="line"></div>

                {{--  06  --}}
                <div class="step {{ 6 == $currentStep ? $activatedStep:''  }} {{ 6 < $currentStep ? $crossedStep:'' }}"
                    data-target="#step-06">
                    <button {{--wire:click="buttonStep({{ $stepStep }})"--}} type="button" class="step-trigger">
                        <span class="bs-stepper-circle"><i class="mdi mdi-check"></i></span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-number">06</span>
                            <span class="gap-1 d-flex flex-column ms-2">
                                <span class="{{-- bs-stepper-title --}}">بطاقة السكن</span>
                                {{-- <span class="bs-stepper-subtitle">Question eLigibility test</span> --}}
                            </span>
                        </span>
                    </button>
                </div>
                <div class="line"></div>

                {{--  07  --}}
                <div class="step {{ 7 == $currentStep ? $activatedStep:''  }} {{ 7 < $currentStep ? $crossedStep:'' }}"
                    data-target="#step-07">
                    <button {{--wire:click="buttonStep({{ $stepStep }})"--}} type="button" class="step-trigger">
                        <span class="bs-stepper-circle"><i class="mdi mdi-check"></i></span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-number">07</span>
                            <span class="gap-1 d-flex flex-column ms-2">
                                <span class="{{-- bs-stepper-title --}}">البطاقة التموينية</span>
                                {{-- <span class="bs-stepper-subtitle">Question eLigibility test</span> --}}
                            </span>
                        </span>
                    </button>
                </div>
                <div class="line"></div>

                {{--  08  --}}
                <div class="step {{ 8 == $currentStep ? $activatedStep:''  }} {{ 8 < $currentStep ? $crossedStep:'' }}"
                    data-target="#step-08">
                    <button {{--wire:click="buttonStep({{ $stepStep }})"--}} type="button" class="step-trigger">
                        <span class="bs-stepper-circle"><i class="mdi mdi-check"></i></span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-number">08</span>
                            <span class="gap-1 d-flex flex-column ms-2">
                                <span class="{{-- bs-stepper-title --}}">اجازة السوق</span>
                                {{-- <span class="bs-stepper-subtitle">Question eLigibility test</span> --}}
                            </span>
                        </span>
                    </button>
                </div>
            </div>

            <div class="bs-stepper-content">
                <form onSubmit="return false">
                    <div id="step-00" class="content {{ 0 == $currentStep ? $activatedStep:''  }}">
                        <h4 class="mb-3 fw-bolder">Tests Study step</h4>
                        <hr>
                        <h4 class="mb-3 text-center fw-bolder">Tests Study step</h4>
                        <h3 class="mb-3 text-center fw-bolder text-danger">Instep (STOP)</h3>
                        <hr>
                    </div>

                    <div id="step-01" class="content {{ 1 == $currentStep ? $activatedStep:''  }}">
                        <h4 class="mb-3 fw-bolder">معلومات الاسم</h4>
                        <hr>

                        <div class="row mb-n4">
                            <div class="mb-3 col">
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='JobNumber' type="text" id="modalEmployeeJobNumber"
                                                placeholder="الرقم الوظيفي"
                                                class="form-control @error('JobNumber') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeJobNumber">الرقم الوظيفي</label>
                                        </div>
                                        @error('JobNumber')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='FileNumber' type="text"
                                                id="modalEmployeeFileNumber" placeholder="رقم الاضبارة"
                                                class="form-control @error('FileNumber') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeFileNumber">رقم الاضبارة</label>
                                        </div>
                                        @error('FileNumber')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='FirstName'
                                                wire:keyup="concatFullName('FirstName', $event.target.value)"
                                                type="text" id="modalEmployeeFirstName" placeholder="الاسم الأول"
                                                class="form-control @error('FirstName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeFirstName">الاسم الأول</label>
                                        </div>
                                        @error('FirstName')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='SecondName'
                                                wire:keyup="concatFullName('SecondName', $event.target.value)"
                                                type="text" id="modalEmployeeSecondName" placeholder="الاسم الثاني"
                                                class="form-control @error('SecondName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeSecondName">الاسم الثاني</label>
                                        </div>
                                        @error('SecondName')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='ThirdName'
                                                wire:keyup="concatFullName('ThirdName', $event.target.value)"
                                                type="text" id="modalEmployeeThirdName" placeholder="الاسم الثالث"
                                                class="form-control @error('ThirdName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeThirdName">الاسم الثالث</label>
                                        </div>
                                        @error('ThirdName')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='FourthName'
                                                wire:keyup="concatFullName('FourthName', $event.target.value)"
                                                type="text" id="modalEmployeeFourthName" placeholder="الاسم الرابع"
                                                class="form-control @error('FourthName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeFourthName">الاسم الرابع</label>
                                        </div>
                                        @error('FourthName')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='LastName'
                                                wire:keyup="concatFullName('LastName', $event.target.value)" type="text"
                                                id="modalEmployeeLastName" placeholder="اللقب"
                                                class="form-control @error('LastName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeLastName">اللقب</label>
                                        </div>
                                        @error('LastName')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='FullName' type="text" id="modalEmployeeFullName"
                                                placeholder="الاسم الكامل" readonly
                                                class="form-control @error('FullName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeFullName">الاسم الكامل</label>
                                        </div>
                                        @error('FullName')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='MotherName'
                                                wire:keyup="concatFullName('MotherName', $event.target.value)"
                                                type="text" id="modalEmployeeMotherName" placeholder="اسم الام"
                                                class="form-control @error('MotherName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeMotherName">اسم الام</label>
                                        </div>
                                        @error('MotherName')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='MotherFatherName' type="text"
                                                wire:keyup="concatFullName('MotherFatherName', $event.target.value)"
                                                id="modalEmployeeMotherFatherName" placeholder="اسم والد الام"
                                                class="form-control @error('MotherFatherName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeMotherFatherName">اسم والد الام</label>
                                        </div>
                                        @error('MotherFatherName')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='MotherGrandName' type="text"
                                                wire:keyup="concatFullName('MotherGrandName', $event.target.value)"
                                                id="modalEmployeeMotherGrandName" placeholder="اسم جد الام"
                                                class="form-control @error('MotherGrandName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeJMotherGrandName">اسم جد الام</label>
                                        </div>
                                        @error('MotherGrandName')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='MotherLastName' type="text"
                                                wire:keyup="concatFullName('MotherLastName', $event.target.value)"
                                                id="modalEmployeeMotherLastName" placeholder="لقب الام"
                                                class="form-control @error('MotherLastName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeMotherLastName">لقب الام</label>
                                        </div>
                                        @error('MotherLastName')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='FullMothersName' type="text"
                                                id="modalEmployeeFullMothersName" placeholder="اسم الام الكامل" readonly
                                                class="form-control @error('FullMothersName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeFullMothersName">اسم الام الكامل</label>
                                        </div>
                                        @error('FullMothersName')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='Status' type="text" id="modalEmployeeStatus"
                                                placeholder="الحالة"
                                                class="form-control @error('Status') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeStatus">الحالة</label>
                                        </div>
                                        @error('Status')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row g-4">
                            <div class="col-12 d-flex justify-content-between">
                                <button wire:click="ifPre({{ $currentStep }})"
                                    class="btn btn-outline-secondary {{--btn-prev--}}">
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
                                    class="btn btn-primary {{--btn-n--}}ext">
                                    <div wire:loading.remove wire:target="ifNext">
                                        <span class="align-middle d-sm-inline-block d-none me-sm-1">التالي</span>
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

                    <div id="step-02" class="content {{ 2 == $currentStep ? $activatedStep:''  }}">
                        <h4 class="mb-3 fw-bolder">البيانات الشخصية</h4>
                        <hr>
                        <div class="row mb-n4">
                            <div class="mb-3 col">
                                <div Class="row">
                                    <div class="col-6">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='DateBirth' type="text" id="DateBirth"
                                                placeholder="YYYY-MM-DD" class="form-control flatpickr-input Flatpickr"
                                                readonly="readonly">
                                            <label for="modalEmployeeDateBirth">تاريخ التولد</label>
                                        </div>
                                        @error('DateBirth')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='PlaceBirth' id="modalEmployeePlaceBirth"
                                                placeholder="محل الولادة"
                                                class="form-select @error('PlaceBirth') is-invalid is-filled @enderror">
                                                <option value=""></option>
                                                <option value="داخل العراق">داخل العراق</option>
                                                <option value="خارج العراق">خارج العراق</option>
                                            </select>
                                            <label for="modalEmployeePlaceBirth">محل الولادة</label>
                                        </div>
                                        @error('PlaceBirth')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col ">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='governorate_id' id="modalEmployeegovernorate_id"
                                                class="form-select @error('governorate_id') is-invalid is-filled @enderror">
                                                <option value=""></option>
                                            </select>
                                            <label for="mmodalEmployeegovernorate_id">محافظة التولد</label>
                                        </div>
                                        @error('governorate_id')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='BirthPlace'
                                                wire:keyup="concatFullName('BirthPlace', $event.target.value)"
                                                type="text" id="modalEmployeeBirthPlace" placeholder="مسقط الراس"
                                                class="form-control @error('BirthPlace') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeBirthPlace">مسقط الراس</label>
                                        </div>
                                        @error('BirthPlace')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='MaritalStatus' id="modalEmployeeMaritalStatus"
                                                placeholder="الحالةالاجتماعية"
                                                class="form-select @error('MaritalStatus') is-invalid is-filled @enderror">
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
                                            <label for="modalEmployeeMaritalStatus">الحالة الاجتماعية</label>
                                        </div>
                                        @error('MaritalStatus')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='Religion' id="modalEmployeeReligion"
                                                placeholder="الديانة"
                                                class="form-select @error('Religion') is-invalid is-filled @enderror">
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
                                            <label for="modalEmployeeReligion">الديانة</label>
                                        </div>
                                        @error('Religion')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='Gender' id="modalEmployeeGender"
                                                placeholder="الجنس"
                                                class="form-select @error('Gender') is-invalid is-filled @enderror">
                                                <option value=""></option>
                                                <option value="ذكر">ذكر</option>
                                                <option value="انثى">انثى</option>
                                            </select>
                                            <label for="modalEmployeeGender">الجنس</label>
                                        </div>
                                        @error('Gender')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                        <hr>
                        <div class="row g-4">
                            <div class="col-12 d-flex justify-content-between">
                                <button wire:click="ifPre({{ $currentStep }})"
                                    class="btn btn-outline-secondary {{--btn-prev--}}">
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
                                    class="btn btn-primary {{--btn-n--}}ext">
                                    <div wire:loading.remove wire:target="ifNext">
                                        <span class="align-middle d-sm-inline-block d-none me-sm-1">التالي</span>
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

                    <div id="step-03" class="content {{ 3 == $currentStep ? $activatedStep:''  }}">
                        <h4 class="mb-3 fw-bolder">معلومات السكن</h4>
                        <hr>
                        <div class="row mb-n4">
                            <div class="mb-3 col">
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='district_id' id="modalEmployeedistrict_id"
                                                class="form-select @error('district_id') is-invalid is-filled @enderror">
                                                <option value=""></option>
                                            </select>
                                            <label for="modalEmployeedistrict_id">القضاء</label>
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
                                            </select>
                                            <label for="mmodalEmployeearea_id">الناحية</label>
                                        </div>
                                        @error('area_id')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='NearestPoint'
                                                wire:keyup="concatFullName('NearestPoint', $event.target.value)"
                                                type="text" id="modalEmployeeBirthPlace" placeholder="اقرب نقطة دالة"
                                                class="form-control @error('NearestPoint') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeNearestPoint">اقرب نقطة دالة</label>
                                        </div>
                                        @error('NearestPoint')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='PhoneNumber1' type="text"
                                                id="modalEmployeePhoneNumber1" placeholder="رقم الهاتف 1"
                                                class="form-control @error('PhoneNumber1') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeePhoneNumber1">رقم الهاتف 1</label>
                                        </div>
                                        @error('PhoneNumber1')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='PhoneNumber2' type="text"
                                                id="modalEmployeePhoneNumber2" placeholder="رقم الهاتف 2"
                                                class="form-control @error('PhoneNumber1') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeePhoneNumber2">رقم الهاتف 2</label>
                                        </div>
                                        @error('PhoneNumber2')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row g-4">
                            <div class="col-12 d-flex justify-content-between">
                                <button wire:click="ifPre({{ $currentStep }})"
                                    class="btn btn-outline-secondary {{--btn-prev--}}">
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
                                    class="btn btn-primary {{--btn-n--}}ext">
                                    <div wire:loading.remove wire:target="ifNext">
                                        <span class="align-middle d-sm-inline-block d-none me-sm-1">التالي</span>
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

                    <div id="step-04" class="content {{ 4 == $currentStep ? $activatedStep:''  }}">
                        <h4 class="mb-3 fw-bolder">البطاقة الوطنية</h4>
                        <hr>
                        <div class="row mb-n4">
                            <div class="mb-3 col">
                                <div Class="row">
                                    <div class="mb-3 col ">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='governorate_id' id="modalEmployeegovernorate_id"
                                                class="form-select @error('governorate_id') is-invalid is-filled @enderror">
                                                <option value=""></option>
                                            </select>
                                            <label for="mmodalEmployeegovernorate_id">المحافظة</label>
                                        </div>
                                        @error('governorate_id')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='OfficeId'
                                                wire:keyup="concatFullName('OfficeId', $event.target.value)" type="text"
                                                id="modalEmployeeOffice" placeholder="الدائرة"
                                                class="form-control @error('OfficeId') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeOfficeId">الدائرة</label>
                                        </div>
                                        @error('OfficeId')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='RecordId' type="text" id="modalEmployeeRecordId"
                                                placeholder="السجل"
                                                class="form-control @error('RecordId') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeRecordId">السجل</label>
                                        </div>
                                        @error('RecordId')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='PageId' type="text" id="modalEmployeePageId"
                                                placeholder="الصحيفة "
                                                class="form-control @error('PageId') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeePageId">الصحيفة</label>
                                        </div>
                                        @error('PageId')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='CertificateNoId' type="text"
                                                id="modalEmployeeCertificateNoId" placeholder="رقم البطاقة"
                                                class="form-control @error('CertificateNoId') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeCertificateNoId">رقم البطاقة</label>
                                        </div>
                                        @error('CertificateNoId')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='DateIssueId' type="text" id="DateIssueId"
                                                placeholder="YYYY-MM-DD" class="form-control flatpickr-input Flatpickr"
                                                readonly="readonly">
                                            <label for="modalEmployeeDateIssueId">تاريخ الاصدار</label>
                                        </div>
                                        @error('DateIssueId')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='EndDateId' type="text" id="EndDateId"
                                                placeholder="YYYY-MM-DD" class="form-control flatpickr-input Flatpickr"
                                                readonly="readonly">
                                            <label for="modalEmployeeEndDateId">تاريخ الانتهاء</label>
                                        </div>
                                        @error('EndDateId')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='FileId' type="file" class="form-control"
                                                id="FileId"
                                                class="form-control @error('FileId') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeFileId">رفع البطاقة</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <hr>
                        <div class="row g-4">
                            <div class="col-12 d-flex justify-content-between">
                                <button wire:click="ifPre({{ $currentStep }})"
                                    class="btn btn-outline-secondary {{--btn-prev--}}">
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
                                    class="btn btn-primary {{--btn-n--}}ext">
                                    <div wire:loading.remove wire:target="ifNext">
                                        <span class="align-middle d-sm-inline-block d-none me-sm-1">التالي</span>
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

                    <div id="step-05" class="content {{ 5 == $currentStep ? $activatedStep:''  }}">
                        <h4 class="mb-3 fw-bolder">شهادة الجنسية</h4>
                        <hr>
                        <div class="row mb-n4">
                            <div class="mb-3 col">
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='FileNoCert' type="text"
                                                id="modalEmployeeFileNoCert" placeholder="رقم المحفظة"
                                                class="form-control @error('FileNoCert') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeFileNoCert">رقم المحفظة</label>
                                        </div>
                                        @error('FileNoCert')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='CertificateNoCert' type="text"
                                                id="modalEmployeeCertificateNoCert" placeholder="رقم الشهادة"
                                                class="form-control @error('CertificateNoCert') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeCertificateNoCert">رقم الشهادة</label>
                                        </div>
                                        @error('CertificateNoCert')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='DateIssueCert' type="text" id="DateIssueCert"
                                                placeholder="YYYY-MM-DD" class="form-control flatpickr-input Flatpickr"
                                                readonly="readonly">
                                            <label for="modalEmployeeDateIssueCert">تاريخ الاصدار</label>
                                        </div>
                                        @error('DateIssueCert')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='EndDateCert' type="text" id="EndDateCert"
                                                placeholder="YYYY-MM-DD" class="form-control flatpickr-input Flatpickr"
                                                readonly="readonly">
                                            <label for="modalEmployeeEndDateCert">تاريخ الانتهاء</label>
                                        </div>
                                        @error('EndDateCert')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='FileCert' type="file" class="form-control"
                                                id="FileCert"
                                                class="form-control @error('FileCert') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeFileCert">رفع الشهادة</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row g-4">
                            <div class="col-12 d-flex justify-content-between">
                                <button wire:click="ifPre({{ $currentStep }})"
                                    class="btn btn-outline-secondary {{--btn-prev--}}">
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
                                    class="btn btn-primary {{--btn-n--}}ext">
                                    <div wire:loading.remove wire:target="ifNext">
                                        <span class="align-middle d-sm-inline-block d-none me-sm-1">التالي</span>
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

                    <div id="step-06" class="content {{ 6 == $currentStep ? $activatedStep:''  }}">
                        <h4 class="mb-3 fw-bolder">بطاقة السكن</h4>
                        <hr>
                        <div class="row mb-n4">
                            <div class="mb-3 col">
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='FormNoCard' type="text"
                                                id="modalEmployeeFormNoCard" placeholder="رقم الاستمارة"
                                                class="form-control @error('FormNoCard') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeFormNoCard">رقم الاستمارة</label>
                                        </div>
                                        @error('FormNoCard')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='CardNoCard' type="text"
                                                id="modalEmployeeCardNoCard" placeholder="رقم البطاقة"
                                                class="form-control @error('CardNoCard') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeCardNoCard">رقم البطاقة</label>
                                        </div>
                                        @error('CardNoCard')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='DateIssueCard' type="text" id="DateIssueCard"
                                                placeholder="YYYY-MM-DD" class="form-control flatpickr-input Flatpickr"
                                                readonly="readonly">
                                            <label for="modalEmployeeDateIssueCard">تاريخ الاصدار</label>
                                        </div>
                                        @error('DateIssueCard')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='EndDateCard' type="text" id="EndDateCard"
                                                placeholder="YYYY-MM-DD" class="form-control flatpickr-input Flatpickr"
                                                readonly="readonly">
                                            <label for="modalEmployeeEndDateCard">تاريخ الانتهاء</label>
                                        </div>
                                        @error('EndDateCard')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='FileCard' type="file" class="form-control"
                                                id="FileCard"
                                                class="form-control @error('FileCard') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeFileCard">رفع البطاقة </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row g-4">
                            <div class="col-12 d-flex justify-content-between">
                                <button wire:click="ifPre({{ $currentStep }})"
                                    class="btn btn-outline-secondary {{--btn-prev--}}">
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
                                    class="btn btn-primary {{--btn-n--}}ext">
                                    <div wire:loading.remove wire:target="ifNext">
                                        <span class="align-middle d-sm-inline-block d-none me-sm-1">التالي</span>
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

                    <div id="step-07" class="content {{ 7 == $currentStep ? $activatedStep:''  }}">
                        <h4 class="mb-3 fw-bolder">البطاقة التموينية</h4>
                        <hr>
                        <div class="row mb-n4">
                            <div class="mb-3 col">
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='CardNoSupply' type="text"
                                                id="modalEmployeeCardNoSupply" placeholder="رقم البطاقة"
                                                class="form-control @error('CardNoSupply') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeCardNoSupply">رقم البطاقة</label>
                                        </div>
                                        @error('CardNoSupply')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='CenterNameSupply' type="text"
                                                id="modalEmployeeCenterNameSupply" placeholder="اسم مركز التموين"
                                                class="form-control @error('CenterNameSupply') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeCenterNameSupply">اسم مركز التموين</label>
                                        </div>
                                        @error('CenterNameSupply')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='CenterNoSupply' type="text"
                                                id="modalEmployeeCenterNoSupply" placeholder="رقم مركز التموين"
                                                class="form-control @error('CenterNoSupply') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeCenterNoSupply">رقم مركز التموين</label>
                                        </div>
                                        @error('CenterNoSupply')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='FileSupply' type="file" class="form-control"
                                                id="FileSupply"
                                                class="form-control @error('FileSupply') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeFileSupply">رفع التموينية</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row g-4">
                            <div class="col-12 d-flex justify-content-between">
                                <button wire:click="ifPre({{ $currentStep }})"
                                    class="btn btn-outline-secondary {{--btn-prev--}}">
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
                                    class="btn btn-primary {{--btn-n--}}ext">
                                    <div wire:loading.remove wire:target="ifNext">
                                        <span class="align-middle d-sm-inline-block d-none me-sm-1">التالي</span>
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

                    <div id="step-08" class="content {{ 8 == $currentStep ? $activatedStep:''  }}">
                        <h4 class="mb-3 fw-bolder">اجازة السوق</h4>
                        <hr>
                        <div class="row mb-n4">
                            <div class="mb-3 col">
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='LicenseDriving' id="modalEmployeeLicenseDriving"
                                                placeholder="اجازة السوق" placeholder="اجازة السوق"
                                                class="form-select @error('LicenseDriving') is-invalid is-filled @enderror">
                                                <option value=""></option>
                                                <option value="نعم">نعم</option>
                                                <option value="لا">لا</option>
                                            </select>
                                            <label for="modalEmployeeLicenseDriving">اجازة السوق</label>
                                        </div>
                                        @error('LicenseDriving')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='DateIssueDriving' type="text" id="DateIssueDriving"
                                                placeholder="YYYY-MM-DD" class="form-control flatpickr-input Flatpickr"
                                                readonly="readonly">
                                            <label for="modalEmployeeDateIssueDriving">تاريخ الاصدار</label>
                                        </div>
                                        @error('DateIssueDriving')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='EndDateDriving' type="text" id="EndDateDriving"
                                                placeholder="YYYY-MM-DD" class="form-control flatpickr-input Flatpickr"
                                                readonly="readonly">
                                            <label for="modalEmployeeEndDateDriving">تاريخ الانتهاء</label>
                                        </div>
                                        @error('EndDateDriving')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='FileDriving' type="file" class="form-control"
                                                id="FileDriving"
                                                class="form-control @error('FileDriving') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeFileDriving">رفع الاجازة </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row g-4">
                            <div class="col-12 d-flex justify-content-between">
                                <button wire:click="ifPre({{ $currentStep }})"
                                    class="btn btn-outline-secondary {{--btn-prev--}}">
                                    <div wire:loading.remove wire:target="ifPre">
                                        <span class="align-middle d-sm-inline-block d-none">السابق</span>
                                    </div>
                                    <div wire:loading wire:target="ifPre">
                                        <div class="spinner-border text-light" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </button>
                                <button wire:click="ifSubmit({{ $currentStep }})"
                                    class="btn btn-primary {{--btn-n--}}ext">
                                    <div wire:loading.remove wire:target="ifSubmit">
                                        <span class="align-middle d-sm-inline-block d-none me-sm-1">حفظ
                                            المعلومات</span>
                                    </div>
                                    <div wire:loading wire:target="ifSubmit">
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
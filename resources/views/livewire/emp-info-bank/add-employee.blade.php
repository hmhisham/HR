<div class="mt-n4">
    <h4 class="py-3">
        اضافة معلومات الموظف
    </h4>

    <div class="mb-4 col-12">
        <div class="mt-2 bs-stepper wizard-vertical vertical wizard-numbered wizard-modern">
            <div class="bs-stepper-header gap-lg-2">
                {{--  01  --}}
                <div class="step {{ 1 == $currentStep ? $activatedStep:''  }} {{ 1 < $currentStep ? $crossedStep:'' }}" data-target="#step-01">
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
                <div class="step {{ 2 == $currentStep ? $activatedStep:''  }} {{ 2 < $currentStep ? $crossedStep:'' }}" data-target="#step-02">
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
                <div class="step {{ 3 == $currentStep ? $activatedStep:''  }} {{ 3 < $currentStep ? $crossedStep:'' }}" data-target="#step-03">
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
                <div class="step {{ 4 == $currentStep ? $activatedStep:''  }} {{ 4 < $currentStep ? $crossedStep:'' }}" data-target="#step-04">
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
                <div class="step {{ 5 == $currentStep ? $activatedStep:''  }} {{ 5 < $currentStep ? $crossedStep:'' }}" data-target="#step-05">
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
                <div class="step {{ 6 == $currentStep ? $activatedStep:''  }} {{ 6 < $currentStep ? $crossedStep:'' }}" data-target="#step-06">
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
                <div class="step {{ 7 == $currentStep ? $activatedStep:''  }} {{ 7 < $currentStep ? $crossedStep:'' }}" data-target="#step-07">
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
                <div class="step {{ 8 == $currentStep ? $activatedStep:''  }} {{ 8 < $currentStep ? $crossedStep:'' }}" data-target="#step-08">
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
                                <Div Class="row">
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
                                            <input wire:model.defer='FileNumber' type="text" id="modalEmployeeFileNumber"
                                                placeholder="رقم الاضبارة"
                                                class="form-control @error('FileNumber') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeFileNumber">رقم الاضبارة</label>
                                        </div>
                                        @error('FileNumber')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <Div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='FirstName' wire:keyup="concatFullName('FirstName', $event.target.value)" type="text" id="modalEmployeeFirstName"
                                                placeholder="الاسم الأول"
                                                class="form-control @error('FirstName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeFirstName">الاسم الأول</label>
                                        </div>
                                        @error('FirstName')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='SecondName' wire:keyup="concatFullName('SecondName', $event.target.value)" type="text" id="modalEmployeeSecondName"
                                                placeholder="الاسم الثاني"
                                                class="form-control @error('SecondName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeSecondName">الاسم الثاني</label>
                                        </div>
                                        @error('SecondName')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='ThirdName' wire:keyup="concatFullName('ThirdName', $event.target.value)" type="text" id="modalEmployeeThirdName"
                                                placeholder="الاسم الثالث"
                                                class="form-control @error('ThirdName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeThirdName">الاسم الثالث</label>
                                        </div>
                                        @error('ThirdName')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <Div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='FourthName' wire:keyup="concatFullName('FourthName', $event.target.value)" type="text" id="modalEmployeeFourthName"
                                                placeholder="الاسم الرابع"
                                                class="form-control @error('FourthName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeFourthName">الاسم الرابع</label>
                                        </div>
                                        @error('FourthName')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='LastName' wire:keyup="concatFullName('LastName', $event.target.value)" type="text" id="modalEmployeeLastName"
                                                placeholder="اللقب"
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
                                <Div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='MotherName' wire:keyup="concatFullName('MotherName', $event.target.value)" type="text" id="modalEmployeeMotherName"
                                                placeholder="اسم الام"
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
                                            wire:keyup="concatFullName('MotherFatherName', $event.target.value)"  id="modalEmployeeMotherFatherName" placeholder="اسم والد الام"
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
                                            wire:keyup="concatFullName('MotherGrandName', $event.target.value)"  id="modalEmployeeMotherGrandName" placeholder="اسم جد الام"
                                                class="form-control @error('MotherGrandName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeJMotherGrandName">اسم جد الام</label>
                                        </div>
                                        @error('MotherGrandName')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <Div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='MotherLastName' type="text"
                                            wire:keyup="concatFullName('MotherLastName', $event.target.value)"  id="modalEmployeeMotherLastName" placeholder="لقب الام"
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
                                <button wire:click="ifPre({{ $currentStep }})" class="btn btn-outline-secondary {{--btn-prev--}}">
                                    <div wire:loading.remove wire:target="ifPre">
                                        <span class="align-middle d-sm-inline-block d-none">السابق</span>
                                    </div>
                                    <div wire:loading wire:target="ifPre">
                                        <div class="spinner-border text-light" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </button>
                                <button wire:click="ifNext({{ $currentStep }})" class="btn btn-primary {{--btn-n--}}ext" >
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

                        <hr>
                        <div class="row g-4">
                            <div class="col-12 d-flex justify-content-between">
                                <button wire:click="ifPre({{ $currentStep }})" class="btn btn-outline-secondary {{--btn-prev--}}">
                                    <div wire:loading.remove wire:target="ifPre">
                                        <span class="align-middle d-sm-inline-block d-none">السابق</span>
                                    </div>
                                    <div wire:loading wire:target="ifPre">
                                        <div class="spinner-border text-light" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </button>
                                <button wire:click="ifNext({{ $currentStep }})" class="btn btn-primary {{--btn-n--}}ext" >
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
                        <h5 class="mb-3 fw-bolder">Age ≥ 40 years, at the time of signing the informed consent</h5>
                        <h5 class="mb-3 fw-bolder text-primary">Enter Patient Date of Birth: (DD/MMM/YYYY)</h5>

                        <hr>
                        <div class="row g-4">
                            <div class="col-12 d-flex justify-content-between">
                                <button wire:click="ifPre({{ $currentStep }})" class="btn btn-outline-secondary {{--btn-prev--}}">
                                    <div wire:loading.remove wire:target="ifPre">
                                        <span class="align-middle d-sm-inline-block d-none">السابق</span>
                                    </div>
                                    <div wire:loading wire:target="ifPre">
                                        <div class="spinner-border text-light" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </button>
                                <button wire:click="ifNext({{ $currentStep }})" class="btn btn-primary {{--btn-n--}}ext" >
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
                        <h5 class="mb-3 fw-bolder">Body mass index (BMI) ≤ 40 (kg/m2) </h5>
                        <h5 class="mb-3 fw-bolder text-primary">Enter Patient BMI: XX (Kg/M2)</h5>

                        <hr>
                        <div class="row g-4">
                            <div class="col-12 d-flex justify-content-between">
                                <button wire:click="ifPre({{ $currentStep }})" class="btn btn-outline-secondary {{--btn-prev--}}">
                                    <div wire:loading.remove wire:target="ifPre">
                                        <span class="align-middle d-sm-inline-block d-none">السابق</span>
                                    </div>
                                    <div wire:loading wire:target="ifPre">
                                        <div class="spinner-border text-light" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </button>
                                <button wire:click="ifNext({{ $currentStep }})" class="btn btn-primary {{--btn-n--}}ext" >
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
                        <h5 class="mb-3 fw-bolder">Sex and Contraception/Barrier Requirements</h5>
                        <h5 class="mb-3 fw-bolder">A) For biological female participants:</h5>
                        <h5 class="mb-3 fw-bolder">A biological female participant is step to participate if she is not pregnant, not breastfeeding, and at least one of the following conditions applies:</h5>
                        <h5 class="mb-3 fw-bolder">Participant of non-childbearing potential (PONCBP)</h5>
                        <h5 class="mb-3 fw-bolder text-primary">Patient sex: MALE/FEMALE</h5>

                        <hr>
                        <div class="row g-4">
                            <div class="col-12 d-flex justify-content-between">
                                <button wire:click="ifPre({{ $currentStep }})" class="btn btn-outline-secondary {{--btn-prev--}}">
                                    <div wire:loading.remove wire:target="ifPre">
                                        <span class="align-middle d-sm-inline-block d-none">السابق</span>
                                    </div>
                                    <div wire:loading wire:target="ifPre">
                                        <div class="spinner-border text-light" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </button>
                                <button wire:click="ifNext({{ $currentStep }})" class="btn btn-primary {{--btn-n--}}ext" >
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
                        <h5 class="mb-3 fw-bolder">Sex and Contraception/Barrier Requirements</h5>
                        <h5 class="mb-3 fw-bolder">A) For biological female participants:</h5>
                        <h5 class="mb-3 fw-bolder">A biological female participant is step to participate if she is not pregnant, not breastfeeding, and at least one of the following conditions applies:</h5>
                        <h5 class="mb-3 fw-bolder">Participant of non-childbearing potential (PONCBP)</h5>
                        <h5 class="mb-3 fw-bolder text-primary">Is subject pregnant or breast feeding?</h5>

                        <hr>
                        <div class="row g-4">
                            <div class="col-12 d-flex justify-content-between">
                                <button wire:click="ifPre({{ $currentStep }})" class="btn btn-outline-secondary {{--btn-prev--}}">
                                    <div wire:loading.remove wire:target="ifPre">
                                        <span class="align-middle d-sm-inline-block d-none">السابق</span>
                                    </div>
                                    <div wire:loading wire:target="ifPre">
                                        <div class="spinner-border text-light" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </button>
                                <button wire:click="ifNext({{ $currentStep }})" class="btn btn-primary {{--btn-n--}}ext" >
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
                        <h5 class="mb-3 fw-bolder">Sex and Contraception/Barrier Requirements</h5>
                        <h5 class="mb-3 fw-bolder">A) For biological female participants:</h5>
                        <h5 class="mb-3 fw-bolder">A biological female participant is step to participate if she is not pregnant, not breastfeeding, and at least one of the following conditions applies:</h5>
                        <h5 class="mb-3 fw-bolder">Participant of non-childbearing potential (PONCBP)</h5>
                        <h5 class="mb-3 fw-bolder text-primary">Is participant of non-childbearing potential (PONCBP)?</h5>

                        <hr>
                        <div class="row g-4">
                            <div class="col-12 d-flex justify-content-between">
                                <button wire:click="ifPre({{ $currentStep }})" class="btn btn-outline-secondary {{--btn-prev--}}">
                                    <div wire:loading.remove wire:target="ifPre">
                                        <span class="align-middle d-sm-inline-block d-none">السابق</span>
                                    </div>
                                    <div wire:loading wire:target="ifPre">
                                        <div class="spinner-border text-light" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </button>
                                <button wire:click="ifNext({{ $currentStep }})" class="btn btn-primary {{--btn-n--}}ext" >
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
                        <h5 class="mb-3 fw-bolder">Participant of childbearing potential (POCBP) who</h5>
                        <h5 class="mb-3 fw-bolder">Have a negative pregnancy test (serum) at screening and a negative urine pregnancy test at Day 1 Visit?</h5>
                        <h5 class="mb-3 fw-bolder">Agree to remain abstinent (refrain from heterosexual intercourse) or use of at least one highly effective contraceptive method that results in a failure rate of < 1% per year during the treatment period and for at least 12 weeks after the final dose of Study Drug.</h5>
                        <h5 class="mb-3 fw-bolder text-danger">The participant of childbearing potential (POCBP):  </h5>
                        <h5 class="mb-3 fw-bolder text-primary">pregnancy test (serum) at screening:</h5>

                        <hr>
                        <div class="row g-4">
                            <div class="col-12 d-flex justify-content-between">
                                <button wire:click="ifPre({{ $currentStep }})" class="btn btn-outline-secondary {{--btn-prev--}}">
                                    <div wire:loading.remove wire:target="ifPre">
                                        <span class="align-middle d-sm-inline-block d-none">السابق</span>
                                    </div>
                                    <div wire:loading wire:target="ifPre">
                                        <div class="spinner-border text-light" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </button>
                                <button wire:click="ifSubmit({{ $currentStep }})" class="btn btn-primary {{--btn-n--}}ext" >
                                    <div wire:loading.remove wire:target="ifSubmit">
                                        <span class="align-middle d-sm-inline-block d-none me-sm-1">حفظ المعلومات</span>
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

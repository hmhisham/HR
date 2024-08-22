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


                <div Class="line"></div>
                {{--  02  --}}

                <div class="step {{ 2 == $currentStep ? $activatedStep : '' }} {{ 2 < $currentStep ? $crossedStep : '' }}"
                    data-target="#step-02">
                    <button {{-- wire:click="buttonStep({{ $stepStep }})" --}} type="button" class="step-trigger">
                        <span class="bs-stepper-circle"><i class="mdi mdi-check"></i></span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-number">02</span>
                            <span class="gap-1 d-flex flex-column ms-2">
                                <span class="{{-- bs-stepper-title --}}">صفحة </span>
                                {{-- <span class="bs-stepper-subtitle">Question eLigibility test</span> --}}
                            </span>
                        </span>
                    </button>
                </div>


                <div Class="line"></div>
                {{--  03  --}}

                <div class="step {{ 3 == $currentStep ? $activatedStep : '' }} {{ 3 < $currentStep ? $crossedStep : '' }}"
                    data-target="#step-03">
                    <button {{-- wire:click="buttonStep({{ $stepStep }})" --}} type="button" class="step-trigger">
                        <span class="bs-stepper-circle"><i class="mdi mdi-check"></i></span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-number">03</span>
                            <span class="gap-1 d-flex flex-column ms-2">
                                <span class="{{-- bs-stepper-title --}}">صفحة </span>
                                {{-- <span class="bs-stepper-subtitle">Question eLigibility test</span> --}}
                            </span>
                        </span>
                    </button>
                </div>


                <div Class="line"></div>
                {{--  04  --}}

                <div class="step {{ 4 == $currentStep ? $activatedStep : '' }} {{ 4 < $currentStep ? $crossedStep : '' }}"
                    data-target="#step-04">
                    <button {{-- wire:click="buttonStep({{ $stepStep }})" --}} type="button" class="step-trigger">
                        <span class="bs-stepper-circle"><i class="mdi mdi-check"></i></span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-number">04</span>
                            <span class="gap-1 d-flex flex-column ms-2">
                                <span class="{{-- bs-stepper-title --}}">صفحة </span>
                                {{-- <span class="bs-stepper-subtitle">Question eLigibility test</span> --}}
                            </span>
                        </span>
                    </button>
                </div>


                <div Class="line"></div>
                {{--  05  --}}

                <div class="step {{ 5 == $currentStep ? $activatedStep : '' }} {{ 5 < $currentStep ? $crossedStep : '' }}"
                    data-target="#step-05">
                    <button {{-- wire:click="buttonStep({{ $stepStep }})" --}} type="button" class="step-trigger">
                        <span class="bs-stepper-circle"><i class="mdi mdi-check"></i></span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-number">05</span>
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
                                            <input wire:model.defer='JobNumber' type="text"
                                                id="modalEmployeeJobNumber" placeholder="الرقم الوظيفي"
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
                                                id="modalEmployeeFileNumber" placeholder="الاضبارة"
                                                class="form-control @error('FileNumber') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeFileNumber">الاضبارة</label>
                                        </div>
                                        @error('FileNumber')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>


                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='FirstName' type="text"
                                                id="modalEmployeeFirstName" placeholder="الاسم الاول"
                                                class="form-control @error('FirstName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeFirstName">الاسم الاول</label>
                                        </div>
                                        @error('FirstName')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>



                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='SecondName' type="text"
                                                id="modalEmployeeSecondName" placeholder="اسم الاب"
                                                class="form-control @error('SecondName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeSecondName">اسم الاب</label>
                                        </div>
                                        @error('SecondName')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>



                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='ThirdName' type="text"
                                                id="modalEmployeeThirdName" placeholder="اسم الجد"
                                                class="form-control @error('ThirdName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeThirdName">اسم الجد</label>
                                        </div>
                                        @error('ThirdName')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>


                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='FourthName' type="text"
                                                id="modalEmployeeFourthName" placeholder="اسم والد الجد"
                                                class="form-control @error('FourthName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeFourthName">اسم والد الجد</label>
                                        </div>
                                        @error('FourthName')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>



                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='LastName' type="text"
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
                                            <input wire:model.defer='FullName' type="text"
                                                id="modalEmployeeFullName" placeholder="الاسم الكامل"
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
                                            <input wire:model.defer='MotherName' type="text"
                                                id="modalEmployeeMotherName" placeholder="اسم الام"
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
                                                id="modalEmployeeMotherGrandName" placeholder="اسم جد الام"
                                                class="form-control @error('MotherGrandName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeMotherGrandName">اسم جد الام</label>
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
                                                id="modalEmployeeFullMothersName" placeholder="الاسم الكامل"
                                                class="form-control @error('FullMothersName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeFullMothersName">الاسم الكامل</label>
                                        </div>
                                        @error('FullMothersName')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>



                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='Status' type="text" id="modalEmployeeStatus"
                                                placeholder="الحاله"
                                                class="form-control @error('Status') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeStatus">الحاله</label>
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


                    <div id="step-02" class="content {{ 2 == $currentStep ? $activatedStep : '' }}">
                        <h4 class="mb-3 fw-bolder">صفحة 2 </h4>
                        <hr>

                        <div class="row mb-n4">
                            <div class="mb-3 col">
                                <div Class="row">

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='JobNumber' type="text"
                                                id="modalEmployeeJobNumber" placeholder="الرقم الوظيفي"
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
                                                id="modalEmployeeFileNumber" placeholder="الاضبارة"
                                                class="form-control @error('FileNumber') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeFileNumber">الاضبارة</label>
                                        </div>
                                        @error('FileNumber')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>


                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='FirstName' type="text"
                                                id="modalEmployeeFirstName" placeholder="الاسم الاول"
                                                class="form-control @error('FirstName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeFirstName">الاسم الاول</label>
                                        </div>
                                        @error('FirstName')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>



                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='SecondName' type="text"
                                                id="modalEmployeeSecondName" placeholder="اسم الاب"
                                                class="form-control @error('SecondName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeSecondName">اسم الاب</label>
                                        </div>
                                        @error('SecondName')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>



                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='ThirdName' type="text"
                                                id="modalEmployeeThirdName" placeholder="اسم الجد"
                                                class="form-control @error('ThirdName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeThirdName">اسم الجد</label>
                                        </div>
                                        @error('ThirdName')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>


                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='FourthName' type="text"
                                                id="modalEmployeeFourthName" placeholder="اسم والد الجد"
                                                class="form-control @error('FourthName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeFourthName">اسم والد الجد</label>
                                        </div>
                                        @error('FourthName')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>



                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='LastName' type="text"
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
                                            <input wire:model.defer='FullName' type="text"
                                                id="modalEmployeeFullName" placeholder="الاسم الكامل"
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
                                            <input wire:model.defer='MotherName' type="text"
                                                id="modalEmployeeMotherName" placeholder="اسم الام"
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
                                                id="modalEmployeeMotherGrandName" placeholder="اسم جد الام"
                                                class="form-control @error('MotherGrandName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeMotherGrandName">اسم جد الام</label>
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
                                                id="modalEmployeeFullMothersName" placeholder="الاسم الكامل"
                                                class="form-control @error('FullMothersName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeFullMothersName">الاسم الكامل</label>
                                        </div>
                                        @error('FullMothersName')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>



                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='Status' type="text" id="modalEmployeeStatus"
                                                placeholder="الحاله"
                                                class="form-control @error('Status') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeStatus">الحاله</label>
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


                    <div id="step-03" class="content {{ 3 == $currentStep ? $activatedStep : '' }}">
                        <h4 class="mb-3 fw-bolder">صفحة 3 </h4>
                        <hr>

                        <div class="row mb-n4">
                            <div class="mb-3 col">
                                <div Class="row">

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='JobNumber' type="text"
                                                id="modalEmployeeJobNumber" placeholder="الرقم الوظيفي"
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
                                                id="modalEmployeeFileNumber" placeholder="الاضبارة"
                                                class="form-control @error('FileNumber') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeFileNumber">الاضبارة</label>
                                        </div>
                                        @error('FileNumber')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>


                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='FirstName' type="text"
                                                id="modalEmployeeFirstName" placeholder="الاسم الاول"
                                                class="form-control @error('FirstName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeFirstName">الاسم الاول</label>
                                        </div>
                                        @error('FirstName')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>



                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='SecondName' type="text"
                                                id="modalEmployeeSecondName" placeholder="اسم الاب"
                                                class="form-control @error('SecondName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeSecondName">اسم الاب</label>
                                        </div>
                                        @error('SecondName')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>



                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='ThirdName' type="text"
                                                id="modalEmployeeThirdName" placeholder="اسم الجد"
                                                class="form-control @error('ThirdName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeThirdName">اسم الجد</label>
                                        </div>
                                        @error('ThirdName')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>


                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='FourthName' type="text"
                                                id="modalEmployeeFourthName" placeholder="اسم والد الجد"
                                                class="form-control @error('FourthName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeFourthName">اسم والد الجد</label>
                                        </div>
                                        @error('FourthName')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>



                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='LastName' type="text"
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
                                            <input wire:model.defer='FullName' type="text"
                                                id="modalEmployeeFullName" placeholder="الاسم الكامل"
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
                                            <input wire:model.defer='MotherName' type="text"
                                                id="modalEmployeeMotherName" placeholder="اسم الام"
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
                                                id="modalEmployeeMotherGrandName" placeholder="اسم جد الام"
                                                class="form-control @error('MotherGrandName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeMotherGrandName">اسم جد الام</label>
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
                                                id="modalEmployeeFullMothersName" placeholder="الاسم الكامل"
                                                class="form-control @error('FullMothersName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeFullMothersName">الاسم الكامل</label>
                                        </div>
                                        @error('FullMothersName')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>



                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='Status' type="text" id="modalEmployeeStatus"
                                                placeholder="الحاله"
                                                class="form-control @error('Status') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeStatus">الحاله</label>
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


                    <div id="step-04" class="content {{ 4 == $currentStep ? $activatedStep : '' }}">
                        <h4 class="mb-3 fw-bolder">صفحة 4 </h4>
                        <hr>

                        <div class="row mb-n4">
                            <div class="mb-3 col">
                                <div Class="row">

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='JobNumber' type="text"
                                                id="modalEmployeeJobNumber" placeholder="الرقم الوظيفي"
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
                                                id="modalEmployeeFileNumber" placeholder="الاضبارة"
                                                class="form-control @error('FileNumber') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeFileNumber">الاضبارة</label>
                                        </div>
                                        @error('FileNumber')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>


                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='FirstName' type="text"
                                                id="modalEmployeeFirstName" placeholder="الاسم الاول"
                                                class="form-control @error('FirstName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeFirstName">الاسم الاول</label>
                                        </div>
                                        @error('FirstName')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>



                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='SecondName' type="text"
                                                id="modalEmployeeSecondName" placeholder="اسم الاب"
                                                class="form-control @error('SecondName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeSecondName">اسم الاب</label>
                                        </div>
                                        @error('SecondName')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>



                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='ThirdName' type="text"
                                                id="modalEmployeeThirdName" placeholder="اسم الجد"
                                                class="form-control @error('ThirdName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeThirdName">اسم الجد</label>
                                        </div>
                                        @error('ThirdName')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>


                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='FourthName' type="text"
                                                id="modalEmployeeFourthName" placeholder="اسم والد الجد"
                                                class="form-control @error('FourthName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeFourthName">اسم والد الجد</label>
                                        </div>
                                        @error('FourthName')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>



                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='LastName' type="text"
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
                                            <input wire:model.defer='FullName' type="text"
                                                id="modalEmployeeFullName" placeholder="الاسم الكامل"
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
                                            <input wire:model.defer='MotherName' type="text"
                                                id="modalEmployeeMotherName" placeholder="اسم الام"
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
                                                id="modalEmployeeMotherGrandName" placeholder="اسم جد الام"
                                                class="form-control @error('MotherGrandName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeMotherGrandName">اسم جد الام</label>
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
                                                id="modalEmployeeFullMothersName" placeholder="الاسم الكامل"
                                                class="form-control @error('FullMothersName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeFullMothersName">الاسم الكامل</label>
                                        </div>
                                        @error('FullMothersName')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>



                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='Status' type="text" id="modalEmployeeStatus"
                                                placeholder="الحاله"
                                                class="form-control @error('Status') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeStatus">الحاله</label>
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


                    <div id="step-05" class="content {{ 5 == $currentStep ? $activatedStep : '' }}">
                        <h4 class="mb-3 fw-bolder">صفحة 5 </h4>
                        <hr>

                        <div class="row mb-n4">
                            <div class="mb-3 col">
                                <div Class="row">

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='JobNumber' type="text"
                                                id="modalEmployeeJobNumber" placeholder="الرقم الوظيفي"
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
                                                id="modalEmployeeFileNumber" placeholder="الاضبارة"
                                                class="form-control @error('FileNumber') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeFileNumber">الاضبارة</label>
                                        </div>
                                        @error('FileNumber')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>


                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='FirstName' type="text"
                                                id="modalEmployeeFirstName" placeholder="الاسم الاول"
                                                class="form-control @error('FirstName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeFirstName">الاسم الاول</label>
                                        </div>
                                        @error('FirstName')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>



                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='SecondName' type="text"
                                                id="modalEmployeeSecondName" placeholder="اسم الاب"
                                                class="form-control @error('SecondName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeSecondName">اسم الاب</label>
                                        </div>
                                        @error('SecondName')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>



                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='ThirdName' type="text"
                                                id="modalEmployeeThirdName" placeholder="اسم الجد"
                                                class="form-control @error('ThirdName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeThirdName">اسم الجد</label>
                                        </div>
                                        @error('ThirdName')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>


                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='FourthName' type="text"
                                                id="modalEmployeeFourthName" placeholder="اسم والد الجد"
                                                class="form-control @error('FourthName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeFourthName">اسم والد الجد</label>
                                        </div>
                                        @error('FourthName')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>



                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='LastName' type="text"
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
                                            <input wire:model.defer='FullName' type="text"
                                                id="modalEmployeeFullName" placeholder="الاسم الكامل"
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
                                            <input wire:model.defer='MotherName' type="text"
                                                id="modalEmployeeMotherName" placeholder="اسم الام"
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
                                                id="modalEmployeeMotherGrandName" placeholder="اسم جد الام"
                                                class="form-control @error('MotherGrandName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeMotherGrandName">اسم جد الام</label>
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
                                                id="modalEmployeeFullMothersName" placeholder="الاسم الكامل"
                                                class="form-control @error('FullMothersName') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeFullMothersName">الاسم الكامل</label>
                                        </div>
                                        @error('FullMothersName')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>



                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='Status' type="text" id="modalEmployeeStatus"
                                                placeholder="الحاله"
                                                class="form-control @error('Status') is-invalid is-filled @enderror" />
                                            <label for="modalEmployeeStatus">الحاله</label>
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

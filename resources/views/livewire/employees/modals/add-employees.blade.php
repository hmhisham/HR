
<!-- Add Employee Modal -->
<div wire:ignore.self class="modal fade" id="addemployeeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">اضافة </h3>
                    <p>نافذة الأضافة </p>
                </div>

                <hr class="mt-n2">


                <form id="addEmployeeForm" autocomplete="off">
                    <div class="row row-cols-1">
                        <div class="col mb-3">
                        '<Div Class="row">

                                       <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='JobNumber' type="text" id="modalEmployeeJobNumber" placeholder="الرقم الوظيفي"
                                            class="form-control @error('JobNumber') is-invalid is-filled @enderror" />
                                        <label for="modalEmployeeJobNumber">الرقم الوظيفي</label>
                                    </div>
                                    @error('JobNumber')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                       <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='FileNumber' type="text" id="modalEmployeeJobNumber" placeholder="رقم الاضبارة"
                                            class="form-control @error('FileNumber') is-invalid is-filled @enderror" />
                                        <label for="modalEmployeeJobNumber">رقم الاضبارة</label>
                                    </div>
                                    @error('FileNumber')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                       <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='FirstName' type="text" id="modalEmployeeJobNumber" placeholder="الاسم الأول"
                                            class="form-control @error('FirstName') is-invalid is-filled @enderror" />
                                        <label for="modalEmployeeJobNumber">الاسم الأول</label>
                                    </div>
                                    @error('FirstName')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                       <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='SecondName' type="text" id="modalEmployeeJobNumber" placeholder="الاسم الثاني"
                                            class="form-control @error('SecondName') is-invalid is-filled @enderror" />
                                        <label for="modalEmployeeJobNumber">الاسم الثاني</label>
                                    </div>
                                    @error('SecondName')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                       <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='ThirdName' type="text" id="modalEmployeeJobNumber" placeholder="الاسم الثالث"
                                            class="form-control @error('ThirdName') is-invalid is-filled @enderror" />
                                        <label for="modalEmployeeJobNumber">الاسم الثالث</label>
                                    </div>
                                    @error('ThirdName')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                       <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='FourthName' type="text" id="modalEmployeeJobNumber" placeholder="الاسم الرابع"
                                            class="form-control @error('FourthName') is-invalid is-filled @enderror" />
                                        <label for="modalEmployeeJobNumber">الاسم الرابع</label>
                                    </div>
                                    @error('FourthName')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                       <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='LastName' type="text" id="modalEmployeeJobNumber" placeholder="اللقب"
                                            class="form-control @error('LastName') is-invalid is-filled @enderror" />
                                        <label for="modalEmployeeJobNumber">اللقب</label>
                                    </div>
                                    @error('LastName')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                       <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='FullName' type="text" id="modalEmployeeJobNumber" placeholder="الاسم الكامل"
                                            class="form-control @error('FullName') is-invalid is-filled @enderror" />
                                        <label for="modalEmployeeJobNumber">الاسم الكامل</label>
                                    </div>
                                    @error('FullName')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                       <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='MotherName' type="text" id="modalEmployeeJobNumber" placeholder="اسم الام"
                                            class="form-control @error('MotherName') is-invalid is-filled @enderror" />
                                        <label for="modalEmployeeJobNumber">اسم الام</label>
                                    </div>
                                    @error('MotherName')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                       <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='MotherFatherName' type="text" id="modalEmployeeJobNumber" placeholder="اسم والد الام"
                                            class="form-control @error('MotherFatherName') is-invalid is-filled @enderror" />
                                        <label for="modalEmployeeJobNumber">اسم والد الام</label>
                                    </div>
                                    @error('MotherFatherName')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                       <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='MotherGrandName' type="text" id="modalEmployeeJobNumber" placeholder="اسم جد الام"
                                            class="form-control @error('MotherGrandName') is-invalid is-filled @enderror" />
                                        <label for="modalEmployeeJobNumber">اسم جد الام</label>
                                    </div>
                                    @error('MotherGrandName')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                       <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='MotherLastName' type="text" id="modalEmployeeJobNumber" placeholder="لقب الام"
                                            class="form-control @error('MotherLastName') is-invalid is-filled @enderror" />
                                        <label for="modalEmployeeJobNumber">لقب الام</label>
                                    </div>
                                    @error('MotherLastName')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                       <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='FullMothersName' type="text" id="modalEmployeeJobNumber" placeholder="اسم الام الكامل"
                                            class="form-control @error('FullMothersName') is-invalid is-filled @enderror" />
                                        <label for="modalEmployeeJobNumber">اسم الام الكامل</label>
                                    </div>
                                    @error('FullMothersName')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                       <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='Status' type="text" id="modalEmployeeJobNumber" placeholder="الحالة"
                                            class="form-control @error('Status') is-invalid is-filled @enderror" />
                                        <label for="modalEmployeeJobNumber">الحالة</label>
                                    </div>
                                    @error('Status')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="text-center col-12 demo-vertical-spacing mb-n4">
                        <button wire:click='store' wire:loading.attr="disabled" type="button" class="btn btn-primary me-sm-3 me-1">اضافة فئة</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                            aria-label="Close">تجاهل</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!--/ Add Employee Modal -->

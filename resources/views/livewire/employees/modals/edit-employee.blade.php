<!-- Edite Employee Modal -->
<div wire:ignore.self class="modal fade" id="editEmployeeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل</h3>
                    <p>نافذة التعديل</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetEmployee"
                    wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حفظ البيانات...</h5>

                <div wire:loading.remove>
                    <form id="editEmployeeModalForm" autocomplete="off">

                        <div class="row row-cols-1  ">
                            <div class="col mb-3">
                                '<Div Class="row">
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
                        <hr class="my-0">
                        <div class="text-center col-12 demo-vertical-spacing mb-n4">
                            <button wire:click='update' wire:loading.attr="disabled" type="button"
                            class="btn btn-success me-sm-3 me-1">تعديل</button>
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                aria-label="Close">تجاهل</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Edite Employee Modal -->

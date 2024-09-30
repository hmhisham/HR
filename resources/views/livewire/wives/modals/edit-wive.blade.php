<!-- Edite Wive Modal -->
<div wire:ignore.self class="modal fade" id="editwiveModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل بيانات الزوج/ية</h3>
                    <p>نافذة التعديل</p>
                </div>
                <hr class="mt-n2">
                {{-- <h5 wire:loading wire:target="GetWive" wire:loading.class="d-flex justify-content-center text-primary">
                    جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حفظ البيانات...</h5> --}}
                <div wire:loading.remove>
                    <form id="editWiveModalForm" autocomplete="off">
                        <div class="row row-cols-1">

                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <select wire:model.defer='workers_id' id="modalWiveworkers_id"
                                        class="form-select @error('workers_id') is-invalid is-filled @enderror">
<<<<<<< HEAD
                                        <option value=""></option>
=======
                                        <option value="">اختر اسم الموظف</option>
>>>>>>> c12cfb4473d72fb6b7147e77d9729e60fed5f33b
                                        @foreach ($workers as $worker)
                                            <option value="{{ $worker->id }}">{{ $worker->full_name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="modalWiveworkers_id">اسم الموظف</label>
                                </div>
                                @error('workers_id')
                                    <small class='text-danger inputerror'>{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col mb-3">
                                <div class="row">
                                    <!-- الاسم الأول -->
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model='first_name' type="text" id="modalWivefirst_name"
                                                placeholder="الاسم الأول"
                                                class="form-control @error('first_name') is-invalid is-filled @enderror" />
                                            <label for="modalWivefirst_name">الاسم الأول</label>
                                        </div>
                                        @error('first_name')
                                            <small class='text-danger inputerror'>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- اسم الأب -->
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model='father_name' type="text" id="modalWivefather_name"
                                                placeholder="اسم الأب"
                                                class="form-control @error('father_name') is-invalid is-filled @enderror" />
                                            <label for="modalWivefather_name">اسم الأب</label>
                                        </div>
                                        @error('father_name')
                                            <small class='text-danger inputerror'>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- اسم الجد -->
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model='grandfather_name' type="text"
                                                id="modalWivegrandfather_name" placeholder="اسم الجد"
                                                class="form-control @error('grandfather_name') is-invalid is-filled @enderror" />
                                            <label for="modalWivegrandfather_name">اسم الجد</label>
                                        </div>
                                        @error('grandfather_name')
                                            <small class='text-danger inputerror'>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- اسم والد الجد -->
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model='great_grandfather_name' type="text"
                                                id="modalWivegreat_grandfather_name" placeholder="اسم والد الجد"
                                                class="form-control @error('great_grandfather_name') is-invalid is-filled @enderror" />
                                            <label for="modalWivegreat_grandfather_name">اسم والد الجد</label>
                                        </div>
                                        @error('great_grandfather_name')
                                            <small class='text-danger inputerror'>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- اللقب -->
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model='surname' type="text" id="modalWivesurname"
                                                placeholder="اللقب"
                                                class="form-control @error('surname') is-invalid is-filled @enderror" />
                                            <label for="modalWivesurname">اللقب</label>
                                        </div>
                                        @error('surname')
                                            <small class='text-danger inputerror'>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='full_name' type="text" id="modalWivefull_name"
                                                placeholder="الاسم الكامل"
                                                class="form-control @error('full_name') is-invalid is-filled @enderror"
                                                disabled />
                                            <label for="modalWivefull_name">الاسم الكامل</label>
                                        </div>
                                        @error('full_name')
                                            <small class='text-danger inputerror'>{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='marital_status' id="modalWivemarital_status"
                                                class="form-select @error('marital_status') is-invalid is-filled @enderror">
                                                <option value="">حالة الزوج/ـة</option>
                                                <option value="على قيد الحياة">على قيد الحياة</option>
                                                <option value="متوفى/ية">متوفى/ية</option>
                                            </select>
                                            <label for="modalWivemarital_status">الحالة</label>
                                        </div>
                                        @error('marital_status')
                                            <small class='text-danger inputerror'>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='occupational_status'
                                                wire:change="getEmpStatus($event.target.value)"
                                                id="modalWiveoccupational_status"
                                                class="form-select @error('occupational_status') is-invalid is-filled @enderror">
                                                <option value="">اختر الحالة المهنية</option>
                                                <option value="كاسب/ربة بيت">كاسب/ربة بيت</option>
                                                <option value="موظف/ـة">موظف/ـة</option>
                                            </select>
                                            <label for="modalWiveoccupational_status">الحالة المهنية</label>
                                        </div>
                                        @error('occupational_status')
                                            <small class='text-danger inputerror'>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='organization_name'
                                                id="modalWiveorganization_name"
                                                class="form-select @error('organization_name') is-invalid is-filled @enderror"
                                                {{ $EmpStatus }}>
                                                <option value="">اختر الدائرة</option>
                                                @foreach ($department as $departmen)
                                                    <option value="{{ $departmen->id }}">
                                                        {{ $departmen->department_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="modalWiveorganization_name">الدوائر</label>
                                        </div>
                                        @error('organization_name')
                                            <small class='text-danger inputerror'>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='national_id' type="text"
                                                id="modalWivenational_id" placeholder="رقم البطاقة الوطنية"
                                                class="form-control @error('national_id') is-invalid is-filled @enderror"
                                                onkeypress="return restrictAlphabets(event)" />
                                            <label for="modalWivenational_id">رقم البطاقة الوطنية</label>
                                        </div>
                                        @error('national_id')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <div class="form-check">
                                                <input wire:model.defer='is_married' type="checkbox"
                                                    id="modalWiveis_married" placeholder="اختيار مخصصات الزوجية"
                                                    class="form-check-input @error('is_married') is-invalid is-filled @enderror" />
                                                <label class="form-check-label" for="modalWiveis_married">اختيار
                                                    مخصصات الزوجية</label>
                                            </div>
                                        </div>
                                        @error('is_married')
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
<script type="text/javascript">
    function restrictAlphabets(e) {
        var x = e.which || e.keycode;
        if ((x >= 48 && x <= 57))
            return true;
        else
            return false;
    }
</script>
<!--/ Edite Wive Modal -->

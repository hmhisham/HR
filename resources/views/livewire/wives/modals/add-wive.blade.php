<!-- Add Wive Modal -->
<div wire:ignore.self class="modal fade" id="addwiveModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">اضافة بيانات الزوج/ية </h3>
                    <p>نافذة الاضافة</p>
                </div>
                <hr class="mt-n2">
                <form id="addwiveModalForm" autocomplete="off">
                    <div class="row row-cols-1 ">
                        <!--<div class="mb-3 col">
                            <div class="form-floating form-floating-outline">
                                <select wire:model.defer='workers_id' id="addWiveworkers_id"
                                    class="form-select @error('workers_id') is-invalid is-filled @enderror">
                                    <option value="">اختر اسم الموظف</option>
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

                        <div class="mb-3 col">
                            <div class="form-floating form-floating-outline">
                                <select wire:model.defer='workers_id' id="addWiveworkers_id"
                                    class="form-select @error('workers_id') is-invalid is-filled @enderror">
                                    <option value="">اختر اسم الموظف</option>
                                </select>
                                <label for="modalWiveworkers_id">اسم الموظف</label>
                            </div>
                            @error('workers_id')
                                <small class='text-danger inputerror'>{{ $message }}</small>
                            @enderror
                        </div>-->

                        <div class="mb-3 col">
                            <div class="input-group">
                                <div class="form-floating form-floating-outline flex-grow-1">
                                    <input type="text" id="autocomplete" class="form-control" placeholder="اختر اسم الموظف">
                                    <label for="autocomplete">اسم الموظف</label>
                                </div>
                                <button id="search-button" class="btn btn-primary">بحث</button>
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
                                            <option value="">اختر حالة الزوج/ـة</option>
                                            <option value="على قيد الحياة">على قيد الحياة</option>
                                            <option value="متوفى/ية">متوفى/ية</option>
                                        </select>
                                        <label for="modalWivemarital_status">حالة الزوج/ـة</label>
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
                                        <select wire:model.defer='organization_name' id="addWiveorganization_name"
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
                                            onkeypress="return onlyNumberKey(event)" />
                                        <label for="modalWivenational_id">رقم البطاقة الوطنية</label>
                                    </div>
                                    @error('national_id')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                            <div Class="row">
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <div class="form-check">
                                            <input wire:model.defer='is_married' type="checkbox"
                                                id="modalWiveis_married" placeholder="اختيار مخصصات الزوجية"
                                                class="form-check-input @error('is_married') is-invalid is-filled @enderror" />
                                            <label class="form-check-label" for="modalWiveis_married">اختيار مخصصات
                                                الزوجية</label>
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
                        <button wire:click='store' wire:loading.attr="disabled" type="button"
                            class="btn btn-primary me-sm-3 me-1">اضافة
                        </button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                            aria-label="Close">تجاهل</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ Add Wive Modal -->

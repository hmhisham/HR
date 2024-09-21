<!-- Edite Children Modal -->
<div wire:ignore.self class="modal fade" id="editchildrenModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل بيانات الاطفال</h3>
                    <p>نافذة التعديل</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetChildren"
                    wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حفظ البيانات...</h5>
                <div wire:loading.remove>
                    <form id="editChildrenModalForm" autocomplete="off">
                        <div class="row row-cols-1">
                            <div class="col mb-3">
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='wives_id' id="modalChildrenwives_id"
                                                class="form-select @error('wives_id') is-invalid is-filled @enderror">
                                                <option value=""></option>
                                                @foreach ($wives as $wive)
                                                    <option value="{{ $wive->id }}">{{ $wive->full_name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="modalChildrenwives_id">اسم الام الكامل</label>
                                        </div>
                                        @error('wives_id')
                                            <small class='text-danger inputerror'>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='full_name' type="text"
                                                id="modalChildrenfull_name" placeholder="الاسم الكامل" disabled
                                                class="form-control @error('full_name') is-invalid is-filled @enderror" />
                                            <label for="modalChildrenfull_name">الاسم الكامل</label>
                                        </div>
                                        @error('full_name')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
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
                                            <input wire:model.defer='birth_date' type="date"
                                                id="modalChildrenbirth_date" placeholder="تاريخ التولد"
                                                class="form-control @error('birth_date') is-invalid is-filled @enderror" />
                                            <label for="modalChildrenbirth_date">تاريخ التولد</label>
                                        </div>
                                        @error('birth_date')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='gender' id="modalChildrengender"
                                                class="form-control @error('gender') is-invalid is-filled @enderror">
                                                <option value="">اختر الجنس</option>
                                                <option value="ذكر">ذكر</option>
                                                <option value="أنثى">أنثى</option>
                                            </select>
                                            <label for="modalChildrengender">الجنس</label>
                                        </div>
                                        @error('gender')
                                            <small class='text-danger inputerror'>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='marital_status' id="modalChildrenmarital_status"
                                                class="form-control @error('marital_status') is-invalid is-filled @enderror">
                                                <option value="">اختر الحالة الزوجية</option>
                                                <option value="اعزب/باكر">اعزب/باكر</option>
                                                <option value="متزوج/ـة">متزوج/ـة</option>
                                            </select>
                                            <label for="modalChildrenmarital_status">الحالة الزوجية</label>
                                        </div>
                                        @error('marital_status')
                                            <small class='text-danger inputerror'>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='occupational_status'
                                                id="modalChildrenoccupational_status"
                                                class="form-control @error('occupational_status') is-invalid is-filled @enderror">
                                                <option value="">اختر الحالة الدراسية</option>
                                                <option value="طالب/ـة">طالب/ـة</option>
                                                <option value="موظف/ـة">موظف/ـة</option>
                                                <option value="كاسب/ربة بيت">كاسب/ربة بيت</option>
                                            </select>
                                            <label for="modalChildrenoccupational_status">الحالة الدراسية</label>
                                        </div>
                                        @error('occupational_status')
                                            <small class='text-danger inputerror'>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='national_id' type="text"
                                                id="modalChildrennational_id" placeholder="رقم البطاقة الوطنية"
                                                class="form-control @error('national_id') is-invalid is-filled @enderror"
                                                onkeypress="return restrictAlphabets(event)" />
                                            <label for="modalChildrennational_id">رقم البطاقة الوطنية</label>
                                        </div>
                                        @error('national_id')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-check form-check-outline">
                                            <input wire:model.defer='is_counted' type="checkbox"
                                                id="modalChildrenis_counted"
                                                class="form-check-input @error('is_counted') is-invalid @enderror">
                                            <label class="form-check-label" for="modalChildrenis_counted">هل يتم
                                                احتسابه</label>
                                        </div>
                                        @error('is_counted')
                                            <small class='text-danger inputerror'>{{ $message }}</small>
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
<!--/ Edite Children Modal -->

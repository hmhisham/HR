<!-- Add Coache Modal -->
<div wire:ignore.self class="modal fade" id="addcoacheModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">اضافة </h3>
                    <p>نافذة الأضافة </p>
                </div>
                <hr class="mt-n2">
                <form id="addcoacheModalForm" autocomplete="off">
                    <div class="row row-cols-1  ">
                        <div class="col mb-3">
                            <div Class="row">
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='name_coache' type="text" id="modalCoachename_coache"
                                            placeholder="اسم المدرب"
                                            class="form-control @error('name_coache') is-invalid is-filled @enderror" />
                                        <label for="modalCoachename_coache">اسم المدرب</label>
                                    </div>
                                    @error('name_coache')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='calculator_number' type="text"
                                            id="modalCoachecalculator_number" placeholder="رقم الحاسبة"
                                            class="form-control @error('calculator_number') is-invalid is-filled @enderror" />
                                        <label for="modalCoachecalculator_number">رقم الحاسبة</label>
                                    </div>
                                    @error('calculator_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                            <div Class="row">

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <select wire:model.defer="education" id="modalCoacheeducation" class="form-select @error('education') is-invalid is-filled @enderror">
                                            <option value="">اختر التحصيل الدراسي</option>
                                            <option value="دبلوم">دبلوم</option>
                                            <option value="بكالوريوس">بكالوريوس</option>
                                            <option value="دبلوم عالي">دبلوم عالي</option>
                                            <option value="ماجستير">ماجستير</option>
                                            <option value="دكتوراه">دكتوراه</option>
                                        </select>
                                        <label for="modalCoacheeducation">التحصيل الدراسي</label>
                                    </div>
                                    @error('education')
                                        <small class="text-danger inputerror"> {{ $message }} </small>
                                    @enderror
                                </div>


                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='phone_number' type="text"
                                            id="modalCoachephone_number" placeholder="رقم الهاتف"
                                            class="form-control @error('phone_number') is-invalid is-filled @enderror" />
                                        <label for="modalCoachephone_number">رقم الهاتف</label>
                                    </div>
                                    @error('phone_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                            <div Class="row">
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='institution' type="text" id="modalCoacheinstitution"
                                            placeholder="مؤسسة المدرب"
                                            class="form-control @error('institution') is-invalid is-filled @enderror" />
                                        <label for="modalCoacheinstitution">مؤسسة المدرب</label>
                                    </div>
                                    @error('institution')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='training_field' type="text"
                                            id="modalCoachetraining_field" placeholder="مجال التدريب"
                                            class="form-control @error('training_field') is-invalid is-filled @enderror" />
                                        <label for="modalCoachetraining_field">مجال التدريب</label>
                                    </div>
                                    @error('training_field')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='email' type="email" id="modalCoacheemail"
                                            placeholder="البريد الالكتروني"
                                            class="form-control @error('email') is-invalid is-filled @enderror" />
                                        <label for="modalCoacheemail">البريد الالكتروني</label>
                                    </div>
                                    @error('email')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                            <div Class="row">
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='notes' type="text" id="modalCoachenotes"
                                            placeholder="الملاحظات"
                                            class="form-control @error('notes') is-invalid is-filled @enderror" />
                                        <label for="modalCoachenotes">الملاحظات</label>
                                    </div>
                                    @error('notes')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="text-center col-12 demo-vertical-spacing mb-n4">
                        <button wire:click='store' wire:loading.attr="disabled" type="button"
                            class="btn btn-primary me-sm-3 me-1">اضافة فئة</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                            aria-label="Close">تجاهل</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ Add Coache Modal -->

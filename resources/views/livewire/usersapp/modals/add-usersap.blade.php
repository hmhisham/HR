<!-- Add Usersap Modal -->
<div wire:ignore.self class="modal fade" id="addusersapModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">اضافة </h3>
                    <p>نافذة الأضافة </p>
                </div>
                <hr class="mt-n2">
                <form id="addusersapModalForm" autocomplete="off">
                    <div class="row row-cols-1  ">
                        <div class="col mb-3">
                            <div Class="row">


                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='computer_number' type="text"
                                            id="modalUsersapcomputer_number" placeholder="رقم الحاسبة"
                                            class="form-control @error('computer_number') is-invalid is-filled @enderror" />
                                        <label for="modalUsersapcomputer_number">رقم الحاسبة</label>
                                    </div>
                                    @error('computer_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='name' type="text" id="modalUsersapname"
                                            placeholder="الاسم"
                                            class="form-control @error('name') is-invalid is-filled @enderror" />
                                        <label for="modalUsersapname">الاسم</label>
                                    </div>
                                    @error('name')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                            <div Class="row">
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='password' type="password" id="modalUsersappassword"
                                            placeholder="كلمة السر"
                                            class="form-control @error('password') is-invalid is-filled @enderror" />
                                        <label for="modalUsersappassword">كلمة السر</label>
                                    </div>
                                    @error('password')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='email' type="email" id="modalUsersapemail"
                                            placeholder="example@example.com"
                                            class="form-control @error('email') is-invalid is-filled @enderror" />
                                        <label for="modalUsersapemail">الايميل</label>
                                    </div>
                                    @error('email')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                            <div Class="row">
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='phone_number' type="tel"
                                            id="modalUsersapphone_number" placeholder="رقم الهاتف"
                                            pattern="07[0-9]{9}"
                                            maxlength="11"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 11)"
                                            class="form-control @error('phone_number') is-invalid is-filled @enderror" />
                                        <label for="modalUsersapphone_number">رقم الهاتف (07xxxxxxxxx)</label>
                                    </div>
                                    @error('phone_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='national_id' type="text"
                                            id="modalUsersapnational_id" placeholder="رقم البطاقة الوطنية"
                                            class="form-control @error('national_id') is-invalid is-filled @enderror" />
                                        <label for="modalUsersapnational_id">رقم البطاقة الوطنية</label>
                                    </div>
                                    @error('national_id')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <select wire:model.defer='status' id="modalUsersapstatus"
                                            class="form-select @error('status') is-invalid is-filled @enderror">
                                            <option value="">اختر الحالة</option>
                                            <option value="1">فعال</option>
                                            <option value="0">غير فعال</option>
                                        </select>
                                        <label for="modalUsersapstatus">الحالة</label>
                                    </div>
                                    @error('status')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                            <div Class="row">
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='note' type="text" id="modalUsersapnote"
                                            placeholder="الملاحظات"
                                            class="form-control @error('note') is-invalid is-filled @enderror" />
                                        <label for="modalUsersapnote">الملاحظات</label>
                                    </div>
                                    @error('note')
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
<!--/ Add Usersap Modal -->

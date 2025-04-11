<!-- Edite dispatc Modal -->
<div wire:ignore.self class="modal fade" id="editdispatcModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل</h3>
                    <p>نافذة التعديل</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="Getdispatc"
                    wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                {{-- <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حفظ البيانات...</h5> --}}

                <div wire:loading.remove>
                    <form id="editdispatcModalForm" autocomplete="off">
                        <div class="row row-cols-1">
                            <div class="col mb-3">
                                <div class="mb-3">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='full_name' type="text" id="modalEmployeefull_name"
                                            placeholder=" اسم الموظف"
                                            class="form-control @error('full_name') is-invalid is-filled @enderror"
                                            disabled />
                                        <label for="modalEmployeefull_name">اسم الموظف</label>
                                    </div>
                                    @error('full_name')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                <div class="row">

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='computer_number' type="text"
                                                id="modalEmployeecomputer_number" placeholder="رقم الحاسبة"
                                                class="form-control @error('computer_number') is-invalid is-filled @enderror"
                                                disabled />
                                            <label for="modalEmployeecomputer_number">رقم الحاسبة</label>
                                        </div>
                                        @error('computer_number')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='department' type="text"
                                                id="modalEmployeedepartment" placeholder="اسم القسم"
                                                class="form-control @error('department') is-invalid is-filled @enderror"
                                                disabled />
                                            <label for="modalEmployeedepartment">اسم القسم </label>
                                        </div>
                                        @error('department')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>

                                <div Class="row">

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='country_status' id="modalJobleaverscountry_status"
                                                class="form-select @error('country_status') is-invalid is-filled @enderror">
                                                <option value="" disabled selected>اختر نوع الايفاد</option>
                                                <option value=""></option>
                                                <option value="داخل العراق">داخل العراق</option>
                                                <option value="خارج العراق">خارج العراق</option>

                                            </select>
                                            <label for="modalJobleaverscountry_status">داخل او خارج</label>
                                        </div>
                                        @error('country_status')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='dispatch_subject' type="text"
                                                id="modalDispatchdispatch_subject" placeholder="موضوع الايفاد"
                                                class="form-control @error('dispatch_subject') is-invalid is-filled @enderror" />
                                            <label for="modalDispatchdispatch_subject">موضوع الايفاد</label>
                                        </div>
                                        @error('dispatch_subject')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='funding_agency' type="text"
                                                id="modalDispatchfunding_agency" placeholder="الجهة الممولة"
                                                class="form-control @error('funding_agency') is-invalid is-filled @enderror" />
                                            <label for="modalDispatchfunding_agency">الجهة الممولة</label>
                                        </div>
                                        @error('funding_agency')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='dispatch_location' type="text"
                                                id="modaldispatcdispatch_location" placeholder="مكان الايفاد"
                                                class="form-control @error('dispatch_location') is-invalid is-filled @enderror" />
                                            <label for="modaldispatcdispatch_location">مكان الايفاد</label>
                                        </div>
                                        @error('dispatch_location')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='resident_agency' type="text"
                                                id="modaldispatcresident_agency" placeholder="الجهة المقيمة للدولة"
                                                class="form-control @error('resident_agency') is-invalid is-filled @enderror" />
                                            <label for="modaldispatcresident_agency">الجهة المقيمة للدولة</label>
                                        </div>
                                        @error('resident_agency')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='travel_date' type="date"
                                                id="modaldispatctravel_date" placeholder="تاريخ السفر"
                                                class="form-control @error('travel_date') is-invalid is-filled @enderror" />
                                            <label for="modaldispatctravel_date">تاريخ السفر</label>
                                        </div>
                                        @error('travel_date')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='travel_days' type="text"
                                                id="modaldispatctravel_days" placeholder="عدد أيام السفر"
                                                class="form-control @error('travel_days') is-invalid is-filled @enderror" />
                                            <label for="modaldispatctravel_days">عدد أيام السفر</label>
                                        </div>
                                        @error('travel_days')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='actual_dispatch_days' type="text"
                                                id="modaldispatcactual_dispatch_days"
                                                placeholder="عدد أيام الايفاد الفعلي"
                                                class="form-control @error('actual_dispatch_days') is-invalid is-filled @enderror" />
                                            <label for="modaldispatcactual_dispatch_days">عدد أيام الايفاد
                                                الفعلي</label>
                                        </div>
                                        @error('actual_dispatch_days')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='start_date' type="date"
                                                id="modaldispatcstart_date" placeholder="تاريخ المباشرة"
                                                class="form-control @error('start_date') is-invalid is-filled @enderror" />
                                            <label for="modaldispatcstart_date">تاريخ المباشرة</label>
                                        </div>
                                        @error('start_date')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='ministerial_order_number' type="text"
                                                id="modaldispatcministerial_order_number"
                                                placeholder="رقم الأمر الوزاري"
                                                class="form-control @error('ministerial_order_number') is-invalid is-filled @enderror" />
                                            <label for="modaldispatcministerial_order_number">رقم الأمر الوزاري</label>
                                        </div>
                                        @error('ministerial_order_number')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='ministerial_order_date' type="date"
                                                id="modaldispatcministerial_order_date"
                                                placeholder="تاريخ الأمر الوزاري"
                                                class="form-control @error('ministerial_order_date') is-invalid is-filled @enderror" />
                                            <label for="modaldispatcministerial_order_date">تاريخ الأمر الوزاري</label>
                                        </div>
                                        @error('ministerial_order_date')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='notes' type="text" id="modaldispatcnotes"
                                                placeholder="الملاحظات"
                                                class="form-control @error('notes') is-invalid is-filled @enderror" />
                                            <label for="modaldispatcnotes">الملاحظات</label>
                                        </div>
                                        @error('notes')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

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
<!--/ Edite dispatc Modal -->

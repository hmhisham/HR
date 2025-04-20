<!-- Add dispatc Modal -->
<div wire:ignore.self class="modal fade" id="adddispatcModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">اضافة </h3>
                    <p>نافذة الأضافة </p>
                </div>
                <hr class="mt-n2">
                <form id="adddispatcModalForm" autocomplete="off">
                    <div class="row row-cols-1  ">
                        <div class="col mb-3">
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <div class="form-floating form-floating-outline @error('worker') is-invalid is-filled @enderror"
                                        style="width: 100%">
                                        <select wire:model='worker' id="worker" class="form-select"
                                            placeholder='حدد العملية'>
                                            <option value=""></option>
                                            @foreach ($workers as $worker)
                                                <option value="{{ $worker->id }}">{{ $worker->full_name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="worker">حدد الموظف</label>
                                    </div>
                                    @error('worker')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-4 col-6">
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

                                <div class="mb-3 col-6">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='department' type="text" id="modalEmployeedepartment"
                                            placeholder="اسم القسم"
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
                                            id="modalDispatchdispatch_location" placeholder="مكان الايفاد"
                                            class="form-control @error('dispatch_location') is-invalid is-filled @enderror" />
                                        <label for="modalDispatchdispatch_location">مكان الايفاد</label>
                                    </div>
                                    @error('dispatch_location')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='resident_agency' type="text"
                                            id="modalDispatchresident_agency" placeholder="الجهة المقيمة للدولة"
                                            class="form-control @error('resident_agency') is-invalid is-filled @enderror" />
                                        <label for="modalDispatchresident_agency">الجهة المقيمة للدولة</label>
                                    </div>
                                    @error('resident_agency')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='travel_date' type="date"
                                            id="modalDispatchtravel_date" placeholder="تاريخ السفر"
                                            class="form-control @error('travel_date') is-invalid is-filled @enderror" />
                                        <label for="modalDispatchtravel_date">تاريخ السفر</label>
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
                                            id="modalDispatchtravel_days" placeholder="عدد أيام السفر"
                                            class="form-control @error('travel_days') is-invalid is-filled @enderror" />
                                        <label for="modalDispatchtravel_days">عدد أيام السفر</label>
                                    </div>
                                    @error('travel_days')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='actual_dispatch_days' type="text"
                                            id="modalDispatchactual_dispatch_days"
                                            placeholder="عدد أيام الايفاد الفعلي"
                                            class="form-control @error('actual_dispatch_days') is-invalid is-filled @enderror" />
                                        <label for="modalDispatchactual_dispatch_days">عدد أيام الايفاد الفعلي</label>
                                    </div>
                                    @error('actual_dispatch_days')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='start_date' type="date"
                                            id="modalDispatchstart_date" placeholder="تاريخ المباشرة"
                                            class="form-control @error('start_date') is-invalid is-filled @enderror" />
                                        <label for="modalDispatchstart_date">تاريخ المباشرة</label>
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
                                            id="modalDispatchministerial_order_number" placeholder="رقم الأمر الوزاري"
                                            class="form-control @error('ministerial_order_number') is-invalid is-filled @enderror" />
                                        <label for="modalDispatchministerial_order_number">رقم الأمر الوزاري</label>
                                    </div>
                                    @error('ministerial_order_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='ministerial_order_date' type="date"
                                            id="modalDispatchministerial_order_date" placeholder="تاريخ الأمر الوزاري"
                                            class="form-control @error('ministerial_order_date') is-invalid is-filled @enderror" />
                                        <label for="modalDispatchministerial_order_date">تاريخ الأمر الوزاري</label>
                                    </div>
                                    @error('ministerial_order_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='notes' type="text" id="modalDispatchnotes"
                                            placeholder="الملاحظات"
                                            class="form-control @error('notes') is-invalid is-filled @enderror" />
                                        <label for="modalDispatchnotes">الملاحظات</label>
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
                            class="btn btn-primary me-sm-3 me-1">اضافة</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                            aria-label="Close">تجاهل</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ Add dispatc Modal -->

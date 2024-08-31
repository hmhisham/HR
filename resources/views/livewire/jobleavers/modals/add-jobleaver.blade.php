<!-- Add Jobleaver Modal -->
<div wire:ignore.self class="modal fade" id="addjobleaverModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">اضافة </h3>
                    <p>نافذة الأضافة </p>
                </div>
                <hr class="mt-n2">
                <form id="addjobleaverModalForm" autocomplete="off">
                    <div class="row row-cols-1  ">
                        <div class="col mb-3">
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <div class="form-floating form-floating-outline @error('worker') is-invalid is-filled @enderror" style="width: 100%">
                                        <select wire:model='worker' id="worker" class="form-select" placeholder='حدد العملية'>
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
                                        <input wire:model.defer='calculator_number' type="text" id="modalEmployeecalculator_number" placeholder="رقم الحاسبة" class="form-control @error('calculator_number') is-invalid is-filled @enderror" disabled />
                                        <label for="modalEmployeecalculator_number">رقم الحاسبة</label>
                                    </div>
                                    @error('calculator_number')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col-6">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='department' type="text" id="modalEmployeedepartment" placeholder="اسم القسم" class="form-control @error('department') is-invalid is-filled @enderror" disabled />
                                        <label for="modalEmployeedepartment">اسم القسم  </label>
                                    </div>
                                    @error('department')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                            <div Class="row">

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <select wire:model.defer='job_leaving_type' id="modalJobleaversjob_leaving_type"
                                                class="form-select @error('job_leaving_type') is-invalid is-filled @enderror">
                                            <option value="" disabled selected>اختر نوع ترك العمل</option>
                                            <option value="استقالة">استقالة</option>
                                            <option value="انهاء خدمة">انهاء خدمة</option>
                                            <option value="مفصول سياسي">مفصول سياسي</option>
                                            <option value="تقاعد">تقاعد</option>
                                            <option value="تارك العمل">تارك العمل</option>
                                        </select>
                                        <label for="modalJobleaversjob_leaving_type">نوع ترك العمل</label>
                                    </div>
                                    @error('job_leaving_type')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='issuing_authority' type="text"
                                            id="modalJobleaversissuing_authority" placeholder="جهة اصدار الكتاب"
                                            class="form-control @error('issuing_authority') is-invalid is-filled @enderror" />
                                        <label for="modalJobleaversissuing_authority">جهة اصدار الكتاب</label>
                                    </div>
                                    @error('issuing_authority')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='appointment_date' type="date"
                                            id="modalJobleaversappointment_date" placeholder="تاريخ التعيين"
                                            class="form-control @error('appointment_date') is-invalid is-filled @enderror" />
                                        <label for="modalJobleaversappointment_date">تاريخ التعيين</label>
                                    </div>
                                    @error('appointment_date')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                            <div Class="row">
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='disconnection_date' type="date"
                                            id="modalJobleaversdisconnection_date" placeholder="تاريخ الانقطاع"
                                            class="form-control @error('disconnection_date') is-invalid is-filled @enderror" />
                                        <label for="modalJobleaversdisconnection_date">تاريخ الانقطاع</label>
                                    </div>
                                    @error('disconnection_date')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='return_date' type="date"
                                            id="modalJobleaversreturn_date" placeholder="تاريخ العودة"
                                            class="form-control @error('return_date') is-invalid is-filled @enderror" />
                                        <label for="modalJobleaversreturn_date">تاريخ العودة</label>
                                    </div>
                                    @error('return_date')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='disconnection_duration' type="text"
                                            id="modalJobleaversdisconnection_duration" placeholder="مدة الانقطاع"
                                            class="form-control @error('disconnection_duration') is-invalid is-filled @enderror" />
                                        <label for="modalJobleaversdisconnection_duration">مدة الانقطاع</label>
                                    </div>
                                    @error('disconnection_duration')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                            <div Class="row">
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='ministerial_order_number' type="text"
                                            id="modalJobleaversministerial_order_number" placeholder="رقم الامر الوزاري"
                                            class="form-control @error('ministerial_order_number') is-invalid is-filled @enderror" />
                                        <label for="modalJobleaversministerial_order_number">رقم الامر الوزاري</label>
                                    </div>
                                    @error('ministerial_order_number')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='ministerial_order_date' type="date"
                                            id="modalJobleaversministerial_order_date" placeholder="تاريخ الامر الوزاري"
                                            class="form-control @error('ministerial_order_date') is-invalid is-filled @enderror" />
                                        <label for="modalJobleaversministerial_order_date">تاريخ الامر الوزاري</label>
                                    </div>
                                    @error('ministerial_order_date')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='added_service_letter_number' type="text"
                                            id="modalJobleaversadded_service_letter_number"
                                            placeholder="رقم كتاب الخدمة المضافه"
                                            class="form-control @error('added_service_letter_number') is-invalid is-filled @enderror" />
                                        <label for="modalJobleaversadded_service_letter_number">رقم كتاب الخدمة
                                            المضافه</label>
                                    </div>
                                    @error('added_service_letter_number')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                            <div Class="row">
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='added_service_letter_date' type="date"
                                            id="modalJobleaversadded_service_letter_date"
                                            placeholder="تاريخ كتاب الخدمه المضافة"
                                            class="form-control @error('added_service_letter_date') is-invalid is-filled @enderror" />
                                        <label for="modalJobleaversadded_service_letter_date">تاريخ كتاب الخدمه
                                            المضافة</label>
                                    </div>
                                    @error('added_service_letter_date')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <select wire:model.defer='added_service' id="modalJobleaversadded_service"
                                                class="form-select @error('added_service') is-invalid is-filled @enderror">
                                            <option value="" disabled selected>اختر الحالة</option>
                                            <option value="مضافة">مضافة</option>
                                            <option value="غير مضافة">غير مضافة</option>
                                        </select>
                                        <label for="modalJobleaversadded_service">الحالة</label>
                                    </div>
                                    @error('added_service')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='notes' type="text" id="modalJobleaversnotes"
                                        placeholder="الملاحظات"
                                        class="form-control @error('notes') is-invalid is-filled @enderror" />
                                    <label for="modalJobleaversnotes">الملاحظات</label>
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
<!--/ Add Jobleaver Modal -->

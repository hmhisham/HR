<!-- Edite Service Modal -->
<div wire:ignore.self class="modal fade" id="editserviceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل الخدمات</h3>
                    <p>نافذة التعديل</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetService"
                    wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حفظ البيانات...</h5>

                <div wire:loading.remove>
                    <form id="editServiceModalForm" autocomplete="off">
                        <div Class="row bg-label-primary">
                            <div class="col">
                                <label class="border-bottom-2 text-center mb-2 w-100">اسم الموظف</label>
                                <div wire:loading wire:target='AddServiceModal'
                                    wire:loading.class="d-flex justify-content-center">
                                    <span class="mdi mdi-loading mdi-spin mdi-24px"></span>
                                </div>
                                <div wire:loading.remove wire:target='AddServiceModal' class="text-center">
                                    {{ $Worker->full_name ?? '' }}</div>
                            </div>

                            <div class="col">
                                <label class="border-bottom-2 text-center mb-2 w-100">رقم الحاسبة</label>
                                <div wire:loading wire:target='AddServiceModal'
                                    wire:loading.class="d-flex justify-content-center">
                                    <span class="mdi mdi-loading mdi-spin mdi-24px"></span>
                                </div>
                                <div wire:loading.remove wire:target='AddServiceModal' class="text-center">
                                    {{ $Worker->computer_number ?? '' }}</div>
                            </div>

                            <div class="col">
                                <label class="border-bottom-2 text-center mb-2 w-100">تاريخ المباشرة</label>
                                <div wire:loading wire:target='AddServiceModal'
                                    wire:loading.class="d-flex justify-content-center">
                                    <span class="mdi mdi-loading mdi-spin mdi-24px"></span>
                                </div>
                                <div wire:loading.remove wire:target='AddServiceModal' class="text-center">
                                    {{ $Worker->start_work_date ?? '' }}</div>
                            </div>
                        </div>

                        <hr class="">
                        <div Class="row">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <select wire:model.defer='service_type' id="modalserviceservice_type"
                                        class="form-select @error('service_type') is-invalid is-filled @enderror">
                                        <option value="">اختر الخدمة</option>
                                        <option value="قبل الاعادة">قبل الاعادة</option>
                                        <option value="فصل سياسي">فصل سياسي</option>
                                        <option value="اجر يومي">اجر يومي</option>
                                        <option value="عقد">عقد</option>
                                        <option value="محاماة">محاماة</option>
                                        <option value="جهادية">جهادية</option>
                                        <option value="صحفية">صحفية</option>
                                        <option value="عمالية">عمالية</option>
                                        <option value="عضوية مجالس">عضوية مجالس</option>
                                        <option value="عسكرية">عسكرية</option>
                                    </select>
                                    <label for="modalserviceservice_type">اسم الخدمة</label>
                                </div>
                                @error('service_type')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>

                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <select wire:model.defer='purpose' id="modalservicepurpose"
                                        class="form-select @error('purpose') is-invalid is-filled @enderror">
                                        <option value="">اختر الخدمة</option>
                                        <option value="التقاعد">التقاعد</option>
                                        <option value="لكافة الاغراض">لكافة الاغراض</option>
                                    </select>
                                    <label for="modalservicepurpose">الغرض من الاضافة</label>
                                </div>
                                @error('purpose')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>

                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='administrative_order_number' type="text"
                                        id="modalserviceadministrative_order_number" placeholder="رقم امر الاداري"
                                        class="form-control @error('administrative_order_number') is-invalid is-filled @enderror" />
                                    <label for="modalserviceadministrative_order_number">رقم امر الاداري</label>
                                </div>
                                @error('administrative_order_number')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>

                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='administrative_order_date' type="text"
                                        id="editadministrative_order_date" autocomplete="off" readonly
                                        placeholder="يوم-شهر-سنة"
                                        class="form-control @error('administrative_order_date') is-invalid is-filled @enderror" />
                                    <label for="flatpickr-date">تاريخ الامر الاداري</label>
                                </div>
                                @error('administrative_order_date')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>
                        <div Class="row">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='from_date' type="text" id="editfrom_date"
                                        autocomplete="off" readonly placeholder="يوم-شهر-سنة"
                                        class="form-control @error('from_date') is-invalid is-filled @enderror" />
                                    <label for="flatpickr-date">من تاريخ</label>
                                </div>
                                @error('from_date')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>

                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='to_date' type="text" id="editto_date"
                                        autocomplete="off" readonly placeholder="يوم-شهر-سنة"
                                        class="form-control @error('to_date') is-invalid is-filled @enderror" />
                                    <label for="flatpickr-date">الى تاريخ</label>
                                </div>
                                @error('to_date')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>

                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='in_service_salary' type="text"
                                        id="modalservicein_service_salary" placeholder="الراتب خلال المدة"
                                        class="form-control @error('in_service_salary') is-invalid is-filled @enderror" />
                                    <label for="modalservicein_service_salary">الراتب خلال المدة</label>
                                </div>
                                @error('in_service_salary')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>

                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <select wire:model.defer='certificates_id' id="editServicecertificates_id"
                                        class="form-select @error('certificates_id') is-invalid is-filled @enderror">
                                        <option value=""></option>
                                        @foreach ($certificates as $certificate)
                                            <option value="{{ $certificate->id }}">
                                                {{ $certificate->certificates_name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="modalServicecertificates_id">التحصيل الدراسي</label>
                                </div>
                                @error('certificates_id')
                                    <small class='text-danger inputerror'>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div Class="row">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model="days" type="text" readonly placeholder="عدد الأيام"
                                        class="form-control" disabled />
                                    <label for="days">الأيام</label>
                                </div>
                            </div>
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model="months" type="text" readonly placeholder="عدد الأشهر"
                                        class="form-control" disabled />
                                    <label for="months">الأشهر</label>
                                </div>
                            </div>
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model="years" type="text" readonly placeholder="عدد السنوات"
                                        class="form-control" disabled />
                                    <label for="years">السنوات</label>
                                </div>
                            </div>
                        </div>
                        <div Class="row">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='calculation_order_number' type="text"
                                        id="modalservicecalculation_order_number" placeholder="رقم امر الاحتساب"
                                        class="form-control @error('calculation_order_number') is-invalid is-filled @enderror" />
                                    <label for="modalservicecalculation_order_number">رقم امر الاحتساب</label>
                                </div>
                                @error('calculation_order_number')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>

                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='calculation_order_date' type="text"
                                        id="editcalculation_order_date" autocomplete="off" readonly
                                        placeholder="يوم-شهر-سنة"
                                        class="form-control @error('calculation_order_date') is-invalid is-filled @enderror" />
                                    <label for="flatpickr-date">تاريخ امر الاحتساب</label>
                                </div>
                                @error('calculation_order_date')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>

                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <select wire:model.defer='job_title_deletion' id="editServicejob_title_deletion"
                                        class="form-select @error('job_title_deletion') is-invalid is-filled @enderror">
                                        <option value=""></option>
                                        @foreach ($jobtitles as $jobtitle)
                                            <option value="{{ $jobtitle->id }}">
                                                {{ $jobtitle->jobtitles_name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="modalServicejob_title_deletion">العنوان الوظيفي الحذف</label>
                                </div>
                                @error('job_title_deletion')
                                    <small class='text-danger inputerror'>{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <select wire:model.defer='job_title_introduction'
                                        id="editServicejob_title_introduction"
                                        class="form-select @error('job_title_introduction') is-invalid is-filled @enderror">
                                        <option value=""></option>
                                        @foreach ($jobtitles as $jobtitle)
                                            <option value="{{ $jobtitle->id }}">
                                                {{ $jobtitle->jobtitles_name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="modalServicejob_title_introduction">العنوان الوظيفي
                                        الاستحداث</label>
                                </div>
                                @error('job_title_introduction')
                                    <small class='text-danger inputerror'>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div Class="row">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='notes' type="text" id="modalServicenotes"
                                        placeholder="ملاحظات"
                                        class="form-control @error('notes') is-invalid is-filled @enderror" />
                                    <label for="modalServicenotes">ملاحظات</label>
                                </div>
                                @error('notes')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>
                        <hr class="my-0">
                        <div class="text-center col-12 demo-vertical-spacing mb-n4">
                            <button wire:click='update' wire:loading.attr="disabled" type="button"
                                class="btn btn-primary me-sm-3 me-1">تعديل</button>
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                aria-label="Close">تجاهل</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Edite Service Modal -->

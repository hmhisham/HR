<!-- Add Propert Modal -->
<div wire:ignore.self class="modal fade" id="addpropertModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">اضافة </h3>
                    <p>نافذة الأضافة </p>
                </div>
                <hr class="mt-n2">
                <form id="addpropertModalForm" autocomplete="off">
                    <div class="row row-cols-1  ">
                        <div class="col mb-3">

                            <div Class="row bg-label-primary" style="border-radius: 15px;">
                                <div class="col">
                                    <label class="border-bottom-2 text-center mb-2 w-100"
                                        style="border-bottom: 2px solid">رقم المقاطعة </label>
                                    <div wire:loading wire:target='AddPropertModalShow'
                                        wire:loading.class="d-flex justify-content-center">
                                        <span class="mdi mdi-loading mdi-spin mdi-24px"></span>
                                    </div>
                                    <div wire:loading.remove wire:target='AddPropertModalShow' class="text-center">
                                        {{ $Bond->Getboycott ? $Bond->Getboycott->boycott_number . ' - ' . $Bond->Getboycott->boycott_name : '' }}
                                    </div>
                                </div>

                                <div class="col">
                                    <label class="border-bottom-2 text-center mb-2 w-100"
                                        style="border-bottom: 2px solid">رقم القطعة </label>
                                    <div wire:loading wire:target='AddPropertModalShow'
                                        wire:loading.class="d-flex justify-content-center">
                                        <span class="mdi mdi-loading mdi-spin mdi-24px"></span>
                                    </div>
                                    <div wire:loading.remove wire:target='AddPropertModalShow' class="text-center">
                                        {{ $Bond->part_number ?? '' }}</div>
                                </div>

                                <div class="col">
                                    <label class="border-bottom-2 text-center mb-2 w-100"
                                        style="border-bottom: 2px solid">رقم العقار </label>
                                    <div wire:loading wire:target='AddPropertModalShow'
                                        wire:loading.class="d-flex justify-content-center">
                                        <span class="mdi mdi-loading mdi-spin mdi-24px"></span>
                                    </div>
                                    <div wire:loading.remove wire:target='AddPropertModalShow' class="text-center">
                                        {{ $Bond->property_number }}</div>
                                </div>

                            </div>
                            <hr class="">
                            <div class="row">
                                <!-- الاسم الكامل -->
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <select wire:model.defer="worker_id" id="addPropertworker_id"
                                            class="form-select @error('worker_id') is-invalid is-filled @enderror border border-primary"
                                            style="width: 70%; height: 40px;">
                                            <option value="" disabled selected>اختر موظفاً</option>
                                            @foreach ($workers as $worker)
                                                <option value="{{ $worker->id }}">{{ $worker->full_name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="addPropertworker_id">الاسم الكامل</label>
                                    </div>
                                    @error('worker_id')
                                        <small class="text-danger inputerror">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- الرقم الوظيفي -->
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <div class="form-control   d-flex align-items-center justify-content-center p-3"
                                            style="color: #007bff; border: 1px solid #007bff;">
                                            <span class="fw-bold">{{ $calculator_number ?? '' }}</span>
                                        </div>
                                        <label for="addPropertcalculator_number">الرقم الوظيفي</label>
                                    </div>
                                </div>
                                <!-- القسم -->
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <div class="form-control   d-flex align-items-center justify-content-center p-3"
                                            style="color: #007bff; border: 1px solid #007bff;">
                                            <span class="fw-bold">{{ $department_name ?? '' }}</span>
                                        </div>
                                        <label for="addPropertdepartment_name">القسم</label>
                                    </div>
                                </div>
                                <!-- الأيميل -->
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <div class="form-control   d-flex align-items-center justify-content-center p-3"
                                            style="color: #007bff; border: 1px solid #007bff;">
                                            <span class="fw-bold">{{ $email ?? '' }}</span>
                                        </div>
                                        <label for="addPropertemail">الأيميل</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model='from_date' wire:change="updateToDate($event.target.value)"
                                            type="date" id="modalPropertfrom_date" placeholder="من تاريخ"
                                            class="form-control @error('from_date') is-invalid is-filled @enderror" />
                                        <label for="modalPropertfrom_date">من تاريخ</label>
                                    </div>
                                    @error('from_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model="to_date" type="date" id="modalPropertto_date"
                                            placeholder="الى تاريخ"
                                            class="form-control @error('to_date') is-invalid is-filled @enderror" />
                                        <label for="modalPropertto_date">الى تاريخ</label>
                                    </div>
                                    @error('to_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model='months_count' type="text" id="modalPropertmonths_count"
                                            placeholder="عدد الاشهر"
                                            class="form-control @error('months_count') is-invalid is-filled @enderror"
                                            readonly />
                                        <label for="modalPropertmonths_count">عدد الاشهر</label>
                                    </div>
                                    @error('months_count')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.lazy='total_amount' type="text"
                                            id="modalProperttotal_amount" placeholder="المبلغ الكلي"
                                            class="form-control @error('total_amount') is-invalid is-filled @enderror"
                                            onkeypress="return onlyNumberKey(event)"
                                            oninput="formatWithCommas(this)" />
                                        <label for="modalProperttotal_amount">المبلغ الكلي</label>
                                    </div>
                                    @error('total_amount')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>


                            </div>

                            <div Class="row">
    <!-- المبلغ الشهري -->
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='monthly_amount' type="text"
                                            id="modalPropertmonthly_amount" placeholder="المبلغ الشهري" readonly
                                            class="form-control @error('monthly_amount') is-invalid is-filled @enderror" />
                                        <label for="modalPropertmonthly_amount">المبلغ الشهري</label>
                                    </div>
                                    @error('monthly_amount')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='paid_amount' type="text"
                                            id="modalPropertpaid_amount" placeholder="مجموع المسدد"
                                            class="form-control @error('paid_amount') is-invalid is-filled @enderror"
                                            onkeypress="return onlyNumberKey(event)"
                                            oninput="formatWithCommas(this)" />
                                        <label for="modalPropertpaid_amount">مجموع المسدد</label>
                                    </div>
                                    @error('paid_amount')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>


                                <style>
                                    /* تغيير لون النص لخيار محجوز */
                                    select option[value="محجوز"] {
                                        color: red; /* اللون الذي ترغب به */
                                    }
                                </style>

                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const selectElement = document.getElementById('modalPropertproperty_status');

                                        selectElement.addEventListener('change', function() {
                                            if (selectElement.value === 'محجوز') {
                                                selectElement.style.color = 'red';
                                            } else {
                                                selectElement.style.color = '';  
                                            }
                                        });
                                    });
                                </script>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <select wire:model.defer='property_status' id="modalPropertproperty_status"
                                            class="form-control @error('property_status') is-invalid is-filled @enderror"
                                            style="width: 100%;">
                                            <option value="محجوز">محجوز</option>
                                            <option value="متاح">متاح</option>
                                        </select>
                                        <label for="modalPropertproperty_status">حالة العقار</label>
                                    </div>
                                    @error('property_status')
                                        <small class='text-danger inputerror'>{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="mb-3 col">
                                    <div class="form-check form-switch">
                                        <input wire:model.defer="status" class="form-check-input @error('status') is-invalid is-filled @enderror" type="checkbox" id="modalPropertstatus">
                                        <label class="form-check-label" for="modalPropertstatus">حالة العقار</label>
                                    </div>
                                    @error('status')
                                        <small class='text-danger inputerror'>{{ $message }}</small>
                                    @enderror
                                </div>

                                 <div class="mb-3 col">
                                    <div class="form-check form-switch">
                                        <input wire:model.defer="notifications" class="form-check-input @error('notifications') is-invalid is-filled @enderror" type="checkbox" id="modalPropertnotifications">
                                        <label class="form-check-label" for="modalPropertnotifications">الاشعارات</label>
                                    </div>
                                    @error('notifications')
                                        <small class='text-danger inputerror'>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div Class="row">
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='notes' type="text" id="modalPropertnotes"
                                            placeholder="ملاحظات"
                                            class="form-control @error('notes') is-invalid is-filled @enderror" />
                                        <label for="modalPropertnotes">ملاحظات</label>
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
<!--/ Add Propert Modal -->

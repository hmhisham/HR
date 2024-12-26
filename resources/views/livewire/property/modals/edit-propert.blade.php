<!-- Edite Propert Modal -->
<div wire:ignore.self class="modal fade" id="editpropertModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل \ الأملاك</h3>
                    <p>نافذة التعديل</p>
                </div>
                <hr class="mt-n2" wire:loading.remove>
                <h5 wire:loading wire:target="GetPropert2"
                    wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
          {{-- <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حفظ البيانات...</h5> --}}

                <div wire:loading.remove>
                    <form id="editPropertModalForm" autocomplete="off">
                        <div class="row row-cols-1">
                            <div class="col mb-3">
                                <div class="row">
                                    <!-- الاسم الكامل -->
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model='full_name' type="text" id="modalPropertfull_name"
                                                placeholder="الاسم الكامل"
                                                class="form-control @error('full_name') is-invalid is-filled @enderror" />
                                            <label for="modalPropertfull_name">الاسم الكامل</label>
                                        </div>
                                        @error('full_name')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model='calculator_number' type="text"
                                                id="modalPropertcalculator_number" placeholder="رقم الحاسبة"
                                                class="form-control @error('calculator_number') is-invalid is-filled @enderror" />
                                            <label for="modalPropertcalculator_number">رقم الحاسبة</label>
                                        </div>
                                        @error('calculator_number')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model='department_name' type="text"
                                                id="modalPropertdepartment_name" placeholder="القسم"
                                                class="form-control @error('department_name') is-invalid is-filled @enderror" />
                                            <label for="modalPropertdepartment_name">القسم</label>
                                        </div>
                                        @error('department_name')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model='email' type="text" id="modalPropertemail"
                                                placeholder="البريد"
                                                class="form-control @error('email') is-invalid is-filled @enderror" />
                                            <label for="modalPropertemail">البريد</label>
                                        </div>
                                        @error('email')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model='from_date'
                                                wire:change="updateToDate($event.target.value)" type="text"
                                                id="modalPropertfrom_date" placeholder="من تاريخ"
                                                class="form-control @error('from_date') is-invalid is-filled @enderror" />
                                            <label for="modalPropertfrom_date">من تاريخ</label>
                                        </div>
                                        @error('from_date')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model="to_date" type="text" id="modalPropertto_date"
                                                placeholder="الى تاريخ"
                                                class="form-control @error('to_date') is-invalid is-filled @enderror"
                                                readonly />
                                            <label for="modalPropertto_date">الى تاريخ</label>
                                        </div>
                                        @error('to_date')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model='months_count' type="text"
                                                id="modalPropertmonths_count" placeholder="عدد الاشهر"
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
                                            <input wire:model='total_amount' type="text"
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
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='total_paid_amount' type="text"
                                                id="modalProperttotal_paid_amount" placeholder="مجموع المتبقي"
                                                class="form-control @error('total_paid_amount') is-invalid is-filled @enderror"
                                                onkeypress="return onlyNumberKey(event)"
                                                oninput="formatWithCommas(this)" />
                                            <label for="modalProperttotal_paid_amount">مجموع المتبقي</label>
                                        </div>
                                        @error('total_paid_amount')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer="property_status"
                                                id="modalPropertproperty_status"
                                                class="form-control @error('property_status') is-invalid is-filled @enderror"
                                                style="width: 100%;" required>
                                                <option value="" disabled selected>اختر حالة العقار</option>
                                                <option value="محجوز">محجوز</option>
                                                <option value="رفع حجز">رفع حجز</option>
                                            </select>
                                            <label for="modalPropertproperty_status">حالة العقار</label>
                                        </div>
                                        @error('property_status')
                                            <small class="text-danger inputerror">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- حالة العقار والإشعارات في المنتصف -->
                                    <div class="d-flex justify-content-center mb-3 col-12">
                                        {{-- <div class="form-check form-switch me-5">
                                            <input wire:model.defer="status"
                                                class="form-check-input @error('status') is-invalid is-filled @enderror"
                                                type="checkbox" id="modalPropertstatus">
                                            <label class="form-check-label" for="modalPropertstatus">الحالة</label>
                                        </div> --}}
                                        <div class="mb-3 col-12 form-check form-switch">
                                            <input wire:model.defer="notifications"
                                                class="form-check-input @error('notifications') is-invalid is-filled @enderror"
                                                type="checkbox" id="modalPropertnotifications">
                                            <label class="form-check-label"
                                                for="modalPropertnotifications">الإشعارات</label>
                                        </div>
                                    </div>
                                    <!-- الملاحظات -->
                                    <div class="mb-3 col-12">
                                        <div class="form-floating form-floating-outline">
                                            <textarea wire:model.defer='notes' id="modalPropertnotes" placeholder="ملاحظات"
                                                class="form-control @error('notes') is-invalid is-filled @enderror" style="height: 150px;"></textarea>
                                            <label for="modalPropertnotes">ملاحظات</label>
                                        </div>
                                        @error('notes')
                                            <small class='text-danger inputerror'>{{ $message }}</small>
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
<!--/ Edite Propert Modal -->

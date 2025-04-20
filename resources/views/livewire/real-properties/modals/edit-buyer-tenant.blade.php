<!-- Edite Realitie Modal -->
<div wire:ignore.self class="modal fade" id="editBuyerTenantModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل مشتري أو مستأجر</h3>
                </div>

                <hr class="mt-n2">

                <h4 wire:loading wire:target="GetRealProperty" wire:loading.class="d-flex justify-content-center">جار
                    معالجة البيانات...</h4>
                <h4 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center">
                    جار حفظ البيانات...</h4>

                <div wire:loading.remove wire:target="update, GetRealProperty">
                    <div class="alert alert-outline-secondary pb-0 border-2" role="alert">
                        <h5 class="d-flex justify-content-around">
                            <div>
                                <strong>رقم واسم المقاطعة : </strong>
                                <span class="text-danger">
                                    {{ $province_number ?? '' }} -
                                    {{ $province_name ?? '' }}
                                </span>
                            </div>
                            <div>
                                <strong>رقم القطعة : </strong>
                                <span class="text-danger">{{ $plot_number ?? '' }}</span>
                            </div>
                            <div>
                                <strong>رقم العقار : </strong>
                                <span class="text-danger">{{ $property_number ?? '' }}</span>
                            </div>
                        </h5>
                    </div>

                    <form id="editRealitieModalForm" autocomplete="off">
                        <div class="row mb-3">
                            <div class="col-md mb-md-0 mb-2">
                                <div
                                    class="form-check custom-option custom-option-icon {{ $chooseBuyerTenant == 'buyer' ? 'checked' : '' }}">
                                    <label class="form-check-label custom-option-content" for="customRadioIcon1">
                                        <span class="custom-option-body">
                                            <span class="custom-option-title">مشتري</span>
                                            <small>سيتم تحديد اسم موظف</small>
                                        </span>
                                        <input wire:click='chooseBuyerTenant("buyer")' name="customRadioIcon-01"
                                            class="form-check-input" type="radio" value="buyer" id="customRadioIcon1"
                                            {{ $chooseBuyerTenant == 'buyer' ? 'checked' : '' }}>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md mb-md-0 mb-2">
                                <div
                                    class="form-check custom-option custom-option-icon {{ $chooseBuyerTenant == 'tenant' ? 'checked' : '' }}">
                                    <label class="form-check-label custom-option-content" for="customRadioIcon2">
                                        <span class="custom-option-body">
                                            <span class="custom-option-title">مستأجر</span>
                                            <small>سيتم تحديد اسم مواطن</small>
                                        </span>
                                        <input wire:click='chooseBuyerTenant("tenant")' name="customRadioIcon-01"
                                            class="form-check-input" type="radio" value="tenant" id="customRadioIcon2"
                                            {{ $chooseBuyerTenant == 'tenant' ? 'checked' : '' }}>
                                    </label>
                                </div>
                            </div>
                        </div>

                        @if ($buyer_tenant_type)
                            {{-- المشتري أو المستأجر --}}
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='buyer_tenant_name' type="text" id="tenantName" onkeypress="return onlyArabicKey(event)"
                                            placeholder="{{ $chooseBuyerTenant == 'buyer' ? 'أسم المشتري' : 'أسم المستأجر' }}"
                                            class="form-control @error('buyer_tenant_name') is-invalid is-filled @enderror" />
                                        <label
                                            for="tenantName">{{ $chooseBuyerTenant == 'buyer' ? 'أسم المشتري' : 'أسم المستأجر' }}</label>
                                    </div>
                                    @error('buyer_tenant_name')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='buyer_calculator_number' type="text"
                                            id="buyer_calculator_number" placeholder="رقم الحاسبة"
                                            class="form-control @error('buyer_calculator_number') is-invalid is-filled @enderror"
                                            onkeypress="return onlyNumberKey(event)"
                                            {{ $chooseBuyerTenant == 'buyer' ? '' : 'readonly disabled' }} />
                                        <label for="buyer_calculator_number">رقم الحاسبة</label>
                                    </div>
                                    @error('buyer_calculator_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='buyer_tenant_phone_number' type="text"
                                            id="buyer_tenant_phone_number" placeholder="رقم الهاتف "
                                            class="form-control @error('buyer_tenant_phone_number') is-invalid is-filled @enderror"
                                            onkeypress="return onlyNumberKey(event)" />
                                        <label for="buyer_tenant_phone_number">رقم الهاتف</label>
                                    </div>
                                    @error('buyer_tenant_phone_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='buyer_tenant_email' type="text"
                                            id="buyer_tenant_email" placeholder="البريد الالكتروني"
                                            class="form-control @error('buyer_tenant_email') is-invalid is-filled @enderror" />
                                        <label for="buyer_tenant_email">البريد الالكتروني</label>
                                    </div>
                                    @error('buyer_tenant_email')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='company_department_email' type="text"
                                            id="company_department_email"
                                            placeholder="البريد الالكتروني للشركة أو القسم"
                                            class="form-control @error('company_department_email') is-invalid is-filled @enderror" />
                                        <label for="company_department_email">البريد الالكتروني للشركة أو القسم</label>
                                    </div>
                                    @error('company_department_email')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='buyer_tenant_notes' type="text" id="notes"
                                            placeholder="ملاحظات {{ $chooseBuyerTenant == 'buyer' ? 'المشتري' : 'المستأجر' }}"
                                            class="form-control @error('notes') is-invalid is-filled @enderror" />
                                        <label for="notes">ملاحظات
                                            {{ $chooseBuyerTenant == 'buyer' ? 'المشتري' : 'المستأجر' }}</label>
                                    </div>
                                    @error('notes')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>

                            <div class="divider">
                                <div class="divider-text">
                                    <h4>تفاصيل المزايدة </h4>
                                </div>
                            </div>

                            {{-- تفاصيل المزايدة --}}
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model='from_date' type="date" id="editfrom_date"
                                            placeholder="من تاريخ"
                                            class="form-control @error('from_date') is-invalid is-filled @enderror" />
                                        <label for="from_date">من تاريخ</label>
                                    </div>
                                    @error('from_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model='to_date' type="date" id="editto_date" readonly disabled
                                            placeholder="الى تاريخ"
                                            class="form-control @error('to_date') is-invalid is-filled @enderror" />
                                        <label for="to_date">الى تاريخ</label>
                                    </div>
                                    @error('to_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model='number_of_months' type="text" id="number_of_months" readonly disabled
                                            readonly disabled placeholder="عدد الاشهر"
                                            class="form-control @error('number_of_months') is-invalid is-filled @enderror" />
                                        <label for="number_of_months">عدد الاشهر</label>
                                    </div>
                                    @error('number_of_months')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="col">
                                    <div class="form-floating form-floating-outline">
                                        <div class="btn-group w-100" role="group">
                                            <input type="radio" class="btn-check" name="payment_period"
                                                id="zero_years" wire:click="setPaymentPeriod(0)" autocomplete="off">
                                            <label class="btn btn-outline-primary w-50" for="zero_years">دفع كامل</label>

                                            <input type="radio" class="btn-check" name="payment_period"
                                                id="twenty_years" wire:click="setPaymentPeriod(20)"
                                                autocomplete="off">
                                            <label class="btn btn-outline-primary w-50" for="twenty_years">20 سنة</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='insurance_amount' wire:keyup='percentAmount'
                                            type="text" onkeypress="return onlyNumberKey(event)"
                                            id="insurance_amount" placeholder="مبلغ التثمين"
                                            class="form-control @error('insurance_amount') is-invalid is-filled @enderror" />
                                        <label for="insurance_amount">مبلغ التثمين</label>
                                    </div>
                                    @error('insurance_amount')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='sale_amount' wire:keyup='percentAmount'
                                            type="text" onkeypress="return onlyNumberKey(event)" id="sale_amount"
                                            placeholder="مبلغ الرسو"
                                            class="form-control @error('sale_amount') is-invalid is-filled @enderror" />
                                        <label for="sale_amount">مبلغ الرسو</label>
                                    </div>
                                    @error('sale_amount')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='net_amount' type="text"
                                            onkeypress="return onlyNumberKey(event)" id="net_amount" readonly disabled
                                            placeholder="المبلغ الصافي"
                                            class="form-control @error('net_amount') is-invalid is-filled @enderror" />
                                        <label for="net_amount">المبلغ الصافي</label>
                                    </div>
                                    @error('net_amount')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='monthly_amount' type="text" id="monthly_amount" readonly disabled
                                            readonly disabled placeholder="المبلغ الشهري"
                                            onkeypress="return onlyNumberKey(event)"
                                            class="form-control @error('monthly_amount') is-invalid is-filled @enderror" />
                                        <label for="monthly_amount">المبلغ الشهري</label>
                                    </div>
                                    @error('monthly_amount')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='Percent_5' type="text" readonly disabled
                                            id="Percent_5" placeholder="نسبة 5%"
                                            class="form-control @error('Percent_5') is-invalid is-filled @enderror" />
                                        <label for="Percent_5">نسبة 5%</label>
                                    </div>
                                    @error('Percent_5')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='Percent_2' type="text" readonly disabled
                                            id="Percent_2" placeholder="نسبة 2%"
                                            class="form-control @error('Percent_2') is-invalid is-filled @enderror" />
                                        <label for="Percent_2">نسبة 2%</label>
                                    </div>
                                    @error('Percent_2')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                <div class="col">
                                    <div class="form-floating form-floating-outline">
                                        <select wire:model.defer='alert_duration' id="alert_duration"
                                            class="form-select @error('alert_duration') is-invalid is-filled @enderror">
                                            <option value=""></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                        </select>
                                        <label for="alert_duration">مدة التنبيه (شهر)</label>
                                    </div>
                                    @error('alert_duration')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="col">
                                    <div class="form-floating form-floating-outline">
                                        @if($chooseBuyerTenant == 'buyer')
                                            <select wire:model.defer='real_estate_status' id="real_estate_status"
                                                class="form-select @error('real_estate_status') is-invalid is-filled @enderror">
                                                <option value=""></option>
                                                <option value="رفع الحجز">رفع الحجز</option>
                                                <option value="عدم التصرف بالعقار الا بموافقة الموانئ">عدم التصرف بالعقار الا بموافقة الموانئ</option>
                                            </select>
                                        @else
                                            <select wire:model.defer='real_estate_status' id="real_estate_status"
                                                class="form-select @error('real_estate_status') is-invalid is-filled @enderror">
                                                <option value=""></option>
                                                <option value="عدم التصرف بالعقار الا بموافقة الموانئ">عدم التصرف بالعقار الا بموافقة الموانئ</option>
                                            </select>
                                        @endif
                                        <label for="real_estate_status">حالة العقار</label>
                                    </div>
                                    @error('real_estate_status')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3 mb-3 position-relative">
                                    <label class="switch switch-primary position-absolute top-50"
                                        style="margin-top: -12px">
                                        <input wire:click='Visibility({{ $notifications }})' type="checkbox"
                                            value="" {{ $notifications ? 'checked' : '' }} class="switch-input"
                                            id="modalRealitievisibility" />
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                        </span>
                                        <span class="switch-label">الاشعارات</span>
                                    </label>
                                    @error('visibility')
                                        <small class='text-danger inputerror'>{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-9">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='notes' type="text" id="notes"
                                            placeholder="ملاحظات"
                                            class="form-control @error('notes') is-invalid is-filled @enderror" />
                                        <label for="notes">ملاحظات</label>
                                    </div>
                                    @error('notes')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>

                            {{-- وصل التسديد --}}

                            <hr class="my-0">

                            <div class="text-center col-12 demo-vertical-spacing mb-n4">
                                <button wire:click='UpdateSaleTenant' wire:loading.attr="disabled" type="button"
                                    class="btn btn-primary me-sm-3 me-1">تعديل</button>
                                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                    aria-label="Close">تجاهل</button>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Edite Realitie Modal -->

<!-- Edite Realitie Modal -->
<div wire:ignore.self class="modal fade" id="saleRealPropertyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">بيع السند العقاري</h3>
                </div>

                <hr class="mt-n2">

                <h4 wire:loading wire:target="GetRealProperty"
                    wire:loading.class="d-flex justify-content-center">جار معالجة البيانات...</h4>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حفظ البيانات...</h5>

                <div wire:loading.remove wire:target="update, GetRealProperty">
                    <div class="row">
                        <div wire:loading.remove wire:target='GetRealProperty' class="text-center">
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

                            <div class="alert alert-outline-secondary pb-0 border-2" role="alert">
                                <h5 class="d-flex justify-content-around">
                                    <div>
                                        <strong>أسم المشتري : </strong>
                                        <span class="text-danger">
                                            {{ $BuyerTenant->buyer_tenant_name ?? '' }}
                                        </span>
                                    </div>
                                    <div>
                                        <strong>رقم الحاسبة : </strong>
                                        <span class="text-danger">
                                            {{ $BuyerTenant->buyer_calculator_number ?? '' }}
                                        </span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <form id="editRealitieModalForm" autocomplete="off">
                        <div class="row">
                            <div class="col mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='from_date' type="text"
                                        id="from_date" placeholder="من تاريخ"
                                        class="form-control @error('from_date') is-invalid is-filled @enderror"/>
                                    <label for="from_date">من تاريخ</label>
                                </div>
                                @error('from_date')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                            <div class="col mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='to_date' type="text"
                                        id="to_date" placeholder="الى تاريخ"
                                        class="form-control @error('to_date') is-invalid is-filled @enderror"/>
                                    <label for="to_date">الى تاريخ</label>
                                </div>
                                @error('to_date')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                            <div class="col mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='number_of_months' type="text"
                                        id="number_of_months" placeholder="عدد الاشهر" readonly disabled
                                        class="form-control @error('number_of_months') is-invalid is-filled @enderror"/>
                                    <label for="number_of_months">عدد الاشهر</label>
                                </div>
                                @error('number_of_months')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='insurance_amount' wire:keyup='percentAmount' type="text" onkeypress="return onlyNumberKey(event)"
                                        id="insurance_amount" placeholder="مبلغ التأمين"
                                        class="form-control @error('insurance_amount') is-invalid is-filled @enderror"/>
                                    <label for="insurance_amount">مبلغ التأمين</label>
                                </div>
                                @error('insurance_amount')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                            <div class="col mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='sale_amount' wire:keyup='percentAmount' type="text" onkeypress="return onlyNumberKey(event)"
                                        id="sale_amount" placeholder="مبلغ الرسو"
                                        class="form-control @error('sale_amount') is-invalid is-filled @enderror"/>
                                    <label for="sale_amount">مبلغ الرسو</label>
                                </div>
                                @error('sale_amount')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                            <div class="col mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='net_amount' type="text" onkeypress="return onlyNumberKey(event)"
                                        id="net_amount" placeholder="المبلغ الصافي"
                                        class="form-control @error('net_amount') is-invalid is-filled @enderror"/>
                                    <label for="net_amount">المبلغ الصافي</label>
                                </div>
                                @error('net_amount')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='monthly_amount' type="text"
                                        id="monthly_amount" placeholder="المبلغ الشهري" onkeypress="return onlyNumberKey(event)"
                                        class="form-control @error('monthly_amount') is-invalid is-filled @enderror"/>
                                    <label for="monthly_amount">المبلغ الشهري</label>
                                </div>
                                @error('monthly_amount')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                            <div class="col mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='alert_duration' type="text"
                                        id="alert_duration" placeholder="مدة التنبيه (شهر)" onkeypress="return onlyNumberKey(event)"
                                        class="form-control @error('alert_duration') is-invalid is-filled @enderror"/>
                                    <label for="alert_duration">مدة التنبيه (شهر)</label>
                                </div>
                                @error('alert_duration')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='company_department_email' type="text"
                                        id="company_department_email" placeholder="البريد الالكتروني للشركة أو القسم"
                                        class="form-control @error('company_department_email') is-invalid is-filled @enderror"/>
                                    <label for="company_department_email">البريد الالكتروني للشركة أو القسم</label>
                                </div>
                                @error('company_department_email')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <select wire:model.defer='real_estate_status' id="real_estate_status" 
                                        class="form-select @error('real_estate_status') is-invalid is-filled @enderror">
                                        <option value=""></option>
                                        <option value="1">محجوز</option>
                                        <option value="2">غير محجوز</option>
                                    </select>
                                    <label for="company_department_email">حالة العقار</label>
                                </div>
                                @error('real_estate_status')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                            <div class="col mb-3 position-relative">
                                <label class="switch switch-primary position-absolute top-50" style="margin-top: -12px">
									<input wire:click='Visibility({{ $notifications }})' type="checkbox" value="" {{ $notifications ? 'checked':'' }}
                                        class="switch-input" id="modalRealitievisibility"/>
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
                        </div>

                        <div Class="row">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='notes' type="text" id="notes" placeholder="ملاحظات"
                                        class="form-control @error('notes') is-invalid is-filled @enderror"/>
                                    <label for="notes">ملاحظات</label>
                                </div>
                                @error('notes')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>

                        <hr class="my-0">

                        <div class="text-center col-12 demo-vertical-spacing mb-n4">
                            <button wire:click='sale' wire:loading.attr="disabled" type="button"
                                class="btn btn-primary me-sm-3 me-1">حفظ</button>
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                aria-label="Close">تجاهل</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Edite Realitie Modal -->

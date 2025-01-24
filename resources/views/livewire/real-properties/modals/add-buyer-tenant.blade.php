<!-- Edite Realitie Modal -->
<div wire:ignore.self class="modal fade" id="addBuyerTenantModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">إضافة مشتري أو مستأجر</h3>
                </div>

                <hr class="mt-n2">

                <h4 wire:loading wire:target="GetRealProperty"
                    wire:loading.class="d-flex justify-content-center">جار معالجة البيانات...</h4>
                <h4 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center">
                    جار حفظ البيانات...</h4>

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
                        </div>
                    </div>

                    <form id="editRealitieModalForm" autocomplete="off">
                        <div class="row mb-3">
                            <div class="col-md mb-md-0 mb-2">
                                <div class="form-check custom-option custom-option-icon {{ $chooseBuyerTenant == 'buyer' ? 'checked':'' }}">
                                    <label class="form-check-label custom-option-content" for="customRadioIcon1">
                                        <span class="custom-option-body">
                                            <span class="custom-option-title">مشتري</span>
                                            <small>سيتم تحديد اسم موظف</small>
                                        </span>
                                        <input wire:click='chooseBuyerTenant("buyer")' name="customRadioIcon-01" class="form-check-input" type="radio" value="buyer" id="customRadioIcon1" {{ $chooseBuyerTenant == 'buyer' ? 'checked':'' }}>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md mb-md-0 mb-2">
                                <div class="form-check custom-option custom-option-icon {{ $chooseBuyerTenant == 'tenant' ? 'checked':'' }}">
                                    <label class="form-check-label custom-option-content" for="customRadioIcon2">
                                        <span class="custom-option-body">
                                            <span class="custom-option-title">مستأجر</span>
                                            <small>سيتم تحديد اسم مواطن</small>
                                        </span>
                                        <input wire:click='chooseBuyerTenant("tenant")' name="customRadioIcon-01" class="form-check-input" type="radio" value="tenant" id="customRadioIcon2" {{ $chooseBuyerTenant == 'tenant' ? 'checked':'' }}>
                                    </label>
                                </div>
                            </div>
                        </div>

                        @if ($chooseBuyerTenant)
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='buyer_tenant_name' type="text"
                                            id="tenantName" placeholder="{{ $chooseBuyerTenant == 'buyer' ? 'أسم المشتري':'أسم المستأجر' }}"
                                            class="form-control @error('buyer_tenant_name') is-invalid is-filled @enderror"/>
                                        <label for="tenantName">{{ $chooseBuyerTenant == 'buyer' ? 'أسم المشتري':'أسم المستأجر' }}</label>
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
                                            onkeypress="return onlyNumberKey(event)" />
                                        <label for="buyer_calculator_number">رقم الحاسبة</label>
                                    </div>
                                    @error('buyer_calculator_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
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

                                <div class="col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='buyer_tenant_email' type="text"
                                            id="buyer_tenant_email" placeholder="البريد الالكتروني"
                                            class="form-control @error('buyer_tenant_email') is-invalid is-filled @enderror"/>
                                        <label for="buyer_tenant_email">البريد الالكتروني</label>
                                    </div>
                                    @error('buyer_tenant_email')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='notes' type="text" id="notes" placeholder="الملاحظات"
                                            class="form-control @error('notes') is-invalid is-filled @enderror"/>
                                        <label for="notes">الملاحظات</label>
                                    </div>
                                    @error('notes')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                        @endif

                        <hr class="my-0">

                        <div class="text-center col-12 demo-vertical-spacing mb-n4">
                            <button wire:click='storeBuyerTenant' wire:loading.attr="disabled" type="button"
                                class="btn btn-primary me-sm-3 me-1">اضافة</button>
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

<!-- Edite Realitie Modal -->
<div wire:ignore.self class="modal fade" id="editSaleTenantReceiptModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل ايصال بيع أو إجار السند العقاري</h3>
                </div>

                <div class="alert alert-outline-secondary pb-0 border-2" role="alert">
                    <h5 class="d-flex justify-content-around">
                        <div>
                            <strong>رقم المقاطعة : </strong>
                            <span class="text-danger">{{ $Realities->GetProvinces->province_number ?? '' }} -
                                {{ $Realities->GetProvinces->province_name ?? '' }}</span>
                        </div>
                        <div>
                            <strong>رقم القطعة : </strong>
                            <span class="text-danger">{{ $Realities->GetPlots->plot_number ?? '' }}</span>
                        </div>
                        <div>
                            <strong>رقم العقار : </strong>
                            <span class="text-danger">{{ $Realities->property_number ?? '' }}</span>
                        </div>
                    </h5>
                </div>

                <div class="alert alert-outline-secondary pb-0 border-2" role="alert">
                    <h5 class="d-flex justify-content-around">
                        <div>
                            <strong>أسم
                                {{ $BuyerTenant ? ($BuyerTenant->buyer_tenant_type == 'مشتري' ? 'المشتري' : 'المستأجر') : '' }}
                                : </strong>
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

                <hr class="mt-n2">

                <h4 wire:loading wire:target="GetRealProperty"
                    wire:loading.class="d-flex justify-content-center">جار معالجة البيانات...</h4>
                <h5 wire:loading wire:target="receipt" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حفظ البيانات...</h5>

                <div wire:loading.remove wire:target="receipt, GetRealProperty">
                    <form id="editRealitieModalForm" autocomplete="off">
                        <div class="row">
                            <div class="col mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='receipt_number' type="text" class="form-control @error('receipt_number') is-invalid is-filled @enderror"
                                        onkeypress="return onlyNumberKey(event)" id="receipt_number" placeholder="رقم الوصل"/>
                                    <label for="receipt_number">رقم الوصل</label>
                                </div>
                                @error('receipt_number')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                            <div class="col mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input wire:ignore wire:model.defer='receipt_date' type="text" class="form-control @error('receipt_date') is-invalid is-filled @enderror"
                                        id="edit_receipt_date" placeholder="تاريخ الوصل" />
                                    <label for="receipt_date">تاريخ الوصل</label>
                                </div>
                                @error('receipt_date')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>

                        <div Class="row">
                            <div class="col mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='receipt_payment_amount' type="text"
                                        class="form-control @error('receipt_payment_amount') is-invalid is-filled @enderror" onkeypress="return onlyNumberKey(event)"
                                        id="receipt_payment_amount" placeholder="مبلغ التسديد"/>
                                    <label for="receipt_payment_amount">مبلغ التسديد</label>
                                </div>
                                @error('receipt_payment_amount')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input wire:ignore wire:model.defer='receipt_from_date' type="text"
                                        id="edit_receipt_from_date" placeholder="من تاريخ"
                                        class="form-control @error('receipt_from_date') is-invalid is-filled @enderror"/>
                                    <label for="receipt_from_date">من تاريخ</label>
                                </div>
                                @error('receipt_from_date')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                            <div class="col mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input wire:ignore wire:model.defer='receipt_to_date' type="text"
                                        id="edit_receipt_to_date" placeholder="الى تاريخ"
                                        class="form-control @error('receipt_to_date') is-invalid is-filled @enderror"/>
                                    <label for="receipt_to_date">الى تاريخ</label>
                                </div>
                                @error('receipt_to_date')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>

                        <div Class="row">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='receipt_notes' type="text" id="receipt_notes" placeholder="ملاحظات"
                                        class="form-control @error('receipt_notes') is-invalid is-filled @enderror"/>
                                    <label for="receipt_notes">ملاحظات</label>
                                </div>
                                @error('receipt_notes')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="form-floating form-floating-outline mb-2">
                                            <div class="d-flex align-items-center mb-2">
                                                @if ($receipt_attach && is_string($receipt_attach))
                                                    @php
                                                        $path = 'Realities/' .
                                                                $Realities->GetProvinces->province_number . '/' .
                                                                $Realities->GetPlots->plot_number . '/' .
                                                                $Realities->property_number . '/' .
                                                                $receipt_attach;
                                                    @endphp
                                                    <a href="{{ Storage::url($path) }}" target="_blank" class="btn btn-sm btn-outline-primary me-2">
                                                        <i class="mdi mdi-file-document"></i> عرض الملف الحالي
                                                    </a>
                                                @endif
                                                <div class="form-floating form-floating-outline flex-grow-1">
                                                    <input wire:model.defer='receipt_attach' type="file"
                                                        id="receipt_attach" accept=".jpeg,.png,.jpg,.pdf"
                                                        class="form-control @error('receipt_attach') is-invalid is-filled @enderror" />
                                                    <label for="receipt_attach">اختر ملف الايصال</label>
                                                    @if ($attachFile)
                                                        <span class="input-group-text bg-success position-absolute end-0 top-0 h-100">
                                                            <i class="mdi mdi-check-circle text-white"></i>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            @error('receipt_attach')
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
<!--/ Edite Realitie Modal -->

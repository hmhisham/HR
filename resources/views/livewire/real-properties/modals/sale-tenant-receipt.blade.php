<!-- Edite Realitie Modal -->
<div wire:ignore.self class="modal fade" id="saleTenantReceiptModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">ايصال بيع أو إجار السند العقاري</h3>
                </div>

                <hr class="mt-n2">

                <h4 wire:loading wire:target="GetRealProperty" wire:loading.class="d-flex justify-content-center">جار
                    معالجة البيانات...</h4>
                <h5 wire:loading wire:target="receipt" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حفظ البيانات...</h5>

                <div wire:loading.remove wire:target="receipt, GetRealProperty">
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
                                        <strong>أسم
                                            {{ $BuyerTenant ? ($BuyerTenant->buyer_tenant_type == 'buyer' ? 'المشتري' : 'المستأجر') : '' }}
                                            : </strong>
                                        <span class="text-danger">
                                            {{ $BuyerTenant->buyer_tenant_name ?? '' }}
                                        </span>
                                    </div>
                                    <div>
                                        <strong>رقم الحاسبة : </strong>
                                        <span class="text-danger">
                                            {{ $BuyerTenant->buyer_computer_number ?? '' }}
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
                                    <input wire:model.defer='receipt_number' type="text"
                                        class="form-control @error('receipt_number') is-invalid is-filled @enderror"
                                        onkeypress="return onlyNumberKey(event)" id="receipt_number"
                                        placeholder="رقم الوصل" />
                                    <label for="receipt_number">رقم الوصل</label>
                                </div>
                                @error('receipt_number')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                            <div class="col mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='receipt_date' type="text"
                                        class="form-control @error('receipt_date') is-invalid is-filled @enderror"
                                        id="receipt_date" placeholder="تاريخ الوصل" />
                                    <label for="receipt_date">تاريخ الوصل</label>
                                </div>
                                @error('receipt_date')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>

                        <div Class="row">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='receipt_payer_name' type="text" id="receipt_payer_name"
                                        placeholder="أسم المسدد"
                                        class="form-control @error('receipt_payer_name') is-invalid is-filled @enderror" />
                                    <label for="receipt_payer_name">أسم المسدد</label>
                                </div>
                                @error('receipt_payer_name')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                            <div class="col mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='receipt_payment_amount' type="text"
                                        class="form-control @error('receipt_payment_amount') is-invalid is-filled @enderror"
                                        onkeypress="return onlyNumberKey(event)" id="receipt_payment_amount"
                                        placeholder="مبلغ التسديد" />
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
                                    <input wire:model.defer='receipt_from_date' type="text" id="receipt_from_date"
                                        placeholder="من تاريخ"
                                        class="form-control @error('receipt_from_date') is-invalid is-filled @enderror" />
                                    <label for="receipt_from_date">من تاريخ</label>
                                </div>
                                @error('receipt_from_date')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                            <div class="col mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='receipt_to_date' type="text" id="receipt_to_date"
                                        placeholder="الى تاريخ"
                                        class="form-control @error('receipt_to_date') is-invalid is-filled @enderror" />
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
                                    <input wire:model.defer='receipt_notes' type="text" id="receipt_notes"
                                        placeholder="ملاحظات"
                                        class="form-control @error('receipt_notes') is-invalid is-filled @enderror" />
                                    <label for="receipt_notes">ملاحظات</label>
                                </div>
                                @error('receipt_notes')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3" style="height: 350px;">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='receipt_attach' type="file" id="receipt_attach"
                                        accept=".jpeg,.png,.jpg,.pdf"
                                        class="form-control @error('receipt_attach') is-invalid is-filled @enderror" />
                                    <label for="receipt_attach">اختر ملف الايصال</label>
                                </div>
                                @error('receipt_attach')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror

                                <div class="d-flex justify-content-center text-center">
                                    <div wire:loading wire:target='receipt_attach' class="mt-3">
                                        <img src="{{ asset('assets/img/gif/Cube-Loading-Animated-3D.gif') }}"
                                            style="height: 150px" alt="">
                                    </div>
                                    <div wire:loading.remove wire:target='receipt_attach' class="mt-3">
                                        @if ($receipt_attach && $receipt_attach->getMimeType() == 'application/pdf')
                                            <embed src="{{ $receipt_attach->temporaryUrl() }}" type="application/pdf"
                                                style="height: 300px" />
                                        @elseif ($receipt_attach && Str::startsWith($receipt_attach->getMimeType(), 'image/'))
                                            <img src="{{ $receipt_attach->temporaryUrl() }}" alt="Selected Image"
                                                class="img-fluid" style="height: 300px" />
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-0">

                        <div class="text-center col-12 demo-vertical-spacing mb-n4">
                            <button wire:click='ReceiptStore' wire:loading.attr="disabled" type="button"
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

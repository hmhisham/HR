<!-- Edite Realitie Modal -->
<div wire:ignore.self class="modal fade" id="editSaleTenantReceiptModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل ايصال بيع أو إجار السند العقاري</h3>
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
                                    <input wire:model.defer='receipt_date' type="text" class="form-control @error('receipt_date') is-invalid is-filled @enderror"
                                        id="edit_receipt_date" placeholder="تاريخ الوصل" />
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
                                    <input wire:model.defer='receipt_payer_name' type="text" id="receipt_payer_name" placeholder="أسم المسدد"
                                        class="form-control @error('receipt_payer_name') is-invalid is-filled @enderror"/>
                                    <label for="receipt_payer_name">أسم المسدد</label>
                                </div>
                                @error('receipt_payer_name')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
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
                                    <input wire:model.defer='receipt_from_date' type="text"
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
                                    <input wire:model.defer='receipt_to_date' type="text"
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
                            <div class="col mb-3" style="height: 350px;">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='receipt_attach' type="file"
                                        id="receipt_attach" accept=".jpeg,.png,.jpg,.pdf"
                                        class="form-control @error('receipt_attach') is-invalid is-filled @enderror" />
                                    <label for="receipt_attach">اختر ملف الايصال</label>
                                </div>
                                @error('receipt_attach')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror

                                <div class="d-flex justify-content-center text-center">
                                    <div wire:loading wire:target='receipt_attach, GetSaleTenantReceipt' class="mt-3">
                                        <img src="{{ asset('assets/img/gif/Cube-Loading-Animated-3D.gif') }}"
                                            style="height: 150px" alt="">
                                    </div>

                                    <div wire:loading.remove wire:target='receipt_attach, GetSaleTenantReceipt' class="mt-3">
                                        @if ($attachFile)
                                            @if (pathinfo($attachFile, PATHINFO_EXTENSION) == 'application/pdf')
                                                <embed src="{{ $attachFile->temporaryUrl() }}" type="application/pdf" width="100%" style="height: 280px; width: 100%"/>
                                            @else
                                                <img src="{{ $attachFile->temporaryUrl() }}" alt="Selected Image" class="img-fluid" style="height: 280px; width: 100%"/>
                                            @endif
                                        @elseif ($receipt_attach && is_string($receipt_attach) && !$attachFile)
                                            @if(pathinfo($receipt_attach, PATHINFO_EXTENSION) == strtolower('pdf'))
                                                <iframe src="{{ asset('storage/Real-Property/Payment-Receipts/'.$RealPropertyNumber.'/'.$BuyerTenantid.'/'.$receipt_attach) }}" class="mt-3 " style="height: 280px; width: 100%"></iframe>
                                            @else
                                                <img src="{{ asset('storage/Real-Property/Payment-Receipts/'.$RealPropertyNumber.'/'.$BuyerTenantid.'/'.$receipt_attach) }}" class="mt-3 rounded img-fluid" style="max-height: 280px; width: 100%">
                                            @endif
                                        @else
                                            <!-- Handle the case where $receipt_attach is not set or invalid -->
                                            <h4>لا يوجد ملف مرفق.</h4>
                                        @endif
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

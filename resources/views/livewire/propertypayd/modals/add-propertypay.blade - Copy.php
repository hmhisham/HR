<!-- Add Propertypay Modal -->
<div wire:ignore.self class="modal fade" id="addpropertypayModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">اضافة ايصال دفع</h3>
                    <p>نافذة الأضافة </p>
                </div>

                <hr class="mt-n2">

                <h5 wire:loading wire:target="store" wire:loading.class="d-flex justify-content-center">
                    جار حفظ البيانات...
                </h5>

                <form id="addpropertypayModalForm" autocomplete="off">
                    <section wire:loading.remove wire:target="store" class="section-py first-section-pt mt-n4">
                        <div class="container">
                            <div class="px-3">
                                <div class="row">
                                    <div class="col-lg-7 card-body border-end">
                                        <h4 class="mb-2">بيانات الدفع</h4>
                                        <div class="row my-3">
                                            <div class="col-md mb-md-0 mb-3">
                                                <div class="form-floating form-floating-outline">
                                                    <input wire:model.defer='receipt_number' type="text"
                                                        id="ReceiptNumber" placeholder="رقم الإيصال"
                                                        class="form-control @error('receipt_number') is-invalid is-filled @enderror" />
                                                    <label for="ReceiptNumber">رقم الإيصال</label>
                                                </div>
                                                @error('receipt_number')
                                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                                @enderror
                                            </div>
                                            <div class="col-md mb-md-0 mb-3">
                                                <div class="form-floating form-floating-outline">
                                                    <input wire:model.defer='receipt_date' type="text" readonly
                                                        id="ReceiptDate" placeholder="تاريخ الإيصال"
                                                        class="form-control @error('receipt_date') is-invalid is-filled @enderror" />
                                                    <label for="ReceiptDate">تاريخ الإيصال</label>
                                                </div>
                                                @error('receipt_date')
                                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row my-3">
                                            <div class="col-md mb-md-0 mb-3 bg-lighter rounded py-4">
                                                <div class="form-floating form-floating-outline bg-lighter rounded">
                                                    <input wire:model.defer='amount' wire:keyup='TafqeetAmount' type="text" id="ReceiptAmount"
                                                        class="form-control bg-lighter rounded fs-1 @error('amount') is-invalid is-filled @enderror"
                                                        onkeypress="return onlyNumberKey(event)"
                                                        oninput="formatWithCommas(this)"/>
                                                    <label for="ReceiptAmount" class="bg-lighter rounded">مبلغ الإيصال</label>
                                                </div>
                                                <small class='inputerror'> {{ $TafqeetReceiptAmount }} </small>
                                                @error('amount')
                                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row my-3">
                                            <div class="col-md mb-md-0 mb-3">
                                                <div class="form-floating form-floating-outline">
                                                    <textarea wire:model.defer='notes' id="notes" placeholder="ملاحظات"
                                                        class="form-control" style="height: 100px;"></textarea>
                                                    <label for="notes">ملاحظات</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row my-3">
                                            <div class="col-md mb-md-0 mb-3 bg-lighter rounded py-4">
                                                <div class="bg-lighter px-4 rounded mb-n3">
                                                    <p>مجموع المبالغ المدفوعة</p>
                                                    <div class="d-flex align-items-center ">
                                                        <h1 class="text-heading display-3">{{ number_format($TotalAmountsPaid) }}</h1>
                                                        <sub class="fs-6"> {{ $TafqeetTotalAmountsPaid }}</sub>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="d-flex justify-content-between align-items-center mt-3">
                                                <p class="mb-0">مبلغ الايصال</p>
                                                <h6 class="mb-0">{{ number_format($ReceiptAmount) }}</h6>
                                            </div>
                                            <hr />
                                            <div class="d-flex justify-content-between align-items-center mt-3 pb-1">
                                                <p class="mb-0">المجموع الكلي</p>
                                                <h6 class="mb-0 text-dark fs-5 fw-bolder">{{ number_format($TotalAmount) }}</h6>
                                            </div>
                                            <div class="d-flex justify-content-end align-items-center mt-0 pb-1">
                                                <sub class="fs-6 text-start"> {{ $TafqeetTotalAmount }}</sub>
                                            </div>

                                            <hr class="bg-primary"/>
                                            <div class="d-flex justify-content-between align-items-center mt-3 pb-1">
                                                <p class="mb-0">المجموع الكلي</p>
                                                <h6 class="mb-0 text-dark fs-5 fw-bolder">{{ number_format($TotalAmount) }}</h6>
                                            </div>
                                            <div class="d-flex justify-content-end align-items-center mt-0 pb-1">
                                                <sub class="fs-6 text-start"> {{ $TafqeetTotalAmount }}</sub>
                                            </div>
                                            {{-- <div class="d-grid mt-3">
                                                <button class="btn btn-success">
                                                    <span class="me-2">Proceed with Payment</span>
                                                    <i class="mdi mdi-arrow-right scaleX-n1-rtl"></i>
                                                </button>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-5 card-body">
                                        <h4 class="mb-2">صورة الايصال</h4>

                                        <div class="row my-3">
                                            <div class="col-md mb-md-0 mb-3">
                                                <div class="form-floating form-floating-outline">
                                                    <input wire:model="receipt_file" type="file" id="ReceiptAttachment"
                                                        class="form-control @error('receipt_file') is-invalid is-filled @enderror"
                                                        accept=".png, .jpg, .jpeg, .pdf">
                                                    <label for="ReceiptAttachment">اختر ملف</label>
                                                </div>
                                                @error('receipt_file')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div wire:loading.remove wire:target='receipt_file'>
                                            @if ($filePreview)
                                                @if ($receipt_file->getClientOriginalExtension() == strtolower('pdf'))
                                                    <iframe src="{{ $filePreview }}" class="mt-3" style="height: 320px; width: 100%"></iframe>
                                                @else
                                                    <img src="{{ $filePreview }}" class="mt-3 rounded img-fluid" style="height: 320px; width: 100%">
                                                @endif
                                            @endif
                                        </div>

                                        <div wire:loading wire:target='receipt_file' class="text-center">
                                            <img src="{{ asset('assets/img/gif/Cube-Loading-Animated-3D.gif') }}" style="width: 50%" alt="Timer Loading Animated 3D Icon">
                                        </div>
                                    </div>

                                    <hr class="my-0">

                                    <div class="text-center col-12 demo-vertical-spacing mb-n4">
                                        <button wire:click='store' wire:loading.attr="disabled" type="button"
                                            class="btn btn-primary me-sm-3 me-1">اضافة</button>
                                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                            aria-label="Close">تجاهل</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ Add Propertypay Modal -->

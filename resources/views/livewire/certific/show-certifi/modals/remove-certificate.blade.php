<!-- Remove certifi Modal -->
<div wire:ignore.self class="modal fade" id="removecertifiModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">حذف الشهادة</h3>
                    <p>نافذة الحذف</p>
                </div>

                <hr class="mt-n2">

                <h5 wire:loading wire:target="Getcertifi" wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="destroy" wire:loading.class="d-flex justify-content-center text-primary">جار حفظ البيانات...</h5>

                <div wire:loading.remove wire:target="Getcertifi, destroy">
                    <form id="editcertifiModalForm" autocomplete="off">
                        <div class="row bg-label-danger">
                            <div class="col">
                                <label class="border-bottom-2 text-center mb-2 w-100">اسم الموظف</label>
                                <div wire:loading wire:target='AddCertifyModal'
                                    wire:loading.class="d-flex justify-content-center">
                                    <span class="mdi mdi-loading mdi-spin mdi-24px"></span>
                                </div>
                                <div wire:loading.remove wire:target='AddCertifyModal' class="text-center">
                                    {{ $Worker->full_name ?? '' }}
                                </div>
                            </div>

                            <div class="col">
                                <label class="border-bottom-2 text-center mb-2 w-100">رقم الحاسبة</label>
                                <div wire:loading wire:target='AddCertifyModal'
                                    wire:loading.class="d-flex justify-content-center">
                                    <span class="mdi mdi-loading mdi-spin mdi-24px"></span>
                                </div>
                                <div wire:loading.remove wire:target='AddCertifyModal' class="text-center">
                                    {{ $Worker->calculator_number ?? '' }}
                                </div>
                            </div>
                        </div>

                        <hr class="">

                        <div Class="row">
                            <div class="col text-center">
                                <div class="text-danger">
                                    <label for="modalCertifydocument_number">رقم الوثيقة</label>
                                    <div class="form-control-plaintext mt-n2">{{ $document_number }}</div>
                                </div>
                            </div>
                            <div class="col text-center">
                                <div class="text-danger">
                                    <label for="modalCertifydocument_date">تاريخ الوثيقة</label>
                                    <div class="form-control-plaintext mt-n2">{{ $document_date }}</div>
                                </div>
                            </div>
                            <div class="col text-center">
                                <div class="text-danger">
                                    <label for="modalCertifycertificates_name">التحصيل الدراسي</label>
                                    <div class="form-control-plaintext mt-n2">{{ $certifi ? $certifi->Getcertificate->certificates_name:'' }}</div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <hr class="my-0">
            <div class="text-center col-12 demo-vertical-spacing mb-n4">
                <button wire:click='destroy' wire:loading.attr="disabled" type="button"
                    class="btn btn-danger me-sm-3 me-1">حــذف</button>
                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                    aria-label="Close">تجاهل</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--/ Delete certifi Modal -->

<!-- Add Certificate Modal -->
<div wire:ignore.self class="modal fade" id="addcertificateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">اضافة تحصيل دراسي جديدة</h3>
                    <p>نافذة الأضافة </p>
                </div>
                <hr class="mt-n2">
                <form id="addcertificateModalForm" autocomplete="off">
                    <div class="row row-cols-1  ">
                        <div class="col mb-3">
                            <div Class="row">
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='certificates_name' type="text"
                                            id="modalCertificatescertificates_name" placeholder="اسم الشهادة"
                                            class="form-control @error('certificates_name') is-invalid is-filled @enderror"
                                            onkeypress="return onlyArabicKey(event)" />
                                        <label for="modalCertificatescertificates_name">اسم الشهادة</label>
                                    </div>
                                    @error('certificates_name')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="text-center col-12 demo-vertical-spacing mb-n4">
                        <button wire:click='store' wire:loading.attr="disabled" type="button"
                            class="btn btn-primary me-sm-3 me-1">اضافة</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                            aria-label="Close">تجاهل</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ Add Certificate Modal -->

<!-- Add InfoOffic Modal -->
<div wire:ignore.self class="modal fade" id="addinfoofficModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">اضافة اسم مكتب معلومات جديد</h3>
                    <p>نافذة الأضافة </p>
                </div>
                <hr class="mt-n2">
                <form id="addinfoofficModalForm" autocomplete="off">
                    <div Class="row">
                        <div class="col-12 col-sm-12 col-md-6 mb-3">
                            <div class="form-floating form-floating-outline">
                                <input wire:model.defer='Infooffice_id' type="text" id="modalInfoofficeInfooffice_id"
                                    placeholder="رقم"
                                    class="form-control @error('Infooffice_id') is-invalid is-filled @enderror"
                                    onkeypress="return onlyNumberKey(event)" />
                                <label for="modalInfoofficeInfooffice_id">رقم</label>
                            </div>
                            @error('Infooffice_id')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 mb-3">
                            <div class="form-floating form-floating-outline">
                                <input wire:model.defer='Infooffice_name' type="text"
                                    id="modalInfoofficeInfooffice_name" placeholder="مكتب معلومات بطاقة السكن"
                                    class="form-control @error('Infooffice_name') is-invalid is-filled @enderror"
                                    onkeypress="return onlyArabicKey(event)" />
                                <label for="modalInfoofficeInfooffice_name">مكتب معلومات بطاقة السكن</label>
                            </div>
                            @error('Infooffice_name')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                            @enderror
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
<!--/ Add InfoOffic Modal -->

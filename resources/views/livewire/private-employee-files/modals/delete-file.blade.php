<!-- removeFile Modal -->
<div wire:ignore.self class="modal fade" id="deleteFileModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">حذف الملفات الخاصة بالموظفين</h3>
                </div>

                <hr class="mt-n2">

                <h5 wire:loading wire:target="FilePreview" wire:loading.class="d-flex justify-content-center text-primary fw-bolder">جار معالجة الملف...</h5>

                <div wire:loading.remove>
                    <div class="row">
                        <div class="col text-center">
                            <iframe src="{{ asset('storage/PrivateEmployeeFiles/' . $filePreview) }}" width="600" height="400"></iframe>
                        </div>
                    </div>

                    <hr class="my-0">

                    <div class="row">
                        <div class="col">
                            <div class="d-flex justify-content-center demo-vertical-spacing mb-n4">
                                <button wire:click="FileDelete('{{ $filePreview }}')" class="btn btn-danger  waves-effect waves-light">
                                    حذف
                                </button>
                                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                                    تجاهل
                                </button>
                            </div>
                        </div>
                        <div class="col text-ceneter">
                            <div class="demo-vertical-spacing mb-n4">
                                <div wire:loading.remove>
                                    {{ $filePreview }}
                                    <br>
                                    <div wire:target="FilePreview" class="">
                                        @if ($filePreview)
                                            <div class="badge bg-primary">حجم الملف: {{ $fileSize }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- previewFile Modal -->

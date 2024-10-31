<!-- uploadFile Modal -->
<div wire:ignore.self class="modal fade" id="uploadFileModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">رفح الملفات الخاصة بالموظفين</h3>
                </div>

                <hr class="mt-n2">

                <h5 wire:loading wire:target="fileChoose" wire:loading.class="d-flex justify-content-center text-primary fw-bolder">جار معالجة الملف...</h5>
                <h5 wire:loading wire:target="uploadFile" wire:loading.class="d-flex justify-content-center text-primary fw-bolder">جار رفع الملف...</h5>

                <div wire:loading.remove>
                    <div class="row">
                        <div wire:ignore class="col text-center">
                            <iframe id="pdf-preview" width="600" height="400"></iframe>
                        </div>
                    </div>

                    <hr class="my-0">

                    <div class="row">
                        <div class="col">
                            <div class="d-flex justify-content-center demo-vertical-spacing mb-n4">
                                <button wire:click="uploadFile" class="btn btn-icon btn-primary p-3 rounded-circle waves-effect waves-light upload-image-btn">
                                    <span class="mdi mdi-cloud-upload mdi-24px"></span>
                                </button>
                                <button wire:click="removeFileChoose" class="btn btn-icon btn-outline-secondary p-3 rounded-circle waves-effect waves-light">
                                    <span class="mdi mdi-file-remove mdi-24px"></span>
                                </button>
                            </div>
                        </div>
                        <div class="col text-ceneter">
                            <div class="demo-vertical-spacing mb-n4">
                                <div wire:loading.remove>
                                    {{ $fileName }}
                                    <br>
                                    <div wire:target="fileChoose" class="">
                                        @if ($fileChoose)
                                            <div class="badge {{ $fileChooseSize > 512000 ? 'bg-danger':'bg-success' }}">حجم الملف: {{ $fileSize }}</div>
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
<!-- uploadFile Modal -->

<!-- Remove propertycategor Modal -->
<div wire:ignore.self class="modal fade" id="removepropertycategorModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">\ نوع العقارحذف</h3>
                    <p>نافذة الحذف</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="Getpropertycategor"
                    wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="destroy" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حذف البيانات...</h5>

                <div wire:loading.remove>
                    <form id="removepropertycategorModalForm" onsubmit="return false" autocomplete="off">
                        <div class="col text-center">
                            <div class="">
                                <label class="border-bottom-2 w-100">نوع العقار</label>
                                <div class="form-control-plaintext mt-n2">{{ $category }}</div>
                            </div>
                        </div>

                        <hr class="my-0">
                        <div class="d-flex justify-content-center col-12 demo-vertical-spacing mb-n4">
                            <button wire:click='destroy' type="submit"class="flex-fill btn btn-danger me-sm-3 me-1">حذف
                            </button>
                            <button type="reset" class="flex-fill btn btn-outline-secondary" data-bs-dismiss="modal"
                                aria-label="Close">تجاهل</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Delete propertycategor Modal -->

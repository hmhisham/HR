<!-- Remove Permission Modal -->
<div wire:ignore.self class="modal fade" id="removeCategoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="p-3 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2"><span class="text-danger">حذف الفئة</span></h3>
                    <p>نافذة حذف معلومات الفئات</p>
                </div>

                <hr class="mt-n2">

                <h5 wire:loading wire:target="GetCategory" wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="destroy" wire:loading.class="d-flex justify-content-center text-primary">جار حفظ البيانات...</h5>

                <div wire:loading.remove>
                    <form id="editCategoryForm" class="pt-2 row" onsubmit="return false">
                        <div class="mb-3 col-sm-8">
                            <label for="modalCategoryName">اسم الفئة</label>
                            <div class="text-danger">{{ $name }}</div>
                        </div>

                        <hr class="my-0">

                        <div class="d-flex justify-content-center col-12 demo-vertical-spacing mb-n4">
                            <button wire:click='destroy' type="submit"class="flex-fill btn btn-danger me-sm-3 me-1">حذف
                                الفئة</button>
                            <button type="reset" class="flex-fill btn btn-outline-secondary" data-bs-dismiss="modal"
                                aria-label="Close">تجاهل</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Edit Permission Modal -->

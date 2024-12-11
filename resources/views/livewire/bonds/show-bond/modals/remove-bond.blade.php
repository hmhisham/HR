<!-- Remove Bond Modal -->
<div wire:ignore.self class="modal fade" id="removebondModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">حذف السند العقاري</h3>
                    <p>نافذة الحذف</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetBond" wire:loading.class="d-flex justify-content-center text-primary">
                    جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="destroy" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حذف البيانات...</h5>

                <div wire:loading.remove wire:target="GetBond, destroy">
                    <form id="removeBondModalForm" onsubmit="return false" autocomplete="off">
                        <div class="row bg-label-danger">
                            <div class="col">
                                <label class="border-bottom-2 text-center mb-2 w-100">رقم المقاطعة</label>
                                <div wire:loading wire:target='AddBondModal'
                                    wire:loading.class="d-flex justify-content-center">
                                    <span class="mdi mdi-loading mdi-spin mdi-24px"></span>
                                </div>
                                <div wire:loading.remove wire:target='AddBondModal' class="text-center">
                                    {{ $boycott->boycott_number ?? '' }}</div>
                            </div>

                            <div class="col">
                                <label class="border-bottom-2 text-center mb-2 w-100">اسم المقاطعة</label>
                                <div wire:loading wire:target='AddBondModal'
                                    wire:loading.class="d-flex justify-content-center">
                                    <span class="mdi mdi-loading mdi-spin mdi-24px"></span>
                                </div>
                                <div wire:loading.remove wire:target='AddBondModal' class="text-center">
                                    {{ $boycott->boycott_name ?? '' }}</div>
                            </div>
                        </div>

                        <hr class="">

                        <div Class="row">
                            <div class="col mb-3">
                                <div class="text-center">
                                    <label class="text-danger border-bottom-2 text-center w-100">رقم القطغة</label>
                                    <div>{{ $part_number }}</div>
                                </div>
                            </div>

                            <div class="col mb-3">
                                <div class="text-center">
                                    <label class="text-danger border-bottom-2 text-center w-100">رقم العقار</label>
                                    <div>{{ $property_number }}</div>
                                </div>
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
<!--/ Delete Bond Modal -->

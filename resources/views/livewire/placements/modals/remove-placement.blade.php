<!-- Remove Placement Modal -->
<div wire:ignore.self class="modal fade" id="removeplacementModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">حذف بيانات التنسيب</h3>
                    <p>نافذة الحذف</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetPlacement"
                    wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="destroy" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حذف البيانات...</h5>

                <div wire:loading.remove>
                    <form id="removePlacementModalForm" onsubmit="return false" autocomplete="off">
                        <div class="row row-cols-1">
                            <div class="col mb-3">
                                <div Class="row">

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='worker_id' type="text"
                                            disabled        id="modalPlacementworker_id" placeholder="الاسم"
                                                class="form-control @error('worker_id') is-invalid is-filled @enderror" />
                                            <label for="modalPlacementworker_id">الاسم</label>
                                        </div>
                                        @error('worker_id')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='SectionsName' type="text"
                                        disabled        id="modalPlacementsection_id" placeholder="القسم"
                                                class="form-control @error('section_id') is-invalid is-filled @enderror" />
                                            <label for="modalPlacementsection_id">القسم</label>
                                        </div>
                                        @error('section_id')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <hr class="my-0">
                            <div class="d-flex justify-content-center col-12 demo-vertical-spacing mb-n4">
                                <button wire:click='destroy' type="submit"
                                    class="flex-fill btn btn-danger me-sm-3 me-1">حذف </button>
                                <button type="reset" class="flex-fill btn btn-outline-secondary"
                                    data-bs-dismiss="modal" aria-label="Close">تجاهل</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Delete Placement Modal -->

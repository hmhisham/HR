<!-- Edit Permission Modal -->
<div wire:ignore.self class="modal fade" id="editCategoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="p-3 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تحرير الفئة</h3>
                    <p>نافذة تحرير معلومات الفئات</p>
                </div>

                <hr class="mt-n2">

                <h5 wire:loading wire:target="GetCategory" wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">جار حفظ البيانات...</h5>

                <div wire:loading.remove>
                    <form id="editCategoryForm" class="" onsubmit="return false" autocomplete="off">
                        <div class="row row-cols-2">
                            <div class="mb-3 col col flex-fill">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='name' type="text" id="modalCategoryName"
                                        placeholder="اسم الفئة"
                                        class="form-control @error('name') is-invalid is-filled @enderror" />
                                    <label for="modalCategoryName">اسم الفئة</label>
                                </div>
                                @error('name')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>

                            <div class="mb-3 col flex-fill {{ $KaratGoldCol }}">
                                <div class="form-floating form-floating-outline">
                                    <select wire:model.defer='karat' id="modalkarat" class="form-select @error('karat') is-invalid is-filled @enderror">
                                        <option value=""></option>
                                        @foreach($KaratsGold as $KaratGold)
                                            <option value="{{ $KaratGold->id }}">{{ $KaratGold->karat }}</option>
                                        @endforeach
                                    </select>
                                    <label for="modalkarat">رقم العيار</label>
                                </div>
                                @error('karat')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>
                        <hr class="my-0">

                        <div class="text-center col-12 demo-vertical-spacing mb-n4">
                            <button wire:click='update' type="submit" class="btn btn-primary me-sm-3 me-1">تعديل</button>
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                aria-label="Close">تجاهل</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Edit Permission Modal -->


<!-- Remove Holiday Modal -->
<div wire:ignore.self class="modal fade" id="removeholidayModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">حذف</h3>
                    <p>نافذة الحذف</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetHoliday" wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="destroy" wire:loading.class="d-flex justify-content-center text-primary">جار حذف البيانات...</h5>

                <div wire:loading.remove>
                <form id="removeHolidayModalForm" onsubmit="return false" autocomplete="off">
                    <div class="row row-cols-1">
                        <div class="col mb-3"> 
                         <div Class="row">

                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='calculator_number' type="text" id="modalHolidaycalculator_number" placeholder="رقم الحاسبة"
                        class="form-control @error('calculator_number') is-invalid is-filled @enderror" />
                    <label for="modalHolidaycalculator_number">رقم الحاسبة</label>
                </div>
                @error('calculator_number')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            <div class="mb-3 col">
    <div class="form-floating form-floating-outline">
        <input wire:model.defer="file_path" type="file" id="modalHolidayfile_path"
            placeholder="الملف" accept="pdf,image/*"
            class="form-control @error('file_path') is-invalid is-filled @enderror" />
        <label for="modalHolidayfile_path">الملف</label>
    </div>
    @error('file_path')
        <small class='text-danger inputerror'> {{ $message }} </small>
    @enderror
</div>
<!-- عرض معاينة الصورة إذا تم تحميلها مؤقتًا -->
@if ($file_path && $file_path instanceof \Livewire\TemporaryUploadedFile)
    <div class="mb-3 col">
        <img src="{{ $file_path->temporaryUrl() }}" alt="معاينة الصورة"
            style="max-width: 100%; height: auto;" />
    </div>
@endif
<!-- عرض الصورة المخزنة إذا كانت موجودة -->
@if ($file_path && !$file_path instanceof \Livewire\TemporaryUploadedFile)
    <div class="mb-3 col">
        <img src="{{ asset('storage/' . $file_path) }}" alt="الصورة المخزنة"
            style="max-width: 100%; height: auto;" />
    </div>
@endif

                         </div>
                    </div>
                    <hr class="my-0">
                    <div class="d-flex justify-content-center col-12 demo-vertical-spacing mb-n4">
                            <button wire:click='destroy' type="submit"class="flex-fill btn btn-danger me-sm-3 me-1">حذف </button>
                             <button type="reset" class="flex-fill btn btn-outline-secondary" data-bs-dismiss="modal"
                             aria-label="Close">تجاهل</button>
                        </div>
                   </div>
                </form>
            </div>
        </div>
    </div>
 </div>
</div>
<!--/ Delete Holiday Modal -->

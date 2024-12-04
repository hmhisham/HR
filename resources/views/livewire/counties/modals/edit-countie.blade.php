
<!-- Edite countie Modal -->
<div wire:ignore.self class="modal fade" id="editcountieModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل\ المقاطعات</h3>
                    <p>نافذة التعديل</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="Getcountie" wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">جار حفظ البيانات...</h5>

                <div wire:loading.remove>
                <form id="editcountieModalForm" autocomplete="off">
                    <div class="row row-cols-1">
                        <div class="col mb-3"> 
                         <div Class="row">

                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='user_id' type="text" id="modalcountieuser_id" placeholder="رقم المستخدم"
                        class="form-control @error('user_id') is-invalid is-filled @enderror" />
                    <label for="modalcountieuser_id">رقم المستخدم</label>
                </div>
                @error('user_id')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='district_number' type="text" id="modalcountiedistrict_number" placeholder="رقم المقاطعة"
                        class="form-control @error('district_number') is-invalid is-filled @enderror" />
                    <label for="modalcountiedistrict_number">رقم المقاطعة</label>
                </div>
                @error('district_number')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
              </div>
                            <div Class="row">
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='district_name' type="text" id="modalcountiedistrict_name" placeholder="اسم المقاطعة"
                        class="form-control @error('district_name') is-invalid is-filled @enderror" />
                    <label for="modalcountiedistrict_name">اسم المقاطعة</label>
                </div>
                @error('district_name')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                    </div>
                </div>  </div>
            </div>
            <hr class="my-0">
            <div class="text-center col-12 demo-vertical-spacing mb-n4">
                <button wire:click='update' wire:loading.attr="disabled" type="button" class="btn btn-success me-sm-3 me-1">تعديل</button>
                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                    aria-label="Close">تجاهل</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>
<!--/ Edite countie Modal -->

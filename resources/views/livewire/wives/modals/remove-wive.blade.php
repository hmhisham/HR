
<!-- Remove Wive Modal -->
<div wire:ignore.self class="modal fade" id="removewiveModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">حذف</h3>
                    <p>نافذة الحذف</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetWive" wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="destroy" wire:loading.class="d-flex justify-content-center text-primary">جار حذف البيانات...</h5>

                <div wire:loading.remove>
                <form id="removeWiveModalForm" onsubmit="return false" autocomplete="off">
                    <div class="row row-cols-1">
                        <div class="col mb-3"> 
                         <div Class="row">
  </div>
                                        <div Class="row">
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='full_name' type="text" id="modalWivefull_name" placeholder="الاسم الكامل"
                        class="form-control @error('full_name') is-invalid is-filled @enderror" />
                    <label for="modalWivefull_name">الاسم الكامل</label>
                </div>
                @error('full_name')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='marital_status' type="text" id="modalWivemarital_status" placeholder="الحالة الزوجية"
                        class="form-control @error('marital_status') is-invalid is-filled @enderror" />
                    <label for="modalWivemarital_status">الحالة الزوجية</label>
                </div>
                @error('marital_status')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='occupational_status' type="text" id="modalWiveoccupational_status" placeholder="الحالة المهنية"
                        class="form-control @error('occupational_status') is-invalid is-filled @enderror" />
                    <label for="modalWiveoccupational_status">الحالة المهنية</label>
                </div>
                @error('occupational_status')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='national_id' type="text" id="modalWivenational_id" placeholder="رقم البطاقة الوطنية"
                        class="form-control @error('national_id') is-invalid is-filled @enderror" />
                    <label for="modalWivenational_id">رقم البطاقة الوطنية</label>
                </div>
                @error('national_id')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
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
<!--/ Delete Wive Modal -->

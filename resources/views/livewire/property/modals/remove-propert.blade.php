
<!-- Remove Propert Modal -->
<div wire:ignore.self class="modal fade" id="removepropertModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">\ الأملاكحذف</h3>
                    <p>نافذة الحذف</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetPropert" wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="destroy" wire:loading.class="d-flex justify-content-center text-primary">جار حذف البيانات...</h5>

                <div wire:loading.remove>
                <form id="removePropertModalForm" onsubmit="return false" autocomplete="off">
                    <div class="row row-cols-1">
                        <div class="col mb-3"> 
                         <div Class="row">

                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='worker_id' type="text" id="modalPropertworker_id" placeholder="رقم المستخدم"
                        class="form-control @error('worker_id') is-invalid is-filled @enderror" />
                    <label for="modalPropertworker_id">رقم المستخدم</label>
                </div>
                @error('worker_id')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
              </div>
                                        <div Class="row">
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='bonds_id' type="text" id="modalPropertbonds_id" placeholder="رقم العقار"
                        class="form-control @error('bonds_id') is-invalid is-filled @enderror" />
                    <label for="modalPropertbonds_id">رقم العقار</label>
                </div>
                @error('bonds_id')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='total_amount' type="text" id="modalProperttotal_amount" placeholder="المبلغ الكلي"
                        class="form-control @error('total_amount') is-invalid is-filled @enderror" />
                    <label for="modalProperttotal_amount">المبلغ الكلي</label>
                </div>
                @error('total_amount')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='paid_amount' type="text" id="modalPropertpaid_amount" placeholder="مجموع المسدد"
                        class="form-control @error('paid_amount') is-invalid is-filled @enderror" />
                    <label for="modalPropertpaid_amount">مجموع المسدد</label>
                </div>
                @error('paid_amount')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
              </div>
                                        <div Class="row">
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='property_status' type="text" id="modalPropertproperty_status" placeholder="حالة العقار"
                        class="form-control @error('property_status') is-invalid is-filled @enderror" />
                    <label for="modalPropertproperty_status">حالة العقار</label>
                </div>
                @error('property_status')
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
<!--/ Delete Propert Modal -->

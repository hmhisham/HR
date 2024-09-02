
<!-- Remove dispatc Modal -->
<div wire:ignore.self class="modal fade" id="removedispatcModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">حذف</h3>
                    <p>نافذة الحذف</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="Getdispatc" wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="destroy" wire:loading.class="d-flex justify-content-center text-primary">جار حذف البيانات...</h5>

                <div wire:loading.remove>
                <form id="removedispatcModalForm" onsubmit="return false" autocomplete="off">
                    <div class="row row-cols-1">
                        <div class="col mb-3"> 
                         <div Class="row">

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='calculator_number' type="text" id="modaldispatccalculator_number" placeholder="رقم الحاسبة"
                                            class="form-control @error('calculator_number') is-invalid is-filled @enderror" disabled/>
                                        <label for="modaldispatccalculator_number">رقم الحاسبة</label>
                                    </div>
                                    @error('calculator_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='dispatch_location' type="text" id="modaldispatcdispatch_location" placeholder="مكان الايفاد"
                                            class="form-control @error('dispatch_location') is-invalid is-filled @enderror" disabled/>
                                        <label for="modaldispatcdispatch_location">مكان الايفاد</label>
                                    </div>
                                    @error('dispatch_location')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='travel_date' type="date" id="modaldispatctravel_date" placeholder="تاريخ السفر"
                                            class="form-control @error('travel_date') is-invalid is-filled @enderror" disabled/>
                                        <label for="modaldispatctravel_date">تاريخ السفر</label>
                                    </div>
                                    @error('travel_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='ministerial_order_number' type="text" id="modaldispatcministerial_order_number" placeholder="رقم الأمر الوزاري"
                                            class="form-control @error('ministerial_order_number') is-invalid is-filled @enderror" disabled/>
                                        <label for="modaldispatcministerial_order_number">رقم الأمر الوزاري</label>
                                    </div>
                                    @error('ministerial_order_number')
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
<!--/ Delete dispatc Modal -->

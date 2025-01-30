
<!-- Add Trackin Modal -->
<div wire:ignore.self class="modal fade" id="addtrackinModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">اضافة </h3>
                    <p>نافذة الأضافة </p>
                </div>
                <hr class="mt-n2">
                <form id="addtrackinModalForm" autocomplete="off">
                    <div class="row row-cols-1  ">
                        <div class="col mb-3"> 
                        <div Class="row">

                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='user_id' type="text" id="modalTrackinuser_id" placeholder=""
                        class="form-control @error('user_id') is-invalid is-filled @enderror" />
                    <label for="modalTrackinuser_id"></label>
                </div>
                @error('user_id')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='page_name' type="text" id="modalTrackinpage_name" placeholder="اسم النافذة"
                        class="form-control @error('page_name') is-invalid is-filled @enderror" />
                    <label for="modalTrackinpage_name">اسم النافذة</label>
                </div>
                @error('page_name')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
              </div>
                                    <div Class="row">
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='operation_type' type="text" id="modalTrackinoperation_type" placeholder="نوع العملية"
                        class="form-control @error('operation_type') is-invalid is-filled @enderror" />
                    <label for="modalTrackinoperation_type">نوع العملية</label>
                </div>
                @error('operation_type')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='operation_time' type="text" id="modalTrackinoperation_time" placeholder="وقت العملية"
                        class="form-control @error('operation_time') is-invalid is-filled @enderror" />
                    <label for="modalTrackinoperation_time">وقت العملية</label>
                </div>
                @error('operation_time')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='details' type="text" id="modalTrackindetails" placeholder="تفاصيل العملية"
                        class="form-control @error('details') is-invalid is-filled @enderror" />
                    <label for="modalTrackindetails">تفاصيل العملية</label>
                </div>
                @error('details')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                        </div>
                    </div>
                </div>
                <hr class="my-0">
                <div class="text-center col-12 demo-vertical-spacing mb-n4">
                    <button wire:click='store' wire:loading.attr="disabled" type="button" class="btn btn-primary me-sm-3 me-1">اضافة فئة</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                        aria-label="Close">تجاهل</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!--/ Add Trackin Modal -->


<!-- Add District Modal -->
<div wire:ignore.self class="modal fade" id="adddistrictModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">اضافة </h3>
                    <p>نافذة الأضافة </p>
                </div>
                <hr class="mt-n2">
                <form id="adddistrictModalForm" autocomplete="off">
                    <div class="row row-cols-1  ">
                        <div class="col mb-3">
                        <div Class="row">

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='governorate_id' type="text" id="modalDistrictsgovernorate_id" placeholder="رقم المحافظة"
                                            class="form-control @error('governorate_id') is-invalid is-filled @enderror" />
                                        <label for="modalDistrictsgovernorate_id">رقم المحافظة</label>
                                    </div>
                                    @error('governorate_id')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='district_number' type="text" id="modalDistrictsdistrict_number" placeholder="رقم القضاء"
                                            class="form-control @error('district_number') is-invalid is-filled @enderror" />
                                        <label for="modalDistrictsdistrict_number">رقم القضاء</label>
                                    </div>
                                    @error('district_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='district_name' type="text" id="modalDistrictsdistrict_name" placeholder="اسم القضاء"
                                            class="form-control @error('district_name') is-invalid is-filled @enderror" />
                                        <label for="modalDistrictsdistrict_name">اسم القضاء</label>
                                    </div>
                                    @error('district_name')
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
<!--/ Add District Modal -->
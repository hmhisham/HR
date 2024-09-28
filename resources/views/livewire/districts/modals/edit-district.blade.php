<!-- Edite District Modal -->
<div wire:ignore.self class="modal fade" id="editdistrictModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل</h3>
                    <p>نافذة التعديل</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetDistrict"
                    wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حفظ البيانات...</h5>

                <div wire:loading.remove>
                    <form id="editDistrictModalForm" autocomplete="off">
                        <div class="row row-cols-1">
                            <div class="col mb-3">
                                <div class="row">
                                    <div class="mb-3 col flex-fill {{ $governorates }}">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='governorate_id' id="modalDistrictsgovernorate_id"
                                                class="form-select @error('governorate_id') is-invalid is-filled @enderror">
                                                <option value=""></option>
                                                @foreach ($governorates as $governorate)
                                                    <option value="{{ $governorate->id }}">
                                                        {{ $governorate->governorate_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="modalGovernoratesgovernorate_id">اسم المحافظة</label>
                                        </div>
                                        @error('governorate_id')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="mb-3 col">
                                                <label for="modalDistrictsdistrict_number" class="form-label">رقم
                                                    القضاء</label>
                                                <input wire:model.defer='district_number' type="text"
                                                    id="modalDistrictsdistrict_number" placeholder="رقم القضاء"
                                                    class="form-control @error('district_number') is-invalid is-filled @enderror"
                                                    onkeypress="return onlyNumberKey(event)" />
                                                @error('district_number')
                                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col">
                                                <label for="modalDistrictsdistrict_name" class="form-label">اسم
                                                    القضاء</label>
                                                <input wire:model.defer='district_name' type="text"
                                                    id="modalDistrictsdistrict_name" placeholder="اسم القضاء"
                                                    class="form-control @error('district_name') is-invalid is-filled @enderror" />
                                                @error('district_name')
                                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <hr class="my-0">
                <div class="text-center col-12 demo-vertical-spacing mb-n4">
                    <button wire:click='update' wire:loading.attr="disabled" type="button"
                        class="btn btn-success me-sm-3 me-1">تعديل</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                        aria-label="Close">تجاهل</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ Edite District Modal -->

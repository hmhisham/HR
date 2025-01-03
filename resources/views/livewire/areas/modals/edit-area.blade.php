<!-- Edit Area Modal -->
<div wire:ignore.self class="modal fade" id="editareaModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل اسم الناحية</h3>
                    <p>نافذة التعديل</p>
                </div>

                <hr class="mt-n2">

                <h5 wire:loading wire:target="GetArea" wire:loading.class="d-flex justify-content-center text-primary">
                    جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حفظ البيانات...</h5>

                <div wire:loading.remove wire:target="GetArea, update">
                    <form id="editAreaModalForm" autocomplete="off">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 mb-3">
                                <div class="form-floating form-floating-outline">
                                    <select wire:model.defer='governorate_id' id="editGovernorate"
                                        class="form-select
                                                @error('governorate_id') is-invalid is-filled @enderror"
                                        disabled>
                                        <option value=""></option>
                                        @foreach ($governorates as $governorate)
                                            <option value="{{ $governorate->id }}">
                                                {{ $governorate->governorate_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="modalAreasgovernorate_id">اسم المحافظة</label>
                                </div>
                                @error('governorate_id')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 mb-3">
                                <div class="form-floating form-floating-outline">
                                    <select wire:model.defer='district_id' id="editDistrict"
                                        class="form-select @error('district_id') is-invalid is-filled @enderror">
                                        <option value=""></option>
                                        @foreach ($Districts as $district)
                                            <option value="{{ $district->id }}">
                                                {{ $district->district_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="modalAreasdistrict_id">اسم القضاء</label>
                                </div>
                                @error('district_id')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='area_id' type="text" id="area_id"
                                        placeholder="رقم الناحية"
                                        class="form-control @error('area_id') is-invalid is-filled @enderror"
                                        onkeypress="return onlyNumberKey(event)" />
                                    <label for="area_id">رقم الناحية</label>
                                </div>
                                @error('area_id')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='area_name' type="text" id="modalAreaarea_name"
                                        placeholder="اسم الناحية"
                                        class="form-control @error('area_name') is-invalid is-filled @enderror"
                                        onkeypress="return onlyArabicKey(event)" />
                                    <label for="modalAreaarea_name">اسم الناحية</label>
                                </div>
                                @error('area_name')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>

                        <hr class="my-0">

                        <div class="text-center col-12 demo-vertical-spacing mb-n4">
                            <button wire:click='update' wire:loading.attr="disabled" type="button"
                                class="btn btn-primary me-sm-3 me-1">تعديل</button>
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                aria-label="Close">تجاهل</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Edit Area Modal -->

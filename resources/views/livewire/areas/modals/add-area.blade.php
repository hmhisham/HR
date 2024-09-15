<!-- Add Area Modal -->
<div wire:ignore.self class="modal fade" id="addareaModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">اضافة </h3>
                    <p>نافذة الأضافة </p>
                </div>
                <hr class="mt-n2">
                <form id="addareaModalForm" autocomplete="off">
                    <div class="row row-cols-1">
                        <div class="mb-3 col">
                            <div class="row">




                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <select wire:model.defer='governorate_id' wire:change='chooseGovernorate' id="modalAreasgovernorate_id" class="form-select @error('governorate_id') is-invalid is-filled @enderror">
                                            <option value=""></option>
                                            @foreach ($governorates as $governorate)
                                            <option value="{{ $governorate->id }}">{{ $governorate->governorate_name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="modalGovernoratesgovernorate_id">المحافظة</label>
                                    </div>
                                    @error('governorate_id')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>



                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <select wire:model.defer='district_id' id="modalAreasdistrict_id" class="form-select @error('district_id') is-invalid is-filled @enderror">
                                            <option value=""></option>
                                            @foreach ($Districts as $District)
                                            <option value="{{ $District->id }}">{{ $District->district_name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="modalAreasdistrict_id">القضاء</label>
                                    </div>
                                    @error('district_id')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>



                            <div class="row">
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='area_id' type="text" id="modalAreasarea_id" placeholder="رقم الناحية" class="form-control @error('area_id') is-invalid is-filled @enderror" />
                                        <label for="modalAreasarea_id">رقم الناحية</label>
                                    </div>
                                    @error('area_id')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='area_name' type="text" id="modalAreasarea_name" placeholder="اسم الناحية" class="form-control @error('area_name') is-invalid is-filled @enderror" />
                                        <label for="modalAreasarea_name">اسم الناحية</label>
                                    </div>
                                    @error('area_name')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <hr class="my-0">
                        <div class="text-center col-12 demo-vertical-spacing mb-n4">
                            <button wire:click='store' wire:loading.attr="disabled" type="button" class="btn btn-primary me-sm-3 me-1">اضافة فئة</button>
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">تجاهل</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ Add Area Modal -->

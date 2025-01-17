<!-- Add Province Modal -->
<div wire:ignore.self class="modal fade" id="addprovinceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">اضافة مقاطعة جديدة</h3>
                    <p>نافذة الأضافة </p>
                </div>

                <hr class="mt-n2">

                <form id="addprovinceModalForm" autocomplete="off">
                    <div Class="row">
                        <div class="mb-3 col">
                            <div class="form-floating form-floating-outline">
                                <input wire:model.defer='province_number' type="text"
                                    id="modalProvinceprovince_number" placeholder="رقم المقاطعة"
                                    class="form-control @error('province_number') is-invalid is-filled @enderror"
                                    onkeypress="return onlyNumberKey(event)" />
                                <label for="modalProvinceprovince_number">رقم المقاطعة</label>
                            </div>
                            @error('province_number')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div Class="row">
                        <div class="mb-3 col">
                            <div class="form-floating form-floating-outline">
                                <input wire:model.defer='province_name' type="text" id="modalProvinceprovince_name"
                                    placeholder="اسم المقاطعة"
                                    class="form-control @error('province_name') is-invalid is-filled @enderror"
                                    onkeypress="return onlyArabicKey(event)" />
                                <label for="modalProvinceprovince_name">اسم المقاطعة</label>
                            </div>
                            @error('province_name')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                            @enderror
                        </div>

                    </div>
                   {{--  <div Class="row">
                        <div class="mb-3 col">
                            <div class="form-floating form-floating-outline">
                                <select wire:model.defer='section_id' id="addProvincesection_id"
                                    class="form-select @error('section_id') is-invalid is-filled @enderror" wire:ignore>
                                    <option value=""></option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                                    @endforeach
                                </select>
                                <label for="modalProvincesection_id">اسم القسم</label>
                            </div>
                            @error('section_id')
                                <small class='text-danger inputerror'>{{ $message }}</small>
                            @enderror
                        </div>
                    </div> --}}

                    <hr class="my-0">

                    <div class="text-center col-12 demo-vertical-spacing mb-n4">
                        <button wire:click='store' wire:loading.attr="disabled" type="button"
                            class="btn btn-primary me-sm-3 me-1">اضافة</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                            aria-label="Close">تجاهل</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ Add Province Modal -->

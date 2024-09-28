<!-- Edite Unit Modal -->
<div wire:ignore.self class="modal fade" id="editunitModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل الوحدة</h3>
                    <p>نافذة التعديل</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetUnit" wire:loading.class="d-flex justify-content-center text-primary">
                    جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حفظ البيانات...</h5>
                <div wire:loading.remove>
                    <form id="editUnitModalForm" autocomplete="off">
                        <div class="row row-cols-1">
                            <div class="col mb-3">
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='section_id' id="edit_section_id"
                                                {{-- wire:change='sectionid($event.target.value)' --}}
                                                class="form-select @error('section_id') is-invalid is-filled @enderror">
                                                <option value="">اختر القسم</option>
                                                @foreach ($sections as $section)
                                                    <option value="{{ $section->id }}">{{ $section->section_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="section_id">اسم القسم</label>
                                        </div>
                                        @error('section_id')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='branch_id' id="modalUnitsbranch_id"
                                                class="form-select @error('branch_id') is-invalid is-filled @enderror">
                                                <option value="">اختر الشعبة</option>
                                                @foreach ($branch as $branc)
                                                    <option value="{{ $branc->id }}">{{ $branc->branch_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="modalUnitsbranch_id">اسم الشعبة</label>
                                        </div>
                                        @error('branch_id')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='units_name' type="text" id="modalUnitunits_name"
                                                placeholder="اسم الوحدة"
                                                class="form-control @error('units_name') is-invalid is-filled @enderror" />
                                            <label for="modalUnitunits_name">اسم الوحدة</label>
                                        </div>
                                        @error('units_name')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
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
</div>
<!--/ Edite Unit Modal -->

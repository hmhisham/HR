<!-- Edite Branc Modal -->
<div wire:ignore.self class="modal fade" id="editbrancModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل الشعبة</h3>
                    <p>نافذة التعديل</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetBranc" wire:loading.class="d-flex justify-content-center text-primary">
                    جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حفظ البيانات...</h5>
                <div wire:loading.remove>
                    <form id="editBrancModalForm" autocomplete="off">
                        <div class="row row-cols-1">
                            <div class="col mb-3">
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='linkage_id'
                                                wire:change='LinkageId($event.target.value)' id="linkage_id"
                                                class="form-select @error('linkage_id') is-invalid is-filled @enderror"
                                                disabled>
                                                <option value="">اختر الارتباط</option>
                                                @foreach ($linkages as $linkage)
                                                    <option value="{{ $linkage->id }}">{{ $linkage->Linkages_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="linkage_id">اسم الارتباط</label>
                                        </div>
                                        @error('linkage_id')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='section_id' id="modalBranchsection_id"
                                                class="form-select @error('section_id') is-invalid is-filled @enderror"
                                                disabled>
                                                <option value="">اختر القسم</option>
                                                @foreach ($sections as $section)
                                                    <option value="{{ $section->id }}">{{ $section->section_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="modalBranchsection_id">اسم القسم</label>
                                        </div>
                                        @error('section_id')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='branch_name' type="text"
                                                id="modalBrancbranch_name" placeholder="اسم الشعبة"
                                                class="form-control @error('branch_name') is-invalid is-filled @enderror" />
                                            <label for="modalBrancbranch_name">اسم الشعبة</label>
                                        </div>
                                        @error('branch_name')
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
<!--/ Edite Branc Modal -->

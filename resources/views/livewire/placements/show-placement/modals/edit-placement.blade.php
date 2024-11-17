<!-- Edite Placement Modal -->
<div wire:ignore.self class="modal fade" id="editplacementModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل تنسيب الموظف</h3>
                    <p>نافذة التعديل</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetPlacement" wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حفظ البيانات...</h5>
                <div wire:loading.remove wire:target="GetPlacement, update">
                    <form id="editPlacementModalForm" autocomplete="off">
                        <div class="col mb-3">
                            <div Class="row">
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <select wire:model.defer='linkage_id' id="editLinkage"
                                            class="form-select @error('linkage_id') is-invalid is-filled @enderror">
                                            <option value="">اختر جهة الارتباط</option>
                                            @foreach ($linkages as $linkage)
                                                <option value="{{ $linkage->id }}">{{ $linkage->Linkages_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="modalPositionlinkage_id">الارتباط</label>
                                    </div>
                                    @error('linkage_id')
                                        <small class='text-danger inputerror'>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <select wire:model.defer='section_id' id="editSection"
                                            class="form-select @error('section_id') is-invalid is-filled @enderror">
                                            <option value="">اختر القسم</option>
                                            @foreach ($sections as $section)
                                                <option value="{{ $section->id }}">{{ $section->section_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="modalPositionsection_id">القسم</label>
                                    </div>
                                    @error('section_id')
                                        <small class='text-danger inputerror'>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <select wire:model.defer='branch_id' id="editBranch"
                                            class="form-select @error('branch_id') is-invalid is-filled @enderror">
                                            <option value="">اختر الشعبة</option>
                                            @foreach ($branch as $branc)
                                                <option value="{{ $branc->id }}">{{ $branc->branch_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="modalPositionbranch_id">الشعبة</label>
                                    </div>
                                    @error('branch_id')
                                        <small class='text-danger inputerror'>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <select wire:model.defer='unit_id' id="editUnit"
                                            class="form-select @error('unit_id') is-invalid is-filled @enderror">
                                            <option value="">اختر الوحدة</option>
                                            @foreach ($units as $unit)
                                                <option value="{{ $unit->id }}">{{ $unit->units_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="modalPositionunit_id">الوحدة</label>
                                    </div>
                                    @error('unit_id')
                                        <small class='text-danger inputerror'>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div Class="row">
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='placement_order_number' type="text"
                                            id="modalPlacementplacement_order_number" placeholder="رقم أمر التنسيب"
                                            class="form-control @error('placement_order_number') is-invalid is-filled @enderror"
                                            onkeypress="return onlyNumberKey(event)" />
                                        <label for="modalPlacementplacement_order_number">رقم أمر
                                            التنسيب</label>
                                    </div>
                                    @error('placement_order_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='placement_order_date' type="date"
                                            id="editplacement_order_date" placeholder="تاريخ أمر التنسيب"
                                            class="form-control @error('placement_order_date') is-invalid is-filled @enderror" />
                                        <label for="modalPlacementplacement_order_date">تاريخ أمر
                                            التنسيب</label>
                                    </div>
                                    @error('placement_order_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='release_date' type="date" id="editrelease_date"
                                            placeholder="تاريخ الانفكاك"
                                            class="form-control @error('release_date') is-invalid is-filled @enderror" />
                                        <label for="modalPlacementrelease_date">تاريخ الانفكاك</label>
                                    </div>
                                    @error('release_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='start_date' type="date" id="editstart_date"
                                            placeholder="تاريخ المباشرة"
                                            class="form-control @error('start_date') is-invalid is-filled @enderror" />
                                        <label for="modalPlacementstart_date">تاريخ المباشرة</label>
                                    </div>
                                    @error('start_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
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
<!--/ Edite Placement Modal -->

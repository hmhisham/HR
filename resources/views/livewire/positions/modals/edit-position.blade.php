<!-- Edite Position Modal -->
<div wire:ignore.self class="modal fade" id="editpositionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل بيانات المنصب</h3>
                    <p>نافذة التعديل</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetPosition"
                    wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حفظ البيانات...</h5>
                <div wire:loading.remove wire:target="GetPosition">
                    <form id="editPositionModalForm" autocomplete="off">
                        <div Class="row">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <select wire:model.defer='worker_id' id="editPositionworker_id"
                                        class="form-select @error('worker_id') is-invalid is-filled @enderror">
                                        <option value=""></option>
                                        @foreach ($workers as $worker)
                                            <option value="{{ $worker->id }}">{{ $worker->full_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="modalPositionworker_id">الاسم الكامل</label>
                                </div>
                                @error('worker_id')
                                    <small class='text-danger inputerror'>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
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
                                    <select wire:model.defer='position_name' id="modalPositionposition_name"
                                        class="form-select @error('position_name') is-invalid is-filled @enderror">
                                        <option value="">اختر المنصب</option>
                                        <option value="وكيل وزير">وكيل وزير</option>
                                        <option value="مدير عام">مدير عام</option>
                                        <option value="معاون مدير عام">معاون مدير عام</option>
                                        <option value="رئيس هيئة">رئيس هيئة</option>
                                        <option value="مدير تشكيل">مدير تشكيل</option>
                                        <option value="معاون مدير تشكيل">معاون مدير تشكيل</option>
                                        <option value="مدير قسم">مدير قسم</option>
                                        <option value="معاون مدير قسم">معاون مدير قسم</option>
                                        <option value="مسؤول شعبة">مسؤول شعبة</option>
                                        <option value="معاون مسؤول شعبة">معاون مسؤول شعبة</option>
                                        <option value="مسؤول وحدة">مسؤول وحدة</option>
                                    </select>
                                    <label for="modalPositionposition_name">اسم المنصب</label>
                                </div>
                                @error('position_name')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='position_order_number' type="text"
                                        id="modalPositionposition_order_number" placeholder="رقم أمر التكليف"
                                        class="form-control @error('position_order_number') is-invalid is-filled @enderror"
                                        onkeypress="return onlyNumberKey(event)" />
                                    <label for="modalPositionposition_order_number">رقم أمر التكليف</label>
                                </div>
                                @error('position_order_number')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='position_order_date' type="date"
                                        id="editposition_order_date" placeholder="تاريخ أمر التكليف"
                                        class="form-control @error('position_order_date') is-invalid is-filled @enderror" />
                                    <label for="modalPositionposition_order_date">تاريخ أمر التكليف</label>
                                </div>
                                @error('position_order_date')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='position_start_date' type="date"
                                        id="editposition_start_date" placeholder="تاريخ المباشرة بالمنصب"
                                        class="form-control @error('position_start_date') is-invalid is-filled @enderror" />
                                    <label for="modalPositionposition_start_date">تاريخ المباشرة
                                        بالمنصب</label>
                                </div>
                                @error('position_start_date')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>
                        <div Class="row">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <select wire:model.defer='commissioning_type' id="modalPositioncommissioning_type"
                                        class="form-select @error('commissioning_type') is-invalid is-filled @enderror">
                                        <option value="">التكليف</option>
                                        <option value="اصالة">اصالة</option>
                                        <option value="وكالة">وكالة</option>
                                    </select>
                                    <label for="modalPositioncommissioning_type">التكليف</label>
                                </div>
                                @error('commissioning_type')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <select wire:model.defer='commissioning_statu'
                                        id="modalPositioncommissioning_statu"
                                        class="form-select @error('commissioning_statu') is-invalid is-filled @enderror">
                                        <option value="">حالة التكليف</option>
                                        <option value="مستمر">مستمر</option>
                                        <option value="اعفاء">اعفاء</option>
                                    </select>
                                    <label for="modalPositioncommissioning_statu">حالة التكليف</label>
                                </div>
                                @error('commissioning_statu')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>
                        <div Class="row">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='p_notes' type="text" id="modalPositionp_notes"
                                        placeholder="ملاحظات"
                                        class="form-control @error('p_notes') is-invalid is-filled @enderror" />
                                    <label for="modalPositionp_notes">ملاحظات</label>
                                </div>
                                @error('p_notes')
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
<!--/ Edite Position Modal -->

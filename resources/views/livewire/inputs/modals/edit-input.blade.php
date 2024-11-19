<!-- Edite Input Modal -->
<div wire:ignore.self class="modal fade" id="editinputModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل قيد اليومية</h3>
                    <p>نافذة التعديل</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetInput" wire:loading.class="d-flex justify-content-center text-primary">
                    جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حفظ البيانات...</h5>

                <div wire:loading.remove>
                    <form id="editInputModalForm" autocomplete="off">
                        <div Class="row">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='patch' type="text" id="modalInputpatch"
                                        placeholder="رقم الزرمة"
                                        class="form-control @error('patch') is-invalid is-filled @enderror"
                                        onkeypress="return onlyNumberKey(event)" />
                                    <label for="modalInputpatch">رقم الزرمة</label>
                                </div>
                                @error('patch')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>

                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <select wire:ignore wire:model.defer='itype' id="editInputitype"
                                        class="form-select @error('itype') is-invalid is-filled @enderror">
                                        <option value=""></option>
                                        @foreach ($itypes as $itype)
                                            <option value="{{ $itype->id }}">{{ $itype->itype }}</option>
                                        @endforeach
                                    </select>
                                    <label for="editInputitype">نوع القيد</label>
                                </div>
                                @error('itype')
                                    <small class='text-danger inputerror'>{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='idocument' type="text" id="modalInputidocument"
                                        placeholder="رقم المستند"
                                        class="form-control @error('idocument') is-invalid is-filled @enderror"
                                        onkeypress="return onlyNumberKey(event)" maxlength="6" />
                                    <label for="modalInputidocument">رقم المستند</label>
                                </div>
                                @error('idocument')
                                    <small class='text-danger inputerror'>{{ $message }} </small>
                                @enderror
                            </div>


                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='idate' type="date" id="editmodalInputidate"
                                        placeholder="تاريخ المستند"
                                        class="form-control @error('idate') is-invalid is-filled @enderror" />
                                    <label for="modalInputidate">تاريخ المستند</label>
                                </div>
                                @error('idate')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>
                        <div Class="row">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='idept' type="text" id="modalInputidept"
                                        placeholder="مبلغ المدين"
                                        class="form-control @error('idept') is-invalid is-filled @enderror"
                                        onkeypress="return onlyNumberKey1(event)" data-type="number" />
                                    <label for="modalInputidept">مبلغ المدين</label>
                                </div>
                                @error('idept')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>

                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='icredt' type="text" id="modalInputicredt"
                                        placeholder="مبلغ الدائن"
                                        class="form-control @error('icredt') is-invalid is-filled @enderror"
                                        onkeypress="return onlyNumberKey1(event)" data-type="number" />
                                    <label for="modalInputicredt">مبلغ الدائن</label>
                                </div>
                                @error('icredt')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>
                        <div Class="row">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <select wire:ignore wire:model.defer='iacct' id="editInputiacct"
                                        class="form-select @error('iacct') is-invalid is-filled @enderror">
                                        <option value=""></option>
                                        @foreach ($iaccts as $iacct)
                                            <option value="{{ $iacct->id }}">{{ $iacct->iacct }}</option>
                                        @endforeach
                                    </select>
                                    <label for="editInputiacct">الدليل</label>
                                </div>
                                @error('iacct')
                                    <small class='text-danger inputerror'>{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='isub' type="text" id="modalInputisub"
                                        placeholder="الافرادي"
                                        class="form-control @error('isub') is-invalid is-filled @enderror"
                                        onkeypress="return onlyNumberKey(event)" />
                                    <label for="modalInputisub">الافرادي</label>
                                </div>
                                @error('isub')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>

                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='icd' type="text" id="modalInputicd"
                                        placeholder="بداية الدليل"
                                        class="form-control @error('icd') is-invalid is-filled @enderror" disabled />
                                    <label for="modalInputicd">بداية الدليل</label>
                                </div>
                                @error('icd')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>
                        <div Class="row">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <select wire:ignore wire:model.defer='idepartment' id="editInputidepartment"
                                        class="form-select @error('idepartment') is-invalid is-filled @enderror">
                                        <option value=""></option>
                                        @foreach ($idepartments as $idepartment)
                                            <option value="{{ $idepartment->id }}">
                                                {{ $idepartment->idepartmentcname }}</option>
                                        @endforeach
                                    </select>
                                    <label for="editInputidepartment">القسم</label>
                                </div>
                                @error('idepartment')
                                    <small class='text-danger inputerror'>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div Class="row">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='irem' type="text" id="modalInputirem"
                                        placeholder="البيان"
                                        class="form-control @error('irem') is-invalid is-filled @enderror"
                                        onkeypress="return onlyArabicKey(event)" />
                                    <label for="modalInputirem">البيان</label>
                                </div>
                                @error('irem')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>

                        <div Class="row">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='note' type="text" id="modalInputnote"
                                        placeholder="ملاحظات"
                                        class="form-control @error('note') is-invalid is-filled @enderror" />
                                    <label for="modalInputnote">ملاحظات</label>
                                </div>
                                @error('note')
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
<!--/ Edite Input Modal -->

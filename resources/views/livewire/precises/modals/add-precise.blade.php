<!-- Add Precise Modal -->
<div wire:ignore.self class="modal fade" id="addpreciseModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">اضافة تخصص دقيق جديد</h3>
                    <p>نافذة الأضافة </p>
                </div>
                <hr class="mt-n2">
                <form id="addpreciseModalForm" autocomplete="off">
                    <div class="row row-cols-1  ">
                        <div class="col mb-3">
                            <div Class="row">
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <select wire:model.defer='specialtys_id' id="addPrecisespecialtys_id"
                                            class="form-select @error('specialtys_id') is-invalid is-filled @enderror">
                                            <option value=""></option>
                                            @foreach ($specialtys as $specialty)
                                                <option value="{{ $specialty->id }}">{{ $specialty->specialtys_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="modalPrecisespecialtys_id">التخصص العام</label>
                                    </div>
                                    @error('specialtys_id')
                                        <small class='text-danger inputerror'>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div Class="row">
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='precises_code' type="text"
                                            id="modalPrecisesprecises_code" placeholder="الرمز"
                                            class="form-control @error('precises_code') is-invalid is-filled @enderror"
                                            onkeypress="return onlyNumberKey(event)" />
                                        <label for="modalPrecisesprecises_code">الرمز</label>
                                    </div>
                                    @error('precises_code')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='precises_name' type="text"
                                            id="modalPrecisesprecises_name" placeholder="التخصص الدقيق"
                                            class="form-control @error('precises_name') is-invalid is-filled @enderror"
                                            onkeypress="return onlyArabicKey(event)" />
                                        <label for="modalPrecisesprecises_name">التخصص الدقيق</label>
                                    </div>
                                    @error('precises_name')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                            <hr class="my-0">
                            <div class="text-center col-12 demo-vertical-spacing mb-n4">
                                <button wire:click='store' wire:loading.attr="disabled" type="button"
                                    class="btn btn-primary me-sm-3 me-1">اضافة</button>
                                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                    aria-label="Close">تجاهل</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ Add Precise Modal -->

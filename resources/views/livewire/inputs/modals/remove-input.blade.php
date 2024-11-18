<!-- Remove Input Modal -->
<div wire:ignore.self class="modal fade" id="removeinputModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">حذف قيد اليومية</h3>
                    <p>نافذة الحذف</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetInput" wire:loading.class="d-flex justify-content-center text-primary">
                    جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="destroy" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حذف البيانات...</h5>

                <div wire:loading.remove>
                    <form id="removeInputModalForm" onsubmit="return false" autocomplete="off">
                        <div class="row row-cols-1">
                            <div class="col mb-3">
                                <div Class="row">

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='patch' type="text" id="modalInputpatch"
                                                placeholder="رقم الزرمة"
                                                class="form-control @error('patch') is-invalid is-filled @enderror" />
                                            <label for="modalInputpatch">رقم الزرمة</label>
                                        </div>
                                        @error('patch')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='itype' type="text" id="modalInputitype"
                                                placeholder="نوع القيد"
                                                class="form-control @error('itype') is-invalid is-filled @enderror" />
                                            <label for="modalInputitype">نوع القيد</label>
                                        </div>
                                        @error('itype')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='idocument' type="text" id="modalInputidocument"
                                                placeholder="رقم المستند"
                                                class="form-control @error('idocument') is-invalid is-filled @enderror" />
                                            <label for="modalInputidocument">رقم المستند</label>
                                        </div>
                                        @error('idocument')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='idate' type="date" id="modalInputidate"
                                                placeholder="تاريخ المستند"
                                                class="form-control @error('idate') is-invalid is-filled @enderror" />
                                            <label for="modalInputidate">تاريخ المستند</label>
                                        </div>
                                        @error('idate')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <hr class="my-0">
                            <div class="d-flex justify-content-center col-12 demo-vertical-spacing mb-n4">
                                <button wire:click='destroy'
                                    type="submit"class="flex-fill btn btn-danger me-sm-3 me-1">حذف </button>
                                <button type="reset" class="flex-fill btn btn-outline-secondary"
                                    data-bs-dismiss="modal" aria-label="Close">تجاهل</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Delete Input Modal -->

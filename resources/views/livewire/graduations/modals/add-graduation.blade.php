<!-- Add Graduation Modal -->
<div wire:ignore.self class="modal fade" id="addgraduationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">اضافة جهة تخرج جديدة</h3>
                    <p>نافذة الأضافة </p>
                </div>
                <hr class="mt-n2">
                <form id="addgraduationModalForm" autocomplete="off">
                    <div class="row row-cols-1  ">
                        <div class="col mb-3">
                            <div Class="row">
                                <div class="mb-3 col flex-fill {{ $certificates }}">
                                    <div class="form-floating form-floating-outline">
                                        <select wire:model.defer='certificates_id' id="modalGraduationscertificates_id"
                                            class="form-select @error('certificates_id') is-invalid is-filled @enderror">
                                            <option value="">اختر الشهادة</option>
                                            @foreach ($certificates as $certificate)
                                                <option value="{{ $certificate->id }}">
                                                    {{ $certificate->certificates_name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="modalGraduationscertificates_id">الشهادة</label>
                                    </div>
                                    @error('certificates_id')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='graduations_name' type="text"
                                            id="modalGraduationsgraduations_name" placeholder="جهة التخرج"
                                            class="form-control @error('graduations_name') is-invalid is-filled @enderror" />
                                        <label for="modalGraduationsgraduations_name">جهة التخرج</label>
                                    </div>
                                    @error('graduations_name')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
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
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ Add Graduation Modal -->

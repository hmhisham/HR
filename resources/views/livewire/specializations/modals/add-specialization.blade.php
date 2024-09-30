<!-- Add Specialization Modal -->
<div wire:ignore.self class="modal fade" id="addspecializationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">اضافة اختصاص جديد</h3>
                    <p>نافذة الأضافة </p>
                </div>
                <hr class="mt-n2">
                <form id="addspecializationModalForm" autocomplete="off">
                    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2">
                        <div class="mb-3 col ">
                            <div class="form-floating form-floating-outline">
                                <select wire:model.defer='certificates_id' wire:change='chooseCertificate'
                                    id="addmodalSpecializationscertificates_id"
                                    class="form-select @error('certificates_id') is-invalid is-filled @enderror">
                                    <option value="">اختر الشهادة</option>
                                    @foreach ($certificates as $certificate)
                                        <option value="{{ $certificate->id }}">
                                            {{ $certificate->certificates_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="modalSpecializationscertificates_id">الشهادة</label>
                            </div>
                            @error('certificates_id')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="mb-3 col">
                            <div class="form-floating form-floating-outline">
                                <select wire:model.defer='graduations_id' id="addgraduations"
                                    class="form-select @error('graduations_id') is-invalid is-filled @enderror">
                                    <option value="">اختر جهة التخرج</option>
                                    @foreach ($graduations as $graduation)
                                        <option value="{{ $graduation->id }}">{{ $graduation->graduations_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="modalSpecializationgraduations_id">جهة التخرج</label>
                            </div>
                            @error('graduations_id')
                                <small class='text-danger inputerror'>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 col flex-fill">
                            <div class="form-floating form-floating-outline">
                                <input wire:model.defer='specializations_name' type="text"
                                    id="addmodalSpecializationsspecializations_name" placeholder="الاختصاص"
                                    class="form-control @error('specializations_name') is-invalid is-filled @enderror" />
                                <label for="modalSpecializationsspecializations_name">الاختصاص</label>
                            </div>
                            @error('specializations_name')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="text-center col-12 demo-vertical-spacing mb-n4">
                        <button wire:click='store' wire:loading.attr="disabled" type="button"
                            class="btn btn-primary me-sm-3 me-1">اضافة فئة</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                            aria-label="Close">تجاهل</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ Add Specialization Modal -->

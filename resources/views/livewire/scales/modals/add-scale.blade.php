<!-- Add Scale Modal -->
<div wire:ignore.self class="modal fade" id="addscaleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">اضافة </h3>
                    <p>نافذة الأضافة </p>
                </div>
                <hr class="mt-n2">
                <form id="addscaleModalForm" autocomplete="off">
                    <div class="row row-cols-1  ">
                        <div class="col mb-3">
                            <div Class="row">

                                <div class="mb-3 col flex-fill {{ $grades }}">
                                    <div class="form-floating form-floating-outline">
                                        <select wire:model.defer='grades_id' id="modalScalesgrades_id"
                                            class="form-select @error('grades_id') is-invalid is-filled @enderror">
                                            <option value=""></option>
                                            @foreach ($grades as $grade)
                                                <option value="{{ $grade->id }}">{{ $grade->grades_name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="modalScalesgrades_id">الدرجة</label>
                                    </div>
                                    @error('grades_id')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='scales_phase' type="text"
                                            id="modalScalesscales_phase" placeholder="المرحلة"
                                            class="form-control @error('scales_phase') is-invalid is-filled @enderror" />
                                        <label for="modalScalesscales_phase">المرحلة</label>
                                    </div>
                                    @error('scales_phase')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                            <div Class="row">
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='scales_salary' type="text"
                                            id="modalScalesscales_salary" placeholder="الراتب"
                                            class="form-control @error('scales_salary') is-invalid is-filled @enderror" />
                                        <label for="modalScalesscales_salary">الراتب</label>
                                    </div>
                                    @error('scales_salary')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='scales_quantity' type="text"
                                            id="modalScalesscales_quantity" placeholder="مقدار الزيادة"
                                            class="form-control @error('scales_quantity') is-invalid is-filled @enderror" />
                                        <label for="modalScalesscales_quantity">مقدار الزيادة</label>
                                    </div>
                                    @error('scales_quantity')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='scales_period' type="text"
                                            id="modalScalesscales_period" placeholder="مدة اصغرية"
                                            class="form-control @error('scales_period') is-invalid is-filled @enderror" />
                                        <label for="modalScalesscales_period">مدة اصغرية</label>
                                    </div>
                                    @error('scales_period')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                            </div>
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
<!--/ Add Scale Modal -->

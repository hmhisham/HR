<!-- Edite Scale Modal -->
<div wire:ignore.self class="modal fade" id="editscaleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل</h3>
                    <p>نافذة التعديل</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetScale" wire:loading.class="d-flex justify-content-center text-primary">
                    جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حفظ البيانات...</h5>

                <div wire:loading.remove>
                    <form id="editScaleModalForm" autocomplete="off">
                        <div class="row row-cols-1">
                            <div class="col mb-3">
                                '<Div Class="row">

                                    <div class="mb-3 col flex-fill {{ $grades }}">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='grades_id' id="modalScalesgrades_id"
                                                class="form-select @error('grades_id') is-invalid is-filled @enderror">
                                                <option value=""></option>
                                                @foreach ($grades as $grade)
                                                    <option value="{{ $grade->id }}">{{ $grade->grades_name }}
                                                    </option>
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
                                                id="modalScalescales_phase" placeholder="المرحلة"
                                                class="form-control @error('scales_phase') is-invalid is-filled @enderror" />
                                            <label for="modalScalescales_phase">المرحلة</label>
                                        </div>
                                        @error('scales_phase')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <Div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='scales_salary' type="text"
                                                id="modalScalescales_salary" placeholder="الراتب"
                                                class="form-control @error('scales_salary') is-invalid is-filled @enderror" />
                                            <label for="modalScalescales_salary">الراتب</label>
                                        </div>
                                        @error('scales_salary')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='scales_quantity' type="text"
                                                id="modalScalescales_quantity" placeholder="مقدار الزيادة"
                                                class="form-control @error('scales_quantity') is-invalid is-filled @enderror" />
                                            <label for="modalScalescales_quantity">مقدار الزيادة</label>
                                        </div>
                                        @error('scales_quantity')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='scales_period' type="text"
                                                id="modalScalescales_period" placeholder="مدة اصغرية"
                                                class="form-control @error('scales_period') is-invalid is-filled @enderror" />
                                            <label for="modalScalescales_period">مدة اصغرية</label>
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
<!--/ Edite Scale Modal -->

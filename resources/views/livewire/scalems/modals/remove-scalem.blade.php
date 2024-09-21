<!-- Remove Scalem Modal -->
<div wire:ignore.self class="modal fade" id="removescalemModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">حذف</h3>
                    <p>نافذة الحذف</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetScalem"
                    wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="destroy" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حذف البيانات...</h5>

                <div wire:loading.remove>
                    <form id="removeScalemModalForm" onsubmit="return false" autocomplete="off">
                        <div class="row row-cols-1">
                            <div class="col mb-3">
                                <div Class="row">
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='scalems_salary_grade' type="text"
                                                id="modalScalemscalems_salary_grade" placeholder="درجة الراتب"
                                              disabled  class="form-control @error('scalems_salary_grade') is-invalid is-filled @enderror" />
                                            <label for="modalScalemscalems_salary_grade">درجة الراتب</label>
                                        </div>
                                        @error('scalems_salary_grade')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='scalems_salary_stage' type="text"
                                            disabled  id="modalScalemscalems_salary_stage" placeholder="مرحلة الراتب"
                                                class="form-control @error('scalems_salary_stage') is-invalid is-filled @enderror" />
                                            <label for="modalScalemscalems_salary_stage">مرحلة الراتب</label>
                                        </div>
                                        @error('scalems_salary_stage')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='scalems_salary' type="text"
                                            disabled  id="modalScalemscalems_salary" placeholder="الراتب"
                                                class="form-control @error('scalems_salary') is-invalid is-filled @enderror" />
                                            <label for="modalScalemscalems_salary">الراتب</label>
                                        </div>
                                        @error('scalems_salary')
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
<!--/ Delete Scalem Modal -->

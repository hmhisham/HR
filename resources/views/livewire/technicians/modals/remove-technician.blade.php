<!-- Remove Technician Modal -->
<div wire:ignore.self class="modal fade" id="removetechnicianModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">حذف الراتب</h3>
                    <p>نافذة الحذف</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetTechnician"
                    wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="destroy" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حذف البيانات...</h5>
                <div wire:loading.remove>
                    <form id="removeTechnicianModalForm" onsubmit="return false" autocomplete="off">
                        <div class="row">
                            <div class="col text-center">
                                <div class="">
                                    <label for="modalTechniciantechnicians_salary_grade">درجة الراتب</label>
                                    <div class="form-control-plaintext mt-n2">{{ $this->technicians_salary_grade }}
                                    </div>
                                </div>
                            </div>
                            <div class="col text-center">
                                <div class="">
                                    <label for="modalTechniciantechnicians_salary_stage">مرحلة الراتب</label>
                                    <div class="form-control-plaintext mt-n2">{{ $this->technicians_salary_stage }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col text-center">
                                <div class="text-danger">
                                    <label for="modalTechniciantechnicians_salary">الراتب</label>
                                    <div class="form-control-plaintext mt-n2">{{ $this->technicians_salary }}</div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-0">
                        <div class="d-flex justify-content-center col-12 demo-vertical-spacing mb-n4">
                            <button wire:click='destroy' type="submit"class="flex-fill btn btn-danger me-sm-3 me-1">حذف
                            </button>
                            <button type="reset" class="flex-fill btn btn-outline-secondary" data-bs-dismiss="modal"
                                aria-label="Close">تجاهل</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Delete Technician Modal -->
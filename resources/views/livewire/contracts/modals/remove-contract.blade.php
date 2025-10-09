
<!-- Remove Contract Modal -->
<div wire:ignore.self class="modal fade" id="removecontractModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light px-4 py-3">
                <h5 class="modal-title d-flex align-items-center">
                    <i class="mdi mdi-delete-circle-outline text-danger me-2"></i>
                    تأكيد الحذف
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 text-center">
                <div wire:loading.remove>
                    <i class="mdi mdi-alert-circle-outline text-danger fs-1 mb-3"></i>
                    <h5>هل أنت متأكد من حذف هذا العقد؟</h5>
                    <p class="text-muted">لا يمكن التراجع عن هذه العملية.</p>

                    @if($Contract)
                    <div class="card border-danger mt-3">
                        <div class="card-header bg-light-danger">
                            <h6 class="card-title mb-0 text-danger">
                                <i class="mdi mdi-file-document-outline me-2"></i>تفاصيل العقد المراد حذفه
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline">
                                        <input value="{{ $Contract->tenant_name ?? '' }}" type="text" class="form-control" readonly disabled>
                                        <label>اسم المستأجر</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline">
                                        <input value="{{ $Contract->end_date ?? '' }}" type="text" class="form-control" readonly disabled>
                                        <label>تاريخ انتهاء العقد</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating form-floating-outline">
                                        <input value="{{ $Contract->annual_rent_amount ?? '' }}" type="text" class="form-control" readonly disabled>
                                        <label>مبلغ التأجير السنوي</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="alert alert-warning text-center">
                        <i class="mdi mdi-alert-circle-outline me-2"></i>
                        لم يتم تحديد عقد للحذف. يرجى تحديد عقد أولاً.
                    </div>
                    @endif
                </div>

            </div>
            <div class="modal-footer justify-content-center">
                <button wire:click='destroy' type="button" class="btn btn-danger" @if(!$Contract) disabled @endif>
                    <span wire:loading.remove><i class="mdi mdi-trash-can-outline me-1"></i> حذف نهائي</span>
                    <span wire:loading><span class="spinner-border spinner-border-sm" role="status"></span> جارٍ الحذف...</span>
                </button>
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="mdi mdi-close-circle-outline me-1"></i> إلغاء
                </button>
            </div>
        </div>
    </div>
</div>
<!--/ Remove Contract Modal -->

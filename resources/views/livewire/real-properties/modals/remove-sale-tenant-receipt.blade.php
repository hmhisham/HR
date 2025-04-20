<!--/ Delete Sale Tenant Receipt Modal -->
<div wire:ignore.self class="modal fade" id="removeSaleTenantReceiptModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <<div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2"> حذف ايصال بيع أو إجار السند العقاري</h3>
            </div>

            <div class="alert alert-outline-secondary pb-0 border-2" role="alert">
                <h5 class="d-flex justify-content-around">
                    <div>
                        <strong>رقم المقاطعة : </strong>
                        <span class="text-danger">{{ $Realities->GetProvinces->province_number ?? '' }} -
                            {{ $Realities->GetProvinces->province_name ?? '' }}</span>
                    </div>
                    <div>
                        <strong>رقم القطعة : </strong>
                        <span class="text-danger">{{ $Realities->GetPlots->plot_number ?? '' }}</span>
                    </div>
                    <div>
                        <strong>رقم العقار : </strong>
                        <span class="text-danger">{{ $Realities->property_number ?? '' }}</span>
                    </div>
                </h5>
            </div>

            <form id="removeSaleTenantReceiptModalForm" onsubmit="return false" autocomplete="off">
                <div Class="row">
                    <div class="col text-center">
                        <div class="text-danger">
                            <label for="modalSaleTenantReceiptNumber">رقم الوصول</label>
                            <div class="form-control-plaintext mt-n2">{{ $receipt_number }}</div>
                        </div>
                    </div>
                    <div class="col text-center">
                        <div class="text-danger">
                            <label for="modalSaleTenantReceiptDate">تاريخ الوصول</label>
                            <div class="form-control-plaintext mt-n2">{{ $receipt_date }}</div>
                        </div>
                    </div>
                    <div class="col text-center">
                        <div class="text-danger">
                            <label for="modalSaleTenantReceiptPaymentAmount">المبلغ المسدد</label>
                            <div class="form-control-plaintext mt-n2">{{ $receipt_payment_amount }}</div>
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
<!--/ Delete Sale Tenant Receipt Modal -->

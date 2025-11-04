<!-- Remove Rental Modal -->
<div wire:ignore.self class="modal fade" id="removeRentalModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="px-4 py-3 modal-header bg-light">
        <h5 class="modal-title d-flex align-items-center">
          <i class="mdi mdi-delete-outline text-danger me-2"></i>
          حذف محضر التأجير
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="p-4 modal-body">
        <div class="text-center">
          <div class="mb-3">
            <i class="mdi mdi-alert-circle-outline text-warning" style="font-size: 3rem;"></i>
          </div>
          <h5 class="mb-3">هل أنت متأكد من حذف محضر التأجير؟</h5>
          @if($Rental)
          <p class="text-muted mb-0">
            <strong>اسم المستأجر:</strong> {{ $Rental->tenant_name_display ?? 'غير محدد' }}
          </p>
          <p class="text-muted mb-0">
            <strong>التاريخ:</strong> {{ $Rental->date ? \Carbon\Carbon::parse($Rental->date)->format('Y-m-d') : 'غير محدد' }}
          </p>
          <p class="text-muted mb-3">
            <strong>المبلغ:</strong> {{ $Rental->amount ? number_format($Rental->amount, 2) : 'غير محدد' }}
          </p>
          @endif
          <div class="alert alert-warning d-flex align-items-center" role="alert">
            <i class="mdi mdi-alert-triangle-outline me-2"></i>
            <div>
              <strong>تحذير:</strong> لا يمكن التراجع عن هذا الإجراء!
            </div>
          </div>
        </div>
      </div>
      <div class="px-4 py-3 modal-footer bg-light">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">إلغاء</button>
        <button wire:click="destroy()" wire:loading.attr="disabled" type="button" class="btn btn-danger">
          <span wire:loading.remove>
            <i class="mdi mdi-delete-outline me-1"></i>
            حذف
          </span>
          <span wire:loading>
            <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
            جاري الحذف...
          </span>
        </button>
      </div>
    </div>
  </div>
</div>
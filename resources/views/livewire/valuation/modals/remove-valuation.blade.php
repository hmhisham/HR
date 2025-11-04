<!-- Remove Valuation Modal -->
<div wire:ignore.self class="modal fade" id="removeValuationModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-3 border-0 shadow-lg">
      <div class="px-4 py-3 modal-header bg-light">
        <h5 class="modal-title d-flex align-items-center">
          <i class="mdi mdi-delete-outline text-danger me-2"></i>
          حذف محضر التثمين
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="p-4 modal-body">
        <p class="mb-0">هل أنت متأكد من حذف هذا السجل؟ لا يمكن التراجع عن هذه العملية.</p>
      </div>
      <div class="px-4 py-3 modal-footer d-flex justify-content-end">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">إلغاء</button>
        <button type="button" class="btn btn-danger" wire:click="destroy" data-bs-dismiss="modal">حذف</button>
      </div>
    </div>
  </div>
</div>


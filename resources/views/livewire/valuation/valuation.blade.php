<div class="card">
  <!-- شريط علوي: العنوان + البحث + زر إضافة -->
  <div class="flex-wrap gap-3 card-header d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center">
      <i class="mdi mdi-file-document-outline text-primary fs-4 me-2"></i>
      <h4 class="mb-0 fw-bold">قائمة محاضر التثمين</h4>
    </div>
    <div class="gap-3 d-flex align-items-center">
      <div class="dt-search">
        <input wire:model.debounce.300ms="ValuationSearch" type="text" class="form-control form-control-sm" placeholder="بحث عام..." />
      </div>
      <button wire:click='AddValuationModalShow' class="btn btn-primary btn-sm d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addValuationModal">
        <i class="mdi mdi-plus-circle-outline me-1"></i>
        <span>أضــافــة</span>
      </button>
      @include('livewire.valuation.modals.add-valuation')
    </div>
  </div>

  <div class="card-datatable table-responsive">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th class="text-center">ت</th>
          <th class="text-center">التاريخ</th>
          <th class="text-center">المبلغ</th>
          <th class="text-center">الملف</th>
          <th class="text-center">الملاحظات</th>
          <th class="text-center">العمليات</th>
        </tr>
      </thead>
      <tbody>
        @forelse($Valuations as $Valuation)
        <tr>
          <td class="text-center">{{ $loop->iteration }}</td>
          <td class="text-center">{{ $Valuation->date }}</td>
          <td class="text-center">{{ number_format($Valuation->amount) }}</td>
          <td class="text-center">
            @if($Valuation->pdf_file)
              <a href="{{ asset('storage/' . $Valuation->pdf_file) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                <i class="mdi mdi-file-pdf-box"></i> عرض
              </a>
            @else
              <span class="text-muted">لا يوجد ملف</span>
            @endif
          </td>
          <td class="text-center">{{ $Valuation->notes }}</td>
          <td class="text-center">
            <div class="gap-1 d-flex justify-content-center">
              <button wire:click="GetValuation({{ $Valuation->id }})" class="btn btn-icon btn-outline-success btn-sm waves-effect" data-bs-toggle="modal" data-bs-target="#editValuationModal" title="تعديل">
                <i class="tf-icons mdi mdi-pencil fs-5"></i>
              </button>
              <button wire:click="GetValuation({{ $Valuation->id }})" class="btn btn-icon btn-outline-danger btn-sm waves-effect" data-bs-toggle="modal" data-bs-target="#removeValuationModal" title="حذف">
                <i class="tf-icons mdi mdi-delete-outline fs-5"></i>
              </button>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="6" class="py-4 text-center">
            <div class="text-muted">لا توجد سجلات حالياً</div>
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="card-footer d-flex justify-content-center">
    <div class="mt-2">
      {{ $links->links() }}
    </div>
  </div>

  @include('livewire.valuation.modals.edit-valuation')
  @include('livewire.valuation.modals.remove-valuation')
</div>


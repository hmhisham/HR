<div class="card">
  <!-- ✅ شريط البطاقة العلوي مع العنوان وأيقونة -->
  <div class="flex-wrap gap-3 card-header d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center">
      <i class="mdi mdi-file-document-outline text-primary fs-4 me-2"></i>
      <h4 class="mb-0 fw-bold">قائمة محاضر التأجير</h4>
    </div>
    <!-- ✅ مجموعة أدوات البطاقة: بحث + زر إضافة -->
    <div class="gap-3 d-flex align-items-center">
      <!-- حقل بحث مدمج -->
      <div class="dt-search">
        <input wire:model.debounce.300ms="RentalSearch" type="text" class="form-control form-control-sm" placeholder="بحث عام..." />
      </div>
      <!-- زر الإضافة -->
      @can('rental-create')
      <button wire:click='AddRentalModalShow' class="btn btn-primary btn-sm d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addRentalModal">
        <i class="mdi mdi-plus-circle-outline me-1"></i>
        <span>أضــافــة</span>
      </button>
      @include('livewire.rental.modals.add-rental')
      @endcan
    </div>
  </div>

  @can('rental-list')
  <div class="card-datatable table-responsive">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th class="text-center">ت</th>
          <th class="text-center">اسم المستأجر</th>
          <th class="text-center">التاريخ</th>
          <th class="text-center">المبلغ</th>
          <th class="text-center">ملف PDF</th>
          <th class="text-center">الملاحظات</th>
          <th class="text-center">العمليات</th>
        </tr>
        <tr>
          <th></th>
          <th class="text-center">
            <input type="text" wire:model.debounce.300ms="search.tenant_name" class="text-center form-control form-control-sm" placeholder="اسم المستأجر">
          </th>
          <th class="text-center">
            <input type="text" wire:model.debounce.300ms="search.date" class="text-center form-control form-control-sm" placeholder="التاريخ">
          </th>
          <th class="text-center">
            <input type="text" wire:model.debounce.300ms="search.amount" class="text-center form-control form-control-sm" placeholder="المبلغ">
          </th>
          <th></th>
          <th class="text-center">
            <input type="text" wire:model.debounce.300ms="search.notes" class="text-center form-control form-control-sm" placeholder="الملاحظات">
          </th>
          <th></th>
        </tr>
      </thead>

      <tbody>
        @forelse ($Rentals as $Rental)
        <tr>
          <td class="text-center">{{ $loop->iteration }}</td>
          <td class="text-center">{{ $Rental->tenant ? $Rental->tenant->name : $Rental->tenant_name }}</td>
          <td class="text-center">{{ $Rental->date }}</td>
          <td class="text-center">{{ number_format($Rental->amount) }}</td>
          <td class="text-center">
            @if($Rental->pdf_file)
              <a href="{{ asset('storage/' . $Rental->pdf_file) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                <i class="mdi mdi-file-pdf-box"></i> عرض
              </a>
            @else
              <span class="text-muted">لا يوجد ملف</span>
            @endif
          </td>
          <td class="text-center">{{ $Rental->notes }}</td>

          <td class="text-center">
            <div class="gap-1 d-flex justify-content-center">
              @can('rental-edit')
              <button wire:click="GetRental({{ $Rental->id }})" class="btn btn-icon btn-outline-success btn-sm waves-effect" data-bs-toggle="modal" data-bs-target="#editRentalModal" title="تعديل">
                <i class="tf-icons mdi mdi-pencil fs-5"></i>
              </button>
              @endcan
              @can('rental-delete')
              <button wire:click="GetRental({{ $Rental->id }})" class="btn btn-icon btn-outline-danger btn-sm waves-effect" data-bs-toggle="modal" data-bs-target="#removeRentalModal" title="حذف">
                <i class="tf-icons mdi mdi-delete-outline fs-5"></i>
              </button>
              @endcan
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="7" class="py-4 text-center">
            <div class="d-flex flex-column align-items-center">
              <i class="mb-2 mdi mdi-file-search-outline text-muted" style="font-size: 3rem;"></i>
              <h6 class="mb-1 text-muted">لا توجد محاضر تأجير</h6>
              <p class="mb-0 text-muted small">
                @if(!empty($RentalSearch) || array_filter($search))
                  لم يتم العثور على نتائج تطابق معايير البحث
                @else
                  لا توجد محاضر تأجير مسجلة حالياً
                @endif
              </p>
            </div>
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
  @endcan

  <!-- Modal -->
  @include('livewire.rental.modals.edit-rental')
  @include('livewire.rental.modals.remove-rental')
  <!-- Modal -->
</div>

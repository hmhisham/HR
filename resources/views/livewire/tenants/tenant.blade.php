<div class="card">
  <!-- ✅ شريط البطاقة العلوي مع العنوان وأيقونة -->
  <div class="flex-wrap gap-3 card-header d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center">
      <i class="mdi mdi-format-list-bulleted text-primary fs-4 me-2"></i>
      <h4 class="mb-0 fw-bold">قائمة المستأجر</h4>
    </div>
    <!-- ✅ مجموعة أدوات البطاقة: بحث + زر إضافة -->
    <div class="gap-3 d-flex align-items-center">
      <!-- حقل بحث مدمج -->
      <div class="dt-search">
        <input wire:model.debounce.300ms="TenantSearch" type="text" class="form-control form-control-sm" placeholder="بحث عام..." />
      </div>
      <!-- زر الإضافة -->
      @can('tenant-create')
      <button wire:click='AddTenantModalShow' class="btn btn-primary btn-sm d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addtenantModal">
        <i class="mdi mdi-plus-circle-outline me-1"></i>
        <span>أضــافــة</span>
      </button>
      @include('livewire.tenants.modals.add-tenant')
      @endcan
    </div>
 

  <!-- ✅ جدول البيانات -->
  @can('tenant-list')
  <div class="card-datatable table-responsive">
    <table class="table table-bordered table-striped">
      <thead class="table-light">
        <tr>
          <th class="text-center">#</th>

          <th class="text-center">اسم المستأجر</th>
          <th class="text-center">رقم الهاتف</th>
          <th class="text-center">البريد الإلكتروني</th>
          <th class="text-center">العنوان</th>

          <th class="text-center">الملاحظات</th>
          <th class="text-center">العمليات</th>
        </tr>

        <!-- ✅ صف فلترة متقدم (اختياري) -->
        <tr>
          <th></th>


          <th class="text-center">
            <input type="text" wire:model.debounce.300ms="search.name" class="text-center form-control form-control-sm" placeholder="اسم المستأجر">
          </th>

          <th class="text-center">
            <input type="text" wire:model.debounce.300ms="search.phone" class="text-center form-control form-control-sm" placeholder="رقم الهاتف">
          </th>

          <th class="text-center">
            <input type="text" wire:model.debounce.300ms="search.email" class="text-center form-control form-control-sm" placeholder="البريد الإلكتروني">
          </th>

          <th class="text-center">
            <input type="text" wire:model.debounce.300ms="search.address" class="text-center form-control form-control-sm" placeholder="العنوان">
          </th>


          <th class="text-center">
            <input type="text" wire:model.debounce.300ms="search.notes" class="text-center form-control form-control-sm" placeholder="الملاحظات">
          </th>

          <th></th>
        </tr>
      </thead>

      <tbody>
        @foreach ($Tenants as $Tenant)
        <tr>
          <td class="text-center">{{ $loop->iteration }}</td>

          <td class="text-center">{{ $Tenant->name}}</td>
          <td class="text-center">{{ $Tenant->phone}}</td>
          <td class="text-center">{{ $Tenant->email}}</td>
          <td class="text-center">{{ $Tenant->address}}</td>

          <td class="text-center">{{ $Tenant->notes}}</td>
          <!-- ✅ أزرار العمليات -->
          <td class="text-center">
            <div class="gap-1 d-flex justify-content-center">
              @can('tenant-edit')
              <button wire:click="GetTenant({{ $Tenant->id }})" class="btn btn-icon btn-outline-success btn-sm waves-effect" data-bs-toggle="modal" data-bs-target="#edittenantModal" title="تعديل">
                <i class="tf-icons mdi mdi-pencil fs-5"></i>
              </button>
              @endcan
              @can('tenant-delete')
              <button wire:click="GetTenant({{ $Tenant->id }})" class="btn btn-icon btn-outline-danger btn-sm waves-effect {{ $Tenant->active ? 'disabled' : '' }}" data-bs-toggle="modal" data-bs-target="#removetenantModal" title="حذف">
                <i class="tf-icons mdi mdi-delete-outline fs-5"></i>
              </button>
              @endcan
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<!-- ✅ ترقيم الصفحات -->
<div class="card-footer d-flex justify-content-center">
  <div class="mt-2">
    {{ $links->links() }}
  </div>
</div>
@endcan
<!-- Modal -->
@include('livewire.tenants.modals.edit-tenant')
@include('livewire.tenants.modals.remove-tenant')
<!-- Modal -->

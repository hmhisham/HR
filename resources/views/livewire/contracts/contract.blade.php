<div class="card">
  <!-- ✅ شريط البطاقة العلوي مع العنوان وأيقونة -->
  <div class="flex-wrap gap-3 card-header d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center">
      <i class="mdi mdi-format-list-bulleted text-primary fs-4 me-2"></i>

 <h4 class="mb-0 fw-bold">
        @if($propertyfolder)
          قائمة عقد - رقم الاضبارة: {{ $propertyfolder->folder_number }}
        @else
          قائمة العقود
        @endif
      </h4>


    </div>
    <!-- ✅ مجموعة أدوات البطاقة: بحث + زر إضافة -->
    <div class="gap-3 d-flex align-items-center">
      <!-- حقل بحث مدمج -->
      <div class="dt-search">
        <input wire:model.debounce.300ms="ContractSearch" type="text" class="form-control form-control-sm" placeholder="بحث عام..." />
      </div>
      <!-- زر الإضافة -->
      @can('contract-create')
      <button wire:click='AddContractModalShow' class="btn btn-primary btn-sm d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addcontractModal">
        <i class="mdi mdi-plus-circle-outline me-1"></i>
        <span>أضــافــة</span>
      </button>
      @include('livewire.contracts.modals.add-contract')
      @endcan
    </div>



    @can('contract-list')
    <div class="card-datatable table-responsive">
      <table class="table table-bordered table-striped">
        <thead class="table-light">
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">رقم الاضبارة</th>
            <th class="text-center">رقم العقد في المستند</th>
            <th class="text-center">تاريخ انتهاء العقد</th>
            <th class="text-center">اسم المستأجر</th>
            <th class="text-center">مبلغ التأجير للسنة الواحدة</th>
            <th class="text-center">الملاحظات</th>
            <th class="text-center">العمليات</th>
          </tr>


          <tr>
            <th></th>
            <th class="text-center">
              <input type="text" wire:model.debounce.300ms="search.property_folder_id" class="text-center form-control form-control-sm" placeholder="">
            </th>

            <th class="text-center">
              <input type="text" wire:model.debounce.300ms="search.document_contract_number" class="text-center form-control form-control-sm" placeholder="رقم العقد في المستند">
            </th>

            <th class="text-center">
              <input type="text" wire:model.debounce.300ms="search.end_date" class="text-center form-control form-control-sm" placeholder="تاريخ انتهاء العقد">
            </th>

            <th class="text-center">
              <input type="text" wire:model.debounce.300ms="search.tenant_name" class="text-center form-control form-control-sm" placeholder="اسم المستأجر">
            </th>

            <th class="text-center">
              <input type="text" wire:model.debounce.300ms="search.annual_rent_amount" class="text-center form-control form-control-sm" placeholder="مبلغ التأجير للسنة الواحدة">
            </th>

            <th class="text-center">
              <input type="text" wire:model.debounce.300ms="search.notes" class="text-center form-control form-control-sm" placeholder="الملاحظات">
            </th>

            <th></th>
          </tr>
        </thead>

        <tbody>
          @foreach ($Contracts as $Contract)
          <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td class="text-center">{{ $Contract->property_folder_id}}</td>
            <td class="text-center">{{ $Contract->document_contract_number}}</td>
            <td class="text-center">{{ $Contract->end_date}}</td>
            <td class="text-center">{{ $Contract->tenant_name}}</td>
            <td class="text-center">{{ $Contract->annual_rent_amount}}</td>
            <td class="text-center">{{ $Contract->notes}}</td>

            <td class="text-center">
              <div class="gap-1 d-flex justify-content-center">
                @can('contract-edit')
                <button wire:click="GetContract({{ $Contract->id }})" class="btn btn-icon btn-outline-success btn-sm waves-effect" data-bs-toggle="modal" data-bs-target="#editcontractModal" title="تعديل">
                  <i class="tf-icons mdi mdi-pencil fs-5"></i>
                </button>
                @endcan
                @can('contract-delete')
                <button wire:click="GetContract({{ $Contract->id }})" class="btn btn-icon btn-outline-danger btn-sm waves-effect {{ $Contract->active ? 'disabled' : '' }}" data-bs-toggle="modal" data-bs-target="#removecontractModal" title="حذف">
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

  <div class="card-footer d-flex justify-content-center">
    <div class="mt-2">
      {{ $links->links() }}
    </div>
  </div>
  @endcan


  <!-- Modal -->
  @include('livewire.contracts.modals.edit-contract')
  @include('livewire.contracts.modals.remove-contract')
  <!-- Modal -->
</div>
</div>

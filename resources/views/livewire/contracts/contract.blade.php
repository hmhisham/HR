<div class="mt-n4">

  <div class="card">

    <div class="card">
      <div class="card-header">
        <div class="d-flex justify-content-between">
          <div>

              <h4 class="mb-1 fw-semiboyld text-primary"> {{ $property_folder_id ? '  رقم الاضبارة: ' . $property_folder_id : 'قائمة العقد'}} </h4>
            {{-- <input wire:model="ContractSearch" type="text" class="form-control" placeholder="بحث..."> --}}
          </div>
          <div>
            @can('contract-create')
            <button wire:click='AddContractModalShow' class="mb-3 add-new btn btn-primary mb-md-0" data-bs-toggle="modal" data-bs-target="#addcontractModal">أضــافــة</button>
            @include('livewire.contracts.modals.add-contract')
            @endcan
          </div>
        </div>
      </div>
      @can('contract-list')
      <table class="table">
        <thead class="table-light">
          <tr>
            <th>#</th>
            <th class="text-center">رقم العقد في المستند</th>
            <th class="text-center">رقم العقد المنشأ</th>
            <th class="text-center">تاريخ بداية العقد</th>
            <th class="text-center">تاريخ انتهاء العقد</th>
            <th class="text-center">اسم المستأجر</th>
            <th class="text-center">مبلغ التأجير للسنة الواحدة</th>
            <th class="text-center">الملاحظات</th>
            <th class="text-center">العملية</th>
          </tr>

          <tr>
            <th></th>
            <th class="text-center">
              <input type="text" wire:model.debounce.300ms="search.document_contract_number" class="form-control text-center" placeholder="رقم العقد في المستند">
            </th>

            <th class="text-center">
              <input type="text" wire:model.debounce.300ms="search.generated_contract_number" class="form-control text-center" placeholder="رقم العقد المنشأ">
            </th>

            <th class="text-center">
              <input type="text" wire:model.debounce.300ms="search.start_date" class="form-control text-center" placeholder="تاريخ بداية العقد">
            </th>

            <th class="text-center">
              <input type="text" wire:model.debounce.300ms="search.end_date" class="form-control text-center" placeholder="تاريخ انتهاء العقد">
            </th>

            <th class="text-center">
              <input type="text" wire:model.debounce.300ms="search.tenant_name" class="form-control text-center" placeholder="اسم المستأجر">
            </th>

            <th class="text-center">
              <input type="text" wire:model.debounce.300ms="search.annual_rent_amount" class="form-control text-center" placeholder="مبلغ التأجير للسنة الواحدة">
            </th>

            <th class="text-center">
              <input type="text" wire:model.debounce.300ms="search.notes" class="form-control text-center" placeholder="الملاحظات">
            </th>

            <th></th>
          </tr>


        </thead>
        <tbody>
          <?php $i = 0; ?>
          @forelse ($Contracts as $Contract)
          <tr>
            <?php $i++; ?>
            <td>{{ $i }}</td>
            <td class="text-center">{{ $Contract->document_contract_number}}</td>
            <td class="text-center">{{ $Contract->generated_contract_number}}</td>
            <td class="text-center">{{ $Contract->start_date}}</td>
            <td class="text-center">{{ $Contract->end_date}}</td>
            <td class="text-center">{{ $Contract->tenant_name}}</td>
            <td class="text-center">{{ $Contract->annual_rent_amount}}</td>
            <td class="text-center">{{ $Contract->notes}}</td>

            <td class="text-center">
              <div class="btn-group" role="group" aria-label="First group">
                @can('contract-edit')
                <button wire:click="GetContract({{ $Contract->id }})" class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal" data-bs-target="#editcontractModal">
                  <i class="tf-icons mdi mdi-pencil fs-3"></i>
                </button>
                @endcan
                @can('contract-delete')
                <button wire:click="GetContract({{ $Contract->id }})" class="p-0 px-1 btn btn-outline-danger waves-effect {{ $Contract->active ? 'disabled' : '' }}" data-bs-toggle="modal" data-bs-target="#removecontractModal">
                  <i class="tf-icons mdi mdi-delete-outline fs-3"></i>
                </button>
                @endcan
              </div>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="9" class="text-center py-4">
              <div class="d-flex flex-column align-items-center">
                <i class="mdi mdi-information-outline fs-1 text-muted mb-3"></i>
                <h5 class="text-muted">لا توجد بيانات للعرض</h5>
                <p class="text-muted">لم يتم العثور على أي عقود تطابق معايير البحث</p>
                @if($property_folder_id)
                <small class="text-muted">العقود المتعلقة بملف العقار الحالي ستظهر هنا</small>
                @endif
              </div>
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
      <div class="mt-2 d-flex justify-content-center">
        {{ $links->links() }}
      </div>
      <!-- Modal -->
      @include('livewire.contracts.modals.edit-contract')
      @include('livewire.contracts.modals.remove-contract')
      <!-- Modal -->
      @endcan
    </div>
  </div>
</div>
</div>

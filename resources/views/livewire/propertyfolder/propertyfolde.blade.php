<div class="mt-n4">

  <div class="card">

    <div class="card">
      <div class="card-header">
        <div class="d-flex justify-content-between">
          <h4 class="mb-1 fw-semiboyld text-primary">
            <i class="tf-icons mdi mdi-home-city me-2"></i>العقارات
          </h4>
          <div>
            @can('propertyfolde-create')
            <button wire:click='AddPropertyfoldeModalShow' class="mb-3 add-new btn btn-primary mb-md-0" data-bs-toggle="modal" data-bs-target="#addpropertyfoldeModal">
              <i class="tf-icons mdi mdi-plus me-1"></i>أضــافــة
            </button>
            @include('livewire.propertyfolder.modals.add-propertyfolde')
            @endcan
          </div>
        </div>
      </div>
      @can('propertyfolde-list')
      <table class="table">
        <thead class="table-light">
          <tr>
            <th>#</th>
            <th class="text-center">رقم الاضبارة</th>
            <th class="text-center">اسم العقار</th>
            <th class="text-center">موقع العقار</th>
            <th class="text-center">نوع العقار</th>
            <th class="text-center">صفة العقار</th>
            <th class="text-center">مساحة العقار</th>
            <th class="text-center">رقم القطعة</th>
            <th class="text-center">اسم المقاطعة</th>
            <th class="text-center">الملاحظات</th>
            <th class="text-center">العملية</th>
          </tr>

          <tr>
            <th></th>
            <th class="text-center">
              <input type="text" wire:model.debounce.300ms="search.folder_number" class="text-center form-control" placeholder="رقم الاضبارة">
            </th>

            <th class="text-center">
              <input type="text" wire:model.debounce.300ms="search.property_name" class="text-center form-control" placeholder="اسم العقار">
            </th>

            <th class="text-center">
              <input type="text" wire:model.debounce.300ms="search.id_property_location" class="text-center form-control" placeholder="موقع العقار">
            </th>

            <th class="text-center">
              <input type="text" wire:model.debounce.300ms="search.id_property_type" class="text-center form-control" placeholder="نوع العقار">
            </th>

            <th class="text-center">
              <input type="text" wire:model.debounce.300ms="search.id_property_description" class="text-center form-control" placeholder="صفة العقار">
            </th>

            <th class="text-center">
              <input type="text" wire:model.debounce.300ms="search.property_area" class="text-center form-control" placeholder="مساحة العقار">
            </th>

            <th class="text-center">
              <input type="text" wire:model.debounce.300ms="search.plot_number" class="text-center form-control" placeholder="رقم القطعة">
            </th>

            <th class="text-center">
              <input type="text" wire:model.debounce.300ms="search.district_name" class="text-center form-control" placeholder="اسم المقاطعة">
            </th>

            <th class="text-center">
              <input type="text" wire:model.debounce.300ms="search.notes" class="text-center form-control" placeholder="الملاحظات">
            </th>

            <th></th>
          </tr>

        </thead>
        <tbody>
          <?php $i = 0; ?>
          @foreach ($Propertyfolder as $Propertyfolde)
          <tr>
            <?php $i++; ?>
            <td>{{ $i }}</td>
            <td class="text-center">{{ $Propertyfolde->folder_number }}</td>
            <td class="text-center">{{ $Propertyfolde->property_name }}</td>
            <td class="text-center">
              {{ $Propertyfolde->Getprovince ? $Propertyfolde->Getprovince->province_name : '' }}</td>
            <td class="text-center">{{ $Propertyfolde->propertyType->type_name ?? '' }}</td>
            <td class="text-center">{{ $Propertyfolde->propertyCategory->category ?? '' }}</td>
            <td class="text-center">{{ $Propertyfolde->property_area }}</td>
            <td class="text-center">{{ $Propertyfolde->plot_number }}</td>

            <td class="text-center">مقاطعة
              {{ $Propertyfolde->Getprovince ? $Propertyfolde->Getprovince->province_number : '' }}
              -
              {{ $Propertyfolde->Getprovince ? $Propertyfolde->Getprovince->province_name : '' }}

            </td>

            <td class="text-center">{{ $Propertyfolde->notes }}</td>

            <td class="text-center">
              <div class="btn-group" role="group" aria-label="First group">
                @can('propertyfolde-edit')
                <button wire:click="GetPropertyfolde({{ $Propertyfolde->id }})" class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal" data-bs-target="#editpropertyfoldeModal">
                  <i class="tf-icons mdi mdi-pencil fs-3"></i>
                </button>
                @endcan
                @can('propertyfolde-delete')
                <button wire:click="GetPropertyfolde({{ $Propertyfolde->id }})" class="p-0 px-1 btn btn-outline-danger waves-effect {{ $Propertyfolde->active ? 'disabled' : '' }}" data-bs-toggle="modal" data-bs-target="#removepropertyfoldeModal">
                  <i class="tf-icons mdi mdi-delete-outline fs-3"></i>
                </button>
                @endcan
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="mt-2 d-flex justify-content-center">
        {{ $links->links() }}
      </div>
      <!-- Modal -->
      @include('livewire.propertyfolder.modals.edit-propertyfolde')
      @include('livewire.propertyfolder.modals.remove-propertyfolde')
      <!-- Modal -->
      @endcan
    </div>
  </div>
</div>
</div>

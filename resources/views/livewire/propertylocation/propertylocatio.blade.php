

<div class="mt-n4">
 
    <div class="card">

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <h4 class="mb-1 fw-semiboyld">قائمة \ موقع العقار</h4>

                </div>
                <div>
                    @can('propertylocatio-create')
                        <button wire:click='AddPropertylocatioModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addpropertylocatioModal">
                            <i class="mdi mdi-database-plus-outline me-1"></i>
                            أضــافــة
                        </button>
                        @include('livewire.propertylocation.modals.add-propertylocatio')
                    @endcan
                </div>
            </div>
        </div>
        @can('propertylocatio-list')
            <table class="table">
                <thead class="table-light">
                    <tr>
                     <th>#</th>
                     <th class="text-center">موقع العقار</th>
<th class="text-center">العملية</th> </tr>

                         <tr>
                            <th></th>
   <th class="text-center">
                                <input type="text" wire:model.debounce.300ms="search.property_location"
                                    class="text-center form-control" placeholder="موقع العقار">
                            </th>

<th></th>
                        </tr>


            </thead>
            <tbody>
                 <?php $i = 0; ?>
                  @foreach ($Propertylocation as $Propertylocatio)
                           <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                   <td class="text-center">{{ $Propertylocatio->property_location}}</td>

                                  <td class="text-center">
                                     <div class="btn-group" role="group" aria-label="First group">
                                         @can('propertylocatio-edit')
                                             <button wire:click="GetPropertylocatio({{ $Propertylocatio->id }})"
                                                 class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                 data-bs-target="#editpropertylocatioModal">
                                                 <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                             </button>
                                         @endcan
                                         @can('propertylocatio-delete')
                                             <button wire:click="GetPropertylocatio({{ $Propertylocatio->id }})"
                                                 class="p-0 px-1 btn btn-outline-danger waves-effect {{ $Propertylocatio->active ? 'disabled' : '' }}"
                                                 data-bs-toggle = "modal" data-bs-target="#removepropertylocatioModal">
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
            @include('livewire.propertylocation.modals.edit-propertylocatio')
            @include('livewire.propertylocation.modals.remove-propertylocatio')
            <!-- Modal -->
        @endcan
    </div>
</div>
</div>
   </div>

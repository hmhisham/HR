

<div class="mt-n4">

    <div class="card">

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                    <h4 class="mb-1 fw-semiboyld">قائمة \ نوع العقار المؤجر</h4>
                <div>
                    @can('propertytyperente-create')
                        <button wire:click='AddPropertytyperenteModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addpropertytyperenteModal">
                            <i class="tf-icons mdi mdi-plus me-1"></i>

                            أضــافــة
                        </button>
                        @include('livewire.propertytyperented.modals.add-propertytyperente')
                    @endcan
                </div>
            </div>
        </div>
        @can('propertytyperente-list')
            <table class="table">
                <thead class="table-light">
                    <tr>
                     <th>#</th>
                     <th class="text-center">نوع عقار المؤجر</th>
<th class="text-center">العملية</th> </tr>

                         <tr>
                            <th></th>
   <th class="text-center">
                                <input type="text" wire:model.debounce.300ms="search.property_type_rented"
                                    class="text-center form-control" placeholder="نوع عقار المؤجر">
                            </th>

<th></th>
                        </tr>


            </thead>
            <tbody>
                 <?php $i = 0; ?>
                  @foreach ($Propertytyperented as $Propertytyperente)
                           <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                   <td class="text-center">{{ $Propertytyperente->property_type_rented}}</td>

                                  <td class="text-center">
                                     <div class="btn-group" role="group" aria-label="First group">
                                         @can('propertytyperente-edit')
                                             <button wire:click="GetPropertytyperente({{ $Propertytyperente->id }})"
                                                 class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                 data-bs-target="#editpropertytyperenteModal">
                                                 <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                             </button>
                                         @endcan
                                         @can('propertytyperente-delete')
                                             <button wire:click="GetPropertytyperente({{ $Propertytyperente->id }})"
                                                 class="p-0 px-1 btn btn-outline-danger waves-effect {{ $Propertytyperente->active ? 'disabled' : '' }}"
                                                 data-bs-toggle = "modal" data-bs-target="#removepropertytyperenteModal">
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
            @include('livewire.propertytyperented.modals.edit-propertytyperente')
            @include('livewire.propertytyperented.modals.remove-propertytyperente')
            <!-- Modal -->
        @endcan
    </div>
</div>
</div>
   </div>

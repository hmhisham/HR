

<div class="mt-n4">
    <h4 class="mb-1 fw-semiboyld">قائمة \ نوع العقار</h4>
    <div class="card">

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <input wire:model="propertycategorSearch" type="text" class="form-control" placeholder="بحث...">
                </div>
                <div>
                    @can('propertycategor-create')
                        <button wire:click='AddpropertycategorModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addpropertycategorModal">أضــافــة</button>
                        @include('livewire.propertycategory.modals.add-propertycategor')
                    @endcan
                </div>
            </div>
        </div>
        @can('propertycategor-list')
            <table class="table">
                <thead class="table-light">
                    <tr>
                     <th>#</th>
                     <th class="text-center">نوع العقار</th>
<th class="text-center">ملاحظات</th>
<th class="text-center">العملية</th>

                    </tr>
            </thead>
            <tbody> 
                 <?php $i = 0; ?>
                  @foreach ($Propertycategory as $propertycategor)
                           <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                   <td class="text-center">{{ $propertycategor->category}}</td>
 <td class="text-center">{{ $propertycategor->notes}}</td>

                                  <td class="text-center">
                                     <div class="btn-group" role="group" aria-label="First group">
                                         @can('propertycategor-edit')
                                             <button wire:click="Getpropertycategor({{ $propertycategor->id }})"
                                                 class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                 data-bs-target="#editpropertycategorModal">
                                                 <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                             </button>
                                         @endcan
                                         @can('propertycategor-delete')
                                             <button wire:click="Getpropertycategor({{ $propertycategor->id }})"
                                                 class="p-0 px-1 btn btn-outline-danger waves-effect {{ $propertycategor->active ? 'disabled' : '' }}"
                                                 data-bs-toggle = "modal" data-bs-target="#removepropertycategorModal">
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
            @include('livewire.propertycategory.modals.edit-propertycategor')
            @include('livewire.propertycategory.modals.remove-propertycategor')
            <!-- Modal -->
        @endcan
    </div>
</div>
</div>
   </div>

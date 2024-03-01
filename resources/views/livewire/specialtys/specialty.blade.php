
<div class="mt-n4">
    <h4 Class="mb-1fw-semiboyld">قائمة</h4>
    <Div Class="card">

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <input wire:model="SpecialtySearch" type="text" class="form-control" placeholder="بحث...">
                </div>
                <div>
                    @can('specialty-create')
                        <button wire:click='AddSpecialtyModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addspecialtyModal">أضــافــة</button>
                        @include('livewire.specialtys.modals.add-specialty')
                    @endcan
                </div>
            </div>
        </div>
 @can('specialty-list')
            <table class="table">
                <thead class="table-light">
                    <tr>
                     <th>#</th>
   <th Class="text-center">الرمز</th>
<th Class="text-center">اسم التخصص</th>
<th Class="text-center">العملية</th>

                    </tr>
            </thead>
            <tbody>
                 <?php $i = 0; ?>
  @foreach ($Specialtys as $Specialty)
                           <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                   <td Class="text-center">{{ $Specialty->specialtys_code}}</td>
 <td Class="text-center">{{ $Specialty->specialtys_name}}</td>

                                  <td Class="text-center">
                                     <div class="btn-group" role="group" aria-label="First group">
                                         @can('specialty-edit')
                                             <button wire:click="GetSpecialty({{ $Specialty->id }})"
                                                 class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                 data-bs-target="#editspecialtyModal">
                                                 <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                             </button>
                                         @endcan
                                         @can('specialty-delete')
                                             <button wire:click="GetSpecialty({{ $Specialty->id }})"
                                                 class="p-0 px-1 btn btn-outline-danger waves-effect {{ $Specialty->active ? 'disabled' : '' }}"
                                                 data-bs-toggle = "modal" data-bs-target="#removespecialtyModal">
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
            @include('livewire.specialtys.modals.edit-specialty')
            @include('livewire.specialtys.modals.remove-specialty')
            <!-- Modal -->
        @endcan
    </div>
</div>
</div>
   </div>

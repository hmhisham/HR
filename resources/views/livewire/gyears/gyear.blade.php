

<div class="mt-n4">
    <h4 class="mb-1 fw-semiboyld">قائمة</h4>
    <div class="card">

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <input wire:model="GyearSearch" type="text" class="form-control" placeholder="بحث...">
                </div>
                <div>
                    @can('gyear-create')
                        <button wire:click='AddGyearModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addgyearModal">أضــافــة</button>
                        @include('livewire.gyears.modals.add-gyear')
                    @endcan
                </div>
            </div>
        </div>
        @can('gyear-list')
            <table class="table">
                <thead class="table-light">
                    <tr>
                     <th>#</th>
                     <th class="text-center">سنة التخرج</th>
<th class="text-center">العملية</th>

                    </tr>
            </thead>
            <tbody> 
                 <?php $i = 0; ?>
                  @foreach ($Gyears as $Gyear)
                           <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                   <td class="text-center">{{ $Gyear->year}}</td>

                                  <td class="text-center">
                                     <div class="btn-group" role="group" aria-label="First group">
                                         @can('gyear-edit')
                                             <button wire:click="GetGyear({{ $Gyear->id }})"
                                                 class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                 data-bs-target="#editgyearModal">
                                                 <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                             </button>
                                         @endcan
                                         @can('gyear-delete')
                                             <button wire:click="GetGyear({{ $Gyear->id }})"
                                                 class="p-0 px-1 btn btn-outline-danger waves-effect {{ $Gyear->active ? 'disabled' : '' }}"
                                                 data-bs-toggle = "modal" data-bs-target="#removegyearModal">
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
            @include('livewire.gyears.modals.edit-gyear')
            @include('livewire.gyears.modals.remove-gyear')
            <!-- Modal -->
        @endcan
    </div>
</div>
</div>
   </div>

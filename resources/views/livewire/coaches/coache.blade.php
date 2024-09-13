

<div class="mt-n4">
    <h4 class="mb-1 fw-semiboyld">قائمة</h4>
    <div class="card">

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <input wire:model="CoacheSearch" type="text" class="form-control" placeholder="بحث...">
                </div>
                <div>
                    @can('coache-create')
                        <button wire:click='AddCoacheModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addcoacheModal">أضــافــة</button>
                        @include('livewire.coaches.modals.add-coache')
                    @endcan
                </div>
            </div>
        </div>
        @can('coache-list')
            <table class="table">
                <thead class="table-light">
                    <tr>
                     <th>#</th>
                     <th class="text-center">رقم الحاسبة</th>
<th class="text-center">اسم المدرب</th>
<th class="text-center">التحصيل الدراسي</th>
<th class="text-center">رقم الهاتف</th>
<th class="text-center">العملية</th>

                    </tr>
            </thead>
            <tbody> 
                 <?php $i = 0; ?>
                  @foreach ($Coaches as $Coache)
                           <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                   <td class="text-center">{{ $Coache->calculator_number}}</td>
 <td class="text-center">{{ $Coache->name_coache}}</td>
 <td class="text-center">{{ $Coache->education}}</td>
 <td class="text-center">{{ $Coache->phone_number}}</td>

                                  <td class="text-center">
                                     <div class="btn-group" role="group" aria-label="First group">
                                         @can('coache-edit')
                                             <button wire:click="GetCoache({{ $Coache->id }})"
                                                 class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                 data-bs-target="#editcoacheModal">
                                                 <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                             </button>
                                         @endcan
                                         @can('coache-delete')
                                             <button wire:click="GetCoache({{ $Coache->id }})"
                                                 class="p-0 px-1 btn btn-outline-danger waves-effect {{ $Coache->active ? 'disabled' : '' }}"
                                                 data-bs-toggle = "modal" data-bs-target="#removecoacheModal">
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
            @include('livewire.coaches.modals.edit-coache')
            @include('livewire.coaches.modals.remove-coache')
            <!-- Modal -->
        @endcan
    </div>
</div>
</div>
   </div>



<div class="mt-n4">
   
    <div class="card">

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
               <div>
                    <h4 class="mb-2">
                        <span class="text-muted fw-light"> مستخدمين التطبيق <span class="mdi mdi-chevron-left mdi-24px"></span></span>
                   
                    </h4>
                </div>
                <div>
                    @can('usersap-create')
                        <button wire:click='AddUsersapModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addusersapModal">أضــافــة</button>
                        @include('livewire.usersapp.modals.add-usersap')
                    @endcan
                </div>
            </div>
        </div>
        @can('usersap-list')
            <div class="table-responsive">
            <table class="table">
                <thead class="table-light">
                    <tr>
                     <th>#</th>
                     <th class="text-center">رقم الحاسبة</th>
<th class="text-center">الاسم</th>
<th class="text-center">الايميل</th>
<th class="text-center">رقم الهاتف</th>
<th class="text-center">الحالة</th>
<th class="text-center">الملاحظات</th>
<th class="text-center">العملية</th> </tr>

                         <tr>
                            <th></th>
   <th class="text-center">
                                <input type="text" wire:model.debounce.300ms="search.computer_number"
                                    class="form-control text-center" placeholder="رقم الحاسبة">
                            </th>
                        
  <th class="text-center">
                                <input type="text" wire:model.debounce.300ms="search.name"
                                    class="form-control text-center" placeholder="الاسم">
                            </th>
                        
  <th class="text-center">
                                <input type="text" wire:model.debounce.300ms="search.email"
                                    class="form-control text-center" placeholder="الايميل">
                            </th>
                        
  <th class="text-center">
                                <input type="text" wire:model.debounce.300ms="search.phone_number"
                                    class="form-control text-center" placeholder="رقم الهاتف">
                            </th>
                        
  <th class="text-center">
                                <input type="text" wire:model.debounce.300ms="search.status"
                                    class="form-control text-center" placeholder="الحالة">
                            </th>
                        
  <th class="text-center">
                                <input type="text" wire:model.debounce.300ms="search.note"
                                    class="form-control text-center" placeholder="الملاحظات">
                            </th>
                        
<th></th>
                        </tr>
                     
                   
            </thead>
            <tbody> 
                         @php
                            $i = $links->perPage() * ($links->currentPage() - 1) + 1;
                        @endphp
                  @foreach ($Usersapp as $Usersap)
                           <tr>
                                  
                                    <td>{{ $i++ }}</td>
                                   <td class="text-center">{{ $Usersap->computer_number}}</td>
 <td class="text-center">{{ $Usersap->name}}</td>
 <td class="text-center">{{ $Usersap->email}}</td>
 <td class="text-center">{{ $Usersap->phone_number}}</td>
 <td class="text-center">{{ $Usersap->status}}</td>
 <td class="text-center">{{ $Usersap->note}}</td>

                                  <td class="text-center">
                                     <div class="btn-group" role="group" aria-label="First group">
                                         @can('usersap-edit')
                                             <button wire:click="GetUsersap({{ $Usersap->id }})"
                                                 class="p-0 px-1 btn btn-text-success waves-effect" data-bs-toggle="modal"
                                                 data-bs-target="#editusersapModal">
                                                 <i class="mdi mdi-text-box-plus-outline fs-3"></i>
                                             </button>
                                         @endcan
                                         @can('usersap-delete')
                                                     <strong style="margin: 0 10px;">|</strong>
                                             <button wire:click="GetUsersap({{ $Usersap->id }})"
                                                 class="p-0 px-1 btn btn-text-danger waves-effect {{ $Usersap->active ? 'disabled' : '' }}"
                                                 data-bs-toggle = "modal" data-bs-target="#removeusersapModal">
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
                {{ $links->onEachSide(0)->links() }}
            </div>
            </div>
            <!-- Modal -->
            @include('livewire.usersapp.modals.edit-usersap')
            @include('livewire.usersapp.modals.remove-usersap')
            <!-- Modal -->
        @endcan
    </div>
</div>
</div>
  

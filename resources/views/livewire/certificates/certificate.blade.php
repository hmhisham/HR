
<div class="mt-n4">
    <h4 Class="mb-1fw-semiboyld">قائمة</h4>
    <Div Class="card">

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <input wire:model="CertificateSearch" type="text" class="form-control" placeholder="بحث...">
                </div>
                <div>
                    @can('certificate-create')
                        <button wire:click='AddCertificateModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addcertificateModal">أضــافــة</button>
                        @include('livewire.certificates.modals.add-certificate')
                    @endcan
                </div>
            </div>
        </div>
 @can('certificate-list')
            <table class="table">
                <thead class="table-light">
                    <tr>
                     <th>#</th>
   <th Class="text-center">اسم الشهادة</th>
<th Class="text-center">العملية</th>

                    </tr>
            </thead>
            <tbody>
                 <?php $i = 0; ?>
  @foreach ($Certificates as $Certificate)
                           <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                   <td Class="text-center">{{ $Certificate->certificates_name}}</td>

                                  <td Class="text-center">
                                     <div class="btn-group" role="group" aria-label="First group">
                                         @can('certificate-edit')
                                             <button wire:click="GetCertificate({{ $Certificate->id }})"
                                                 class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                 data-bs-target="#editcertificateModal">
                                                 <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                             </button>
                                         @endcan
                                         @can('certificate-delete')
                                             <button wire:click="GetCertificate({{ $Certificate->id }})"
                                                 class="p-0 px-1 btn btn-outline-danger waves-effect {{ $Certificate->active ? 'disabled' : '' }}"
                                                 data-bs-toggle = "modal" data-bs-target="#removecertificateModal">
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
            @include('livewire.certificates.modals.edit-certificate')
            @include('livewire.certificates.modals.remove-certificate')
            <!-- Modal -->
        @endcan
    </div>
</div>
</div>
   </div>

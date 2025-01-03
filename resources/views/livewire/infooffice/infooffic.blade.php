<div class="mt-n4">
    <h4 class="mb-2">
        <span class="text-muted fw-light">الإعدادات <span class="mdi mdi-chevron-left mdi-24px"></span></span> مكاتب
        المعلومات
    </h4>
    <div Class="card">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 mb-3">
                        <input wire:model="InfoOfficSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 mb-3 ms-auto text-end">
                        @can('infooffic-create')
                            <button wire:click='AddInfoOfficModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addinfoofficModal">أضــافــة</button>
                            @include('livewire.infooffice.modals.add-infooffic')
                        @endcan
                    </div>
                </div>
            </div>
            @can('infooffic-list')
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th Class="text-center">رقم</th>
                                <th Class="text-center">مكتب معلومات بطاقة السكن</th>
                                <th Class="text-center">العملية</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Infooffice as $InfoOffic)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td Class="text-center">{{ $InfoOffic->Infooffice_id }}</td>
                                    <td Class="text-center">{{ $InfoOffic->Infooffice_name }}</td>
                                    <td Class="text-center">
                                        <div class="btn-group" role="group" aria-label="First group">
                                            @can('infooffic-edit')
                                                <button wire:click="GetInfoOffic({{ $InfoOffic->id }})"
                                                    class="p-0 px-1 btn btn-text-success waves-effect" data-bs-toggle="modal"
                                                    data-bs-target="#editinfoofficModal">
                                                    <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                                </button>
                                            @endcan
                                            @can('infooffic-delete')
                                                <button wire:click="GetInfoOffic({{ $InfoOffic->id }})"
                                                    class="p-0 px-1 btn btn-text-danger waves-effect {{ $InfoOffic->active ? 'disabled' : '' }}"
                                                    data-bs-toggle = "modal" data-bs-target="#removeinfoofficModal">
                                                    <i class="tf-icons mdi mdi-delete-outline fs-3"></i>
                                                </button>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-2 d-flex justify-content-center">
                    {{ $links->links() }}
                </div>
                <!-- Modal -->
                @include('livewire.infooffice.modals.edit-infooffic')
                @include('livewire.infooffice.modals.remove-infooffic')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>

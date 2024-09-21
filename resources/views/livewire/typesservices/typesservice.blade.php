<div class="mt-n4">
    <h4 Class="mb-1fw-semiboyld">نافذة حالة الخدمة</h4>
    <Div Class="card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="TypesserviceSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        @can('typesservice-create')
                            <button wire:click='AddTypesserviceModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addtypesserviceModal">أضــافــة</button>
                            @include('livewire.typesservices.modals.add-typesservice')
                        @endcan
                    </div>
                </div>
            </div>
            @can('typesservice-list')
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th Class="text-center">حالة الخدمة</th>
                            <th Class="text-center">العملية</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($Typesservices as $Typesservice)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td Class="text-center">{{ $Typesservice->typesservices_name }}</td>
                                <td Class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('typesservice-edit')
                                            <button wire:click="GetTypesservice({{ $Typesservice->id }})"
                                                class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#edittypesserviceModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        @endcan
                                        @can('typesservice-delete')
                                            <button wire:click="GetTypesservice({{ $Typesservice->id }})"
                                                class="p-0 px-1 btn btn-outline-danger waves-effect {{ $Typesservice->active ? 'disabled' : '' }}"
                                                data-bs-toggle = "modal" data-bs-target="#removetypesserviceModal">
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
                @include('livewire.typesservices.modals.edit-typesservice')
                @include('livewire.typesservices.modals.remove-typesservice')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>

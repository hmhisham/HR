<div class="mt-n4">

    <div class="card">

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                        <h4 class="mb-1 fw-semiboyld">قائمة \ صفة العقار المؤجر</h4>
                    <div>
                        @can('descriptionrente-create')
                            <button wire:click='AddDescriptionrenteModalShow' class="mb-3 add-new btn btn-primary mb-md-0 d-flex align-items-center"
                                data-bs-toggle="modal" data-bs-target="#adddescriptionrenteModal">
                                <i class="mdi mdi-plus me-1"></i>
                                أضــافــة
                            </button>
                            @include('livewire.descriptionrented.modals.add-descriptionrente')
                        @endcan
                    </div>
                </div>
            </div>
            @can('descriptionrente-list')
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th class="text-center">صفة العقار المؤجر</th>
                            <th class="text-center">العملية</th>
                        </tr>

                        <tr>
                            <th></th>
                            <th class="text-center">
                                <input type="text" wire:model.debounce.300ms="search.description"
                                    class="text-center form-control" placeholder="صفة العقار المؤجر">
                            </th>

                            <th></th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($Descriptionrented as $Descriptionrente)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td class="text-center">{{ $Descriptionrente->description }}</td>

                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('descriptionrente-edit')
                                            <button wire:click="GetDescriptionrente({{ $Descriptionrente->id }})"
                                                class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editdescriptionrenteModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        @endcan
                                        @can('descriptionrente-delete')
                                            <button wire:click="GetDescriptionrente({{ $Descriptionrente->id }})"
                                                class="p-0 px-1 btn btn-outline-danger waves-effect {{ $Descriptionrente->active ? 'disabled' : '' }}"
                                                data-bs-toggle = "modal" data-bs-target="#removedescriptionrenteModal">
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
                @include('livewire.descriptionrented.modals.edit-descriptionrente')
                @include('livewire.descriptionrented.modals.remove-descriptionrente')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>
</div>

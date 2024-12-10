<div class="mt-n4">
    <h4 class="mb-2">
        <span class="text-muted fw-light">الاملاك والاراضي<span class="mdi mdi-chevron-left mdi-24px"></span></span> جنس العقار
    </h4>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <input wire:model="PropertytypeSearch" type="text" class="form-control" placeholder="بحث...">
                </div>
                <div>
                    @can('propertytype-create')
                        <button wire:click='AddPropertytypeModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addpropertytypeModal">أضــافــة</button>
                        @include('livewire.propertytypes.modals.add-propertytype')
                    @endcan
                </div>
            </div>
        </div>
        @can('propertytype-list')
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th class="text-center">اسم النوع</th>
                        <th class="text-center">العملية</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach ($Propertytypes as $Propertytype)
                        <tr>
                            <?php $i++; ?>
                            <td>{{ $i }}</td>
                            <td class="text-center">{{ $Propertytype->type_name }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="First group">
                                    @can('propertytype-edit')
                                        <button wire:click="GetPropertytype({{ $Propertytype->id }})"
                                            class="p-0 px-1 btn btn-text-success waves-effect" data-bs-toggle="modal"
                                            data-bs-target="#editpropertytypeModal">
                                            <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                        </button>
                                    @endcan
                                    @can('propertytype-delete')
                                        <button wire:click="GetPropertytype({{ $Propertytype->id }})"
                                            class="p-0 px-1 btn btn-text-danger waves-effect {{ $Propertytype->active ? 'disabled' : '' }}"
                                            data-bs-toggle = "modal" data-bs-target="#removepropertytypeModal">
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
            @include('livewire.propertytypes.modals.edit-propertytype')
            @include('livewire.propertytypes.modals.remove-propertytype')
            <!-- Modal -->
        @endcan
    </div>
</div>

<div class="mt-n4">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h4 class="mb-2">
                    <span class="text-muted fw-light">الاملاك والاراضي<span
                            class="mdi mdi-chevron-left mdi-24px"></span></span> جنس
                    العقار
                </h4>
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
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>ت</th>
                            <th class="text-center">اسم النوع</th>
                            <th class="text-center">العملية</th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th class="text-center">
                                <input type="text" wire:model.debounce.300ms="search.type_name"
                                    class="form-control text-center" placeholder="نوع العقار">
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = $links->perPage() * ($links->currentPage() - 1) + 1;
                        @endphp
                        @foreach ($Propertytypes as $Propertytype)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td class="text-center">{{ $Propertytype->type_name }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('propertytype-edit')
                                            <button wire:click="GetPropertytype({{ $Propertytype->id }})"
                                                class="p-0 px-1 btn btn-text-primary waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editpropertytypeModal">
                                                <i class="mdi mdi-text-box-edit-outline fs-3"></i>
                                            </button>
                                        @endcan
                                        <strong style="margin: 0 10px;">|</strong>
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
                    {{ $links->onEachSide(0)->links() }}
                </div>
            </div>
            @include('livewire.propertytypes.modals.edit-propertytype')
            @include('livewire.propertytypes.modals.remove-propertytype')
        @endcan
    </div>
</div>

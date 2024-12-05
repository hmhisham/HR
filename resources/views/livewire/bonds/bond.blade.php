<div class="mt-n4">
    <h4 class="mb-2">
        <span class="text-muted fw-light">الاملاك والاراضي <span class="mdi mdi-chevron-left mdi-24px"></span></span>
        السندات العقارية
    </h4>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <input wire:model="BondSearch" type="text" class="form-control" placeholder="بحث...">
                </div>
                <div>
                    @can('bond-create')
                        <button wire:click='AddBondModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addbondModal">أضــافــة</button>
                        @include('livewire.bonds.modals.add-bond')
                    @endcan
                </div>
            </div>
        </div>
        @can('bond-list')
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th class="text-center">رقم المقاطعة</th>
                        <th class="text-center">رقم القطعة</th>
                        <th class="text-center">رقم العقار</th>
                        <th class="text-center">العملية</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach ($Bonds as $Bond)
                        <tr>
                            <?php $i++; ?>
                            <td>{{ $i }}</td>
                            <td class="text-center">{{ $Bond->Getboycott ? $Bond->Getboycott->boycott_number . ' - ' . $Bond->Getboycott->boycott_name : '' }}</td>
                            <td class="text-center">{{ $Bond->part_number }}</td>
                            <td class="text-center">{{ $Bond->property_number }}</td>

                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="First group">
                                    @can('bond-edit')
                                        <button wire:click="GetBond({{ $Bond->id }})"
                                            class="p-0 px-1 btn btn-text-success waves-effect" data-bs-toggle="modal"
                                            data-bs-target="#editbondModal">
                                            <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                        </button>
                                    @endcan
                                    @can('bond-delete')
                                        <button wire:click="GetBond({{ $Bond->id }})"
                                            class="p-0 px-1 btn btn-text-danger waves-effect {{ $Bond->active ? 'disabled' : '' }}"
                                            data-bs-toggle = "modal" data-bs-target="#removebondModal">
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
            @include('livewire.bonds.modals.edit-bond')
            @include('livewire.bonds.modals.remove-bond')
            <!-- Modal -->
        @endcan
    </div>
</div>

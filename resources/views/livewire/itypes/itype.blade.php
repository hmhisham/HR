<div class="mt-n4">
    <h4 class="mb-2">
        <span class="text-muted fw-light">القسم المالي <span class="mdi mdi-chevron-left mdi-24px"></span></span>انواع
        القيود
    </h4>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <input wire:model="ItypeSearch" type="text" class="form-control" placeholder="بحث...">
                </div>
                <div>
                    @can('itype-create')
                        <button wire:click='AddItypeModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#additypeModal">أضــافــة</button>
                        @include('livewire.itypes.modals.add-itype')
                    @endcan
                </div>
            </div>
        </div>
        @can('itype-list')
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th class="text-center">اسم القيد</th>
                        <th class="text-center">نوع القيد</th>
                        <th class="text-center">ملاحظات</th>
                        <th class="text-center">العملية</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach ($Itypes as $Itype)
                        <tr>
                            <?php $i++; ?>
                            <td>{{ $i }}</td>
                            <td class="text-center">{{ $Itype->itypename }}</td>
                            <td class="text-center">{{ $Itype->itype }}</td>
                            <td class="text-center">{{ $Itype->note }}</td>

                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="First group">
                                    @can('itype-edit')
                                        <button wire:click="GetItype({{ $Itype->id }})"
                                            class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                            data-bs-target="#edititypeModal">
                                            <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                        </button>
                                    @endcan
                                    @can('itype-delete')
                                        <button wire:click="GetItype({{ $Itype->id }})"
                                            class="p-0 px-1 btn btn-outline-danger waves-effect {{ $Itype->active ? 'disabled' : '' }}"
                                            data-bs-toggle = "modal" data-bs-target="#removeitypeModal">
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
            @include('livewire.itypes.modals.edit-itype')
            @include('livewire.itypes.modals.remove-itype')
            <!-- Modal -->
        @endcan
    </div>
</div>

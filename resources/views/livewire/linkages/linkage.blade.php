<div class="mt-n4">
    <h4 class="mb-2">
        <span class="text-muted fw-light">الإعدادات <span class="mdi mdi-chevron-left mdi-24px"></span></span> الارتباط
    </h4>
    <div class="card">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 mb-3">
                        <input wire:model="LinkageSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 mb-3 ms-auto text-end">
                        @can('linkage-create')
                            <button wire:click='AddLinkageModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addlinkageModal">أضــافــة</button>
                            @include('livewire.linkages.modals.add-linkage')
                        @endcan
                    </div>
                </div>
            </div>
            @can('linkage-list')
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th class="text-center">اسم الارتباط</th>
                                <th class="text-center">العملية</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($Linkages as $Linkage)
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                    <td class="text-center">{{ $Linkage->Linkages_name }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="First group">
                                            @can('linkage-edit')
                                                <button wire:click="GetLinkage({{ $Linkage->id }})"
                                                    class="p-0 px-1 btn btn-text-success waves-effect" data-bs-toggle="modal"
                                                    data-bs-target="#editlinkageModal">
                                                    <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                                </button>
                                            @endcan
                                            @can('linkage-delete')
                                                <button wire:click="GetLinkage({{ $Linkage->id }})"
                                                    class="p-0 px-1 btn btn-text-danger waves-effect {{ $Linkage->active ? 'disabled' : '' }}"
                                                    data-bs-toggle = "modal" data-bs-target="#removelinkageModal">
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
                @include('livewire.linkages.modals.edit-linkage')
                @include('livewire.linkages.modals.remove-linkage')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>

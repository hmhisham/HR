<div class="mt-n4">
    <h4 Class="mb-1fw-semiboyld">قائمة الارتباط</h4>
    <Div Class="card">

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="LinkSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        @can('link-create')
                            <button wire:click='AddLinkModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addlinkModal">أضــافــة</button>
                            @include('livewire.links.modals.add-link')
                        @endcan
                    </div>
                </div>
            </div>
            @can('link-list')
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th Class="text-center">اسم الارتباط</th>
                            <th Class="text-center">العملية</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($Links as $Link)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td Class="text-center">{{ $Link->link_name }}</td>

                                <td Class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('link-edit')
                                            <button wire:click="GetLink({{ $Link->id }})"
                                                class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editlinkModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        @endcan
                                        @can('link-delete')
                                            <button wire:click="GetLink({{ $Link->id }})"
                                                class="p-0 px-1 btn btn-outline-danger waves-effect {{ $Link->active ? 'disabled' : '' }}"
                                                data-bs-toggle = "modal" data-bs-target="#removelinkModal">
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
                @include('livewire.links.modals.edit-link')
                @include('livewire.links.modals.remove-link')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>
</div>

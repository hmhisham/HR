<div class="mt-n4">
    <h4 class="mb-2">
        <span class="text-muted fw-light">الاملاك والاراضي<span class="mdi mdi-chevron-left mdi-24px"></span></span>
        السندات العقارية
    </h4>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <input wire:model="bondSearch" type="text" class="form-control" placeholder="بحث...">
                </div>
            </div>
        </div>
        @can('bond-list')
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th class="text-center">الاسم</th>
                        <th class="text-center">العدد</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach ($boycotts as $boycott)
                        <tr>
                            <?php $i++; ?>
                            <td>{{ $i }}</td>
                            <td class="text-center">{{ isset($boycott->boycott_number) && isset($boycott->boycott_name) ? $boycott->boycott_number . ' - ' . $boycott->boycott_name : '' }}</td>
                            <td Class="text-center">
                                {{ $boycott->GetBonds->count() }}
                            </td>
                            <td class="p-0">
                                @can('bond-show')
                                    <a href="{{ Route('Bond-Show', $boycott->id) }}"
                                        Class="p-0 px-1 btn btn-text-primary waves-effect">
                                        <span Class="tf-icons mdi mdi-eye fs-3"></span>
                                    </a>
                                @endcan
                                @can('bond-create')
                                    <Button wire : click='AddBondModal({{ $boycott->id }})'
                                        class="p-0 px-1 btn btn-text-primary waves-effect" data-bs-toggle="modal"
                                        data-bs-target="#addbondModal">
                                        <span Class=" tf-icons mdi mdi-text-box-multiple"></span>
                                    </button>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-2 d-flex justify-content-center">
                {{ $links->links() }}
            </div>
            <!-- Modal -->
            @include('livewire.bonds.modals.add-bond')
            <!-- Modal -->
        @endcan
    </div>
</div>

<div class="mt-n4">
    <h4 class="mb-2">
        <span class="text-muted fw-light">الموارد البشرية <span class="mdi mdi-chevron-left mdi-24px"></span></span> التنسيب
    </h4>
    <div class="card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="PlacementSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                </div>
            </div>
            @can('placement-list')
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th class="text-center">اسم الموظف</th>
                            <th class="text-center">التنسيب</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($workers as $worker)
                            <?php $i++; ?>
                            <tr>
                                <td>{{ $i }}</td>
                                <td class="text-center">{{ $worker->full_name }}</td>
                                <td class="text-center">
                                    {{ $worker->GetPlacement->count() }}
                                </td>
                                <td class="p-0">
                                    @can('placement-show')
                                        <a href="{{ Route('Placement-Show', $worker->id) }}" class="p-0 px-1 btn btn-text-primary waves-effect">
                                            <span class="tf-icons mdi mdi-eye fs-3"></span>
                                        </a>
                                    @endcan
                                    @can('placement-create')
                                        <button wire:click='AddPlacementModal({{ $worker->id }})' class="p-0 px-1 btn btn-text-primary waves-effect"
                                            data-bs-toggle="modal" data-bs-target="#addplacementModal">
                                            <span class="tf-icons mdi mdi-school fs-3"></span>
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
                @include('livewire.placements.modals.add-placement')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>

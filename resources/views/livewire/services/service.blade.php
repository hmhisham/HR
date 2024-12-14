<div class="mt-n4">
    <h4 class="mb-2">
        <span class="text-muted fw-light">الموارد البشرية <span class="mdi mdi-chevron-left mdi-24px"></span></span>
        الخدمات المضافة
    </h4>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <input wire:model="ServiceSearch" type="text" class="form-control" placeholder="بحث...">
                </div>
            </div>
        </div>
        @can('service-list')
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
                    @foreach ($workers as $worker)
                        <tr>
                            <?php $i++; ?>
                            <td>{{ $i }}</td>

                            <td Class="text-center">{{ $worker->full_name }}</td>
                            <td Class="text-center">
                                {{ $worker->GetServices->count() }}
                            </td>
                            <td class="p-0">
                                @can('service-show')
                                    <a href="{{ Route('Service-Show', $worker->id) }}"
                                        Class="p-0 px-1 btn btn-text-primary waves-effect">
                                        <span Class="tf-icons mdi mdi-eye fs-3"></span>
                                    </a>
                                @endcan
                                @can('service-create')
                                    <Button wire:click='AddServiceModal({{ $worker->id }})'
                                        class="p-0 px-1 btn btn-text-primary waves-effect" data-bs-toggle="modal"
                                        data-bs-target="#addserviceModal">
                                        <span Class=" tf-icons mdi mdi-trello"></span>
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
            @include('livewire.services.modals.add-service')
            <!-- Modal -->
        @endcan
    </div>
</div>

<div class="mt-n4">
    <h4 class="mb-2">
        <span class="text-muted fw-light">الموارد البشرية <span class="mdi mdi-chevron-left mdi-24px"></span></span> خلاصة
        الخدمة
    </h4>
    <div class="card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="serviceSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        @can('service-create')
                            <button wire:click='AddserviceModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addserviceModal">أضــافــة</button>
                            @include('livewire.services.modals.add-service')
                        @endcan
                    </div>
                </div>
            </div>
            @can('service-list')
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th class="text-center">اسم الموظف</th>
                            <th class="text-center">نوع الخدمة</th>
                            <th class="text-center">رقم امر الاداري</th>
                            <th class="text-center">تاريخ امر الاداري</th>
                            <th class="text-center">العملية</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($Services as $service)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td class="text-center">{{ $service->Getworker ? $service->Getworker->full_name : '' }}</td>
                                <td class="text-center">{{ $service->service_type }}</td>
                                <td class="text-center">{{ $service->administrative_order_number }}</td>
                                <td class="text-center">{{ $service->administrative_order_date }}</td>

                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('service-edit')
                                            <button wire:click="Getservice({{ $service->id }})"
                                                class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editserviceModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        @endcan
                                        @can('service-delete')
                                            <button wire:click="Getservice({{ $service->id }})"
                                                class="p-0 px-1 btn btn-outline-danger waves-effect {{ $service->active ? 'disabled' : '' }}"
                                                data-bs-toggle = "modal" data-bs-target="#removeserviceModal">
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
                @include('livewire.services.modals.edit-service')
                @include('livewire.services.modals.remove-service')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>
</div>

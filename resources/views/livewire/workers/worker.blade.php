<div class="mt-n4">
    <h4 class="mb-2">
        <span class="text-muted fw-light">الموارد البشرية<span class="mdi mdi-chevron-left mdi-24px"></span></span> المعلومات العامة
    </h4>
    <div class="card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="WorkerSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        {{-- @can('worker-create')
                        <button wire:click='AddWorkerModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addworkerModal">أضــافــة</button>
                        @include('livewire.workers.add-worker')
                        @endcan --}}
                        @can('worker-create')
                            <a href="{{ Route('AddWorker') }}" class="mb-3 add-new btn btn-primary mb-md-0">أضــافــة</a>
                            <button wire:click="SenNotify" class="mb-3 add-new btn btn-success mb-md-0">ارسال اشعار</button>
                        @endcan
                    </div>
                </div>
            </div>

            @can('worker-list')
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th class="text-center">رقم الحاسبة</th>
                            <th class="text-center">الرقم الوظيفي</th>
                            <th class="text-center">الاسم الكامل</th>
                            <th class="text-center">العملية</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($Workers as $worker)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td class="text-center">{{ $worker->calculator_number }}</td>
                                <td class="text-center">{{ $worker->employee_number }}</td>
                                <td class="text-center">{{ $worker->full_name }}</td>

                                 <td class="text-center">
                                    {{--<div class="btn-group" role="group" aria-label="First group">
                                        @can('worker-edit')
                                            <button wire:click="Getworker({{ $worker->id }})"
                                                class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editworkerModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        @endcan
                                        @can('worker-delete')
                                            <button wire:click="Getworker({{ $worker->id }})"
                                                class="p-0 px-1 btn btn-outline-danger waves-effect {{ $worker->active ? 'disabled' : '' }}"
                                                data-bs-toggle = "modal" data-bs-target="#removeworkerModal">
                                                <i class="tf-icons mdi mdi-delete-outline fs-3"></i>
                                            </button>
                                        @endcan
                                    </div> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-2 d-flex justify-content-center">
                    {{ $links->links() }}
                </div>
                <!-- Modal -->

                @include('livewire.workers.modals.edit-worker')
                @include('livewire.workers.modals.remove-worker')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>
</div>

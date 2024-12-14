<div class="mt-n4">
    <h4 class="mb-2">
        <span class="text-muted fw-light">خلاصة الخدمة <span class="mdi mdi-chevron-left mdi-24px"></span></span> عرض
        البيانات الخاصة بـ/ : {{ $Worker->full_name }}
    </h4>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <input wire:model="ServiceSearch" type="text" class="form-control" placeholder="بحث...">
                </div>
                <div>
                    @can('service-create')
                        <button wire:click='AddServiceModal' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addserviceModal">أضــافــة</button>
                        @include('livewire.services.show-service.modals.add-service')
                    @endcan
                </div>
            </div>
        </div>

        <div class="card">
            @if (!empty($Worker) and count($WorkerServices) > 0)
                <table class="table w-100" border="1">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th class="text-center">نوع الخدمة</th>
                            <th class="text-center">من تاريخ</th>
                            <th class="text-center">الى تاريخ</th>
                            <th class="text-center">الشهادة</th>
                            <th class="text-center">الغرض</th>
                            <th class="text-center">العنوان الوظيفي الاستحداث</th>
                            <th class="text-center">العملية</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($WorkerServices as $Services)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td class="text-center">{{ $Services->service_type }}</td>
                                <td class="text-center">{{ $Services->from_date }}</td>
                                <td class="text-center">{{ $Services->to_date }}</td>
                                <td class="text-center">{{ $Services->Getcertificate ? $Services->Getcertificate->certificates_name : '' }}</td>
                                <td class="text-center">{{ $Services->purpose }}</td>
                                <td class="text-center">{{ $Services->Getjobtitle ? $Services->Getjobtitle->jobtitles_name : '' }}</td>

                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('service-edit')
                                            <button wire:click="GetService({{ $Services->id }})"
                                                class="p-0 px-1 btn btn-text-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editserviceModal">
                                                <i class="tf-icons mdi mdi-pencil mdi-24px"></i>
                                            </button>
                                        @endcan
                                        @can('service-delete')
                                            <button wire:click="GetService({{ $Services->id }})"
                                                class="p-0 px-1 btn btn-text-danger waves-effect {{ $Services->active ? 'disabled' : '' }}"
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
            @else
                <h1 class="text-center">لا توجد بيانات مضافة</h1>
            @endif
            <!-- Modal -->
            @include('livewire.services.show-service.modals.edit-service')
            @include('livewire.services.show-service.modals.remove-service')
            <!-- Modal -->

        </div>
    </div>
</div>

<div class="mt-n4">
    <h4 class="mb-2">
        <span class="text-muted fw-light">الإعدادات <span class="mdi mdi-chevron-left mdi-24px"></span></span> الشهادات
    </h4>
    <div class="card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="certifiSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        @can('certifi-create')
                            <button wire:click='AddcertifiModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addcertifiModal">أضــافــة</button>
                            @include('livewire.certific.modals.add-certifi')
                        @endcan
                    </div>
                </div>
            </div>
            @can('certifi-list')
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th class="text-center">اسم الموظف</th>
                            <th class="text-center">رقم الوثيقة</th>
                            <th class="text-center">تاريخ الوثيقة</th>
                            <th class="text-center">الشهادة</th>
                            <th class="text-center">التخصص</th>
                            <th class="text-center">العملية</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($Certific as $certifi)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td class="text-center">{{ $Certifi->Getworker ? $Certifi->Getworker->full_name : '' }}</td>
                                <td class="text-center">{{ $certifi->document_number }}</td>
                                <td class="text-center">{{ $certifi->document_date }}</td>
                                <td class="text-center">
                                    {{ $Certifi->GetCertificate ? $Certifi->Getcertificate->certificates_name : '' }}</td>
                                <td class="text-center">
                                    {{ $Certifi->Getspecialization ? $Certifi->Getspecialization->specializations_name : '' }}
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('certifi-edit')
                                            <button wire:click="Getcertifi({{ $certifi->id }})"
                                                class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editcertifiModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        @endcan
                                        @can('certifi-delete')
                                            <button wire:click="Getcertifi({{ $certifi->id }})"
                                                class="p-0 px-1 btn btn-outline-danger waves-effect {{ $certifi->active ? 'disabled' : '' }}"
                                                data-bs-toggle = "modal" data-bs-target="#removecertifiModal">
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
                @include('livewire.certific.modals.edit-certifi')
                @include('livewire.certific.modals.remove-certifi')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>

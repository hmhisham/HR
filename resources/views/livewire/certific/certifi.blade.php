<div class="mt-n4">
    <h4 class="mb-2">
        <span class="text-muted fw-light">الموارد البشرية <span class="mdi mdi-chevron-left mdi-24px"></span></span> الشهادات
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
                            {{-- <button wire:click='AddcertifiModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addcertifiModal">أضــافــة</button> --}}

                            @include('livewire.certific.modals.add-certificate')
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
                            <th class="text-center">الشهادات</th>
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
                                    {{-- @if ($worker->GetCertific->count() > 0)
                                        <table class="table w-100" border="1">
                                            <thead class="table-light">
                                                <th class="text-center">رقم الوثيقة</th>
                                                <th class="text-center">تاريخ الوثيقة</th>
                                                <th class="text-center">الشهادة</th>
                                                <th class="text-center">التخصص</th>
                                                <th class="text-center">العملية</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($worker->GetCertific as $Certific)
                                                <tr>
                                                    <td>{{ $Certific->document_number }}</td>
                                                    <td>{{ $Certific->document_date }}</td>
                                                    <td>{{ $Certific->Getcertificate->certificates_name }}</td>
                                                    <td>{{ $Certific->Getspecialization->specializations_name }}</td>
                                                    <td class="text-center">
                                                        @can('branc-edit')
                                                            <button wire:click="GetBranch({{ $worker->id }})"
                                                                class="p-0 px-1 btn btn-text-success waves-effect" data-bs-toggle="modal"
                                                                data-bs-target="#editbrancModal">
                                                                <i class="tf-icons mdi mdi-pencil"></i>
                                                            </button>
                                                        @endcan
                                                        @can('branc-delete')
                                                            <button wire:click="GetBranch({{ $worker->id }})"
                                                                class="p-0 px-1 btn btn-text-danger waves-effect {{ $worker->active ? 'disabled' : '' }}"
                                                                data-bs-toggle="modal" data-bs-target="#removebrancModal">
                                                                <i class="tf-icons mdi mdi-delete-outline"></i>
                                                            </button>
                                                        @endcan
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif --}}
                                    {{ $worker->GetCertific->count() }}
                                </td>
                                <td class="p-0">
                                    @can('certifi-create')
                                        <button wire:click='AddCertifyModal({{ $worker->id }})' class="p-0 px-1 btn btn-text-primary waves-effect"
                                            data-bs-toggle="modal" data-bs-target="#showCertifiModal">
                                            <span class="tf-icons mdi mdi-eye fs-3"></span>
                                        </button>
                                    @endcan
                                    @can('certifi-create')
                                        <button wire:click='AddCertifyModal({{ $worker->id }})' class="p-0 px-1 btn btn-text-primary waves-effect"
                                            data-bs-toggle="modal" data-bs-target="#addcertifiModal">
                                            <span class="tf-icons mdi mdi-school fs-3"></span>
                                        </button>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach

                        {{-- @foreach ($Certific as $certifi)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td class="text-center">{{ $certifi->Getworker ? $certifi->Getworker->full_name : '' }}</td>
                                <td class="text-center">{{ $certifi->document_number }}</td>
                                <td class="text-center">{{ $certifi->document_date }}</td>
                                <td class="text-center">{{ $certifi->Getcertificate ? $certifi->Getcertificate->certificates_name : '' }}</td>
                                <td class="text-center">{{ $certifi->Getspecialization ? $certifi->Getspecialization->specializations_name : '' }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('certifi-edit')
                                            <button wire:click="Getcertifi({{ $certifi->id }})"
                                                class="p-0 px-1 btn btn-text-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editcertifiModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        @endcan
                                        @can('certifi-delete')
                                            <button wire:click="Getcertifi({{ $certifi->id }})"
                                                class="p-0 px-1 btn btn-text-danger waves-effect {{ $certifi->active ? 'disabled' : '' }}"
                                                data-bs-toggle = "modal" data-bs-target="#removecertifiModal">
                                                <i class="tf-icons mdi mdi-delete-outline fs-3"></i>
                                            </button>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
                <div class="mt-2 d-flex justify-content-center">
                    {{ $links->links() }}
                </div>
                <!-- Modal -->
                @include('livewire.certific.modals.show-certificate')
                @include('livewire.certific.modals.edit-certificate')
                @include('livewire.certific.modals.remove-certificate')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>

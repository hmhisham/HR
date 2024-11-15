<div class="mt-n4">
    <h4 class="mb-2">
        <span class="text-muted fw-light">الموارد البشرية <span class="mdi mdi-chevron-left mdi-24px"></span></span> عرض
        شهادات السيد/ة : {{ $Worker->full_name }}
    </h4>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <input wire:model="certifiSearch" type="text" class="form-control" placeholder="بحث...">
            </div>
            <div>
                @can('certificate-create')
                    <button wire:click='AddCertifyModal' class="mb-3 add-new btn btn-primary mb-md-0" data-bs-toggle="modal"
                        data-bs-target="#addcertifiModal">أضــافــة</button>
                    @include('livewire.certific.modals.add-certificate')
                @endcan
            </div>
        </div>

        <div class="card">
            @if (!empty($Worker) and $Worker->GetCertific->count() > 0)
                <table class="table w-100" border="1">
                    <thead class="table-light">
                        <th class="">رقم الوثيقة</th>
                        <th class="">تاريخ الوثيقة</th>
                        <th class="">الشهادة</th>
                        <th class="">التخصص</th>
                        <th class="text-center">العملية</th>
                    </thead>
                    <tbody>
                        @foreach ($Worker->GetCertific as $Certific)
                            <tr>
                                <td>{{ $Certific->document_number }}</td>
                                <td class="">{{ $Certific->document_date }}</td>
                                <td>{{ $Certific->Getcertificate->certificates_name }}</td>
                                <td>{{ $Certific->Getspecialization->specializations_name }}</td>
                                <td class="text-center">
                                    @can('branc-edit')
                                        <button wire:click="Getcertifi({{ $Certific->id }})"
                                            class="p-0 px-1 btn btn-text-success waves-effect" data-bs-toggle="modal"
                                            data-bs-target="#editcertifiModal">
                                            <i class="tf-icons mdi mdi-pencil mdi-24px"></i>
                                        </button>
                                    @endcan
                                    @can('branc-delete')
                                        <button wire:click="Getcertifi({{ $Certific->id }})"
                                            class="p-0 px-1 btn btn-text-danger waves-effect {{ $Certific->active ? 'disabled' : '' }}"
                                            data-bs-toggle="modal" data-bs-target="#removebrancModal">
                                            <i class="tf-icons mdi mdi-delete-outline mdi-24px"></i>
                                        </button>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h1 class="text-center">لا توجد شهادات مضافة</h1>
            @endif

            @include('livewire.certific.show-certifi.modals.edit-certificate')
            {{-- @include('livewire.certific.modals.remove-certificate') --}}
        </div>
    </div>
</div>

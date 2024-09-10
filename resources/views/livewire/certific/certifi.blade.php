<div class="mt-n4">
    <h4 class="mb-1 fw-semiboyld">قائمة</h4>
    <div class="card">

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="CertifiSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        @can('certifi-create')
                        <button wire:click='AddCertifiModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
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
                        <th Class="text-center">الاسم الكامل</th>
                        <th Class="text-center">القسم</th>
                        <th class="text-center">رقم الحاسبة</th>
                        <th class="text-center">الشهادة</th>
                        <th class="text-center">تحصيل الدراسي</th>
                        <th class="text-center">سنة التخرج</th>
                        <th class="text-center">العملية</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach ($Certific as $Certifi)
                    <tr>
                        <?php $i++; ?>
                        <td>{{ $i }}</td>
                        <td class="text-center">{{ $Certifi->worker ? $Certifi->worker->full_name : 'N/A' }}</td>
                        <td class="text-center">{{ $Certifi->worker ? $Certifi->worker->department : 'N/A' }}</td>
                        <td class="text-center">{{ $Certifi->calculator_number}}</td>
                        <td class="text-center">{{ $Certifi->certificate_name}}</td>
                        <td class="text-center">{{ $Certifi->educational_attainment}}</td>
                        <td class="text-center">{{ $Certifi->graduation_year}}</td>

                        <td class="text-center">
                            <div class="btn-group" role="group" aria-label="First group">
                                @can('certifi-edit')
                                <button wire:click="GetCertifi({{ $Certifi->id }})"
                                    class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                    data-bs-target="#editcertifiModal">
                                    <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                </button>
                                @endcan
                                @can('certifi-delete')
                                <button wire:click="GetCertifi({{ $Certifi->id }})"
                                    class="p-0 px-1 btn btn-outline-danger waves-effect {{ $Certifi->active ? 'disabled' : '' }}"
                                    data-bs-toggle="modal" data-bs-target="#removecertifiModal">
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
</div>

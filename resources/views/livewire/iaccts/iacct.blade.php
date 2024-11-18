<div class="mt-n4">
    <h4 class="mb-2">
        <span class="text-muted fw-light">القسم المالي <span class="mdi mdi-chevron-left mdi-24px"></span></span> الدليل
        المحاسبي
    </h4>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <input wire:model="IacctSearch" type="text" class="form-control" placeholder="بحث...">
                </div>
                <div>
                    @can('iacct-create')
                        <button wire:click='AddIacctModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addiacctModal">أضــافــة</button>
                        @include('livewire.iaccts.modals.add-iacct')
                    @endcan
                </div>
            </div>
        </div>
        @can('iacct-list')
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th class="text-end">رقم الدليل</th>
                        <th class="text-center">اسم الدليل</th>
                        <th class="text-center">ملاحظات</th>
                        <th class="text-center">العملية</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach ($Iaccts as $Iacct)
                        <tr>
                            <?php $i++; ?>
                            <td>{{ $i }}</td>
                            <td class="text-end">{{ $Iacct->iacct }}</td>
                            <td class="text-center">{{ $Iacct->iacctname }}</td>
                            <td class="text-center">{{ $Iacct->note }}</td>

                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="First group">
                                    @can('iacct-edit')
                                        <button wire:click="GetIacct({{ $Iacct->id }})"
                                            class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                            data-bs-target="#editiacctModal">
                                            <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                        </button>
                                    @endcan
                                    @can('iacct-delete')
                                        <button wire:click="GetIacct({{ $Iacct->id }})"
                                            class="p-0 px-1 btn btn-outline-danger waves-effect {{ $Iacct->active ? 'disabled' : '' }}"
                                            data-bs-toggle = "modal" data-bs-target="#removeiacctModal">
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
            @include('livewire.iaccts.modals.edit-iacct')
            @include('livewire.iaccts.modals.remove-iacct')
            <!-- Modal -->
        @endcan
    </div>
</div>

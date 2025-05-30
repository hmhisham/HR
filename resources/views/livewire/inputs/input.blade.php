<div class="mt-n4">
    <h4 class="mb-2">
        <span class="text-muted fw-light">القسم المالي <span class="mdi mdi-chevron-left mdi-24px"></span></span> ادخال
        اليومية
    </h4>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <input wire:model="InputSearch" type="text" class="form-control" placeholder="بحث...">
                </div>
                <div>
                    @can('input-create')
                        <button wire:click='AddInputModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addinputModal">أضــافــة</button>
                        @include('livewire.inputs.modals.add-input')
                    @endcan
                </div>
            </div>
        </div>
        @can('input-list')
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th class="text-center">رقم الزرمة</th>
                        <th class="text-center">نوع القيد</th>
                        <th class="text-center">رقم المستند</th>
                        <th class="text-center">تاريخ المستند</th>
                        <th class="text-center">العملية</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach ($Inputs as $Input)
                        <tr>
                            <?php $i++; ?>
                            <td>{{ $i }}</td>
                            <td class="text-center">{{ $Input->patch }}</td>
                            <td class="text-center">{{ $Input->Getitype ? $Input->Getitype->itype : '' }}</td>
                            <td class="text-center">{{ $Input->idocument }}</td>
                            <td class="text-center">{{ $Input->idate }}</td>

                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="First group">
                                    @can('input-edit')
                                        <button wire:click="GetInput({{ $Input->id }})"
                                            class="p-0 px-1 btn btn-text-success waves-effect" data-bs-toggle="modal"
                                            data-bs-target="#editinputModal">
                                            <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                        </button>
                                    @endcan
                                    @can('input-delete')
                                        <button wire:click="GetInput({{ $Input->id }})"
                                            class="p-0 px-1 btn btn-text-danger waves-effect {{ $Input->active ? 'disabled' : '' }}"
                                            data-bs-toggle = "modal" data-bs-target="#removeinputModal">
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
            @include('livewire.inputs.modals.edit-input')
            @include('livewire.inputs.modals.remove-input')
            <!-- Modal -->
        @endcan
    </div>
</div>

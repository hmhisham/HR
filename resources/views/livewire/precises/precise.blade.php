<div class="mt-n4">
    <h4 class="mb-2">
        <span class="text-muted fw-light">الإعدادات <span class="mdi mdi-chevron-left mdi-24px"></span></span> التخصص
        الدقيق
    </h4>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <input wire:model="PreciseSearch" type="text" class="form-control" placeholder="بحث...">
                </div>
                <div>
                    @can('precise-create')
                        <button wire:click='AddPreciseModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addpreciseModal">أضــافــة</button>
                        @include('livewire.precises.modals.add-precise')
                    @endcan
                </div>
            </div>
        </div>
        @can('precise-list')
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th Class="text-center">الرمز</th>
                        <th Class="text-center">التخصص العام</th>
                        <th Class="text-center">الرمز</th>
                        <th Class="text-center">التخصص الدقيق</th>
                        <th Class="text-center">العملية</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach ($Precises as $Precise)
                        <tr>
                            <?php $i++; ?>
                            <td>{{ $i }}</td>
                            <td class="text-center">
                                {{ $Precise->Getspecialty ? $Precise->Getspecialty->specialtys_id : '' }}</td>
                            <td class="text-center">
                                {{ $Precise->Getspecialty ? $Precise->Getspecialty->specialtys_name : '' }}</td>
                            <td Class="text-center">{{ $Precise->precises_code }}</td>
                            <td Class="text-center">{{ $Precise->precises_name }}</td>
                            <td Class="text-center">
                                <div class="btn-group" role="group" aria-label="First group">
                                    @can('precise-edit')
                                        <button wire:click="GetPrecise({{ $Precise->id }})"
                                            class="p-0 px-1 btn btn-text-success waves-effect" data-bs-toggle="modal"
                                            data-bs-target="#editpreciseModal">
                                            <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                        </button>
                                    @endcan
                                    @can('precise-delete')
                                        <button wire:click="GetPrecise({{ $Precise->id }})"
                                            class="p-0 px-1 btn btn-text-danger waves-effect {{ $Precise->active ? 'disabled' : '' }}"
                                            data-bs-toggle = "modal" data-bs-target="#removepreciseModal">
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
            @include('livewire.precises.modals.edit-precise')
            @include('livewire.precises.modals.remove-precise')
            <!-- Modal -->
        @endcan
    </div>
</div>

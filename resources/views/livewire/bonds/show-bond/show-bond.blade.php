<div class="mt-n4">
    <h4 class="mb-2">
        <span class="text-muted fw-light">السندات العقارية <span class="mdi mdi-chevron-left mdi-24px"></span></span> عرض
        البيانات الخاصة بـ/ : {{ $Boycott->boycott_number }} - {{ $Boycott->boycott_name }}
    </h4>

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <input wire:model="bondSearch" type="text" class="form-control" placeholder="بحث...">
                </div>
                <div>
                    @can('bond-create')
                        <button wire:click='AddBondModal' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addbondModal">أضــافــة</button>
                       @include('livewire.bonds.show-bond.modals.add-bond')
                    @endcan
                </div>
            </div>
        </div>

        <div class="card">
            @if (!empty($Boycott) and count($BoycottBonds) > 0)
                <table class="table w-100" border="1">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th class="text-center">رقم القطعة</th>
                            <th class="text-center">رقم العقار</th>
                            <th class="text-center">إشارات التأمينات</th>
                            <th class="text-center">الشعبة المختصة</th>
                            <th class="text-center">العملية</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($BoycottBonds as $Bonds)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td class="text-center">{{ $Bonds->part_number }}</td>
                                <td class="text-center">{{ $Bonds->property_number }}</td>
                                <td class="text-center">{{ $Bonds->mortgage_notes }}</td>
                                <td class="text-center">{{ $Bonds->specialized_department }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('bond-edit')
                                            <button wire:click="GetBond({{ $Bonds->id }})"
                                                class="p-0 px-1 btn btn-text-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editbondModal">
                                                <i class="tf-icons mdi mdi-pencil mdi-24px"></i>
                                            </button>
                                        @endcan
                                        @can('bond-delete')
                                            <button wire:click="GetBond({{ $Bonds->id }})"
                                                class="p-0 px-1 btn btn-text-danger waves-effect {{ $Bonds->active ? 'disabled' : '' }}"
                                                data-bs-toggle = "modal" data-bs-target="#removebondModal">
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
            @include('livewire.bonds.show-bond.modals.edit-bond')
            @include('livewire.bonds.show-bond.modals.remove-bond')
            <!-- Modal -->

        </div>
    </div>
</div>

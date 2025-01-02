<div class="mt-n4">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h4 class="mb-2">
                    <span class="text-muted fw-light">السندات العقارية <span
                            class="mdi mdi-chevron-left mdi-24px"></span></span> عرض
                    البيانات الخاصة بمقاطعة : {{ $Boycott->boycott_number ?? '' }} - {{ $Boycott->boycott_name ?? '' }}
                </h4>
                <div>
                    @can('bond-create')
                        <button wire:click='AddBondModal' class="mb-3 add-new btn btn-primary mb-md-0" data-bs-toggle="modal"
                            data-bs-target="#addbondModal">أضــافــة</button>
                        @include('livewire.bonds.show-bond.modals.add-bond')
                    @endcan
                </div>
            </div>
        </div>

        <div class="card">
            @if (!empty($Boycott) && !empty($BoycottBonds) && count($BoycottBonds) > 0)
                <table class="table w-100" border="1">
                    <thead class="table-light">
                        <tr>
                            <th>ت</th>
                            <th class="text-center">رقم القطعة</th>
                            <th class="text-center">رقم العقار</th>
                            <th class="text-center">إشارات التأمينات</th>
                            <th class="text-center">الشعبة المختصة</th>
                            <th class="text-center">العملية</th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>
                                <input type="text" wire:model.debounce.500ms="search.part_number"
                                    class="form-control" placeholder="بحث برقم القطعة ..">
                            </th>
                            <th>
                                <input type="text" wire:model.debounce.500ms="search.property_number"
                                    class="form-control" placeholder="بحث برقم العقار ..">
                            </th>
                            <th>
                                <input type="text" wire:model.debounce.500ms="search.mortgage_notes"
                                    class="form-control" placeholder="بحث اشارات التامين ..">
                            </th>
                            <th>
                                <input type="text" wire:model.debounce.500ms="search.specialized_department"
                                    class="form-control" placeholder="بحث بالشعبة المختصة ..">
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = $bonds->perPage() * ($bonds->currentPage() - 1) + 1;
                        @endphp
                        @foreach ($bonds as $bond)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td class="text-center">{{ $bond->part_number }}</td>
                                <td class="text-center">{{ $bond->property_number }}</td>
                                <td class="text-center">{{ $bond->mortgage_notes }}</td>
                                <td class="text-center">{{ $bond->specialized_department }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('bond-edit')
                                            <button wire:click="GetBond({{ $bond->id }})"
                                                class="p-0 px-1 btn btn-text-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editbondModal">
                                                <i class="tf-icons mdi mdi-pencil mdi-24px"></i>
                                            </button>
                                        @endcan
                                        @can('bond-delete')
                                            <button wire:click="GetBond({{ $bond->id }})"
                                                class="p-0 px-1 btn btn-text-danger waves-effect {{ $bond->active ? 'disabled' : '' }}"
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
                <div class="mt-2 d-flex justify-content-center">
                    {{ $bonds->onEachSide(1)->links() }}
                </div>
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

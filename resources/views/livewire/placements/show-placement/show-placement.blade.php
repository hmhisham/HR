<div class="mt-n4">
    <h4 class="mb-2">
        <span class="text-muted fw-light">الموارد البشرية <span class="mdi mdi-chevron-left mdi-24px"></span></span> عرض
        تنقلات السيد/ة : {{ $Worker->full_name }}
    </h4>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <input wire:model="PlacementSearch" type="text" class="form-control" placeholder="بحث...">
            </div>
            <div>
                @can('placement-create')
                    <button wire:click='AddPlacementModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                        data-bs-toggle="modal" data-bs-target="#addplacementModal">أضــافــة</button>
                    @include('livewire.placements.modals.add-placement')
                @endcan
            </div>
        </div>
        <div class="card">
            @if (!empty($Worker) and count($WorkerPlacements) > 0)
                <table class="table w-100" border="1">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th class="text-center">القسم</th>
                            <th class="text-center">رقم أمر التنسيب</th>
                            <th class="text-center">تاريخ أمر التنسيب</th>
                            <th class="text-center">العملية</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 0; @endphp
                        @foreach ($WorkerPlacements as $Placements)
                            <tr>
                                @php $i++;@endphp
                                <td>{{ $i }}</td>
                                <td class="text-center">{{ $Placements->Getsection->section_name }}</td>
                                <td class="text-center">{{ $Placements->placement_order_number }}</td>
                                <td class="text-center">{{ $Placements->placement_order_date }}</td>
                                <td class="text-center">
                                    @can('placement-edit')
                                        <button wire:click="GetPlacement({{ $Placements->id }})"
                                            class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                            data-bs-target="#editplacementModal">
                                            <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                        </button>
                                    @endcan
                                    @can('placement-delete')
                                        <button wire:click="GetPlacement({{ $Placements->id }})"
                                            class="p-0 px-1 btn btn-outline-danger waves-effect {{ $Placements->active ? 'disabled' : '' }}"
                                            data-bs-toggle = "modal" data-bs-target="#removeplacementModal">
                                            <i class="tf-icons mdi mdi-delete-outline fs-3"></i>
                                        </button>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h1 class="text-center">لا يوجد اي تنسب مضاف</h1>
            @endif
            <!-- Modal -->
            @include('livewire.placements.show-placement.modals.edit-placement')
            {{--  @include('livewire.placements.modals.remove-placement') --}}
            <!-- Modal -->
        </div>
    </div>
</div>

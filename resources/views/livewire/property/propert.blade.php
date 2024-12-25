<div class="container mt-4">
     <div class="card shadow-sm">
        <div class="card-header bg-gradient text-white">
            <h5 class="mb-0">إدارة الأملاك</h5>
        </div>
        <div class="card-body">
            @can('propert-list')
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="bg-light">
                            <tr>
                                <th>#</th>
                                <th class="text-center">
                                    <a href="#" wire:click.prevent="sortBy('boycott_number')" class="text-decoration-none text-dark">رقم المقاطعة</a>
                                    @if($sortField === 'boycott_number')
                                        @if($sortDirection === 'asc') ▲ @else ▼ @endif
                                    @endif
                                </th>
                                <th class="text-center">
                                    <a href="#" wire:click.prevent="sortBy('part_number')" class="text-decoration-none text-dark">رقم القطعة</a>
                                    @if($sortField === 'part_number')
                                        @if($sortDirection === 'asc') ▲ @else ▼ @endif
                                    @endif
                                </th>
                                <th class="text-center">
                                    <a href="#" wire:click.prevent="sortBy('property_number')" class="text-decoration-none text-dark">رقم العقار</a>
                                    @if($sortField === 'property_number')
                                        @if($sortDirection === 'asc') ▲ @else ▼ @endif
                                    @endif
                                </th>
                                <th class="text-center">
                                    <a href="#" wire:click.prevent="sortBy('status')" class="text-decoration-none text-dark">مستلمة / غير مستلمة</a>
                                    @if($sortField === 'status')
                                        @if($sortDirection === 'asc') ▲ @else ▼ @endif
                                    @endif
                                </th>
                                <th class="text-center">العملية</th>
                            </tr>
                            <tr>
                                <th></th>
                                <th>
                                    <input type="text" wire:model="search.boycott_number" class="form-control" placeholder="بحث برقم المقاطعة">
                                </th>
                                <th>
                                    <input type="text" wire:model="search.part_number" class="form-control" placeholder="بحث برقم القطعة">
                                </th>
                                <th>
                                    <input type="text" wire:model="search.property_number" class="form-control" placeholder="بحث برقم العقار">
                                </th>
                                <th>
                                    <select wire:model="search.status" class="form-select">
                                        <option value="">الكل</option>
                                        <option value="1">مستلمة</option>
                                        <option value="0">غير مستلمة</option>
                                    </select>
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
                                    <td class="text-center">
                                        {{ $bond->Getboycott ? $bond->Getboycott->boycott_number . ' - ' . $bond->Getboycott->boycott_name : '' }}
                                    </td>
                                    <td class="text-center">{{ $bond->part_number }}</td>
                                    <td class="text-center">{{ $bond->property_number }}</td>
                                    <td class="text-center" style="color: {{ $bond->getPropert ? ($bond->getPropert->status == 1 ? 'green' : 'red') : 'red' }}">
                                        {{ $bond->getPropert && $bond->getPropert->status !== null ? ($bond->getPropert->status == 1 ? 'مستلمة' : 'غير مستلمة') : 'غير مستلمة' }}
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            @can('propert-create')
                                                @if (!isset($bond->getPropert) || $bond->getPropert->status != 1)
                                                    <button wire:click='AddPropertModalShow(["{{ $bond->id }}", "{{ $bond->property_number }}"])'
                                                            class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addpropertModal">
                                                        <span class="mdi mdi-home-plus-outline fs-5"></span>
                                                    </button>
                                                @endif
                                            @endcan
                                            @can('propert-edit')
                                                @if (isset($bond->getPropert) && $bond->getPropert->status == 1)
                                                    <button wire:click='AddPropertModalShow(["{{ $bond->id }}", "{{ $bond->property_number }}"])'
                                                            class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editpropertModal">
                                                        <span class="mdi mdi-home-edit-outline fs-5"></span>
                                                    </button>
                                                @endif
                                            @endcan
                                            @can('Property-Show')
                                                <button wire:click='AddPropertModalShow({{ $bond->id }})'
                                                        class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addpropertModal">
                                                    <span class="mdi mdi-calculator fs-5"></span>
                                                </button>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-3 d-flex justify-content-center">
                    {{ $bonds->links() }}
                </div>

                <!-- Modal -->
                @include('livewire.property.modals.add-propert')
                @include('livewire.property.modals.edit-propert')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>

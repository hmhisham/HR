<div class="mt-n4">
    <h5 class="mb-2">
        <span class="text-muted fw-light">قسم الاراضي<span class="mdi mdi-chevron-left mdi-24px"></span></span>
        الاملاك
    </h5>

    <div class="card shadow-lg">
        <div class="card-body">
            @can('propert-list')
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th class="">
                                    <a href="#" wire:click.prevent="sortBy('bonds_id')"
                                        class="text-decoration-none text-dark">اسم الموظف</a>
                                    @if ($sortField === 'bonds_id')
                                        @if ($sortDirection === 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </th>
                                <th class="text-center">
                                    <a href="#" wire:click.prevent="sortBy('boycott_number')"
                                        class="text-decoration-none text-dark">رقم المقاطعة</a>
                                    @if ($sortField === 'boycott_number')
                                        @if ($sortDirection === 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </th>
                                <th class="text-center">
                                    <a href="#" wire:click.prevent="sortBy('boycott_name')"
                                        class="text-decoration-none text-dark">اسم المقاطعة</a>
                                    @if ($sortField === 'boycott_name')
                                        @if ($sortDirection === 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </th>
                                <th class="text-center">
                                    <a href="#" wire:click.prevent="sortBy('part_number')"
                                        class="text-decoration-none text-dark">رقم القطعة</a>
                                    @if ($sortField === 'part_number')
                                        @if ($sortDirection === 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </th>
                                <th class="text-center">
                                    <a href="#" wire:click.prevent="sortBy('property_number')"
                                        class="text-decoration-none text-dark">رقم العقار</a>
                                    @if ($sortField === 'property_number')
                                        @if ($sortDirection === 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </th>
                                <th class="text-center">
                                    <a href="#" wire:click.prevent="sortBy('status')"
                                        class="text-decoration-none text-dark">مستلمة / غير مستلمة</a>
                                    @if ($sortField === 'status')
                                        @if ($sortDirection === 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </th>
                                <th class="text-center">العملية</th>
                            </tr>
                            <tr>
                                <th class="px-0"></th>
                                <th class="px-0">
                                    <input type="text" wire:model.debounce.500ms="search.full_name" class="form-control"
                                        placeholder="بحث بالأسم ">
                                </th>
                                <th class="px-0">
                                    <input type="text" wire:model.debounce.500ms="search.boycott_number"
                                        class="form-control" placeholder="بحث برقم المقاطعة">
                                </th>
                                <th class="px-0">
                                    <input type="text" wire:model.debounce.500ms="search.boycott_name"
                                        class="form-control" placeholder="بحث باسم المقاطعة">
                                </th>
                                <th class="px-0">
                                    <input type="text" wire:model.debounce.500ms="search.part_number"
                                        class="form-control" placeholder="بحث برقم القطعة">

                                </th>
                                <th class="px-0">
                                    <input type="text" wire:model.debounce.500ms="search.property_number"
                                        class="form-control" placeholder="بحث برقم العقار">
                                </th>
                                <th class="px-0">
                                    <select wire:model.debounce.500ms="search.status" class="form-select">
                                        <option value="all">الكل</option>
                                        <option value="1">مستلمة</option>
                                        <option value="00">غير مستلمة</option>
                                    </select>
                                </th>

                                <th class="px-0"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = $bonds->perPage() * ($bonds->currentPage() - 1) + 1;
                            @endphp
                            @foreach ($bonds as $bond)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td class="">
                                        {{ $bond->getPropert ? $bond->getPropert->full_name : '' }}
                                    </td>


                                    <td class="text-center">
                                        {{ $bond->Getboycott ? $bond->Getboycott->boycott_number : '' }}
                                    </td>
                                    <td class="text-center">
                                        {{ $bond->Getboycott ? $bond->Getboycott->boycott_name : '' }}
                                    </td>


                                    <td class="text-center">{{ $bond->part_number }}</td>
                                    <td class="text-center">{{ $bond->property_number }}</td>
                                    <td class="text-center {{ $bond->getPropert ? ($bond->getPropert->status == 1 ? 'text-success' : 'text-danger') : 'text-danger' }}">
                                        {{ $bond->getPropert && $bond->getPropert->status !== null ? ($bond->getPropert->status == 1 ? 'مستلمة' : 'غير مستلمة') : 'غير مستلمة' }}
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            @can('propert-create')
                                                @if (!isset($bond->getPropert) || $bond->getPropert->status != 1)
                                                    <button wire:click='AddPropertModalShow("{{ $bond->id }}")'
                                                        class="btn btn-success" data-bs-toggle="modal"
                                                        data-bs-target="#addpropertModal">
                                                        <span class="mdi mdi-home-plus-outline fs-5"></span>
                                                    </button>
                                                @endif
                                            @endcan
                                            @can('propert-edit')
                                                @if (isset($bond->getPropert) && $bond->getPropert->status == 1 && $bond->getPropert->isdeleted == 0)
                                                    <button wire:click='GetPropert2({{ $bond->id }})'
                                                        class="btn btn-warning px-2 py-0" data-bs-toggle="modal"
                                                        data-bs-target="#editpropertModal">
                                                        <span class="mdi mdi-home-edit-outline fs-3"></span>
                                                    </button>
                                                @endif
                                            @endcan
                                            @can('propert-delete')
                                                @if (isset($bond->getPropert) && $bond->getPropert->status == 1 && $bond->getPropert->isdeleted == 0)
                                                    <button wire:click='GetPropert2({{ $bond->id }})'
                                                        class="btn btn-danger px-2 py-0" data-bs-toggle="modal"
                                                        data-bs-target="#removepropertModal">
                                                        <span class="mdi mdi-home-remove-outline fs-3"></span>
                                                    </button>
                                                @endif
                                            @endcan
                                            @can('propert-Show')
                                                @if (isset($bond->getPropert) && $bond->getPropert->status == 1 && $bond->getPropert->isdeleted == 0)
                                                    <a href="{{ Route('Propertypayd', $bond->id) }}" class="btn btn-info px-2 py-0">
                                                        <span class="mdi mdi-calculator fs-3"></span>
                                                    </a>
                                                @endif
                                            @endcan

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3 d-flex justify-content-center">
                    {{ $bonds->onEachSide(1)->links() }}
                </div>
                <!-- Modal -->
                @include('livewire.property.modals.add-propert')
                @include('livewire.property.modals.edit-propert')
                @include('livewire.property.modals.remove-propert')

                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>
</div>

<div class="mt-n4">
    <h4 class="mb-1 fw-semibold">قائمة \ الأملاك</h4>
    <div class="card">
        <div class="card">
            <div class="card-header"></div>
            @can('propert-list')
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th class="text-center"> رقم المقاطعة </th>
                            <th class="text-center"> رقم القطعة </th>
                            <th class="text-center"> رقم العقار </th>
                            <th class="text-center">مستلمة / غير مستلمه</th>
                            <th class="text-center">العملية</th>
                        </tr>
                        <!-- إضافة صف البحث لكل عمود -->
                        <tr>
                            <th></th>
                            <th>
                                <input type="text" wire:model="search.boycott_number" class="form-control"
                                    placeholder="بحث برقم المقاطعة">
                            </th>
                            <th>
                                <input type="text" wire:model="search.part_number" class="form-control"
                                    placeholder="بحث برقم القطعة">
                            </th>
                            <th>
                                <input type="text" wire:model="search.property_number" class="form-control"
                                    placeholder="بحث برقم العقار">
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
                                <td class="text-center"
                                    style="color: {{ $bond->getPropert ? ($bond->getPropert->status == 1 ? 'green' : 'red') : 'red' }}">
                                    {{ $bond->getPropert && $bond->getPropert->status !== null ? ($bond->getPropert->status == 1 ? 'مستلمة' : 'غير مستلمة') : 'غير مستلمة' }}
                                </td>

                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('propert-create')
                                            @if (!isset($bond->getPropert) || $bond->getPropert->status != 1)
                                                <button
                                                    wire:click='AddPropertModalShow(["{{ $bond->id }}", "{{ $bond->property_number }}"])'
                                                    class="p-0 px-1 btn btn-text-primary waves-effect" data-bs-toggle="modal"
                                                    data-bs-target="#addpropertModal">
                                                    <span class="mdi mdi-home-plus-outline fs-3"></span>
                                                </button>
                                            @endif
                                        @endcan
                                        @can('propert-edit')
                                        @if (isset($bond->getPropert) && $bond->getPropert->status == 1)
                                            <button
                                                wire:click='AddPropertModalShow(["{{ $bond->id }}", "{{ $bond->property_number }}"])'
                                                class="p-0 px-1 btn btn-text-primary waves-effect"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editpropertModal">
                                                <span class="mdi mdi-home-edit-outline fs-3" style="color: rgb(255, 0, 0);"></span>

                                             </button>
                                        @endif
                                    @endcan


                                        @can('Property-Show')
                                            <button wire:click='AddPropertModalShow({{ $bond->id }})'
                                                class="p-0 px-1 btn btn-text-black waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#addpropertModal">
                                                <span class="mdi mdi-calculator fs-3"></span>
                                            </button>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-2 d-flex justify-content-center">
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

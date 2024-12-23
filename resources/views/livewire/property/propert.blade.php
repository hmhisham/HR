<div class="mt-n4">
    <h4 class="mb-1 fw-semiboyld">قائمة \ الأملاك</h4>
    <div class="card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="PropertSearch" type="text" class="form-control" placeholder="بحث...">

                        <form method="GET" action="">
                            <div class="d-flex justify-content-between mb-4">
                                <input type="text" name="filter[property_number]" placeholder="البحث برقم العقار"
                                    value="{{ request('filter.property_number') }}" class="form-control">
                                <input type="text" name="filter[part_number]" placeholder="البحث برقم القطعة"
                                    value="{{ request('filter.part_number') }}" class="form-control">
                                <button type="submit" class="btn btn-primary">بحث</button>
                            </div>
                        </form>

                    </div>
                    {{-- <div>
                        @can('propert-create')
                            <button wire:click='AddPropertModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addpropertModal">أضــافــة</button>
                            @include('livewire.property.modals.add-propert')
                        @endcan
                    </div> --}}
                </div>
            </div>
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
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($bonds as $bond)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td class="text-center">
                                    {{ $bond->Getboycott ? $bond->Getboycott->boycott_number . ' - ' . $bond->Getboycott->boycott_name : '' }}
                                </td>
                                <td class="text-center">{{ $bond->part_number }}</td>
                                <td class="text-center">{{ $bond->property_number }}</td>
                                <td class="text-center"
                                    style="color: {{ $bond->getPropert ? ($bond->getPropert->status == 1 ? 'green' : 'red') : 'inherit' }}">
                                    {{ $bond->getPropert ? ($bond->getPropert->status == 1 ? 'مستلمة' : 'غير مستلمة') : '' }}
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('propert-create')
                                            <button
                                                wire:click='AddPropertModalShow(["{{ $bond->id }}", "{{ $bond->property_number }}"])'
                                                class="p-0 px-1 btn btn-text-primary waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#addpropertModal">
                                                <span class="mdi mdi-home-plus-outline fs-3"></span>
                                            </button>
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
                <!-- Modal -->
            @endcan

        </div>
    </div>
</div>
</div>

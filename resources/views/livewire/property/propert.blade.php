<div class="mt-n4">
    <h4 class="mb-1 fw-semiboyld">قائمة \ الأملاك</h4>
    <div class="card">

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="PropertSearch" type="text" class="form-control" placeholder="بحث...">
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
                        @foreach ($Bonds as $Bond)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td class="text-center">
                                    {{ $Bond->Getboycott ? $Bond->Getboycott->boycott_number . ' - ' . $Bond->Getboycott->boycott_name : '' }}
                                </td>
                                <td class="text-center">{{ $Bond->part_number }}</td>
                                <td class="text-center">{{ $Bond->property_number }}</td>

                                <td class="text-center"
                                    style="color: {{ $Bond->getPropert ? ($Bond->getPropert->status == 1 ? 'green' : 'red') : 'inherit' }}">
                                    {{ $Bond->getPropert ? ($Bond->getPropert->status == 1 ? 'مستلمة' : 'غير مستلمة') : '' }}
                                </td>

                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('propert-create')
                                            <button
                                                wire:click='AddPropertModalShow(["{{ $Bond->id }}", "{{ $Bond->property_number }}"])'
                                                class="p-0 px-1 btn btn-text-primary waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#addpropertModal">
                                                <span class="mdi mdi-home-plus-outline fs-3"></span>
                                            </button>
                                        @endcan
                                        @can('Property-Show')
                                            <button wire:click='AddPropertModalShow({{ $Bond->id }})'
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
                    {{ $links->links() }}
                </div>
                <!-- Modal -->

                @include('livewire.property.modals.add-propert')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>
</div>

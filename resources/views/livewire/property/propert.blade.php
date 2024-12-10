<div class="mt-n4">
    <h4 class="mb-1 fw-semiboyld">قائمة \ الأملاك</h4>
    <div class="card">

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="PropertSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        @can('propert-create')
                            <button wire:click='AddPropertModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addpropertModal">أضــافــة</button>
                            @include('livewire.property.modals.add-propert')
                        @endcan
                    </div>
                </div>
            </div>
            @can('propert-list')
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th class="text-center">رقم المستخدم</th>
                            <th class="text-center">رقم العقار</th>
                            <th class="text-center">المبلغ الكلي</th>
                            <th class="text-center">مجموع المسدد</th>
                            <th class="text-center">حالة العقار</th>
                            <th class="text-center">العملية</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($Property as $Propert)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td class="text-center">{{ $Propert->Getworker ? $Propert->Getworker->full_name : '' }}</td>
                                <td class="text-center">{{ $Propert->bonds_id }}</td>
                                <td class="text-center">{{ $Propert->total_amount }}</td>
                                <td class="text-center">{{ $Propert->paid_amount }}</td>
                                <td class="text-center">{{ $Propert->property_status }}</td>

                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('propert-edit')
                                            <button wire:click="GetPropert({{ $Propert->id }})"
                                                class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editpropertModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        @endcan
                                        @can('propert-delete')
                                            <button wire:click="GetPropert({{ $Propert->id }})"
                                                class="p-0 px-1 btn btn-outline-danger waves-effect {{ $Propert->active ? 'disabled' : '' }}"
                                                data-bs-toggle = "modal" data-bs-target="#removepropertModal">
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
                @include('livewire.property.modals.edit-propert')
                @include('livewire.property.modals.remove-propert')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>
</div>

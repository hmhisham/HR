<div class="mt-n4">
    <h4 Class="mb-1fw-semiboyld">قائمة</h4>
    <Div Class="card">

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="ScaleSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        @can('scale-create')
                            <button wire:click='AddScaleModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addscaleModal">أضــافــة</button>
                            @include('livewire.scales.modals.add-scale')
                        @endcan
                    </div>
                </div>
            </div>
            @can('scale-list')
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th Class="text-center">الدرجة</th>
                            <th Class="text-center">المرحلة</th>
                            <th Class="text-center">الراتب</th>
                            <th Class="text-center">مقدار الزيادة</th>
                            <th Class="text-center">مدة اصغرية</th>
                            <th Class="text-center">العملية</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($Scales as $Scale)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td class="text-center">{{ $Scale->Getgrade ? $Scale->Getgrade->grades_name : '' }}</td>
                                <td Class="text-center">{{ $Scale->scales_phase }}</td>
                                <td Class="text-center">{{ $Scale->scales_salary }}</td>
                                <td Class="text-center">{{ $Scale->scales_quantity }}</td>
                                <td Class="text-center">{{ $Scale->scales_period }}</td>

                                <td Class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('scale-edit')
                                            <button wire:click="GetScale({{ $Scale->id }})"
                                                class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editscaleModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        @endcan
                                        @can('scale-delete')
                                            <button wire:click="GetScale({{ $Scale->id }})"
                                                class="p-0 px-1 btn btn-outline-danger waves-effect {{ $Scale->active ? 'disabled' : '' }}"
                                                data-bs-toggle = "modal" data-bs-target="#removescaleModal">
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
                @include('livewire.scales.modals.edit-scale')
                @include('livewire.scales.modals.remove-scale')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>
</div>

<div class="mt-n4">
    <h4 Class="mb-1fw-semiboyld">نافذة العقوبات</h4>
    <Div Class="card">

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="PenaltieSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        @can('penaltie-create')
                        <button wire:click='AddPenaltieModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addpenaltieModal">أضــافــة</button>
                        @include('livewire.penalties.modals.add-penaltie')
                        @endcan
                    </div>
                </div>
            </div>
            @can('penaltie-list')
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th Class="text-center">الاسم الكامل</th>
                        <th Class="text-center">القسم</th>
                        <th Class="text-center">رقم الحاسبة</th>
                        <th Class="text-center">رقم الامر الوزاري</th>
                        <th Class="text-center">تاريخ الامر الوزاري</th>
                        <th Class="text-center">نوع العقوبة</th>
                        <th Class="text-center">العملية</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach ($Penalties as $Penaltie)
                    <tr>
                        <?php $i++; ?>
                        <td>{{ $i }}</td>
                        <td class="text-center">{{ $Penaltie->worker ? $Penaltie->worker->full_name : 'N/A' }}</td>
                        <td class="text-center">{{ $Penaltie->worker ? $Penaltie->worker->department : 'N/A' }}</td>
                        <td Class="text-center">{{ $Penaltie->calculator_number}}</td>
                        <td Class="text-center">{{ $Penaltie->p_ministerial_order_number}}</td>
                        <td Class="text-center">{{ $Penaltie->p_ministerial_order_date}}</td>
                        <td Class="text-center">{{ $Penaltie->p_penalty_type}}</td>
                        <td Class="text-center">
                            <div class="btn-group" role="group" aria-label="First group">
                                @can('penaltie-edit')
                                <button wire:click="GetPenaltie({{ $Penaltie->id }})"
                                    class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                    data-bs-target="#editpenaltieModal">
                                    <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                </button>
                                @endcan
                                @can('penaltie-delete')
                                <button wire:click="GetPenaltie({{ $Penaltie->id }})"
                                    class="p-0 px-1 btn btn-outline-danger waves-effect {{ $Penaltie->active ? 'disabled' : '' }}"
                                    data-bs-toggle="modal" data-bs-target="#removepenaltieModal">
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
            @include('livewire.penalties.modals.edit-penaltie')
            @include('livewire.penalties.modals.remove-penaltie')
            <!-- Modal -->
            @endcan
        </div>
    </div>
</div>
</div>

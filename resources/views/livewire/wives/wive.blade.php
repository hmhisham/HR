<div class="mt-n4">
    <h4 class="mb-1 fw-semiboyld">نافذة بيانات الزوجية</h4>
    <div class="card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="WiveSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        @can('wive-create')
                            <button wire:click='AddWiveModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addwiveModal">أضــافــة</button>
                            @include('livewire.wives.modals.add-wive')
                        @endcan
                    </div>
                </div>
            </div>
            @can('wive-list')
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th class="text-center">اسم الموظف</th>
                            <th class="text-center">الاسم الزوجة</th>
                            <th class="text-center">الحالة الزوجية</th>
                            <th class="text-center">الحالة المهنية</th>
                            <th class="text-center">رقم البطاقة الوطنية</th>
                            <th class="text-center">العملية</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($Wives as $Wive)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td class="text-center">{{ $Wive->Getworker ? $Wive->Getworker->full_name : '' }}</td>
                                <td class="text-center">{{ $Wive->full_name }}</td>
                                <td class="text-center">{{ $Wive->marital_status }}</td>
                                <td class="text-center">{{ $Wive->occupational_status }}</td>
                                <td class="text-center">{{ $Wive->national_id }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('wive-edit')
                                            <button wire:click="GetWive({{ $Wive->id }})"
                                                class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editwiveModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        @endcan
                                        @can('wive-delete')
                                            <button wire:click="GetWive({{ $Wive->id }})"
                                                class="p-0 px-1 btn btn-outline-danger waves-effect {{ $Wive->active ? 'disabled' : '' }}"
                                                data-bs-toggle = "modal" data-bs-target="#removewiveModal">
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
                @include('livewire.wives.modals.edit-wive')
                @include('livewire.wives.modals.remove-wive')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>

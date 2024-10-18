<div class="mt-n4">
    <h4 class="mb-2">
        <span class="text-muted fw-light">الموارد البشرية <span class="mdi mdi-chevron-left mdi-24px"></span></span> الايفادات
    </h4>
    <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="dispatcSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        @can('dispatc-create')
                        <button wire:click='AdddispatcModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#adddispatcModal">أضــافــة</button>
                        @include('livewire.dispatch.modals.add-dispatc')
                        @endcan
                    </div>
                </div>
            </div>
            @can('dispatc-list')
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th Class="text-center">الاسم الكامل</th>
                        <th Class="text-center">القسم</th>
                        <th class="text-center">رقم الحاسبة</th>
                        <th class="text-center">تاريخ السفر</th>
                        <th class="text-center">عدد أيام السفر</th>
                        <th class="text-center">رقم الأمر الوزاري</th>
                        <th class="text-center">العملية</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach ($Dispatch as $dispatc)
                    <tr>
                        <?php $i++; ?>
                        <td>{{ $i }}</td>
                        <td class="text-center">{{ $dispatc->worker ? $dispatc->worker->full_name : 'N/A' }}</td>
                        <td class="text-center">{{ $dispatc->worker ? $dispatc->worker->department : 'N/A' }}</td>
                        <td class="text-center">{{ $dispatc->calculator_number}}</td>
                        <td class="text-center">{{ $dispatc->travel_date}}</td>
                        <td class="text-center">{{ $dispatc->travel_days}}</td>
                        <td class="text-center">{{ $dispatc->ministerial_order_number}}</td>
                        <td class="text-center">
                            <div class="btn-group" role="group" aria-label="First group">
                                @can('dispatc-edit')
                                <button wire:click="Getdispatc({{ $dispatc->id }})"
                                    class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                    data-bs-target="#editdispatcModal">
                                    <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                </button>
                                @endcan
                                @can('dispatc-delete')
                                <button wire:click="Getdispatc({{ $dispatc->id }})"
                                    class="p-0 px-1 btn btn-outline-danger waves-effect {{ $dispatc->active ? 'disabled' : '' }}"
                                    data-bs-toggle="modal" data-bs-target="#removedispatcModal">
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
            @include('livewire.dispatch.modals.edit-dispatc')
            @include('livewire.dispatch.modals.remove-dispatc')
            <!-- Modal -->
            @endcan
        </div>
    </div>
</div>


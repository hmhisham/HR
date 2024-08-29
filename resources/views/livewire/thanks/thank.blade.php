<div class="mt-n4">
    <h4 Class="mb-1fw-semiboyld">قائمة</h4>
    <Div Class="card">

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="ThankSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        @can('thank-create')
                        <button wire:click='AddThankModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addthankModal">أضــافــة</button>
                        @include('livewire.thanks.modals.add-thank')
                        @endcan
                    </div>
                </div>
            </div>
            @can('thank-list')
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th Class="text-center">الجهة المانحة للشكر</th>
                        <th Class="text-center">رقم الامر الوزاري</th>
                        <th Class="text-center">تاريخ الامر الوزاري</th>
                        <th Class="text-center">السبب من الشكر</th>
                        <th Class="text-center">عدد اشهر القدم</th>
                        <th Class="text-center">الملاحظات</th>
                        <th Class="text-center">العملية</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach ($Thanks as $Thank)
                    <tr>
                        <?php $i++; ?>
                        <td>{{ $i }}</td>
                        <td Class="text-center">{{ $Thank->grantor}}</td>
                        <td Class="text-center">{{ $Thank->ministerial_order_number}}</td>
                        <td Class="text-center">{{ $Thank->ministerial_order_date}}</td>
                        <td Class="text-center">{{ $Thank->reason}}</td>
                        <td Class="text-center">{{ $Thank->months_of_service}}</td>
                        <td Class="text-center">{{ $Thank->notes}}</td>

                        <td Class="text-center">
                            <div class="btn-group" role="group" aria-label="First group">
                                @can('thank-edit')
                                <button wire:click="GetThank({{ $Thank->id }})"
                                    class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                    data-bs-target="#editthankModal">
                                    <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                </button>
                                @endcan
                                @can('thank-delete')
                                <button wire:click="GetThank({{ $Thank->id }})"
                                    class="p-0 px-1 btn btn-outline-danger waves-effect {{ $Thank->active ? 'disabled' : '' }}"
                                    data-bs-toggle="modal" data-bs-target="#removethankModal">
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
            @include('livewire.thanks.modals.edit-thank')
            @include('livewire.thanks.modals.remove-thank')
            <!-- Modal -->
            @endcan
        </div>
    </div>
</div>
</div>
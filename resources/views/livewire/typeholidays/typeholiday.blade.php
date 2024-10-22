<div class="mt-n4">
    <h4 class="mb-2">
        <span class="text-muted fw-light">الإعدادات <span class="mdi mdi-chevron-left mdi-24px"></span></span> انواع الاجازات
    </h4>
    <Div Class="card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="TypeholidaySearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        @can('typeholiday-create')
                            <button wire:click='AddTypeholidayModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addtypeholidayModal">أضــافــة</button>
                            @include('livewire.typeholidays.modals.add-typeholiday')
                        @endcan
                    </div>
                </div>
            </div>
            @can('typeholiday-list')
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th Class="text-center">نوع الاجازة</th>
                            <th Class="text-center">العملية</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($Typeholidays as $Typeholiday)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td Class="text-center">{{ $Typeholiday->typeholidays_name }}</td>
                                <td Class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('typeholiday-edit')
                                            <button wire:click="GetTypeholiday({{ $Typeholiday->id }})"
                                                class="p-0 px-1 btn btn-text-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#edittypeholidayModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        @endcan
                                        @can('typeholiday-delete')
                                            <button wire:click="GetTypeholiday({{ $Typeholiday->id }})"
                                                class="p-0 px-1 btn btn-text-danger waves-effect {{ $Typeholiday->active ? 'disabled' : '' }}"
                                                data-bs-toggle = "modal" data-bs-target="#removetypeholidayModal">
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
                @include('livewire.typeholidays.modals.edit-typeholiday')
                @include('livewire.typeholidays.modals.remove-typeholiday')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>

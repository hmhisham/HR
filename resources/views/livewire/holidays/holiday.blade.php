<div class="mt-n4">
    <h4 class="mb-2">
        <span class="text-muted fw-light">الموارد البشرية <span class="mdi mdi-chevron-left mdi-24px"></span></span> الاجازات
    </h4>
    <div class="card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="HolidaySearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        @can('holiday-create')
                        <button wire:click='AddHolidayModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addholidayModal">أضــافــة</button>
                        @include('livewire.holidays.modals.add-holiday')
                        @endcan
                    </div>
                </div>
            </div>
            @can('holiday-list')
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th Class="text-center">الاسم الكامل</th>
                        <th Class="text-center">القسم</th>
                        <th class="text-center">رقم الحاسبة</th>
                        <th class="text-center">رقم الامر الاداري</th>
                        <th class="text-center">نوع الاجازه</th>
                        <th class="text-center">تاريخ الانفكاك</th>
                        <th class="text-center">العملية</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach ($Holidays as $Holiday)
                    <tr>
                        <?php $i++; ?>
                        <td>{{ $i }}</td>
                        <td class="text-center">{{ $Holiday->worker ? $Holiday->worker->full_name : 'N/A' }}</td>
                        <td class="text-center">{{ $Holiday->worker ? $Holiday->worker->department : 'N/A' }}</td>
                        <td class="text-center">{{ $Holiday->calculator_number}}</td>
                        <td class="text-center">{{ $Holiday->order_number}}</td>
                        <td class="text-center">{{ $Holiday->holiday_type}}</td>
                        <td class="text-center">{{ $Holiday->separation_date}}</td>

                        <td class="text-center">
                            <div class="btn-group" role="group" aria-label="First group">
                                @can('holiday-edit')
                                <button wire:click="GetHoliday({{ $Holiday->id }})"
                                    class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                    data-bs-target="#editholidayModal">
                                    <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                </button>
                                @endcan
                                @can('holiday-delete')
                                <button wire:click="GetHoliday({{ $Holiday->id }})"
                                    class="p-0 px-1 btn btn-outline-danger waves-effect {{ $Holiday->active ? 'disabled' : '' }}"
                                    data-bs-toggle="modal" data-bs-target="#removeholidayModal">
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
            @include('livewire.holidays.modals.edit-holiday')
            @include('livewire.holidays.modals.remove-holiday')
            <!-- Modal -->
            @endcan
        </div>
    </div>
</div>

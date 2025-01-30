<div class="mt-n4">

    <div class="card">

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="mb-2">
                            <span class="text-muted fw-light"> التتبع <span
                                    class="mdi mdi-chevron-left mdi-24px"></span></span>

                        </h4>
                    </div>
                    <div>
                        @can('trackin-create')
                            <button wire:click='AddTrackinModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addtrackinModal">أضــافــة</button>
                            @include('livewire.tracking.modals.add-trackin')
                        @endcan
                    </div>
                </div>
            </div>
            @can('trackin-list')
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th class="text-center">اسم الموظف</th>
                                <th class="text-center">اسم النافذة</th>
                                <th class="text-center">نوع العملية</th>
                                <th class="text-center">وقت العملية</th>
                                <th class="text-center">تفاصيل العملية</th>
                                <th class="text-center">العمليات</th>
                            </tr>

                            <tr>
                                <th></th>
                                <th class="text-center">
                                    <input type="text" wire:model.debounce.300ms="search.user_id"
                                        class="form-control text-center" placeholder="اسم الموظف">
                                </th>

                                <th class="text-center">
                                    <input type="text" wire:model.debounce.300ms="search.page_name"
                                        class="form-control text-center" placeholder="اسم النافذة">
                                </th>

                                <th class="text-center">
                                    <input type="text" wire:model.debounce.300ms="search.operation_type"
                                        class="form-control text-center" placeholder="نوع العملية">
                                </th>

                                <th class="text-center">
                                    <input type="text" wire:model.debounce.300ms="search.operation_time"
                                        class="form-control text-center" placeholder="وقت العملية">
                                </th>

                                <th class="text-center">
                                    <input type="text" wire:model.debounce.300ms="search.details"
                                        class="form-control text-center" placeholder="تفاصيل العملية">
                                </th>

                                <th></th>
                            </tr>

                        </thead>
                        <tbody>
                            @php
                                $i = $links->perPage() * ($links->currentPage() - 1) + 1;
                            @endphp
                            @foreach ($Tracking as $Trackin)
                                <tr>

                                    <td>{{ $i++ }}</td>
                                    <td class="text-center">{{ $Trackin->Getuser ? $Trackin->Getuser->name : '' }}</td>
                                    <td class="text-center">{{ $Trackin->page_name }}</td>

                                    <td class="text-center" style="padding: 10px; border-radius: 5px; font-size: 14px;">
                                        @if ($Trackin->operation_type === 'اضافة')
                                            <i class="mdi mdi-shield-plus-outline" style="color: #28a745;"></i>
                                            <span style="color: #28a745;">{{ $Trackin->operation_type }}</span>
                                        @elseif($Trackin->operation_type === 'تعديل')
                                            <i class="mdi mdi-shield-refresh-outline" style="color: #007bff;"></i>
                                            <span style="color: #007bff;">{{ $Trackin->operation_type }}</span>
                                        @elseif($Trackin->operation_type === 'حذف')
                                            <i class="mdi mdi-shield-remove-outline" style="color: #dc3545;"></i>
                                            <span style="color: #dc3545;">{{ $Trackin->operation_type }}</span>
                                        @elseif($Trackin->operation_type === 'طباعة')
                                            <i class="mdi mdi-shield-crown-outline" style="color: #ffc107;"></i>
                                            <span style="color: #ffc107;">{{ $Trackin->operation_type }}</span>
                                        @endif
                                    </td>

                                    <td class="text-center">{{ $Trackin->operation_time }}</td>
                                    <td class="text-center">{{ $Trackin->details }}</td>

                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="First group">
                                            @can('trackin-edit')
                                                <button wire:click="GetTrackin({{ $Trackin->id }})"
                                                    class="p-0 px-1 btn btn-text-success waves-effect" data-bs-toggle="modal"
                                                    data-bs-target="#edittrackinModal">
                                                    <i class="mdi mdi-text-box-plus-outline fs-3"></i>
                                                </button>
                                            @endcan
                                            @can('trackin-delete')
                                                <strong style="margin: 0 10px;">|</strong>
                                                <button wire:click="GetTrackin({{ $Trackin->id }})"
                                                    class="p-0 px-1 btn btn-text-danger waves-effect {{ $Trackin->active ? 'disabled' : '' }}"
                                                    data-bs-toggle = "modal" data-bs-target="#removetrackinModal">
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
                        {{ $links->onEachSide(0)->links() }}
                    </div>
                </div>
                <!-- Modal -->
                @include('livewire.tracking.modals.edit-trackin')
                @include('livewire.tracking.modals.remove-trackin')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>

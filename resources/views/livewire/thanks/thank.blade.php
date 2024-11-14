<div class="mt-n4">
    <h4 class="mb-2">
        <span class="text-muted fw-light">الموارد البشرية <span class="mdi mdi-chevron-left mdi-24px"></span></span> الشكر
        والتقدير
    </h4>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">

                <div class="input-group" style="max-width: 300px;">
                    <input type="text" class="form-control" placeholder="بحث..." wire:model.defer="WorkerSearch">
                    <button class="btn btn-outline-success" type="button" wire:click="search">
                        <i class="mdi mdi-magnify"></i> بحث
                    </button>
                </div>

                {{-- <div>
                    <input wire:model="WorkerSearch" type="text" class="form-control" placeholder="بحث...">
                </div> --}}
                {{-- <div>
                    @can('thank-create')
                        <button wire:click='AddThankModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addthankModal">أضــافــة</button>
                        @include('livewire.thanks.modals.add-thank')
                    @endcan
                </div> --}}
            </div>
        </div>
        @can('thank-list')
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th class="text-center">رقم الحاسبة</th>
                         <th class="text-center">الاسم الكامل</th>
                        <th class="text-center">العملية</th>

                    </tr>
                </thead>
                <tbody>

                    <?php $i = 0; ?>
                    @foreach ($workers as $w)
                        <tr>
                            <?php $i++; ?>
                            <td>{{ $i }}</td>
                            <td class="text-center">{{ $w->calculator_number }}</td>

                            <td class="text-center">{{ $w->full_name }}</td>

                            <td Class="text-center">
                                <div class="btn-group" role="group" aria-label="First group">
                                    @can('thank-add')
                                    @if(isset($w) && $w->id)
                                        <button wire:click="GetWorker({{ $w->id }})"
                                                class="p-0 px-1 btn btn-text-primary"
                                                data-bs-toggle="modal" data-bs-target="#addthankModal">
                                            <i class="tf-icons mdi mdi-plus-circle fs-3"></i>
                                        </button>
                                        @include('livewire.thanks.modals.add-thank')
                                    @else
                                        <p>الموظف غير متوفر</p> <!-- رسالة تظهر في حال عدم توفر `$worker` -->
                                    @endif
                                @endcan


                                    {{-- @can('thank-edit')
                                        <button wire:click="GetThank({{ $worker->id }})"
                                            class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                            data-bs-target="#editthankModal">
                                            <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                        </button>
                                    @endcan --}}
                                    {{-- @can('thank-delete')
                                        <button wire:click="GetThank({{ $worker->id }})"
                                            class="p-0 px-1 btn btn-outline-danger waves-effect {{ $worker->active ? 'disabled' : '' }}"
                                            data-bs-toggle="modal" data-bs-target="#removethankModal">
                                            <i class="tf-icons mdi mdi-delete-outline fs-3"></i>
                                        </button>
                                    @endcan --}}
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

            {{-- @include('livewire.thanks.modals.edit-thank')
            @include('livewire.thanks.modals.remove-thank') --}}
            <!-- Modal -->
        @endcan
    </div>
</div>
</div>

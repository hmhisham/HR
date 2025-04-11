<div class="mt-n4">
    <h4 class="mb-2">
        <span class="text-muted fw-light">الموارد البشرية <span class="mdi mdi-chevron-left mdi-24px"></span></span> تاركي
        العمل
    </h4>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <input wire:model="JobleaverSearch" type="text" class="form-control" placeholder="بحث...">
                </div>
                <div>
                    @can('jobleaver-create')
                        <button wire:click='AddJobleaverModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addjobleaverModal">أضــافــة</button>
                        @include('livewire.jobleavers.modals.add-jobleaver')
                    @endcan
                </div>
            </div>
        </div>
        @can('jobleaver-list')
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th Class="text-center">الاسم الكامل</th>
                        <th Class="text-center">القسم</th>
                        <th Class="text-center">رقم الحاسبة</th>
                        <th Class="text-center">نوع ترك العمل</th>
                        <th Class="text-center">تاريخ التعيين</th>
                        <th Class="text-center">تاريخ الانقطاع</th>
                        <th Class="text-center">العملية</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach ($Jobleavers as $Jobleaver)
                        <tr>
                            <?php $i++; ?>
                            <td>{{ $i }}</td>
                            <td class="text-center">{{ $Jobleaver->worker ? $Jobleaver->worker->full_name : 'N/A' }}</td>
                            <td class="text-center">{{ $Jobleaver->worker ? $Jobleaver->worker->department : 'N/A' }}</td>
                            <td Class="text-center">{{ $Jobleaver->computer_number }}</td>
                            <td Class="text-center">{{ $Jobleaver->job_leaving_type }}</td>
                            <td Class="text-center">{{ $Jobleaver->appointment_date }}</td>
                            <td Class="text-center">{{ $Jobleaver->disconnection_date }}</td>
                            <td Class="text-center">
                                <div class="btn-group" role="group" aria-label="First group">
                                    @can('jobleaver-edit')
                                        <button wire:click="GetJobleaver({{ $Jobleaver->id }})"
                                            class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                            data-bs-target="#editjobleaverModal">
                                            <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                        </button>
                                    @endcan
                                    @can('jobleaver-delete')
                                        <button wire:click="GetJobleaver({{ $Jobleaver->id }})"
                                            class="p-0 px-1 btn btn-outline-danger waves-effect {{ $Jobleaver->active ? 'disabled' : '' }}"
                                            data-bs-toggle="modal" data-bs-target="#removejobleaverModal">
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
            @include('livewire.jobleavers.modals.edit-jobleaver')
            @include('livewire.jobleavers.modals.remove-jobleaver')
            <!-- Modal -->
        @endcan
    </div>
</div>

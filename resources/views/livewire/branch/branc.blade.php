<div class="mt-n4">
    <h4 Class="mb-1fw-semiboyld">قائمة</h4>
    <Div Class="card">

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="BrancSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        @can('branc-create')
                        <button wire:click='AddBrancModalShow' class="mb-3 add-new btn btn-primary mb-md-0" data-bs-toggle="modal" data-bs-target="#addbrancModal">أضــافــة</button>
                        @include('livewire.branch.modals.add-branc')
                        @endcan
                    </div>
                </div>
            </div>
            @can('branc-list')
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th Class="text-center">اسم الارتباط</th>
                        <th Class="text-center">اسم القسم</th>
                        <th Class="text-center">اسم الشعبة</th>
                        <th Class="text-center">العملية</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach ($Branch as $Branc)
                    <tr>
                        <?php $i++; ?>
                        <td>{{ $i }}</td>

                        <td class="text-center">{{ $Branc->Getlinkage ? $Branc->Getlinkage->Linkages_name : 'N/A' }}</td>
                        <td class="text-center">{{ $Branc->Getsection ? $Branc->Getsection->section_name : '' }}</td>
                        <td Class="text-center">{{ $Branc->branch_name }}</td>

                        <td Class="text-center">
                            <div class="btn-group" role="group" aria-label="First group">
                                @can('branc-edit')
                                <button wire:click="GetBranc({{ $Branc->id }})" class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal" data-bs-target="#editbrancModal">
                                    <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                </button>
                                @endcan
                                @can('branc-delete')
                                <button wire:click="GetBranc({{ $Branc->id }})" class="p-0 px-1 btn btn-outline-danger waves-effect {{ $Branc->active ? 'disabled' : '' }}" data-bs-toggle="modal" data-bs-target="#removebrancModal">
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
            @include('livewire.branch.modals.edit-branc')
            @include('livewire.branch.modals.remove-branc')
            <!-- Modal -->
            @endcan
        </div>
    </div>
</div>
</div>


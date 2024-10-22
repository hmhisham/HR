<div class="mt-n4">
    <h4 class="mb-2">
        <span class="text-muted fw-light">الموارد البشرية <span class="mdi mdi-chevron-left mdi-24px"></span></span> الاطفال
    </h4>
    <div class="card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="ChildrenSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        @can('children-create')
                            <button wire:click='AddChildrenModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addchildrenModal">أضــافــة</button>
                            @include('livewire.childrens.modals.add-children')
                        @endcan
                    </div>
                </div>
            </div>
            @can('children-list')
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th class="text-center">اسم الام الكامل</th>
                            <th class="text-center">الاسم الكامل</th>
                            <th class="text-center">الجنس</th>
                            <th class="text-center">الحالة الدراسية</th>
                            <th class="text-center">العملية</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($Childrens as $Children)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td class="text-center">{{ $Children->Getwive ? $Children->Getwive->full_name : '' }}</td>
                                <td class="text-center">{{ $Children->full_name }}</td>
                                <td class="text-center">{{ $Children->gender }}</td>
                                <td class="text-center">{{ $Children->occupational_status }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('children-edit')
                                            <button wire:click="GetChildren({{ $Children->id }})"
                                                class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editchildrenModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        @endcan
                                        @can('children-delete')
                                            <button wire:click="GetChildren({{ $Children->id }})"
                                                class="p-0 px-1 btn btn-outline-danger waves-effect {{ $Children->active ? 'disabled' : '' }}"
                                                data-bs-toggle = "modal" data-bs-target="#removechildrenModal">
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
                @include('livewire.childrens.modals.edit-children')
                @include('livewire.childrens.modals.remove-children')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>

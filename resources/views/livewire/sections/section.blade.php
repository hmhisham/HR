<div class="mt-n4">
    <h4 Class="mb-1fw-semiboyld">قائمة</h4>
    <Div Class="card">

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="SectionSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        @can('section-create')
                            <button wire:click='AddSectionModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addsectionModal">أضــافــة</button>
                            @include('livewire.sections.modals.add-section')
                        @endcan
                    </div>
                </div>
            </div>
            @can('section-list')
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th Class="text-center">اسم الارتباط</th>
                            <th Class="text-center">اسم القسم</th>
                            <th Class="text-center">العملية</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($Sections as $Section)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td class="text-center">{{ $Section->Getlink ? $Section->Getlink->link_name : '' }}</td>
                                <td Class="text-center">{{ $Section->section_name }}</td>

                                <td Class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('section-edit')
                                            <button wire:click="GetSection({{ $Section->id }})"
                                                class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editsectionModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        @endcan
                                        @can('section-delete')
                                            <button wire:click="GetSection({{ $Section->id }})"
                                                class="p-0 px-1 btn btn-outline-danger waves-effect {{ $Section->active ? 'disabled' : '' }}"
                                                data-bs-toggle = "modal" data-bs-target="#removesectionModal">
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
                    {{ $linkss->links() }}
                </div>
                <!-- Modal -->
                @include('livewire.sections.modals.edit-section')
                @include('livewire.sections.modals.remove-section')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>
</div>

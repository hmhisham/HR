<div class="mt-n4">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h4 class="mb-2">
                    <span class="text-muted fw-light">الاملاك والاراضي<span class="mdi mdi-chevron-left mdi-24px"></span></span>
                    المقاطعات
                </h4>
                <div>
                    @can('boycott-create')
                        <button wire:click='AddBoycottModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addboycottModal">أضــافــة</button>
                        @include('livewire.boycotts.modals.add-boycott')
                    @endcan
                </div>
            </div>
        </div>
        @can('boycott-list')
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>ت</th>
                        <th class="text-center">رقم المقاطعة</th>
                        <th class="text-center">اسم المقاطعة</th>
                        <th class="text-center">العملية</th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>
                            <input type="text" wire:model.debounce.500ms="search.boycott_number" class="form-control"
                                placeholder="بحث برقم المقاطعة ..">
                        </th>
                        <th>
                            <input type="text" wire:model.debounce.500ms="search.boycott_Name" class="form-control"
                                placeholder="بحث اسم المقاطعة ..">
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = $boycotts->perPage() * ($boycotts->currentPage() - 1) + 1;
                    @endphp
                    @foreach ($boycotts as $boycott)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td class="text-center">{{ $boycott->boycott_number }}</td>
                            <td class="text-center">{{ $boycott->boycott_name }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="First group">
                                    @can('boycott-edit')
                                        <button wire:click="GetBoycott({{ $boycott->id }})" class="p-0 px-1 btn btn-text-success waves-effect"
                                            data-bs-toggle="modal" data-bs-target="#editboycottModal">
                                            <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                        </button>
                                    @endcan
                                    @can('boycott-delete')
                                        <button wire:click="GetBoycott({{ $boycott->id }})"
                                            class="p-0 px-1 btn btn-text-danger waves-effect {{ $boycott->active ? 'disabled' : '' }}"
                                            data-bs-toggle="modal" data-bs-target="#removeboycottModal">
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
                {{ $boycotts->onEachSide(1)->links() }}
            </div>
            <!-- Modal -->
            @include('livewire.boycotts.modals.edit-boycott')
            @include('livewire.boycotts.modals.remove-boycott')
            <!-- Modal -->
        @endcan
    </div>
</div>

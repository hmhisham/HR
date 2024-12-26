<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <div>
                <input wire:model="BoycottSearch" type="text" class="form-control" placeholder="بحث...">
            </div>
            <div>
                @can('boycott-create')
                    <button wire:click='AddBoycottModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                        data-bs-toggle="modal" data-bs-target="#addboycottModal">أضــافــة</button>
                    @include('livewire.boycotts.modals.add-boycott')
                @endcan
            </div>
        </div>
<<<<<<< HEAD
=======
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
                            <input type="text" wire:model="search.boycott_number" class="form-control"
                                placeholder="بحث برقم المقاطعة ..">
                        </th>
                        <th>
                            <input type="text" wire:model="search.boycott_Name" class="form-control"
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
                                        <button wire:click="GetBoycott({{ $boycott->id }})"
                                                class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#editboycottModal">
                                            <i class="tf-icons mdi mdi-pencil fs-5"></i>
                                        </button>
                                    @endcan
                                    @can('boycott-delete')
                                        <button wire:click="GetBoycott({{ $boycott->id }})"
                                                class="btn btn-danger {{ $boycott->active ? 'disabled' : '' }}"
                                                data-bs-toggle="modal" data-bs-target="#removeboycottModal">
                                            <i class="tf-icons mdi mdi-delete-outline fs-5"></i>
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-2 d-flex justify-content-center">
                {{ $boycotts->links() }}
            </div>
            <!-- Modal -->
            @include('livewire.boycotts.modals.edit-boycott')
            @include('livewire.boycotts.modals.remove-boycott')
            <!-- Modal -->
        @endcan
>>>>>>> f02893e34ee0b8c026bc47d4fa19e13eeb5eac81
    </div>
    @can('boycott-list')
        <table id="boycottsTable" class="table">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th class="text-center">رقم المقاطعة
                        <input type="text" placeholder="بحث..." class="form-control column-search">
                    </th>
                    <th class="text-center">اسم المقاطعة
                        <input type="text" placeholder="بحث..." class="form-control column-search">
                    </th>
                    <th class="text-center">العملية</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; ?>
                @foreach ($Boycotts as $Boycott)
                    <tr>
                        <?php $i++; ?>
                        <td>{{ $i }}</td>
                        <td class="text-center">{{ $Boycott->boycott_number }}</td>
                        <td class="text-center">{{ $Boycott->boycott_name }}</td>

                        <td class="text-center">
                            <div class="btn-group" role="group" aria-label="First group">
                                @can('boycott-edit')
                                    <button wire:click="GetBoycott({{ $Boycott->id }})"
                                        class="p-0 px-1 btn btn-text-success waves-effect" data-bs-toggle="modal"
                                        data-bs-target="#editboycottModal">
                                        <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                    </button>
                                @endcan
                                @can('boycott-delete')
                                    <button wire:click="GetBoycott({{ $Boycott->id }})"
                                        class="p-0 px-1 btn btn-text-danger waves-effect {{ $Boycott->active ? 'disabled' : '' }}"
                                        data-bs-toggle = "modal" data-bs-target="#removeboycottModal">
                                        <i class="tf-icons mdi mdi-delete-outline fs-3"></i>
                                    </button>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Modal -->
        @include('livewire.boycotts.modals.edit-boycott')
        @include('livewire.boycotts.modals.remove-boycott')
        <!-- Modal -->
    @endcan
</div>

<div class="mt-n4">
    <h4 class="mb-2">
        <span class="text-muted fw-light">الاملاك والاراضي <span class="mdi mdi-chevron-left mdi-24px"></span></span>
        المقاطعات
    </h4>
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
        </div>
        @can('boycott-list')
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th class="text-center">رقم المقاطعة <input wire:model="searchBoycottNumber" type="text"
                                class="form-control column-search" placeholder="بحث..."> </th>
                        <th class="text-center">اسم المقاطعة <input wire:model="searchBoycottName" type="text"
                                class="form-control column-search" placeholder="بحث..."> </th>
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
            <div class="mt-2 d-flex justify-content-center">
                {{ $links->links() }}
            </div>
            <!-- Modal -->
            @include('livewire.boycotts.modals.edit-boycott')
            @include('livewire.boycotts.modals.remove-boycott')
            <!-- Modal -->
        @endcan
    </div>
</div>

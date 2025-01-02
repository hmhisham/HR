<div class="mt-n4">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-2">
                <span class="text-muted fw-light">الاملاك والاراضي<span class="mdi mdi-chevron-left mdi-24px"></span></span>
                السندات العقارية
            </h4>
        </div>
        @can('bond-list')
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>ت</th>
                        <th class="text-center">رقم المقاطعة</th>
                        <th class="text-center">اسم المقاطعة</th>
                        <th class="text-center">العدد</th>
                        <th >العملية</th>
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
                            <td Class="text-center">
                                {{ $boycott->GetBonds->count() }}
                            </td>
                            <td class="p-0">
                                @can('bond-show')
                                    <a href="{{ Route('Bond-Show', $boycott->id) }}"
                                        Class="p-0 px-1 btn btn-text-primary waves-effect">
                                        <span Class="tf-icons mdi mdi-eye fs-3"></span>
                                    </a>
                                @endcan
                                @can('bond-create')
                                    <Button wire:click='AddBondModal({{ $boycott->id }})'
                                        class="p-0 px-1 btn btn-text-primary waves-effect" data-bs-toggle="modal"
                                        data-bs-target="#addbondModal">
                                        <span Class=" tf-icons mdi mdi-text-box-multiple"></span>
                                    </button>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-2 d-flex justify-content-center">
                {{ $boycotts->onEachSide(1)->links() }}
            </div>
            <!-- Modal -->
            @include('livewire.bonds.modals.add-bond')
            <!-- Modal -->
        @endcan
    </div>
</div>

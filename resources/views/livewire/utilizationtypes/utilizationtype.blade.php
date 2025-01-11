<div class="mt-n4">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h4 class="mb-2">
                    <span class="text-muted fw-light">الاعدادات<span class="mdi mdi-chevron-left mdi-24px"></span></span>
                    نوع الاستغلال
                </h4>
                <div>
                    @can('utilizationtype-create')
                        <button wire:click='AddUtilizationtypeModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addutilizationtypeModal">أضــافــة</button>
                        @include('livewire.utilizationtypes.modals.add-utilizationtype')
                    @endcan
                </div>
            </div>
        </div>
        @can('utilizationtype-list')
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>ت</th>
                            <th class="text-center">نوع الاستغلال</th>
                            <th class="text-center">ملاحظات</th>
                            <th class="text-center">العملية</th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th class="text-center">
                                <input type="text" wire:model.debounce.300ms="search.utilization_type"
                                    class="form-control text-center" placeholder="بحث بنوع الاستغلال">
                            </th>
                            <th class="text-center">
                                <input type="text" wire:model.debounce.300ms="search.notes"
                                    class="form-control text-center" placeholder="بحث بالملاحظات">
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = $links->perPage() * ($links->currentPage() - 1) + 1;
                        @endphp
                        @foreach ($Utilizationtypes as $Utilizationtype)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td class="text-center">{{ $Utilizationtype->utilization_type }}</td>
                                <td class="text-center">{{ $Utilizationtype->notes }}</td>

                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('utilizationtype-edit')
                                            <button wire:click="GetUtilizationtype({{ $Utilizationtype->id }})"
                                                class="p-0 px-1 btn btn-text-primary waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editutilizationtypeModal">
                                                <i class="mdi mdi-text-box-edit-outline fs-3"></i>
                                            </button>
                                        @endcan
                                        <strong style="margin: 0 10px;">|</strong>
                                        @can('utilizationtype-delete')
                                            <button wire:click="GetUtilizationtype({{ $Utilizationtype->id }})"
                                                class="p-0 px-1 btn btn-text-danger waves-effect {{ $Utilizationtype->active ? 'disabled' : '' }}"
                                                data-bs-toggle = "modal" data-bs-target="#removeutilizationtypeModal">
                                                <i class="tf-icons mdi mdi-delete-outline fs-3"></i>
                                            </button>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-2 d-flex justify-content-center">
                {{ $links->onEachSide(1)->links() }}
            </div>
            <!-- Modal -->
            @include('livewire.utilizationtypes.modals.edit-utilizationtype')
            @include('livewire.utilizationtypes.modals.remove-utilizationtype')
            <!-- Modal -->
        @endcan
    </div>
</div>

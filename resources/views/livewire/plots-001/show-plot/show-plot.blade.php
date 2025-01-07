<div class="mt-n4">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h4 class="mb-2">
                    <span class="text-muted fw-light">القطعة <span class="mdi mdi-chevron-left mdi-24px"></span></span>
                    عرض البيانات الخاصة بــ : {{ $Province->province_number }} - {{ $Province->province_name }}
                </h4>
                <div>
                    @can('plot-create')
                        <button wire:click='AddplotModal' class="mb-3 add-new btn btn-primary mb-md-0" data-bs-toggle="modal" data-bs-target="#addplotModal">أضــافــة</button>
                        @include('livewire.plots.show-plot.modals.add-plot')
                    @endcan
                </div>
            </div>
        </div>

        <div class="card">
            @if (!empty($Province) && !empty($ProvincePlots) && count($ProvincePlots) > 0)
                <div class="table-responsive">
                    <table class="table w-100" border="1">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th class="text-center">رقم القطعة</th>
                                <th class="text-center">العملية</th>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>
                                    <input type="text" wire:model.debounce.500ms="plotSearch" class="form-control" placeholder="بحث برقم القطعة ..">
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = $ProvincePlots->perPage() * ($ProvincePlots->currentPage() - 1) + 1;
                            @endphp
                            @foreach ($ProvincePlots as $plot)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td class="text-center">{{ $plot->plot_name }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="First group">
                                            @can('plot-edit')
                                                <button wire:click="GetPlot({{ $plot->id }})" class="p-0 px-1 btn btn-text-success waves-effect" data-bs-toggle="modal" data-bs-target="#editplotModal">
                                                    <i class="tf-icons mdi mdi-pencil mdi-24px"></i>
                                                </button>
                                            @endcan
                                            @can('plot-delete')
                                                <button wire:click="GetPlot({{ $plot->id }})" class="p-0 px-1 btn btn-text-danger waves-effect {{ $plot->active ? 'disabled' : '' }}" data-bs-toggle="modal" data-bs-target="#removeplotModal">
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
                        {{ $ProvincePlots->onEachSide(1)->links() }}
                    </div>
                </div>
            @else
                <h1 class="text-center">لا توجد بيانات مضافة</h1>
            @endif
            <!-- Modal -->
            @include('livewire.plots.show-plot.modals.edit-plot')
            @include('livewire.plots.show-plot.modals.remove-plot')
            <!-- Modal -->
        </div>
    </div>
</div>

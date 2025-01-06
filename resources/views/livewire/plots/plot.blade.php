<!--/ View plot Modal -->
<div class="mt-n4">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-2">
                <span class="text-muted fw-light">الاملاك والاراضي<span
                        class="mdi mdi-chevron-left mdi-24px"></span></span>
                القطع
            </h4>
        </div>
        @can('plot-list')
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th class="text-center">رقم المقاطعة</th>
                        <th class="text-center">اسم المقاطعة</th>
                        <th class="text-center">العدد</th>
                        <th class="text-center">العملية</th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>
                            <input type="text" wire:model.debounce.300ms="search.province_number" class="form-control"
                                placeholder="بحث برقم المقاطعة ..">
                        </th>
                        <th>
                            <input type="text" wire:model.debounce.300ms="search.province_name" class="form-control"
                                placeholder="بحث اسم المقاطعة ..">
                        </th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                            $i = $links->perPage() * ($links->currentPage() - 1) + 1;
                        @endphp
                     @foreach ($Provinces as $Province)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td class="text-center">{{ $Province->province_number }}</td>
                            <td class="text-center">{{ $Province->province_name }}</td>
                            <td class="text-center">{{ $Province->GetPlots->count() }}</td>
                            <td class="p-0">
                                @can('plot-show')
                                    <a href="{{ Route('Plot-Show', $Province->id) }}"
                                        class="p-0 px-1 btn btn-text-primary waves-effect">
                                        <span class="tf-icons mdi mdi-eye fs-3"></span>
                                    </a>
                                @endcan
                                @can('plot-create')
                                    <button wire:click='AddPlotModal({{ $Province->id }})'
                                        class="p-0 px-1 btn btn-text-primary waves-effect" data-bs-toggle="modal"
                                        data-bs-target="#addplotModal">
                                        <span class="tf-icons mdi mdi-school fs-3"></span>
                                    </button>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-2 d-flex justify-content-center">
                {{ $links->onEachSide(1)->links() }}
            </div>
            <!-- Modal -->
            @include('livewire.plots.modals.add-plot')
            <!-- Modal -->
        @endcan
    </div>
</div>
<!--/ View plot Modal -->

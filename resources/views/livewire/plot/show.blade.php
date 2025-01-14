<div class="mt-n4">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="mb-2">
                <span class="text-muted fw-light">الاملاك والاراضي<span
                        class="mdi mdi-chevron-left mdi-24px"></span></span>
                عرض بيانات القطعة : <span class="text-danger">{{ $this->Province->province_number }} -
                    {{ $this->Province->province_name }}</span>
            </h4>
            <div>
                @can('plot-create')
                    <button wire:click='addPlotModal' class="mb-3 add-new btn btn-primary mb-md-0" data-bs-toggle="modal"
                        data-bs-target="#addPlotModal">أضــافــة</button>
                    @include('livewire.plot.modals.add-plot')
                @endcan
            </div>
        </div>

        @can('plot-list')
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>ت</th>
                            <th Class="text-center">رقم القطعة</th>
                            <th Class="text-center">الشعبة المختصة</th>
                            <th Class="text-center">العملية</th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.plot_number" class="form-control"
                                    placeholder="بحث برقم المقاطعة ..">
                            </th>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.specialized_department" class="form-control"
                                    placeholder="بحث باسم الشعبة ..">
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($Plots as $Plot)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td Class="text-center">{{ $Plot->plot_number }}</td>
                                <td Class="text-center">{{ $Plot->specialized_department }}</td>
                                <td Class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        @can('plot-edit')
                                            <button wire:click='GetPlot({{ $Plot->id }})'
                                                class="p-0 px-1 btn btn-text-primary waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editPlotModal">
                                                <span class="mdi mdi-text-box-edit-outline fs-3"></span>
                                            </button>
                                        @endcan
                                        <strong style="margin: 0 10px;">|</strong>
                                        @can('plot-delete')
                                            <button wire:click='GetPlot({{ $Plot->id }})'
                                                class="p-0 px-1 btn btn-text-danger waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#deletePlotModal">
                                                <span class="mdi mdi-delete-outline fs-3"></span>
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
                {{ $links->onEachSide(0)->links() }}
            </div>
            @include('livewire.plot.modals.edit-plot')
            @include('livewire.plot.modals.delete-plot')
        @endcan
    </div>
</div>

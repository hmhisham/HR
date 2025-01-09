<div class="mt-n4">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="mb-2">
                <span class="text-muted fw-light">قسم الاراضي <span class="mdi mdi-chevron-left mdi-24px"></span></span>
                قطع الاراضي / {{ $this->Province->province_number }} - {{ $this->Province->province_name }}
            </h5>
            <div>
                @can('plot-create')
                    <button wire:click='addPlotModal' class="mb-3 add-new btn btn-primary mb-md-0"
                        data-bs-toggle="modal" data-bs-target="#addPlotModal">أضــافــة</button>
                    @include('livewire.plot.modals.add-plot')
                @endcan
            </div>
        </div>

        @can('plot-list')
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th Class="">رقم القطعة</th>
                        <th Class="text-center">العملية</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($Plots as $Plot)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $Plot->plot_number }}</td>
                        <td Class="text-center">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                @can('plot-edit')
                                    <button wire:click='GetPlot({{ $Plot->id }})' class="btn rounded-pill btn-icon btn-outline-success waves-effect p-0"
                                        data-bs-toggle="modal" data-bs-target="#editPlotModal">
                                        <span class="mdi mdi-text-box-edit-outline mdi-24px"></span>
                                    </button>
                                @endcan
                                @can('plot-delete')
                                    <button wire:click='GetPlot({{ $Plot->id }})' class="btn rounded-pill btn-icon btn-outline-danger waves-effect p-0"
                                        data-bs-toggle="modal" data-bs-target="#deletePlotModal">
                                        <span class="mdi mdi-delete-outline mdi-24px"></span>
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

            @include('livewire.plot.modals.edit-plot')
            @include('livewire.plot.modals.delete-plot')
        @endcan
    </div>
</div>

<!--/ View Realitie Modal -->
<div class="mt-n4">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="mb-2">
                <span class="text-muted fw-light">قسم الاراضي <span class="mdi mdi-chevron-left mdi-24px"></span></span>
                قطع الاراضي
            </h5>
        </div>
        @can('realitie-list')
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th class="">رقم المقاطعة</th>
                            <th class="">اسم المقاطعة</th>
                            <th class="">رقم القطعة</th>
                            <th class="">العدد</th>
                            <th Class="text-center">العملية</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($Plots as $Plot)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $Plot->GetProvinces->province_number }}</td>
                                <td>{{ $Plot->GetProvinces->province_name }}</td>
                                <td>{{ $Plot->plot_number }}</td>
                                <td>{{ count($Plot->GetRealities) }}</td>
                                <td Class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        @can('realitie-show')
                                            <a href="{{ Route('showRealities', $Plot->id) }}"
                                                Class="p-0 px-1 btn btn-text-primary waves-effect">
                                                <span Class="tf-icons mdi mdi-eye fs-3"></span>
                                            </a>
                                        @endcan
                                        @can('realitie-create')
                                            <Button wire:click='GetPlot({{ $Plot->id }})'
                                                class="p-0 px-1 btn btn-text-primary waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#addRealitieToPlotModal">
                                                <span Class=" tf-icons mdi mdi-school fs-3"></span>
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
            <!-- Modal -->
            @include('livewire.realitie.modals.add-realitie-plot')
            <!-- Modal -->
        @endcan
    </div>
</div>
<!--/ View Realitie Modal -->

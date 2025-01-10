<div class="mt-n4">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="mb-2">
                <span class="text-muted fw-light">الاملاك والاراضي<span class="mdi mdi-chevron-left mdi-24px"></span></span>
                السندات العقارية
            </h5>
        </div>
        @can('realitie-list')
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th class="text-center">رقم المقاطعة</th>
                            <th class="text-center">اسم المقاطعة</th>
                            <th class="text-center">رقم القطعة</th>
                            <th class="text-center">العدد</th>
                            <th Class="text-center">العملية</th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.province_number"
                                    class="form-control" placeholder="بحث برقم المقاطعة ..">
                            </th>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.province_name" class="form-control"
                                    placeholder="بحث اسم المقاطعة ..">
                            </th>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.plot_number" class="form-control"
                                    placeholder="بحث برقم القطعة ..">
                            </th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($Plots as $Plot)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td Class="text-center">{{ $Plot->GetProvinces->province_number }}</td>
                                <td Class="text-center">{{ $Plot->GetProvinces->province_name }}</td>
                                <td Class="text-center">{{ $Plot->plot_number }}</td>
                                <td Class="text-center">{{ count($Plot->GetRealities) }}</td>
                                <td Class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        @can('realitie-show')
                                            <a href="{{ Route('showRealities', $Plot->id) }}"
                                                class="btn rounded-pill btn-icon btn-outline-primary waves-effect p-0">
                                                <span class="mdi mdi-eye-outline mdi-24px"></span>
                                            </a>
                                        @endcan
                                        @can('realitie-create')
                                            <button
                                                wire:click="GetPlot({{ $Plot->id }}, '{{ $Plot->GetProvinces->province_number }}', '{{ $Plot->GetProvinces->province_name }}', '{{ $Plot->plot_number }}')"
                                                class="btn rounded-pill btn-icon btn-outline-primary waves-effect p-0"
                                                data-bs-toggle="modal" data-bs-target="#addRealitieToPlotModal">
                                                <span class="mdi mdi-text-box-plus-outline mdi-24px"></span>
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
            @include('livewire.realitie.modals.add-realitie-plot')
        @endcan
    </div>
</div>

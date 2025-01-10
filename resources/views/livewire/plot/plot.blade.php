<div class="mt-n4">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="mb-2">
                <span class="text-muted fw-light">الاملاك والاراضي<span class="mdi mdi-chevron-left mdi-24px"></span></span>
                القطع
            </h5>
        </div>
        @can('province-list')
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>ت</th>
                            <th Class="text-center">رقم المقاطعة</th>
                            <th Class="text-center">أسم المقاطعة</th>
                            <th Class="text-center">عدد القطع</th>
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
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($Provinces as $Province)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td Class="text-center">{{ $Province->province_number }}</td>
                                <td Class="text-center">{{ $Province->province_name }}</td>
                                <td Class="text-center">{{ count($Province->GetPlots) }}</td>
                                <td Class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        @can('plot-show')
                                            <a href="{{ Route('showPlots', $Province->id) }}"
                                                class="btn rounded-pill btn-icon btn-outline-primary waves-effect p-0">
                                                <span class="mdi mdi-eye-outline mdi-24px"></span>
                                            </a>
                                        @endcan
                                        @can('plot-create')
                                            <button wire:click='GetProvince({{ $Province->id }}, true)'
                                                class="btn rounded-pill btn-icon btn-outline-primary waves-effect p-0"
                                                data-bs-toggle="modal" data-bs-target="#addPlotToProvinceModal">
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
            @include('livewire.plot.modals.add-plot-province')
        @endcan
    </div>
</div>

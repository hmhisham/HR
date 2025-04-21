<div class="mt-n4">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="mb-2">
                <span class="text-muted fw-light">الاملاك والاراضي
                    <span class="mdi mdi-chevron-left mdi-24px"></span>
                </span>
                الاسكان
            </h4>
        </div>
        @can('real-property-list')
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
                                    class="form-control" placeholder="بحث برقم المقاطعة .."
                                    wire:key="search_province_number">
                            </th>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.province_name" class="form-control"
                                    placeholder="بحث اسم المقاطعة .." wire:key="search_province_name">
                            </th>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.plot_number" class="form-control"
                                    placeholder="بحث برقم القطعة .." wire:key="search_plot_number">
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
                                        @can('real-property-show')
                                            <a href="{{ Route('ShowRealProperty', $Plot->id) }}"
                                                class="p-0 px-1 btn btn-text-primary waves-effect">
                                                <span class="mdi mdi-eye-outline fs-3"></span>
                                            </a>
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
        @endcan
    </div>
</div>

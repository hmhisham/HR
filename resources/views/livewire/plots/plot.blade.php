<div class="mt-n4">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="mb-2">
                <span class="text-muted fw-light">الاملاك والاراضي<span
                        class="mdi mdi-chevron-left mdi-24px"></span></span>
                القطع
            </h4>
        </div>
        @can('province-list')
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>ت</th>
                            <th class="text-center">رقم المقاطعة</th>
                            <th class="text-center">أسم المقاطعة</th>
                            <th>عدد القطع</th>
                            <th class="text-center">العملية</th>
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
                                <td class="text-center">
                                    @if (count($Province->GetPlots) == 0)
                                        <div class="avatar me-2 avatar-busy">
                                            <span class="avatar-initial rounded-circle bg-label-danger">{{ count($Province->GetPlots) }}</span>
                                        </div>
                                    @else
                                        <div class="avatar me-2 avatar-offline">
                                            <span class="avatar-initial rounded-circle bg-label-primary">{{ count($Province->GetPlots) }}</span>
                                        </div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        @can('plot-show')
                                            <a href="{{ Route('showPlots', $Province->id) }}"
                                                class="p-0 px-1 btn btn-text-primary waves-effect">
                                                <span class="mdi mdi-eye-outline fs-3"></span>
                                            </a>
                                        @endcan

                                        @can('plot-create')
                                            <strong style="margin: 0 10px;">|</strong>
                                            <button wire:click='GetProvince({{ $Province->id }}, true)'
                                                class="p-0 px-1 btn btn-text-primary waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#addPlotToProvinceModal">
                                                <span class="mdi mdi-text-box-plus-outline fs-3"></span>
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
            @include('livewire.plots.modals.add-plot-province')
        @endcan
    </div>
</div>

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
                    @include('livewire.plots.modals.add-plot')
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
                            <th class="text-center">إمكانية ظهوره</th>
                            <th Class="text-center">العملية</th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.plot_number" class="form-control"
                                    placeholder="بحث برقم المقاطعة .." wire:key="search_plot_number">
                            </th>
                            <th>
                                <select wire:model.debounce.300ms="search.specialized_department" class="form-select"
                                    wire:key="search_specialized_department">
                                    <option value="">اختر</option>
                                    @foreach ($branches as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                                    @endforeach
                                </select>
                            </th>
                            <th>
                                <select wire:model.debounce.300ms="search.visibility" class="form-select"
                                    wire:key="search_visibility">
                                    <option value="">اختر</option>
                                    <option value="1">نعم</option>
                                    <option value="0">لا</option>
                                </select>
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = $links->perPage() * ($links->currentPage() - 1) + 1;
                        @endphp
                        @foreach ($Plots as $Plot)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td Class="text-center">{{ $Plot->plot_number }}</td>
                                <td class="text-center">{{ $Plot->Getbranc ? $Plot->Getbranc->branch_name : '' }}</td>
                                <td class="text-center">{{ $Plot->visibility ? 'نعم' : 'لا' }}</td>
                                <td Class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        @can('plot-edit')
                                            <button wire:click='GetPlot({{ $Plot->id }})'
                                                class="p-0 px-1 btn btn-text-primary waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editPlotModal">
                                                <span class="mdi mdi-text-box-edit-outline fs-3"></span>
                                            </button>
                                        @endcan

                                        @can('plot-delete')
                                            <strong style="margin: 0 10px;">|</strong>
                                            <button wire:click='GetPlot({{ $Plot->id }})'
                                                class="p-0 px-1 btn btn-text-danger waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#removePlotModal">
                                                <span class="mdi mdi-delete-outline fs-3"></span>
                                            </button>
                                        @endcan

                                        @can('plot-print')
                                            <strong style="margin: 0 10px;">|</strong>
                                            <button wire:click='printt({{ $Plot->id }})'
                                                onclick="printFiles(['{{ Storage::url('Plots/' . $Province->province_number . '/' . $Plot->plot_number . '/' . $Plot->property_deed_image) }}','{{ Storage::url('Plots/' . $Province->province_number . '/' . $Plot->plot_number . '/' . $Plot->property_map_image) }}'])"
                                                class="p-0 px-1 btn btn-text-secondary waves-effect">
                                                <span class="mdi mdi-printer-outline fs-3"></span>
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
            @include('livewire.plots.modals.edit-plot')
            @include('livewire.plots.modals.remove-plot')
        @endcan
    </div>
</div>

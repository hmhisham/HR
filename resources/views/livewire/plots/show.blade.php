<div class="mt-n4">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="mb-2">
                <span class="text-muted fw-light">الاملاك والاراضي<span
                        class="mdi mdi-chevron-left mdi-24px"></span></span>
                عرض بيانات المقاطعة : <span class="text-danger">{{ $this->Province->province_number }} -
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
        <div class="card-body">
            @can('plot-selectall')
                <div class="d-flex align-items-center gap-3 mb-3">
                    <!-- حقل تحديد الشعبة المختصة -->
                    <div class="col-2">
                        <div class="form-floating form-floating-outline">
                            <select wire:model="selectedBranch" id="bulkBranch" class="form-select">
                                <option value="">اختر الشعبة</option>
                                @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                                @endforeach
                            </select>
                            <label for="bulkBranch" class="form-label">الشعبة المختصة</label>
                        </div>
                    </div>

                    <!-- حقل تحديد إمكانية الظهور -->
                    <div class="col-2">
                        <div class="form-floating form-floating-outline">
                            <select wire:model="selectedVisibility" id="bulkVisibility" class="form-select">
                                <option value="">اختر</option>
                                <option value="1">نعم</option>
                                <option value="0">لا</option>
                            </select>
                            <label for="bulkVisibility" class="form-label">إمكانية الظهور</label>
                        </div>
                    </div>

                    <!-- زر تحديث دفعة واحدة -->
                    <div>
                        <button wire:click="updateBatch" class="btn btn-primary">تحديث دفعة واحدة</button>
                    </div>
                </div>
            @endcan
        </div>
        @can('plot-list')
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>ت</th>
                            <th Class="text-center">تحديد</th>
                            <th Class="text-center">رقم القطعة</th>
                            <th Class="text-center">الشعبة المختصة</th>
                            <th class="text-center">إمكانية ظهوره</th>
                            <th class="text-center">الصورة</th>
                            <th Class="text-center">العملية</th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th class="text-center">
                                <input type="checkbox" wire:model="selectAll" class="form-check-input">
                            </th>
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
                            <th>
                                <select wire:model.debounce.300ms="search.property_deed_image" class="form-select"
                                    wire:key="search_property_deed_image">
                                    <option value="">اختر</option>
                                    <option value="مرفقة">مرفقة</option>
                                    <option value="غير مرفقة">غير مرفقة</option>
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
                                <td class="text-center">
                                    <input type="checkbox" wire:model="selectedPlots" value="{{ $Plot->id }}"
                                        class="form-check-input">
                                </td>
                                <td Class="text-center">{{ $Plot->plot_number }}</td>
                                <td class="text-center">
                                    <span
                                        class="badge rounded-pill
                                        @if ($Plot->Getbranc) @if ($Plot->Getbranc->branch_name == 'الاسكان') bg-label-primary
                                            @elseif($Plot->Getbranc->branch_name == 'العقارات') bg-label-warning
                                            @elseif($Plot->Getbranc->branch_name == 'املاك الاقضية والنواحي') bg-label-info
                                            @elseif($Plot->Getbranc->branch_name == 'الخرائط والمرتسمات') bg-label-danger @endif
                                        me-1
                                        @endif">
                                        {{ $Plot->Getbranc ? $Plot->Getbranc->branch_name : '' }}
                                    </span>
                                </td>
                                <td class="text-center">{{ $Plot->visibility ? 'نعم' : 'لا' }}</td>
                                <td class="text-center">
                                    <span
                                        class="{{ $Plot->property_deed_image ? 'badge rounded-pill bg-label-primary me-1' : 'badge rounded-pill bg-label-danger me-1' }}">
                                        {{ $Plot->property_deed_image ? 'مرفقة' : 'غير مرفقة' }}
                                    </span>
                                </td>
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

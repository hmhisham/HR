<div class="mt-n4">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="mb-2">
                <span class="text-muted fw-light">قسم الاراضي <span class="mdi mdi-chevron-left mdi-24px"></span></span>
                قطع الاراضي
            </h5>
            {{-- <div>
                @can('province-create')
                    <button wire:click='AddProvinceModal' class="mb-3 add-new btn btn-primary mb-md-0"
                        data-bs-toggle="modal" data-bs-target="#addProvinceModal">أضــافــة</button>
                    @include('livewire.plot.modals.add-province')
                @endcan
            </div> --}}
        </div>
        @can('province-list')
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th Class="">رقم المقاطعة</th>
                        <th Class="">أسم المقاطعة</th>
                        <th Class="">عدد القطع</th>
                        <th Class="text-center">العملية</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($Provinces as $Province)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $Province->province_number }}</td>
                            <td>{{ $Province->province_name }}</td>
                            <td>{{ count($Province->GetPlots) }}</td>
                            <td Class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    {{-- @can('province-edit')
                                        <button wire:click='GetProvince({{ $Province->id }}, false)' class="btn rounded-pill btn-icon btn-outline-primary waves-effect p-0"
                                            data-bs-toggle="modal" data-bs-target="#editProvinceModal">
                                            <span class="mdi mdi-text-box-edit-outline mdi-24px"></span>
                                        </button>
                                    @endcan --}}
                                    @can('plot-create')
                                        <button wire:click='GetProvince({{ $Province->id }}, true)' class="btn rounded-pill btn-icon btn-outline-primary waves-effect p-0"
                                            data-bs-toggle="modal" data-bs-target="#addPlotToProvinceModal">
                                            <span class="mdi mdi-text-box-plus-outline mdi-24px"></span>
                                        </button>
                                    @endcan
                                    @can('plot-show')
                                        <a href="{{ Route('showPlots', $Province->id) }}" class="btn rounded-pill btn-icon btn-outline-primary waves-effect p-0">
                                            <span class="mdi mdi-eye-outline mdi-24px"></span>
                                        </a>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @include('livewire.plot.modals.edit-province')
            @include('livewire.plot.modals.add-plot-province')
        @endcan
    </div>
</div>

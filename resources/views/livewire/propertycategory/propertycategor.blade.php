<div class="mt-n4">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h4 class="mb-2">
                    <span class="text-muted fw-light">الاعدادات<span class="mdi mdi-chevron-left mdi-24px"></span></span>
                    انواع العقارات
                </h4>
                <div>
                    @can('propertycategor-create')
                        <button wire:click='AddpropertycategorModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addpropertycategorModal">أضــافــة</button>
                        @include('livewire.propertycategory.modals.add-propertycategor')
                    @endcan
                </div>
            </div>
        </div>
        @can('propertycategor-list')
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>ت</th>
                            <th class="text-center">نوع العقار</th>
                            <th class="text-center">ملاحظات</th>
                            <th class="text-center">العملية</th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th class="text-center">
                                <input type="text" wire:model.debounce.300ms="search.category"
                                    class="form-control text-center" placeholder="نوع العقار">
                            </th>
                            <th class="text-center">
                                <input type="text" wire:model.debounce.300ms="search.notes"
                                    class="form-control text-center" placeholder="ملاحظات">
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = $links->perPage() * ($links->currentPage() - 1) + 1;
                        @endphp
                        @foreach ($Propertycategory as $propertycategor)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td class="text-center">{{ $propertycategor->category }}</td>
                                <td class="text-center">{{ $propertycategor->notes }}</td>

                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('propertycategor-edit')
                                            <button wire:click="Getpropertycategor({{ $propertycategor->id }})"
                                                class="p-0 px-1 btn btn-text-primary waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editpropertycategorModal">
                                                <i class="mdi mdi-text-box-edit-outline fs-3"></i>
                                            </button>
                                        @endcan
                                        <strong style="margin: 0 10px;">|</strong>
                                        @can('propertycategor-delete')
                                            <button wire:click="Getpropertycategor({{ $propertycategor->id }})"
                                                class="p-0 px-1 btn btn-text-danger waves-effect {{ $propertycategor->active ? 'disabled' : '' }}"
                                                data-bs-toggle = "modal" data-bs-target="#removepropertycategorModal">
                                                <i class="tf-icons mdi mdi-delete-outline fs-3"></i>
                                            </button>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-2 d-flex justify-content-center">
                    {{ $links->onEachSide(0)->links() }}
                </div>
            </div>
            @include('livewire.propertycategory.modals.edit-propertycategor')
            @include('livewire.propertycategory.modals.remove-propertycategor')
        @endcan
    </div>
</div>

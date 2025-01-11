<div class="mt-n4">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="mb-2">
                <span class="text-muted fw-light">السندات العقارية<span
                        class="mdi mdi-chevron-left mdi-24px"></span></span>
                </span>
                عرض بيانات القطعة : <span class="text-danger">{{ $this->Plot->plot_number }}</span>
                <strong style="margin: 0 30px;">|</strong>
                ضمن المقاطعة : <span class="text-danger">{{ $this->Province->province_number }} -
                    {{ $this->Province->province_name }}</span>
            </h5>
            <div>
                @can('realitie-create')
                    <button wire:click='addRealitieModal' class="mb-3 add-new btn btn-primary mb-md-0" data-bs-toggle="modal"
                        data-bs-target="#addRealitieModal">أضــافــة</button>
                    @include('livewire.realitie.modals.add-realitie')
                @endcan
            </div>
        </div>
        @can('realitie-list')
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th class="text-center">رقم السند العقاري</th>
                            <th class="text-center">العدد</th>
                            <th class="text-center">إشارات التأمينات</th>
                            <th class="text-center">الجلد</th>
                            <th class="text-center">إمكانية ظهوره</th>
                            <th class="text-center">العملية</th>
                        </tr>
                        <tr>

                            <th>#</th>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.property_number"
                                    class="form-control" placeholder="بحث برقم السند العقاري ..">
                            </th>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.count" class="form-control"
                                    placeholder="بحث بالعدد ..">
                            </th>
                            <th>
                                <select wire:model.debounce.300ms="search.mortgage_notes" class="form-select">
                                    <option value="">اختر</option>
                                    <option value="رفع الحجز">رفع الحجز</option>
                                    <option value="عدم التصرف بالعقار الا بموافقة الموانئ">عدم التصرف بالعقار الا بموافقة
                                        الموانئ</option>
                                </select>
                            </th>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.volume_number" class="form-control"
                                    placeholder="بحث بالجلد ..">
                            </th>
                            <th>
                                <select wire:model.debounce.300ms="search.visibility" class="form-select">
                                    <option value="">اختر</option>
                                    <option value="1">نعم</option>
                                    <option value="0">لا</option>
                                </select>
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($Realities as $Realitie)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td class="text-center">{{ $Realitie->property_number }}</td>
                                <td class="text-center">{{ $Realitie->count }}</td>
                                <td class="text-center">{{ $Realitie->mortgage_notes }}</td>
                                <td class="text-center">{{ $Realitie->volume_number }}</td>
                                <td class="text-center">{{ $Realitie->visibility ? 'نعم' : 'لا' }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('realitie-edit')
                                            <button wire:click="GetRealitie({{ $Realitie->id }})"
                                                class="p-0 px-1 btn btn-text-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editRealitieModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        @endcan
                                        @can('realitie-delete')
                                            <button wire:click="GetRealitie({{ $Realitie->id }})"
                                                class="p-0 px-1 btn btn-text-danger waves-effect {{ $Realitie->active ? 'disabled' : '' }}"
                                                data-bs-toggle="modal" data-bs-target="#deleteRealitieModal">
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
                <!-- Modal -->
                @include('livewire.realitie.modals.edit-realitie')
                @include('livewire.realitie.modals.delete-realitie')
                <!-- Modal -->
            </div>
        @endcan
    </div>
</div>

<div class="mt-n4">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="mb-2">
                <a href="{{ route('Realities') }}" class="text-muted fw-light">
                    السندات العقارية
                    <span class="mdi mdi-chevron-left mdi-24px"></span>
                </a>
                عرض بيانات القطعة : <span class="text-danger">{{ $this->Plot->plot_number }}</span>
                <strong style="margin: 0 30px;">|</strong>
                ضمن المقاطعة : <span class="text-danger">{{ $this->Province->province_number }} -
                    {{ $this->Province->province_name }}</span>
            </h4>
            <div>
                @can('realitie-create')
                    <button wire:click='addRealitieModal' class="mb-3 add-new btn btn-primary mb-md-0"
                        data-bs-toggle="modal" data-bs-target="#addRealitieModal">أضــافــة</button>
                    @include('livewire.realities.modals.add-realitie')
                @endcan
            </div>
        </div>
        <div class="card-body">
            @can('realitie-selectall')
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
        @can('realitie-list')
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th Class="text-center">تحديد</th>
                            <th class="text-center">رقم السند العقاري</th>
                            <th class="text-center">العدد</th>
                            <th class="text-center">إشارات التأمينات</th>
                            <th class="text-center">الجلد</th>
                            <th class="text-center">الشعبة المختصة</th>
                            <th class="text-center">إمكانية ظهوره</th>
                            <th class="text-center">الصورة</th>
                            <th class="text-center">العملية</th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th class="text-center">
                                <input type="checkbox" wire:model="selectAll" class="form-check-input">
                            </th>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.property_number"
                                    class="form-control" placeholder="بحث برقم السند العقاري .."
                                    wire:key="search_property_number">
                            </th>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.count" class="form-control"
                                    placeholder="بحث بالعدد .." wire:key="search_count">
                            </th>
                            <th>
                                <select wire:model.debounce.300ms="search.mortgage_notes" class="form-select"
                                    wire:key="search_mortgage_notes">
                                    <option value="">اختر</option>
                                    <option value="رفع الحجز">رفع الحجز</option>
                                    <option value="عدم التصرف بالعقار الا بموافقة الموانئ">عدم التصرف بالعقار الا بموافقة
                                        الموانئ</option>
                                </select>
                            </th>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.volume_number" class="form-control"
                                    placeholder="بحث بالجلد .." wire:key="search_volume_number">
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
                        @foreach ($Realities as $Realitie)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td class="text-center">
                                    <input type="checkbox" wire:model="selectedRealities" value="{{ $Realitie->id }}"
                                        class="form-check-input">
                                </td>
                                <td class="text-center">{{ $Realitie->property_number }}</td>
                                <td class="text-center">{{ $Realitie->count }}</td>
                                <td class="text-center">{{ $Realitie->mortgage_notes }}</td>
                                <td class="text-center">{{ $Realitie->volume_number }}</td>
                                <td class="text-center">
                                    <span
                                        class="badge rounded-pill
                                        @if ($Realitie->Getbranc) @if ($Realitie->Getbranc->branch_name == 'الاسكان') bg-label-primary
                                            @elseif($Realitie->Getbranc->branch_name == 'العقارات') bg-label-warning
                                            @elseif($Realitie->Getbranc->branch_name == 'املاك الاقضية والنواحي') bg-label-info
                                            @elseif($Realitie->Getbranc->branch_name == 'الخرائط والمرتسمات') bg-label-danger @endif
                                        me-1
                                        @endif">
                                        {{ $Realitie->Getbranc ? $Realitie->Getbranc->branch_name : '' }}
                                    </span>
                                </td>
                                <td class="text-center">{{ $Realitie->visibility ? 'نعم' : 'لا' }}</td>
                                <td class="text-center">
                                    <span
                                        class="{{ $Realitie->property_deed_image ? 'badge rounded-pill bg-label-primary me-1' : 'badge rounded-pill bg-label-danger me-1' }}">
                                        {{ $Realitie->property_deed_image ? 'مرفقة' : 'غير مرفقة' }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('realitie-edit')
                                            <button wire:click="GetRealitie({{ $Realitie->id }})"
                                                class="p-0 px-1 btn btn-text-primary waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editRealitieModal">
                                                <i class="mdi mdi-text-box-edit-outline fs-3"></i>
                                            </button>
                                        @endcan

                                        @can('realitie-delete')
                                            <strong style="margin: 0 10px;">|</strong>
                                            <button wire:click="GetRealitie({{ $Realitie->id }})"
                                                class="p-0 px-1 btn btn-text-danger waves-effect {{ $Realitie->active ? 'disabled' : '' }}"
                                                data-bs-toggle="modal" data-bs-target="#deleteRealitieModal">
                                                <i class="tf-icons mdi mdi-delete-outline fs-3"></i>
                                            </button>
                                        @endcan

                                        {{--  @can('realitie-print')
                                            <strong style="margin: 0 10px;">|</strong>
                                            <button wire:click="printt({{ $Realitie->id }})"
                                                onclick="printFile('{{ Storage::url('Realities/' . $Province->province_number . '/' . $Plot->plot_number . '/' . $Realitie->property_number . '/' . $Realitie->property_deed_image) }}')"
                                                class="p-0 px-1 btn btn-text-secondary waves-effect">
                                                <span class="mdi mdi-printer-outline fs-3"></span>
                                            </button>
                                        @endcan --}}
                                        @can('realitie-print')
                                            <strong style="margin: 0 10px;">|</strong>
                                            <button
                                                @if ($Realitie->property_deed_image) wire:click="printt({{ $Realitie->id }})"onclick="printFile('{{ Storage::url('Realities/' . $Province->province_number . '/' . $Plot->plot_number . '/' . $Realitie->property_number . '/' . $Realitie->property_deed_image) }}')"
                                                @else
                                                    onclick="Toast.fire({
                                                        icon: 'error',
                                                        title: 'خطأ',
                                                        html: 'الملف غير مرفق مع العقار المراد طباعته.',
                                                    });" @endif
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
                <div class="mt-2 d-flex justify-content-center">
                    {{ $links->onEachSide(1)->links() }}
                </div>
                <!-- Modal -->
                @include('livewire.realities.modals.edit-realitie')
                @include('livewire.realities.modals.remove-realitie')
                <!-- Modal -->
            </div>
        @endcan
    </div>
</div>


<div class="card">
    <!-- ✅ شريط البطاقة العلوي مع العنوان وأيقونة -->
    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div class="d-flex align-items-center">
            <i class="mdi mdi-format-list-bulleted text-primary fs-4 me-2"></i>
            <h4 class="mb-0 fw-bold">قائمة   عقد الايجار</h4>
            @if($selected_property_folder_id && $selected_property_name)
                <small class="text-muted ms-3">
                    <i class="mdi mdi-folder-outline me-1"></i>
                    رقم الاضبارة: {{ $selected_property_folder_id }} - {{ $selected_property_name }}
                </small>
            @endif
        </div>
        <!-- ✅ مجموعة أدوات البطاقة: بحث + زر إضافة -->
        <div class="d-flex align-items-center gap-3">
            <!-- حقل بحث مدمج -->
            <div class="dt-search">
                <input wire:model.debounce.300ms="ContractSearch" type="text" class="form-control form-control-sm" placeholder="بحث عام..." />
            </div>
            <!-- زر الإضافة -->
            @can('contract-create')
                <button wire:click='AddContractModalShow' class="btn btn-primary btn-sm d-flex align-items-center"
                    data-bs-toggle="modal" data-bs-target="#addcontractModal">
                    <i class="mdi mdi-plus-circle-outline me-1"></i>
                    <span>أضــافــة</span>
                </button>
                @include('livewire.contracts.modals.add-contract')
            @endcan
        </div>
    </div>

    <!-- ✅ جدول البيانات -->
    @can('contract-list')
        <div class="card-datatable table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center"></th>
                        <th class="text-center">رقم العقد المنشأ</th>
                        <th class="text-center">تاريخ بداية العقد</th>
                        <th class="text-center">تاريخ انتهاء العقد</th>
                        <th class="text-center">اسم المستأجر</th>
                        <th class="text-center">مبلغ التأجير للسنة الواحدة</th>
                        <th class="text-center">الملاحظات</th>
                        <th class="text-center">العمليات</th>
                    </tr>

                    <!-- ✅ صف فلترة متقدم (اختياري) -->
                    <tr>
                        <th></th>
                        <th class="text-center">
                            <input type="text" wire:model.debounce.300ms="search.property_folder_id"
                                class="form-control form-control-sm text-center" placeholder="">
                        </th>

                        <th class="text-center">
                            <input type="text" wire:model.debounce.300ms="search.generated_contract_number"
                                class="form-control form-control-sm text-center" placeholder="رقم العقد المنشأ">
                        </th>

                        <th class="text-center">
                            <input type="text" wire:model.debounce.300ms="search.start_date"
                                class="form-control form-control-sm text-center" placeholder="تاريخ بداية العقد">
                        </th>

                        <th class="text-center">
                            <input type="text" wire:model.debounce.300ms="search.end_date"
                                class="form-control form-control-sm text-center" placeholder="تاريخ انتهاء العقد">
                        </th>

                        <th class="text-center">
                            <input type="text" wire:model.debounce.300ms="search.tenant_name"
                                class="form-control form-control-sm text-center" placeholder="اسم المستأجر">
                        </th>

                        <th class="text-center">
                            <input type="text" wire:model.debounce.300ms="search.annual_rent_amount"
                                class="form-control form-control-sm text-center" placeholder="مبلغ التأجير للسنة الواحدة">
                        </th>

                        <th class="text-center">
                            <input type="text" wire:model.debounce.300ms="search.notes"
                                class="form-control form-control-sm text-center" placeholder="الملاحظات">
                        </th>

                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($Contracts as $Contract)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $Contract->property_folder_id}}</td>
                            <td class="text-center">{{ $Contract->generated_contract_number}}</td>
                            <td class="text-center">{{ $Contract->start_date}}</td>
                            <td class="text-center">{{ $Contract->end_date}}</td>
                            <td class="text-center">{{ $Contract->tenant_name}}</td>
                            <td class="text-center">{{ $Contract->annual_rent_amount}}</td>
                            <td class="text-center">{{ $Contract->notes}}</td>
                            <!-- ✅ أزرار العمليات -->
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                    @can('contract-edit')
                                        <button wire:click="GetContract({{ $Contract->id }})"
                                            class="btn btn-icon btn-outline-success btn-sm waves-effect" data-bs-toggle="modal"
                                            data-bs-target="#editcontractModal" title="تعديل">
                                            <i class="tf-icons mdi mdi-pencil fs-5"></i>
                                        </button>
                                    @endcan
                                    @can('contract-delete')
                                        <button wire:click="GetContract({{ $Contract->id }})"
                                            class="btn btn-icon btn-outline-danger btn-sm waves-effect {{ $Contract->active ? 'disabled' : '' }}" 
                                            data-bs-toggle="modal" data-bs-target="#removecontractModal" title="حذف">
                                            <i class="tf-icons mdi mdi-delete-outline fs-5"></i>
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
        <!-- ✅ ترقيم الصفحات -->
        <div class="card-footer d-flex justify-content-center">
            <div class="mt-2">
                {{ $links->links() }}
            </div>
        </div>

        <!-- Modal -->
        @include('livewire.contracts.modals.edit-contract')
        @include('livewire.contracts.modals.remove-contract')
        <!-- Modal -->
    @endcan
</div>

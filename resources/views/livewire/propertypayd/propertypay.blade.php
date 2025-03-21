<div class="mt-n4">
    <h5 class="mb-2">
        <span class="text-muted fw-light">
            قسم الاراضي <span class="mdi mdi-chevron-left mdi-24px"></span>
            الاملاك <span class="mdi mdi-chevron-left mdi-24px"></span>
        </span>
        قوائم الدفع
    </h5>
    <div class="card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div class="text-center mb-n5">
                        <h5 class="fw-bolder border-bottom-2 mb-1">رقم العقار</h5>
                        <h5 class="fw-bolder fs-2">{{ $PropertyNumber }}</h5>
                    </div>
                    <div class="text-center mb-n5">
                        <h6 class="fw-bolder border-bottom-2 mb-1">المبلغ المستحق</h6>
                        <h5 class="fw-bolder fs-2">{{ number_format($TotalAmount) }}</h5>
                    </div>
                    <div class="text-center mb-n5">
                        <h6 class="fw-bolder border-bottom-2 mb-1">المبلغ المدفوع</h6>
                        <h5 class="fw-bolder fs-2">{{ number_format($TotalAmountsPaid) }}</h5>
                    </div>
                    <div class="text-center mb-n5">
                        <h6 class="fw-bolder border-bottom-2 mb-1">المبلغ المتبقي</h6>
                        <h5 class="fw-bolder fs-2">{{ number_format($TotalAmount - $TotalAmountsPaid) }}</h5>
                    </div>
                    <div>
                        @can('propertypay-create')
                            <button wire:click='AddPropertypayModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addpropertypayModal">أضــافــة</button>
                            @include('livewire.propertypayd.modals.add-propertypay')
                        @endcan
                    </div>
                </div>
            </div>

            @can('propertypay-list')
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th class="text-center">
                                    <a href="#" wire:click.prevent="sortBy('receipt_number')"
                                        class="text-decoration-none text-dark d-flex justify-content-center">رقم الوصل</a>
                                    @if (isset($sortField) && $sortField === 'receipt_number')
                                        @if (isset($sortDirection) && $sortDirection === 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </th>
                                <th class="text-center">
                                    <a href="#" wire:click.prevent="sortBy('receipt_date')"
                                        class="text-decoration-none text-dark">تاريخ الدفع</a>
                                    @if ($sortField === 'receipt_date')
                                        @if ($sortDirection === 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </th>
                                <th class="text-center">
                                    <a href="#" wire:click.prevent="sortBy('amount')"
                                        class="text-decoration-none text-dark">مبلغ التسديد</a>
                                    @if ($sortField === 'amount')
                                        @if ($sortDirection === 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </th>
                                <th class="text-center">
                                    <a href="#" wire:click.prevent="sortBy('notes')"
                                        class="text-decoration-none text-dark">الملاحظات</a>
                                    @if ($sortField === 'notes')
                                        @if ($sortDirection === 'asc')
                                            ▲
                                        @else
                                            ▼
                                        @endif
                                    @endif
                                </th>
                                <th class="text-center">العملية</th>
                            </tr>
                            <tr>
                                <th></th>
                                {{-- <th>
                                    <input type="text" wire:model.debounce.500ms="search.bonds_id" class="form-control"
                                        placeholder="بحث بالأسم ">
                                </th> --}}
                                <th>
                                    <input type="text" wire:model.debounce.500ms="search.receipt_number"
                                        class="form-control" placeholder="بحث برقم الوصل">
                                </th>
                                <th>
                                    <input type="text" wire:model.debounce.500ms="search.receipt_date"
                                        class="form-control" placeholder="بحث بتاريخ الوصل ">
                                </th>
                                <th>
                                    <input type="text" wire:model.debounce.500ms="search.amount" class="form-control"
                                        placeholder="بحث بالمبلغ  ">
                                </th>
                                <th>
                                    <input type="text" wire:model.debounce.500ms="search.notes" class="form-control"
                                        placeholder="بحث بالملاحظات  ">
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i =
                                    $Propertypayd instanceof \Illuminate\Pagination\LengthAwarePaginator
                                        ? $Propertypayd->perPage() * ($Propertypayd->currentPage() - 1) + 1
                                        : 1;
                            @endphp

                            @foreach ($Propertypayd as $Propay)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td class="text-center">{{ $Propay->receipt_number }}</td>
                                    <td class="text-center">{{ $Propay->receipt_date }}</td>
                                    <td class="text-center">{{ number_format($Propay->amount, 0) }}</td>
                                    <td class="text-center">{{ $Propay->notes }} </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            @can('propert-edit')
                                                <button wire:click='GetPropertypay({{ $Propay->id }})'
                                                    class="btn btn-text-success px-0 py-0" data-bs-toggle="modal"
                                                    data-bs-target="#editpropertypayModal">
                                                    <span class="mdi mdi-text-box-edit-outline fs-3"></span>
                                                </button>
                                            @endcan
                                            @can('propert-delete')
                                                <button wire:click='GetPropertypay({{ $Propay->id }})'
                                                    class="btn btn-text-danger px-0 py-0" data-bs-toggle="modal"
                                                    data-bs-target="#removepropertModal">
                                                    <span class="mdi mdi-text-box-remove-outline fs-3"></span>
                                                </button>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3 d-flex justify-content-center">
                    @if ($Propertypayd instanceof \Illuminate\Pagination\LengthAwarePaginator)
                        {{ $Propertypayd->onEachSide(1)->links() }}
                    @endif
                </div>
                @include('livewire.propertypayd.modals.edit-propertypay')
            @endcan
        </div>
    </div>
</div>

<div class="mt-n4">
    <!-- Search & Add -->
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <!-- العمود الأول: العنوان والفقرة -->
                <div>
                    <h4 class="mb-2">
                        <span class="text-muted fw-light">التصاريح <span class="mdi mdi-chevron-left mdi-24px"></span></span>
                        قائمة التصاريح
                    </h4>
                    <p class="mb-0">التصاريح التي يمكنك استخدامها وتعيينها للمستخدمين وحسب الادوار ازاء كل منها.</p>
                </div>

                <!-- العمود الثاني: الزر -->
                <div>
                    @can('permission-create')
                        <button wire:click='AddPermissionModalShow' class="add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addPermissionModal">أضف تصريح</button>
                        @include('livewire.owner.permissions-roles.permissions.modals.add-permission')
                    @endcan
                </div>
            </div>
        </div>

        <!-- Permission Table -->
        <div class="card-datatable table-responsive">
            @can('permission-list')
                <table class="table {{-- datatables-permissions --}}">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">الأسم</th>
                            <th class="text-center">الشرح</th>
                            <th class="text-center">معين إلى</th>
                            <th class="text-center">تاريخ الإنشاء</th>
                            <th class="text-center">الاجراءات</th>
                        </tr>
                        <tr>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.name" class="form-control"
                                    placeholder="بحث باسم التصريح .." wire:key="search_name">
                            </th>
                            <th>
                                <input type="text" wire:model.debounce.300ms="search.explain_name" class="form-control"
                                    placeholder="بحث بشرح التصريح .." wire:key="search_explain_name">
                            </th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Permissions as $Permission)
                            <tr>
                                <td class="text-center">{{ $Permission->name }}</td>
                                <td class="text-center">{{ $Permission->explain_name }}</td>
                                <td class="text-center">
                                    @php $i = 0; @endphp
                                    @foreach ($Permission->roles as $role)
                                        @php ++$i; @endphp
                                        <span class="m-0 text-sm fw-bolder ">
                                            {{ $role->name }}
                                            @if ($i < count($Permission->roles))
                                                ,
                                            @endif
                                        </span>
                                    @endforeach
                                </td>
                                <td class="text-center">{{ $Permission->created_at->format('Y-m-d') }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        {{-- <button wire:click="show({{ $Permission->id }})" class="p-0 px-1 btn btn-outline-primary waves-effect" data-bs-toggle="modal" data-bs-target="#ShowPermission"><i class="tf-icons mdi mdi-eye-lock-outline fs-3"></i></button> --}}
                                        @can('permission-edit')
                                            <button wire:click="GetPermission({{ $Permission->id }})"
                                                class="btn btn-text-success waves-effect waves-light rounded-circle p-0 px-1"
                                                data-bs-toggle="modal" data-bs-target="#editPermissionModal">
                                                <i class="tf-icons mdi mdi-shield-edit fs-3"></i>
                                            </button>
                                        @endcan
                                        @can('permission-delete')
                                            @if (Auth::User()->hasRole('OWNER'))
                                                <button wire:click="GetPermission({{ $Permission->id }})"
                                                    class="btn btn-text-danger waves-effect rounded-circle p-0 px-1"
                                                    data-bs-toggle="modal" data-bs-target="#removePermissionModal">
                                                    <i class="tf-icons mdi mdi-shield-remove fs-3"></i>
                                                </button>
                                            @endif
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-2 d-flex justify-content-center">
                    {{ $links->links() }}
                </div>
                <!-- Modal -->
                @include('livewire.owner.permissions-roles.permissions.modals.edit-permission')
                @include('livewire.owner.permissions-roles.permissions.modals.remove-permission')
                <!-- Modal -->
            @endcan
        </div>
    </div>
    <!--/ Permission Table -->
</div>

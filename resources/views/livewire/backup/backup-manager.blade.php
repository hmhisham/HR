<div>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">إدارة النسخ الاحتياطية</h5>
            <button type="button" class="btn btn-primary" wire:click="$toggle('showModal')">
                <i class="bx bx-plus me-1"></i> إنشاء نسخة احتياطية جديدة
            </button>
        </div>
        <div class="card-body">
            @if ($errorMessage)
                <div class="alert alert-danger">
                    {{ $errorMessage }}
                </div>
            @endif

            @if ($successMessage)
                <div class="alert alert-success">
                    {{ $successMessage }}
                </div>
            @endif

            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم الملف</th>
                            <th>النوع</th>
                            <th>الحجم</th>
                            <th>تاريخ الإنشاء</th>
                            <th>الحالة</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($backups as $backup)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $backup->name }}</td>
                                <td>
                                    @if ($backup->type == 'manual')
                                        <span class="badge bg-label-primary">يدوي</span>
                                    @else
                                        <span class="badge bg-label-success">تلقائي</span>
                                    @endif
                                </td>
                                <td>{{ $backup->size }}</td>
                                <td>{{ $backup->created_at->format('Y-m-d H:i:s') }}</td>
                                <td>
                                    @if ($backup->status == 'success')
                                        <span class="badge bg-label-success">ناجح</span>
                                    @else
                                        <span class="badge bg-label-danger">فاشل</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#"
                                                wire:click.prevent="downloadBackup({{ $backup->id }})">
                                                <i class="bx bx-download me-1"></i> تحميل
                                            </a>
                                            <a class="dropdown-item" href="#"
                                                wire:click.prevent="confirmRestore({{ $backup->id }})">
                                                <i class="bx bx-reset me-1"></i> استعادة
                                            </a>
                                            <a class="dropdown-item" href="#"
                                                wire:click.prevent="deleteBackup({{ $backup->id }})">
                                                <i class="bx bx-trash me-1"></i> حذف
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">لا توجد نسخ احتياطية</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal إنشاء نسخة احتياطية -->
    <div class="modal fade" id="backupModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">إنشاء نسخة احتياطية جديدة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="createBackup">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="form-label">نوع النسخ الاحتياطي</label>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="radio" id="backupTypeManual" value="manual"
                                        wire:model="backupType">
                                    <label class="form-check-label" for="backupTypeManual">يدوي</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="backupTypeAutomatic"
                                        value="automatic" wire:model="backupType">
                                    <label class="form-check-label" for="backupTypeAutomatic">تلقائي</label>
                                </div>
                            </div>

                            @if ($backupType == 'manual')
                                <div class="col-12 mb-3">
                                    <label class="form-label">مسار الحفظ</label>
                                    <input type="text" class="form-control" wire:model="manualBackupPath">
                                    @error('manualBackupPath')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @else
                                <div class="col-12 mb-3">
                                    <label class="form-label">وقت الجدولة</label>
                                    <input type="time" class="form-control" wire:model="scheduleTime">
                                    @error('scheduleTime')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label">تكرار الجدولة</label>
                                    <select class="form-select" wire:model="scheduleFrequency">
                                        <option value="daily">يومي</option>
                                        <option value="weekly">أسبوعي</option>
                                        <option value="monthly">شهري</option>
                                    </select>
                                    @error('scheduleFrequency')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endif

                            <div class="col-12 mb-3">
                                <label class="form-label">كلمة المرور</label>
                                <input type="password" class="form-control" wire:model="backupPassword">
                                @error('backupPassword')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label">محتوى النسخة الاحتياطية</label>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" id="backupItemsFiles"
                                        value="files" wire:model="backupItems">
                                    <label class="form-check-label" for="backupItemsFiles">الملفات</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="backupItemsDatabase"
                                        value="database" wire:model="backupItems">
                                    <label class="form-check-label" for="backupItemsDatabase">قاعدة البيانات</label>
                                </div>
                                @error('backupItems')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                data-bs-dismiss="modal">إلغاء</button>
                            <button type="submit" class="btn btn-primary">إنشاء</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal استعادة النسخة الاحتياطية -->
    <div class="modal fade" id="restoreModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">استعادة النسخة الاحتياطية</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($selectedBackup)
                        <div class="alert alert-warning">
                            <strong>تحذير!</strong> سيؤدي استعادة النسخة الاحتياطية إلى استبدال البيانات الحالية. هل أنت
                            متأكد من المتابعة؟
                        </div>
                        <form wire:submit.prevent="restoreBackup">
                            <div class="mb-3">
                                <label class="form-label">اسم الملف</label>
                                <input type="text" class="form-control" value="{{ $selectedBackup->name }}"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">كلمة المرور</label>
                                <input type="password" class="form-control" wire:model="restorePassword" required>
                                @error('restorePassword')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary"
                                    data-bs-dismiss="modal">إلغاء</button>
                                <button type="submit" class="btn btn-danger">استعادة</button>
                            </div>
                        </form>
                    @else
                        <div class="alert alert-danger">
                            لم يتم تحديد نسخة احتياطية!
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('showModal', event => {
            $('#backupModal').modal('show');
        });

        window.addEventListener('hideModal', event => {
            $('#backupModal').modal('hide');
        });

        window.addEventListener('showRestoreModal', event => {
            $('#restoreModal').modal('show');
        });

        window.addEventListener('hideRestoreModal', event => {
            $('#restoreModal').modal('hide');
        });
    </script>
@endpush

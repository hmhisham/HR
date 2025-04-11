<div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">استيراد بيانات الموظفين</h5>
        </div>
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form wire:submit.prevent="import">
                <div class="mb-3">
                    <label for="file" class="form-label">اختر ملف Excel</label>
                    <input type="file" class="form-control @error('file') is-invalid @enderror" id="file"
                        wire:model="file">
                    @error('file')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">يجب أن يكون الملف بتنسيق Excel (.xlsx, .xls) أو CSV</div>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="deleteBeforeImport"
                        wire:model="deleteBeforeImport">
                    <label class="form-check-label" for="deleteBeforeImport">حذف جميع البيانات قبل الاستيراد</label>
                </div>

                <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                    <span wire:loading wire:target="import" class="spinner-border spinner-border-sm" role="status"
                        aria-hidden="true"></span>
                    استيراد البيانات
                </button>

                <button type="button" class="btn btn-danger" wire:click="deleteAllEmployees"
                    wire:loading.attr="disabled">
                    <span wire:loading wire:target="deleteAllEmployees" class="spinner-border spinner-border-sm"
                        role="status" aria-hidden="true"></span>
                    حذف جميع البيانات
                </button>
            </form>

            @if ($showResults)
                <div class="mt-4">
                    <div class="alert alert-info">
                        تم استيراد {{ $importedCount }} سجل بنجاح.
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

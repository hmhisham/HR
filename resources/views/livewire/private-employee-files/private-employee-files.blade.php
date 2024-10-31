<div class="mt-n4">
    <h4 class="mb-2">
        <span class="fw-light">ملفات تخص الموظفين</span>
    </h4>





    <div class="card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between mb-n3">
                    <div>
                        <input wire:model="ScaleaSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        @can('scalea-create')
                            <form>
                                <div class="upload-btn-wrapper">
                                    <button class="upload-btn btn-primary btn-sm waves-effect waves-light">
                                        {{ app()->getLocale() == 'ar' ? 'اختر ملف':'Choose File' }}
                                    </button>
                                    <input wire:model.defer="fileChoose" type="file" id="file-input" accept="application/pdf">

                                    <div wire:loading wire:target="fileChoose">
                                        {{ app()->getLocale() == 'ar' ? 'جارِ معالجة الملف...':' Processing File...' }}
                                    </div>
                                </div>
                            </form>
                            @error('fileChoose')
                                <span class="error mt-auto text-center">{{ $message }}</span>
                            @enderror
                        @endcan
                    </div>
                </div>
            </div>
            @can('scalea-list')
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th Class="text-center">أسم الملف</th>
                            <th Class="text-center">نوع الملف</th>
                            <th Class="text-center">حجم الملف</th>
                            <th Class="text-center">تاريخ الرفع</th>
                            <th Class="text-center">عدد مرات التحميل</th>
                            <th Class="text-center">العملية</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($PrivateFiles as $File)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td class="">{{ $File[1] }}</td>
                                <td class="text-center">{{ $File[2] }}</td>
                                <td class="text-center">{{ $File[3] }}</td>
                                <td class="text-center">{{ $File[5] }}</td>
                                <td class="text-center">{{ $File[6] }}</td>
                                <td Class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('scalea-edit')
                                            <button wire:click="FilePreview('{{ $File[0] }}')"
                                                class="p-0 px-1 btn btn-text-primary waves-effect"
                                                data-bs-toggle="modal" data-bs-target="#previewFileModal">
                                                <i class="tf-icons mdi mdi-file-eye fs-2"></i>
                                            </button>
                                        @endcan
                                        @can('scalea-edit')
                                            <button wire:click="FileDownloads('{{ $File[0] }}')" download="{{ $File[0] }}"
                                                class="p-0 px-1 btn btn-text-primary waves-effect"
                                                {{-- data-bs-toggle="modal" data-bs-target="#editscaleaModal" --}}>
                                                <i class="tf-icons mdi mdi-file-download fs-2"></i>
                                            </button>
                                        @endcan
                                        @can('scalea-delete')
                                            <button wire:click="FilePreview('{{ $File[0] }}')"
                                                class="p-0 px-1 btn btn-text-danger waves-effect"
                                                data-bs-toggle = "modal" data-bs-target="#deleteFileModal">
                                                <i class="tf-icons mdi mdi-file-remove fs-2"></i>
                                            </button>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <div class="mt-2 d-flex justify-content-center">
                    {{ $links->links() }}
                </div> --}}
                <!-- Modal -->
                @include('livewire.private-employee-files.modals.upload-file')
                @include('livewire.private-employee-files.modals.preview-file')
                @include('livewire.private-employee-files.modals.delete-file')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>

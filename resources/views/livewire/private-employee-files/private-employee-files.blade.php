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






                            <!-- uploadFile Modal -->
                            <div wire:ignore.self class="modal fade" id="uploadFileModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="p-4 modal-content p-md-5">
                                        <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                                        <div class="modal-body p-md-0">
                                            <div class="mb-4 text-center mt-n4">
                                                <h3 class="pb-1 mb-2">رفح الملفات الخاصة بالموظفين</h3>
                                            </div>

                                            <hr class="mt-n2">

                                            <h5 wire:loading wire:target="fileChoose" wire:loading.class="d-flex justify-content-center text-primary fw-bolder">جار معالجة الملف...</h5>
                                            <h5 wire:loading wire:target="uploadFile" wire:loading.class="d-flex justify-content-center text-primary fw-bolder">جار رفع الملف...</h5>

                                            <div wire:loading.remove>
                                                <div class="row">
                                                    <div wire:ignore class="col text-center">
                                                        <iframe id="pdf-preview" width="600" height="400"></iframe>
                                                    </div>
                                                </div>

                                                <hr class="my-0">

                                                <div class="row">
                                                    <div class="col">
                                                        <div class="d-flex justify-content-center demo-vertical-spacing mb-n4">
                                                            <button wire:click="uploadFile" class="btn btn-icon btn-primary p-3 rounded-circle waves-effect waves-light upload-image-btn">
                                                                <span class="mdi mdi-cloud-upload mdi-24px"></span>
                                                            </button>
                                                            <button wire:click="removeFileChoose" class="btn btn-icon btn-outline-secondary p-3 rounded-circle waves-effect waves-light">
                                                                <span class="mdi mdi-file-remove mdi-24px"></span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="col text-ceneter">
                                                        <div class="demo-vertical-spacing mb-n4">
                                                            <div wire:loading.remove>
                                                                {{ $fileName }}
                                                                <br>
                                                                <div wire:target="fileChoose" class="">
                                                                    @if ($fileChoose)
                                                                        <div class="badge {{ $fileChooseSize > 512000 ? 'bg-danger':'bg-success' }}">حجم الملف: {{ $fileSize }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- uploadFile Modal -->

                            <!-- previewFile Modal -->
                            <div wire:ignore.self class="modal fade" id="previewFileModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="p-4 modal-content p-md-5">
                                        <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                                        <div class="modal-body p-md-0">
                                            <div class="mb-4 text-center mt-n4">
                                                <h3 class="pb-1 mb-2">رفح الملفات الخاصة بالموظفين</h3>
                                            </div>

                                            <hr class="mt-n2">

                                            <h5 wire:loading wire:target="FilePreview" wire:loading.class="d-flex justify-content-center text-primary fw-bolder">جار معالجة الملف...</h5>

                                            <div wire:loading.remove>
                                                <div class="row">
                                                    <div class="col text-center">
                                                        <iframe src="{{ asset('storage/PrivateEmployeeFiles/' . $filePreview) }}" width="600" height="400"></iframe>
                                                    </div>
                                                </div>

                                                <hr class="my-0">

                                                <div class="row">
                                                    <div class="col">
                                                        <div class="d-flex justify-content-center demo-vertical-spacing mb-n4">
                                                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                                                                تجاهل
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="col text-ceneter">
                                                        <div class="demo-vertical-spacing mb-n4">
                                                            <div wire:loading.remove>
                                                                {{ $filePreview }}
                                                                <br>
                                                                <div wire:target="FilePreview" class="">
                                                                    @if ($filePreview)
                                                                        <div class="badge bg-primary">حجم الملف: {{ $fileSize }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- previewFile Modal -->
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
                                <td class="text-center">{{ $File[0] }}</td>
                                <td class="text-center">{{ $File[1] }}</td>
                                <td class="text-center">{{ $File[2] }}</td>
                                <td class="text-center">{{ $File[3] }}</td>
                                <td class="text-center">{{ $File[4] }}</td>
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
                                            <button wire:click="FileDownloads('{{ $File[0] }}')"
                                                class="p-0 px-1 btn btn-text-primary waves-effect"
                                                {{-- data-bs-toggle="modal" data-bs-target="#editscaleaModal" --}}>
                                                <i class="tf-icons mdi mdi-file-download fs-2"></i>
                                            </button>
                                        @endcan
                                        @can('scalea-delete')
                                            <button wire:click="FileDelete('{{ $File[0] }}')"
                                                class="p-0 px-1 btn btn-text-danger waves-effect"
                                                {{-- data-bs-toggle = "modal" data-bs-target="#removescaleaModal" --}}>
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
                {{-- @include('livewire.scaleas.modals.edit-scalea')
                @include('livewire.scaleas.modals.remove-scalea') --}}
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>

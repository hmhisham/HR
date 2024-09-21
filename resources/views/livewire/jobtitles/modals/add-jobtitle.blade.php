<!-- Add Jobtitle Modal -->
<div wire:ignore.self class="modal fade" id="addjobtitleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">اضافة عنوان وظيفي جديد</h3>
                    <p>نافذة الأضافة </p>
                </div>
                <hr class="mt-n2">
                <form id="addjobtitleModalForm" autocomplete="off">
                    <div class="row row-cols-1  ">
                        <div class="col mb-3">
                            <div Class="row">
                                <div class="mb-3 col flex-fill {{ $grades }}">
                                    <div class="form-floating form-floating-outline">
                                        <select wire:model.defer='grades_id' id="modalJobtitlesgrades_id"
                                            class="form-select @error('grades_id') is-invalid is-filled @enderror">
                                            <option value="">اختر الدرجة</option>
                                            @foreach ($grades as $grade)
                                                <option value="{{ $grade->id }}">{{ $grade->grades_name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="modalJobtitlesgrades_id">الدرجة</label>
                                    </div>
                                    @error('grades_id')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='jobtitles_name' type="text"
                                            id="modalJobtitlesjobtitles_name" placeholder="العنوان الوظيفي"
                                            class="form-control @error('jobtitles_name') is-invalid is-filled @enderror" />
                                        <label for="modalJobtitlesjobtitles_name">العنوان الوظيفي</label>
                                    </div>
                                    @error('jobtitles_name')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="text-center col-12 demo-vertical-spacing mb-n4">
                        <button wire:click='store' wire:loading.attr="disabled" type="button"
                            class="btn btn-primary me-sm-3 me-1">اضافة فئة</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                            aria-label="Close">تجاهل</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ Add Jobtitle Modal -->

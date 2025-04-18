<!-- Add Holiday Modal -->
<div wire:ignore.self class="modal fade" id="addholidayModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">اضافة </h3>
                    <p>نافذة الأضافة </p>
                </div>
                <hr class="mt-n2">
                <form id="addholidayModalForm" autocomplete="off">
                    <div class="row row-cols-1  ">
                        <div class="col mb-3">
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <div class="form-floating form-floating-outline @error('worker') is-invalid is-filled @enderror"
                                        style="width: 100%">
                                        <select wire:model='worker' id="worker" class="form-select"
                                            placeholder='حدد العملية'>
                                            <option value=""></option>
                                            @foreach ($workers as $worker)
                                                <option value="{{ $worker->id }}">{{ $worker->full_name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="worker">حدد الموظف</label>
                                    </div>
                                    @error('worker')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-4 col-6">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='computer_number' type="text"
                                            id="modalEmployeecomputer_number" placeholder="رقم الحاسبة"
                                            class="form-control @error('computer_number') is-invalid is-filled @enderror"
                                            disabled />
                                        <label for="modalEmployeecomputer_number">رقم الحاسبة</label>
                                    </div>
                                    @error('computer_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col-6">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='department' type="text" id="modalEmployeedepartment"
                                            placeholder="اسم القسم"
                                            class="form-control @error('department') is-invalid is-filled @enderror"
                                            disabled />
                                        <label for="modalEmployeedepartment">اسم القسم </label>
                                    </div>
                                    @error('department')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>

                            <div Class="row">
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">

                                        <select wire:model.defer='order_number' type="select"
                                            id="modalHolidayorder_number" placeholder="رقم امر التكليف "
                                            class="form-select @error('order_number') is-invalid is-filled @enderror">
                                            <option value=" " disabled selected>اختيار</option>
                                            <option value="تجريبي">تجريبي</option>
                                            <option value="تجريبي1">تجريبي1</option>
                                            <option value="تجريبي2">تجريبي2</option>
                                        </select>
                                        <label for="modalHolidayorder_number"> رقم امر التكليف</label>
                                    </div>
                                    @error('order_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='order_date' type="date" id="modalHolidayorder_date"
                                            placeholder="تاريخ الامر الاداري"
                                            class="form-control @error('order_date') is-invalid is-filled @enderror" />
                                        <label for="modalHolidayorder_date">تاريخ الامر الاداري</label>
                                    </div>
                                    @error('order_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='holiday_type' type="text"
                                            id="modalHolidayholiday_type" placeholder="نوع الاجازه"
                                            class="form-control @error('holiday_type') is-invalid is-filled @enderror" />
                                        <label for="modalHolidayholiday_type">نوع الاجازه</label>
                                    </div>
                                    @error('holiday_type')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                            <div Class="row">
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='holiday_purpose' type="text"
                                            id="modalHolidayholiday_purpose" placeholder="الغرض من الاجازه"
                                            class="form-control @error('holiday_purpose') is-invalid is-filled @enderror" />
                                        <label for="modalHolidayholiday_purpose">الغرض من الاجازه</label>
                                    </div>
                                    @error('holiday_purpose')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='days_count' type="text" id="modalHolidaydays_count"
                                            placeholder="عدد الايام"
                                            class="form-control @error('days_count') is-invalid is-filled @enderror" />
                                        <label for="modalHolidaydays_count">عدد الايام</label>
                                    </div>
                                    @error('days_count')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='separation_date' type="date"
                                            id="modalHolidayseparation_date" placeholder="تاريخ الانفكاك"
                                            class="form-control @error('separation_date') is-invalid is-filled @enderror" />
                                        <label for="modalHolidayseparation_date">تاريخ الانفكاك</label>
                                    </div>
                                    @error('separation_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                            <div Class="row">
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='resumption_date' type="date"
                                            id="modalHolidayresumption_date" placeholder="تاريخ المباشرة"
                                            class="form-control @error('resumption_date') is-invalid is-filled @enderror" />
                                        <label for="modalHolidayresumption_date">تاريخ المباشرة</label>
                                    </div>
                                    @error('resumption_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <div class="form-check">
                                            <input wire:model.defer='cut_off_holiday' type="checkbox"
                                                id="modalHolidaycut_off_holiday" placeholder="قطع الاجازة"
                                                class="form-check-input @error('cut_off_holiday') is-invalid is-filled @enderror" />
                                            <label class="form-check-label" for="modalHolidaycut_off_holiday">قطع
                                                الاجازة</label>
                                        </div>
                                    </div>
                                    @error('cut_off_holiday')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer="file_path" type="file" id="modalHolidayfile_path"
                                            placeholder="الملف" accept="pdf,image/*"
                                            class="form-control @error('file_path') is-invalid is-filled @enderror" />
                                        <label for="modalHolidayfile_path">الملف</label>
                                    </div>
                                    @error('file_path')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                <!-- عرض معاينة الصورة إذا تم تحميلها مؤقتًا -->
                                @if ($file_path && $file_path instanceof \Livewire\TemporaryUploadedFile)
                                    <div class="mb-3 col">
                                        <img src="{{ $file_path->temporaryUrl() }}" alt="معاينة الصورة"
                                            style="max-width: 100%; height: auto;" />
                                    </div>
                                @endif
                                <!-- عرض الصورة المخزنة إذا كانت موجودة -->
                                @if ($file_path && !$file_path instanceof \Livewire\TemporaryUploadedFile)
                                    <div class="mb-3 col">
                                        <img src="{{ asset('storage/' . $file_path) }}" alt="الصورة المخزنة"
                                            style="max-width: 100%; height: auto;" />
                                    </div>
                                @endif
                            </div>
                            <div Class="row">
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='notes' type="text" id="modalHolidaynotes"
                                            placeholder="الملاحظات"
                                            class="form-control @error('notes') is-invalid is-filled @enderror" />
                                        <label for="modalHolidaynotes">الملاحظات</label>
                                    </div>
                                    @error('notes')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="text-center col-12 demo-vertical-spacing mb-n4">
                        <button wire:click='store' wire:loading.attr="disabled" type="button"
                            class="btn btn-primary me-sm-3 me-1">اضافة</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                            aria-label="Close">تجاهل</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ Add Holiday Modal -->

<!-- Edite Certifi Modal -->
<div wire:ignore.self class="modal fade" id="editcertifiModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعيدل بيانات الشهادة</h3>
                    <p>نافذة التعديل</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetCertifi"
                    wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حفظ البيانات...</h5>
                <div wire:loading.remove  wire:target="GetCertifi">
                    <form id="editCertifiModalForm" autocomplete="off">
                        <div class="row row-cols-1">
                            <div class="col mb-3">
                                <div class="row">
                                    <div class="mb-3 col">
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
                                    <div class="mb-3 col-3">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='calculator_number' type="text"
                                                id="modalEmployeecalculator_number" placeholder="رقم الحاسبة"
                                                class="form-control @error('calculator_number') is-invalid is-filled @enderror"
                                                disabled />
                                            <label for="modalEmployeecalculator_number">رقم الحاسبة</label>
                                        </div>
                                        @error('calculator_number')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-3">
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
                                            <input wire:model.defer='document_number' type="text"
                                                id="modalCertificdocument_number" placeholder="رقم الوثيقة"
                                                class="form-control @error('document_number') is-invalid is-filled @enderror" />
                                            <label for="modalCertificdocument_number">رقم الوثيقة</label>
                                        </div>
                                        @error('document_number')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='document_date' type="text" id="editdocument_date"
                                                autocomplete="off" readonly placeholder="يوم-شهر-سنة"
                                                class="form-control @error('document_date') is-invalid is-filled @enderror" />
                                            <label for="flatpickr-date">تاريخ الوثيقة</label>
                                        </div>
                                        @error('document_date')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='authenticity_number' type="text"
                                                id="modalCertificauthenticity_number" placeholder="رقم صحة الصدور"
                                                class="form-control @error('authenticity_number') is-invalid is-filled @enderror" />
                                            <label for="modalCertificauthenticity_number">رقم صحة الصدور</label>
                                        </div>
                                        @error('authenticity_number')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='authenticity_date' type="text"
                                                id="editauthenticity_date" autocomplete="off" readonly placeholder="يوم-شهر-سنة"
                                                class="form-control @error('authenticity_date') is-invalid is-filled @enderror" />
                                            <label for="flatpickr-date">تاريخ صحة الصدور</label>
                                        </div>
                                        @error('authenticity_date')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col-3">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model='certificate_name' wire:change='loadGraduations'
                                                id="modalCertificcertificate_name"
                                                class="form-select @error('certificate_name') is-invalid is-filled @enderror">
                                                <option value="">اختر الشهادة</option>
                                                @if ($Certificates && count($Certificates) > 0)
                                                    @foreach ($Certificates as $certificate)
                                                        <option value="{{ $certificate->id }}">
                                                            {{ $certificate->certificates_name }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                    <option value="">لا توجد شهادات متاحة</option>
                                                @endif
                                            </select>
                                            <label for="modalCertificcertificate_name">الشهادة</label>
                                        </div>
                                        @error('certificate_name')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <!-- حقل جهة التخرج -->
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model='college_name' id="modalCertificgraduation_name"
                                                wire:change='loadSpecializations'
                                                class="form-select @error('college_name') is-invalid is-filled @enderror">
                                                <option value="">اختر جهة التخرج</option>
                                                @if ($Graduations && count($Graduations) > 0)
                                                    @foreach ($Graduations as $graduation)
                                                        <option value="{{ $graduation->id }}">
                                                            {{ $graduation->graduations_name }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                    <option value="">لا توجد جهات تخرج متاحة</option>
                                                @endif
                                            </select>
                                            <label for="modalCertificgraduation_name">جهة التخرج</label>
                                        </div>
                                        @error('college_name')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <!-- حقل التخصص -->
                                    <div class="mb-3 col-3">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='specialization' id="modalCertificspecialization"
                                                class="form-select @error('specialization') is-invalid is-filled @enderror">
                                                <option value="">اختر التخصص</option>
                                                @if ($Specializations && count($Specializations) > 0)
                                                    @foreach ($Specializations as $specialization)
                                                        <option value="{{ $specialization->id }}">
                                                            {{ $specialization->specializations_name }}</option>
                                                    @endforeach
                                                @else
                                                    <option value="">لا توجد تخصصات متاحة</option>
                                                @endif
                                            </select>
                                            <label for="modalCertificspecialization">التخصص</label>
                                        </div>
                                        @error('specialization')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='duration' id="modalCertificdurationgraduation_year"
                                                class="form-select @error('duration') is-invalid is-filled @enderror"
                                                name="year">
                                                <option value="">اختر مدة القدم</option>
                                                <option value="0">0</option>
                                                <option value="6">6</option>
                                                <option value="12">12</option>
                                            </select>
                                            <label for="modalCertificduration">مدة القدم/بالاشهر</label>
                                        </div>
                                        @error('duration')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            @php
                                                $startYear = 1950; // Change this to your desired start year
                                                $currentYear = date('Y');
                                            @endphp
                                            <select wire:model.defer='graduation_year' id="modalCertificgraduation_year"
                                                class="form-select @error('graduation_year') is-invalid is-filled @enderror"
                                                name="year">
                                                <option value="">اختر سنة التخرج</option>
                                                @for ($year = $startYear; $year <= $currentYear; $year++)
                                                    <option value="{{ $year }}">{{ $year - 1 }} -
                                                        {{ $year }}</option>
                                                @endfor
                                            </select>
                                            <label for="modalCertificgraduation_year">سنوات التخرج</label>
                                        </div>
                                        @error('graduation_year')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.lazy='grade' type="number" id="modalCertificgrade"
                                                placeholder="الدرجة"
                                                class="form-control @error('grade') is-invalid is-filled @enderror"
                                                min="0" max="100" step="1" inputmode="numeric"
                                                pattern="[0-9]*" />
                                            <label for="modalCertificgrade">الدرجة</label>
                                        </div>
                                        @error('grade')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model='estimate' type="text" id="modalCertificestimate"
                                                placeholder="التقدير"
                                                class="form-control @error('estimate') is-invalid is-filled @enderror"
                                                readonly />
                                            <label for="modalCertificestimate">التقدير</label>
                                        </div>
                                        @error('estimate')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='issuing_country' type="text"
                                                id="modalCertificissuing_country" placeholder="البلد المانح للشهادة"
                                                class="form-control @error('issuing_country') is-invalid is-filled @enderror" />
                                            <label for="modalCertificissuing_country">البلد المانح للشهادة</label>
                                        </div>
                                        @error('issuing_country')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='notes' type="text" id="modalCertificnotes"
                                                placeholder="الملاحظات"
                                                class="form-control @error('notes') is-invalid is-filled @enderror" />
                                            <label for="modalCertificnotes">الملاحظات</label>
                                        </div>
                                        @error('notes')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-check">
                                            <input wire:model.defer='status' type="checkbox" id="modalHolidaystatus"
                                                placeholder="الحالة"
                                                class="form-check-input @error('status') is-invalid @enderror" />
                                            <label class="form-check-label" for="modalHolidaystatus">
                                                الحالة
                                            </label>
                                        </div>
                                        @error('status')
                                            <small class='text-danger'>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-0">
                        <div class="text-center col-12 demo-vertical-spacing mb-n4">
                            <button wire:click='update' wire:loading.attr="disabled" type="button"
                                class="btn btn-success me-sm-3 me-1">تعديل</button>
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                aria-label="Close">تجاهل</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Edite Certifi Modal -->

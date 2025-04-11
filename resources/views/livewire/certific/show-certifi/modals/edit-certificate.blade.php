<!-- Edite certifi Modal -->
<!-- Add certifi Modal -->
<div wire:ignore.self class="modal fade" id="editcertifiModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل بيانات الشهادة</h3>
                    <p>نافذة التعديل</p>
                </div>

                <hr class="mt-n2">

                <h5 wire:loading wire:target="Getcertifi"
                    wire:loading.class="d-flex justify-content-center text-primary">
                    جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حفظ البيانات...</h5>

                <div wire:loading.remove wire:target="Getcertifi, update">
                    <form id="addcertifiModalForm" autocomplete="off" wire:submit.prevent="store">
                        <div Class="row alert alert-outline-dark">
                            <div class="col">
                                <label class="border-bottom-2 text-center mb-2 w-100">اسم الموظف</label>
                                <div wire:loading wire:target='AddCertifyModal'
                                    wire:loading.class="d-flex justify-content-center">
                                    <span class="mdi mdi-loading mdi-spin mdi-24px"></span>
                                </div>
                                <div wire:loading.remove wire:target='AddCertifyModal' class="text-center">
                                    {{ $Worker->full_name ?? '' }}</div>
                            </div>

                            <div class="col">
                                <label class="border-bottom-2 text-center mb-2 w-100">رقم الحاسبة</label>
                                <div wire:loading wire:target='AddCertifyModal'
                                    wire:loading.class="d-flex justify-content-center">
                                    <span class="mdi mdi-loading mdi-spin mdi-24px"></span>
                                </div>
                                <div wire:loading.remove wire:target='AddCertifyModal' class="text-center">
                                    {{ $Worker->computer_number ?? '' }}</div>
                            </div>
                        </div>

                        <hr class="">

                        <div class="row">
                            <div class="col-8">
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='document_number' type="text"
                                                id="modalcertifidocument_number" placeholder="رقم الوثيقة"
                                                class="form-control @error('document_number') is-invalid is-filled @enderror"
                                                onkeypress="return onlyNumberKey(event)" />
                                            <label for="modalcertifidocument_number">رقم الوثيقة</label>
                                        </div>
                                        @error('document_number')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='document_date' type="text" id="adddocument_date"
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
                                                id="modalcertifiauthenticity_number" placeholder="رقم صحة الصدور"
                                                class="form-control @error('authenticity_number') is-invalid is-filled @enderror"
                                                onkeypress="return onlyNumberKey(event)" />
                                            <label for="modalcertifiauthenticity_number">رقم صحة الصدور</label>
                                        </div>
                                        @error('authenticity_number')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='authenticity_date' type="text"
                                                id="addauthenticity_date" autocomplete="off" readonly
                                                placeholder="يوم-شهر-سنة"
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
                                            <select wire:model.defer='certificates_id' id="addCertificertificates_id"
                                                class="form-select @error('certificates_id') is-invalid is-filled @enderror">
                                                <option value=""></option>
                                                @foreach ($certificates as $certificate)
                                                    <option value="{{ $certificate->id }}">
                                                        {{ $certificate->certificates_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="addCertificertificates_id">التحصيل الدراسي</label>
                                        </div>
                                        @error('certificates_id')
                                            <small class='text-danger inputerror'>{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='graduations_id' id="addCertifigraduations_id"
                                                class="form-select @error('graduations_id') is-invalid is-filled @enderror">
                                                <option value=""></option>
                                                @foreach ($graduations as $graduation)
                                                    <option value="{{ $graduation->id }}">
                                                        {{ $graduation->graduations_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="modalCertifigraduations_id">جهةالتخرج</label>
                                        </div>
                                        @error('graduations_id')
                                            <small class='text-danger inputerror'>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='specialization_id'
                                                id="addCertifispecialization_id"
                                                class="form-select @error('specialization_id') is-invalid is-filled @enderror">
                                                <option value=""></option>
                                                @foreach ($specializations as $specialization)
                                                    <option value="{{ $specialization->id }}">
                                                        {{ $specialization->specializations_name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="modalCertifispecialization_id">التخصص</label>
                                        </div>
                                        @error('specialization_id')
                                            <small class='text-danger inputerror'>{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            @php
                                                $startYear = 1950; // Change this to your desired start year
                                                $currentYear = date('Y');
                                            @endphp
                                            <select wire:model.defer='graduation_year'
                                                id="modalCertificgraduation_year"
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
                                            <select wire:model.defer='specializationclassification_id'
                                                id="addCertifispecializationclassification_id"
                                                class="form-select @error('specializationclassification_id') is-invalid is-filled @enderror">
                                                <option value=""></option>
                                                @foreach ($specializationclassification as $specializationclassificatio)
                                                    <option value="{{ $specializationclassificatio->id }}">
                                                        {{ $specializationclassificatio->specializationclassification_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="modalCertifispecializationclassification_id">تصنيف
                                                التخصص</label>
                                        </div>
                                        @error('specializationclassification_id')
                                            <small class='text-danger inputerror'>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='specialtys_id' id="addCertifispecialtys_id"
                                                class="form-select @error('specialtys_id') is-invalid is-filled @enderror">
                                                <option value=""></option>
                                                @foreach ($specialtys as $specialty)
                                                    <option value="{{ $specialty->id }}">
                                                        {{ $specialty->specialtys_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="modalCertifispecialtys_id">التخصص العام</label>
                                        </div>
                                        @error('specialtys_id')
                                            <small class='text-danger inputerror'>{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='precises_id' id="addCertifiprecises_id"
                                                class="form-select @error('precises_id') is-invalid is-filled @enderror">
                                                <option value=""></option>
                                                @foreach ($precises as $precise)
                                                    <option value="{{ $precise->id }}">{{ $precise->precises_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="modalCertifiprecises_id">التخصص الدقيق</label>
                                        </div>
                                        @error('precises_id')
                                            <small class='text-danger inputerror'>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.lazy='grade' type="number" id="modalCertificgrade"
                                                placeholder="الدرجة"
                                                class="form-control @error('grade') is-invalid is-filled @enderror"
                                                min="50" max="100" step="1" inputmode="numeric"
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

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='duration' id="modalcertifiduration"
                                                {{ $isDisabled ? 'disabled' : '' }}
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
                                </div>

                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='issuing_country' type="text"
                                                id="modalcertifiissuing_country" placeholder="البلد المانح للشهادة"
                                                class="form-control @error('issuing_country') is-invalid is-filled @enderror" />
                                            <label for="modalcertifiissuing_country">البلد المانح للشهادة</label>
                                        </div>
                                        @error('issuing_country')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='notes' type="text" id="modalcertifinotes"
                                                placeholder="الملاحظات"
                                                class="form-control @error('notes') is-invalid is-filled @enderror" />
                                            <label for="modalcertifinotes">الملاحظات</label>
                                        </div>
                                        @error('notes')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="col position-relative">
                                        <div
                                            class="form-check position-absolute top-50 start-0 translate-middle-y mt-n2">
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

                            <div class="col-4 text-center">
                                <div class="mb-4">
                                    <div class="card-header p-0">
                                        <div class="nav-align-top">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <button wire:click='certificateTap' type="button"
                                                        class="alert  {{ $activeCertificateTap == 'active' ? 'active alert-solid-primary' : '' }} py-1 mb-n1"
                                                        role="tab" data-bs-toggle="tab"
                                                        data-bs-target="#navs-top-certificate"
                                                        aria-controls="navs-top-certificate" aria-selected="true">
                                                        الشهادة
                                                    </button>
                                                </li>
                                                <li class="nav-item">
                                                    <button wire:click='validitySsuanceTap' type="button"
                                                        class="{{-- nav-link --}} alert {{ $activeValiditySsuanceTap == 'active' ? 'active alert-solid-primary' : '' }} py-1 mb-n1"
                                                        role="tab" data-bs-toggle="tab"
                                                        data-bs-target="#navs-top-validity-ssuance"
                                                        aria-controls="navs-top-validity-ssuance"
                                                        aria-selected="false">
                                                        صحة الصدور
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content p-0">
                                            <div class="tab-pane fade {{ $activeCertificateTap == 'active' ? 'show active' : '' }}"
                                                id="navs-top-certificate" role="tabpanel">
                                                <div class="form-floating form-floating-outline mt-3">
                                                    <input type="file" wire:model="Edit_certificate_file"
                                                        id="Edit_certificate_file"
                                                        class="form-control @error('Edit_certificate_file') is-invalid is-filled @enderror"
                                                        accept="application/pdf, .png, .jpg, .jpeg">
                                                    <label for="modalcertifinotes">اختر ملف الشهادة</label>
                                                </div>
                                                @error('Edit_certificate_file')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror

                                                <div wire:loading.remove wire:target='Edit_certificate_file'>
                                                    @if ($Edit_certificate_file && !$certificateFilePreview)
                                                        @if (pathinfo($Edit_certificate_file, PATHINFO_EXTENSION) == strtolower('pdf'))
                                                            <iframe
                                                                src="{{ asset('storage/Certific/' . $computer_number . '/' . $Edit_certificate_file) }}"
                                                                class="mt-3"
                                                                style="height: 320px; width: 100%"></iframe>
                                                        @else
                                                            <img src="{{ asset('storage/Certific/' . $computer_number . '/' . $Edit_certificate_file) }}"
                                                                class="mt-3 rounded img-fluid"
                                                                style="max-height: 150px; width: 100%">
                                                        @endif
                                                    @endif
                                                </div>

                                                <div wire:loading.remove wire:target='Edit_certificate_file'>
                                                    @if ($certificateFilePreview)
                                                        @if ($Edit_certificate_file->getClientOriginalExtension() == strtolower('pdf'))
                                                            <iframe src="{{ $certificateFilePreview }}"
                                                                class="mt-3 mb-n4"
                                                                style="height: 320px; width: 100%"></iframe>
                                                        @else
                                                            <img src="{{ $certificateFilePreview }}"
                                                                class="rounded img-fluid mt-3 mb-n4"
                                                                style="max-height: 300px; width: 100%">
                                                        @endif
                                                    @endif
                                                </div>

                                                <div wire:loading wire:target="Edit_certificate_file">
                                                    <img src="{{ asset('assets/img/gif/Cube-Loading-Animated-3D.gif') }}"
                                                        style="height: 200px" alt="Timer Loading Animated 3D Icon">
                                                </div>
                                            </div>

                                            <div class="tab-pane fade {{ $activeValiditySsuanceTap == 'active' ? 'show active' : '' }}"
                                                id="navs-top-validity-ssuance" role="tabpanel">
                                                <div class="form-floating form-floating-outline mt-3">
                                                    <input type="file"
                                                        wire:model="Edit_validity_ssuance_certificate_file"
                                                        id="Edit_validity_ssuance_certificate_file"
                                                        class="form-control @error('Edit_validity_ssuance_certificate_file') is-invalid is-filled @enderror"
                                                        accept="application/pdf, .png, .jpg, .jpeg">
                                                    <label for="modalcertifinotes">اختر ملف صحة صدور الشهادة</label>
                                                </div>

                                                @error('Edit_validity_ssuance_certificate_file')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror

                                                <div wire:loading.remove
                                                    wire:target='Edit_validity_ssuance_certificate_file'>
                                                    @if ($Edit_validity_ssuance_certificate_file && !$validitySsuanceFilePreview)
                                                        @if (pathinfo($Edit_validity_ssuance_certificate_file, PATHINFO_EXTENSION) == strtolower('pdf'))
                                                            <iframe
                                                                src="{{ asset('storage/Certific/' . $computer_number . '/' . $Edit_validity_ssuance_certificate_file) }}"
                                                                class="mt-3 "
                                                                style="height: 320px; width: 100%"></iframe>
                                                        @else
                                                            <img src="{{ asset('storage/Certific/' . $computer_number . '/' . $Edit_validity_ssuance_certificate_file) }}"
                                                                class="mt-3 rounded img-fluid"
                                                                style="max-height: 300px; width: 100%">
                                                        @endif
                                                    @endif
                                                </div>

                                                <div wire:loading.remove
                                                    wire:target='Edit_validity_ssuance_certificate_file'>
                                                    @if ($validitySsuanceFilePreview)
                                                        @if ($Edit_validity_ssuance_certificate_file->getClientOriginalExtension() == strtolower('pdf'))
                                                            <iframe src="{{ $validitySsuanceFilePreview }}"
                                                                class="mt-3 mb-n4"
                                                                style="height: 320px; width: 100%"></iframe>
                                                        @else
                                                            <img src="{{ $validitySsuanceFilePreview }}"
                                                                class="rounded img-fluid mt-3 mb-n4"
                                                                style="max-height: 300px; width: 100%">
                                                        @endif
                                                    @endif
                                                </div>

                                                <div wire:loading wire:target="Edit_validity_ssuance_certificate_file">
                                                    <img src="{{ asset('assets/img/gif/Cube-Loading-Animated-3D.gif') }}"
                                                        style="height: 200px" alt="Timer Loading Animated 3D Icon">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-0">

                        <div class="text-center col-12 demo-vertical-spacing mb-n4">
                            <button wire:click='update' wire:loading.attr="disabled" type="button"
                                class="btn btn-primary me-sm-3 me-1">تعديل</button>
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                aria-label="Close">تجاهل</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Add certifi Modal -->

{{-- <div wire:ignore.self class="modal fade" id="editcertifiModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل الشهادة</h3>
                    <p>نافذة التعديل</p>
                </div>

                <hr class="mt-n2">

                <h5 wire:loading wire:target="Getcertifi" wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">جار حفظ البيانات...</h5>

                <div wire:loading.remove wire:target="Getcertifi, update">
                    <form id="editcertifiModalForm" autocomplete="off">
                        <div Class="row bg-label-primary">
                            <div class="col">
                                <label class="border-bottom-2 text-center mb-2 w-100">اسم الموظف</label>
                                <div wire:loading wire:target='AddCertifyModal'
                                    wire:loading.class="d-flex justify-content-center">
                                    <span class="mdi mdi-loading mdi-spin mdi-24px"></span>
                                </div>
                                <div wire:loading.remove wire:target='AddCertifyModal' class="text-center">
                                    {{ $Worker->full_name ?? '' }}</div>
                            </div>

                            <div class="col">
                                <label class="border-bottom-2 text-center mb-2 w-100">رقم الحاسبة</label>
                                <div wire:loading wire:target='AddCertifyModal'
                                    wire:loading.class="d-flex justify-content-center">
                                    <span class="mdi mdi-loading mdi-spin mdi-24px"></span>
                                </div>
                                <div wire:loading.remove wire:target='AddCertifyModal' class="text-center">
                                    {{ $Worker->computer_number ?? '' }}</div>
                            </div>
                        </div>

                        <hr class="">

                        <div Class="row">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='document_number' type="text"
                                        id="modalcertifidocument_number" placeholder="رقم الوثيقة"
                                        class="form-control @error('document_number') is-invalid is-filled @enderror"
                                        onkeypress="return onlyNumberKey(event)" />
                                    <label for="modalcertifidocument_number">رقم الوثيقة</label>
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
                                        id="modalcertifiauthenticity_number" placeholder="رقم صحة الصدور"
                                        class="form-control @error('authenticity_number') is-invalid is-filled @enderror"
                                        onkeypress="return onlyNumberKey(event)" />
                                    <label for="modalcertifiauthenticity_number">رقم صحة الصدور</label>
                                </div>
                                @error('authenticity_number')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>

                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='authenticity_date' type="text" id="editauthenticity_date"
                                        autocomplete="off" readonly placeholder="يوم-شهر-سنة"
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
                                    <select wire:model.defer='certificates_id' id="editCertificertificates_id"
                                        class="form-select @error('certificates_id') is-invalid is-filled @enderror">
                                        <option value=""></option>
                                        @foreach ($certificates as $certificate)
                                            <option value="{{ $certificate->id }}">
                                                {{ $certificate->certificates_name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="modalCertificertificates_id">التحصيل الدراسي</label>
                                </div>
                                @error('certificates_id')
                                    <small class='text-danger inputerror'>{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 col" dir="rtl">
                                <div class="form-floating form-floating-outline">
                                    <select wire:model.defer='graduations_id' id="editCertifigraduations_id"
                                        class="form-select @error('graduations_id') is-invalid is-filled @enderror">
                                        <option value=""></option>
                                        @foreach ($graduations as $graduation)
                                            <option value="{{ $graduation->id }}">
                                                {{ $graduation->graduations_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="modalCertifigraduations_id">جهة التخرج</label>
                                </div>
                                @error('graduations_id')
                                    <small class='text-danger inputerror'>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div Class="row">
                            <div class="mb-3 col-3">
                                <div class="form-floating form-floating-outline">
                                    <select wire:model.defer='specialization_id' id="editCertifispecialization_id"
                                        class="form-select @error('specialization_id') is-invalid is-filled @enderror">
                                        <option value=""></option>
                                        @foreach ($specializations as $specialization)
                                            <option value="{{ $specialization->id }}">
                                                {{ $specialization->specializations_name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="modalCertifispecialization_id">التخصص</label>
                                </div>
                                @error('specialization_id')
                                    <small class='text-danger inputerror'>{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    @php
                                        $startYear = 1950; // Change this to your desired start year
                                        $currentYear = date('Y');
                                    @endphp
                                    <select wire:model.defer='graduation_year' id="modalCertificgraduation_year"
                                        class="form-select @error('graduation_year') is-invalid is-filled @enderror" name="year">
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
                                    <select wire:model.defer='specializationclassification_id'
                                        id="editCertifispecializationclassification_id"
                                        class="form-select @error('specializationclassification_id') is-invalid is-filled @enderror">
                                        <option value=""></option>
                                        @foreach ($specializationclassification as $specializationclassificatio)
                                            <option value="{{ $specializationclassificatio->id }}">
                                                {{ $specializationclassificatio->specializationclassification_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="modalCertifispecializationclassification_id">تصنيف التخصص</label>
                                </div>
                                @error('specializationclassification_id')
                                    <small class='text-danger inputerror'>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div Class="row">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <select wire:model.defer='specialtys_id' id="editCertifispecialtys_id"
                                        class="form-select @error('specialtys_id') is-invalid is-filled @enderror">
                                        <option value=""></option>
                                        @foreach ($specialtys as $specialty)
                                            <option value="{{ $specialty->id }}">{{ $specialty->specialtys_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="modalCertifispecialtys_id">التخصص العام</label>
                                </div>
                                @error('specialtys_id')
                                    <small class='text-danger inputerror'>{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <select wire:model.defer='precises_id' id="editCertifiprecises_id"
                                        class="form-select @error('precises_id') is-invalid is-filled @enderror">
                                        <option value=""></option>
                                        @foreach ($precises as $precise)
                                            <option value="{{ $precise->id }}">{{ $precise->precises_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="modalCertifiprecises_id">التخصص الدقيق</label>
                                </div>
                                @error('precises_id')
                                    <small class='text-danger inputerror'>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div Class="row">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.lazy='grade' type="number" id="modalCertificgrade"
                                        placeholder="الدرجة"
                                        class="form-control @error('grade') is-invalid is-filled @enderror"
                                        min="50" max="100" step="1" inputmode="numeric"
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

                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <select wire:model.defer='duration'
                                        id="modalcertifiduration" {{ $isDisabled ? 'disabled' : '' }}
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
                        </div>

                        <div Class="row">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='issuing_country' type="text"
                                        id="modalcertifiissuing_country" placeholder="البلد المانح للشهادة"
                                        class="form-control @error('issuing_country') is-invalid is-filled @enderror" />
                                    <label for="modalcertifiissuing_country">البلد المانح للشهادة</label>
                                </div>
                                @error('issuing_country')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>

                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='notes' type="text" id="modalcertifinotes"
                                        placeholder="الملاحظات"
                                        class="form-control @error('notes') is-invalid is-filled @enderror" />
                                    <label for="modalcertifinotes">الملاحظات</label>
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
                    </form>
                </div>
            </div>
            <hr class="my-0">
            <div class="text-center col-12 demo-vertical-spacing mb-n4">
                <button wire:click='update' wire:loading.attr="disabled" type="button"
                    class="btn btn-primary me-sm-3 me-1">تعديل</button>
                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                    aria-label="Close">تجاهل</button>
            </div>
            </form>
        </div>
    </div>
</div> --}}
<!--/ Edite certifi Modal -->

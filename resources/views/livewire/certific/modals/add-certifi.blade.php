<!-- Add Certifi Modal -->
<div wire:ignore.self class="modal fade" id="addcertifiModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">اضافة </h3>
                    <p>نافذة الأضافة </p>
                </div>
                <hr class="mt-n2">
                <form id="addcertifiModalForm" autocomplete="off">
                    <div class="row row-cols-1  ">
                        <div class="col mb-3">
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <div class="form-floating form-floating-outline @error('worker') is-invalid is-filled @enderror" style="width: 100%">
                                        <select wire:model='worker' id="worker" class="form-select" placeholder='حدد العملية'>
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
                                        <input wire:model.defer='calculator_number' type="text" id="modalEmployeecalculator_number" placeholder="رقم الحاسبة" class="form-control @error('calculator_number') is-invalid is-filled @enderror" disabled />
                                        <label for="modalEmployeecalculator_number">رقم الحاسبة</label>
                                    </div>
                                    @error('calculator_number')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col-6">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='department' type="text" id="modalEmployeedepartment" placeholder="اسم القسم" class="form-control @error('department') is-invalid is-filled @enderror" disabled />
                                        <label for="modalEmployeedepartment">اسم القسم  </label>
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
                                        <input wire:model.defer='document_date' type="date"
                                            id="modalCertificdocument_date" placeholder="تاريخ الوثيقة"
                                            class="form-control @error('document_date') is-invalid is-filled @enderror" />
                                        <label for="modalCertificdocument_date">تاريخ الوثيقة</label>
                                    </div>
                                    @error('document_date')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='certificate_name' type="text"
                                            id="modalCertificcertificate_name" placeholder="الشهادة"
                                            class="form-control @error('certificate_name') is-invalid is-filled @enderror" />
                                        <label for="modalCertificcertificate_name">الشهادة</label>
                                    </div>
                                    @error('certificate_name')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                            <div Class="row">
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
                                        <input wire:model.defer='authenticity_date' type="date"
                                            id="modalCertificauthenticity_date" placeholder="تاريخ صحة الصدور"
                                            class="form-control @error('authenticity_date') is-invalid is-filled @enderror" />
                                        <label for="modalCertificauthenticity_date">تاريخ صحة الصدور</label>
                                    </div>
                                    @error('authenticity_date')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <select wire:model.defer='educational_attainment'
                                            id="modalCertificeducational_attainment"
                                            class="form-select @error('educational_attainment') is-invalid @enderror">
                                            <option value="" disabled selected>اختر التحصيل الدراسي</option>
                                            <option value="امي">امي</option>
                                            <option value="يقرا فقط">يقرا فقط</option>
                                            <option value="يقرا ويكتب">يقرا ويكتب</option>
                                            <option value="ابتدائية">ابتدائية</option>
                                            <option value="متوسطة">متوسطة</option>
                                            <option value="اعدادية">اعدادية</option>
                                            <option value="دبلوم">دبلوم</option>
                                            <option value="بكالوريوس">بكالوريوس</option>
                                            <option value="دبلوم عالي">دبلوم عالي</option>
                                            <option value="ماجستير">ماجستير</option>
                                            <option value="دكتوراه">دكتوراه</option>
                                            <option value="اعلى شهادة اختصاص">اعلى شهادة اختصاص</option>
                                            <option value="غير مبين">غير مبين</option>
                                            <option value="محو الامية">محو الامية</option>
                                        </select>
                                        <label for="modalCertificeducational_attainment">تحصيل الدراسي</label>
                                    </div>
                                    @error('educational_attainment')
                                    <small class='text-danger'>{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                            <div Class="row">
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='college_name' type="text"
                                            id="modalCertificcollege_name" placeholder="اسم الكلية"
                                            class="form-control @error('college_name') is-invalid is-filled @enderror" />
                                        <label for="modalCertificcollege_name">اسم الكلية</label>
                                    </div>
                                    @error('college_name')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='department_name' type="text"
                                            id="modalCertificdepartment_name" placeholder="القسم الدراسي"
                                            class="form-control @error('department_name') is-invalid is-filled @enderror" />
                                        <label for="modalCertificdepartment_name">القسم الدراسي</label>
                                    </div>
                                    @error('department_name')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='specialization' type="text"
                                            id="modalCertificspecialization" placeholder="التخصص"
                                            class="form-control @error('specialization') is-invalid is-filled @enderror" />
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
                                        <input wire:model.defer='graduation_year' type="text"
                                            id="modalCertificgraduation_year" placeholder="سنة التخرج"
                                            class="form-control @error('graduation_year') is-invalid is-filled @enderror" />
                                        <label for="modalCertificgraduation_year">سنة التخرج</label>
                                    </div>
                                    @error('graduation_year')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='grade' type="text" id="modalCertificgrade"
                                            placeholder="التقدير والدرجة"
                                            class="form-control @error('grade') is-invalid is-filled @enderror" />
                                        <label for="modalCertificgrade">التقدير والدرجة</label>
                                    </div>
                                    @error('grade')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

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
                            </div>
                            <div Class="row">
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
                                        <input wire:model.defer='status' type="checkbox"
                                            id="modalHolidaystatus" placeholder="الحالة"
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
<!--/ Add Certifi Modal -->

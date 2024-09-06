<!-- Edite Certifi Modal -->
<div wire:ignore.self class="modal fade" id="editcertifiModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل</h3>
                    <p>نافذة التعديل</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetCertifi"
                    wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حفظ البيانات...</h5>

                <div wire:loading.remove>
                    <form id="editCertifiModalForm" autocomplete="off">
                        <div class="row row-cols-1">
                            <div class="col mb-3">
                                <div Class="row">

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='user_id' type="text" id="modalCertifiuser_id"
                                                placeholder="رقم المستخدم"
                                                class="form-control @error('user_id') is-invalid is-filled @enderror" />
                                            <label for="modalCertifiuser_id">رقم المستخدم</label>
                                        </div>
                                        @error('user_id')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='calculator_number' type="text"
                                                id="modalCertificalculator_number" placeholder="رقم الحاسبة"
                                                class="form-control @error('calculator_number') is-invalid is-filled @enderror" />
                                            <label for="modalCertificalculator_number">رقم الحاسبة</label>
                                        </div>
                                        @error('calculator_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='document_number' type="text"
                                                id="modalCertifidocument_number" placeholder="رقم الوثيقة"
                                                class="form-control @error('document_number') is-invalid is-filled @enderror" />
                                            <label for="modalCertifidocument_number">رقم الوثيقة</label>
                                        </div>
                                        @error('document_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='document_date' type="date"
                                                id="modalCertifidocument_date" placeholder="تاريخ الوثيقة"
                                                class="form-control @error('document_date') is-invalid is-filled @enderror" />
                                            <label for="modalCertifidocument_date">تاريخ الوثيقة</label>
                                        </div>
                                        @error('document_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='certificate_name' type="text"
                                                id="modalCertificertificate_name" placeholder="الشهادة"
                                                class="form-control @error('certificate_name') is-invalid is-filled @enderror" />
                                            <label for="modalCertificertificate_name">الشهادة</label>
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
                                                id="modalCertifiauthenticity_number" placeholder="رقم صحة الصدور"
                                                class="form-control @error('authenticity_number') is-invalid is-filled @enderror" />
                                            <label for="modalCertifiauthenticity_number">رقم صحة الصدور</label>
                                        </div>
                                        @error('authenticity_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='authenticity_date' type="date"
                                                id="modalCertifiauthenticity_date" placeholder="تاريخ صحة الصدور"
                                                class="form-control @error('authenticity_date') is-invalid is-filled @enderror" />
                                            <label for="modalCertifiauthenticity_date">تاريخ صحة الصدور</label>
                                        </div>
                                        @error('authenticity_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='educational_attainment' type="text"
                                                id="modalCertifieducational_attainment" placeholder="تحصيل الدراسي"
                                                class="form-control @error('educational_attainment') is-invalid is-filled @enderror" />
                                            <label for="modalCertifieducational_attainment">تحصيل الدراسي</label>
                                        </div>
                                        @error('educational_attainment')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='college_name' type="text"
                                                id="modalCertificollege_name" placeholder="اسم الكلية"
                                                class="form-control @error('college_name') is-invalid is-filled @enderror" />
                                            <label for="modalCertificollege_name">اسم الكلية</label>
                                        </div>
                                        @error('college_name')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='department_name' type="text"
                                                id="modalCertifidepartment_name" placeholder="القسم الدراسي"
                                                class="form-control @error('department_name') is-invalid is-filled @enderror" />
                                            <label for="modalCertifidepartment_name">القسم الدراسي</label>
                                        </div>
                                        @error('department_name')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='specialization' type="text"
                                                id="modalCertifispecialization" placeholder="التخصص"
                                                class="form-control @error('specialization') is-invalid is-filled @enderror" />
                                            <label for="modalCertifispecialization">التخصص</label>
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
                                                id="modalCertifigraduation_year" placeholder="سنة التخرج"
                                                class="form-control @error('graduation_year') is-invalid is-filled @enderror" />
                                            <label for="modalCertifigraduation_year">سنة التخرج</label>
                                        </div>
                                        @error('graduation_year')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='grade' type="text" id="modalCertifigrade"
                                                placeholder="التقدير والدرجة"
                                                class="form-control @error('grade') is-invalid is-filled @enderror" />
                                            <label for="modalCertifigrade">التقدير والدرجة</label>
                                        </div>
                                        @error('grade')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='issuing_country' type="text"
                                                id="modalCertifiissuing_country" placeholder="البلد المانح للشهادة"
                                                class="form-control @error('issuing_country') is-invalid is-filled @enderror" />
                                            <label for="modalCertifiissuing_country">البلد المانح للشهادة</label>
                                        </div>
                                        @error('issuing_country')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='notes' type="text" id="modalCertifinotes"
                                                placeholder="الملاحظات"
                                                class="form-control @error('notes') is-invalid is-filled @enderror" />
                                            <label for="modalCertifinotes">الملاحظات</label>
                                        </div>
                                        @error('notes')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='status' type="text" id="modalCertifistatus"
                                                placeholder="الحالة"
                                                class="form-control @error('status') is-invalid is-filled @enderror" />
                                            <label for="modalCertifistatus">الحالة</label>
                                        </div>
                                        @error('status')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

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
<!--/ Edite Certifi Modal -->

<!-- Remove certifi Modal -->
<div wire:ignore.self class="modal fade" id="removebrancModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">حذف الشهادات</h3>
                    <p>نافذة الحذف</p>
                </div>

                <hr class="mt-n2">

                <h5 wire:loading wire:target="Getcertifi" wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="destroy" wire:loading.class="d-flex justify-content-center text-primary">جار حفظ البيانات...</h5>

                <div wire:loading.remove wire:target="Getcertifi, destroy">
                    <form id="editcertifiModalForm" autocomplete="off">
                        <div class="row bg-label-danger">
                            <div class="col">
                                <label class="border-bottom-2 text-center mb-2 w-100">اسم الموظف</label>
                                <div wire:loading wire:target='AddCertifyModal'
                                    wire:loading.class="d-flex justify-content-center">
                                    <span class="mdi mdi-loading mdi-spin mdi-24px"></span>
                                </div>
                                <div wire:loading.remove wire:target='AddCertifyModal' class="text-center">
                                    {{ $Worker->full_name ?? '' }}
                                </div>
                            </div>

                            <div class="col">
                                <label class="border-bottom-2 text-center mb-2 w-100">رقم الحاسبة</label>
                                <div wire:loading wire:target='AddCertifyModal'
                                    wire:loading.class="d-flex justify-content-center">
                                    <span class="mdi mdi-loading mdi-spin mdi-24px"></span>
                                </div>
                                <div wire:loading.remove wire:target='AddCertifyModal' class="text-center">
                                    {{ $Worker->calculator_number ?? '' }}
                                </div>
                            </div>
                        </div>

                        <hr class="">

                        <div Class="row">
                            <div class="col mb-3">
                                <div class="text-center">
                                    <label class="text-danger border-bottom-2 text-center w-100">رقم الوثيقة</label>
                                    <div>{{ $document_number }}</div>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="text-center">
                                    <label class="text-danger border-bottom-2 text-center w-100">تاريخ الوثيقة</label>
                                    <div>{{ $document_date }}</div>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="text-center">
                                    <label class="text-danger border-bottom-2 text-center w-100">رقم صحة الصدور</label>
                                    <div>{{ $authenticity_number }}</div>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="text-center">
                                    <label class="text-danger border-bottom-2 text-center w-100">تاريخ صحة الصدور</label>
                                    <div>{{ $authenticity_date }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <div class="text-center">
                                    <label class="text-danger border-bottom-2 text-center w-100">التحصيل الدراسي</label>
                                    <div>{{ $certifi ? $certifi->Getcertificate->certificates_name:'' }}</div>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="text-center">
                                    <label class="text-danger border-bottom-2 text-center w-100">جهة التخرج</label>
                                    <div>{{ $certifi ? $certifi->Getgraduation->graduations_name:'' }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <div class="text-center">
                                    <label class="text-danger border-bottom-2 text-center w-100">التخصص</label>
                                    <div>{{ $certifi ? $certifi->Getspecialization->specializations_name:'' }}</div>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="text-center">
                                    <label class="text-danger border-bottom-2 text-center w-100">سنوات التخرج</label>
                                    <div>{{ $graduation_year - 1 }} - {{ $graduation_year }} </div>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="text-center">
                                    <label class="text-danger border-bottom-2 text-center w-100">تصنيف التخصص</label>
                                    <div>{{ $certifi ? $certifi->Getspecializationclassificatio->specializationclassification_name:'' }} </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <div class="text-center">
                                    <label class="text-danger border-bottom-2 text-center w-100">التخصص العام</label>
                                    <div>{{ $certifi ? $certifi->Getspecialty->specialtys_name:'' }} </div>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="text-center">
                                    <label class="text-danger border-bottom-2 text-center w-100">التخصص الدقيق</label>
                                    <div>{{ $certifi ? $certifi->Getprecise->precises_name:'' }} </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <div class="text-center">
                                    <label class="text-danger border-bottom-2 text-center w-100">الدرجة</label>
                                    <div>{{ $grade }} </div>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="text-center">
                                    <label class="text-danger border-bottom-2 text-center w-100">التقدير</label>
                                    <div>{{ $estimate }} </div>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="text-center">
                                    <label class="text-danger border-bottom-2 text-center w-100">اختر مدة القدم</label>
                                    <div>{{ $duration }} </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <div class="text-center">
                                    <label class="text-danger border-bottom-2 text-center w-100">البلد المانح للشهادة</label>
                                    <div>{{ $issuing_country }} </div>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="text-center">
                                    <label class="text-danger border-bottom-2 text-center w-100">الملاحظات</label>
                                    <div>{{ $notes }} </div>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="text-center">
                                    <label class="text-danger border-bottom-2 text-center w-100">الحالة</label>
                                    <div>{{ $status }} </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <hr class="my-0">
            <div class="text-center col-12 demo-vertical-spacing mb-n4">
                <button wire:click='destroy' wire:loading.attr="disabled" type="button"
                    class="btn btn-danger me-sm-3 me-1">حــذف</button>
                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                    aria-label="Close">تجاهل</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--/ Delete certifi Modal -->

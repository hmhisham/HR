<div wire:ignore.self class="modal fade" id="uploadFilesModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-show-files">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="modal-title" id="exampleModalLabel">رفع المستندات</h5> --}}
                <h3 class="pb-1 mb-2">رفع اوليات المعاملة</h3>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <div class="modal-body">
                <div class="alert alert-outline-secondary pb-0 border-2" role="alert">
                    <h5 class="d-flex justify-content-around">
                        <div>
                            <strong>رقم واسم المقاطعة : </strong>
                            <span class="text-danger">
                                {{ $province_number ?? '' }} -
                                {{ $province_name ?? '' }}
                            </span>
                        </div>
                        <div>
                            <strong>رقم القطعة : </strong>
                            <span class="text-danger">{{ $plot_number ?? '' }}</span>
                        </div>
                        <div>
                            <strong>رقم العقار : </strong>
                            <span class="text-danger">{{ $Realitie->property_number ?? '' }}</span>
                        </div>

                    </h5>

                    <hr>

                    <h5 class="d-flex justify-content-around">

                        <div>
                            <strong>أسم المشتري : </strong>
                            <span class="text-danger">
                                {{ $buyer_tenant_name ?? '' }}
                            </span>
                        </div>
                        <div>
                            <strong>رقم الحاسبة : </strong>
                            <span class="text-danger">
                                {{ $buyer_calculator_number ?? '' }}
                            </span>
                        </div>
                    </h5>
                </div>

                {{--  <div class="alert alert-outline-secondary pb-0 border-2" role="alert">
                    <h5 class="d-flex justify-content-around">
                        <div>
                            <strong>أسم المشتري : </strong>
                            <span class="text-danger">
                                {{ $buyer_tenant_name ?? '' }}
                            </span>
                        </div>
                        <div>
                            <strong>رقم الحاسبة : </strong>
                            <span class="text-danger">
                                {{ $buyer_calculator_number ?? '' }}
                            </span>
                        </div>
                    </h5>
                </div> --}}

                <form wire:submit.prevent="saveFiles">
                    <div class="row g-3">
                        @php
                            $fileFields = [
                                'valuation_report_file' => 'محضر التثمين',
                                'buyer_documents_file' => 'مستمسكات المشتري',
                                'basra_municipality_statement_file' => 'بيان عدم استفادة البلدية والبلديات البصرة',
                                'governorate_municipality_statement_file' =>
                                    'بيان عدم استفادة البلدية والبلديات مسقط الراس',
                                'written_pledge_file' => 'الإقرار الخطي',
                                'company_deed_25_file' => 'السند العقاري 25 للشركة',
                                'official_gazette_file' => 'اعلان الجريدة الرسمية',
                                'bidder_deposits_file' => 'وصولات تأمينات المزايدين 5%',
                                'sales_committee_minutes_file' => 'محضر لجنة البيع',
                                'payment_receipt_2_percent_file' => 'وصل التسديد 2 %',
                                'property_registration_letter_file' => 'كتاب تسجيل عقار الى التسجيل العقاري',
                                'buyer_deed_23_file' => 'السند العقاري 23 باسم المشتري',
                            ];
                        @endphp

                        @foreach ($fileFields as $field => $label)
                            <div class="col-md-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="form-floating form-floating-outline mb-2">
                                            <div class="d-flex align-items-center mb-2">
                                                @if ($BuyerTenant->{$field} ?? false)
                                                    <a href="{{ asset('storage/Realities/' . $province_number . '/' . $plot_number . '/' . $Realitie->property_number . '/' . $BuyerTenant->{$field}) }}"
                                                        target="_blank" class="btn btn-sm btn-outline-primary me-2">
                                                        <i class="mdi mdi-file-document"></i> عرض الملف الحالي
                                                    </a>
                                                @endif
                                                <div class="form-floating form-floating-outline">
                                                    <input wire:model="{{ $field }}" type="file"
                                                        id="{{ $field }}" accept=".jpeg,.png,.jpg,.pdf"
                                                        class="form-control @error($field) is-invalid is-filled @enderror"
                                                        ondragover="event.preventDefault()"
                                                        ondrop="handleDrop(event, this)">
                                                    <label for="{{ $field }}">{{ $label }}</label>
                                                    @if (${$field})
                                                        <span
                                                            class="input-group-text bg-success position-absolute end-0 top-0 h-100">
                                                            <i class="mdi mdi-check-circle text-white"></i>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            @error($field)
                                                <small class='text-danger inputerror'>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-primary">حفظ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

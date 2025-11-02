<!-- Edit Contract Modal -->
<div wire:ignore.self class="modal fade" id="editContractModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-fullscreen">
    <div class="modal-content h-100">
      <div class="px-4 py-3 modal-header bg-light">
        <h5 class="modal-title d-flex align-items-center">
          <i class="mdi mdi-file-document-edit-outline text-primary me-2"></i>
          تعديل العقد
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="p-4 modal-body d-flex flex-column">
        <form id="editcontractModalForm" autocomplete="off" class="d-flex flex-column flex-grow-1">
          <div class="row g-3 flex-grow-1">

            <div class="col-lg-7 d-flex flex-column">
              <div class="border-0 shadow-sm card flex-grow-1">
                <div class="p-3 card-body d-flex flex-column">
                  <div class="row g-1 flex-grow-1">
                    <div class="row g-2">

                      <div class="mb-2 col">
                        <div class="form-floating form-floating-outline">
                          <input wire:model.defer='document_contract_number' type="text" id="addContractdocument_contract_number" placeholder="رقم العقد في المستند" class="form-control @error('document_contract_number') is-invalid is-filled @enderror" />
                          <label for="addContractdocument_contract_number">رقم العقد في
                            المستند</label>
                        </div>
                        @error('document_contract_number')
                        <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                      </div>
                      <div class="mb-2 col">
                        <div class="form-floating form-floating-outline">
                          <select wire:model.defer="tenant_name" id="addContracttenant_name" class="form-select select2 @error('tenant_name') is-invalid is-filled @enderror" data-placeholder="اختيار اسم المستأجر" data-allow-clear="true" data-dropdown-parent="#addcontractModal">
                            <option value="">اختيار اسم المستأجر</option>
                            @if (isset($tenants) && count($tenants) > 0)
                            @foreach ($tenants as $tenantsnew)
                            <option value="{{ $tenantsnew->id }}">
                              {{ $tenantsnew->name }}
                            </option>
                            @endforeach
                            @else
                            <option value="" disabled>لا توجد بيانات متاحة
                            </option>
                            @endif
                          </select>
                          {{-- <label for="addContracttenant_name">اسم المستأجر</label> --}}
                        </div>
                        @error('tenant_name')
                        <small class='text-danger inputerror'>{ $message }</small>
                        @enderror
                      </div>
                    </div>
                    <div class="row g-2">
                      <div class="mb-2 col">
                        <div class="form-floating form-floating-outline">
                          <input wire:model.defer='start_date' type="text" id="addContractstart_date" placeholder="تاريخ بداية العقد" class="form-control flatpickr @error('start_date') is-invalid is-filled @enderror" />
                          <label for="addContractstart_date">تاريخ بداية العقد</label>
                        </div>
                        @error('start_date')
                        <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                      </div>
                      <div class="mb-2 col">
                        <div class="form-floating form-floating-outline">
                          <input wire:model.defer='approval_date' type="text" id="addContractapproval_date" placeholder="تاريخ المصادقة على العقد" class="form-control flatpickr @error('approval_date') is-invalid is-filled @enderror" />
                          <label for="addContractapproval_date">تاريخ المصادقة على
                            العقد</label>
                        </div>
                        @error('approval_date')
                        <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                      </div>
                      <div class="mb-2 col">
                        <div class="form-floating form-floating-outline">
                          <input wire:model.defer='end_date' type="text" id="addContractend_date" placeholder="تاريخ انتهاء العقد" class="form-control flatpickr @error('end_date') is-invalid is-filled @enderror" />
                          <label for="addContractend_date">تاريخ انتهاء العقد</label>
                        </div>
                        @error('end_date')
                        <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                      </div>
                    </div>
                    <div class="row g-2">

                      <div class="mb-2 col">
                        <div class="form-floating form-floating-outline">
                          <input wire:model.defer='annual_rent_amount'
                                 type="text"
                                 id="addContractannual_rent_amount"
                                 placeholder="مبلغ التأجير للسنة الواحدة"
                                 class="form-control @error('annual_rent_amount') is-invalid is-filled @enderror"
                                 oninput="formatNumber(this)" />
                          <label for="addContractannual_rent_amount">مبلغ التأجير للسنة
                            الواحدة</label>
                        </div>
                        @error('annual_rent_amount')
                        <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                      </div>

                     <div class="mb-2 col">
                        <div class="form-floating form-floating-outline">
                          <input wire:model.defer='lease_duration' type="number" id="addContractlease_duration" placeholder="مدة الإيجار" class="form-control @error('lease_duration') is-invalid is-filled @enderror"   />
                          <label for="addContractlease_duration">مدة الإيجار (سنوات)</label>
                        </div>
                        @error('lease_duration')
                        <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                      </div>


                        <div class="mb-2 col">
                        <div class="form-floating form-floating-outline">
                          <div class="usage-type-wrapper position-relative">
                            <select wire:model.defer="usage_type" id="editContractUsageTypeUnique" class="form-select usage-type-select @error('usage_type') is-invalid @enderror @if($usage_type) is-filled @endif" data-placeholder="اختيار نوع الاستغلال">
                              <option value="">اختيار نوع الاستغلال</option>
                              @if (isset($propertyTypes) && count($propertyTypes) > 0)
                              @foreach ($propertyTypes as $propertyType)
                              <option value="{{ $propertyType->id }}" @if($usage_type == $propertyType->id) selected @endif>
                                {{ $propertyType->type_name }}
                              </option>
                              @endforeach
                              @else
                              <option value="" disabled>لا توجد بيانات متاحة
                              </option>
                              @endif
                            </select>
                            <div class="usage-type-dropdown" id="editUsageTypeDropdown" style="display: none;">
                              <div class="usage-type-search">
                                <input type="text" id="editUsageTypeSearch" placeholder="البحث..." class="form-control form-control-sm">
                              </div>
                            <div class="usage-type-options" id="editUsageTypeOptions">
                                @if (isset($propertyTypes) && count($propertyTypes) > 0)
                                @foreach ($propertyTypes as $propertyType)
                                <div class="usage-type-option" data-value="{{ $propertyType->id }}">
                                  {{ $propertyType->type_name }}
                                </div>
                               @endforeach
                               @endif
                             </div>
                            </div>
                          </div>
                          {{-- <label for="editContractUsageTypeUnique">نوع الاستغلال</label> --}}
                         </div>
                        @error('usage_type')
                        <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                      </div>
                    </div>
                    <div class="row g-2">

                      <div class="mb-2 col">
                        <div class="form-floating form-floating-outline">
                          <input wire:model.defer='notes' type="text" id="addContractnotes" placeholder="الملاحظات" class="form-control @error('notes') is-invalid is-filled @enderror" />
                          <label for="addContractnotes">الملاحظات</label>
                        </div>
                        @error('notes')
                        <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-5 d-flex flex-column">
              <div class="border-0 shadow-sm card flex-grow-1">
                <div class="px-3 py-2 border-0 card-header bg-light">
                  <h6 class="mb-0 card-title d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-file-pdf-box text-danger me-2 fs-6"></i>
                    <span>الملف</span>
                  </h6>
                </div>
                <div class="p-2 card-body d-flex flex-column">
                  <div wire:loading.remove wire:target="file" class="flex-grow-1 d-flex flex-column">
                    @if ($file)
                    <!-- عرض الملف الجديد المحدد -->
                    <div class="p-2 border rounded-3 bg-light flex-grow-1 d-flex flex-column">
                      <div class="mb-2 text-center">
                        <span class="px-2 py-1 text-success bg-success-subtle rounded-pill fw-bold small">
                          <i class="mdi mdi-check-circle me-1"></i>ملف جديد محدد للرفع
                        </span>
                      </div>
                      @if (!is_string($file))
                      <div class="pdf-preview-container flex-grow-1 d-flex flex-column">
                        <div class="overflow-hidden bg-white border shadow-sm rounded-3 flex-grow-1">
                          @if ($filePreviewPath)
                          <embed src="{{ asset('storage/' . $filePreviewPath) }}" type="application/pdf" width="100%" height="100%" style="border-radius: 6px;">
                          @else
                          <div class="p-2 text-muted">
                            لا يمكن إنشاء رابط معاينة مؤقت على هذا القرص.
                          </div>
                          @endif
                        </div>
                        <div class="mt-2 text-center">
                          <small class="mb-1 text-muted d-block">
                            <i class="mdi mdi-file-pdf-box text-danger me-1"></i>
                            معاينة الملف الجديد
                          </small>
                        </div>
                      </div>
                      @else
                      <div class="p-2 text-center">
                        <i class="mdi mdi-file-pdf-box text-danger fs-1"></i>
                        <p class="mt-2 text-muted">تم اختيار ملف جديد</p>
                      </div>
                      @endif
                      <div class="mt-2 d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                          <i class="mdi mdi-file-outline me-1"></i>
                          {{ $file->getClientOriginalName() }}
                        </small>
                        <button type="button" wire:click="$set('file', null)" class="btn btn-sm btn-outline-danger" title="إلغاء الملف الجديد">
                          <i class="mdi mdi-close"></i>
                        </button>
                      </div>
                    </div>
                    @elseif($Contract && $Contract->file)
                    <!-- عرض الملف الحالي مع خيارات الاستبدال -->
                    <div class="p-2 border rounded-3 bg-light flex-grow-1 d-flex flex-column">
                      <div class="mb-2 text-center">
                        <span class="px-2 py-1 text-info bg-info-subtle rounded-pill fw-bold small">
                          <i class="mdi mdi-file-check me-1"></i>الملف الحالي
                        </span>
                      </div>
                      <div class="pdf-preview-container flex-grow-1 d-flex flex-column">
                        <div class="overflow-hidden bg-white border shadow-sm rounded-3 flex-grow-1">
                          <embed src="{{ asset('storage/' . $Contract->file) }}" type="application/pdf" width="100%" height="100%" style="border-radius: 6px;">
                        </div>
                        <div class="mt-2 text-center">
                          <small class="mb-1 text-muted d-block">
                            <i class="mdi mdi-file-pdf-box text-danger me-1"></i>
                            معاينة الملف الحالي
                          </small>
                        </div>
                      </div>
                      <div class="mt-2 d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                          <i class="mdi mdi-file-outline me-1"></i>
                          {{ basename($Contract->file) }}
                        </small>
                        <div class="gap-1 d-flex">
                          <a href="{{ asset('storage/' . $Contract->file) }}" target="_blank" class="btn btn-sm btn-outline-primary" title="عرض الملف">
                            <i class="mdi mdi-eye"></i>
                          </a>
                          <a href="{{ asset('storage/' . $Contract->file) }}" download class="btn btn-sm btn-outline-success" title="تحميل الملف">
                            <i class="mdi mdi-download"></i>
                          </a>
                          <label for="editContractFileReplace" class="mb-0 btn btn-sm btn-outline-warning" style="cursor: pointer;" title="استبدال الملف">
                            <i class="mdi mdi-file-replace"></i>
                          </label>
                          <button type="button" wire:click="removeFile" class="btn btn-sm btn-outline-danger" title="حذف الملف" onclick="return confirm('هل أنت متأكد من حذف الملف؟')">
                            <i class="mdi mdi-delete"></i>
                          </button>
                        </div>
                      </div>
                      <!-- منطقة استبدال الملف -->
                      <div class="p-3 mt-3 border bg-warning-subtle rounded-3 border-warning">
                        <div class="text-center">
                          <i class="mdi mdi-file-replace text-warning" style="font-size: 1.5rem;"></i>
                          <p class="mb-2 text-muted small">لاستبدال الملف الحالي، اختر ملف جديد</p>
                          <label for="editContractFileReplace" class="btn btn-sm btn-warning rounded-pill" style="cursor: pointer;">
                            <i class="mdi mdi-cloud-upload me-1"></i>اختيار ملف جديد
                          </label>
                        </div>
                      </div>
                    </div>
                    @else
                    <!-- عرض منطقة رفع ملف جديد -->
                    <label for="editContractFileReplace" class="w-100 d-flex align-items-center justify-content-center upload-label flex-grow-1" style="cursor: pointer;">
                      <div class="border-2 border-dashed upload-container rounded-3 w-100 h-100 d-flex align-items-center justify-content-center position-relative" style="transition: all 0.3s ease; border-color: #dee2e6; min-height: 200px;" onmouseover="this.style.borderColor='#007bff'; this.style.backgroundColor='rgba(0,123,255,0.05)'" onmouseout="this.style.borderColor='#dee2e6'; this.style.backgroundColor='transparent'">
                        <div class="p-3 text-center upload-content">
                          <div class="mb-2 upload-icon">
                            <i class="mdi mdi-cloud-upload text-primary" style="font-size: 3rem; opacity: 0.8;"></i>
                          </div>
                          <h6 class="mb-1 text-dark fw-bold fs-6">رفع ملف</h6>
                          <span class="px-2 py-1 mb-1 badge bg-danger-subtle text-danger rounded-pill d-inline-block small">
                            <i class="mdi mdi-alert-circle me-1"></i>PDF فقط
                          </span>
                          <p class="mt-1 text-muted small">الحد الأقصى: 10 ميجابايت</p>
                        </div>
                      </div>
                    </label>
                    @endif
                  </div>
                  {{-- <div wire:loading wire:target="file" class="p-4 text-center d-flex flex-column justify-content-center align-items-center">
                    <div class="mb-2 spinner-border text-primary" role="status"></div>
                    <p class="mb-0 text-muted small">جارٍ رفع الملف...</p>
                  </div> --}}
                  <div class="mt-2">
                    <!-- حقل رفع الملف المخفي -->
                    <input wire:model="file" type="file" id="editContractFileReplace" class="d-none" accept="application/pdf" />

                    <!-- عرض رسائل الخطأ -->
                    @error('file')
                    <div class="p-2 mt-2 border-0 shadow-sm alert alert-danger rounded-3">
                      <div class="d-flex align-items-center small">
                        <i class="mdi mdi-alert-circle me-2 fs-6"></i>
                        <span>{{ $message }}</span>
                      </div>
                    </div>
                    @enderror
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="px-4 py-3 modal-footer bg-light">
        <div class="gap-2 d-flex w-100 justify-content-center">
          <button wire:click='update' wire:loading.attr="disabled" type="button" class="px-4 py-2 shadow-sm btn btn-primary rounded-pill">
            <span wire:loading.remove wire:target="update">
              <i class="mdi mdi-content-save-outline me-2"></i>حفظ التعديلات
            </span>
            <span wire:loading wire:target="update">
              <span class="spinner-border spinner-border-sm me-2" role="status"></span>
              جارٍ الحفظ...
            </span>
          </button>
          <button type="button" class="px-4 py-2 btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">
            <i class="mdi mdi-close-circle-outline me-2"></i>إلغاء العملية
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Edit Contract Modal -->

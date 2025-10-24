<!-- Add Contract Modal -->
<div wire:ignore.self class="modal fade" id="addcontractModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="px-4 py-3 modal-header bg-light">
        <h5 class="modal-title d-flex align-items-center">
          <i class="mdi mdi-plus-circle-outline text-primary me-2"></i>
          إضافة عقد
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="p-4 modal-body">
        <form id="addcontractModalForm" autocomplete="off">
          <div class="row g-3">
            <div class="col-lg-7">
              <div class="border-0 shadow-sm card h-100">
                <div class="p-3 card-body">
                  <div class="row g-1">
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
                          <input wire:model.defer='lease_duration' type="number" id="addContractlease_duration" placeholder="مدة الإيجار" class="form-control @error('lease_duration') is-invalid is-filled @enderror" min="1" max="30" />
                          <label for="addContractlease_duration">مدة الإيجار (سنوات)</label>
                        </div>
                        @error('lease_duration')
                        <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                      </div>


                        <div class="mb-2 col">
                        <div class="form-floating form-floating-outline">
                          <input wire:model.defer='usage_type' type="text" id="addContractusage_type" placeholder="نوع الاستغلال" class="form-control @error('usage_type') is-invalid is-filled @enderror" />
                          <label for="addContractusage_type">نوع الاستغلال</label>
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
            <div class="col-lg-5">
              <div class="border-0 shadow-sm card h-100">
                <div class="px-3 py-2 border-0 card-header bg-light">
                  <h6 class="mb-0 card-title d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-file-pdf-box text-danger me-2 fs-6"></i>
                    <span>الملف</span>
                  </h6>
                </div>
                <div class="p-2 card-body">
                  <div wire:loading.remove wire:target="file" class="h-100">
                    @if ($file)
                    <div class="p-2 border rounded-3 bg-light">
                      <div class="mb-2 text-center">
                        <span class="px-2 py-1 text-success bg-success-subtle rounded-pill fw-bold small">
                          <i class="mdi mdi-check-circle me-1"></i>تم رفع الملف بنجاح
                        </span>
                      </div>
                      @if (!is_string($file))
                      <div class="pdf-preview-container">
                        <div class="overflow-hidden bg-white border shadow-sm rounded-3">
                          @if ($filePreviewPath)
                          <embed src="{{ asset('storage/' . $filePreviewPath) }}" type="application/pdf" width="100%" height="180px" style="min-height: 180px; border-radius: 6px;">
                          @else
                          <div class="p-2 text-muted">
                            لا يمكن إنشاء رابط معاينة مؤقت على هذا القرص.
                          </div>
                          @endif
                        </div>
                        <div class="mt-2 text-center">
                          <small class="mb-1 text-muted d-block">
                            <i class="mdi mdi-file-pdf-box text-danger me-1"></i>
                            معاينة الملف المرفوع
                          </small>
                        </div>
                      </div>
                      @else
                      <div class="pdf-preview-container">
                        <div class="overflow-hidden bg-white border shadow-sm rounded-3">
                          <embed src="{{ asset('storage/' . $file) }}" type="application/pdf" width="100%" height="120px" style="min-height: 120px; border-radius: 6px;">
                        </div>
                        <div class="mt-2 text-center">
                          <small class="mb-2 text-muted d-block">
                            <i class="mdi mdi-file-pdf-box text-danger me-1"></i>
                            ملف محفوظ مسبقاً
                          </small>
                          <a href="{{ asset('storage/' . $file) }}" target="_blank" class="btn btn-outline-primary btn-sm rounded-pill">
                            <i class="mdi mdi-open-in-new me-1"></i>فتح في نافذة
                            جديدة
                          </a>
                        </div>
                      </div>
                      @endif
                      <div class="mt-2 text-center">
                        @if (!is_string($file) && $filePreviewPath)
                        <a href="{{ asset('storage/' . $filePreviewPath) }}" target="_blank" class="btn btn-outline-primary btn-sm rounded-pill me-2">
                          <i class="mdi mdi-open-in-new me-1"></i>عرض الملف
                        </a>
                        @elseif (is_string($file))
                        <a href="{{ asset('storage/' . $file) }}" target="_blank" class="btn btn-outline-primary btn-sm rounded-pill me-2">
                          <i class="mdi mdi-open-in-new me-1"></i>عرض الملف
                        </a>
                        @endif
                        <button wire:click="$set('file', null)" type="button" class="px-3 btn btn-outline-danger btn-sm rounded-pill">
                          <i class="mdi mdi-refresh me-1"></i>استبدال الملف
                        </button>
                      </div>
                    </div>
                    @else
                    <label for="addContractfile" class="w-100 d-flex align-items-center justify-content-center upload-label" style="cursor: pointer; min-height: 220px;">
                      <div class="border-2 border-dashed upload-container rounded-3 w-100 h-100 d-flex align-items-center justify-content-center position-relative" style="transition: all 0.3s ease; border-color: #dee2e6;" onmouseover="this.style.borderColor='#007bff'; this.style.backgroundColor='rgba(0,123,255,0.05)'" onmouseout="this.style.borderColor='#dee2e6'; this.style.backgroundColor='transparent'">
                        <div class="p-3 text-center upload-content">
                          <div class="mb-2 upload-icon">
                            <i class="mdi mdi-cloud-upload text-primary" style="font-size: 2.2rem; opacity: 0.8;"></i>
                          </div>
                          <h6 class="mb-1 text-dark fw-bold fs-6">الملف</h6>
                          <span class="px-2 py-1 mb-1 badge bg-danger-subtle text-danger rounded-pill d-inline-block small">
                            <i class="mdi mdi-alert-circle me-1"></i>PDF فقط
                          </span>
                          <p class="mt-1 text-muted small">الحد الأقصى: 10 ميجابايت</p>
                        </div>
                      </div>
                    </label>
                    <input wire:model="file" type="file" id="addContractfile" class="d-none" accept="application/pdf" />
                    @endif
                  </div>
                  {{-- <div wire:loading wire:target="file"
                                        class="d-flex align-items-center justify-content-center"
                                        style="min-height: 220px;">
                                        <div class="text-center">
                                            <div class="spinner-border text-primary" role="status"></div>
                                            <p class="mt-2 text-muted small">جارٍ رفع الملف...</p>
                                        </div>
                                    </div> --}}
                  @error('file')
                  <div class="p-2 mt-2 border-0 shadow-sm alert alert-danger rounded-3">
                    <div class="d-flex align-items-center small">
                      <i class="mdi mdi-alert-circle me-2 fs-6"></i>
                      <span>{ $message }</span>
                    </div>
                  </div>
                  @enderror
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="px-3 py-2 border-0 modal-footer">
        <div class="gap-2 d-flex w-100 justify-content-center">
          <button wire:click='store' wire:loading.attr="disabled" type="button" class="px-3 py-2 shadow-sm btn btn-primary rounded-pill">
            <span wire:loading.remove wire:target="store">
              <i class="mdi mdi-content-save-outline me-2"></i>حفظ
            </span>
            <span wire:loading wire:target="store">
              <span class="spinner-border spinner-border-sm me-2" role="status"></span>
              جارٍ الحفظ...
            </span>
          </button>
          <button type="button" class="px-3 py-2 btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">
            <i class="mdi mdi-close-circle-outline me-2"></i>إلغاء العملية
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Add Contract Modal -->

<script>
function formatNumber(input) {
    // احفظ موضع المؤشر
    let cursorPosition = input.selectionStart;

    // احصل على القيمة وأزل الفواصل الموجودة
    let value = input.value.replace(/,/g, '');

    // تحقق من أن القيمة رقم صحيح
    if (!/^\d*\.?\d*$/.test(value)) {
        // إذا لم تكن رقماً صحيحاً، أزل الأحرف غير الصحيحة
        value = value.replace(/[^\d.]/g, '');
    }

    // تأكد من وجود نقطة عشرية واحدة فقط
    let parts = value.split('.');
    if (parts.length > 2) {
        value = parts[0] + '.' + parts.slice(1).join('');
    }

    // أضف الفواصل للجزء الصحيح
    if (parts[0]) {
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        value = parts.join('.');
    }

    // احسب الفرق في الطول لتعديل موضع المؤشر
    let lengthDiff = value.length - input.value.length;

    // حدث القيمة
    input.value = value;

    // أعد تعيين موضع المؤشر
    let newCursorPosition = cursorPosition + lengthDiff;
    input.setSelectionRange(newCursorPosition, newCursorPosition);

    // حدث قيمة Livewire
    input.dispatchEvent(new Event('input', { bubbles: true }));
}
</script>

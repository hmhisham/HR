<!-- Add Tenant Modal -->
<div wire:ignore.self class="modal fade" id="addtenantModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="px-4 py-3 modal-header bg-light">
        <h5 class="modal-title d-flex align-items-center">
          <i class="mdi mdi-pencil-circle-outline text-primary me-2"></i>
          اضافة المستأجر
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="p-4 modal-body">

        <!-- Body -->

        <div class="row g-3">
          <!-- Form Inputs Section - Left Side -->
          <div class="col-lg-7">
            <div class="border-0 shadow-sm card h-100">
              <div class="px-3 py-2 border-0 card-header bg-light">
                <h6 class="mb-0 card-title d-flex align-items-center">
                  <i class="mdi mdi-account-edit-outline text-primary me-2 fs-6"></i>
                  بيانات المستأجر الأساسية
                </h6>
              </div>
              <div class="p-3 card-body">
                <form id="addtenantModalForm" autocomplete="off">
                  <div class="row g-3">
                    <!-- Name Field -->
                    <div class="col-md-6">
                      <div class="form-floating form-floating-outline">
                        <input wire:model.defer='name' type="text" id="addModalTenantname" placeholder="اسم المستأجر" class="form-control @error('name') is-invalid is-filled @enderror" />
                        <label for="addModalTenantname">
                          <i class="mdi mdi-account me-2"></i>اسم المستأجر
                        </label>
                      </div>
                      @error('name')
                      <small class='mt-1 text-danger inputerror d-block'>
                        <i class="mdi mdi-alert-circle me-1"></i>{{ $message }}
                      </small>
                      @enderror
                    </div>

                    <!-- Phone Field -->
                    <div class="col-md-6">
                      <div class="form-floating form-floating-outline">
                        <input wire:model.defer='phone' type="text" id="addModalTenantphone" placeholder="رقم الهاتف" class="form-control @error('phone') is-invalid is-filled @enderror" />
                        <label for="addModalTenantphone">
                          <i class="mdi mdi-phone me-2"></i>رقم الهاتف
                        </label>
                      </div>
                      @error('phone')
                      <small class='mt-1 text-danger inputerror d-block'>
                        <i class="mdi mdi-alert-circle me-1"></i>{{ $message }}
                      </small>
                      @enderror
                    </div>

                    <!-- Email Field -->
                    <div class="col-md-6">
                      <div class="form-floating form-floating-outline">
                        <input wire:model.defer='email' type="email" id="addModalTenantemail" placeholder="البريد الإلكتروني" class="form-control @error('email') is-invalid is-filled @enderror" />
                        <label for="addModalTenantemail">
                          <i class="mdi mdi-email me-2"></i>البريد الإلكتروني
                        </label>
                      </div>
                      @error('email')
                      <small class='mt-1 text-danger inputerror d-block'>
                        <i class="mdi mdi-alert-circle me-1"></i>{{ $message }}
                      </small>
                      @enderror
                    </div>

                    <!-- Address Field -->
                    <div class="col-md-6">
                      <div class="form-floating form-floating-outline">
                        <input wire:model.defer='address' type="text" id="addModalTenantaddress" placeholder="العنوان" class="form-control @error('address') is-invalid is-filled @enderror" />
                        <label for="addModalTenantaddress">
                          <i class="mdi mdi-map-marker me-2"></i>العنوان
                        </label>
                      </div>
                      @error('address')
                      <small class='mt-1 text-danger inputerror d-block'>
                        <i class="mdi mdi-alert-circle me-1"></i>{{ $message }}
                      </small>
                      @enderror
                    </div>

                    <!-- Notes Field -->
                    <div class="col-12">
                      <div class="form-floating form-floating-outline">
                        <textarea wire:model.defer='notes' id="addModalTenantnotes" placeholder="الملاحظات" class="form-control @error('notes') is-invalid is-filled @enderror" style="height: 300px; resize: vertical;" oninput="autoExpand(this)"></textarea>
                        <script>
                          function autoExpand(textarea) {
                            textarea.style.height = 'auto';
                            textarea.style.height = textarea.scrollHeight + 'px';
                          }

                        </script>
                        <label for="addModalTenantnotes">
                          <i class="mdi mdi-note-text me-2"></i>الملاحظات الإضافية
                        </label>
                      </div>
                      @error('notes')
                      <small class='mt-1 text-danger inputerror d-block'>
                        <i class="mdi mdi-alert-circle me-1"></i>{{ $message }}
                      </small>
                      @enderror
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- PDF Upload and Preview Section - Right Side -->
          <div class="col-lg-5">
            <div class="border-0 shadow-sm card h-100">
              <div class="px-3 py-2 border-0 card-header bg-light">
                <h6 class="mb-0 card-title d-flex align-items-center justify-content-center">
                  <i class="mdi mdi-file-pdf-box text-danger me-2 fs-6"></i>
                  <span>وثيقة المستأجر</span>
                </h6>
              </div>
              <div class="p-2 card-body">
                <!-- File Upload and Preview Container -->
                <div wire:loading.remove wire:target="pdf_file" class="h-100">
                  @if($pdf_file)
                  <!-- PDF Preview Section -->
                  <div class="p-2 border rounded-3 bg-light">
                    <div class="mb-2 text-center">
                      <span class="px-2 py-1 text-success bg-success-subtle rounded-pill fw-bold small">
                        <i class="mdi mdi-check-circle me-1"></i>تم رفع الوثيقة بنجاح
                      </span>
                    </div>

                    @if($pdfPreviewUrl && !is_string($pdf_file))
                    <!-- New uploaded PDF preview -->
                    <div class="pdf-preview-container">
                      <div class="overflow-hidden bg-white border shadow-sm rounded-3">
                        <embed src="{{ $pdfPreviewUrl }}" type="application/pdf" width="100%" height="320px" style="min-height: 320px; border-radius: 6px;">
                      </div>
                      <div class="mt-2 text-center">
                        <small class="mb-1 text-muted d-block">
                          <i class="mdi mdi-file-pdf-box text-danger me-1"></i>
                          معاينة الوثيقة المرفوعة
                        </small>
                      </div>
                    </div>
                    @elseif($pdf_file && is_string($pdf_file))
                    <!-- Existing PDF file -->
                    <div class="pdf-preview-container">
                      <div class="overflow-hidden bg-white border shadow-sm rounded-3">
                        <embed src="{{ asset('storage/' . $pdf_file) }}" type="application/pdf" width="100%" height="320px" style="min-height: 320px; border-radius: 6px;">
                      </div>
                      <div class="mt-2 text-center">
                        <small class="mb-2 text-muted d-block">
                          <i class="mdi mdi-file-pdf-box text-danger me-1"></i>
                          وثيقة محفوظة مسبقاً
                        </small>
                        <a href="{{ asset('storage/' . $pdf_file) }}" target="_blank" class="btn btn-outline-primary btn-sm rounded-pill">
                          <i class="mdi mdi-open-in-new me-1"></i>فتح في نافذة جديدة
                        </a>
                      </div>
                    </div>
                    @endif

                    <!-- Replace File Button -->
                    <div class="mt-2 text-center">
                      <button wire:click="emptyy" type="button" class="px-3 btn btn-outline-danger btn-sm rounded-pill">
                        <i class="mdi mdi-refresh me-1"></i>استبدال الوثيقة
                      </button>
                    </div>
                  </div>
                  @else
                  <!-- Upload Area -->
                  <label for="documentPdfUpload" class="w-100 d-flex align-items-center justify-content-center upload-label" style="cursor: pointer; min-height: 380px;">
                    <div class="border-2 border-dashed upload-container rounded-3 w-100 h-100 d-flex align-items-center justify-content-center position-relative" style="transition: all 0.3s ease; border-color: #dee2e6;" onmouseover="this.style.borderColor='#007bff'; this.style.backgroundColor='rgba(0,123,255,0.05)'" onmouseout="this.style.borderColor='#dee2e6'; this.style.backgroundColor='transparent'">
                      <div class="p-3 text-center upload-content">
                        <div class="mb-2 upload-icon">
                          <i class="mdi mdi-cloud-upload text-primary" style="font-size: 3rem; opacity: 0.8;"></i>
                        </div>
                        <h6 class="mb-2 text-dark fw-bold">ارفق وثيقة المستأجر</h6>
                        <span class="px-2 py-1 mb-2 badge bg-danger-subtle text-danger rounded-pill d-inline-block small">
                          <i class="mdi mdi-alert-circle me-1"></i>مطلوب
                        </span>
                        <p class="mb-2 text-muted small">سيتم عرض الوثيقة مباشرة بعد الاختيار</p>
                        <div class="upload-info">
                          <div class="p-2 border rounded-3 bg-light">
                            <small class="mb-1 text-muted d-block">
                              <i class="mdi mdi-file-pdf text-danger me-1"></i>
                              <strong>نوع الملف:</strong> PDF فقط
                            </small>
                            <small class="text-muted d-block">
                              <i class="mdi mdi-weight me-1"></i>
                              <strong>الحد الأقصى:</strong> 10 ميجابايت
                            </small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </label>
                  <input wire:model="pdf_file" type="file" id="documentPdfUpload" class="d-none" accept="application/pdf" />
                  @endif
                </div>


                <!-- Error Display -->
                @error('pdf_file')
                <div class="mt-2 border-0 shadow-sm alert alert-danger rounded-3">
                  <div class="d-flex align-items-center">
                    <i class="mdi mdi-alert-circle me-2 fs-6"></i>
                    <div>
                      <strong>خطأ في رفع الملف:</strong><br>
                      <small>{{ $message }}</small>
                    </div>
                  </div>
                </div>
                @enderror
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Footer -->
      <div class="px-3 py-2 border-0 modal-footer">
        <div class="gap-2 d-flex w-100 justify-content-center">
          <button wire:click='store' wire:loading.attr="disabled" type="button" class="px-3 py-2 shadow-sm btn btn-primary rounded-pill">
            <span wire:loading.remove wire:target="store">
              <i class="mdi mdi-content-save-outline me-2"></i>حفظ بيانات المستأجر
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

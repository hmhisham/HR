<!-- Add Tenant Modal -->
<div wire:ignore.self class="modal fade" id="addtenantModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="border-0 shadow-lg modal-content">
      <!-- Header -->
      <div class="px-3 py-2 text-white border-0 modal-header bg-gradient-primary">
        <h5 class="mb-0 modal-title d-flex align-items-center fw-bold">
          <i class="mdi mdi-plus-circle-outline me-2 fs-6"></i>
          إضافة مستأجر جديد
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Body -->
      <div class="p-3 modal-body">
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
                        <input wire:model.defer='name' type="text" id="modalTenantname"
                               placeholder="اسم المستأجر"
                               class="form-control @error('name') is-invalid is-filled @enderror" />
                        <label for="modalTenantname">
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
                        <input wire:model.defer='phone' type="text" id="modalTenantphone"
                               placeholder="رقم الهاتف"
                               class="form-control @error('phone') is-invalid is-filled @enderror" />
                        <label for="modalTenantphone">
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
                        <input wire:model.defer='email' type="email" id="modalTenantemail"
                               placeholder="البريد الإلكتروني"
                               class="form-control @error('email') is-invalid is-filled @enderror" />
                        <label for="modalTenantemail">
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
                        <input wire:model.defer='address' type="text" id="modalTenantaddress"
                               placeholder="العنوان"
                               class="form-control @error('address') is-invalid is-filled @enderror" />
                        <label for="modalTenantaddress">
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
                        <textarea wire:model.defer='notes' id="modalTenantnotes"
                                  placeholder="الملاحظات"
                                  class="form-control @error('notes') is-invalid is-filled @enderror"
                                  style="height: 120px; resize: vertical;"
                                  oninput="autoExpand(this)"></textarea>
                        <script>
                          function autoExpand(textarea) {
                            textarea.style.height = 'auto';
                            textarea.style.height = textarea.scrollHeight + 'px';
                          }
                        </script>
                        <label for="modalTenantnotes">
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
                            <embed src="{{ $pdfPreviewUrl }}"
                                   type="application/pdf"
                                   width="100%"
                                   height="320px"
                                   style="min-height: 320px; border-radius: 6px;">
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
                            <embed src="{{ asset('storage/' . $pdf_file) }}"
                                   type="application/pdf"
                                   width="100%"
                                   height="320px"
                                   style="min-height: 320px; border-radius: 6px;">
                          </div>
                          <div class="mt-2 text-center">
                            <small class="mb-2 text-muted d-block">
                              <i class="mdi mdi-file-pdf-box text-danger me-1"></i>
                              وثيقة محفوظة مسبقاً
                            </small>
                            <a href="{{ asset('storage/' . $pdf_file) }}"
                               target="_blank"
                               class="btn btn-outline-primary btn-sm rounded-pill">
                              <i class="mdi mdi-open-in-new me-1"></i>فتح في نافذة جديدة
                            </a>
                          </div>
                        </div>
                      @endif

                      <!-- Replace File Button -->
                      <div class="mt-2 text-center">
                        <button wire:click="emptyy"
                                type="button"
                                class="px-3 btn btn-outline-danger btn-sm rounded-pill">
                          <i class="mdi mdi-refresh me-1"></i>استبدال الوثيقة
                        </button>
                      </div>
                    </div>
                  @else
                    <!-- Upload Area -->
                    <label for="documentPdfUpload"
                           class="w-100 d-flex align-items-center justify-content-center upload-label"
                           style="cursor: pointer; min-height: 380px;">
                      <div class="border-2 border-dashed upload-container rounded-3 w-100 h-100 d-flex align-items-center justify-content-center position-relative"
                           style="transition: all 0.3s ease; border-color: #dee2e6;"
                           onmouseover="this.style.borderColor='#007bff'; this.style.backgroundColor='rgba(0,123,255,0.05)'"
                           onmouseout="this.style.borderColor='#dee2e6'; this.style.backgroundColor='transparent'">
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
                    <input wire:model="pdf_file"
                           type="file"
                           id="documentPdfUpload"
                           class="d-none"
                           accept="application/pdf" />
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
      <div class="px-3 py-2 border-0 modal-footer bg-light">
        <div class="gap-2 d-flex w-100 justify-content-center">
          <button wire:click='store'
                  wire:loading.attr="disabled"
                  type="button"
                  class="px-3 py-2 shadow-sm btn btn-primary rounded-pill">
            <span wire:loading.remove wire:target="store">
              <i class="mdi mdi-content-save-outline me-2"></i>حفظ بيانات المستأجر
            </span>
            <span wire:loading wire:target="store">
              <span class="spinner-border spinner-border-sm me-2" role="status"></span>
              جارٍ الحفظ...
            </span>
          </button>
          <button type="button"
                  class="px-3 py-2 btn btn-outline-secondary rounded-pill"
                  data-bs-dismiss="modal">
            <i class="mdi mdi-close-circle-outline me-2"></i>إلغاء العملية
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  /* تحسينات النافذة الرئيسية */
  .modal-lg {
    max-width: 1000px;
  }

  /* تحسينات منطقة رفع الملفات */
  .upload-icon {
    animation: float 3s ease-in-out infinite;
  }

  @keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-8px); }
  }

  .upload-container:hover .upload-icon {
    animation: bounce 0.6s ease-in-out;
  }

  @keyframes bounce {
    0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
    40% { transform: translateY(-12px); }
    60% { transform: translateY(-6px); }
  }

  /* تحسينات مؤشر التحميل */
  @keyframes pulse {
    0% { transform: scale(1); opacity: 0.3; }
    50% { transform: scale(1.1); opacity: 0.1; }
    100% { transform: scale(1); opacity: 0.3; }
  }

  @keyframes fadeInOut {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.7; }
  }

  .z-index-1 {
    z-index: 1;
  }

  /* تحسينات معاينة PDF */
  .pdf-preview-container {
    position: relative;
  }

  .pdf-preview-container embed {
    border: none;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
  }

  /* تحسينات الأخطاء */
  .inputerror {
    animation: shake 0.5s ease-in-out;
  }

  @keyframes shake {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-4px); }
    75% { transform: translateX(4px); }
  }

  /* تحسينات الاستجابة للشاشات المتوسطة */
  @media (max-width: 1200px) {
    .modal-lg {
      max-width: 95%;
      margin: 15px auto;
    }

    .pdf-preview-container embed {
      height: 280px !important;
      min-height: 280px !important;
    }

    .upload-label {
      min-height: 340px !important;
    }
  }

  /* تحسينات للشاشات الصغيرة */
  @media (max-width: 992px) {
    .modal-lg {
      max-width: 98%;
      margin: 10px auto;
    }

    .col-lg-7, .col-lg-5 {
      margin-bottom: 1rem;
    }

    .pdf-preview-container embed {
      height: 250px !important;
      min-height: 250px !important;
    }

    .upload-label {
      min-height: 300px !important;
    }
  }

  /* تحسينات للشاشات الصغيرة جداً */
  @media (max-width: 768px) {
    .modal-lg {
      max-width: 100%;
      margin: 0;
    }

    .modal-body {
      padding: 0.75rem !important;
    }

    .card-body {
      padding: 0.75rem !important;
    }

    .modal-header, .modal-footer {
      padding: 0.5rem 0.75rem !important;
    }

    .pdf-preview-container embed {
      height: 220px !important;
      min-height: 220px !important;
    }

    .upload-label {
      min-height: 260px !important;
    }

    .upload-content {
      padding: 1rem !important;
    }

    .modal-title {
      font-size: 0.95rem;
    }

    .card-title {
      font-size: 0.85rem;
    }
  }

  /* تحسينات للشاشات الصغيرة جداً */
  @media (max-width: 576px) {
    .pdf-preview-container embed {
      height: 180px !important;
      min-height: 180px !important;
    }

    .upload-label {
      min-height: 220px !important;
    }

    .upload-content {
      padding: 0.75rem !important;
    }

    .upload-icon i {
      font-size: 2.5rem !important;
    }

    .row.g-3 {
      --bs-gutter-x: 0.75rem;
      --bs-gutter-y: 0.75rem;
    }
  }

  /* تحسينات إضافية للتفاعل */
  .btn {
    transition: all 0.3s ease;
  }

  .btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 3px 10px rgba(0,0,0,0.15);
  }

  .card {
    transition: all 0.3s ease;
  }

  .form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0,123,255,0.25);
  }
</style>

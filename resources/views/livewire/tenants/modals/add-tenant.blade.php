<!-- Add Tenant Modal -->
<div wire:ignore.self class="modal fade" id="addtenantModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="border-0 shadow-lg modal-content">
      <div class="px-3 py-2 text-white border-0 modal-header bg-gradient-primary">
        <h6 class="mb-0 modal-title d-flex align-items-center fw-bold">
          <i class="mdi mdi-plus-circle-outline me-2"></i>
          إضافة مستأجر جديد
        </h6>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="p-3 modal-body">
        <div class="row g-3">
              <!-- Form Inputs Section - Left Side -->
          <div class="col-lg-8">
            <div class="border-0 shadow-sm card h-100">
              <div class="px-3 py-2 border-0 card-header bg-light">
                <h6 class="mb-0 card-title d-flex align-items-center">
                  <i class="mdi mdi-account-edit-outline text-primary me-2"></i>
                  بيانات المستأجر
                </h6>
              </div>
              <div class="p-3 card-body">
                <form id="addtenantModalForm" autocomplete="off">
                    <div class="row g-3">
                    <div class="col-lg-6">
                      <div class="form-floating form-floating-outline">
                        <input wire:model.defer='name' type="text" id="modalTenantname" placeholder="اسم المستأجر" class="form-control @error('name') is-invalid is-filled @enderror" />
                        <label for="modalTenantname">
                          <i class="mdi mdi-account me-1"></i>اسم المستأجر
                        </label>
                      </div>
                      @error('name')
                      <small class='mt-1 text-danger inputerror d-block'>
                        <i class="mdi mdi-alert-circle me-1"></i>{{ $message }}
                      </small>
                      @enderror
                    </div>

                    <div class="col-lg-6">
                      <div class="form-floating form-floating-outline">
                        <input wire:model.defer='phone' type="text" id="modalTenantphone" placeholder="رقم الهاتف" class="form-control @error('phone') is-invalid is-filled @enderror" />
                        <label for="modalTenantphone">
                          <i class="mdi mdi-phone me-1"></i>رقم الهاتف
                        </label>
                      </div>
                      @error('phone')
                      <small class='mt-1 text-danger inputerror d-block'>
                        <i class="mdi mdi-alert-circle me-1"></i>{{ $message }}
                      </small>
                      @enderror
                    </div>

                    <div class="col-lg-6">
                      <div class="form-floating form-floating-outline">
                        <input wire:model.defer='email' type="email" id="modalTenantemail" placeholder="البريد الإلكتروني" class="form-control @error('email') is-invalid is-filled @enderror" />
                        <label for="modalTenantemail">
                          <i class="mdi mdi-email me-1"></i>البريد الإلكتروني
                        </label>
                      </div>
                      @error('email')
                      <small class='mt-1 text-danger inputerror d-block'>
                        <i class="mdi mdi-alert-circle me-1"></i>{{ $message }}
                      </small>
                      @enderror
                    </div>

                    <div class="col-lg-6">
                      <div class="form-floating form-floating-outline">
                        <input wire:model.defer='address' type="text" id="modalTenantaddress" placeholder="العنوان" class="form-control @error('address') is-invalid is-filled @enderror" />
                        <label for="modalTenantaddress">
                          <i class="mdi mdi-map-marker me-1"></i>العنوان
                        </label>
                      </div>
                      @error('address')
                      <small class='mt-1 text-danger inputerror d-block'>
                        <i class="mdi mdi-alert-circle me-1"></i>{{ $message }}
                      </small>
                      @enderror
                    </div>

                    <div class="col-12">
                      <div class="form-floating form-floating-outline">
                        <textarea wire:model.defer='notes' id="modalTenantnotes" placeholder="الملاحظات" class="form-control @error('notes') is-invalid is-filled @enderror" style="height: 120px; resize: vertical;" oninput="autoExpand(this)"></textarea>
                        <script>
                            function autoExpand(textarea) {
                                textarea.style.height = 'auto';
                                textarea.style.height = textarea.scrollHeight + 'px';
                            }
                        </script>
                        <label for="modalTenantnotes">
                          <i class="mdi mdi-note-text me-1"></i>الملاحظات
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
          <!-- File Upload Section - Right Side -->
          <div class="col-lg-4">
            <div class="border-0 shadow-sm card h-100">
              <div class="px-3 py-2 border-0 card-header bg-light">
                <h6 class="mb-0 text-center card-title d-flex align-items-center w-100 justify-content-center">
                  <i class="mdi mdi-file-upload-outline text-primary me-1"></i>
                  <span class="small">رفع الوثيقة</span>
                </h6>
              </div>
              <div class="p-2 card-body">
                <!-- File Input and Preview Area -->
                <div wire:loading.remove wire:target="pdf_file" class="h-100">
                  @if($pdf_file)
                    <div class="p-2 mt-2 rounded border bg-light">
                      <div class="mb-2 text-center">
                        <small class="text-success fw-bold">
                          <i class="mdi mdi-check-circle me-1"></i>تم الرفع
                        </small>
                      </div>

                      @if($pdfPreviewUrl && !is_string($pdf_file))
                        <!-- New uploaded PDF preview -->
                        <div class="mb-2 pdf-preview-container">
                          <div class="overflow-hidden bg-white rounded border">
                            <embed src="{{ $pdfPreviewUrl }}" type="application/pdf" width="100%" height="250px" style="min-height: 250px; border-radius: 4px;">
                          </div>
                        </div>
                      @elseif($pdf_file && is_string($pdf_file))
                        <!-- Existing PDF file -->
                        <div class="mb-2 pdf-preview-container">
                          <div class="overflow-hidden bg-white rounded border">
                            <embed src="{{ asset('storage/' . $pdf_file) }}" type="application/pdf" width="100%" height="280px" style="min-height: 280px; border-radius: 4px;">
                          </div>
                          <div class="mt-2 text-center">
                            <small class="text-muted d-block">
                              <i class="mdi mdi-file-pdf-box text-danger me-1"></i>
                              ملف محفوظ
                            </small>
                            <small class="text-muted">
                              <a href="{{ asset('storage/' . $pdf_file) }}" target="_blank" class="text-primary text-decoration-none small">
                                <i class="mdi mdi-open-in-new me-1"></i>عرض
                              </a>
                            </small>
                          </div>
                        </div>
                      @endif
                    </div>
                  @else
                    <label for="documentPdfUpload" class="w-100 d-flex align-items-center justify-content-center" style="cursor: pointer; min-height: 220px;">
                      <div class="overflow-hidden border-2 border-dashed upload-container rounded-3 w-100 h-100 d-flex align-items-center justify-content-center position-relative" style="transition: all 0.3s ease;" onmouseover="this.classList.add('upload-hover')" onmouseout="this.classList.remove('upload-hover')">
                        <div class="p-3 text-center upload-content">
                          <div class="mb-2 upload-icon">
                            <i class="opacity-75 mdi mdi-cloud-upload fs-1 text-primary"></i>
                          </div>
                          <h6 class="mb-2 text-dark fw-bold small">ارفق الوثيقة</h6>
                          <span class="px-2 py-1 mb-2 badge bg-danger-subtle text-danger rounded-pill small">
                            <i class="mdi mdi-alert-circle me-1"></i>مطلوب
                          </span>
                          <p class="mb-2 text-muted" style="font-size: 0.75rem;">عرض مباشر بعد الاختيار</p>
                          <div class="mt-2 upload-info">
                            <small class="text-muted d-block" style="font-size: 0.7rem;">
                              <i class="mdi mdi-file-pdf me-1"></i>PDF فقط
                            </small>
                            <small class="mt-1 text-muted d-block" style="font-size: 0.7rem;">
                              حد أقصى: 10 MB
                            </small>
                          </div>
                        </div>
                      </div>
                    </label>
                    <input wire:model="pdf_file" type="file" id="documentPdfUpload" class="d-none" accept="application/pdf" />
                  @endif
                </div>

              <!-- Loading State -->
              <div wire:loading wire:target="pdf_file" class="py-4 text-center">
                <div class="mb-2 spinner-border spinner-border-sm text-primary" role="status">
                  <span class="visually-hidden">جارٍ التحميل...</span>
                </div>
                <p class="mb-0 text-muted small">جارٍ الرفع...</p>
              </div>

              @error('pdf_file')
              <div class="py-2 mt-2 border-0 shadow-sm alert alert-danger rounded-3">
                <small><i class="mdi mdi-alert-circle me-1"></i>{{ $message }}</small>
              </div>
              @enderror

              @if ($pdf_file)
              <button wire:click="emptyy" type="button" class="mt-2 shadow-sm btn btn-outline-danger btn-sm w-100 rounded-3">
                <i class="mdi mdi-delete me-1"></i><small>تبديل الملف</small>
              </button>
              @endif
              </div>
            </div>
          </div>


        </div>
      </div>

      <div class="px-3 py-2 border-0 modal-footer bg-light">
        <div class="gap-2 d-flex w-100 justify-content-center">
          <button wire:click='store' wire:loading.attr="disabled" type="button" class="px-3 py-2 shadow-sm btn btn-primary rounded-3">
            <span wire:loading.remove wire:target="store">
              <i class="mdi mdi-content-save-outline me-2"></i>حفظ المستأجر
            </span>
            <span wire:loading wire:target="store">
              <span class="spinner-border spinner-border-sm me-2" role="status"></span>جارٍ الحفظ...
            </span>
          </button>
          <button type="button" class="px-3 py-2 btn btn-outline-secondary rounded-3" data-bs-dismiss="modal">
            <i class="mdi mdi-close-circle-outline me-2"></i>إلغاء
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  /* تحسينات للنافذة المتوسطة */
  .modal-lg {
    max-width: 900px;
  }

  .upload-icon {
    animation: bounce 2s infinite;
  }

  @keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
      transform: translateY(0);
    }
    40% {
      transform: translateY(-8px);
    }
    60% {
      transform: translateY(-4px);
    }
  }

  .upload-hover {
    border-color: #007bff !important;
    background-color: rgba(0, 123, 255, 0.05) !important;
  }

  .inputerror {
    animation: shake 0.5s ease-in-out;
  }

  @keyframes shake {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-3px); }
    75% { transform: translateX(3px); }
  }

  /* تحسينات للشاشات المتوسطة */
  @media (max-width: 992px) {
    .modal-lg {
      max-width: 95%;
      margin: 10px auto;
    }

    .col-lg-8, .col-lg-4 {
      margin-bottom: 1rem;
    }
  }

  /* تحسينات للشاشات الصغيرة */
  @media (max-width: 768px) {
    .modal-lg {
      max-width: 98%;
      margin: 5px auto;
    }

    .upload-container {
      min-height: 180px !important;
    }

    .card-body {
      padding: 0.75rem !important;
    }

    .modal-header {
      padding: 0.5rem 0.75rem !important;
    }

    .modal-footer {
      padding: 0.5rem 0.75rem !important;
    }

    .modal-body {
      padding: 0.75rem !important;
    }

    .pdf-preview-container embed {
      height: 200px !important;
      min-height: 200px !important;
    }
  }

  /* تحسينات للشاشات الصغيرة جداً */
  @media (max-width: 576px) {
    .upload-container {
      min-height: 150px !important;
    }

    .upload-content {
      padding: 1rem !important;
    }

    .pdf-preview-container embed {
      height: 180px !important;
      min-height: 180px !important;
    }

    .modal-title {
      font-size: 0.9rem;
    }

    .card-title {
      font-size: 0.85rem;
    }
  }
</style>

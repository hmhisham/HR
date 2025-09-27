<!-- Add Tenant Modal -->
<div wire:ignore.self class="modal fade" id="addtenantModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="border-0 shadow-lg modal-content">
      <div class="px-4 py-3 text-white border-0 modal-header bg-gradient-primary">
        <h5 class="mb-0 modal-title d-flex align-items-center fw-bold">
          <i class="mdi mdi-plus-circle-outline me-2 fs-4"></i>
          إضافة مستأجر جديد
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="p-4 modal-body">
        <div class="row g-3">
              <!-- Form Inputs Section - Right Side -->
          <div class="col-lg-7">
            <div class="border-0 shadow-sm card h-100">
              <div class="py-2 border-0 card-header bg-light">
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
                        <textarea wire:model.defer='notes' id="modalTenantnotes" placeholder="الملاحظات" class="form-control @error('notes') is-invalid is-filled @enderror" style="height: 150px;" oninput="autoExpand(this)"></textarea>
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
          <!-- File Upload Section - Left Side -->
          <div class="col-lg-5">
            <div class="border-0 shadow-sm card h-100">
              <div class="py-2 border-0 card-header bg-light">
                <h6 class="mb-0 card-title d-flex align-items-center">
                  <i class="mdi mdi-file-upload-outline text-primary me-2"></i>
                  رفع وثيقة المستأجر
                </h6>
              </div>
              <div class="p-3 card-body">
                <!-- File Input and Preview Area -->
                <div wire:loading.remove wire:target="pdf_file" class="h-100">
                  <label for="documentPdfUpload" class="w-100 d-flex align-items-center justify-content-center" style="cursor: pointer; min-height: 280px;">
                  <div class="overflow-hidden border-dashed upload-container border-3 rounded-4 w-100 h-100 d-flex align-items-center justify-content-center position-relative" style="transition: all 0.3s ease;" onmouseover="this.classList.add('upload-hover')" onmouseout="this.classList.remove('upload-hover')">
                    @if ($pdf_file)
                    @php
                    $fileName = '';
                    $fileUrl = '';
                    $isNewUpload = false;

                    if ($pdf_file && is_object($pdf_file) && method_exists($pdf_file, 'getClientOriginalName')) {
                        $fileName = $pdf_file->getClientOriginalName();
                        $fileUrl = $pdfPreviewUrl;
                        $isNewUpload = true;
                    } elseif (is_string($pdf_file)) {
                        $fileName = basename($pdf_file);
                        $fileUrl = asset('storage/' . $pdf_file);
                        $isNewUpload = false;
                    }
                    @endphp

                    <div class="file-preview w-100 h-100 position-relative">
                      @if ($fileUrl && !$isNewUpload)
                        <!-- Existing saved PDF file -->
                        <embed src="{{ $fileUrl }}" type="application/pdf" class="shadow-sm w-100 h-100 rounded-4" id="pdfEmbed">
                      @elseif ($fileUrl && $isNewUpload)
                        <!-- Newly uploaded PDF file with preview -->
                        <embed src="{{ $fileUrl }}" type="application/pdf" class="shadow-sm w-100 h-100 rounded-4" id="pdfEmbed">
                      @else
                        <!-- PDF icon display when no preview available -->
                        <div class="p-5 text-center bg-white bg-opacity-95 shadow-lg file-display rounded-4 h-100 d-flex flex-column justify-content-center">
                          <div class="mb-4">
                            <i class="bi bi-file-earmark-pdf display-1 text-danger"></i>
                          </div>
                          <h5 class="mb-3 text-dark fw-bold">{{ $fileName }}</h5>
                          <p class="text-muted">ملف PDF جاهز للحفظ</p>
                        </div>
                      @endif

                      <!-- Fallback for browsers that can't display PDF -->
                      <div class="p-5 text-center bg-white bg-opacity-95 shadow-lg pdf-fallback position-absolute top-50 start-50 translate-middle rounded-4" style="display: none;">
                        <div class="animation-pulse">
                          <i class="mb-4 bi bi-file-earmark-pdf display-1 text-danger"></i>
                        </div>
                        <h5 class="mb-3 text-dark fw-bold">{{ $fileName }}</h5>
                        <p class="mb-3 text-muted">لا يمكن عرض ملف PDF في المتصفح</p>
                        @if ($fileUrl)
                        <a href="{{ $fileUrl }}" target="_blank" class="px-4 py-2 shadow-sm btn btn-danger btn-lg rounded-pill">
                          <i class="bi bi-download me-2"></i>تحميل وعرض الملف
                        </a>
                        @endif
                      </div>
                    </div>

                    <script>
                      // Check if PDF embed is working, show fallback if not
                      setTimeout(() => {
                        const embed = document.getElementById('pdfEmbed');
                        const fallback = document.querySelector('.pdf-fallback');
                        if (embed && fallback) {
                          if (embed.offsetHeight === 0 || embed.clientHeight === 0) {
                            embed.style.display = 'none';
                            fallback.style.display = 'block';
                          }
                        }
                      }, 2000);
                    </script>
                    @else
                    <div class="p-4 text-center upload-content">
                      <div class="mb-4 upload-icon">
                        <i class="opacity-75 mdi mdi-cloud-upload display-1 text-primary"></i>
                      </div>
                      <h5 class="mb-3 text-dark fw-bold">ارفق ملف الوثيقة</h5>
                      <span class="px-3 py-2 mb-3 badge bg-danger-subtle text-danger rounded-pill">
                        <i class="mdi mdi-alert-circle me-1"></i>مطلوب
                      </span>
                      <p class="text-muted small mb-3">سيتم عرض الملف مباشرة بعد الاختيار</p>
                      <div class="mt-3 upload-info">
                        <small class="text-muted d-block">
                          <i class="mdi mdi-file-pdf me-1"></i>ملفات PDF فقط
                        </small>
                        <small class="mt-1 text-muted d-block">
                          الحد الأقصى: 10 ميجابايت
                        </small>
                      </div>
                    </div>
                    @endif
                  </div>
                </label>
                <input wire:model="pdf_file" type="file" id="documentPdfUpload" class="d-none" accept="application/pdf" />
              </div>

              <!-- Loading State -->
              <div wire:loading wire:target="pdf_file" class="py-5 text-center">
                <div class="mb-3 spinner-border text-primary" role="status">
                  <span class="visually-hidden">جارٍ التحميل...</span>
                </div>
                <p class="mb-0 text-muted">جارٍ رفع الملف...</p>
              </div>

              @error('pdf_file')
              <div class="mt-3 border-0 shadow-sm alert alert-danger rounded-3">
                <i class="mdi mdi-alert-circle me-2"></i>{{ $message }}
              </div>
              @enderror

              @if ($pdf_file)
              <button wire:click="emptyy" type="button" class="mt-3 shadow-sm btn btn-outline-danger w-100 rounded-3">
                <i class="mdi mdi-delete me-2"></i>تبديل الملف
              </button>
              @endif
              </div>
            </div>
          </div>


        </div>
      </div>

      <div class="px-4 py-3 border-0 modal-footer bg-light">
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
  /* تحسينات للنافذة الأصغر */
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
      transform: translateY(-10px);
    }
    60% {
      transform: translateY(-5px);
    }
  }

  .inputerror {
    animation: shake 0.5s ease-in-out;
  }

  @keyframes shake {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-5px); }
    75% { transform: translateX(5px); }
  }

  /* تحسينات للشاشات الصغيرة */
  @media (max-width: 768px) {
    .modal-lg {
      max-width: 95%;
      margin: 10px auto;
    }

    .upload-container {
      min-height: 200px !important;
    }

    .card-body {
      padding: 1rem !important;
    }
  }
</style>

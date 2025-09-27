<!-- Add Tenant Modal -->
<div wire:ignore.self class="modal fade" id="addtenantModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="border-0 shadow-lg modal-content">
      <div class="px-5 py-4 text-white border-0 modal-header bg-gradient-primary">
        <h4 class="mb-0 modal-title d-flex align-items-center fw-bold">
          <i class="mdi mdi-plus-circle-outline me-3 fs-3"></i>
          إضافة مستأجر جديد
        </h4>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="p-3 modal-body">
        <div class="row g-4">
              <!-- Form Inputs Section - Right Side -->
          <div class="col-xl-7 col-lg-6">
            <div class="border-0 shadow-sm card h-100">
              <div class="py-3 border-0 card-header bg-light">
                <h6 class="mb-0 card-title d-flex align-items-center">
                  <i class="mdi mdi-account-edit-outline text-primary me-2"></i>
                  بيانات المستأجر
                </h6>
              </div>
              <div class="p-4 card-body">
                <form id="addtenantModalForm" autocomplete="off">
                  <div class="row g-4">
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
                        <textarea wire:model.defer='notes' id="modalTenantnotes" placeholder="الملاحظات" class="form-control @error('notes') is-invalid is-filled @enderror" style="height: 100px;"></textarea>
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
          <div class="col-xl-5 col-lg-6">
            <div class="border-0 shadow-sm card h-100">
              <div class="py-3 border-0 card-header bg-light">
                <h6 class="mb-0 card-title d-flex align-items-center">
                  <i class="mdi mdi-file-upload-outline text-primary me-2"></i>
                  رفع وثيقة المستأجر
                </h6>
              </div>
              <div class="p-4 card-body">
                <!-- File Input and Preview Area -->
                <div wire:loading.remove wire:target="pdf_file" class="h-100">
                  <label for="documentPdfUpload" class="w-100 d-flex align-items-center justify-content-center" style="cursor: pointer; min-height: 350px;">
                  <div class="overflow-hidden border-dashed upload-container border-3 rounded-4 w-100 h-100 d-flex align-items-center justify-content-center position-relative" style="transition: all 0.3s ease;" onmouseover="this.classList.add('upload-hover')" onmouseout="this.classList.remove('upload-hover')">
                    @if ($pdf_file || $pdf_file)
                    @php
                    $fileExtension = '';
                    $fileName = '';
                    $fileUrl = '';
                    if ($pdf_file) {
                    $fileExtension = strtolower(
                    $pdf_file->getClientOriginalExtension(),
                    );
                    $fileName = $pdf_file->getClientOriginalName();
                    $fileUrl = $pdf_file->temporaryUrl();
                    } elseif (is_string($pdf_file)) {
                    $fileExtension = strtolower(
                    pathinfo($pdf_file, PATHINFO_EXTENSION),
                    );
                    $fileName = basename($pdf_file);
                    $fileUrl = asset('storage/' . $pdf_file);
                    } else {
                    $fileExtension = strtolower(
                    $pdf_file->getClientOriginalExtension(),
                    );
                    $fileName = $pdf_file->getClientOriginalName();
                    $fileUrl = $pdf_file->temporaryUrl();
                    }
                    @endphp
                    <div class="file-preview w-100 h-100 position-relative">
                      @if ($fileExtension === 'pdf')
                      <embed src="{{ $fileUrl }}" type="application/pdf" class="shadow-sm w-100 h-100 rounded-4">
                      @else
                      <div class="p-5 text-center bg-white bg-opacity-95 shadow-lg file-display rounded-4 h-100 d-flex flex-column justify-content-center">
                        <div class="mb-4">
                          @if (in_array($fileExtension, ['doc', 'docx']))
                          <i class="bi bi-file-earmark-word display-1 text-primary"></i>
                          @elseif (in_array($fileExtension, ['xls', 'xlsx']))
                          <i class="bi bi-file-earmark-excel display-1 text-success"></i>
                          @else
                          <i class="bi bi-file-earmark display-1 text-secondary"></i>
                          @endif
                        </div>
                        <h5 class="mb-3 text-dark fw-bold">{{ $fileName }}</h5>
                        <div class="gap-2 d-flex justify-content-center">
                          <a href="{{ $fileUrl }}" target="_blank" class="btn btn-primary btn-sm">
                            <i class="bi bi-download me-2"></i>تحميل وعرض الملف
                          </a>
                        </div>
                      </div>
                      @endif
                      @if ($fileExtension === 'pdf')
                      <div class="p-5 text-center bg-white bg-opacity-95 shadow-lg pdf-fallback position-absolute top-50 start-50 translate-middle rounded-4" style="display: none;">
                        <div class="animation-pulse">
                          <i class="mb-4 bi bi-file-earmark-pdf display-1 text-danger"></i>
                        </div>
                        <h5 class="mb-3 text-dark fw-bold">لا يمكن عرض ملف PDF في المتصفح</h5>
                        <a href="{{ $fileUrl }}" target="_blank" class="px-4 py-2 shadow-sm btn btn-danger btn-lg rounded-pill">
                          <i class="bi bi-download me-2"></i>تحميل وعرض الملف
                        </a>
                      </div>
                      @endif
                    </div>
                    <script>
                      setTimeout(() => {
                        const embed = document.querySelector('.pdf-preview embed');
                        const fallback = document.querySelector('.pdf-fallback');
                        if (embed ? .offsetHeight === 0) {
                          embed.style.display = 'none';
                          fallback.style.display = 'block';
                        }
                      }, 1500);

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
                      <div class="mt-3 upload-info">
                        <small class="text-muted d-block">
                          <i class="mdi mdi-file-document me-1"></i>يُقبل ملفات PDF
                        </small>
                        <small class="mt-1 text-muted d-block">
                          الحد الأقصى: 10 ميجابايت
                        </small>
                      </div>
                    </div>
                    @endif
                  </div>
                </label>
                <input wire:model="pdf_file" type="file" id="documentPdfUpload" class="d-none" accept="application/pdf,.doc,.docx,.xls,.xlsx" />
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

              @if ($pdf_file || $pdf_file)
              <button wire:click="emptyy" type="button" class="mt-3 shadow-sm btn btn-outline-danger w-100 rounded-3">
                <i class="mdi mdi-delete me-2"></i>تبديل الملف
              </button>
              @endif
              </div>
            </div>
          </div>


        </div>
      </div>

      <div class="px-5 py-4 border-0 modal-footer bg-light">
        <div class="gap-3 d-flex w-100 justify-content-center">
          <button wire:click='store' wire:loading.attr="disabled" type="button" class="px-4 py-2 shadow-sm btn btn-primary rounded-3">
            <span wire:loading.remove wire:target="store">
              <i class="mdi mdi-content-save-outline me-2"></i>حفظ المستأجر
            </span>
            <span wire:loading wire:target="store">
              <span class="spinner-border spinner-border-sm me-2" role="status"></span>جارٍ الحفظ...
            </span>
          </button>
          <button type="button" class="px-4 py-2 btn btn-outline-secondary rounded-3" data-bs-dismiss="modal">
            <i class="mdi mdi-close-circle-outline me-2"></i>إلغاء
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

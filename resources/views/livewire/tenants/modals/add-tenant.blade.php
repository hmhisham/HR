<!-- Add Tenant Modal -->
<div wire:ignore.self class="modal fade" id="addtenantModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="px-4 py-3 modal-header bg-light">
        <h5 class="modal-title d-flex align-items-center">
          <i class="mdi mdi-plus-circle-outline text-primary me-2"></i>
          إضافة المستأجر
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="p-4 modal-body">
        <div class="row g-3 h-100">
          <!-- File Upload Section - Left Side -->
          <div class="bg-light col-lg-4 border-end d-flex flex-column">
            <div class="p-2 d-flex flex-column">
              <div class="mb-3 d-flex align-items-center">

              </div>

              <!-- File Input and Preview Area -->
              <div wire:loading.remove wire:target="pdf_file" class="flex-grow-1">
                <label for="documentPdfUpload" class="w-100 h-50 d-flex align-items-center justify-content-center" style="cursor: pointer; min-height: 400px;">
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
                    <div class="p-5 text-center upload-content">
                      <div class="mb-4 upload-icon">
                        <i class="bi bi-cloud-arrow-up display-1 text-primary"></i>
                      </div>
                      <h4 class="mb-3 text-dark fw-bold">ارفق ملف الوثيقة</h4>
                      <span class="px-4 py-2 mb-3 badge bg-danger-subtle text-danger rounded-pill">
                        <i class="bi bi-exclamation-circle-fill me-2"></i>مطلوب
                      </span>
                      <div class="mt-3 upload-info">
                        <small class="text-center text-red-700 text-muted d-block">
                          <i class="bi bi-file-earmark me-2"></i>يُقبل ملفات PDF
                        </small>

                      </div>
                    </div>
                    @endif
                  </div>
                </label>
                <input wire:model="pdf_file" type="file" id="documentPdfUpload" class="d-none" accept="application/pdf,.doc,.docx,.xls,.xlsx" />
              </div>


              @error('pdf_file')
              <div class="mt-3 border-0 shadow-sm alert alert-danger">
                <i class="bi bi-exclamation-triangle me-2"></i>{{ $message }}
              </div>
              @enderror

              @if ($pdf_file || $pdf_file)
              <button wire:click="emptyy" type="button" class="mt-3 shadow-sm btn btn-outline-danger w-100">
                <i class="bi bi-trash me-2"></i>تبديل الملف
              </button>
              @endif
            </div>
          </div>

          <!-- Form Inputs Section - Right Side -->
          <div class="col-lg-8 d-flex flex-column">
            <form id="addtenantModalForm" autocomplete="off">
              <div class="row g-3">
                <div class="col-md-6">
                  <div class="form-floating form-floating-outline">
                    <input wire:model.defer='name' type="text" id="modalTenantname" placeholder="اسم المستأجر" class="form-control @error('name') is-invalid is-filled @enderror" />
                    <label for="modalTenantname">اسم المستأجر</label>
                  </div>
                  @error('name')
                  <small class='text-danger inputerror'> {{ $message }} </small>
                  @enderror
                </div>

                <div class="col-md-6">
                  <div class="form-floating form-floating-outline">
                    <input wire:model.defer='phone' type="text" id="modalTenantphone" placeholder="رقم الهاتف" class="form-control @error('phone') is-invalid is-filled @enderror" />
                    <label for="modalTenantphone">رقم الهاتف</label>
                  </div>
                  @error('phone')
                  <small class='text-danger inputerror'> {{ $message }} </small>
                  @enderror
                </div>

                <div class="col-md-6">
                  <div class="form-floating form-floating-outline">
                    <input wire:model.defer='email' type="text" id="modalTenantemail" placeholder="البريد الإلكتروني" class="form-control @error('email') is-invalid is-filled @enderror" />
                    <label for="modalTenantemail">البريد الإلكتروني</label>
                  </div>
                  @error('email')
                  <small class='text-danger inputerror'> {{ $message }} </small>
                  @enderror
                </div>

                <div class="col-md-6">
                  <div class="form-floating form-floating-outline">
                    <input wire:model.defer='address' type="text" id="modalTenantaddress" placeholder="العنوان" class="form-control @error('address') is-invalid is-filled @enderror" />
                    <label for="modalTenantaddress">العنوان</label>
                  </div>
                  @error('address')
                  <small class='text-danger inputerror'> {{ $message }} </small>
                  @enderror
                </div>

                <div class="col-12">
                  <div class="form-floating form-floating-outline">
                    <input wire:model.defer='notes' type="text" id="modalTenantnotes" placeholder="الملاحظات" class="form-control @error('notes') is-invalid is-filled @enderror" />
                    <label for="modalTenantnotes">الملاحظات</label>
                  </div>
                  @error('notes')
                  <small class='text-danger inputerror'> {{ $message }} </small>
                  @enderror
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="modal-footer justify-content-center">
        <button wire:click='store' wire:loading.attr="disabled" type="button" class="btn btn-primary">
          <span wire:loading.remove><i class="mdi mdi-content-save-outline me-1"></i> حفظ</span>
          <span wire:loading><span class="spinner-border spinner-border-sm" role="status"></span> جارٍ الحفظ...</span>
        </button>
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
          <i class="mdi mdi-close-circle-outline me-1"></i> تجاهل
        </button>
      </div>
    </div>
  </div>
</div>
<!--/ Add Tenant Modal -->

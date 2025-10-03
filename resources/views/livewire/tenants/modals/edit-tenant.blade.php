<!-- Edit Tenant Modal -->
<div wire:ignore.self class="modal fade" id="edittenantModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="px-4 py-3 modal-header bg-light">
        <h5 class="modal-title d-flex align-items-center">
          <i class="mdi mdi-pencil-circle-outline text-warning me-2"></i>
          تعديل المستأجر
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
                  <i class="mdi mdi-account-edit-outline text-warning me-2 fs-6"></i>
                  بيانات المستأجر الأساسية
                </h6>
              </div>
              <div class="p-3 card-body">
                <div wire:loading.remove>
                  @if($Tenant)
                  <form id="editTenantModalForm" autocomplete="off">
                    <div class="row g-3">
                      <!-- Name Field -->
                      <div class="col-md-6">
                        <div class="form-floating form-floating-outline">
                          <input value="{{ $Tenant->name ?? '' }}" wire:model.defer='name' type="text" id="editModalTenantname" placeholder="اسم المستأجر" class="form-control @error('name') is-invalid is-filled @enderror" />
                          <label for="editModalTenantname">
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
                          <input value="{{ $Tenant->phone ?? '' }}" wire:model.defer='phone' type="text" id="editModalTenantphone" placeholder="رقم الهاتف" class="form-control @error('phone') is-invalid is-filled @enderror" />
                          <label for="editModalTenantphone">
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
                          <input value="{{ $Tenant->email ?? '' }}" wire:model.defer='email' type="email" id="editModalTenantemail" placeholder="البريد الإلكتروني" class="form-control @error('email') is-invalid is-filled @enderror" />
                          <label for="editModalTenantemail">
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
                          <input value="{{ $Tenant->address ?? '' }}" wire:model.defer='address' type="text" id="editModalTenantaddress" placeholder="العنوان" class="form-control @error('address') is-invalid is-filled @enderror" />
                          <label for="editModalTenantaddress">
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
                          <textarea wire:model.defer='notes' id="editModalTenantnotes" placeholder="الملاحظات" class="form-control @error('notes') is-invalid is-filled @enderror" style="height: 120px; resize: vertical;" oninput="autoExpand(this)">{{ $Tenant->notes ?? '' }}</textarea>
                          <script>
                            function autoExpand(textarea) {
                              textarea.style.height = 'auto';
                              textarea.style.height = textarea.scrollHeight + 'px';
                            }
                          </script>
                          <label for="editModalTenantnotes">
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
                  @else
                  <div class="alert alert-warning" role="alert">
                    لم يتم العثور على المستأجر المطلوب للتعديل.
                  </div>
                  @endif
                </div>
              </div>
            </div>
          </div>

          <!-- PDF Display Section - Right Side -->
          <div class="col-lg-5">
            <div class="border-0 shadow-sm card h-100">
              <div class="px-3 py-2 border-0 card-header bg-light">
                <h6 class="mb-0 card-title d-flex align-items-center justify-content-center">
                  <i class="mdi mdi-file-pdf-box text-danger me-2 fs-6"></i>
                  <span>وثيقة المستأجر</span>
                </h6>
              </div>
              <div class="p-2 card-body">
                <!-- PDF Display Container -->
                <div class="h-100">
                  @if($pdf_file)
                  <!-- PDF Preview Section -->
                  <div class="p-2 border rounded-3 bg-light">
                    <div class="mb-2 text-center">
                      <span class="px-2 py-1 text-success bg-success-subtle rounded-pill fw-bold small">
                        <i class="mdi mdi-check-circle me-1"></i>وثيقة محفوظة
                      </span>
                    </div>

                    <!-- PDF Display -->
                    <div class="pdf-preview-container">
                      <div class="overflow-hidden bg-white border shadow-sm rounded-3">
                        <embed src="{{ asset('storage/' . $pdf_file) }}" type="application/pdf" width="100%" height="320px" style="min-height: 320px; border-radius: 6px;">
                      </div>
                      <div class="mt-2 text-center">
                        <small class="mb-2 text-muted d-block">
                          <i class="mdi mdi-file-pdf-box text-danger me-1"></i>
                          وثيقة المستأجر المحفوظة
                        </small>
                        <a href="{{ asset('storage/' . $pdf_file) }}" target="_blank" class="btn btn-outline-primary btn-sm rounded-pill">
                          <i class="mdi mdi-open-in-new me-1"></i>فتح في نافذة جديدة
                        </a>
                      </div>
                    </div>
                  </div>
                  @else
                  <!-- No Document Message -->
                  <div class="w-100 d-flex align-items-center justify-content-center" style="min-height: 380px;">
                    <div class="border-2 border-dashed rounded-3 w-100 h-100 d-flex align-items-center justify-content-center" style="border-color: #dee2e6;">
                      <div class="p-3 text-center">
                        <div class="mb-2">
                          <i class="mdi mdi-file-pdf-box text-muted" style="font-size: 3rem; opacity: 0.5;"></i>
                        </div>
                        <h6 class="mb-2 text-muted">لا توجد وثيقة محفوظة</h6>
                        <p class="mb-0 text-muted small">لم يتم رفع أي وثيقة لهذا المستأجر</p>
                      </div>
                    </div>
                  </div>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Footer -->
      <div class="px-3 py-2 border-0 modal-footer bg-light">
        <div class="gap-2 d-flex w-100 justify-content-center">
          <button wire:click='update' wire:loading.attr="disabled" type="button" class="px-3 py-2 shadow-sm btn btn-success rounded-pill" @disabled(!$Tenant)>
            <span wire:loading.remove wire:target="update">
              <i class="mdi mdi-check-circle-outline me-2"></i>تحديث بيانات المستأجر
            </span>
            <span wire:loading wire:target="update">
              <span class="spinner-border spinner-border-sm me-2" role="status"></span>
              جارٍ التحديث...
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
<!--/ Edit Tenant Modal -->

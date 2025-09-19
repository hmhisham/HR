<!-- Remove Propertyfolde Modal -->
<div wire:ignore.self class="modal fade" id="removepropertyfoldeModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="p-4 modal-content p-md-5">
      <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
      <div class="modal-body p-md-0">
        <div class="mb-4 text-center mt-n4">
          <h3 class="pb-1 mb-2 text-danger">
            <i class="tf-icons mdi mdi-home-remove me-2"></i>حذف اضبارة العقار
          </h3>
     
        </div>
        <hr class="mt-n2">

        <div wire:loading.remove wire:target="GetPropertyfolde, destroy">

          <form id="removePropertyfoldeModalForm" onsubmit="return false" autocomplete="off">
            <div class="row row-cols-1">
              <div class="mb-3 col">
                <div Class="row">
                  <div class="mb-3 col">
                    <div class="text-center">
                      <label class="fs-4 text-danger">رقم الاضبارة: {{ $folder_number }}</label>
                    </div>
                    @error('folder_number')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                    @enderror
                  </div>
                </div>

              </div>
              <hr class="my-0">
              <div class="d-flex justify-content-center col-12 demo-vertical-spacing mb-n4">
                <button wire:click='destroy' type="submit" class="flex-fill btn btn-danger me-sm-3 me-1">
                  <i class="tf-icons mdi mdi-delete me-1"></i>حذف
                </button>
                <button type="reset" class="flex-fill btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                  <i class="tf-icons mdi mdi-close me-1"></i>تجاهل
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Delete Propertyfolde Modal -->


    <!-- Remove Propertyfolde Modal -->
    <div wire:ignore.self class="modal fade" id="removepropertyfoldeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="p-4 modal-content p-md-5">
                <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body p-md-0">
                    <div class="mb-4 text-center mt-n4">
                        <h3 class="pb-1 mb-2">اضبارة العقار حذف </h3>
                        <p>نافذة الحذف</p>
                    </div>
                    <hr class="mt-n2">

                    <div wire:loading.remove wire:target="GetPropertyfolde, destroy" >

                    <form id="removePropertyfoldeModalForm" onsubmit="return false" autocomplete="off">
                        <div class="row row-cols-1">
                            <div class="col mb-3"> 
                             <div Class="row">
    
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='folder_number' type="text" id="modalPropertyfoldefolder_number" placeholder="رقم الاضبارة"
                        class="form-control @error('folder_number') is-invalid is-filled @enderror" />
                    <label for="modalPropertyfoldefolder_number">رقم الاضبارة</label>
                </div>
                @error('folder_number')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
              </div>
                                            <div Class="row">
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='property_name' type="text" id="modalPropertyfoldeproperty_name" placeholder="اسم العقار"
                        class="form-control @error('property_name') is-invalid is-filled @enderror" />
                    <label for="modalPropertyfoldeproperty_name">اسم العقار</label>
                </div>
                @error('property_name')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                             </div>
                        </div>
                        <hr class="my-0">
                        <div class="d-flex justify-content-center col-12 demo-vertical-spacing mb-n4">
                                <button wire:click='destroy' type="submit"class="flex-fill btn btn-danger me-sm-3 me-1">حذف </button>
                                 <button type="reset" class="flex-fill btn btn-outline-secondary" data-bs-dismiss="modal"
                                 aria-label="Close">تجاهل</button>
                            </div>
                       </div>
                    </form>
                </div>
            </div>
        </div>
     </div>
    </div>
    <!--/ Delete Propertyfolde Modal -->
    
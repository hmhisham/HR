
    <!-- Edite Propertyfolde Modal -->
    <div wire:ignore.self class="modal fade" id="editpropertyfoldeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="p-4 modal-content p-md-5">
                <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body p-md-0">
                    <div class="mb-4 text-center mt-n4">
                        <h3 class="pb-1 mb-2">تعديل\ اضبارة العقار</h3>
                        <p>نافذة التعديل</p>
                    </div>
                    <hr class="mt-n2">
                    <h5 wire:loading wire:target="GetPropertyfolde" wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                    <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">جار حفظ البيانات...</h5>

                    <div wire:loading.remove>
                    <form id="editPropertyfoldeModalForm" autocomplete="off">
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
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='id_property_location' type="text" id="modalPropertyfoldeid_property_location" placeholder="موقع العقار"
                        class="form-control @error('id_property_location') is-invalid is-filled @enderror" />
                    <label for="modalPropertyfoldeid_property_location">موقع العقار</label>
                </div>
                @error('id_property_location')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='id_property_type' type="text" id="modalPropertyfoldeid_property_type" placeholder="نوع العقار"
                        class="form-control @error('id_property_type') is-invalid is-filled @enderror" />
                    <label for="modalPropertyfoldeid_property_type">نوع العقار</label>
                </div>
                @error('id_property_type')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
              </div>
                                <div Class="row">
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='id_property_description' type="text" id="modalPropertyfoldeid_property_description" placeholder="صفة العقار"
                        class="form-control @error('id_property_description') is-invalid is-filled @enderror" />
                    <label for="modalPropertyfoldeid_property_description">صفة العقار</label>
                </div>
                @error('id_property_description')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='property_area' type="text" id="modalPropertyfoldeproperty_area" placeholder="مساحة العقار"
                        class="form-control @error('property_area') is-invalid is-filled @enderror" />
                    <label for="modalPropertyfoldeproperty_area">مساحة العقار</label>
                </div>
                @error('property_area')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='plot_number' type="text" id="modalPropertyfoldeplot_number" placeholder="رقم القطعة"
                        class="form-control @error('plot_number') is-invalid is-filled @enderror" />
                    <label for="modalPropertyfoldeplot_number">رقم القطعة</label>
                </div>
                @error('plot_number')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
              </div>
                                <div Class="row">
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='district_name' type="text" id="modalPropertyfoldedistrict_name" placeholder="اسم المقاطعة"
                        class="form-control @error('district_name') is-invalid is-filled @enderror" />
                    <label for="modalPropertyfoldedistrict_name">اسم المقاطعة</label>
                </div>
                @error('district_name')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='notes' type="text" id="modalPropertyfoldenotes" placeholder="الملاحظات"
                        class="form-control @error('notes') is-invalid is-filled @enderror" />
                    <label for="modalPropertyfoldenotes">الملاحظات</label>
                </div>
                @error('notes')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='property_files' type="text" id="modalPropertyfoldeproperty_files" placeholder="الملفات"
                        class="form-control @error('property_files') is-invalid is-filled @enderror" />
                    <label for="modalPropertyfoldeproperty_files">الملفات</label>
                </div>
                @error('property_files')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                        </div>
                    </div>  </div>
                </div>
                <hr class="my-0">
                <div class="text-center col-12 demo-vertical-spacing mb-n4">
                    <button wire:click='update' wire:loading.attr="disabled" type="button" class="btn btn-success me-sm-3 me-1">تعديل</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                        aria-label="Close">تجاهل</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    <!--/ Edite Propertyfolde Modal -->
    
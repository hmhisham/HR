<!-- Edit Propertyfolde Modal -->
<div wire:ignore.self class="modal fade" id="editpropertyfoldeModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="p-4 modal-content p-md-5">
      <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
      <div class="modal-body p-md-0">
        <div class="mb-4 text-center mt-n4">
          <h3 class="pb-1 mb-2 text-success">
            <i class="tf-icons mdi mdi-home-edit me-2"></i>تعديل العقار
          </h3>
        </div>

        <form id="editPropertyfoldeModalForm" autocomplete="off">
          <div class="row row-cols-1">
            <div class="mb-3 col">
              <div class="row">

                <div class="mb-3 col">
                  <div class="form-floating form-floating-outline">
                    <input wire:model='folder_number' type="text" id="modalPropertyfoldefolder_number" placeholder="رقم الاضبارة" class="form-control @error('folder_number') is-invalid is-filled @enderror" />
                    <label for="modalPropertyfoldefolder_number">رقم الاضبارة</label>
                  </div>
                  @error('folder_number')
                  <small class='text-danger inputerror'> {{ $message }} </small>
                  @enderror
                </div>

                <div class="mb-3 col">
                  <div class="form-floating form-floating-outline">
                    <input wire:model='property_name' type="text" id="modalPropertyfoldeproperty_name" placeholder="اسم العقار" class="form-control @error('property_name') is-invalid is-filled @enderror" />
                    <label for="modalPropertyfoldeproperty_name">اسم العقار</label>
                  </div>
                  @error('property_name')
                  <small class='text-danger inputerror'> {{ $message }} </small>
                  @enderror
                </div>

                <div class="mb-3 col">
                  <div class="form-floating form-floating-outline">
                    <select wire:model='id_property_location' id="editPropertyfoldeid_property_location" class="form-select @error('id_property_location') is-invalid is-filled @enderror">
                      <option value="">موقع العقار</option>
                      @if(isset($provinces) && !empty($provinces) && (is_array($provinces) || is_object($provinces)))
                      @foreach ($provinces as $province)
                      <option value="{{ $province->id }}">{{ $province->province_name }}
                      </option>
                      @endforeach
                      @endif
                    </select>
                  </div>
                  @error('id_property_location')
                  <small class='text-danger inputerror'>{{ $message }}</small>
                  @enderror
                </div>

              </div>
              <div class="row">

                <div class="mb-3 col">
                  <div class="form-floating form-floating-outline">
                    <select wire:model='id_property_type' id="editPropertyfoldeid_property_type" class="form-select @error('id_property_type') is-invalid is-filled @enderror">
                      <option value="">نوع العقار</option>
                      @if(isset($propertyTypes) && !empty($propertyTypes) && (is_array($propertyTypes) || is_object($propertyTypes)))
                      @foreach ($propertyTypes as $type)
                      <option value="{{ $type->id }}" {{ $id_property_type == $type->id ? 'selected' : '' }}>{{ $type->type_name }}</option>
                      @endforeach
                      @endif
                    </select>
                  </div>
                  @error('id_property_type')
                  <small class='text-danger inputerror'> {{ $message }} </small>
                  @enderror
                </div>

                <div class="mb-3 col">
                  <div class="form-floating form-floating-outline">
                    <select wire:model='id_property_description' id="editPropertyfoldeid_property_description" class="form-select @error('id_property_description') is-invalid is-filled @enderror">
                      <option value="">صفة العقار</option>
                      @if(isset($propertyCategories) && !empty($propertyCategories) && (is_array($propertyCategories) || is_object($propertyCategories)))
                      @foreach ($propertyCategories as $category)
                      <option value="{{ $category->id }}" {{ $id_property_description == $category->id ? 'selected' : '' }}>{{ $category->category }}
                      </option>
                      @endforeach
                      @endif
                    </select>
                  </div>
                  @error('id_property_description')
                  <small class='text-danger inputerror'> {{ $message }} </small>
                  @enderror
                </div>

              </div>
              <div class="row">

                <div class="mb-3 col">
                  <div class="form-floating form-floating-outline">
                    <select wire:model='district_name' id="editPropertyfoldedistrict_name" class="form-select select2-province @error('district_name') is-invalid is-filled @enderror">
                      <option value="">اختر المقاطعة</option>
                      @if(isset($provinces) && !empty($provinces) && (is_array($provinces) || is_object($provinces)))
                      @foreach ($provinces as $province)
                      <option value="{{ $province->province_number }}" {{ $district_name == $province->province_number ? 'selected' : '' }}>
                        مقاطعة {{ $province->province_number }} - {{ $province->province_name }}
                      </option>
                      @endforeach
                      @endif
                    </select>
                  </div>
                  @error('district_name')
                  <small class='text-danger inputerror'> {{ $message }} </small>
                  @enderror
                </div>

                <div class="mb-3 col">
                  <div class="form-floating form-floating-outline">
                    <input wire:model='property_area' type="text" id="modalPropertyfoldeproperty_area" placeholder="مساحة العقار" class="form-control @error('property_area') is-invalid is-filled @enderror" />
                    <label for="modalPropertyfoldeproperty_area">مساحة العقار</label>
                  </div>
                  @error('property_area')
                  <small class='text-danger inputerror'> {{ $message }} </small>
                  @enderror
                </div>

                <div class="mb-3 col">
                  <div class="form-floating form-floating-outline">
                    <input wire:model='plot_number' type="text" id="modalPropertyfoldeplot_number" placeholder="رقم القطعة" class="form-control @error('plot_number') is-invalid is-filled @enderror" />
                    <label for="modalPropertyfoldeplot_number">رقم القطعة</label>
                  </div>
                  @error('plot_number')
                  <small class='text-danger inputerror'> {{ $message }} </small>
                  @enderror
                </div>

              </div>
              <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                  <input wire:model='notes' type="text" id="modalPropertyfoldenotes" placeholder="الملاحظات" class="form-control @error('notes') is-invalid is-filled @enderror" />
                  <label for="modalPropertyfoldenotes">الملاحظات</label>
                </div>
                @error('notes')
                <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
              </div>
            </div>
          </div>
          <hr class="my-0">
          <div class="text-center col-12 demo-vertical-spacing mb-n4">
            <button wire:click='update' type="button" class="btn btn-success me-sm-3 me-1">
              <i class="tf-icons mdi mdi-pencil me-1"></i>تعديل
            </button>
            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
              <i class="tf-icons mdi mdi-close me-1"></i>تجاهل
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--/ Edit Propertyfolde Modal -->

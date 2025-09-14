<!-- Remove Propertylocatio Modal -->
<div wire:ignore.self class="modal fade" id="removepropertylocatioModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2 text-danger">حذف موقع العقار</h3>
                </div>
                <hr class="mt-n2">

                <div wire:loading.remove wire:target="GetPropertylocatio, destroy">

                    <form id="removePropertylocatioModalForm" onsubmit="return false" autocomplete="off">
                        <div class="row row-cols-1">
                            <div class="mb-3 col">
                                <div Class="row">

                                    <div class="mb-3 col">
                                        <div class="form-group">

                                            <label class="form-control-plaintext" style="font-size: 16px"> موقع العقار: {{ $property_location }}  </label>
                                        </div>
                                        @error('property_location')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <hr class="my-0">
                            <div class="d-flex justify-content-center col-12 demo-vertical-spacing mb-n4">
                                <button wire:click='destroy'
                                    type="submit"class="flex-fill btn btn-danger me-sm-3 me-1">حذف </button>
                                <button type="reset" class="flex-fill btn btn-outline-secondary"
                                    data-bs-dismiss="modal" aria-label="Close">تجاهل</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Delete Propertylocatio Modal -->

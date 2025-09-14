<!-- Add Propertylocatio Modal -->
<div wire:ignore.self class="modal fade" id="addpropertylocatioModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">اضافة </h3>
                    <p>نافذة الأضافة </p>
                </div>
                <hr class="mt-n2">
                <form id="addpropertylocatioModalForm" autocomplete="off">
                    <div class="row row-cols-1">
                        <div class="mb-3 col">
                            <div Class="row">

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='property_location' type="text"
                                            id="modalPropertylocatioproperty_location" placeholder="موقع العقار"
                                            class="form-control @error('property_location') is-invalid is-filled @enderror" />
                                        <label for="modalPropertylocatioproperty_location">موقع العقار</label>
                                    </div>
                                    @error('property_location')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="text-center col-12 demo-vertical-spacing mb-n4">
                        <button wire:click='store' wire:loading.attr="disabled" type="button"
                            class="btn btn-primary me-sm-3 me-1">
                            <i class="mdi mdi-database-plus-outline me-1"></i>

                            اضافة فئة
                        </button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="mdi mdi-close me-1"></i>
                         
                            تجاهل
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ Add Propertylocatio Modal -->

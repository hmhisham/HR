<!-- Edite Propertytyperente Modal -->
<div wire:ignore.self class="modal fade" id="editpropertytyperenteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل  نوع العقار المؤجر</h3>

                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetPropertytyperente"
                    wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حفظ البيانات...</h5>

                <div wire:loading.remove>
                    <form id="editPropertytyperenteModalForm" autocomplete="off">
                        <div class="row row-cols-1">
                            <div class="mb-3 col">
                                <div Class="row">

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='property_type_rented' type="text"
                                                id="modalPropertytyperenteproperty_type_rented"
                                                placeholder="نوع عقار المؤجر"
                                                class="form-control @error('property_type_rented') is-invalid is-filled @enderror" />
                                            <label for="modalPropertytyperenteproperty_type_rented">نوع عقار
                                                المؤجر</label>
                                        </div>
                                        @error('property_type_rented')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>
                </div>
                <hr class="my-0">
                <div class="text-center col-12 demo-vertical-spacing mb-n4">
                    <button wire:click='update' wire:loading.attr="disabled" type="button"
                        class="btn btn-success me-sm-3 me-1">
                        <i class="mdi mdi-content-save me-1"></i>

                        </i>تعديل
                    </button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                        aria-label="Close">
                                <i class="mdi mdi-close me-1"></i>
                            </i>تجاهل
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ Edite Propertytyperente Modal -->

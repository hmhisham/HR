<!-- Remove Realitie Modal -->
<div wire:ignore.self class="modal fade" id="deleteRealitieModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">حذف السندات العقارية</h3>
                    <p>نافذة الحذف</p>
                </div>
                <hr class="mt-n2">
                {{-- <h5 wire:loading wire:target="GetRealitie"
                    wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="destroy" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حذف البيانات...</h5> --}}

                <div wire:loading.remove wire:target="destroy, GetRealitie">
                    <div class="row">
                        <div wire:loading.remove wire:target='addRealitieToPlotModal' class="text-center">
                            <div class="alert alert-danger" role="alert">
                                <h5 class="pb-1 mb-2">
                                    <strong>رقم واسم المقاطعة:</strong>
                                    <span style="color: red;">{{ $this->province_number }} -
                                        {{ $this->province_name }}</span>
                                    <strong style="margin: 0 20px;">|</strong>
                                    <strong>رقم القطعة:</strong>
                                    <span style="color: red;">{{ $this->plot_number }}</span>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <form id="removeRealitieModalForm" onsubmit="return false" autocomplete="off">
                        <div Class="row">
                            <div class="row">
                                <div class="col text-center">
                                    <div class="text-danger">
                                        <label for="modalRealitieproperty_number">رقم السند العقاري</label>
                                        <div class="form-control-plaintext mt-n2">{{ $property_number }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-0">
                        <div class="d-flex justify-content-center col-12 demo-vertical-spacing mb-n4">
                            <button wire:click='destroy' type="submit"class="flex-fill btn btn-danger me-sm-3 me-1">حذف
                            </button>
                            <button type="reset" class="flex-fill btn btn-outline-secondary" data-bs-dismiss="modal"
                                aria-label="Close">تجاهل</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Delete Realitie Modal -->

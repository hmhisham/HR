<!-- Add Province Modal -->
<div wire:ignore.self class="modal fade" id="removePlotModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div wire:loading.remove wire:target="destroy, GetPlot">
                    <div class="mb-4 text-center mt-n4">
                        <h4 class="pb-1 mb-2">حذف بيانات القطعة</h4>
                        <div class="mb-3 col text-center">
                            <div class="form-floating form-floating-outline">
                                <div class="alert alert-danger" role="alert">
                                    <h5 class="pb-1 mb-2"><strong>رقم واسم المقاطعة:</strong> <span
                                            style="color: red;">{{ $this->Province->province_number ?? '' }} -
                                            {{ $this->Province->province_name ?? '' }}</span>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form id="removePlotModalForm" autocomplete="off">
                        <div Class="row">
                            <div class="row">
                                <div class="col text-center">
                                    <div class="text-danger">
                                        <label for="modalUnitunits_name">رقم القطعة</label>
                                        <div class="form-control-plaintext mt-n2">{{ $plot_number }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-0">

                        <div class="text-center col-12 demo-vertical-spacing mb-n4">
                            <button wire:click='destroy' wire:loading.attr="disabled" type="button"
                                class="btn btn-danger me-sm-3 me-1">حذف</button>
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                aria-label="Close">تجاهل</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ remove Plot Modal -->

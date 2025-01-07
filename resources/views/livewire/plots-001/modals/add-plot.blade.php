<!-- Add plot Modal -->
<div wire:ignore.self class="modal fade" id="addplotModal{{ $Province->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">اضافة قطعة جديد</h3>
                    <p>نافذة الأضافة </p>
                </div>

                <hr class="mt-n2">

                <form id="addplotModalForm" autocomplete="off">
                    <div class="row bg-label-primary">
                        <div class="col">
                            <label class="mb-2 text-center border-bottom-2 w-100">رقم واسم المقاطعة</label>
                            <div wire:loading wire:target='AddPlotModal'
                                wire:loading.class="d-flex justify-content-center">
                                <span class="mdi mdi-loading mdi-spin mdi-24px"></span>
                            </div>
                            <div wire:loading.remove wire:target='AddPlotModal' class="text-center">
                                <span>{{ $Province->province_number ?? '' }}</span> -
                                <span>{{ $Province->province_name ?? '' }}</span>
                            </div>
                        </div>
                    </div>

                    <hr class="">

                    <div class="row">
                        <div class="mb-3 col">
                            <div class="form-floating form-floating-outline">
                                <input wire:model.defer='plot_name' type="text" id="modalplotplot_name"
                                    placeholder="رقم القطعة"
                                    class="form-control @error('plot_name') is-invalid is-filled @enderror"
                                    onkeypress="return onlyNumberKey(event)" />
                                <label for="modalplotplot_name">رقم القطعة</label>
                            </div>
                            @error('plot_name')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>

                    <hr class="my-0">

                    <div class="text-center col-12 demo-vertical-spacing mb-n4">
                        <button wire:click='store' wire:loading.attr="disabled" type="button"
                            class="btn btn-primary me-sm-3 me-1">اضافة</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                            aria-label="Close">تجاهل</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ Add plot Modal -->

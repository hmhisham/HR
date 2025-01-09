<!-- Add Province Modal -->
<div wire:ignore.self class="modal fade" id="deletePlotModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">حذف قطعة أرض</h3>
                </div>

                <hr class="mt-n2">

                {{-- <h5 wire:loading wire:target="GetProvince" wire:loading.class="d-flex justify-content-center">
                    جار معالجة البيانات...
                </h5>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center">
                    جار حفظ البيانات
                </h5> --}}

                <div wire:loading wire:target="destroy, GetPlot" wire:loading.class="d-flex justify-content-center">
                    <img src="{{ asset('assets/img/gif/Cube-Loading-Animated-3D.gif') }}" style="height: 150px" alt="">
                </div>

                <div wire:loading.remove wire:target="destroy, GetPlot">
                    <div Class="row mb-4">
                        <div class="col text-center alert alert-outline-dark mb-0 pb-0">
                            <label class="w-100 mb-1">رقم وأسم المقاطعة</label>
                            <hr class="m-0 mb-1">
                            <h5 class="">{{ $this->Province->province_number }} - {{ $this->Province->province_name }}</h5>
                        </div>
                    </div>

                    <form id="addprovinceModalForm" autocomplete="off">
                        <div Class="row">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='plot_number' type="text"
                                        id="editPlot_number" placeholder="رقم القطعة"
                                        class="form-control @error('plot_number') is-invalid is-filled @enderror"
                                        onkeypress="return onlyNumberKey(event)" />
                                    <label for="plot_number">رقم القطعة</label>
                                </div>
                                @error('plot_number')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
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
<!--/ Add Province Modal -->
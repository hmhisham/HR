<!-- Add Province Modal -->
<div wire:ignore.self class="modal fade" id="editPlotModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل بيانات القطعة</h3>
                </div>

                <hr class="mt-n2">

                {{-- <h5 wire:loading wire:target="GetProvince" wire:loading.class="d-flex justify-content-center">
                    جار معالجة البيانات...
                </h5>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center">
                    جار حفظ البيانات
                </h5> --}}

                {{--  <div wire:loading wire:target="update, GetPlot" wire:loading.class="d-flex justify-content-center">
                    <img src="{{ asset('assets/img/gif/Cube-Loading-Animated-3D.gif') }}" style="height: 150px" alt="">
                </div> --}}

                <div wire:loading.remove wire:target="update, GetPlot">
                    {{-- <div Class="row mb-4">
                        <div class="col text-center alert alert-outline-dark mb-0 pb-0">
                            <label class="w-100 mb-1">رقم وأسم المقاطعة</label>
                            <hr class="m-0 mb-1">
                            <h5 class="">{{ $this->Province->province_number }} - {{ $this->Province->province_name }}</h5>
                        </div>
                    </div> --}}

                    <div class="row">
                        <div class="mb-3 col text-center">
                            <div class="form-floating form-floating-outline">
                                <div class="alert alert-success" role="alert">
                                    <h5 class="pb-1 mb-2"><strong>رقم واسم المقاطعة:</strong> <span
                                            style="color: red;">{{ $this->Province->province_number ?? '' }} -
                                            {{ $this->Province->province_name ?? '' }}</span>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form id="addprovinceModalForm" autocomplete="off">
                        <div Class="row">
                            <div class="col mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='plot_number' type="text" id="editPlot_number"
                                        placeholder="رقم القطعة"
                                        class="form-control @error('plot_number') is-invalid is-filled @enderror"
                                        onkeypress="return onlyNumberKey(event)" />
                                    <label for="plot_number">رقم القطعة</label>
                                </div>
                                @error('plot_number')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>

                            {{-- <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <select wire:model.defer='specialized_department'
                                        id="modalPlorspecialized_department"
                                        class="form-select @error('specialized_department') is-invalid is-filled @enderror">
                                        <option value="">اختر</option>
                                        <option value="شعبة العقارات">شعبة العقارات</option>
                                        <option value="شعبة الاملاك">شعبة الاملاك</option>
                                        <option value="شعبة اسكان المؤاني">شعبة اسكان المؤاني</option>
                                    </select>
                                    <label for="modalPlotspecialized_department">الشعبة المختصة</label>
                                </div>
                                @error('specialized_department')
                                    <small class='text-danger inputerror'>{{ $message }}</small>
                                @enderror
                            </div> --}}

                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <select wire:model.defer='specialized_department' id="editPlotspecialized_department"
                                        class="form-select @error('specialized_department') is-invalid is-filled @enderror">
                                        <option value=""></option>
                                        @foreach ($branches as $branch)
                                            <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="modalPlotspecialized_department">الشعبة المختصة</label>
                                </div>
                                @error('specialized_department')
                                    <small class='text-danger inputerror'>{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 col">
                                <div class="form-check form-switch">
                                    <input wire:model.defer='visibility' type="checkbox" id="modalPlotvisibility"
                                        class="form-check-input @error('visibility') is-invalid is-filled @enderror" />
                                    <label for="modalPlotvisibility" class="form-check-label">إمكانية
                                        ظهوره</label>
                                </div>
                                @error('visibility')
                                    <small class='text-danger inputerror'>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div Class="row">
                            <div class="col mb-3" style="height: 350px;">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='property_deed_image' type="file"
                                        id="property_deed_image" accept=".jpeg,.png,.jpg,.pdf"
                                        class="form-control @error('property_deed_image') is-invalid is-filled @enderror" />
                                    <label for="property_deed_image">صورة السند العقاري</label>
                                </div>
                                @error('property_deed_image')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror

                                <div class="d-flex justify-content-center text-center">
                                    <div wire:loading wire:target='property_deed_image' class="mt-3">
                                        <img src="{{ asset('assets/img/gif/Cube-Loading-Animated-3D.gif') }}"
                                            style="height: 150px" alt="">
                                    </div>
                                    <div wire:loading.remove wire:target='property_deed_image' class="mt-3">
                                        @if ($filePreviewDeep)
                                            @if ($property_deed_image && $property_deed_image->getClientOriginalExtension() == strtolower('pdf'))
                                                <embed src="{{ $filePreviewDeep }}" type="application/pdf"
                                                    width="100%" height="300px" />
                                            @else
                                                <img src="{{ $filePreviewDeep }}" alt="Selected Image" class="img-fluid"
                                                    width="100%" height="300px" />
                                            @endif
                                        @endif

                                        @if ($previewPropertyDeedImage && empty($filePreviewDeep))
                                            @if (pathinfo($previewPropertyDeedImage, PATHINFO_EXTENSION) == strtolower('pdf'))
                                                <embed
                                                    src="{{ asset('storage/Plots/' . $plot_number . '/' . $previewPropertyDeedImage) }}"
                                                    type="application/pdf" width="100%" height="300px" />
                                            @else
                                                <img src="{{ asset('storage/Plots/' . $plot_number . '/' . $previewPropertyDeedImage) }}"
                                                    alt="Selected Image" class="img-fluid" width="100%"
                                                    height="300px" />
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="col mb-3" style="height: 350px;">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='property_map_image' type="file" id="property_map_image"
                                        accept=".jpeg,.png,.jpg,.pdf"
                                        class="form-control @error('property_map_image') is-invalid is-filled @enderror" />
                                    <label for="property_map_image">صوره الخارطة العقارية</label>
                                </div>
                                @error('property_map_image')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror

                                <div class="d-flex justify-content-center text-center">
                                    <div wire:loading wire:target='property_map_image' class="mt-3">
                                        <img src="{{ asset('assets/img/gif/Cube-Loading-Animated-3D.gif') }}"
                                            style="height: 150px" alt="">
                                    </div>
                                    <div wire:loading.remove wire:target='property_map_image' class="mt-3">
                                        @if ($filePreviewMap)
                                            @if ($property_map_image->getClientOriginalExtension() == strtolower('pdf'))
                                                <embed src="{{ $filePreviewMap }}" type="application/pdf"
                                                    width="100%" height="300px" />
                                            @else
                                                <img src="{{ $filePreviewMap }}" alt="Selected Image"
                                                    class="img-fluid" width="100%" height="300px" />
                                            @endif
                                        @endif

                                        @if ($previewPropertyMapImage && !$filePreviewMap)
                                            @if (pathinfo($previewPropertyMapImage, PATHINFO_EXTENSION) == strtolower('pdf'))
                                                <embed
                                                    src="{{ asset('storage/Plots/' . $plot_number . '/' . $previewPropertyMapImage) }}"
                                                    type="application/pdf" width="100%" height="300px" />
                                            @else
                                                <img src="{{ asset('storage/Plots/' . $plot_number . '/' . $previewPropertyMapImage) }}"
                                                    alt="Selected Image" class="img-fluid" width="100%"
                                                    height="300px" />
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-0">

                        <div class="text-center col-12 demo-vertical-spacing mb-n4">
                            <button wire:click='update' wire:loading.attr="disabled" type="button"
                                class="btn btn-primary me-sm-3 me-1">تعديل</button>
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

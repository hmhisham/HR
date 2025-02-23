<!-- Edite Realitie Modal -->
<div wire:ignore.self class="modal fade" id="editRealitieModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل السندات العقارية</h3>
                    {{-- <p>نافذة التعديل</p> --}}
                </div>
                <hr class="mt-n2">
                <div wire:loading.remove wire:target="update, GetRealitie">
                    <div class="row">
                        <div wire:loading.remove wire:target='addRealitieToPlotModal' class="text-center">
                            <div class="alert alert-success" role="alert">
                                <h5 class="pb-1 mb-2">
                                    <strong>رقم واسم المقاطعة:</strong>
                                    <span style="color: red;">{{ $province_number ?? '' }} -
                                        {{ $province_name ?? '' }}</span>
                                    <strong style="margin: 0 30px;">|</strong>
                                    <strong>رقم القطعة:</strong>
                                    <span style="color: red;">{{ $plot_number ?? '' }}</span>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <form id="editRealitieModalForm" autocomplete="off">
                        <div class="row">
                            <div class="col-8">
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='property_number' type="text"
                                                id="modalRealitieproperty_number" placeholder="رقم العقار"
                                                class="form-control @error('property_number') is-invalid is-filled @enderror"
                                                onkeypress="return onlyNumberKey(event)" />
                                            <label for="modalRealitieproperty_number">رقم العقار</label>
                                        </div>
                                        @error('property_number')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='propertycategory_id'
                                                id="editRealitiepropertycategory_id"
                                                class="form-select @error('propertycategory_id') is-invalid is-filled @enderror">
                                                <option value=""></option>
                                                @foreach ($propertycategory as $propertycategor)
                                                    <option value="{{ $propertycategor->id }}">
                                                        {{ $propertycategor->category }}</option>
                                                @endforeach
                                            </select>
                                            <label for="modalRealitiepropertycategory_id">نوع العقار</label>
                                        </div>
                                        @error('propertycategory_id')
                                            <small class='text-danger inputerror'>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='property_type' id="editRealitieproperty_type"
                                                class="form-select @error('property_type') is-invalid is-filled @enderror">
                                                <option value="">اختر</option>
                                                @foreach ($propertytypes as $propertytype)
                                                    <option value="{{ $propertytype->id }}">
                                                        {{ $propertytype->type_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="modalRealitieproperty_type">جنس العقار</label>
                                        </div>
                                        @error('property_type')
                                            <small class='text-danger inputerror'>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer="mortgage_notes" id="modalRealitiemortgage_notes"
                                                class="form-select @error('mortgage_notes') is-invalid is-filled @enderror">
                                                <option value="">اختر</option>
                                                <option value="رفع الحجز">رفع الحجز</option>
                                                <option value="عدم التصرف بالعقار الا بموافقة الموانئ">عدم التصرف
                                                    بالعقار الا
                                                    بموافقة الموانئ</option>
                                            </select>
                                            <label for="modalRealitiemortgage_notes">اشارة التأمينات</label>
                                        </div>
                                        @error('mortgage_notes')
                                            <small class="text-danger inputerror">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='area_in_meters' type="text"
                                                id="modalRealitiearea_in_meters" placeholder="المساحة بالمتر"
                                                class="form-control @error('area_in_meters') is-invalid is-filled @enderror"
                                                onkeypress="return onlyNumberKey1(event)"
                                                oninput="validateMeterInput(event)" />
                                            <label for="modalRealitiearea_in_meters">المساحة بالمتر</label>
                                        </div>
                                        @error('area_in_meters')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='area_in_olok' type="text"
                                                id="modalRealitiearea_in_olok" placeholder="المساحة بالأولك"
                                                class="form-control @error('area_in_olok') is-invalid is-filled @enderror"
                                                onkeypress="return onlyNumberKey1(event)"
                                                oninput="validateOlokInput(event)" />
                                            <label for="modalRealitiearea_in_olok">المساحة بالأولك</label>
                                        </div>
                                        @error('area_in_olok')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='area_in_donum' type="text"
                                                id="modalRealitiearea_in_donum" placeholder="المساحة بالدونم"
                                                class="form-control @error('area_in_donum') is-invalid is-filled @enderror"
                                                onkeypress="return onlyNumberKey1(event)" />
                                            <label for="modalRealitiearea_in_donum">المساحة بالدونم</label>
                                        </div>
                                        @error('area_in_donum')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='count' type="text" id="modalRealitiecount"
                                                placeholder="العدد"
                                                class="form-control @error('count') is-invalid is-filled @enderror"
                                                onkeypress="return onlyNumberKey(event)" />
                                            <label for="modalRealitiecount">العدد</label>
                                        </div>
                                        @error('count')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:ignore wire:model.defer='date' type="text" id="editDate"
                                                placeholder="التاريخ"
                                                class="form-control @error('date') is-invalid is-filled @enderror" />
                                            <label for="modalRealitiedate">التاريخ</label>
                                        </div>
                                        @error('date')
                                            <small class='text-danger inputerror'>{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='volume_number' type="text"
                                                id="modalRealitievolume_number" placeholder="رقم الجلد"
                                                class="form-control @error('volume_number') is-invalid is-filled @enderror"
                                                onkeypress="return onlyNumberKey(event)" />
                                            <label for="modalRealitievolume_number">رقم الجلد</label>
                                        </div>
                                        @error('volume_number')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='ownership' id="modalRealitieownership"
                                                class="form-control @error('ownership') is-invalid is-filled @enderror">
                                                <option value="">اختر العائدية</option>
                                                <option value="الشركة العامة لموانئ العراق">الشركة العامة لموانئ
                                                    العراق
                                                </option>
                                                <option value="المنشأة العامة لموانئ العراق">المنشأة العامة لموانئ
                                                    العراق</option>
                                                <option value="المؤسسة العامة للموانئ العراقية">المؤسسة العامة للموانئ
                                                    العراقية</option>
                                                <option value="مصلحة الموانئ العراقية">مصلحة الموانئ العراقية</option>
                                                <option value="مديرية بلدية البصرة">مديرية بلدية البصرة</option>
                                            </select>
                                            <label for="modalRealitieownership">العائدية</label>
                                        </div>
                                        @error('ownership')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='registered_office'
                                                id="modalRealitieregistered_office"
                                                class="form-control @error('registered_office') is-invalid is-filled @enderror">
                                                <option value="">اختر الدائرة المسجل لديها</option>
                                                <option value="مديرية التسجيل العقاري الاولى">مديرية التسجيل العقاري
                                                    الاولى
                                                </option>
                                                <option value="مديرية التسجيل العقاري الثانية">مديرية التسجيل العقاري
                                                    الثانية</option>
                                                <option value="مديرية التسجيل العقاري الثالثة">مديرية التسجيل العقاري
                                                    الثالثة</option>
                                                <option value="ملاحظية التسجيل العقاري في شط العرب">ملاحظية التسجيل
                                                    العقاري
                                                    في شط العرب</option>
                                                <option value="ملاحظية التسجيل العقاري في ابي الخصيب">ملاحظية التسجيل
                                                    العقاري في ابي الخصيب</option>
                                                <option value="ملاحظية التسجيل العقاري في سفوان">ملاحظية التسجيل
                                                    العقاري في
                                                    سفوان</option>
                                                <option value="ملاحظية التسجيل العقاري في الصادق">ملاحظية التسجيل
                                                    العقاري
                                                    في الصادق</option>
                                                <option value="ملاحظية التسجيل العقاري في المدينة">ملاحظية التسجيل
                                                    العقاري
                                                    في المدينة</option>
                                                <option value="ملاحظية التسجيل العقاري في القرنة">ملاحظية التسجيل
                                                    العقاري
                                                    في القرنة</option>
                                                <option value="ملاحظية التسجيل العقاري في الهارثة">ملاحظية التسجيل
                                                    العقاري
                                                    في الهارثة</option>
                                                <option value="ملاحظية التسجيل العقاري في الفاو">ملاحظية التسجيل
                                                    العقاري في
                                                    الفاو</option>
                                                <option value="ملاحظية التسجيل العقاري في الدير">ملاحظية التسجيل
                                                    العقاري في
                                                    الدير</option>
                                                <option value="ملاحظية التسجيل العقاري في ام قصر">ملاحظية التسجيل
                                                    العقاري
                                                    في ام قصر</option>
                                                <option value="ملاحظية التسجيل العقاري في النشوة">ملاحظية التسجيل
                                                    العقاري
                                                    في النشوة</option>
                                                <option value="ملاحظية التسجيل العقاري في السيبة">ملاحظية التسجيل
                                                    العقاري
                                                    في السيبة</option>
                                                <option value="ملاحظية التسجيل العقاري في الثغر">ملاحظية التسجيل
                                                    العقاري في
                                                    الثغر</option>
                                                <option value="ملاحظية التسجيل العقاري في الشهيد عز الدين سليم">ملاحظية
                                                    التسجيل العقاري في الشهيد عز الدين سليم</option>
                                                <option value="ملاحظية التسجيل العقاري في المصطفى (الزوين)">ملاحظية
                                                    التسجيل
                                                    العقاري في المصطفى (الزوين)</option>
                                                <option value="ملاحظية التسجيل العقاري في الشافي">ملاحظية التسجيل
                                                    العقاري
                                                    في الشافي</option>
                                            </select>
                                            <label for="modalRealitieregistered_office">الدائرة المسجل لديها</label>
                                        </div>
                                        @error('registered_office')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='governorate' id="editRealitiegovernorate"
                                                class="form-select @error('governorate') is-invalid is-filled @enderror">
                                                <option value=""></option>
                                                @foreach ($governorates as $governorate)
                                                    <option value="{{ $governorate->id }}">
                                                        {{ $governorate->governorate_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="modalRealitiegovernorate">المحافظة</label>
                                        </div>
                                        @error('governorate')
                                            <small class='text-danger inputerror'>{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='district' id="editRealitiedistrict"
                                                class="form-select @error('district') is-invalid is-filled @enderror">
                                                <option value=""></option>
                                                @foreach ($Districts as $District)
                                                    <option value="{{ $District->id }}">
                                                        {{ $District->district_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="modalRealitiedistrict">القضاء</label>
                                        </div>
                                        @error('district')
                                            <small class='text-danger inputerror'>{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='specialized_department'
                                                id="editRealitiespecialized_department"
                                                class="form-select @error('specialized_department') is-invalid is-filled @enderror">
                                                <option value=""></option>
                                                @foreach ($branches as $branch)
                                                    <option value="{{ $branch->id }}">{{ $branch->branch_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="modalRealitiespecialized_department">الشعبة المختصة</label>
                                        </div>
                                        @error('specialized_department')
                                            <small class='text-danger inputerror'>{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col d-flex align-items-center" style="gap: 30px;">
                                        <label class="switch switch-square switch-danger me-2">
                                            <input wire:model="visibility" type="checkbox"
                                                id="modalRealitievisibility"
                                                class="switch-input @error('visibility') is-invalid is-filled @enderror" />
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on">نعم</span>
                                                <span class="switch-off">لا</span>
                                            </span>
                                        </label>
                                        <span class="switcher-label ms-2">
                                            {{ $visibility ? 'السند مرئي' : 'السند غير مرئي' }}
                                        </span>
                                        @error('visibility')
                                            <small class='text-danger inputerror ms-2'>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='notes' type="text" id="modalRealitienotes"
                                                placeholder="ملاحظات"
                                                class="form-control @error('notes') is-invalid is-filled @enderror"
                                                onkeypress="return onlyArabicKey(event)" />
                                            <label for="modalRealitienotes">ملاحظات</label>
                                        </div>
                                        @error('notes')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 text-center">
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
                                        @if ($filePreview)
                                            @if ($property_deed_image && $property_deed_image->getClientOriginalExtension() == strtolower('pdf'))
                                                <embed src="{{ $filePreview }}" type="application/pdf"
                                                    width="100%" height="300px" />
                                            @elseif ($property_deed_image)
                                                <img src="{{ $filePreview }}" alt="Selected Image"
                                                    class="img-fluid" width="100%" height="300px" />
                                            @endif
                                        @endif

                                        @if ($previewRealitieDeedImage && !$filePreview)
                                            @if (pathinfo($previewRealitieDeedImage, PATHINFO_EXTENSION) == strtolower('pdf'))
                                                <embed
                                                    src="{{ asset('storage/Realities/' . $this->province_number . '/' . $this->plot_number . '/' . $property_number . '/' . $previewRealitieDeedImage) }}"
                                                    type="application/pdf" width="100%" height="300px" />
                                            @else
                                                <img src="{{ asset('storage/Realities/' . $this->province_number . '/' . $this->plot_number . '/' . $property_number . '/' . $previewRealitieDeedImage) }}"
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
<!--/ Edite Realitie Modal -->

<!-- Add Bond Modal -->
<div wire:ignore.self class="modal fade" id="addbondModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">اضافة بيانات قطعة جديدة</h3>
                    <p>نافذة الأضافة </p>
                </div>
                <hr class="mt-n2">
                <form id="addbondModalForm" autocomplete="off">
                    <div class="row">
                        <div class="col-8">
                            <div Class="row bg-label-primary">
                                <div class="col">
                                    <label class="border-bottom-2 text-center mb-2 w-100">رقم واسم المقاطعة</label>
                                    <div wire:loading wire:target='AddBondModal'
                                        wire:loading.class="d-flex justify-content-center">
                                        <span class="mdi mdi-loading mdi-spin mdi-24px"></span>
                                    </div>
                                    <div wire:loading.remove wire:target='AddBondModal' class="text-center">
                                        <span>{{ $Boycott->boycott_number ?? '' }}</span> -
                                        <span>{{ $Boycott->boycott_name ?? '' }}</span>
                                    </div>
                                </div>

                            </div>

                            <hr class="">

                            <div Class="row">
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='part_number' type="text" id="modalBondpart_number"
                                            placeholder="رقم القطعة"
                                            class="form-control @error('part_number') is-invalid is-filled @enderror"
                                            onkeypress="return onlyNumberKey(event)" />
                                        <label for="modalBondpart_number">رقم القطعة</label>
                                    </div>
                                    @error('part_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='property_number' type="text"
                                            id="modalBondproperty_number" placeholder="رقم العقار"
                                            class="form-control @error('property_number') is-invalid is-filled @enderror"
                                            onkeypress="return onlyNumberKey(event)" />
                                        <label for="modalBondproperty_number">رقم العقار</label>
                                    </div>
                                    @error('property_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <select wire:model.defer="bond_type" id="modalBondbond_type"
                                            class="form-select @error('bond_type') is-invalid is-filled @enderror">
                                            <option value="">اختر</option>
                                            <option value="قديم">قديم</option>
                                            <option value="تسجيل مجدد">تسجيل مجدد</option>
                                        </select>
                                        <label for="modalBondbond_type">نوع السند</label>
                                    </div>
                                    @error('bond_type')
                                        <small class="text-danger inputerror">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div Class="row">
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <select wire:model.defer='property_type' id="addBondproperty_type"
                                            class="form-select @error('property_type') is-invalid is-filled @enderror">
                                            <option value="">اختر</option>
                                            @foreach ($propertytypes as $propertytype)
                                                <option value="{{ $propertytype->id }}">{{ $propertytype->type_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="modalBondproperty_type">جنس العقار</label>
                                    </div>
                                    @error('property_type')
                                        <small class='text-danger inputerror'>{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <select wire:model.defer="mortgage_notes" id="modalBondmortgage_notes"
                                            class="form-select @error('mortgage_notes') is-invalid is-filled @enderror">
                                            <option value="">اختر</option>
                                            <option value="رفع الحجز">رفع الحجز</option>
                                            <option value="عدم التصرف بالعقار الا بموافقة الموانئ">عدم التصرف بالعقار
                                                الا
                                                بموافقة الموانئ</option>
                                        </select>
                                        <label for="modalBondmortgage_notes">اشارة التأمينات</label>
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
                                            id="modalBondarea_in_meters" placeholder="المساحة بالمتر"
                                            class="form-control @error('area_in_meters') is-invalid is-filled @enderror"
                                            onkeypress="return onlyNumberKey(event)"
                                            oninput="validateMeterInput(event)" />
                                        <label for="modalBondarea_in_meters">المساحة بالمتر</label>
                                    </div>
                                    @error('area_in_meters')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='area_in_olok' type="text" id="modalBondarea_in_olok"
                                            placeholder="المساحة بالأولك"
                                            class="form-control @error('area_in_olok') is-invalid is-filled @enderror"
                                            onkeypress="return onlyNumberKey(event)"
                                            oninput="validateOlokInput(event)" />
                                        <label for="modalBondarea_in_olok">المساحة بالأولك</label>
                                    </div>
                                    @error('area_in_olok')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='area_in_donum' type="text"
                                            id="modalBondarea_in_donum" placeholder="المساحة بالدونم"
                                            class="form-control @error('area_in_donum') is-invalid is-filled @enderror"
                                            onkeypress="return onlyNumberKey(event)"
                                            oninput="validateDonumInput(event)" />
                                        <label for="modalBondarea_in_donum">المساحة بالدونم</label>
                                    </div>
                                    @error('area_in_donum')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                            <div Class="row">
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='count' type="text" id="modalBondcount"
                                            placeholder="العدد"
                                            class="form-control @error('count') is-invalid is-filled @enderror"
                                            onkeypress="return onlyNumberKey(event)" />
                                        <label for="modalBondcount">العدد</label>
                                    </div>
                                    @error('count')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='date' type="date" id="addDate"
                                            placeholder="التاريخ"
                                            class="form-control @error('date') is-invalid is-filled @enderror" />
                                        <label for="modalBonddate">التاريخ</label>
                                    </div>
                                    @error('date')
                                        <small class='text-danger inputerror'>{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='volume_number' type="text"
                                            id="modalBondvolume_number" placeholder="رقم الجلد"
                                            class="form-control @error('volume_number') is-invalid is-filled @enderror"
                                            onkeypress="return onlyNumberKey(event)" />
                                        <label for="modalBondvolume_number">رقم الجلد</label>
                                    </div>
                                    @error('volume_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                            <div Class="row">
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <select wire:model.defer='ownership' id="addBondownership"
                                            class="form-select @error('ownership') is-invalid is-filled @enderror">
                                            <option value=""></option>
                                            @foreach ($department as $departmen)
                                                <option value="{{ $departmen->id }}">
                                                    {{ $departmen->department_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="modalBondownership">العائدية (المالك)</label>
                                    </div>
                                    @error('ownership')
                                        <small class='text-danger inputerror'>{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <select wire:model.defer='registered_office' id="addBondregistered_office"
                                            class="form-select @error('registered_office') is-invalid is-filled @enderror">
                                            <option value=""></option>
                                            @foreach ($department as $departmen)
                                                <option value="{{ $departmen->id }}">
                                                    {{ $departmen->department_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="modalBondregistered_office">الدائرة المسجل لديها</label>
                                    </div>
                                    @error('registered_office')
                                        <small class='text-danger inputerror'>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div Class="row">
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <select wire:model.defer='governorate' id="addBondgovernorate"
                                            class="form-select @error('governorate') is-invalid is-filled @enderror">
                                            <option value=""></option>
                                            @foreach ($governorates as $governorate)
                                                <option value="{{ $governorate->id }}">
                                                    {{ $governorate->governorate_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="modalBondgovernorate">المحافظة</label>
                                    </div>
                                    @error('governorate')
                                        <small class='text-danger inputerror'>{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <select wire:model.defer='district' id="addBonddistrict"
                                            class="form-select @error('district') is-invalid is-filled @enderror">
                                            <option value=""></option>
                                            @foreach ($Districts as $District)
                                                <option value="{{ $District->id }}">{{ $District->district_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="modalBonddistrict">القضاء</label>
                                    </div>
                                    @error('district')
                                        <small class='text-danger inputerror'>{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <select wire:model.defer='specialized_department'
                                            id="modalBondspecialized_department"
                                            class="form-select @error('specialized_department') is-invalid is-filled @enderror">
                                            <option value="">اختر</option>
                                            <option value="شعبة العقارات">شعبة العقارات</option>
                                            <option value="شعبة الاملاك">شعبة الاملاك</option>
                                            <option value="شعبة اسكان المؤاني">شعبة اسكان المؤاني</option>
                                        </select>
                                        <label for="modalBondspecialized_department">الشعبة المختصة</label>
                                    </div>
                                    @error('specialized_department')
                                        <small class='text-danger inputerror'>{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-check form-switch">
                                        <input wire:model.defer='visibility' type="checkbox" id="modalBondvisibility"
                                            class="form-check-input @error('visibility') is-invalid is-filled @enderror" />
                                        <label for="modalBondvisibility" class="form-check-label">إمكانية
                                            ظهوره</label>
                                    </div>
                                    @error('visibility')
                                        <small class='text-danger inputerror'>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div Class="row">
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='notes' type="text" id="modalBondnotes"
                                            placeholder="ملاحظات"
                                            class="form-control @error('notes') is-invalid is-filled @enderror"
                                            onkeypress="return onlyArabicKey(event)" />
                                        <label for="modalBondnotes">ملاحظات</label>
                                    </div>
                                    @error('notes')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-4 text-center">
                            <div>
                                <div class="form-floating form-floating-outline">
                                    <input type="file" wire:model="property_deed_image"
                                        class="form-control @error('property_deed_image') is-invalid is-filled @enderror"
                                        accept="">
                                    <label for="modalcertifinotes">اختر ملف السند</label>
                                </div>

                                @error('property_deed_image')
                                    <span class="error">{{ $message }}</span>
                                @enderror

                                @if ($filePreview)
                                    @if ($property_deed_image->getClientOriginalExtension() == strtolower('pdf'))
                                        <iframe src="{{ $filePreview }}" class="mt-3 "
                                            style="height: 320px; width: 100%"></iframe>
                                    @else
                                        <img src="{{ $filePreview }}" class="mt-3 rounded img-fluid"
                                            style="max-height: 150px; width: 100%">
                                    @endif
                                @endif
                            </div>
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
<!--/ Add Bond Modal -->

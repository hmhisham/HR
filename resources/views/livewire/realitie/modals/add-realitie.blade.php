<!-- Add Show Realitie Modal -->
<div wire:ignore.self class="modal fade" id="addRealitieModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">اضافة السندات العقارية جديد </h3>
                    <p>نافذة الأضافة</p>
                </div>
                <hr class="mt-n2">
                <form id="addrealitieModalForm" autocomplete="off">
                    <div Class="row">
                        <div class="mb-3 col">
                            <div class="form-floating form-floating-outline">
                                <input wire:model.defer='plot_id' type="text" id="modalRealitieplot_id"
                                    placeholder="رقم القطعة"
                                    class="form-control @error('plot_id') is-invalid is-filled @enderror" />
                                <label for="modalRealitieplot_id">رقم القطعة</label>
                            </div>
                            @error('plot_id')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="mb-3 col">
                            <div class="form-floating form-floating-outline">
                                <input wire:model.defer='property_number' type="text"
                                    id="modalRealitieproperty_number" placeholder="رقم العقار"
                                    class="form-control @error('property_number') is-invalid is-filled @enderror" />
                                <label for="modalRealitieproperty_number">رقم العقار</label>
                            </div>
                            @error('property_number')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="mb-3 col">
                            <div class="form-floating form-floating-outline">
                                <input wire:model.defer='area_in_meters' type="text" id="modalRealitiearea_in_meters"
                                    placeholder="المساحة بالمتر"
                                    class="form-control @error('area_in_meters') is-invalid is-filled @enderror" />
                                <label for="modalRealitiearea_in_meters">المساحة بالمتر</label>
                            </div>
                            @error('area_in_meters')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div Class="row">
                        <div class="mb-3 col">
                            <div class="form-floating form-floating-outline">
                                <input wire:model.defer='area_in_olok' type="text" id="modalRealitiearea_in_olok"
                                    placeholder="المساحة بالأولك"
                                    class="form-control @error('area_in_olok') is-invalid is-filled @enderror" />
                                <label for="modalRealitiearea_in_olok">المساحة بالأولك</label>
                            </div>
                            @error('area_in_olok')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="mb-3 col">
                            <div class="form-floating form-floating-outline">
                                <input wire:model.defer='area_in_donum' type="text" id="modalRealitiearea_in_donum"
                                    placeholder="المساحة بالدونم"
                                    class="form-control @error('area_in_donum') is-invalid is-filled @enderror" />
                                <label for="modalRealitiearea_in_donum">المساحة بالدونم</label>
                            </div>
                            @error('area_in_donum')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="mb-3 col">
                            <div class="form-floating form-floating-outline">
                                <input wire:model.defer='count' type="text" id="modalRealitiecount"
                                    placeholder="العدد"
                                    class="form-control @error('count') is-invalid is-filled @enderror" />
                                <label for="modalRealitiecount">العدد</label>
                            </div>
                            @error('count')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div Class="row">
                        <div class="mb-3 col">
                            <div class="form-floating form-floating-outline">
                                <input wire:model.defer='date' type="date" id="modalRealitiedate"
                                    placeholder="التاريخ"
                                    class="form-control @error('date') is-invalid is-filled @enderror" />
                                <label for="modalRealitiedate">التاريخ</label>
                            </div>
                            @error('date')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="mb-3 col">
                            <div class="form-floating form-floating-outline">
                                <input wire:model.defer='volume_number' type="text"
                                    id="modalRealitievolume_number" placeholder="رقم الجلد"
                                    class="form-control @error('volume_number') is-invalid is-filled @enderror" />
                                <label for="modalRealitievolume_number">رقم الجلد</label>
                            </div>
                            @error('volume_number')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="mb-3 col">
                            <div class="form-floating form-floating-outline">
                                <input wire:model.defer='bond_type' type="text" id="modalRealitiebond_type"
                                    placeholder="نوع السند"
                                    class="form-control @error('bond_type') is-invalid is-filled @enderror" />
                                <label for="modalRealitiebond_type">نوع السند</label>
                            </div>
                            @error('bond_type')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div Class="row">
                        <div class="mb-3 col">
                            <div class="form-floating form-floating-outline">
                                <input wire:model.defer='ownership' type="text" id="modalRealitieownership"
                                    placeholder="العائدية"
                                    class="form-control @error('ownership') is-invalid is-filled @enderror" />
                                <label for="modalRealitieownership">العائدية</label>
                            </div>
                            @error('ownership')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="mb-3 col">
                            <div class="form-floating form-floating-outline">
                                <input wire:model.defer='property_type' type="text"
                                    id="modalRealitieproperty_type" placeholder="جنس العقار"
                                    class="form-control @error('property_type') is-invalid is-filled @enderror" />
                                <label for="modalRealitieproperty_type">جنس العقار</label>
                            </div>
                            @error('property_type')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="mb-3 col">
                            <div class="form-floating form-floating-outline">
                                <input wire:model.defer='governorate' type="text" id="modalRealitiegovernorate"
                                    placeholder="المحافظة"
                                    class="form-control @error('governorate') is-invalid is-filled @enderror" />
                                <label for="modalRealitiegovernorate">المحافظة</label>
                            </div>
                            @error('governorate')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div Class="row">
                        <div class="mb-3 col">
                            <div class="form-floating form-floating-outline">
                                <input wire:model.defer='district' type="text" id="modalRealitiedistrict"
                                    placeholder="القضاء"
                                    class="form-control @error('district') is-invalid is-filled @enderror" />
                                <label for="modalRealitiedistrict">القضاء</label>
                            </div>
                            @error('district')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="mb-3 col">
                            <div class="form-floating form-floating-outline">
                                <input wire:model.defer='mortgage_notes' type="text"
                                    id="modalRealitiemortgage_notes" placeholder="إشارات التأمينات"
                                    class="form-control @error('mortgage_notes') is-invalid is-filled @enderror" />
                                <label for="modalRealitiemortgage_notes">إشارات التأمينات</label>
                            </div>
                            @error('mortgage_notes')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="mb-3 col">
                            <div class="form-floating form-floating-outline">
                                <input wire:model.defer='registered_office' type="text"
                                    id="modalRealitieregistered_office" placeholder="الدائرة المسجل لديها"
                                    class="form-control @error('registered_office') is-invalid is-filled @enderror" />
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
                                <input wire:model.defer='specialized_department' type="text"
                                    id="modalRealitiespecialized_department" placeholder="الشعبة المختصة"
                                    class="form-control @error('specialized_department') is-invalid is-filled @enderror" />
                                <label for="modalRealitiespecialized_department">الشعبة المختصة</label>
                            </div>
                            @error('specialized_department')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="mb-3 col">
                            <div class="form-floating form-floating-outline">
                                <input wire:model.defer='property_deed_image' type="text"
                                    id="modalRealitieproperty_deed_image" placeholder="صورة السند العقاري"
                                    class="form-control @error('property_deed_image') is-invalid is-filled @enderror" />
                                <label for="modalRealitieproperty_deed_image">صورة السند العقاري</label>
                            </div>
                            @error('property_deed_image')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="mb-3 col">
                            <div class="form-floating form-floating-outline">
                                <input wire:model.defer='property_map_image' type="text"
                                    id="modalRealitieproperty_map_image" placeholder="صورة الخارطة العقارية"
                                    class="form-control @error('property_map_image') is-invalid is-filled @enderror" />
                                <label for="modalRealitieproperty_map_image">صورة الخارطة العقارية</label>
                            </div>
                            @error('property_map_image')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div Class="row">
                        <div class="mb-3 col">
                            <div class="form-floating form-floating-outline">
                                <input wire:model.defer='notes' type="text" id="modalRealitienotes"
                                    placeholder="ملاحظات"
                                    class="form-control @error('notes') is-invalid is-filled @enderror" />
                                <label for="modalRealitienotes">ملاحظات</label>
                            </div>
                            @error('notes')
                                <small class='text-danger inputerror'> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="mb-3 col">
                            <div class="form-floating form-floating-outline">
                                <input wire:model.defer='visibility' type="text" id="modalRealitievisibility"
                                    placeholder="إمكانية ظهوره"
                                    class="form-control @error('visibility') is-invalid is-filled @enderror" />
                                <label for="modalRealitievisibility">إمكانية ظهوره</label>
                            </div>
                            @error('visibility')
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
<!--/ Add Show Realitie Modal -->

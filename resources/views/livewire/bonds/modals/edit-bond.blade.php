<!-- Edite Bond Modal -->
<div wire:ignore.self class="modal fade" id="editbondModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل السند</h3>
                    <p>نافذة التعديل</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetBond" wire:loading.class="d-flex justify-content-center text-primary">
                    جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حفظ البيانات...</h5>

                <div wire:loading.remove>
                    <form id="editBondModalForm" autocomplete="off">
                        <div class="row row-cols-1">
                            <div class="col mb-3">
                                <div Class="row">

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='boycott_id' type="text" id="modalBondboycott_id"
                                                placeholder="رقم المقاطعة"
                                                class="form-control @error('boycott_id') is-invalid is-filled @enderror" />
                                            <label for="modalBondboycott_id">رقم المقاطعة</label>
                                        </div>
                                        @error('boycott_id')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='part_number' type="text"
                                                id="modalBondpart_number" placeholder="رقم القطعة"
                                                class="form-control @error('part_number') is-invalid is-filled @enderror" />
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
                                                class="form-control @error('property_number') is-invalid is-filled @enderror" />
                                            <label for="modalBondproperty_number">رقم العقار</label>
                                        </div>
                                        @error('property_number')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='area_in_meters' type="text"
                                                id="modalBondarea_in_meters" placeholder="المساحة بالمتر"
                                                class="form-control @error('area_in_meters') is-invalid is-filled @enderror" />
                                            <label for="modalBondarea_in_meters">المساحة بالمتر</label>
                                        </div>
                                        @error('area_in_meters')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='area_in_olok' type="text"
                                                id="modalBondarea_in_olok" placeholder="المساحة بالأولك"
                                                class="form-control @error('area_in_olok') is-invalid is-filled @enderror" />
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
                                                class="form-control @error('area_in_donum') is-invalid is-filled @enderror" />
                                            <label for="modalBondarea_in_donum">المساحة بالدونم</label>
                                        </div>
                                        @error('area_in_donum')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='count' type="text" id="modalBondcount"
                                                placeholder="العدد"
                                                class="form-control @error('count') is-invalid is-filled @enderror" />
                                            <label for="modalBondcount">العدد</label>
                                        </div>
                                        @error('count')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='date' type="date" id="modalBonddate"
                                                placeholder="التاريخ"
                                                class="form-control @error('date') is-invalid is-filled @enderror" />
                                            <label for="modalBonddate">التاريخ</label>
                                        </div>
                                        @error('date')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='volume_number' type="text"
                                                id="modalBondvolume_number" placeholder="رقم الجلد"
                                                class="form-control @error('volume_number') is-invalid is-filled @enderror" />
                                            <label for="modalBondvolume_number">رقم الجلد</label>
                                        </div>
                                        @error('volume_number')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='ownership' type="text"
                                                id="modalBondownership" placeholder="العائدية"
                                                class="form-control @error('ownership') is-invalid is-filled @enderror" />
                                            <label for="modalBondownership">العائدية</label>
                                        </div>
                                        @error('ownership')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='property_type' type="text"
                                                id="modalBondproperty_type" placeholder="جنس العقار"
                                                class="form-control @error('property_type') is-invalid is-filled @enderror" />
                                            <label for="modalBondproperty_type">جنس العقار</label>
                                        </div>
                                        @error('property_type')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='governorate' type="text"
                                                id="modalBondgovernorate" placeholder="المحافظة"
                                                class="form-control @error('governorate') is-invalid is-filled @enderror" />
                                            <label for="modalBondgovernorate">المحافظة</label>
                                        </div>
                                        @error('governorate')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='district' type="text" id="modalBonddistrict"
                                                placeholder="القضاء"
                                                class="form-control @error('district') is-invalid is-filled @enderror" />
                                            <label for="modalBonddistrict">القضاء</label>
                                        </div>
                                        @error('district')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='area' type="text" id="modalBondarea"
                                                placeholder="الناحية"
                                                class="form-control @error('area') is-invalid is-filled @enderror" />
                                            <label for="modalBondarea">الناحية</label>
                                        </div>
                                        @error('area')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='mortgage_notes' type="text"
                                                id="modalBondmortgage_notes" placeholder="إشارات التأمينات"
                                                class="form-control @error('mortgage_notes') is-invalid is-filled @enderror" />
                                            <label for="modalBondmortgage_notes">إشارات التأمينات</label>
                                        </div>
                                        @error('mortgage_notes')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='registered_office' type="text"
                                                id="modalBondregistered_office" placeholder="الدائرة المسجل لديها"
                                                class="form-control @error('registered_office') is-invalid is-filled @enderror" />
                                            <label for="modalBondregistered_office">الدائرة المسجل لديها</label>
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
                                                id="modalBondspecialized_department" placeholder="الشعبة المختصة"
                                                class="form-control @error('specialized_department') is-invalid is-filled @enderror" />
                                            <label for="modalBondspecialized_department">الشعبة المختصة</label>
                                        </div>
                                        @error('specialized_department')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='property_deed_image' type="text"
                                                id="modalBondproperty_deed_image" placeholder="صورة السند العقاري"
                                                class="form-control @error('property_deed_image') is-invalid is-filled @enderror" />
                                            <label for="modalBondproperty_deed_image">صورة السند العقاري</label>
                                        </div>
                                        @error('property_deed_image')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='notes' type="text" id="modalBondnotes"
                                                placeholder="ملاحظات"
                                                class="form-control @error('notes') is-invalid is-filled @enderror" />
                                            <label for="modalBondnotes">ملاحظات</label>
                                        </div>
                                        @error('notes')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='visibility' type="text"
                                                id="modalBondvisibility" placeholder="إمكانية ظهوره"
                                                class="form-control @error('visibility') is-invalid is-filled @enderror" />
                                            <label for="modalBondvisibility">إمكانية ظهوره</label>
                                        </div>
                                        @error('visibility')
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
                        class="btn btn-success me-sm-3 me-1">تعديل</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                        aria-label="Close">تجاهل</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ Edite Bond Modal -->

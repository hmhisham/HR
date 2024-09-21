<!-- Add Specialty Modal -->
<div wire:ignore.self class="modal fade" id="addspecialtyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">اضافة تخصص عام جديد</h3>
                    <p>نافذة الأضافة </p>
                </div>
                <hr class="mt-n2">
                <form id="addspecialtyModalForm" autocomplete="off">
                    <div class="row row-cols-1  ">
                        <div class="col mb-3">
                            <div Class="row">
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='specialtys_code' type="text"
                                            id="modalSpecialtysspecialtys_code" placeholder="الرمز"
                                            class="form-control @error('specialtys_code') is-invalid is-filled @enderror"
                                            onkeypress="return restrictAlphabets(event)" />
                                        <label for="modalSpecialtysspecialtys_code">الرمز</label>
                                    </div>
                                    @error('specialtys_code')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='specialtys_name' type="text"
                                            id="modalSpecialtysspecialtys_name" placeholder="اسم التخصص"
                                            class="form-control @error('specialtys_name') is-invalid is-filled @enderror" />
                                        <label for="modalSpecialtysspecialtys_name">التخصص العام</label>
                                    </div>
                                    @error('specialtys_name')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="text-center col-12 demo-vertical-spacing mb-n4">
                        <button wire:click='store' wire:loading.attr="disabled" type="button"
                            class="btn btn-primary me-sm-3 me-1">اضافة فئة</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                            aria-label="Close">تجاهل</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function restrictAlphabets(e) {
        var x = e.which || e.keycode;
        if ((x >= 48 && x <= 57))
            return true;
        else
            return false;
    }
</script>
<!--/ Add Specialty Modal -->

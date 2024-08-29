<!-- Add Thank Modal -->
<div wire:ignore.self class="modal fade" id="addthankModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">اضافة </h3>
                    <p>نافذة الأضافة </p>
                </div>
                <hr class="mt-n2">
                <form id="addthankModalForm" autocomplete="off">
                    <div class="row row-cols-1  ">
                        <div class="col mb-3">

                            <div Class="row">


                             <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline form-floating-select2">
                                        <div class="position-relative">
                                            <select id="select2" wire:model="selectedWorker"
                                                wire:change="selectWorker($event.target.value)"
                                                class="select2 form-select form-select-lg" data-allow-clear="true">
                                                <option value="" selected>اختر موظفاً</option>

                                                @foreach($workers as $worker)
                                                <option value="{{ $worker->id }}">{{ $worker->calculator_number }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>



                            <div Class="row">

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='calculator_number' type="text"
                                            id="modalEmployeecalculator_number" placeholder="رقم الحاسبة"
                                            class="form-control @error('calculator_number') is-invalid is-filled @enderror"
                                            readonly />
                                        <label for="modalEmployeecalculator_number">رقم الحاسبة</label>
                                    </div>
                                    @error('calculator_number')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>


                            <div Class="row">



                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='grantor' type="text" id="modalThanksgrantor"
                                            placeholder="الجهة المانحة للشكر"
                                            class="form-control @error('grantor') is-invalid is-filled @enderror" />
                                        <label for="modalThanksgrantor">الجهة المانحة للشكر</label>
                                    </div>
                                    @error('grantor')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>


                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='reason' type="text" id="modalThanksreason"
                                            placeholder="السبب من الشكر"
                                            class="form-control @error('reason') is-invalid is-filled @enderror" />
                                        <label for="modalThanksreason">السبب من الشكر</label>
                                    </div>
                                    @error('reason')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>




                            </div>
                            <div Class="row">



                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='ministerial_order_date' type="date"
                                            id="modalThanksministerial_order_date" placeholder="تاريخ الامر الوزاري"
                                            class="form-control @error('ministerial_order_date') is-invalid is-filled @enderror" />
                                        <label for="modalThanksministerial_order_date">تاريخ الامر الوزاري</label>
                                    </div>
                                    @error('ministerial_order_date')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='ministerial_order_number' type="text"
                                            id="modalThanksministerial_order_number" placeholder="رقم الامر الوزاري"
                                            class="form-control @error('ministerial_order_number') is-invalid is-filled @enderror" />
                                        <label for="modalThanksministerial_order_number">رقم الامر الوزاري</label>
                                    </div>
                                    @error('ministerial_order_number')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <select wire:model.defer="months_of_service" id="months_of_service"
                                            class="form-select @error('months_of_service') is-invalid is-filled @enderror">
                                            <option value="" disabled selected>عدد الاشهر</option>
                                            <option value="1">1</option>
                                            <option value="6">6</option>
                                        </select>
                                        <label for="modalEmployeemonths_of_service">عدد الاشهر </label>
                                    </div>
                                    @error('months_of_service')
                                    <small class="text-danger inputerror">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                            <div Class="row">






                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='notes' type="text" id="modalThanksnotes"
                                            placeholder="الملاحظات"
                                            class="form-control @error('notes') is-invalid is-filled @enderror" />
                                        <label for="modalThanksnotes">الملاحظات</label>
                                    </div>
                                    @error('notes')
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
<!--/ Add Thank Modal -->
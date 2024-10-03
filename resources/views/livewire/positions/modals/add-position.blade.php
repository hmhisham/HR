
<!-- Add Position Modal -->
<div wire:ignore.self class="modal fade" id="addpositionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">اضافة </h3>
                    <p>نافذة الأضافة </p>
                </div>
                <hr class="mt-n2">
                <form id="addpositionModalForm" autocomplete="off">
                    <div class="row row-cols-1  ">
                        <div class="col mb-3"> 
                        <div Class="row">
  </div>
                                    <div Class="row">
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='id' type="text" id="modalPositionid" placeholder=""
                        class="form-control @error('id') is-invalid is-filled @enderror" />
                    <label for="modalPositionid"></label>
                </div>
                @error('id')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='user_id' type="text" id="modalPositionuser_id" placeholder="رقم المستخدم"
                        class="form-control @error('user_id') is-invalid is-filled @enderror" />
                    <label for="modalPositionuser_id">رقم المستخدم</label>
                </div>
                @error('user_id')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='worker_id' type="text" id="modalPositionworker_id" placeholder="الاسم"
                        class="form-control @error('worker_id') is-invalid is-filled @enderror" />
                    <label for="modalPositionworker_id">الاسم</label>
                </div>
                @error('worker_id')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
              </div>
                                    <div Class="row">
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='linkage_id' type="text" id="modalPositionlinkage_id" placeholder="الارتباط"
                        class="form-control @error('linkage_id') is-invalid is-filled @enderror" />
                    <label for="modalPositionlinkage_id">الارتباط</label>
                </div>
                @error('linkage_id')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='section_id' type="text" id="modalPositionsection_id" placeholder="القسم"
                        class="form-control @error('section_id') is-invalid is-filled @enderror" />
                    <label for="modalPositionsection_id">القسم</label>
                </div>
                @error('section_id')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='branch_id' type="text" id="modalPositionbranch_id" placeholder="الشعبة"
                        class="form-control @error('branch_id') is-invalid is-filled @enderror" />
                    <label for="modalPositionbranch_id">الشعبة</label>
                </div>
                @error('branch_id')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
              </div>
                                    <div Class="row">
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='unit_id' type="text" id="modalPositionunit_id" placeholder="الوحدة"
                        class="form-control @error('unit_id') is-invalid is-filled @enderror" />
                    <label for="modalPositionunit_id">الوحدة</label>
                </div>
                @error('unit_id')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='position_name' type="text" id="modalPositionposition_name" placeholder="اسم المنصب"
                        class="form-control @error('position_name') is-invalid is-filled @enderror" />
                    <label for="modalPositionposition_name">اسم المنصب</label>
                </div>
                @error('position_name')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='position_order_number' type="text" id="modalPositionposition_order_number" placeholder="رقم امر التكليف"
                        class="form-control @error('position_order_number') is-invalid is-filled @enderror" />
                    <label for="modalPositionposition_order_number">رقم امر التكليف</label>
                </div>
                @error('position_order_number')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
              </div>
                                    <div Class="row">
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='position_order_date' type="date" id="modalPositionposition_order_date" placeholder="تاريخ أمر التكليف"
                        class="form-control @error('position_order_date') is-invalid is-filled @enderror" />
                    <label for="modalPositionposition_order_date">تاريخ أمر التكليف</label>
                </div>
                @error('position_order_date')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='position_start_date' type="date" id="modalPositionposition_start_date" placeholder="تاريخ المباشرة بالنصب"
                        class="form-control @error('position_start_date') is-invalid is-filled @enderror" />
                    <label for="modalPositionposition_start_date">تاريخ المباشرة بالنصب</label>
                </div>
                @error('position_start_date')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='commissioning_type' type="text" id="modalPositioncommissioning_type" placeholder="نوع التكليف"
                        class="form-control @error('commissioning_type') is-invalid is-filled @enderror" />
                    <label for="modalPositioncommissioning_type">نوع التكليف</label>
                </div>
                @error('commissioning_type')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
              </div>
                                    <div Class="row">
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='commissioning_statu' type="text" id="modalPositioncommissioning_statu" placeholder="حالة التكليف"
                        class="form-control @error('commissioning_statu') is-invalid is-filled @enderror" />
                    <label for="modalPositioncommissioning_statu">حالة التكليف</label>
                </div>
                @error('commissioning_statu')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='p_notes' type="text" id="modalPositionp_notes" placeholder="ملاحظات"
                        class="form-control @error('p_notes') is-invalid is-filled @enderror" />
                    <label for="modalPositionp_notes">ملاحظات</label>
                </div>
                @error('p_notes')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                        </div>
                    </div>
                </div>
                <hr class="my-0">
                <div class="text-center col-12 demo-vertical-spacing mb-n4">
                    <button wire:click='store' wire:loading.attr="disabled" type="button" class="btn btn-primary me-sm-3 me-1">اضافة فئة</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                        aria-label="Close">تجاهل</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!--/ Add Position Modal -->

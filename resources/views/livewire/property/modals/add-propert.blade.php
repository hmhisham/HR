
<!-- Add Propert Modal -->
<div wire:ignore.self class="modal fade" id="addpropertModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">اضافة </h3>
                    <p>نافذة الأضافة </p>
                </div>
                <hr class="mt-n2">
                <form id="addpropertModalForm" autocomplete="off">
                    <div class="row row-cols-1  ">
                        <div class="col mb-3"> 
                        <div Class="row">

                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='user_id' type="text" id="modalPropertuser_id" placeholder="رقم المستخدم"
                        class="form-control @error('user_id') is-invalid is-filled @enderror" />
                    <label for="modalPropertuser_id">رقم المستخدم</label>
                </div>
                @error('user_id')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='worker_id' type="text" id="modalPropertworker_id" placeholder="رقم المستخدم"
                        class="form-control @error('worker_id') is-invalid is-filled @enderror" />
                    <label for="modalPropertworker_id">رقم المستخدم</label>
                </div>
                @error('worker_id')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
              </div>
                                    <div Class="row">
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='bonds_id' type="text" id="modalPropertbonds_id" placeholder="رقم العقار"
                        class="form-control @error('bonds_id') is-invalid is-filled @enderror" />
                    <label for="modalPropertbonds_id">رقم العقار</label>
                </div>
                @error('bonds_id')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='from_date' type="date" id="modalPropertfrom_date" placeholder="من تاريخ"
                        class="form-control @error('from_date') is-invalid is-filled @enderror" />
                    <label for="modalPropertfrom_date">من تاريخ</label>
                </div>
                @error('from_date')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='to_date' type="date" id="modalPropertto_date" placeholder="الى تاريخ"
                        class="form-control @error('to_date') is-invalid is-filled @enderror" />
                    <label for="modalPropertto_date">الى تاريخ</label>
                </div>
                @error('to_date')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
              </div>
                                    <div Class="row">
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='months_count' type="text" id="modalPropertmonths_count" placeholder="عدد الاشهر"
                        class="form-control @error('months_count') is-invalid is-filled @enderror" />
                    <label for="modalPropertmonths_count">عدد الاشهر</label>
                </div>
                @error('months_count')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='total_amount' type="text" id="modalProperttotal_amount" placeholder="المبلغ الكلي"
                        class="form-control @error('total_amount') is-invalid is-filled @enderror" />
                    <label for="modalProperttotal_amount">المبلغ الكلي</label>
                </div>
                @error('total_amount')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='paid_amount' type="text" id="modalPropertpaid_amount" placeholder="مجموع المسدد"
                        class="form-control @error('paid_amount') is-invalid is-filled @enderror" />
                    <label for="modalPropertpaid_amount">مجموع المسدد</label>
                </div>
                @error('paid_amount')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
              </div>
                                    <div Class="row">
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='property_status' type="text" id="modalPropertproperty_status" placeholder="حالة العقار"
                        class="form-control @error('property_status') is-invalid is-filled @enderror" />
                    <label for="modalPropertproperty_status">حالة العقار</label>
                </div>
                @error('property_status')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='status' type="text" id="modalPropertstatus" placeholder="الحالة"
                        class="form-control @error('status') is-invalid is-filled @enderror" />
                    <label for="modalPropertstatus">الحالة</label>
                </div>
                @error('status')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='notifications' type="text" id="modalPropertnotifications" placeholder="الاشعارات"
                        class="form-control @error('notifications') is-invalid is-filled @enderror" />
                    <label for="modalPropertnotifications">الاشعارات</label>
                </div>
                @error('notifications')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
              </div>
                                    <div Class="row">
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='notes' type="text" id="modalPropertnotes" placeholder="ملاحظات"
                        class="form-control @error('notes') is-invalid is-filled @enderror" />
                    <label for="modalPropertnotes">ملاحظات</label>
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
                    <button wire:click='store' wire:loading.attr="disabled" type="button" class="btn btn-primary me-sm-3 me-1">اضافة فئة</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                        aria-label="Close">تجاهل</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!--/ Add Propert Modal -->

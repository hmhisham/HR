 <!-- Add Thank Modal -->
 <div wire:ignore.self class="modal fade" id="addthankModal" tabindex="-1" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg">
         <div class="modal-content p-4 p-md-5">
             <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
             <div class="modal-body p-md-0">
                 <div class="text-center mb-4 mt-n4">
                     <h3 class="pb-1 mb-2">إضافة بيانات كتاب الشكر والتقدير</h3>
                     <p>نافذة الأضافة</p>
                 </div>
                 <hr class="mt-n2">
                 <form id="addthankModalForm" autocomplete="off">
                     <div class="row bg-label-primary rounded-3">
                         <div class="col-md-6 mb-4">
                             <label class="d-block text-center fw-semibold mb-2 text-blue">اسم الموظف</label>
                             <div class="text-center">
                                 <span class="d-block fs-5   text-dark"
                                     id="modalEmployeefull_name">{{ $full_name }}</span>
                             </div>
                         </div>

                         <div class="col-md-6 mb-4">
                             <label class="d-block text-center fw-semibold mb-2 text-blue">رقم الحاسبة</label>
                             <div class="text-center">
                                 <span class="d-block fs-5   text-dark"
                                     id="modalEmployeecomputer_number">{{ $computer_number }}</span>
                             </div>
                         </div>
                     </div>

                     <hr class="">
                     <div class="row">
                         <div class="col-md-6 mb-3">
                             <div class="form-floating form-floating-outline">
                                 <select wire:model.defer="grantor" id="modalThanksgrantor"
                                     class="form-select @error('grantor') is-invalid @enderror">
                                     <option value="">اختر الجهة</option>
                                     @foreach ($department as $dept)
                                         <option value="{{ $dept->id }}">{{ $dept->department_name }}</option>
                                     @endforeach
                                 </select>
                                 <label for="modalThanksgrantor">الجهة المانحة للشكر</label>
                             </div>
                             @error('grantor')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                         <div class="col-md-6 mb-3">
                             <div class="form-floating form-floating-outline">
                                 <input wire:model.defer="reason" type="text" id="modalThanksreason"
                                     placeholder="السبب من الشكر"
                                     class="form-control @error('reason') is-invalid @enderror" />
                                 <label for="modalThanksreason">السبب من الشكر</label>
                             </div>
                             @error('reason')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-6 mb-3">
                             <div class="form-floating form-floating-outline">
                                 <input wire:model.defer="ministerial_order_number" type="text"
                                     id="modalThanksministerial_order_number" placeholder="رقم الامر الوزاري"
                                     class="form-control @error('ministerial_order_number') is-invalid @enderror"
                                     onkeypress="return onlyNumberKey(event)" />
                                 <label for="modalThanksministerial_order_number">رقم الامر الوزاري</label>
                             </div>
                             @error('ministerial_order_number')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                         <div class="col-md-6 mb-3">
                             <div class="form-floating form-floating-outline">
                                 <input wire:model.defer="ministerial_order_date" type="date"
                                     id="addministerial_order_date" placeholder="تاريخ الامر الوزاري"
                                     class="form-control @error('ministerial_order_date') is-invalid @enderror" />
                                 <label for="addministerial_order_date">تاريخ الامر الوزاري</label>
                             </div>
                             @error('ministerial_order_date')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-6 mb-3">
                             <div class="form-floating form-floating-outline">
                                 <select wire:model.defer="months_of_service" id="modalEmployeemonths_of_service"
                                     class="form-select @error('months_of_service') is-invalid @enderror">
                                     <option value="" disabled selected>عدد الأشهر</option>
                                     <option value="1">1</option>
                                     <option value="6">6</option>
                                 </select>
                                 <label for="modalEmployeemonths_of_service">مدة القدم/عدد الأشهر</label>
                             </div>
                             @error('months_of_service')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                         <div class="col-md-6 mb-3">
                             <div class="form-floating form-floating-outline">
                                 <input wire:model.defer="notes" type="text" id="modalThanksnotes"
                                     placeholder="الملاحظات"
                                     class="form-control @error('notes') is-invalid @enderror" />
                                 <label for="modalThanksnotes">الملاحظات</label>
                             </div>
                             @error('notes')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                     </div>
                     <hr class="my-0">
                     <div class="text-center col-12 demo-vertical-spacing mb-n4">
                         <button wire:click="store" wire:loading.attr="disabled" type="button"
                             class="btn btn-primary me-sm-3 me-1">اضافة</button>
                         <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                             aria-label="Close">تجاهل</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <!--/ Add Thank Modal -->

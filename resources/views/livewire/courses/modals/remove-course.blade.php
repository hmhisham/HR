
<!-- Remove Course Modal -->
<div wire:ignore.self class="modal fade" id="removecourseModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">حذف</h3>
                    <p>نافذة الحذف</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetCourse" wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="destroy" wire:loading.class="d-flex justify-content-center text-primary">جار حذف البيانات...</h5>

                <div wire:loading.remove>
                <form id="removeCourseModalForm" onsubmit="return false" autocomplete="off">
                    <div class="row row-cols-1">
                        <div class="col mb-3"> 
                         <div Class="row">
  </div>
                                        <div Class="row">
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='course_title' type="text" id="modalCoursecourse_title" placeholder="عنوان الدورة"
                        class="form-control @error('course_title') is-invalid is-filled @enderror" />
                    <label for="modalCoursecourse_title">عنوان الدورة</label>
                </div>
                @error('course_title')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='program_manager' type="text" id="modalCourseprogram_manager" placeholder="مدير البرنامج التدريبي"
                        class="form-control @error('program_manager') is-invalid is-filled @enderror" />
                    <label for="modalCourseprogram_manager">مدير البرنامج التدريبي</label>
                </div>
                @error('program_manager')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='course_book_number' type="text" id="modalCoursecourse_book_number" placeholder="رقم كتاب الدورة"
                        class="form-control @error('course_book_number') is-invalid is-filled @enderror" />
                    <label for="modalCoursecourse_book_number">رقم كتاب الدورة</label>
                </div>
                @error('course_book_number')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
              </div>
                                        <div Class="row">
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='course_book_date' type="date" id="modalCoursecourse_book_date" placeholder="تاريخ كتاب الدورة"
                        class="form-control @error('course_book_date') is-invalid is-filled @enderror" />
                    <label for="modalCoursecourse_book_date">تاريخ كتاب الدورة</label>
                </div>
                @error('course_book_date')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                         </div>
                    </div>
                    <hr class="my-0">
                    <div class="d-flex justify-content-center col-12 demo-vertical-spacing mb-n4">
                            <button wire:click='destroy' type="submit"class="flex-fill btn btn-danger me-sm-3 me-1">حذف </button>
                             <button type="reset" class="flex-fill btn btn-outline-secondary" data-bs-dismiss="modal"
                             aria-label="Close">تجاهل</button>
                        </div>
                   </div>
                </form>
            </div>
        </div>
    </div>
 </div>
</div>
<!--/ Delete Course Modal -->

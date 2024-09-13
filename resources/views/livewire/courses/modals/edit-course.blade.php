
<!-- Edite Course Modal -->
<div wire:ignore.self class="modal fade" id="editcourseModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل</h3>
                    <p>نافذة التعديل</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetCourse" wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">جار حفظ البيانات...</h5>

                <div wire:loading.remove>
                <form id="editCourseModalForm" autocomplete="off">
                    <div class="row row-cols-1">
                        <div class="col mb-3"> 
                         <div Class="row">

                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='coaches_id' type="text" id="modalCoursecoaches_id" placeholder="تسلسل المدرب"
                        class="form-control @error('coaches_id') is-invalid is-filled @enderror" />
                    <label for="modalCoursecoaches_id">تسلسل المدرب</label>
                </div>
                @error('coaches_id')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
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
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='start_date' type="date" id="modalCoursestart_date" placeholder="تاريخ الانعقاد"
                        class="form-control @error('start_date') is-invalid is-filled @enderror" />
                    <label for="modalCoursestart_date">تاريخ الانعقاد</label>
                </div>
                @error('start_date')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='end_date' type="date" id="modalCourseend_date" placeholder="تاريخ الانتهاء"
                        class="form-control @error('end_date') is-invalid is-filled @enderror" />
                    <label for="modalCourseend_date">تاريخ الانتهاء</label>
                </div>
                @error('end_date')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
              </div>
                            <div Class="row">
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='nominees_number' type="number" id="modalCoursenominees_number" placeholder="عدد المرشحين"
                        class="form-control @error('nominees_number') is-invalid is-filled @enderror" />
                    <label for="modalCoursenominees_number">عدد المرشحين</label>
                </div>
                @error('nominees_number')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='male_nominees' type="number" id="modalCoursemale_nominees" placeholder="عدد الذكور"
                        class="form-control @error('male_nominees') is-invalid is-filled @enderror" />
                    <label for="modalCoursemale_nominees">عدد الذكور</label>
                </div>
                @error('male_nominees')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='female_nominees' type="number" id="modalCoursefemale_nominees" placeholder="عدد الاناث"
                        class="form-control @error('female_nominees') is-invalid is-filled @enderror" />
                    <label for="modalCoursefemale_nominees">عدد الاناث</label>
                </div>
                @error('female_nominees')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
              </div>
                            <div Class="row">
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='location' type="text" id="modalCourselocation" placeholder="مكان الانعقاد"
                        class="form-control @error('location') is-invalid is-filled @enderror" />
                    <label for="modalCourselocation">مكان الانعقاد</label>
                </div>
                @error('location')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='postponement_book_number' type="text" id="modalCoursepostponement_book_number" placeholder="رقم كتاب التاجيل"
                        class="form-control @error('postponement_book_number') is-invalid is-filled @enderror" />
                    <label for="modalCoursepostponement_book_number">رقم كتاب التاجيل</label>
                </div>
                @error('postponement_book_number')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='postponement_book_date' type="date" id="modalCoursepostponement_book_date" placeholder="تاريخ كتاب التاجيل"
                        class="form-control @error('postponement_book_date') is-invalid is-filled @enderror" />
                    <label for="modalCoursepostponement_book_date">تاريخ كتاب التاجيل</label>
                </div>
                @error('postponement_book_date')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
              </div>
                            <div Class="row">
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='participation_book_number' type="text" id="modalCourseparticipation_book_number" placeholder="رقم كتاب المشاركه"
                        class="form-control @error('participation_book_number') is-invalid is-filled @enderror" />
                    <label for="modalCourseparticipation_book_number">رقم كتاب المشاركه</label>
                </div>
                @error('participation_book_number')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='participation_book_date' type="date" id="modalCourseparticipation_book_date" placeholder="تاريخ كتاب المشاركه"
                        class="form-control @error('participation_book_date') is-invalid is-filled @enderror" />
                    <label for="modalCourseparticipation_book_date">تاريخ كتاب المشاركه</label>
                </div>
                @error('participation_book_date')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='participants_number' type="number" id="modalCourseparticipants_number" placeholder="عدد المشاركين"
                        class="form-control @error('participants_number') is-invalid is-filled @enderror" />
                    <label for="modalCourseparticipants_number">عدد المشاركين</label>
                </div>
                @error('participants_number')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
              </div>
                            <div Class="row">
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='male_participants' type="number" id="modalCoursemale_participants" placeholder="عدد الذكور المشاركين"
                        class="form-control @error('male_participants') is-invalid is-filled @enderror" />
                    <label for="modalCoursemale_participants">عدد الذكور المشاركين</label>
                </div>
                @error('male_participants')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='female_participants' type="number" id="modalCoursefemale_participants" placeholder="عدد الاناث المشاركين"
                        class="form-control @error('female_participants') is-invalid is-filled @enderror" />
                    <label for="modalCoursefemale_participants">عدد الاناث المشاركين</label>
                </div>
                @error('female_participants')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='notes' type="text" id="modalCoursenotes" placeholder="الملاحظات"
                        class="form-control @error('notes') is-invalid is-filled @enderror" />
                    <label for="modalCoursenotes">الملاحظات</label>
                </div>
                @error('notes')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                    </div>
                </div>  </div>
            </div>
            <hr class="my-0">
            <div class="text-center col-12 demo-vertical-spacing mb-n4">
                <button wire:click='update' wire:loading.attr="disabled" type="button" class="btn btn-success me-sm-3 me-1">تعديل</button>
                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                    aria-label="Close">تجاهل</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>
<!--/ Edite Course Modal -->



<div class="mt-n4">
    <h4 class="mb-1 fw-semiboyld">قائمة</h4>
    <div class="card">

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <input wire:model="CourseSearch" type="text" class="form-control" placeholder="بحث...">
                </div>
                <div>
                    @can('course-create')
                        <button wire:click='AddCourseModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addcourseModal">أضــافــة</button>
                        @include('livewire.courses.modals.add-course')
                    @endcan
                </div>
            </div>
        </div>
        @can('course-list')
            <table class="table">
                <thead class="table-light">
                    <tr>
                     <th>#</th>
                     <th class="text-center">عنوان الدورة</th>
<th class="text-center">مدير البرنامج التدريبي</th>
<th class="text-center">رقم كتاب الدورة</th>
<th class="text-center">تاريخ كتاب الدورة</th>
<th class="text-center">العملية</th>

                    </tr>
            </thead>
            <tbody> 
                 <?php $i = 0; ?>
                  @foreach ($Courses as $Course)
                           <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                   <td class="text-center">{{ $Course->course_title}}</td>
 <td class="text-center">{{ $Course->program_manager}}</td>
 <td class="text-center">{{ $Course->course_book_number}}</td>
 <td class="text-center">{{ $Course->course_book_date}}</td>

                                  <td class="text-center">
                                     <div class="btn-group" role="group" aria-label="First group">
                                         @can('course-edit')
                                             <button wire:click="GetCourse({{ $Course->id }})"
                                                 class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                 data-bs-target="#editcourseModal">
                                                 <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                             </button>
                                         @endcan
                                         @can('course-delete')
                                             <button wire:click="GetCourse({{ $Course->id }})"
                                                 class="p-0 px-1 btn btn-outline-danger waves-effect {{ $Course->active ? 'disabled' : '' }}"
                                                 data-bs-toggle = "modal" data-bs-target="#removecourseModal">
                                                 <i class="tf-icons mdi mdi-delete-outline fs-3"></i>
                                             </button>
                                         @endcan
                                     </div>
                                 </td>
                  </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-2 d-flex justify-content-center">
                {{ $links->links() }}
            </div>
            <!-- Modal -->
            @include('livewire.courses.modals.edit-course')
            @include('livewire.courses.modals.remove-course')
            <!-- Modal -->
        @endcan
    </div>
</div>
</div>
   </div>

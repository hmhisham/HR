<?php

namespace App\Http\Livewire\Courses;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\Courses\Courses;
use Illuminate\Support\Facades\Auth;

class Course extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Courses = [];
    public $CourseSearch, $Course, $CourseId;
    public $user_id, $coaches_id, $course_title, $program_manager, $course_book_number, $course_book_date, $start_date, $end_date, $nominees_number, $male_nominees, $female_nominees, $location, $postponement_book_number, $postponement_book_date, $participation_book_number, $participation_book_date, $participants_number, $male_participants, $female_participants, $notes;


    public function render()
    {
        $CourseSearch = '%' . $this->CourseSearch . '%';
        $Courses = Courses::where('user_id', 'LIKE', $CourseSearch)
            ->orWhere('coaches_id', 'LIKE', $CourseSearch)
            ->orWhere('course_title', 'LIKE', $CourseSearch)
            ->orWhere('program_manager', 'LIKE', $CourseSearch)
            ->orWhere('course_book_number', 'LIKE', $CourseSearch)
            ->orWhere('course_book_date', 'LIKE', $CourseSearch)
            ->orWhere('start_date', 'LIKE', $CourseSearch)
            ->orWhere('end_date', 'LIKE', $CourseSearch)
            ->orWhere('nominees_number', 'LIKE', $CourseSearch)
            ->orWhere('male_nominees', 'LIKE', $CourseSearch)
            ->orWhere('female_nominees', 'LIKE', $CourseSearch)
            ->orWhere('location', 'LIKE', $CourseSearch)
            ->orWhere('postponement_book_number', 'LIKE', $CourseSearch)
            ->orWhere('postponement_book_date', 'LIKE', $CourseSearch)
            ->orWhere('participation_book_number', 'LIKE', $CourseSearch)
            ->orWhere('participation_book_date', 'LIKE', $CourseSearch)
            ->orWhere('participants_number', 'LIKE', $CourseSearch)
            ->orWhere('male_participants', 'LIKE', $CourseSearch)
            ->orWhere('female_participants', 'LIKE', $CourseSearch)
            ->orWhere('notes', 'LIKE', $CourseSearch)


            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Courses;
        $this->Courses = collect($Courses->items());
        return view('livewire.courses.course', [
            'links' => $links
        ]);
    }

    public function AddCourseModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('CourseModalShow');
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
             
            'coaches_id' => 'required',
            'course_title' => 'required',
            'program_manager' => 'required',
            'course_book_number' => 'required',
            'course_book_date' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'nominees_number' => 'required',
            'male_nominees' => 'required',
            'female_nominees' => 'required',
            'location' => 'required',
            'postponement_book_number' => 'required',
            'postponement_book_date' => 'required',
            'participation_book_number' => 'required',
            'participation_book_date' => 'required',
            'participants_number' => 'required',
            'male_participants' => 'required',
            'female_participants' => 'required',


        ], [

            'coaches_id.required' => 'حقل تسلسل المدرب مطلوب',
            'course_title.required' => 'حقل عنوان الدورة مطلوب',
            'program_manager.required' => 'حقل مدير البرنامج التدريبي مطلوب',
            'course_book_number.required' => 'حقل رقم كتاب الدورة مطلوب',
            'course_book_date.required' => 'حقل تاريخ كتاب الدورة مطلوب',
            'start_date.required' => 'حقل تاريخ الانعقاد مطلوب',
            'end_date.required' => 'حقل تاريخ الانتهاء مطلوب',
            'nominees_number.required' => 'حقل عدد المرشحين مطلوب',
            'male_nominees.required' => 'حقل عدد الذكور مطلوب',
            'female_nominees.required' => 'حقل عدد الاناث مطلوب',
            'location.required' => 'حقل مكان الانعقاد مطلوب',
            'postponement_book_number.required' => 'حقل رقم كتاب التاجيل مطلوب',
            'postponement_book_date.required' => 'حقل تاريخ كتاب التاجيل مطلوب',
            'participation_book_number.required' => 'حقل رقم كتاب المشاركه مطلوب',
            'participation_book_date.required' => 'حقل تاريخ كتاب المشاركه مطلوب',
            'participants_number.required' => 'حقل عدد المشاركين مطلوب',
            'male_participants.required' => 'حقل عدد الذكور المشاركين مطلوب',
            'female_participants.required' => 'حقل عدد الاناث المشاركين مطلوب',

        ]);

        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);


        Courses::create([
            'user_id' => Auth::id(),
            'coaches_id' => $this->coaches_id,
            'course_title' => $this->course_title,
            'program_manager' => $this->program_manager,
            'course_book_number' => $this->course_book_number,
            'course_book_date' => $this->course_book_date,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'nominees_number' => $this->nominees_number,
            'male_nominees' => $this->male_nominees,
            'female_nominees' => $this->female_nominees,
            'location' => $this->location,
            'postponement_book_number' => $this->postponement_book_number,
            'postponement_book_date' => $this->postponement_book_date,
            'participation_book_number' => $this->participation_book_number,
            'participation_book_date' => $this->participation_book_date,
            'participants_number' => $this->participants_number,
            'male_participants' => $this->male_participants,
            'female_participants' => $this->female_participants,
            'notes' => $this->notes,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetCourse($CourseId)
    {
        $this->resetValidation();

        $this->Course  = Courses::find($CourseId);
        $this->CourseId = $this->Course->id;
        $this->user_id = $this->Course->user_id;
        $this->coaches_id = $this->Course->coaches_id;
        $this->course_title = $this->Course->course_title;
        $this->program_manager = $this->Course->program_manager;
        $this->course_book_number = $this->Course->course_book_number;
        $this->course_book_date = $this->Course->course_book_date;
        $this->start_date = $this->Course->start_date;
        $this->end_date = $this->Course->end_date;
        $this->nominees_number = $this->Course->nominees_number;
        $this->male_nominees = $this->Course->male_nominees;
        $this->female_nominees = $this->Course->female_nominees;
        $this->location = $this->Course->location;
        $this->postponement_book_number = $this->Course->postponement_book_number;
        $this->postponement_book_date = $this->Course->postponement_book_date;
        $this->participation_book_number = $this->Course->participation_book_number;
        $this->participation_book_date = $this->Course->participation_book_date;
        $this->participants_number = $this->Course->participants_number;
        $this->male_participants = $this->Course->male_participants;
        $this->female_participants = $this->Course->female_participants;
        $this->notes = $this->Course->notes;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([

            'coaches_id' => 'required:courses',
            'course_title' => 'required:courses',
            'program_manager' => 'required:courses',
            'course_book_number' => 'required:courses',
            'course_book_date' => 'required:courses',
            'start_date' => 'required:courses',
            'end_date' => 'required:courses',
            'nominees_number' => 'required:courses',
            'male_nominees' => 'required:courses',
            'female_nominees' => 'required:courses',
            'location' => 'required:courses',
            'postponement_book_number' => 'required:courses',
            'postponement_book_date' => 'required:courses',
            'participation_book_number' => 'required:courses',
            'participation_book_date' => 'required:courses',
            'participants_number' => 'required:courses',
            'male_participants' => 'required:courses',
            'female_participants' => 'required:courses',


        ], [

            'coaches_id.required' => 'حقل الاسم مطلوب',
            'course_title.required' => 'حقل الاسم مطلوب',
            'program_manager.required' => 'حقل الاسم مطلوب',
            'course_book_number.required' => 'حقل الاسم مطلوب',
            'course_book_date.required' => 'حقل الاسم مطلوب',
            'start_date.required' => 'حقل الاسم مطلوب',
            'end_date.required' => 'حقل الاسم مطلوب',
            'nominees_number.required' => 'حقل الاسم مطلوب',
            'male_nominees.required' => 'حقل الاسم مطلوب',
            'female_nominees.required' => 'حقل الاسم مطلوب',
            'location.required' => 'حقل الاسم مطلوب',
            'postponement_book_number.required' => 'حقل الاسم مطلوب',
            'postponement_book_date.required' => 'حقل الاسم مطلوب',
            'participation_book_number.required' => 'حقل الاسم مطلوب',
            'participation_book_date.required' => 'حقل الاسم مطلوب',
            'participants_number.required' => 'حقل الاسم مطلوب',
            'male_participants.required' => 'حقل الاسم مطلوب',
            'female_participants.required' => 'حقل الاسم مطلوب',

        ]);

        $Courses = Courses::find($this->CourseId);
        $Courses->update([
            'user_id' => Auth::id(),
            'coaches_id' => $this->coaches_id,
            'course_title' => $this->course_title,
            'program_manager' => $this->program_manager,
            'course_book_number' => $this->course_book_number,
            'course_book_date' => $this->course_book_date,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'nominees_number' => $this->nominees_number,
            'male_nominees' => $this->male_nominees,
            'female_nominees' => $this->female_nominees,
            'location' => $this->location,
            'postponement_book_number' => $this->postponement_book_number,
            'postponement_book_date' => $this->postponement_book_date,
            'participation_book_number' => $this->participation_book_number,
            'participation_book_date' => $this->participation_book_date,
            'participants_number' => $this->participants_number,
            'male_participants' => $this->male_participants,
            'female_participants' => $this->female_participants,
            'notes' => $this->notes,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Courses = Courses::find($this->CourseId);

        if ($Courses) {

            $Courses->delete();
            $this->reset();
            $this->dispatchBrowserEvent('success', [
                'message' => 'تم حذف البيانات بنجاح',
                'title' => 'الحذف'
            ]);
        }
    }
}

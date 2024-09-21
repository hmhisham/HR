<?php

namespace App\Http\Livewire\Grades;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Grades\Grades;

class Grade extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Grades = [];
    public $GradeSearch, $Grade, $GradeId;
    public $grades_name;


    public function render()
    {
        $GradeSearch = '%' . $this->GradeSearch . '%';
        $Grades = Grades::where('grades_name', 'LIKE', $GradeSearch)


            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Grades;
        $this->Grades = collect($Grades->items());
        return view('livewire.grades.grade', [
            'links' => $links
        ]);
    }

    public function AddGradeModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('GradeModalShow');
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'grades_name' => 'required|unique:grades',

        ], [
            'grades_name.required' => 'حقل الاسم مطلوب',
            'grades_name.unique' => 'الأسم موجود',
        ]);

        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);
        Grades::create([
            'grades_name' => $this->grades_name,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetGrade($GradeId)
    {
        $this->resetValidation();

        $this->Grade  = Grades::find($GradeId);
        $this->GradeId = $this->Grade->id;
        $this->grades_name = $this->Grade->grades_name;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'grades_name' => 'required|unique:grades',

        ], [
            'grades_name.required' => 'حقل الاسم مطلوب',
            'grades_name.unique' => 'الأسم موجود',
        ]);

        $Grades = Grades::find($this->GradeId);
        $Grades->update([
            'grades_name' => $this->grades_name,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Grades = Grades::find($this->GradeId);
        $Grades->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات  بنجاح',
            'title' => 'الحذف '
        ]);
    }
}

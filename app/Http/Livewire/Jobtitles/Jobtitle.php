<?php

namespace App\Http\Livewire\Jobtitles;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Grades\Grades;
use App\Models\Jobtitles\Jobtitles;

class Jobtitle extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Jobtitles = [];
    public $JobtitleSearch, $Jobtitle, $JobtitleId;
    public $grades_id, $jobtitles_name;


    public function render()
    {
        $JobtitleSearch = '%' . $this->JobtitleSearch . '%';
        $Jobtitles = Jobtitles::where('jobtitles_name', 'LIKE', $JobtitleSearch)


            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Jobtitles;
        $this->Jobtitles = collect($Jobtitles->items());
        return view('livewire.jobtitles.jobtitle', [
            'grades' => Grades::get(),
            'links' => $links
        ]);
    }

    public function AddJobtitleModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('JobtitleModalShow');
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'grades_id' => 'required',
            'jobtitles_name' => 'required|unique:jobtitles',

        ], [
            'grades_id.required' => 'حقل الدرجة الوظيفية مطلوب',
            'grades_id.unique' => 'الدرجة الوظيفية موجودة',
            'jobtitles_name.required' => 'حقل العنوان الوظيفي مطلوب',
            'jobtitles_name.unique' => 'العنوان الوظيفي موجود',
        ]);

        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);
        Jobtitles::create([
            'grades_id' => $this->grades_id,
            'jobtitles_name' => $this->jobtitles_name,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetJobtitle($JobtitleId)
    {
        $this->resetValidation();

        $this->Jobtitle  = Jobtitles::find($JobtitleId);
        $this->JobtitleId = $this->Jobtitle->id;
        $this->grades_id = $this->Jobtitle->grades_id;
        $this->jobtitles_name = $this->Jobtitle->jobtitles_name;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'grades_id' => 'required:jobtitles',
            'jobtitles_name' => 'required|unique:jobtitles,jobtitles_name,'.$this->Jobtitle->id.',id',

        ], [
            'grades_id.required' => 'حقل الدرجة الوظيفية مطلوب',
            'grades_id.unique' => 'الدرجة الوظيفية موجودة',
            'jobtitles_name.required' => 'حقل العنوان الوظيفي مطلوب',
            'jobtitles_name.unique' => 'العنوان الوظيفي موجود',
        ]);

        $Jobtitles = Jobtitles::find($this->JobtitleId);
        $Jobtitles->update([
            'grades_id' => $this->grades_id,
            'jobtitles_name' => $this->jobtitles_name,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Jobtitles = Jobtitles::find($this->JobtitleId);
        $Jobtitles->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات  بنجاح',
            'title' => 'الحذف '
        ]);
    }
}

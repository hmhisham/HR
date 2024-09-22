<?php

namespace App\Http\Livewire\Trainings;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Trainings\Trainings;

class Training extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Trainings = [];
    public $TrainingSearch, $Training, $TrainingId;
    public $trainings_name;


    public function render()
    {
        $TrainingSearch = '%' . $this->TrainingSearch . '%';
        $Trainings = Trainings::where('trainings_name', 'LIKE', $TrainingSearch)


            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Trainings;
        $this->Trainings = collect($Trainings->items());
        return view('livewire.trainings.training', [
            'links' => $links
        ]);
    }

    public function AddTrainingModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('TrainingModalShow');
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'trainings_name' => 'required|unique::trainings',

        ], [
            'trainings_name.required' => 'حقل الاسم مطلوب',
            'trainings_name.unique' => 'الاسم موجود',
        ]);

        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);
        Trainings::create([
            'trainings_name' => $this->trainings_name,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetTraining($TrainingId)
    {
        $this->resetValidation();

        $this->Training  = Trainings::find($TrainingId);
        $this->TrainingId = $this->Training->id;
        $this->trainings_name = $this->Training->trainings_name;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'trainings_name' => 'required|unique:trainings',

        ], [
            'trainings_name.required' => 'حقل الاسم مطلوب',
            'trainings_name.unique' => 'الاسم موجود',
        ]);

        $Trainings = Trainings::find($this->TrainingId);
        $Trainings->update([
            'trainings_name' => $this->trainings_name,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Trainings = Trainings::find($this->TrainingId);
        $Trainings->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات  بنجاح',
            'title' => 'الحذف '
        ]);
    }
}

<?php

namespace App\Http\Livewire\Coaches;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\Coaches\Coaches;

class Coache extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Coaches = [];
    public $CoacheSearch, $Coache, $CoacheId;
    public $user_id, $calculator_number, $name_coache, $education, $phone_number, $institution, $training_field, $email, $notes;


    public function render()
    {
        $CoacheSearch = '%' . $this->CoacheSearch . '%';
        $Coaches = Coaches::where('user_id', 'LIKE', $CoacheSearch)
            ->orWhere('calculator_number', 'LIKE', $CoacheSearch)
            ->orWhere('name_coache', 'LIKE', $CoacheSearch)
            ->orWhere('education', 'LIKE', $CoacheSearch)
            ->orWhere('phone_number', 'LIKE', $CoacheSearch)
            ->orWhere('institution', 'LIKE', $CoacheSearch)
            ->orWhere('training_field', 'LIKE', $CoacheSearch)
            ->orWhere('email', 'LIKE', $CoacheSearch)
            ->orWhere('notes', 'LIKE', $CoacheSearch)


            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Coaches;
        $this->Coaches = collect($Coaches->items());
        return view('livewire.coaches.coache', [
            'links' => $links
        ]);
    }

    public function AddCoacheModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('CoacheModalShow');
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'user_id' => 'required',
            'calculator_number' => 'required',
            'name_coache' => 'required',
            'education' => 'required',
            'phone_number' => 'required',
            'institution' => 'required',
            'training_field' => 'required',
            'email' => 'required',
            'notes' => 'required',

        ], [
            'user_id.required' => 'حقل رقم المستخدم مطلوب',
            'calculator_number.required' => 'حقل رقم الحاسبة مطلوب',
            'name_coache.required' => 'حقل اسم المدرب مطلوب',
            'education.required' => 'حقل التحصيل الدراسي مطلوب',
            'phone_number.required' => 'حقل رقم الهاتف مطلوب',
            'institution.required' => 'حقل مؤسسة المدرب مطلوب',
            'training_field.required' => 'حقل مجال التدريب مطلوب',
            'email.required' => 'حقل البريد الالكتروني مطلوب',
            'notes.required' => 'حقل الملاحظات مطلوب',
        ]);

        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);


        Coaches::create([
            'user_id' => $this->user_id,
            'calculator_number' => $this->calculator_number,
            'name_coache' => $this->name_coache,
            'education' => $this->education,
            'phone_number' => $this->phone_number,
            'institution' => $this->institution,
            'training_field' => $this->training_field,
            'email' => $this->email,
            'notes' => $this->notes,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetCoache($CoacheId)
    {
        $this->resetValidation();

        $this->Coache  = Coaches::find($CoacheId);
        $this->CoacheId = $this->Coache->id;
        $this->user_id = $this->Coache->user_id;
        $this->calculator_number = $this->Coache->calculator_number;
        $this->name_coache = $this->Coache->name_coache;
        $this->education = $this->Coache->education;
        $this->phone_number = $this->Coache->phone_number;
        $this->institution = $this->Coache->institution;
        $this->training_field = $this->Coache->training_field;
        $this->email = $this->Coache->email;
        $this->notes = $this->Coache->notes;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'user_id' => 'required:coaches',
            'calculator_number' => 'required:coaches',
            'name_coache' => 'required:coaches',
            'education' => 'required:coaches',
            'phone_number' => 'required:coaches',
            'institution' => 'required:coaches',
            'training_field' => 'required:coaches',
            'email' => 'required:coaches',
            'notes' => 'required:coaches',

        ], [
            'user_id.required' => 'حقل الاسم مطلوب',
            'calculator_number.required' => 'حقل الاسم مطلوب',
            'name_coache.required' => 'حقل الاسم مطلوب',
            'education.required' => 'حقل الاسم مطلوب',
            'phone_number.required' => 'حقل الاسم مطلوب',
            'institution.required' => 'حقل الاسم مطلوب',
            'training_field.required' => 'حقل الاسم مطلوب',
            'email.required' => 'حقل الاسم مطلوب',
            'notes.required' => 'حقل الاسم مطلوب',
        ]);

        $Coaches = Coaches::find($this->CoacheId);
        $Coaches->update([
            'user_id' => $this->user_id,
            'calculator_number' => $this->calculator_number,
            'name_coache' => $this->name_coache,
            'education' => $this->education,
            'phone_number' => $this->phone_number,
            'institution' => $this->institution,
            'training_field' => $this->training_field,
            'email' => $this->email,
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
        $Coaches = Coaches::find($this->CoacheId);

        if ($Coaches) {

            $Coaches->delete();
            $this->reset();
            $this->dispatchBrowserEvent('success', [
                'message' => 'تم حذف البيانات بنجاح',
                'title' => 'الحذف'
            ]);
        }
    }
}

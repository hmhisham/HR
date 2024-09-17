<?php

namespace App\Http\Livewire\Workers;

use Livewire\Component;
use App\Models\Areas\Areas;
use Livewire\WithPagination;
use App\Models\Workers\Workers;
use App\Models\Districts\Districts;
use App\Models\Governorates\Governorates;

class AddWorker extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $currentTap = 1;
    public $GovernorateID, $governorate_id, $district_id, $area_id;
    public $Governorates = [];
    public $Districts = [];
    public $Areas = [];
    public $graduations = [];
    public $specializations = [];
    public $Workers = [];
    public $WorkerSearch = '';
    public function mount()
    {

        $this->Governorates = Governorates::all();
        $this->Areas = Areas::all();
        $this->Districts = Districts::all();
    }



    Public function render()
    {
        $WorkerSearch ='%' . $this->WorkerSearch . '%';
        $Workers = Workers::where('calculator_number', 'LIKE', $WorkerSearch)
        ->orWhere('employee_number', 'LIKE', $WorkerSearch)


         ->orderBy('id', 'ASC')
         ->paginate(10);
        $links = $Workers;
        $this->Workers = collect($Workers->items());
        return view('livewire.workers.AddWorker', [
            'links' => $links
        ]);
    }

    public function GetDistricts($GovernorateID)
    {
        $this->GovernorateID = $GovernorateID;
        $this->Districts = Districts::where('governorate_id', $GovernorateID)->get();
    }
    public function GetAreas($DistrictID)
    {
        $this->Areas = Areas::where('governorate_id', $this->GovernorateID)
            ->where('district_id', $DistrictID)
            ->get();
    }

    public function buttonStep($step)

    {

        if ($step == 1) {
            $this->currentTap = 1;
        } elseif ($step == 2) {
            $this->currentTap = 2;
        } elseif ($step == 3) {
            $this->currentTap = 3;
        } elseif ($step == 4) {
            $this->currentTap = 4;
        } elseif ($step == 5) {
            $this->currentTap = 5;
        } elseif ($step == 6) {
            $this->currentTap = 6;
        } elseif ($step == 7) {
            $this->currentTap = 7;
        } elseif ($step == 8) {
            $this->currentTap = 8;
        }
    }

    public function store()
    {

        // $this->resetValidation();
        $this->validate([
            'calculator_number' => 'required',
            'employee_number' => 'required',
            'paper_folder_number' => 'required',
            'first_name' => 'required',
            'father_name' => 'required',
            'grandfather_name' => 'required',
            'great_grandfather_name' => 'required',
            'surname' => 'required',
            'full_name' => 'required',
            'mother_name' => 'required',
            'maternal_grandfather_name' => 'required',
            'maternal_great_grandfather_name' => 'required',
            'maternal_surname' => 'required',
            'mother_full_name' => 'required',
            'wife_name' => 'required',
            'district_id' => 'required',
            'area_id' => 'required',
            'locality' => 'required',
            'phone_number' => 'required',
            'employee_id_number' => 'required',
            'department_name' => 'required',
            'blood_type' => 'required',
            'email' => 'required',
            'birth_date' => 'required',
            'birth_place' => 'required',
            'governorate_id' => 'required',
            'marital_status' => 'required',
            'religion' => 'required',
            'gender' => 'required',
            'children_count' => 'required',
            'civil_status_identity_number' => 'required',
            'registration_number' => 'required',
            'record_number' => 'required',
            'issue_date_civil_status' => 'required',
            'issuing_authority_civil_status' => 'required',
            'nationality_certificate_number' => 'required',
            'wallet_number' => 'required',
            'issue_date_nationality_certificate' => 'required',
            'issuing_authority_nationality_certificate' => 'required',
            'residence_card_number' => 'required',
            'information_office' => 'required',
            'organization_date' => 'required',
            'ration_card_number' => 'required',
            'ration_card_date' => 'required',
            'national_card_number' => 'required',
            'national_card_date' => 'required',

        ], [
            'calculator_number.required' => 'حقل رقم الحاسبة مطلوب',
            'employee_number.required' => 'حقل الرقم الوظيفي مطلوب',
            'paper_folder_number.required' => 'حقل رقم الاضبارة الورقية مطلوب',
            'first_name.required' => 'حقل الاسم الاول مطلوب',
            'father_name.required' => 'حقل اسم الاب مطلوب',
            'grandfather_name.required' => 'حقل اسم الجد مطلوب',
            'great_grandfather_name.required' => 'حقل اسم والد الجد مطلوب',
            'surname.required' => 'حقل اللقب مطلوب',
            'full_name.required' => 'حقل الاسم الكامل مطلوب',
            'mother_name.required' => 'حقل اسم الام مطلوب',
            'maternal_grandfather_name.required' => 'حقل اسم والد الام مطلوب',
            'maternal_great_grandfather_name.required' => 'حقل اسم جد الام مطلوب',
            'maternal_surname.required' => 'حقل لقب الام مطلوب',
            'mother_full_name.required' => 'حقل اسم الام الكامل مطلوب',
            'wife_name.required' => 'حقل اسم الزوجة مطلوب',
            'district_id.required' => 'حقل القضاء مطلوب',
            'area_id.required' => 'حقل الناحية مطلوب',
            'locality.required' => 'حقل المحلة مطلوب',
            'phone_number.required' => 'حقل رقم الهاتف مطلوب',
            'employee_id_number.required' => 'حقل رقم هوية الموظف مطلوب',
            'department_name.required' => 'حقل اسم الدائرة مطلوب',
            'blood_type.required' => 'حقل صنف الدم مطلوب',
            'email.required' => 'حقل الايميل مطلوب',
            'birth_date.required' => 'حقل تاريخ التولد مطلوب',
            'birth_place.required' => 'حقل محل الولادة مطلوب',
            'governorate_id.required' => 'حقل المحافظة مطلوب',
            'marital_status.required' => 'حقل الحالة الزوجية مطلوب',
            'religion.required' => 'حقل الديانة مطلوب',
            'gender.required' => 'حقل الجنس مطلوب',
            'children_count.required' => 'حقل عدد الاطفال مطلوب',
            'civil_status_identity_number.required' => 'حقل رقم هوية الاحوال مطلوب',
            'registration_number.required' => 'حقل رقم السجل مطلوب',
            'record_number.required' => 'حقل رقم الصحيفة مطلوب',
            'issue_date_civil_status.required' => 'حقل تاريخ الاصدار مطلوب',
            'issuing_authority_civil_status.required' => 'حقل جهة الاصدار مطلوب',
            'nationality_certificate_number.required' => 'حقل رقم شهادة الجنسية مطلوب',
            'wallet_number.required' => 'حقل رقم المحفظة مطلوب',
            'issue_date_nationality_certificate.required' => 'حقل تاريخ الاصدار مطلوب',
            'issuing_authority_nationality_certificate.required' => 'حقل جهة الاصدار مطلوب',
            'residence_card_number.required' => 'حقل رقم بطاقة السكن مطلوب',
            'information_office.required' => 'حقل مكتب المعلومات مطلوب',
            'organization_date.required' => 'حقل تاريخ التنظيم مطلوب',
            'ration_card_number.required' => 'حقل رقم البطاقة التموينية مطلوب',
            'ration_card_date.required' => 'حقل تاريخها مطلوب',
            'national_card_number.required' => 'حقل رقم البطاقة الوطنية مطلوب',
            'national_card_date.required' => 'حقل تاريخها مطلوب',
        ]);


        Workers::create([
            'calculator_number' => $this->calculator_number,
            'employee_number' => $this->employee_number,
            'paper_folder_number' => $this->paper_folder_number,
            'first_name' => $this->first_name,
            'father_name' => $this->father_name,
            'grandfather_name' => $this->grandfather_name,
            'great_grandfather_name' => $this->great_grandfather_name,
            'surname' => $this->surname,
            'full_name' => $this->full_name,
            'mother_name' => $this->mother_name,
            'maternal_grandfather_name' => $this->maternal_grandfather_name,
            'maternal_great_grandfather_name' => $this->maternal_great_grandfather_name,
            'maternal_surname' => $this->maternal_surname,
            'mother_full_name' => $this->mother_full_name,
            'wife_name' => $this->wife_name,
            'district_id' => $this->district_id,
            'area_id' => $this->area_id,
            'locality' => $this->locality,
            'phone_number' => $this->phone_number,
            'employee_id_number' => $this->employee_id_number,
            'department_name' => $this->department_name,
            'blood_type' => $this->blood_type,
            'email' => $this->email,
            'birth_date' => $this->birth_date,
            'birth_place' => $this->birth_place,
            'governorate_id' => $this->governorate_id,
            'marital_status' => $this->marital_status,
            'religion' => $this->religion,
            'gender' => $this->gender,
            'children_count' => $this->children_count,
            'civil_status_identity_number' => $this->civil_status_identity_number,
            'registration_number' => $this->registration_number,
            'record_number' => $this->record_number,
            'issue_date_civil_status' => $this->issue_date_civil_status,
            'issuing_authority_civil_status' => $this->issuing_authority_civil_status,
            'nationality_certificate_number' => $this->nationality_certificate_number,
            'wallet_number' => $this->wallet_number,
            'issue_date_nationality_certificate' => $this->issue_date_nationality_certificate,
            'issuing_authority_nationality_certificate' => $this->issuing_authority_nationality_certificate,
            'residence_card_number' => $this->residence_card_number,
            'information_office' => $this->information_office,
            'organization_date' => $this->organization_date,
            'ration_card_number' => $this->ration_card_number,
            'ration_card_date' => $this->ration_card_date,
            'national_card_number' => $this->national_card_number,
            'national_card_date' => $this->national_card_date,

        ]);
        // $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }
}

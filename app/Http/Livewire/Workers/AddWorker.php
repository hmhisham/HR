<?php

namespace App\Http\Livewire\Workers;

use Livewire\Component;
use App\Models\Areas\Areas;
use Livewire\WithPagination;
use App\Models\Workers\Workers;
use App\Models\Districts\Districts;
use Illuminate\Support\Facades\Auth;
use App\Models\Infooffice\Infooffice;
use App\Models\Governorates\Governorates;

class AddWorker extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $currentTap = 1;
    public $GovernorateID;
    public $Governorates = [];
    public $Districts = [];
    public $Areas = [];
    public $graduations = [];
    public $specializations = [];
    public $Workers = [];
    public $infooffice = [];

    public $WorkerSearch = '';
    public $calculator_number, $employee_number, $paper_folder_number, $first_name, $father_name, $grandfather_name, $great_grandfather_name, $surname, $full_name;
    public $mother_name, $maternal_grandfather_name, $maternal_great_grandfather_name, $maternal_surname, $mother_full_name;
    public $phone_number, $employee_id_number, $department_name, $blood_type, $email;
    public $governorate_id, $district_id, $area_id, $locality, $birth_date, $birth_place, $marital_status, $wife_name, $children_count, $religion, $gender;
    public $civil_status_identity_number, $registration_number, $record_number, $issue_date_civil_status, $issuing_authority_civil_status;
    public $nationality_certificate_number, $wallet_number, $issue_date_nationality_certificate, $issuing_authority_nationality_certificate;
    public $residence_card_number, $information_office, $organization_date;
    public $ration_card_number, $ration_card_date, $national_card_number, $national_card_date;
    public $isMaritalStatus, $HusbandName;


    protected $listeners = [
        'GetDistricts',
        'GetAreas',
        'SelectArea',
        'SelectInformationOffice',
    ];

    public function hydrate()
    {
        $this->emit('select2');
        $this->emit('flatpickr');
    }

    public function mount()
    {
        $this->Governorates = Governorates::all();
        $this->infooffice = Infooffice::all();
    }

    public function SelectInformationOffice($InformationOfficeID)
    {
        $information_office = Infooffice::find($InformationOfficeID);

        if ($information_office) {
            $this->information_office = $InformationOfficeID;
        } else {
            $this->information_office = null;
        }
    }

    public function render()
    {
        $WorkerSearch = '%' . $this->WorkerSearch . '%';
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
    public function AddWorkerModalShow()
    {
        // $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('WorkerModalShow');
    }

    public function changeName()
    {
        $this->first_name = trim($this->first_name);
        $this->father_name = trim($this->father_name);
        $this->grandfather_name = trim($this->grandfather_name);
        $this->great_grandfather_name = trim($this->great_grandfather_name);
        $this->surname = trim($this->surname);

        $this->full_name = $this->first_name;
        if ($this->father_name != '') {
            $this->full_name .= ' ';
            $this->full_name .= $this->father_name;
        }
        if ($this->grandfather_name != '') {
            $this->full_name .= ' ';
            $this->full_name .= $this->grandfather_name;
        }
        if ($this->great_grandfather_name != '') {
            $this->full_name .= ' ';
            $this->full_name .= $this->great_grandfather_name;
        }
        if ($this->surname != '') {
            $this->full_name .= ' ';
            $this->full_name .= $this->surname;
        }

        $this->resetValidation();
        $this->validate([
            'first_name' => 'required',
            'father_name' => 'required',
            'grandfather_name' => 'required',
            'great_grandfather_name' => 'required',
        ], [
            'first_name.required' => 'حقل الاسم الاول مطلوب',
            'father_name.required' => 'حقل اسم الاب مطلوب',
            'grandfather_name.required' => 'حقل اسم الجد مطلوب',
            'great_grandfather_name.required' => 'حقل اسم والد الجد مطلوب',
        ]);
    }

    public function changeNameMother()
    {
        $this->mother_name = trim($this->mother_name);
        $this->maternal_grandfather_name = trim($this->maternal_grandfather_name);
        $this->maternal_great_grandfather_name = trim($this->maternal_great_grandfather_name);
        $this->maternal_surname = trim($this->maternal_surname);

        $this->mother_full_name = $this->mother_name;
        if ($this->maternal_grandfather_name != '') {
            $this->mother_full_name .= ' ';
            $this->mother_full_name .= $this->maternal_grandfather_name;
        }
        if ($this->maternal_great_grandfather_name != '') {
            $this->mother_full_name .= ' ';
            $this->mother_full_name .= $this->maternal_great_grandfather_name;
        }
        if ($this->maternal_surname != '') {
            $this->mother_full_name .= ' ';
            $this->mother_full_name .= $this->maternal_surname;
        }

        $this->resetValidation();
        $this->validate([
            'mother_name' => 'required',
            'maternal_grandfather_name' => 'required',
            'maternal_great_grandfather_name' => 'required',
        ], [
            'mother_name.required' => 'حقل اسم الام مطلوب',
            'maternal_grandfather_name.required' => 'حقل اسم والد الام مطلوب',
            'maternal_great_grandfather_name.required' => 'حقل اسم جد الام مطلوب',
        ]);
    }

    public function GetDistricts($GovernorateID)
    {
        $this->governorate_id = $GovernorateID;
        $this->GovernorateID = $GovernorateID;
        $this->Districts = Districts::where('governorate_id', $GovernorateID)->get();
    }
    public function GetAreas($DistrictID)
    {
        $this->district_id = $DistrictID;
        $this->Areas = Areas::where('governorate_id', $this->GovernorateID)
            ->where('district_id', $DistrictID)
            ->get();
    }
    public function SelectArea($AreaID)
    {
        $this->area_id = $AreaID;
    }

    public function getWifeNameStatus($MaritalStatus)
    {

        if ($MaritalStatus == 'اعزب' or $MaritalStatus == 'باكر') {
            $this->isMaritalStatus = '';
            $this->isMaritalStatus = 'disabled';
        } elseif ($MaritalStatus == 'متزوجة' or $MaritalStatus == 'مطلقة' or $MaritalStatus == 'ارملة') {
            $this->HusbandName = 'اسم الزوج';
        } else {
            $this->HusbandName = 'اسم الزوجة';
        }
    }

    public function AddWorker()
    {

        $this->resetValidation();
        $this->validate([
            'calculator_number' => 'required|unique:workers,calculator_number',
            //'employee_number' => 'required|unique:workers,employee_number',
            //'paper_folder_number' => 'required|unique:workers,paper_folder_number',
            'first_name' => 'required',
            'father_name' => 'required',
            'grandfather_name' => 'required',
            'great_grandfather_name' => 'required',
            //'surname' => 'required',
            'full_name' => 'required|unique:workers,full_name',
            'mother_name' => 'required',
            'maternal_grandfather_name' => 'required',
            'maternal_great_grandfather_name' => 'required',
            'mother_full_name' => 'required:workers,mother_full_name',
            'phone_number' => 'required',

        ], [
            'calculator_number.required' => 'حقل رقم الحاسبة مطلوب',
            'calculator_number.unique' => 'لقد تم أخذ رقم الحاسبة بالفعل',
            //'employee_number.required' => 'حقل الرقم الوظيفي مطلوب',
            //'employee_number.unique' => 'لقد تم أخذ الرقم الوظيفي بالفعل',
            //'paper_folder_number.required' => 'حقل رقم الاضبارة الورقية مطلوب',
            //'paper_folder_number.unique' => 'لقد تم أخذ رقم الاضبارة الورقية بالفعل',
            'first_name.required' => 'حقل الاسم الاول مطلوب',
            'father_name.required' => 'حقل اسم الاب مطلوب',
            'grandfather_name.required' => 'حقل اسم الجد مطلوب',
            'great_grandfather_name.required' => 'حقل اسم والد الجد مطلوب',
            //'surname.required' => 'حقل اللقب مطلوب',
            'full_name.required' => 'حقل الاسم الكامل مطلوب',
            'full_name.unique' => 'لقد تم أخذ أسم الموظف بالفعل',
            'mother_name.required' => 'حقل اسم الام مطلوب',
            'maternal_grandfather_name.required' => 'حقل اسم والد الام مطلوب',
            'maternal_great_grandfather_name.required' => 'حقل اسم جد الام مطلوب',
            'mother_full_name.required' => 'حقل الاسم الكامل مطلوب',
            'phone_number.required' => 'حقل رقم الهاتف مطلوب',
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
            //'department_name' => $this->department_name,
            'blood_type' => $this->blood_type,
            'email' => $this->email,
            'birth_date' => $this->birth_date,
            'birth_place' => $this->birth_place,
            'governorate_id' => $this->governorate_id,
            'marital_status' => $this->marital_status,
            'religion' => $this->religion,
            'gender' => $this->gender,
            'children_count' => $this->children_count,
            //'civil_status_identity_number' => $this->civil_status_identity_number,
            //'registration_number' => $this->registration_number,
            //'record_number' => $this->record_number,
            //'issue_date_civil_status' => $this->issue_date_civil_status,
            //'issuing_authority_civil_status' => $this->issuing_authority_civil_status,
            //'nationality_certificate_number' => $this->nationality_certificate_number,
            //'wallet_number' => $this->wallet_number,
            //'issue_date_nationality_certificate' => $this->issue_date_nationality_certificate,
            //'issuing_authority_nationality_certificate' => $this->issuing_authority_nationality_certificate,
            'residence_card_number' => $this->residence_card_number,
            'information_office' => $this->information_office,
            'organization_date' => $this->organization_date,
            'ration_card_number' => $this->ration_card_number,
            'ration_card_date' => $this->ration_card_date,
            'national_card_number' => $this->national_card_number,
            'national_card_date' => $this->national_card_date,
            'user_id' => Auth::id(),
        ]);

        // $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافة بنجاح',
            'title' => 'اضافة'
        ]);


    }
}

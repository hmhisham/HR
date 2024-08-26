<?php

namespace App\Http\Livewire\EmpInfoBank;

use Livewire\Component;
use App\Models\Areas\Areas;
use App\Models\Districts\Districts;
use App\Models\Employees\Employees;
use App\Models\Graduations\Graduations;
use App\Models\Governorates\Governorates;
use App\Http\Livewire\Graduations\Graduation;
use App\Models\Specializations\Specializations;

class AddEmployee extends Component
{
    public $currentStep = 1;
    public $activatedStep = 'active';
    public $crossedStep = 'crossed';

    public $GovernorateID , $governorate_id ;
    public $Governorates = [];
    public $Districts = [];
    public $Areas = [];
    public $graduations=[];
    public $specializations=[];

    public $JobNumber, $FileNumber, $FirstName, $SecondName, $ThirdName, $FourthName, $LastName, $MotherName, $MotherFatherName, $MotherGrandName, $MotherLastName;
    public $DateBirth, $PlaceBirth, $BirthGovernorate, $BirthPlace, $MaritalStatus, $Religion, $Gender;
    public $district_id, $area_id, $NearestPoint, $PhoneNumber1, $PhoneNumber2;
    public $NationalCardGovernorate, $OfficeId, $RecordId, $PageId, $CertificateNoId, $DateIssueId, $EndDateId, $FileId;
    public $FileNoCert, $CertificateNoCert, $DateIssueCert, $EndDateCert, $FileCert;
    public $FormNoCard, $CardNoCard, $DateIssueCard, $EndDateCard, $FileCard;
    public $CardNoSupply, $CenterNameSupply, $CenterNoSupply, $FileSupply;
    public $LicenseDriving, $DateIssueDriving, $EndDateDriving, $FileDriving ;

    protected $listeners = [
        'DateBirth',
    ];

    public function hydrate()
    {
        $this->emit('flatpickr');
    }

    public function mount()
    {
        $this->Governorates = Governorates::all();
        $this->NationalCardGovernorate = Governorates::all();
              $this->graduations =  Graduations::all();
        $this->specializations = Specializations::all();

    }

    public function render()
    {
        return view('livewire.emp-info-bank.add-employee');
    }

    public function concatFullName($currentStep)
    {
    }

    public function DateBirth($DateBirth)
    {
        $this->DateBirth = $DateBirth;
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

    public function ifNext($currentStep)
    {
        switch ($currentStep) {
            case 1:
                $this->currentStep += 1;
                break;
            case 2:
                $this->currentStep += 1;
                break;
            case 3:
                $this->currentStep += 1;
                break;
            case 4:
                $this->currentStep += 1;
                break;
            case 5:
                $this->currentStep += 1;
                break;
            case 6:
                $this->currentStep += 1;
                break;
            case 7:
                $this->currentStep += 1;
                break;
            case 8:
                $this->currentStep += 1;
                break;
            default:
                $this->currentStep = 0;
        }
    }

    public function ifPre($currentStep)
    {
        switch ($currentStep) {
            case 2:
                $this->currentStep -= 1;
                break;
            case 3:
                $this->currentStep -= 1;
                break;
            case 4:
                $this->currentStep -= 1;
                break;
            case 5:
                $this->currentStep -= 1;
                break;
            case 6:
                $this->currentStep -= 1;
                break;
            case 7:
                $this->currentStep -= 1;
                break;
            case 8:
                $this->currentStep -= 1;
                break;
            default:
                $this->currentStep = 0;
        }
    }

    public function ifSubmit()
    {
        $this->currentStep = 1;

        $this->resetValidation();
        $this->validate([
            'JobNumber' => 'required|digits:9|unique:employees,JobNumber',
            'FileNumber' => 'required|numeric|unique:employees,FileNumber',
            'FirstName' => 'required|string|regex:/^[\s\p{Arabic}]+$/u',
            'SecondName' => 'required|string|regex:/^[\s\p{Arabic}]+$/u',
            'ThirdName' => 'required|string|regex:/^[\s\p{Arabic}]+$/u',
            'FourthName' => 'required|string|regex:/^[\s\p{Arabic}]+$/u',
            'LastName' => 'required|string|regex:/^[\s\p{Arabic}]+$/u',
            'MotherName' => 'required|string|regex:/^[\s\p{Arabic}]+$/u',
            'MotherFatherName' => 'required|string|regex:/^[\s\p{Arabic}]+$/u',
            'MotherGrandName' => 'nullable|regex:/^[\s\p{Arabic}\""]+$/u',
            'MotherLastName' => 'nullable|regex:/^[\s\p{Arabic}\""]+$/u',
        ], [
            'JobNumber.required' => 'الرقم الوظيفي مطلوب',
            'JobNumber.digits' => 'يجب أن يتكون الرقم الوظيفي من 9 ارقام فقط.',
            'JobNumber.unique' => 'الرقم الوظيفي مستخدم',
            'FileNumber.required' => 'رقم الاضبارة مطلوب',
            'FileNumber.digits' => 'يجب أن يتكون رقم الاضبارة من ارقام فقط.',
            'FileNumber.unique' => 'رقم الاضبارة مستخدم',
            'FirstName.required' => 'الاسم الاول مطلوب',
            'FirstName.regex' => 'المدخلات يجب ان تكون باللغة العربية فقط',
            'SecondName.required' => 'الاسم الثاني مطلوب',
            'SecondName.regex' => 'المدخلات يجب ان تكون باللغة العربية فقط',
            'ThirdName.required' => 'الاسم الثالث مطلوب',
            'ThirdName.regex' => 'المدخلات يجب ان تكون باللغة العربية فقط',
            'FourthName.required' => 'الاسم الرابع مطلوب',
            'FourthName.regex' => 'المدخلات يجب ان تكون باللغة العربية فقط',
            'LastName.required' => 'اللقب مطلوب',
            'LastName.regex' => 'المدخلات يجب ان تكون باللغة العربية فقط',
            'MotherName.required' => 'اسم الام مطلوب',
            'MotherName.regex' => 'المدخلات يجب ان تكون باللغة العربية فقط',
            'MotherFatherName.required' => 'اسم والد الام مطلوب',
            'MotherFatherName.regex' => 'المدخلات يجب ان تكون باللغة العربية فقط',
            'MotherGrandName.regex' => 'المدخلات يجب ان تكون باللغة العربية فقط',
            'MotherLastName.regex' => 'المدخلات يجب ان تكون باللغة العربية فقط',
        ]);
        $this->currentStep = 2;

        $this->resetValidation();
        $this->validate([
            'DateBirth' => 'required',
            'PlaceBirth' => 'required',
            'BirthGovernorate' => 'required',
            'BirthPlace' => 'required',
            'MaritalStatus' => 'required',
            'Religion' => 'required',
            'Gender' => 'required',
        ], [
            'DateBirth.required' => 'مطلوب',
            'PlaceBirth.required' => 'مطلوب',
            'BirthGovernorate.required' => 'مطلوب',
            'BirthPlace.required' => 'مطلوب',
            'MaritalStatus.required' => 'مطلوب',
            'Religion.required' => 'مطلوب',
            'Gender.required' => 'مطلوب',
        ]);
        $this->currentStep = 2;

        $this->resetValidation();
        $this->validate([
            'district_id' => 'required',
            'area_id' => 'required',
            'NearestPoint' => 'required',
            'PhoneNumber1' => 'required',
            'PhoneNumber2' => 'required',
        ], [
            'district_id.required' => 'مطلوب',
            'area_id.required' => 'مطلوب',
            'NearestPoint.required' => 'مطلوب',
            'PhoneNumber1.required' => 'مطلوب',
            'PhoneNumber2.required' => 'مطلوب',
        ]);
        $this->currentStep = 3;

        $this->resetValidation();
        $this->validate([
            'NationalCardGovernorate' => 'required',
            'OfficeId' => 'required',
            'RecordId' => 'required',
            'PageId' => 'required',
            'CertificateNoId' => 'required',
            'DateIssueId' => 'required',
            'EndDateId' => 'required',
            //'FileId' => 'required',
        ], [
            'NationalCardGovernorate.required' => 'مطلوب',
            'OfficeId.required' => 'مطلوب',
            'RecordId.required' => 'مطلوب',
            'PageId.required' => 'مطلوب',
            'CertificateNoId.required' => 'مطلوب',
            'DateIssueId.required' => 'مطلوب',
            'EndDateId.required' => 'مطلوب',
            //'FileId.required' => 'مطلوب',
        ]);
        $this->currentStep = 4;

        $this->resetValidation();
        $this->validate([
            'FileNoCert' => 'required',
            'CertificateNoCert' => 'required',
            'DateIssueCert' => 'required',
            'EndDateCert' => 'required',
            //'FileCert' => 'required',
        ], [
            'FileNoCert.required' => 'مطلوب',
            'CertificateNoCert.required' => 'مطلوب',
            'DateIssueCert.required' => 'مطلوب',
            'EndDateCert.required' => 'مطلوب',
            //'FileCert.required' => 'مطلوب',
        ]);
        $this->currentStep = 5;

        $this->resetValidation();
        $this->validate([
            'FormNoCard' => 'required',
            'CardNoCard' => 'required',
            'DateIssueCard' => 'required',
            'EndDateCard' => 'required',
            //'FileCard' => 'required',
        ], [
            'FormNoCard.required' => 'مطلوب',
            'CardNoCard.required' => 'مطلوب',
            'DateIssueCard.required' => 'مطلوب',
            'EndDateCard.required' => 'مطلوب',
            //'FileCard.required' => 'مطلوب',
        ]);
        $this->currentStep = 6;

        $this->resetValidation();
        $this->validate([
            'CardNoSupply' => 'required',
            'CenterNameSupply' => 'required',
            'CenterNoSupply' => 'required',
            //'FileSupply' => 'required',
        ], [
            'CardNoSupply.required' => 'مطلوب',
            'CenterNameSupply.required' => 'مطلوب',
            'CenterNoSupply.required' => 'مطلوب',
            //'FileSupply.required' => 'مطلوب',
        ]);
        $this->currentStep = 7;

        $this->resetValidation();
        $this->validate([
            'LicenseDriving' => 'required',
            'DateIssueDriving' => 'required',
            'EndDateDriving' => 'required',
            //'FileDriving' => 'required',
        ], [
            'LicenseDriving.required' => 'مطلوب',
            'DateIssueDriving.required' => 'مطلوب',
            'EndDateDriving.required' => 'مطلوب',
            //'FileDriving.required' => 'مطلوب',
        ]);
        $this->currentStep = 8;

        Employees::create([
            'JobNumber' => $this->JobNumber
        ]);
    }
}

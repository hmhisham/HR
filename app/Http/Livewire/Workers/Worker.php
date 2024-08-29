<?php
namespace App\Http\Livewire\Workers;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Workers\Workers;
class Worker extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Workers = [];
     public $WorkerSearch, $Worker, $WorkerId;
    public $user_id,$calculator_number,$employee_number,$paper_folder_number,$first_name,$father_name,$grandfather_name,$great_grandfather_name,$surname,$full_name,$mother_name,$maternal_grandfather_name,$maternal_great_grandfather_name,$maternal_surname,$mother_full_name,$wife_name,$district_id,$area_id,$locality,$phone_number,$employee_id_number,$department_name,$blood_type,$email,$birth_date,$birth_place,$governorate_id,$marital_status,$religion,$gender,$children_count,$civil_status_identity_number,$registration_number,$record_number,$issue_date_civil_status,$issuing_authority_civil_status,$nationality_certificate_number,$wallet_number,$issue_date_nationality_certificate,$issuing_authority_nationality_certificate,$residence_card_number,$information_office,$organization_date,$ration_card_number,$ration_card_date,$national_card_number,$national_card_date,$education_service,$graduation_year_service,$graduation_institution_service,$specialization_service,$document_number,$document_date,$document_verification_number,$document_verification_date,$education_appointment,$graduation_year_appointment,$graduation_institution_appointment,$specialization_appointment,$service_type,$service_status,$contract_type,$service_case_type,$general_specialization,$precise_specialization,$degree,$position_title,$appointment_order_number,$appointment_date,$start_work_date,$promotion_order,$promotion_date,$entitlement_date,$increment_order,$increment_date,$referral_order_number,$referral_order_date,$termination_reason,$transfer_date,$resumption_date,$binding_authority,$department,$division,$unit,$secondment_authority,$notes,$position,$position_start_date,$issuing_authority,$assignment_order_number,$assignment_order_date,$assignment_type,$assignment_status,$second_position,$second_position_start_date,$second_issuing_authority,$second_assignment_order_number,$second_assignment_order_date,$second_assignment_type,$second_assignment_status,$end_date,$service_days,$service_months,$service_years,$total_retirement_days,$total_retirement_months,$total_retirement_years,$total_actual_days,$total_actual_months,$total_actual_years,$total_college_days,$total_college_months,$total_college_years,$mypassword;

    public $currentTap = 1;
    public $GovernorateID   ;
    public $Governorates = [];
    public $Districts = [];
    public $Areas = [];
    public $graduations=[];
    public $specializations=[];


    Public function render()
    {
        $WorkerSearch ='%' . $this->WorkerSearch . '%';
        $Workers = Workers::where('user_id', 'LIKE', $WorkerSearch)
->orWhere('calculator_number', 'LIKE', $WorkerSearch)
->orWhere('employee_number', 'LIKE', $WorkerSearch)
->orWhere('paper_folder_number', 'LIKE', $WorkerSearch)
->orWhere('first_name', 'LIKE', $WorkerSearch)
->orWhere('father_name', 'LIKE', $WorkerSearch)
->orWhere('grandfather_name', 'LIKE', $WorkerSearch)
->orWhere('great_grandfather_name', 'LIKE', $WorkerSearch)
->orWhere('surname', 'LIKE', $WorkerSearch)
->orWhere('full_name', 'LIKE', $WorkerSearch)
->orWhere('mother_name', 'LIKE', $WorkerSearch)
->orWhere('maternal_grandfather_name', 'LIKE', $WorkerSearch)
->orWhere('maternal_great_grandfather_name', 'LIKE', $WorkerSearch)
->orWhere('maternal_surname', 'LIKE', $WorkerSearch)
->orWhere('mother_full_name', 'LIKE', $WorkerSearch)
->orWhere('wife_name', 'LIKE', $WorkerSearch)
->orWhere('district_id', 'LIKE', $WorkerSearch)
->orWhere('area_id', 'LIKE', $WorkerSearch)
->orWhere('locality', 'LIKE', $WorkerSearch)
->orWhere('phone_number', 'LIKE', $WorkerSearch)
->orWhere('employee_id_number', 'LIKE', $WorkerSearch)
->orWhere('department_name', 'LIKE', $WorkerSearch)
->orWhere('blood_type', 'LIKE', $WorkerSearch)
->orWhere('email', 'LIKE', $WorkerSearch)
->orWhere('birth_date', 'LIKE', $WorkerSearch)
->orWhere('birth_place', 'LIKE', $WorkerSearch)
->orWhere('governorate_id', 'LIKE', $WorkerSearch)
->orWhere('marital_status', 'LIKE', $WorkerSearch)
->orWhere('religion', 'LIKE', $WorkerSearch)
->orWhere('gender', 'LIKE', $WorkerSearch)
->orWhere('children_count', 'LIKE', $WorkerSearch)
->orWhere('civil_status_identity_number', 'LIKE', $WorkerSearch)
->orWhere('registration_number', 'LIKE', $WorkerSearch)
->orWhere('record_number', 'LIKE', $WorkerSearch)
->orWhere('issue_date_civil_status', 'LIKE', $WorkerSearch)
->orWhere('issuing_authority_civil_status', 'LIKE', $WorkerSearch)
->orWhere('nationality_certificate_number', 'LIKE', $WorkerSearch)
->orWhere('wallet_number', 'LIKE', $WorkerSearch)
->orWhere('issue_date_nationality_certificate', 'LIKE', $WorkerSearch)
->orWhere('issuing_authority_nationality_certificate', 'LIKE', $WorkerSearch)
->orWhere('residence_card_number', 'LIKE', $WorkerSearch)
->orWhere('information_office', 'LIKE', $WorkerSearch)
->orWhere('organization_date', 'LIKE', $WorkerSearch)
->orWhere('ration_card_number', 'LIKE', $WorkerSearch)
->orWhere('ration_card_date', 'LIKE', $WorkerSearch)
->orWhere('national_card_number', 'LIKE', $WorkerSearch)
->orWhere('national_card_date', 'LIKE', $WorkerSearch)
->orWhere('education_service', 'LIKE', $WorkerSearch)
->orWhere('graduation_year_service', 'LIKE', $WorkerSearch)
->orWhere('graduation_institution_service', 'LIKE', $WorkerSearch)
->orWhere('specialization_service', 'LIKE', $WorkerSearch)
->orWhere('document_number', 'LIKE', $WorkerSearch)
->orWhere('document_date', 'LIKE', $WorkerSearch)
->orWhere('document_verification_number', 'LIKE', $WorkerSearch)
->orWhere('document_verification_date', 'LIKE', $WorkerSearch)
->orWhere('education_appointment', 'LIKE', $WorkerSearch)
->orWhere('graduation_year_appointment', 'LIKE', $WorkerSearch)
->orWhere('graduation_institution_appointment', 'LIKE', $WorkerSearch)
->orWhere('specialization_appointment', 'LIKE', $WorkerSearch)
->orWhere('service_type', 'LIKE', $WorkerSearch)
->orWhere('service_status', 'LIKE', $WorkerSearch)
->orWhere('contract_type', 'LIKE', $WorkerSearch)
->orWhere('service_case_type', 'LIKE', $WorkerSearch)
->orWhere('general_specialization', 'LIKE', $WorkerSearch)
->orWhere('precise_specialization', 'LIKE', $WorkerSearch)
->orWhere('degree', 'LIKE', $WorkerSearch)
->orWhere('position_title', 'LIKE', $WorkerSearch)
->orWhere('appointment_order_number', 'LIKE', $WorkerSearch)
->orWhere('appointment_date', 'LIKE', $WorkerSearch)
->orWhere('start_work_date', 'LIKE', $WorkerSearch)
->orWhere('promotion_order', 'LIKE', $WorkerSearch)
->orWhere('promotion_date', 'LIKE', $WorkerSearch)
->orWhere('entitlement_date', 'LIKE', $WorkerSearch)
->orWhere('increment_order', 'LIKE', $WorkerSearch)
->orWhere('increment_date', 'LIKE', $WorkerSearch)
->orWhere('referral_order_number', 'LIKE', $WorkerSearch)
->orWhere('referral_order_date', 'LIKE', $WorkerSearch)
->orWhere('termination_reason', 'LIKE', $WorkerSearch)
->orWhere('transfer_date', 'LIKE', $WorkerSearch)
->orWhere('resumption_date', 'LIKE', $WorkerSearch)
->orWhere('binding_authority', 'LIKE', $WorkerSearch)
->orWhere('department', 'LIKE', $WorkerSearch)
->orWhere('division', 'LIKE', $WorkerSearch)
->orWhere('unit', 'LIKE', $WorkerSearch)
->orWhere('secondment_authority', 'LIKE', $WorkerSearch)
->orWhere('notes', 'LIKE', $WorkerSearch)
->orWhere('position', 'LIKE', $WorkerSearch)
->orWhere('position_start_date', 'LIKE', $WorkerSearch)
->orWhere('issuing_authority', 'LIKE', $WorkerSearch)
->orWhere('assignment_order_number', 'LIKE', $WorkerSearch)
->orWhere('assignment_order_date', 'LIKE', $WorkerSearch)
->orWhere('assignment_type', 'LIKE', $WorkerSearch)
->orWhere('assignment_status', 'LIKE', $WorkerSearch)
->orWhere('second_position', 'LIKE', $WorkerSearch)
->orWhere('second_position_start_date', 'LIKE', $WorkerSearch)
->orWhere('second_issuing_authority', 'LIKE', $WorkerSearch)
->orWhere('second_assignment_order_number', 'LIKE', $WorkerSearch)
->orWhere('second_assignment_order_date', 'LIKE', $WorkerSearch)
->orWhere('second_assignment_type', 'LIKE', $WorkerSearch)
->orWhere('second_assignment_status', 'LIKE', $WorkerSearch)
->orWhere('end_date', 'LIKE', $WorkerSearch)
->orWhere('service_days', 'LIKE', $WorkerSearch)
->orWhere('service_months', 'LIKE', $WorkerSearch)
->orWhere('service_years', 'LIKE', $WorkerSearch)
->orWhere('total_retirement_days', 'LIKE', $WorkerSearch)
->orWhere('total_retirement_months', 'LIKE', $WorkerSearch)
->orWhere('total_retirement_years', 'LIKE', $WorkerSearch)
->orWhere('total_actual_days', 'LIKE', $WorkerSearch)
->orWhere('total_actual_months', 'LIKE', $WorkerSearch)
->orWhere('total_actual_years', 'LIKE', $WorkerSearch)
->orWhere('total_college_days', 'LIKE', $WorkerSearch)
->orWhere('total_college_months', 'LIKE', $WorkerSearch)
->orWhere('total_college_years', 'LIKE', $WorkerSearch)
->orWhere('mypassword', 'LIKE', $WorkerSearch)


         ->orderBy('id', 'ASC')
         ->paginate(10);
        $links = $Workers;
        $this->Workers = collect($Workers->items());
        return view('livewire.workers.worker', [
            'links' => $links
        ]);
    }

    public function AddWorkerModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('WorkerModalShow');
    }


    public function store()
    {
        $this->resetValidation();
         $this->validate(['user_id' => 'required' ,
'calculator_number' => 'required' ,
'employee_number' => 'required' ,
'paper_folder_number' => 'required' ,
'first_name' => 'required' ,
'father_name' => 'required' ,
'grandfather_name' => 'required' ,
'great_grandfather_name' => 'required' ,
'surname' => 'required' ,
'full_name' => 'required' ,
'mother_name' => 'required' ,
'maternal_grandfather_name' => 'required' ,
'maternal_great_grandfather_name' => 'required' ,
'maternal_surname' => 'required' ,
'mother_full_name' => 'required' ,
'wife_name' => 'required' ,
'district_id' => 'required' ,
'area_id' => 'required' ,
'locality' => 'required' ,
'phone_number' => 'required' ,
'employee_id_number' => 'required' ,
'department_name' => 'required' ,
'blood_type' => 'required' ,
'email' => 'required' ,
'birth_date' => 'required' ,
'birth_place' => 'required' ,
'governorate_id' => 'required' ,
'marital_status' => 'required' ,
'religion' => 'required' ,
'gender' => 'required' ,
'children_count' => 'required' ,
'civil_status_identity_number' => 'required' ,
'registration_number' => 'required' ,
'record_number' => 'required' ,
'issue_date_civil_status' => 'required' ,
'issuing_authority_civil_status' => 'required' ,
'nationality_certificate_number' => 'required' ,
'wallet_number' => 'required' ,
'issue_date_nationality_certificate' => 'required' ,
'issuing_authority_nationality_certificate' => 'required' ,
'residence_card_number' => 'required' ,
'information_office' => 'required' ,
'organization_date' => 'required' ,
'ration_card_number' => 'required' ,
'ration_card_date' => 'required' ,
'national_card_number' => 'required' ,
'national_card_date' => 'required' ,
'education_service' => 'required' ,
'graduation_year_service' => 'required' ,
'graduation_institution_service' => 'required' ,
'specialization_service' => 'required' ,
'document_number' => 'required' ,
'document_date' => 'required' ,
'document_verification_number' => 'required' ,
'document_verification_date' => 'required' ,
'education_appointment' => 'required' ,
'graduation_year_appointment' => 'required' ,
'graduation_institution_appointment' => 'required' ,
'specialization_appointment' => 'required' ,
'service_type' => 'required' ,
'service_status' => 'required' ,
'contract_type' => 'required' ,
'service_case_type' => 'required' ,
'general_specialization' => 'required' ,
'precise_specialization' => 'required' ,
'degree' => 'required' ,
'position_title' => 'required' ,
'appointment_order_number' => 'required' ,
'appointment_date' => 'required' ,
'start_work_date' => 'required' ,
'promotion_order' => 'required' ,
'promotion_date' => 'required' ,
'entitlement_date' => 'required' ,
'increment_order' => 'required' ,
'increment_date' => 'required' ,
'referral_order_number' => 'required' ,
'referral_order_date' => 'required' ,
'termination_reason' => 'required' ,
'transfer_date' => 'required' ,
'resumption_date' => 'required' ,
'binding_authority' => 'required' ,
'department' => 'required' ,
'division' => 'required' ,
'unit' => 'required' ,
'secondment_authority' => 'required' ,
'notes' => 'required' ,
'position' => 'required' ,
'position_start_date' => 'required' ,
'issuing_authority' => 'required' ,
'assignment_order_number' => 'required' ,
'assignment_order_date' => 'required' ,
'assignment_type' => 'required' ,
'assignment_status' => 'required' ,
'second_position' => 'required' ,
'second_position_start_date' => 'required' ,
'second_issuing_authority' => 'required' ,
'second_assignment_order_number' => 'required' ,
'second_assignment_order_date' => 'required' ,
'second_assignment_type' => 'required' ,
'second_assignment_status' => 'required' ,
'end_date' => 'required' ,
'service_days' => 'required' ,
'service_months' => 'required' ,
'service_years' => 'required' ,
'total_retirement_days' => 'required' ,
'total_retirement_months' => 'required' ,
'total_retirement_years' => 'required' ,
'total_actual_days' => 'required' ,
'total_actual_months' => 'required' ,
'total_actual_years' => 'required' ,
'total_college_days' => 'required' ,
'total_college_months' => 'required' ,
'total_college_years' => 'required' ,
'mypassword' => 'required' ,

                 ], [
                'user_id.required' => 'حقل الاسم مطلوب',
                'calculator_number.required' => 'حقل الاسم مطلوب',
                'employee_number.required' => 'حقل الاسم مطلوب',
                'paper_folder_number.required' => 'حقل الاسم مطلوب',
                'first_name.required' => 'حقل الاسم مطلوب',
                'father_name.required' => 'حقل الاسم مطلوب',
                'grandfather_name.required' => 'حقل الاسم مطلوب',
                'great_grandfather_name.required' => 'حقل الاسم مطلوب',
                'surname.required' => 'حقل الاسم مطلوب',
                'full_name.required' => 'حقل الاسم مطلوب',
                'mother_name.required' => 'حقل الاسم مطلوب',
                'maternal_grandfather_name.required' => 'حقل الاسم مطلوب',
                'maternal_great_grandfather_name.required' => 'حقل الاسم مطلوب',
                'maternal_surname.required' => 'حقل الاسم مطلوب',
                'mother_full_name.required' => 'حقل الاسم مطلوب',
                'wife_name.required' => 'حقل الاسم مطلوب',
                'district_id.required' => 'حقل الاسم مطلوب',
                'area_id.required' => 'حقل الاسم مطلوب',
                'locality.required' => 'حقل الاسم مطلوب',
                'phone_number.required' => 'حقل الاسم مطلوب',
                'employee_id_number.required' => 'حقل الاسم مطلوب',
                'department_name.required' => 'حقل الاسم مطلوب',
                'blood_type.required' => 'حقل الاسم مطلوب',
                'email.required' => 'حقل الاسم مطلوب',
                'birth_date.required' => 'حقل الاسم مطلوب',
                'birth_place.required' => 'حقل الاسم مطلوب',
                'governorate_id.required' => 'حقل الاسم مطلوب',
                'marital_status.required' => 'حقل الاسم مطلوب',
                'religion.required' => 'حقل الاسم مطلوب',
                'gender.required' => 'حقل الاسم مطلوب',
                'children_count.required' => 'حقل الاسم مطلوب',
                'civil_status_identity_number.required' => 'حقل الاسم مطلوب',
                'registration_number.required' => 'حقل الاسم مطلوب',
                'record_number.required' => 'حقل الاسم مطلوب',
                'issue_date_civil_status.required' => 'حقل الاسم مطلوب',
                'issuing_authority_civil_status.required' => 'حقل الاسم مطلوب',
                'nationality_certificate_number.required' => 'حقل الاسم مطلوب',
                'wallet_number.required' => 'حقل الاسم مطلوب',
                'issue_date_nationality_certificate.required' => 'حقل الاسم مطلوب',
                'issuing_authority_nationality_certificate.required' => 'حقل الاسم مطلوب',
                'residence_card_number.required' => 'حقل الاسم مطلوب',
                'information_office.required' => 'حقل الاسم مطلوب',
                'organization_date.required' => 'حقل الاسم مطلوب',
                'ration_card_number.required' => 'حقل الاسم مطلوب',
                'ration_card_date.required' => 'حقل الاسم مطلوب',
                'national_card_number.required' => 'حقل الاسم مطلوب',
                'national_card_date.required' => 'حقل الاسم مطلوب',
                'education_service.required' => 'حقل الاسم مطلوب',
                'graduation_year_service.required' => 'حقل الاسم مطلوب',
                'graduation_institution_service.required' => 'حقل الاسم مطلوب',
                'specialization_service.required' => 'حقل الاسم مطلوب',
                'document_number.required' => 'حقل الاسم مطلوب',
                'document_date.required' => 'حقل الاسم مطلوب',
                'document_verification_number.required' => 'حقل الاسم مطلوب',
                'document_verification_date.required' => 'حقل الاسم مطلوب',
                'education_appointment.required' => 'حقل الاسم مطلوب',
                'graduation_year_appointment.required' => 'حقل الاسم مطلوب',
                'graduation_institution_appointment.required' => 'حقل الاسم مطلوب',
                'specialization_appointment.required' => 'حقل الاسم مطلوب',
                'service_type.required' => 'حقل الاسم مطلوب',
                'service_status.required' => 'حقل الاسم مطلوب',
                'contract_type.required' => 'حقل الاسم مطلوب',
                'service_case_type.required' => 'حقل الاسم مطلوب',
                'general_specialization.required' => 'حقل الاسم مطلوب',
                'precise_specialization.required' => 'حقل الاسم مطلوب',
                'degree.required' => 'حقل الاسم مطلوب',
                'position_title.required' => 'حقل الاسم مطلوب',
                'appointment_order_number.required' => 'حقل الاسم مطلوب',
                'appointment_date.required' => 'حقل الاسم مطلوب',
                'start_work_date.required' => 'حقل الاسم مطلوب',
                'promotion_order.required' => 'حقل الاسم مطلوب',
                'promotion_date.required' => 'حقل الاسم مطلوب',
                'entitlement_date.required' => 'حقل الاسم مطلوب',
                'increment_order.required' => 'حقل الاسم مطلوب',
                'increment_date.required' => 'حقل الاسم مطلوب',
                'referral_order_number.required' => 'حقل الاسم مطلوب',
                'referral_order_date.required' => 'حقل الاسم مطلوب',
                'termination_reason.required' => 'حقل الاسم مطلوب',
                'transfer_date.required' => 'حقل الاسم مطلوب',
                'resumption_date.required' => 'حقل الاسم مطلوب',
                'binding_authority.required' => 'حقل الاسم مطلوب',
                'department.required' => 'حقل الاسم مطلوب',
                'division.required' => 'حقل الاسم مطلوب',
                'unit.required' => 'حقل الاسم مطلوب',
                'secondment_authority.required' => 'حقل الاسم مطلوب',
                'notes.required' => 'حقل الاسم مطلوب',
                'position.required' => 'حقل الاسم مطلوب',
                'position_start_date.required' => 'حقل الاسم مطلوب',
                'issuing_authority.required' => 'حقل الاسم مطلوب',
                'assignment_order_number.required' => 'حقل الاسم مطلوب',
                'assignment_order_date.required' => 'حقل الاسم مطلوب',
                'assignment_type.required' => 'حقل الاسم مطلوب',
                'assignment_status.required' => 'حقل الاسم مطلوب',
                'second_position.required' => 'حقل الاسم مطلوب',
                'second_position_start_date.required' => 'حقل الاسم مطلوب',
                'second_issuing_authority.required' => 'حقل الاسم مطلوب',
                'second_assignment_order_number.required' => 'حقل الاسم مطلوب',
                'second_assignment_order_date.required' => 'حقل الاسم مطلوب',
                'second_assignment_type.required' => 'حقل الاسم مطلوب',
                'second_assignment_status.required' => 'حقل الاسم مطلوب',
                'end_date.required' => 'حقل الاسم مطلوب',
                'service_days.required' => 'حقل الاسم مطلوب',
                'service_months.required' => 'حقل الاسم مطلوب',
                'service_years.required' => 'حقل الاسم مطلوب',
                'total_retirement_days.required' => 'حقل الاسم مطلوب',
                'total_retirement_months.required' => 'حقل الاسم مطلوب',
                'total_retirement_years.required' => 'حقل الاسم مطلوب',
                'total_actual_days.required' => 'حقل الاسم مطلوب',
                'total_actual_months.required' => 'حقل الاسم مطلوب',
                'total_actual_years.required' => 'حقل الاسم مطلوب',
                'total_college_days.required' => 'حقل الاسم مطلوب',
                'total_college_months.required' => 'حقل الاسم مطلوب',
                'total_college_years.required' => 'حقل الاسم مطلوب',
                'mypassword.required' => 'حقل الاسم مطلوب',  ]);

        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);
        Workers::create([
'user_id'=> $this->user_id,
'calculator_number'=> $this->calculator_number,
'employee_number'=> $this->employee_number,
'paper_folder_number'=> $this->paper_folder_number,
'first_name'=> $this->first_name,
'father_name'=> $this->father_name,
'grandfather_name'=> $this->grandfather_name,
'great_grandfather_name'=> $this->great_grandfather_name,
'surname'=> $this->surname,
'full_name'=> $this->full_name,
'mother_name'=> $this->mother_name,
'maternal_grandfather_name'=> $this->maternal_grandfather_name,
'maternal_great_grandfather_name'=> $this->maternal_great_grandfather_name,
'maternal_surname'=> $this->maternal_surname,
'mother_full_name'=> $this->mother_full_name,
'wife_name'=> $this->wife_name,
'district_id'=> $this->district_id,
'area_id'=> $this->area_id,
'locality'=> $this->locality,
'phone_number'=> $this->phone_number,
'employee_id_number'=> $this->employee_id_number,
'department_name'=> $this->department_name,
'blood_type'=> $this->blood_type,
'email'=> $this->email,
'birth_date'=> $this->birth_date,
'birth_place'=> $this->birth_place,
'governorate_id'=> $this->governorate_id,
'marital_status'=> $this->marital_status,
'religion'=> $this->religion,
'gender'=> $this->gender,
'children_count'=> $this->children_count,
'civil_status_identity_number'=> $this->civil_status_identity_number,
'registration_number'=> $this->registration_number,
'record_number'=> $this->record_number,
'issue_date_civil_status'=> $this->issue_date_civil_status,
'issuing_authority_civil_status'=> $this->issuing_authority_civil_status,
'nationality_certificate_number'=> $this->nationality_certificate_number,
'wallet_number'=> $this->wallet_number,
'issue_date_nationality_certificate'=> $this->issue_date_nationality_certificate,
'issuing_authority_nationality_certificate'=> $this->issuing_authority_nationality_certificate,
'residence_card_number'=> $this->residence_card_number,
'information_office'=> $this->information_office,
'organization_date'=> $this->organization_date,
'ration_card_number'=> $this->ration_card_number,
'ration_card_date'=> $this->ration_card_date,
'national_card_number'=> $this->national_card_number,
'national_card_date'=> $this->national_card_date,
'education_service'=> $this->education_service,
'graduation_year_service'=> $this->graduation_year_service,
'graduation_institution_service'=> $this->graduation_institution_service,
'specialization_service'=> $this->specialization_service,
'document_number'=> $this->document_number,
'document_date'=> $this->document_date,
'document_verification_number'=> $this->document_verification_number,
'document_verification_date'=> $this->document_verification_date,
'education_appointment'=> $this->education_appointment,
'graduation_year_appointment'=> $this->graduation_year_appointment,
'graduation_institution_appointment'=> $this->graduation_institution_appointment,
'specialization_appointment'=> $this->specialization_appointment,
'service_type'=> $this->service_type,
'service_status'=> $this->service_status,
'contract_type'=> $this->contract_type,
'service_case_type'=> $this->service_case_type,
'general_specialization'=> $this->general_specialization,
'precise_specialization'=> $this->precise_specialization,
'degree'=> $this->degree,
'position_title'=> $this->position_title,
'appointment_order_number'=> $this->appointment_order_number,
'appointment_date'=> $this->appointment_date,
'start_work_date'=> $this->start_work_date,
'promotion_order'=> $this->promotion_order,
'promotion_date'=> $this->promotion_date,
'entitlement_date'=> $this->entitlement_date,
'increment_order'=> $this->increment_order,
'increment_date'=> $this->increment_date,
'referral_order_number'=> $this->referral_order_number,
'referral_order_date'=> $this->referral_order_date,
'termination_reason'=> $this->termination_reason,
'transfer_date'=> $this->transfer_date,
'resumption_date'=> $this->resumption_date,
'binding_authority'=> $this->binding_authority,
'department'=> $this->department,
'division'=> $this->division,
'unit'=> $this->unit,
'secondment_authority'=> $this->secondment_authority,
'notes'=> $this->notes,
'position'=> $this->position,
'position_start_date'=> $this->position_start_date,
'issuing_authority'=> $this->issuing_authority,
'assignment_order_number'=> $this->assignment_order_number,
'assignment_order_date'=> $this->assignment_order_date,
'assignment_type'=> $this->assignment_type,
'assignment_status'=> $this->assignment_status,
'second_position'=> $this->second_position,
'second_position_start_date'=> $this->second_position_start_date,
'second_issuing_authority'=> $this->second_issuing_authority,
'second_assignment_order_number'=> $this->second_assignment_order_number,
'second_assignment_order_date'=> $this->second_assignment_order_date,
'second_assignment_type'=> $this->second_assignment_type,
'second_assignment_status'=> $this->second_assignment_status,
'end_date'=> $this->end_date,
'service_days'=> $this->service_days,
'service_months'=> $this->service_months,
'service_years'=> $this->service_years,
'total_retirement_days'=> $this->total_retirement_days,
'total_retirement_months'=> $this->total_retirement_months,
'total_retirement_years'=> $this->total_retirement_years,
'total_actual_days'=> $this->total_actual_days,
'total_actual_months'=> $this->total_actual_months,
'total_actual_years'=> $this->total_actual_years,
'total_college_days'=> $this->total_college_days,
'total_college_months'=> $this->total_college_months,
'total_college_years'=> $this->total_college_years,
'mypassword'=> $this->mypassword,

]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
        'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

 public function GetWorker($WorkerId)
    {
        $this->resetValidation();

        $this-> Worker  = Workers::find($WorkerId);
        $this-> WorkerId = $this->Worker->id;
             $this->user_id= $this->Worker->user_id;
      $this->calculator_number= $this->Worker->calculator_number;
      $this->employee_number= $this->Worker->employee_number;
      $this->paper_folder_number= $this->Worker->paper_folder_number;
      $this->first_name= $this->Worker->first_name;
      $this->father_name= $this->Worker->father_name;
      $this->grandfather_name= $this->Worker->grandfather_name;
      $this->great_grandfather_name= $this->Worker->great_grandfather_name;
      $this->surname= $this->Worker->surname;
      $this->full_name= $this->Worker->full_name;
      $this->mother_name= $this->Worker->mother_name;
      $this->maternal_grandfather_name= $this->Worker->maternal_grandfather_name;
      $this->maternal_great_grandfather_name= $this->Worker->maternal_great_grandfather_name;
      $this->maternal_surname= $this->Worker->maternal_surname;
      $this->mother_full_name= $this->Worker->mother_full_name;
      $this->wife_name= $this->Worker->wife_name;
      $this->district_id= $this->Worker->district_id;
      $this->area_id= $this->Worker->area_id;
      $this->locality= $this->Worker->locality;
      $this->phone_number= $this->Worker->phone_number;
      $this->employee_id_number= $this->Worker->employee_id_number;
      $this->department_name= $this->Worker->department_name;
      $this->blood_type= $this->Worker->blood_type;
      $this->email= $this->Worker->email;
      $this->birth_date= $this->Worker->birth_date;
      $this->birth_place= $this->Worker->birth_place;
      $this->governorate_id= $this->Worker->governorate_id;
      $this->marital_status= $this->Worker->marital_status;
      $this->religion= $this->Worker->religion;
      $this->gender= $this->Worker->gender;
      $this->children_count= $this->Worker->children_count;
      $this->civil_status_identity_number= $this->Worker->civil_status_identity_number;
      $this->registration_number= $this->Worker->registration_number;
      $this->record_number= $this->Worker->record_number;
      $this->issue_date_civil_status= $this->Worker->issue_date_civil_status;
      $this->issuing_authority_civil_status= $this->Worker->issuing_authority_civil_status;
      $this->nationality_certificate_number= $this->Worker->nationality_certificate_number;
      $this->wallet_number= $this->Worker->wallet_number;
      $this->issue_date_nationality_certificate= $this->Worker->issue_date_nationality_certificate;
      $this->issuing_authority_nationality_certificate= $this->Worker->issuing_authority_nationality_certificate;
      $this->residence_card_number= $this->Worker->residence_card_number;
      $this->information_office= $this->Worker->information_office;
      $this->organization_date= $this->Worker->organization_date;
      $this->ration_card_number= $this->Worker->ration_card_number;
      $this->ration_card_date= $this->Worker->ration_card_date;
      $this->national_card_number= $this->Worker->national_card_number;
      $this->national_card_date= $this->Worker->national_card_date;
      $this->education_service= $this->Worker->education_service;
      $this->graduation_year_service= $this->Worker->graduation_year_service;
      $this->graduation_institution_service= $this->Worker->graduation_institution_service;
      $this->specialization_service= $this->Worker->specialization_service;
      $this->document_number= $this->Worker->document_number;
      $this->document_date= $this->Worker->document_date;
      $this->document_verification_number= $this->Worker->document_verification_number;
      $this->document_verification_date= $this->Worker->document_verification_date;
      $this->education_appointment= $this->Worker->education_appointment;
      $this->graduation_year_appointment= $this->Worker->graduation_year_appointment;
      $this->graduation_institution_appointment= $this->Worker->graduation_institution_appointment;
      $this->specialization_appointment= $this->Worker->specialization_appointment;
      $this->service_type= $this->Worker->service_type;
      $this->service_status= $this->Worker->service_status;
      $this->contract_type= $this->Worker->contract_type;
      $this->service_case_type= $this->Worker->service_case_type;
      $this->general_specialization= $this->Worker->general_specialization;
      $this->precise_specialization= $this->Worker->precise_specialization;
      $this->degree= $this->Worker->degree;
      $this->position_title= $this->Worker->position_title;
      $this->appointment_order_number= $this->Worker->appointment_order_number;
      $this->appointment_date= $this->Worker->appointment_date;
      $this->start_work_date= $this->Worker->start_work_date;
      $this->promotion_order= $this->Worker->promotion_order;
      $this->promotion_date= $this->Worker->promotion_date;
      $this->entitlement_date= $this->Worker->entitlement_date;
      $this->increment_order= $this->Worker->increment_order;
      $this->increment_date= $this->Worker->increment_date;
      $this->referral_order_number= $this->Worker->referral_order_number;
      $this->referral_order_date= $this->Worker->referral_order_date;
      $this->termination_reason= $this->Worker->termination_reason;
      $this->transfer_date= $this->Worker->transfer_date;
      $this->resumption_date= $this->Worker->resumption_date;
      $this->binding_authority= $this->Worker->binding_authority;
      $this->department= $this->Worker->department;
      $this->division= $this->Worker->division;
      $this->unit= $this->Worker->unit;
      $this->secondment_authority= $this->Worker->secondment_authority;
      $this->notes= $this->Worker->notes;
      $this->position= $this->Worker->position;
      $this->position_start_date= $this->Worker->position_start_date;
      $this->issuing_authority= $this->Worker->issuing_authority;
      $this->assignment_order_number= $this->Worker->assignment_order_number;
      $this->assignment_order_date= $this->Worker->assignment_order_date;
      $this->assignment_type= $this->Worker->assignment_type;
      $this->assignment_status= $this->Worker->assignment_status;
      $this->second_position= $this->Worker->second_position;
      $this->second_position_start_date= $this->Worker->second_position_start_date;
      $this->second_issuing_authority= $this->Worker->second_issuing_authority;
      $this->second_assignment_order_number= $this->Worker->second_assignment_order_number;
      $this->second_assignment_order_date= $this->Worker->second_assignment_order_date;
      $this->second_assignment_type= $this->Worker->second_assignment_type;
      $this->second_assignment_status= $this->Worker->second_assignment_status;
      $this->end_date= $this->Worker->end_date;
      $this->service_days= $this->Worker->service_days;
      $this->service_months= $this->Worker->service_months;
      $this->service_years= $this->Worker->service_years;
      $this->total_retirement_days= $this->Worker->total_retirement_days;
      $this->total_retirement_months= $this->Worker->total_retirement_months;
      $this->total_retirement_years= $this->Worker->total_retirement_years;
      $this->total_actual_days= $this->Worker->total_actual_days;
      $this->total_actual_months= $this->Worker->total_actual_months;
      $this->total_actual_years= $this->Worker->total_actual_years;
      $this->total_college_days= $this->Worker->total_college_days;
      $this->total_college_months= $this->Worker->total_college_months;
      $this->total_college_years= $this->Worker->total_college_years;
      $this->mypassword= $this->Worker->mypassword;

    }

 public function update()
    {
        $this->resetValidation();
         $this->validate(['user_id' => 'required:workers' ,
'calculator_number' => 'required:workers' ,
'employee_number' => 'required:workers' ,
'paper_folder_number' => 'required:workers' ,
'first_name' => 'required:workers' ,
'father_name' => 'required:workers' ,
'grandfather_name' => 'required:workers' ,
'great_grandfather_name' => 'required:workers' ,
'surname' => 'required:workers' ,
'full_name' => 'required:workers' ,
'mother_name' => 'required:workers' ,
'maternal_grandfather_name' => 'required:workers' ,
'maternal_great_grandfather_name' => 'required:workers' ,
'maternal_surname' => 'required:workers' ,
'mother_full_name' => 'required:workers' ,
'wife_name' => 'required:workers' ,
'district_id' => 'required:workers' ,
'area_id' => 'required:workers' ,
'locality' => 'required:workers' ,
'phone_number' => 'required:workers' ,
'employee_id_number' => 'required:workers' ,
'department_name' => 'required:workers' ,
'blood_type' => 'required:workers' ,
'email' => 'required:workers' ,
'birth_date' => 'required:workers' ,
'birth_place' => 'required:workers' ,
'governorate_id' => 'required:workers' ,
'marital_status' => 'required:workers' ,
'religion' => 'required:workers' ,
'gender' => 'required:workers' ,
'children_count' => 'required:workers' ,
'civil_status_identity_number' => 'required:workers' ,
'registration_number' => 'required:workers' ,
'record_number' => 'required:workers' ,
'issue_date_civil_status' => 'required:workers' ,
'issuing_authority_civil_status' => 'required:workers' ,
'nationality_certificate_number' => 'required:workers' ,
'wallet_number' => 'required:workers' ,
'issue_date_nationality_certificate' => 'required:workers' ,
'issuing_authority_nationality_certificate' => 'required:workers' ,
'residence_card_number' => 'required:workers' ,
'information_office' => 'required:workers' ,
'organization_date' => 'required:workers' ,
'ration_card_number' => 'required:workers' ,
'ration_card_date' => 'required:workers' ,
'national_card_number' => 'required:workers' ,
'national_card_date' => 'required:workers' ,
'education_service' => 'required:workers' ,
'graduation_year_service' => 'required:workers' ,
'graduation_institution_service' => 'required:workers' ,
'specialization_service' => 'required:workers' ,
'document_number' => 'required:workers' ,
'document_date' => 'required:workers' ,
'document_verification_number' => 'required:workers' ,
'document_verification_date' => 'required:workers' ,
'education_appointment' => 'required:workers' ,
'graduation_year_appointment' => 'required:workers' ,
'graduation_institution_appointment' => 'required:workers' ,
'specialization_appointment' => 'required:workers' ,
'service_type' => 'required:workers' ,
'service_status' => 'required:workers' ,
'contract_type' => 'required:workers' ,
'service_case_type' => 'required:workers' ,
'general_specialization' => 'required:workers' ,
'precise_specialization' => 'required:workers' ,
'degree' => 'required:workers' ,
'position_title' => 'required:workers' ,
'appointment_order_number' => 'required:workers' ,
'appointment_date' => 'required:workers' ,
'start_work_date' => 'required:workers' ,
'promotion_order' => 'required:workers' ,
'promotion_date' => 'required:workers' ,
'entitlement_date' => 'required:workers' ,
'increment_order' => 'required:workers' ,
'increment_date' => 'required:workers' ,
'referral_order_number' => 'required:workers' ,
'referral_order_date' => 'required:workers' ,
'termination_reason' => 'required:workers' ,
'transfer_date' => 'required:workers' ,
'resumption_date' => 'required:workers' ,
'binding_authority' => 'required:workers' ,
'department' => 'required:workers' ,
'division' => 'required:workers' ,
'unit' => 'required:workers' ,
'secondment_authority' => 'required:workers' ,
'notes' => 'required:workers' ,
'position' => 'required:workers' ,
'position_start_date' => 'required:workers' ,
'issuing_authority' => 'required:workers' ,
'assignment_order_number' => 'required:workers' ,
'assignment_order_date' => 'required:workers' ,
'assignment_type' => 'required:workers' ,
'assignment_status' => 'required:workers' ,
'second_position' => 'required:workers' ,
'second_position_start_date' => 'required:workers' ,
'second_issuing_authority' => 'required:workers' ,
'second_assignment_order_number' => 'required:workers' ,
'second_assignment_order_date' => 'required:workers' ,
'second_assignment_type' => 'required:workers' ,
'second_assignment_status' => 'required:workers' ,
'end_date' => 'required:workers' ,
'service_days' => 'required:workers' ,
'service_months' => 'required:workers' ,
'service_years' => 'required:workers' ,
'total_retirement_days' => 'required:workers' ,
'total_retirement_months' => 'required:workers' ,
'total_retirement_years' => 'required:workers' ,
'total_actual_days' => 'required:workers' ,
'total_actual_months' => 'required:workers' ,
'total_actual_years' => 'required:workers' ,
'total_college_days' => 'required:workers' ,
'total_college_months' => 'required:workers' ,
'total_college_years' => 'required:workers' ,
'mypassword' => 'required:workers' ,

                 ], [
                'user_id.required' => 'حقل الاسم مطلوب',
                'calculator_number.required' => 'حقل الاسم مطلوب',
                'employee_number.required' => 'حقل الاسم مطلوب',
                'paper_folder_number.required' => 'حقل الاسم مطلوب',
                'first_name.required' => 'حقل الاسم مطلوب',
                'father_name.required' => 'حقل الاسم مطلوب',
                'grandfather_name.required' => 'حقل الاسم مطلوب',
                'great_grandfather_name.required' => 'حقل الاسم مطلوب',
                'surname.required' => 'حقل الاسم مطلوب',
                'full_name.required' => 'حقل الاسم مطلوب',
                'mother_name.required' => 'حقل الاسم مطلوب',
                'maternal_grandfather_name.required' => 'حقل الاسم مطلوب',
                'maternal_great_grandfather_name.required' => 'حقل الاسم مطلوب',
                'maternal_surname.required' => 'حقل الاسم مطلوب',
                'mother_full_name.required' => 'حقل الاسم مطلوب',
                'wife_name.required' => 'حقل الاسم مطلوب',
                'district_id.required' => 'حقل الاسم مطلوب',
                'area_id.required' => 'حقل الاسم مطلوب',
                'locality.required' => 'حقل الاسم مطلوب',
                'phone_number.required' => 'حقل الاسم مطلوب',
                'employee_id_number.required' => 'حقل الاسم مطلوب',
                'department_name.required' => 'حقل الاسم مطلوب',
                'blood_type.required' => 'حقل الاسم مطلوب',
                'email.required' => 'حقل الاسم مطلوب',
                'birth_date.required' => 'حقل الاسم مطلوب',
                'birth_place.required' => 'حقل الاسم مطلوب',
                'governorate_id.required' => 'حقل الاسم مطلوب',
                'marital_status.required' => 'حقل الاسم مطلوب',
                'religion.required' => 'حقل الاسم مطلوب',
                'gender.required' => 'حقل الاسم مطلوب',
                'children_count.required' => 'حقل الاسم مطلوب',
                'civil_status_identity_number.required' => 'حقل الاسم مطلوب',
                'registration_number.required' => 'حقل الاسم مطلوب',
                'record_number.required' => 'حقل الاسم مطلوب',
                'issue_date_civil_status.required' => 'حقل الاسم مطلوب',
                'issuing_authority_civil_status.required' => 'حقل الاسم مطلوب',
                'nationality_certificate_number.required' => 'حقل الاسم مطلوب',
                'wallet_number.required' => 'حقل الاسم مطلوب',
                'issue_date_nationality_certificate.required' => 'حقل الاسم مطلوب',
                'issuing_authority_nationality_certificate.required' => 'حقل الاسم مطلوب',
                'residence_card_number.required' => 'حقل الاسم مطلوب',
                'information_office.required' => 'حقل الاسم مطلوب',
                'organization_date.required' => 'حقل الاسم مطلوب',
                'ration_card_number.required' => 'حقل الاسم مطلوب',
                'ration_card_date.required' => 'حقل الاسم مطلوب',
                'national_card_number.required' => 'حقل الاسم مطلوب',
                'national_card_date.required' => 'حقل الاسم مطلوب',
                'education_service.required' => 'حقل الاسم مطلوب',
                'graduation_year_service.required' => 'حقل الاسم مطلوب',
                'graduation_institution_service.required' => 'حقل الاسم مطلوب',
                'specialization_service.required' => 'حقل الاسم مطلوب',
                'document_number.required' => 'حقل الاسم مطلوب',
                'document_date.required' => 'حقل الاسم مطلوب',
                'document_verification_number.required' => 'حقل الاسم مطلوب',
                'document_verification_date.required' => 'حقل الاسم مطلوب',
                'education_appointment.required' => 'حقل الاسم مطلوب',
                'graduation_year_appointment.required' => 'حقل الاسم مطلوب',
                'graduation_institution_appointment.required' => 'حقل الاسم مطلوب',
                'specialization_appointment.required' => 'حقل الاسم مطلوب',
                'service_type.required' => 'حقل الاسم مطلوب',
                'service_status.required' => 'حقل الاسم مطلوب',
                'contract_type.required' => 'حقل الاسم مطلوب',
                'service_case_type.required' => 'حقل الاسم مطلوب',
                'general_specialization.required' => 'حقل الاسم مطلوب',
                'precise_specialization.required' => 'حقل الاسم مطلوب',
                'degree.required' => 'حقل الاسم مطلوب',
                'position_title.required' => 'حقل الاسم مطلوب',
                'appointment_order_number.required' => 'حقل الاسم مطلوب',
                'appointment_date.required' => 'حقل الاسم مطلوب',
                'start_work_date.required' => 'حقل الاسم مطلوب',
                'promotion_order.required' => 'حقل الاسم مطلوب',
                'promotion_date.required' => 'حقل الاسم مطلوب',
                'entitlement_date.required' => 'حقل الاسم مطلوب',
                'increment_order.required' => 'حقل الاسم مطلوب',
                'increment_date.required' => 'حقل الاسم مطلوب',
                'referral_order_number.required' => 'حقل الاسم مطلوب',
                'referral_order_date.required' => 'حقل الاسم مطلوب',
                'termination_reason.required' => 'حقل الاسم مطلوب',
                'transfer_date.required' => 'حقل الاسم مطلوب',
                'resumption_date.required' => 'حقل الاسم مطلوب',
                'binding_authority.required' => 'حقل الاسم مطلوب',
                'department.required' => 'حقل الاسم مطلوب',
                'division.required' => 'حقل الاسم مطلوب',
                'unit.required' => 'حقل الاسم مطلوب',
                'secondment_authority.required' => 'حقل الاسم مطلوب',
                'notes.required' => 'حقل الاسم مطلوب',
                'position.required' => 'حقل الاسم مطلوب',
                'position_start_date.required' => 'حقل الاسم مطلوب',
                'issuing_authority.required' => 'حقل الاسم مطلوب',
                'assignment_order_number.required' => 'حقل الاسم مطلوب',
                'assignment_order_date.required' => 'حقل الاسم مطلوب',
                'assignment_type.required' => 'حقل الاسم مطلوب',
                'assignment_status.required' => 'حقل الاسم مطلوب',
                'second_position.required' => 'حقل الاسم مطلوب',
                'second_position_start_date.required' => 'حقل الاسم مطلوب',
                'second_issuing_authority.required' => 'حقل الاسم مطلوب',
                'second_assignment_order_number.required' => 'حقل الاسم مطلوب',
                'second_assignment_order_date.required' => 'حقل الاسم مطلوب',
                'second_assignment_type.required' => 'حقل الاسم مطلوب',
                'second_assignment_status.required' => 'حقل الاسم مطلوب',
                'end_date.required' => 'حقل الاسم مطلوب',
                'service_days.required' => 'حقل الاسم مطلوب',
                'service_months.required' => 'حقل الاسم مطلوب',
                'service_years.required' => 'حقل الاسم مطلوب',
                'total_retirement_days.required' => 'حقل الاسم مطلوب',
                'total_retirement_months.required' => 'حقل الاسم مطلوب',
                'total_retirement_years.required' => 'حقل الاسم مطلوب',
                'total_actual_days.required' => 'حقل الاسم مطلوب',
                'total_actual_months.required' => 'حقل الاسم مطلوب',
                'total_actual_years.required' => 'حقل الاسم مطلوب',
                'total_college_days.required' => 'حقل الاسم مطلوب',
                'total_college_months.required' => 'حقل الاسم مطلوب',
                'total_college_years.required' => 'حقل الاسم مطلوب',
                'mypassword.required' => 'حقل الاسم مطلوب', ]);

             $Workers = Workers::find($this->WorkerId);
             $Workers->update([
'user_id'=> $this->user_id,
'calculator_number'=> $this->calculator_number,
'employee_number'=> $this->employee_number,
'paper_folder_number'=> $this->paper_folder_number,
'first_name'=> $this->first_name,
'father_name'=> $this->father_name,
'grandfather_name'=> $this->grandfather_name,
'great_grandfather_name'=> $this->great_grandfather_name,
'surname'=> $this->surname,
'full_name'=> $this->full_name,
'mother_name'=> $this->mother_name,
'maternal_grandfather_name'=> $this->maternal_grandfather_name,
'maternal_great_grandfather_name'=> $this->maternal_great_grandfather_name,
'maternal_surname'=> $this->maternal_surname,
'mother_full_name'=> $this->mother_full_name,
'wife_name'=> $this->wife_name,
'district_id'=> $this->district_id,
'area_id'=> $this->area_id,
'locality'=> $this->locality,
'phone_number'=> $this->phone_number,
'employee_id_number'=> $this->employee_id_number,
'department_name'=> $this->department_name,
'blood_type'=> $this->blood_type,
'email'=> $this->email,
'birth_date'=> $this->birth_date,
'birth_place'=> $this->birth_place,
'governorate_id'=> $this->governorate_id,
'marital_status'=> $this->marital_status,
'religion'=> $this->religion,
'gender'=> $this->gender,
'children_count'=> $this->children_count,
'civil_status_identity_number'=> $this->civil_status_identity_number,
'registration_number'=> $this->registration_number,
'record_number'=> $this->record_number,
'issue_date_civil_status'=> $this->issue_date_civil_status,
'issuing_authority_civil_status'=> $this->issuing_authority_civil_status,
'nationality_certificate_number'=> $this->nationality_certificate_number,
'wallet_number'=> $this->wallet_number,
'issue_date_nationality_certificate'=> $this->issue_date_nationality_certificate,
'issuing_authority_nationality_certificate'=> $this->issuing_authority_nationality_certificate,
'residence_card_number'=> $this->residence_card_number,
'information_office'=> $this->information_office,
'organization_date'=> $this->organization_date,
'ration_card_number'=> $this->ration_card_number,
'ration_card_date'=> $this->ration_card_date,
'national_card_number'=> $this->national_card_number,
'national_card_date'=> $this->national_card_date,
'education_service'=> $this->education_service,
'graduation_year_service'=> $this->graduation_year_service,
'graduation_institution_service'=> $this->graduation_institution_service,
'specialization_service'=> $this->specialization_service,
'document_number'=> $this->document_number,
'document_date'=> $this->document_date,
'document_verification_number'=> $this->document_verification_number,
'document_verification_date'=> $this->document_verification_date,
'education_appointment'=> $this->education_appointment,
'graduation_year_appointment'=> $this->graduation_year_appointment,
'graduation_institution_appointment'=> $this->graduation_institution_appointment,
'specialization_appointment'=> $this->specialization_appointment,
'service_type'=> $this->service_type,
'service_status'=> $this->service_status,
'contract_type'=> $this->contract_type,
'service_case_type'=> $this->service_case_type,
'general_specialization'=> $this->general_specialization,
'precise_specialization'=> $this->precise_specialization,
'degree'=> $this->degree,
'position_title'=> $this->position_title,
'appointment_order_number'=> $this->appointment_order_number,
'appointment_date'=> $this->appointment_date,
'start_work_date'=> $this->start_work_date,
'promotion_order'=> $this->promotion_order,
'promotion_date'=> $this->promotion_date,
'entitlement_date'=> $this->entitlement_date,
'increment_order'=> $this->increment_order,
'increment_date'=> $this->increment_date,
'referral_order_number'=> $this->referral_order_number,
'referral_order_date'=> $this->referral_order_date,
'termination_reason'=> $this->termination_reason,
'transfer_date'=> $this->transfer_date,
'resumption_date'=> $this->resumption_date,
'binding_authority'=> $this->binding_authority,
'department'=> $this->department,
'division'=> $this->division,
'unit'=> $this->unit,
'secondment_authority'=> $this->secondment_authority,
'notes'=> $this->notes,
'position'=> $this->position,
'position_start_date'=> $this->position_start_date,
'issuing_authority'=> $this->issuing_authority,
'assignment_order_number'=> $this->assignment_order_number,
'assignment_order_date'=> $this->assignment_order_date,
'assignment_type'=> $this->assignment_type,
'assignment_status'=> $this->assignment_status,
'second_position'=> $this->second_position,
'second_position_start_date'=> $this->second_position_start_date,
'second_issuing_authority'=> $this->second_issuing_authority,
'second_assignment_order_number'=> $this->second_assignment_order_number,
'second_assignment_order_date'=> $this->second_assignment_order_date,
'second_assignment_type'=> $this->second_assignment_type,
'second_assignment_status'=> $this->second_assignment_status,
'end_date'=> $this->end_date,
'service_days'=> $this->service_days,
'service_months'=> $this->service_months,
'service_years'=> $this->service_years,
'total_retirement_days'=> $this->total_retirement_days,
'total_retirement_months'=> $this->total_retirement_months,
'total_retirement_years'=> $this->total_retirement_years,
'total_actual_days'=> $this->total_actual_days,
'total_actual_months'=> $this->total_actual_months,
'total_actual_years'=> $this->total_actual_years,
'total_college_days'=> $this->total_college_days,
'total_college_months'=> $this->total_college_months,
'total_college_years'=> $this->total_college_years,
'mypassword'=> $this->mypassword,

]);
        $this->reset();
         $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
     }

  public function destroy()
    {
      $Workers = Workers::find($this->WorkerId);
        $Workers->delete();
         $this->reset();
       $this->dispatchBrowserEvent('success', [
      'message' => 'تم حذف البيانات  بنجاح',
      'title' => 'الحذف '
    ]);
    }



 }

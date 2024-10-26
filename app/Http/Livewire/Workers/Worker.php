<?php

namespace App\Http\Livewire\Workers;

use Google;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Workers\Workers;
use Google\Client as Google_Client;
use Illuminate\Support\Facades\Http;
use Google\Client;

use \Firebase\JWT\JWT;

class Worker extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Workers = [];
    public $WorkerSearch, $Worker, $WorkerId;
    public $calculator_number, $employee_number, $paper_folder_number, $first_name, $father_name, $grandfather_name, $great_grandfather_name, $surname, $full_name, $mother_name, $maternal_grandfather_name, $maternal_great_grandfather_name, $maternal_surname, $mother_full_name, $wife_name, $district_id, $area_id, $locality, $phone_number, $employee_id_number, $department_name, $blood_type, $email, $birth_date, $birth_place, $governorate_id, $marital_status, $religion, $gender, $children_count, $civil_status_identity_number, $registration_number, $record_number, $issue_date_civil_status, $issuing_authority_civil_status, $nationality_certificate_number, $wallet_number, $issue_date_nationality_certificate, $issuing_authority_nationality_certificate, $residence_card_number, $information_office, $organization_date, $ration_card_number, $ration_card_date, $national_card_number, $national_card_date;

    public function render()
    {
        $WorkerSearch = '%' . $this->WorkerSearch . '%';
        $Workers = Workers::where('calculator_number', 'LIKE', $WorkerSearch)
            ->orWhere('employee_number', 'LIKE', $WorkerSearch)
            ->orWhere('full_name', 'LIKE', $WorkerSearch)
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

        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetWorker($WorkerId)
    {
        $this->resetValidation();

        $this->Worker  = Workers::find($WorkerId);
        $this->WorkerId = $this->Worker->id;
        $this->calculator_number = $this->Worker->calculator_number;
        $this->employee_number = $this->Worker->employee_number;
        $this->paper_folder_number = $this->Worker->paper_folder_number;
        $this->first_name = $this->Worker->first_name;
        $this->father_name = $this->Worker->father_name;
        $this->grandfather_name = $this->Worker->grandfather_name;
        $this->great_grandfather_name = $this->Worker->great_grandfather_name;
        $this->surname = $this->Worker->surname;
        $this->full_name = $this->Worker->full_name;
        $this->mother_name = $this->Worker->mother_name;
        $this->maternal_grandfather_name = $this->Worker->maternal_grandfather_name;
        $this->maternal_great_grandfather_name = $this->Worker->maternal_great_grandfather_name;
        $this->maternal_surname = $this->Worker->maternal_surname;
        $this->mother_full_name = $this->Worker->mother_full_name;
        $this->wife_name = $this->Worker->wife_name;
        $this->district_id = $this->Worker->district_id;
        $this->area_id = $this->Worker->area_id;
        $this->locality = $this->Worker->locality;
        $this->phone_number = $this->Worker->phone_number;
        $this->employee_id_number = $this->Worker->employee_id_number;
        $this->department_name = $this->Worker->department_name;
        $this->blood_type = $this->Worker->blood_type;
        $this->email = $this->Worker->email;
        $this->birth_date = $this->Worker->birth_date;
        $this->birth_place = $this->Worker->birth_place;
        $this->governorate_id = $this->Worker->governorate_id;
        $this->marital_status = $this->Worker->marital_status;
        $this->religion = $this->Worker->religion;
        $this->gender = $this->Worker->gender;
        $this->children_count = $this->Worker->children_count;
        $this->civil_status_identity_number = $this->Worker->civil_status_identity_number;
        $this->registration_number = $this->Worker->registration_number;
        $this->record_number = $this->Worker->record_number;
        $this->issue_date_civil_status = $this->Worker->issue_date_civil_status;
        $this->issuing_authority_civil_status = $this->Worker->issuing_authority_civil_status;
        $this->nationality_certificate_number = $this->Worker->nationality_certificate_number;
        $this->wallet_number = $this->Worker->wallet_number;
        $this->issue_date_nationality_certificate = $this->Worker->issue_date_nationality_certificate;
        $this->issuing_authority_nationality_certificate = $this->Worker->issuing_authority_nationality_certificate;
        $this->residence_card_number = $this->Worker->residence_card_number;
        $this->information_office = $this->Worker->information_office;
        $this->organization_date = $this->Worker->organization_date;
        $this->ration_card_number = $this->Worker->ration_card_number;
        $this->ration_card_date = $this->Worker->ration_card_date;
        $this->national_card_number = $this->Worker->national_card_number;
        $this->national_card_date = $this->Worker->national_card_date;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'calculator_number' => 'required:workers',
            'employee_number' => 'required:workers',
            'paper_folder_number' => 'required:workers',
            'first_name' => 'required:workers',
            'father_name' => 'required:workers',
            'grandfather_name' => 'required:workers',
            'great_grandfather_name' => 'required:workers',
            'surname' => 'required:workers',
            'full_name' => 'required:workers',
            'mother_name' => 'required:workers',
            'maternal_grandfather_name' => 'required:workers',
            'maternal_great_grandfather_name' => 'required:workers',
            'maternal_surname' => 'required:workers',
            'mother_full_name' => 'required:workers',
            'wife_name' => 'required:workers',
            'district_id' => 'required:workers',
            'area_id' => 'required:workers',
            'locality' => 'required:workers',
            'phone_number' => 'required:workers',
            'employee_id_number' => 'required:workers',
            'department_name' => 'required:workers',
            'blood_type' => 'required:workers',
            'email' => 'required:workers',
            'birth_date' => 'required:workers',
            'birth_place' => 'required:workers',
            'governorate_id' => 'required:workers',
            'marital_status' => 'required:workers',
            'religion' => 'required:workers',
            'gender' => 'required:workers',
            'children_count' => 'required:workers',
            'civil_status_identity_number' => 'required:workers',
            'registration_number' => 'required:workers',
            'record_number' => 'required:workers',
            'issue_date_civil_status' => 'required:workers',
            'issuing_authority_civil_status' => 'required:workers',
            'nationality_certificate_number' => 'required:workers',
            'wallet_number' => 'required:workers',
            'issue_date_nationality_certificate' => 'required:workers',
            'issuing_authority_nationality_certificate' => 'required:workers',
            'residence_card_number' => 'required:workers',
            'information_office' => 'required:workers',
            'organization_date' => 'required:workers',
            'ration_card_number' => 'required:workers',
            'ration_card_date' => 'required:workers',
            'national_card_number' => 'required:workers',
            'national_card_date' => 'required:workers',

        ], [
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
        ]);

        $Workers = Workers::find($this->WorkerId);
        $Workers->update([
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

        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Workers = Workers::find($this->WorkerId);

        if ($Workers) {

            $Workers->delete();

            $this->reset();
            $this->dispatchBrowserEvent('success', [
                'message' => 'تم حذف البيانات بنجاح',
                'title' => 'الحذف'
            ]);
        }
    }









    // ========================================تحديث توكن السيرفر وارسال التنبيه ============================================
    // private function getAccessToken($serviceAccountPath)
    // {
    //     $serviceAccount = json_decode(file_get_contents($serviceAccountPath), true);

    //     if (!$serviceAccount || !isset($serviceAccount['client_email']) || !isset($serviceAccount['private_key'])) {
    //         throw new \Exception('Invalid service account configuration');
    //     }

    //     $now_seconds = time();
    //     $payload = array(
    //         "iss" => $serviceAccount['client_email'],
    //         "scope" => "https://www.googleapis.com/auth/firebase.messaging",
    //         "aud" => "https://oauth2.googleapis.com/token",
    //         "exp" => $now_seconds + 3600,
    //         "iat" => $now_seconds
    //     );

    //     $private_key = $serviceAccount['private_key'];
    //     $token = JWT::encode($payload, $private_key, "RS256");

    //     $postFields = 'grant_type=urn:ietf:params:oauth:grant-type:jwt-bearer&assertion=' . $token;
    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, 'https://oauth2.googleapis.com/token');
    //     curl_setopt($ch, CURLOPT_POST, true);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);

    //     // تعطيل التحقق من SSL (غير موصى به للإنتاج)
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    //     $result = curl_exec($ch);

    //     // التحقق من وجود أخطاء في CURL
    //     if (curl_errno($ch)) {
    //         throw new \Exception('CURL Error: ' . curl_error($ch));
    //     }

    //     $response = json_decode($result, true);

    //     // التحقق من استجابة توكن الوصول
    //     if (!isset($response['access_token'])) {
    //         // تسجيل الاستجابة كاملة لتسهيل استكشاف الأخطاء
    //         throw new \Exception('Failed to retrieve access token: ' . json_encode($response));
    //     }

    //     return $response['access_token'];
    // }
    // public function sendNotificationToApp($title, $body, $userToken, $imageUrl = null)
    // {
    //     // الحصول على توكن الوصول
    //     $accessToken = $this->getAccessToken(public_path('FCM.json'));

    //     // تحضير البيانات للإرسال
    //     $notificationData = [
    //         'title' => $title,
    //         'body' => $body,
    //     ];

    //     // إذا كان هناك صورة، أضفها إلى بيانات الإشعار
    //     if ($imageUrl) {
    //         $notificationData['image'] = $imageUrl;
    //     }

    //     $data = [
    //         'message' => [
    //             'token' => $userToken,
    //             'notification' => $notificationData,
    //         ],
    //     ];

    //     // إرسال الطلب إلى FCM
    //     $client = new \GuzzleHttp\Client();
    //     try {
    //         $response = $client->post('https://fcm.googleapis.com/v1/projects/gcpi-e6c2b/messages:send', [
    //             'headers' => [
    //                 'Authorization' => 'Bearer ' . $accessToken,
    //                 'Content-Type' => 'application/json'
    //             ],
    //             'json' => $data
    //         ]);
    //     } catch (\GuzzleHttp\Exception\RequestException $e) {
    //         throw new \Exception('Guzzle Error: ' . $e->getMessage());
    //     }

    //     // إعادة الاستجابة
    //     return $response;
    // }



    // ========================================تحديث توكن السيرفر وارسال التنبيه ============================================


}

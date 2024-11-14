<?php

namespace App\Http\Livewire\Certific;
//use Log;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Workers\Workers;
use App\Models\Certific\Certific;
use App\Models\Precises\Precises;
use Illuminate\Support\Facades\Auth;
use App\Models\Specialtys\Specialtys;
use App\Models\Graduations\Graduations;
use App\Models\Certificates\Certificates;
use App\Models\Specializations\Specializations;
use App\Models\Specializationclassification\Specializationclassification;

class certifi extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Certific = [];
    public $workers = [];
    public $Worker = [];
    public $certificates = [];
    public $graduations = [];
    public $specializations = [];
    public $specialtys = [];
    public $precises = [];
    public $specializationclassification = [];
    public $certifiSearch, $certifi, $certifiId;
    public $user_id, $worker_id, $calculator_number, $document_number, $document_date, $certificates_id, $authenticity_number, $authenticity_date, $graduations_id, $specialization_id, $graduation_year, $specialtys_id, $precises_id, $specializationclassification_id, $grade, $estimate, $duration, $issuing_country, $notes, $status;
    public $isDisabled = true;

    protected $listeners = [
        'SelectWorkerId',
        'GetSpecialtys',
        'GetPrecises',
        'SelectSpecializationclassificationId',

        'GetCertificate' => 'GetCertificate',
        'GetGraduation' => 'GetGraduation',
        'GetSpecialization' => 'GetSpecialization',
        'updateCertificatesId' => 'updateCertificatesId'
    ];

    public function hydrate()
    {
        $this->emit('select2');
        $this->emit('flatpickr');
    }

    public function mount()
    {
        $this->certificates = Certificates::all();
        $this->specialtys = Specialtys::all();
        $this->specializationclassification = Specializationclassification::all();
    }

    public function render()
    {
        /* $certifiSearch = '%' . $this->certifiSearch . '%';
        $Certific = Certific::where('user_id', 'LIKE', $certifiSearch)
            ->orWhere('worker_id', 'LIKE', $certifiSearch)
            ->orWhere('calculator_number', 'LIKE', $certifiSearch)
            ->orWhere('document_number', 'LIKE', $certifiSearch)
            ->orWhere('document_date', 'LIKE', $certifiSearch)
            ->orWhere('certificates_id', 'LIKE', $certifiSearch)
            ->orWhere('authenticity_number', 'LIKE', $certifiSearch)
            ->orWhere('authenticity_date', 'LIKE', $certifiSearch)
            ->orWhere('graduations_id', 'LIKE', $certifiSearch)
            ->orWhere('specialization_id', 'LIKE', $certifiSearch)
            ->orWhere('graduation_year', 'LIKE', $certifiSearch)
            ->orWhere('grade', 'LIKE', $certifiSearch)
            ->orWhere('estimate', 'LIKE', $certifiSearch)
            ->orWhere('duration', 'LIKE', $certifiSearch)
            ->orWhere('issuing_country', 'LIKE', $certifiSearch)
            ->orWhere('notes', 'LIKE', $certifiSearch)
            ->orWhere('status', 'LIKE', $certifiSearch)
            ->orderBy('id', 'ASC')
            ->paginate(10);

        $links = $Certific;
        $this->Certific = collect($Certific->items());
        return view('livewire.certific.certifi', [
            'links' => $links
        ]); */

        $certifiSearch = '%' . $this->certifiSearch . '%';
        $workers = Workers::where('full_name', 'LIKE', $certifiSearch)->orderBy('id', 'ASC')->paginate(10);

        $links = $workers;
        $this->workers = collect($workers->items());
        return view('livewire.certific.certifi', [
            'links' => $links,
        ]);
    }

    //ربط الشهادة وجهة التخرج والتخصص
    public function GetCertificate($Certificates_id)
    {
        $this->certificates_id = $Certificates_id;
        $this->graduations = Graduations::where('certificates_id', $Certificates_id)->get();
        $this->checkDurationId();
    }
    public function GetGraduation($Graduations_id)
    {
        $this->graduations_id = $Graduations_id;
        $this->specializations = Specializations::where('graduations_id', $Graduations_id)->get();
    }
    public function GetSpecialization($Specialization_id)
    {
        $this->specialization_id = $Specialization_id;
    }

     //اختبار حقل الشهادة وفتح حقل القدم
     public function updateCertificatesId($value)
     {
         $this->certificates_id = $value;
         $this->checkDurationId();
     }

    public function checkDurationId()
    {
        $highCerts = ['دبلوم عالي', 'ماجستير', 'دكتوراه', 'بروفيسور'];

        $Certificates = Certificates::find($this->certificates_id);

        if (in_array($Certificates->certificates_name, $highCerts)) {
            $this->isDisabled = '';
        } else {
            $this->isDisabled = 'disabled';
            $this->duration = 0;
        }
    }

    //ربط التخصص العام والدقيق
    public function GetSpecialtys($Specialtys_id)
    {
        $this->specialtys_id = $Specialtys_id;
        $this->precises = Precises::where('specialtys_id', $Specialtys_id)->get();
    }
    public function GetPrecises($Precises_id)
    {
        $this->precises_id = $Precises_id;
    }

    //استدعاء تصنيف التخصص
    public function SelectSpecializationclassificationId($SpecializationclassificationIdID)
    {
        $specializationclassification_id = Specializationclassification::find($SpecializationclassificationIdID);
        if ($specializationclassification_id) {
            $this->specializationclassification_id = $SpecializationclassificationIdID;
        } else {
            $this->specializationclassification_id = null;
        }
    }

    //استدعاء جدول الموظفين
    public function SelectWorkerId($WorkerIdID)
    {
        $worker_id = Workers::find($WorkerIdID);
        if ($worker_id) {
            $this->worker_id = $WorkerIdID;
            $this->calculator_number = $worker_id->calculator_number;
        } else {
            $this->worker_id = null;
            $this->calculator_number = null;
        }
    }

    //اختبار حقل الدرجة واعطاء التقدير
    public function updatedGrade($value)
    {
        $grade = (int)$value;
        if ($grade < 50 || $grade > 100) {
            $this->addError('grade', 'الدرجة يجب أن تكون بين 50 و 100.');
            $this->grade = '';
            $this->estimate = '';
            return;
        }
        $this->resetErrorBag('grade');
        if ($grade >= 90) {
            $this->estimate = 'ممتاز';
        } elseif ($grade >= 80) {
            $this->estimate = 'جيد جداً';
        } elseif ($grade >= 70) {
            $this->estimate = 'جيد';
        } elseif ($grade >= 60) {
            $this->estimate = 'مقبول';
        } else {
            $this->estimate = 'ضعيف';
        }
    }


    public function AddCertifyModal($WorkerID)
    {
        $this->reset(['worker_id', 'calculator_number', 'document_number', 'document_date', 'certificates_id', 'authenticity_number', 'authenticity_date', 'graduations_id', 'specialization_id', 'graduation_year', 'specialtys_id', 'precises_id', 'specializationclassification_id', 'grade', 'estimate', 'duration', 'issuing_country', 'notes', 'status']);
        $this->resetValidation();
        $this->dispatchBrowserEvent('AddCertifyModal');

        $this->Worker = Workers::find($WorkerID);
    }

    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'worker_id' => 'required',
            'calculator_number' => 'required',
            'document_number' => 'required',
            'document_date' => 'required',
            'certificates_id' => 'required',
            'authenticity_number' => 'required',
            'authenticity_date' => 'required',
            'graduations_id' => 'required',
            'specialization_id' => 'required',
            'graduation_year' => 'required',
            'specialtys_id' => 'required',
            'precises_id' => 'required',
            'specializationclassification_id' => 'required',
            'grade' => 'required',
            'estimate' => 'required',
            'duration' => 'required',
            'issuing_country' => 'required',
        ], [
            'worker_id.required' => 'حقل اسم الموظف مطلوب',
            'calculator_number.required' => 'حقل رقم الحاسبة مطلوب',
            'document_number.required' => 'حقل رقم الوثيقة مطلوب',
            'document_date.required' => 'حقل تاريخ الوثيقة مطلوب',
            'certificates_id.required' => 'حقل الشهادة مطلوب',
            'authenticity_number.required' => 'حقل رقم صحة الصدور مطلوب',
            'authenticity_date.required' => 'حقل تاريخ صحة الصدور مطلوب',
            'graduations_id.required' => 'حقل جهة التخرج مطلوب',
            'specialization_id.required' => 'حقل التخصص مطلوب',
            'graduation_year.required' => 'حقل سنة التخرج مطلوب',
            'specialtys_id.required' => 'حقل التخصص العام مطلوب',
            'precises_id.required' => 'حقل التخصص الدقيق مطلوب',
            'specializationclassification_id.required' => 'حقل تصنيف التخصص مطلوب',
            'grade.required' => 'حقل الدرجة مطلوب',
            'estimate.required' => 'حقل التقدير مطلوب',
            'duration.required' => 'حقل مدة القدم مطلوب',
            'issuing_country.required' => 'حقل البلد المانح للشهادة مطلوب',
        ]);

        Certific::create([
            'user_id' => Auth::User()->id,
            'worker_id' => $this->worker_id,
            'calculator_number' => $this->calculator_number,
            'document_number' => $this->document_number,
            'document_date' => $this->document_date,
            'certificates_id' => $this->certificates_id,
            'authenticity_number' => $this->authenticity_number,
            'authenticity_date' => $this->authenticity_date,
            'graduations_id' => $this->graduations_id,
            'specialization_id' => $this->specialization_id,
            'graduation_year' => $this->graduation_year,
            'specialtys_id' => $this->specialtys_id,
            'precises_id' => $this->precises_id,
            'specializationclassification_id' => $this->specializationclassification_id,
            'grade' => $this->grade,
            'estimate' => $this->estimate,
            'duration' => $this->duration,
            'issuing_country' => $this->issuing_country,
            'notes' => $this->notes,
            'status' => $this->status,
        ]);

        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function Getcertifi($certifiId)
    {
        $this->resetValidation();

        $this->certifi  = Certific::find($certifiId);
        $this->certifiId = $this->certifi->id;
        $this->user_id = $this->certifi->user_id;
        $this->worker_id = $this->certifi->worker_id;
        $this->calculator_number = $this->certifi->calculator_number;
        $this->document_number = $this->certifi->document_number;
        $this->document_date = $this->certifi->document_date;
        $this->certificates_id = $this->certifi->certificates_id;
        $this->authenticity_number = $this->certifi->authenticity_number;
        $this->authenticity_date = $this->certifi->authenticity_date;
        $this->graduations_id = $this->certifi->graduations_id;
        $this->specialization_id = $this->certifi->specialization_id;
        $this->graduation_year = $this->certifi->graduation_year;
        $this->specialtys_id = $this->certifi->specialtys_id;
        $this->precises_id = $this->certifi->precises_id;
        $this->specializationclassification_id = $this->certifi->specializationclassification_id;
        $this->grade = $this->certifi->grade;
        $this->estimate = $this->certifi->estimate;
        $this->duration = $this->certifi->duration;
        $this->issuing_country = $this->certifi->issuing_country;
        $this->notes = $this->certifi->notes;
        $this->status = $this->certifi->status;

        //$this->GetCertificate($this->certifi->id);
        //$this->graduations = $this->certifi->Getgraduation;
        $this->graduations = Graduations::where('certificates_id', $this->certificates_id)->get();
        $this->specializations = Specializations::where('certificates_id', $this->certificates_id)->
                                where('graduations_id', $this->graduations_id)->get();
        dd($this->specialization_id);
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'worker_id' => 'required:certific',
            'calculator_number' => 'required:certific',
            'document_number' => 'required:certific',
            'document_date' => 'required:certific',
            'certificates_id' => 'required:certific',
            'authenticity_number' => 'required:certific',
            'authenticity_date' => 'required:certific',
            'graduations_id' => 'required:certific',
            'specialization_id' => 'required:certific',
            'graduation_year' => 'required:certific',
            'graduation_year' => 'required',
            'specialtys_id' => 'required',
            'precises_id' => 'required',
            'grade' => 'required:certific',
            'estimate' => 'required:certific',
            'duration' => 'required:certific',
            'issuing_country' => 'required:certific',
        ], [
            'worker_id.required' => 'حقل اسم الموظف مطلوب',
            'calculator_number.required' => 'حقل رقم الحاسبة مطلوب',
            'document_number.required' => 'حقل رقم الوثيقة مطلوب',
            'document_date.required' => 'حقل تاريخ الوثيقة مطلوب',
            'certificates_id.required' => 'حقل الشهادة مطلوب',
            'authenticity_number.required' => 'حقل رقم صحة الصدور مطلوب',
            'authenticity_date.required' => 'حقل تاريخ صحة الصدور مطلوب',
            'graduations_id.required' => 'حقل جهة التخرج مطلوب',
            'specialization_id.required' => 'حقل التخصص مطلوب',
            'graduation_year.required' => 'حقل سنة التخرج مطلوب',
            'specialtys_id.required' => 'حقل التخصص العام مطلوب',
            'precises_id.required' => 'حقل التخصص الدقيق مطلوب',
            'specializationclassification_id.required' => 'حقل تصنيف التخصص مطلوب',
            'grade.required' => 'حقل الدرجة مطلوب',
            'estimate.required' => 'حقل التقدير مطلوب',
            'duration.required' => 'حقل مدة القدم مطلوب',
            'issuing_country.required' => 'حقل البلد المانح للشهادة مطلوب',
        ]);

        $Certific = Certific::find($this->certifiId);
        $Certific->update([
            'user_id' => Auth::User()->id,
            'worker_id' => $this->worker_id,
            'calculator_number' => $this->calculator_number,
            'document_number' => $this->document_number,
            'document_date' => $this->document_date,
            'certificates_id' => $this->certificates_id,
            'authenticity_number' => $this->authenticity_number,
            'authenticity_date' => $this->authenticity_date,
            'graduations_id' => $this->graduations_id,
            'specialization_id' => $this->specialization_id,
            'graduation_year' => $this->graduation_year,
            'specialtys_id' => $this->specialtys_id,
            'precises_id' => $this->precises_id,
            'specializationclassification_id' => $this->specializationclassification_id,
            'grade' => $this->grade,
            'estimate' => $this->estimate,
            'duration' => $this->duration,
            'issuing_country' => $this->issuing_country,
            'notes' => $this->notes,
            'status' => $this->status,

        ]);

        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Certific = Certific::find($this->certifiId);

        if ($Certific) {
            $Certific->delete();

            $this->reset();
            $this->dispatchBrowserEvent('success', [
                'message' => 'تم حذف البيانات بنجاح',
                'title' => 'الحذف'
            ]);
        }
    }
}

<?php

namespace App\Http\Livewire\Certific\ShowCertifi;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Workers\Workers;
use App\Models\Certific\Certific;
use App\Models\Precises\Precises;
use Illuminate\Support\Facades\Auth;
use App\Models\Specialtys\Specialtys;
use App\Models\Certificates\Certificates;
use App\Models\Specializations\Specializations;
use App\Models\Specializationclassification\Specializationclassification;

class ShowCertifi extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $worker_id;
    public $Worker;
    public $WorkerCertific = [];
    public $certificates = [];
    public $graduations = [];
    public $specializations = [];
    public $specializationclassification = [];
    public $specialtys = [];
    public $precises = [];
    public $certifiSearch, $certifi, $certifiId;
    public $user_id, $calculator_number, $document_number, $document_date, $certificates_id, $authenticity_number, $authenticity_date, $graduations_id, $specialization_id, $graduation_year, $specialtys_id, $precises_id, $specializationclassification_id, $grade, $estimate, $duration, $issuing_country, $notes, $status;
    public $isDisabled = true;
    public $certificate_file, $validity_ssuance_certificate_file;
    public $certificateFilePreview, $validitySsuanceFilePreview;
    public $activeCertificateTap = 'active';
    public $activeValiditySsuanceTap = '';
    public $Edit_certificate_file, $Edit_validity_ssuance_certificate_file;

    protected $listeners = [
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
        $this->Worker = Workers::find($this->worker_id);

        $this->WorkerCertific = $this->Worker->GetCertific;
        $this->certificates = Certificates::all();
        $this->specialtys = Specialtys::all();
        $this->specializationclassification = Specializationclassification::all();
    }

    public function render()
    {
        return view('livewire.certific.show-certifi.show-certifi');
    }

    public function AddCertifyModal()
    {
        $this->reset(['calculator_number', 'document_number', 'document_date', 'certificates_id', 'authenticity_number', 'authenticity_date', 'graduations_id', 'specialization_id', 'graduation_year', 'specialtys_id', 'precises_id', 'specializationclassification_id', 'grade', 'estimate', 'duration', 'issuing_country', 'notes', 'status']);
        $this->resetValidation();
        $this->dispatchBrowserEvent('AddCertifyModal');

        $this->Worker = Workers::find($this->worker_id);
        $this->worker_id = $this->worker_id;
        $this->calculator_number = $this->Worker->calculator_number;
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
    //ربط الشهادة وجهة التخرج والتخصص
    public function GetCertificate($Certificates_id)
    {
        $this->certificates_id = $Certificates_id;
        $certifi = Certificates::find($Certificates_id);
        $this->graduations = $certifi->Getgraduation;

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

    public function certificateTap() {
        $this->activeCertificateTap = 'active';
        $this->activeValiditySsuanceTap = '';
    }
    public function validitySsuanceTap() {
        $this->activeCertificateTap = '';
        $this->activeValiditySsuanceTap = 'active';
    }

    public function updatedEditCertificateFile() {
        $this->certificateFilePreview = $this->Edit_certificate_file->temporaryUrl();

        $this->validate([
            'Edit_certificate_file' => 'file|max:1024', // الحد الأقصى للحجم 1 ميجابايت
        ], [
            'Edit_certificate_file.max'=> 'يجب ألا يزيد حجم ملف الشهادة عن 1024 كيلوبايت.'
        ]);
    }
    public function updatedEditValiditySsuanceCertificateFile() {
        $this->validitySsuanceFilePreview = $this->Edit_validity_ssuance_certificate_file->temporaryUrl();

        $this->validate([
            'Edit_validity_ssuance_certificate_file' => 'file|max:1024', // الحد الأقصى للحجم 1 ميجابايت
        ], [
            'Edit_validity_ssuance_certificate_file.max'=> 'يجب ألا يزيد حجم ملف الشهادة عن 1024 كيلوبايت.'
        ]);
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
            $this->estimate = 'متوسط';
        } else {
            $this->estimate = 'قمبول';
        }
    }

    public function store()
    {
        /* try { */
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

            $this->resetExcept('worker_id', 'Worker', 'WorkerCertific', 'certificates', 'specialtys', 'specializationclassification');
            $this->dispatchBrowserEvent('success', [
                'message' => 'تم الاضافة بنجاح',
                'title' => 'إضافة'
            ]);


        /* } catch (\Exception $e) {
            // سجل رسالة الخطأ
            $this->dispatchBrowserEvent('error', [
                'message' => 'حدث خطأ أثناء الإضافة: ' . $e->getMessage(),
                'title' => 'خطأ'
            ]);
        } */
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
        $this->Edit_certificate_file = $this->certifi->certificate_file;
        $this->Edit_validity_ssuance_certificate_file = $this->certifi->validity_ssuance_certificate_file;

        $this->graduations = $this->certifi->Getcertificate->Getgraduation;
        $this->specializations = $this->certifi->Getgraduation->Getspecialization;
        $this->precises = $this->certifi->Getspecialty->Getprecise;

        $this->activeCertificateTap = 'active';
        $this->activeValiditySsuanceTap = '';
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

        if( $this->certificateFilePreview )
        {
            $this->validate([
                'Edit_certificate_file' => 'required|max:1024', // الحد الأقصى للحجم 1 ميجابايت
            ], [
                'Edit_certificate_file.required'=> 'ملف الشهادة مطلوب.',
                'Edit_certificate_file.max'=> 'يجب ألا يزيد حجم ملف الشهادة عن 1024 كيلوبايت.',
            ]);

            if(file_exists(public_path('storage/Certific/'.$this->calculator_number.'/'.$this->certifi->certificate_file)))
            {
                unlink(public_path('storage/Certific/'.$this->calculator_number.'/'.$this->certifi->certificate_file));
            }

            $this->Edit_certificate_file->store($this->calculator_number, 'Certific');

            $Certific->update([
                'certificate_file' => $this->Edit_certificate_file->hashName(),
            ]);
        }

        if( $this->validitySsuanceFilePreview )
        {
            $this->validate([
                'Edit_validity_ssuance_certificate_file' => 'required|max:1024', // الحد الأقصى للحجم 1 ميجابايت
            ], [
                'Edit_validity_ssuance_certificate_file.required'=> 'ملف صحة صدور الشهادة مطلوب.',
                'Edit_validity_ssuance_certificate_file.max'=> 'يجب ألا يزيد حجم ملف صحة صدور الشهادة عن 1024 كيلوبايت.',
            ]);

            if(file_exists(public_path('storage/Certific/'.$this->calculator_number.'/'.$this->certifi->validity_ssuance_certificate_file)))
            {
                unlink(public_path('storage/Certific/'.$this->calculator_number.'/'.$this->certifi->validity_ssuance_certificate_file));
            }

            $this->Edit_validity_ssuance_certificate_file->store($this->calculator_number, 'Certific');

            $Certific->update([
                'validity_ssuance_certificate_file' => $this->Edit_validity_ssuance_certificate_file->hashName(),
            ]);
        }

        $this->resetExcept('worker_id', 'Worker', 'WorkerCertific', 'certificates', 'specialtys', 'specializationclassification');
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);

        $this->mount();
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

            $this->mount();
        }
    }
}

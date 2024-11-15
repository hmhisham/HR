<?php

namespace App\Http\Livewire\Certific\ShowCertifi;

use Livewire\Component;
use App\Models\Workers\Workers;
use App\Models\Certific\Certific;
use Illuminate\Support\Facades\Auth;
use App\Models\Specialtys\Specialtys;
use App\Models\Certificates\Certificates;
use App\Models\Specializations\Specializations;
use App\Models\Specializationclassification\Specializationclassification;

class ShowCertifi extends Component
{
    public $worker_id;
    public $Worker;
    public $certificates = [];
    public $graduations = [];
    public $specializations = [];
    public $specializationclassification = [];
    public $specialtys = [];
    public $precises = [];
    public $certifiSearch, $certifi, $certifiId;
    public $user_id, $calculator_number, $document_number, $document_date, $certificates_id, $authenticity_number, $authenticity_date, $graduations_id, $specialization_id, $graduation_year, $specialtys_id, $precises_id, $specializationclassification_id, $grade, $estimate, $duration, $issuing_country, $notes, $status;
    public $isDisabled = true;

    public function mount()
    {
        $this->Worker = Workers::find($this->worker_id);

        $this->certificates = Certificates::all();
        $this->specialtys = Specialtys::all();
        $this->specializationclassification = Specializationclassification::all();
    }

    public function render()
    {
        return view('livewire.certific.show-certifi.show-certifi');
    }

    public function Getcertifi($certifiId)
    {
        $this->resetValidation();

        $this->certifi  = Certific::find($certifiId);
        $this->certifiId = $this->certifi->id;
        $this->user_id = $this->certifi->user_id;
        //$this->worker_id = $this->certifi->worker_id;
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

        $this->graduations = $this->certifi->Getcertificate->Getgraduation;
        $this->specializations = $this->certifi->Getgraduation->Getspecialization;
        $this->precises = $this->certifi->Getspecialty->Getprecise;

        //dd($this->precises);
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

        $this->resetExcept('Worker', 'certificates', 'specialtys', 'specializationclassification');
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }
}

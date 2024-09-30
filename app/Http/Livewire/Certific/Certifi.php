<?php

namespace App\Http\Livewire\Certific;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Workers\Workers;
use App\Models\Certific\Certific;
use Illuminate\Support\Facades\Auth;
use App\Models\Graduations\Graduations;
use App\Models\Certificates\Certificates;
use App\Models\Specializations\Specializations;

class Certifi extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Certific = [];
    public $CertifiSearch, $Certifi, $CertifiId;
    public $user_id, $calculator_number, $document_number, $document_date, $certificate_name, $authenticity_number, $authenticity_date,  $college_name, $specialization, $graduation_year, $grade,$estimate, $issuing_country, $notes, $status;
    public $Graduations = [];
    public $Certificates = [];
    public $Specializations = [];
    public $search = '';
    public $workers = [];
    public $worker, $department, $full_name;
    public $selectedWorker = null;
    public $selectedCertificate;

    public $graduation_id;


    protected $listeners = [
        'SelectWorker',
    ];

    public function hydrate()
    {
        $this->emit('select2');
    }


    public function mount()
    {
        $this->workers = Workers::all();
        $this->Certificates = Certificates::all();
    }

    public function SelectWorker($workerID)
    {
        $worker = Workers::find($workerID);
        if ($worker) {
            $this->worker = $workerID;
            $this->calculator_number = $worker->calculator_number;
            $this->department = $worker->department;
        } else {
            $this->worker = null;
            $this->calculator_number = null;
            $this->department = null;
        }
    }

    public function render()
    {
        $CertifiSearch = '%' . $this->CertifiSearch . '%';
        $Certific = Certific::join('workers', 'certific.calculator_number', '=', 'workers.calculator_number')
            ->where(function ($query) use ($CertifiSearch) {
                $query->where('certific.calculator_number', 'LIKE', $CertifiSearch)
                    ->orWhere('workers.full_name', 'LIKE', $CertifiSearch);
            })
            ->orderBy('certific.id', 'ASC')
            ->select('certific.*')
            ->paginate(10);
        $links = $Certific;
        $this->Certific = collect($Certific->items());
        return view('livewire.certific.certifi', [
            'links' => $links
        ]);
    }


    public function updatedGrade($value)
    {
        $grade = (int)$value;
        if ($grade < 0 || $grade > 100) {
            $this->addError('grade', 'الدرجة يجب أن تكون بين 0 و 100.');
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


    public function loadGraduations()
    {

        if ($this->certificate_name) {
            $this->Graduations = Graduations::where('certificates_id', $this->certificate_name)->get();
        }
    }
    public function loadSpecializations()
    {
        // تحميل التخصصات بناءً على جهة التخرج المختارة
        if ($this->college_name) {
            $this->Specializations = Specializations::where('graduations_id', $this->college_name)->get();
        }
    }
    public function AddCertifiModalShow()
    {
        $this->reset(['department', 'calculator_number', 'document_number', 'document_date', 'certificate_name', 'authenticity_number', 'authenticity_date',   'college_name',   'specialization', 'graduation_year', 'grade', 'estimate','issuing_country', 'notes', 'status']);

        $this->resetValidation();
        $this->dispatchBrowserEvent('CertifiModalShow');
    }

    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'calculator_number' => 'required',
            'document_number' => 'required',
            'document_date' => 'required',
            'certificate_name' => 'required',
            'authenticity_number' => 'required',
            'authenticity_date' => 'required',

            'college_name' => 'required',
            'specialization' => 'required',
            'graduation_year' => 'required',
            'grade' => 'required',
            'estimate' => 'required',
            'issuing_country' => 'required',
            'status' => 'required',
        ], [
            'calculator_number.required' => 'حقل الاسم مطلوب',
            'document_number.required' => 'حقل الاسم مطلوب',
            'document_date.required' => 'حقل الاسم مطلوب',
            'certificate_name.required' => 'حقل الاسم مطلوب',
            'authenticity_number.required' => 'حقل الاسم مطلوب',
            'authenticity_date.required' => 'حقل الاسم مطلوب',

            'college_name.required' => 'حقل الاسم مطلوب',
            'specialization.required' => 'حقل الاسم مطلوب',
            'graduation_year.required' => 'حقل الاسم مطلوب',
            'grade.required' => 'حقل الاسم مطلوب',
            'estimate.required' => 'حقل الاسم مطلوب',
            'issuing_country.required' => 'حقل الاسم مطلوب',
            'status.required' => 'حقل الاسم مطلوب',
        ]);

        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);
        Certific::create([
            'user_id' => Auth::id(),
            'calculator_number' => $this->calculator_number,
            'document_number' => $this->document_number,
            'document_date' => $this->document_date,
            'certificate_name' => $this->certificate_name,
            'authenticity_number' => $this->authenticity_number,
            'authenticity_date' => $this->authenticity_date,

            'college_name' => $this->college_name,
            'specialization' => $this->specialization,
            'graduation_year' => $this->graduation_year,
            'grade' => $this->grade,
            'estimate' => $this->estimate,
            'issuing_country' => $this->issuing_country,
            'notes' => $this->notes,
            'status' => $this->status,

        ]);
        $this->reset(['department', 'calculator_number', 'document_number', 'document_date', 'certificate_name', 'authenticity_number', 'authenticity_date',  'college_name', 'specialization', 'graduation_year', 'grade', 'issuing_country', 'notes', 'status']);
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetCertifi($CertifiId)
    {
        $this->resetValidation();


        $this->Certifi  = Certific::find($CertifiId);
        $worker = $this->Certifi->worker;

        $this->CertifiId = $this->Certifi->id;
        $this->user_id = $this->Certifi->user_id;
        $this->calculator_number = $this->Certifi->calculator_number;
        $this->document_number = $this->Certifi->document_number;
        $this->document_date = $this->Certifi->document_date;
        $this->certificate_name = $this->Certifi->certificate_name;
        $this->authenticity_number = $this->Certifi->authenticity_number;
        $this->authenticity_date = $this->Certifi->authenticity_date;

        $this->college_name = $this->Certifi->college_name;

        $this->specialization = $this->Certifi->specialization;
        $this->graduation_year = $this->Certifi->graduation_year;
        $this->grade = $this->Certifi->grade;
        $this->estimate = $this->Certifi->estimate;
        $this->issuing_country = $this->Certifi->issuing_country;
        $this->notes = $this->Certifi->notes;
        $this->status = $this->Certifi->status;
        if ($worker) {
            $this->full_name = $worker->full_name;
            $this->department = $worker->department;
        } else {
            $this->full_name = 'N/A';
            $this->department = 'N/A';
        }
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([

            'calculator_number' => 'required:certific',
            'document_number' => 'required:certific',
            'document_date' => 'required:certific',
            'certificate_name' => 'required:certific',
            'authenticity_number' => 'required:certific',
            'authenticity_date' => 'required:certific',

            'college_name' => 'required:certific',
            'specialization' => 'required:certific',
            'graduation_year' => 'required:certific',
            'grade' => 'required:certific',
            'estimate' => 'required:certific',
            'issuing_country' => 'required:certific',
            'status' => 'required:certific',
        ], [
            'calculator_number.required' => 'حقل الاسم مطلوب',
            'document_number.required' => 'حقل الاسم مطلوب',
            'document_date.required' => 'حقل الاسم مطلوب',
            'certificate_name.required' => 'حقل الاسم مطلوب',
            'authenticity_number.required' => 'حقل الاسم مطلوب',
            'authenticity_date.required' => 'حقل الاسم مطلوب',

            'college_name.required' => 'حقل الاسم مطلوب',
            'specialization.required' => 'حقل الاسم مطلوب',
            'graduation_year.required' => 'حقل الاسم مطلوب',
            'grade.required' => 'حقل الاسم مطلوب',
            'estimate.required' => 'حقل الاسم مطلوب',
            'issuing_country.required' => 'حقل الاسم مطلوب',
            'status.required' => 'حقل الاسم مطلوب',
        ]);

        $Certific = Certific::find($this->CertifiId);
        $Certific->update([
            'user_id' => Auth::id(),
            'calculator_number' => $this->calculator_number,
            'document_number' => $this->document_number,
            'document_date' => $this->document_date,
            'certificate_name' => $this->certificate_name,
            'authenticity_number' => $this->authenticity_number,
            'authenticity_date' => $this->authenticity_date,

            'college_name' => $this->college_name,
            'specialization' => $this->specialization,
            'graduation_year' => $this->graduation_year,
            'grade' => $this->grade,
            'estimate' => $this->estimate,
            'issuing_country' => $this->issuing_country,
            'notes' => $this->notes,
            'status' => $this->status,

        ]);
        $this->reset(['department', 'calculator_number', 'document_number', 'document_date', 'certificate_name', 'authenticity_number', 'authenticity_date',   'college_name', 'specialization', 'graduation_year', 'grade', 'issuing_country', 'notes', 'status']);

        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Certific = Certific::find($this->CertifiId);
        $Certific->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات  بنجاح',
            'title' => 'الحذف '
        ]);
    }
}

<?php

namespace App\Http\Livewire\Services;

use Carbon\Carbon;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Workers\Workers;
use App\Models\Services\Services;
use App\Models\Jobtitles\Jobtitles;
use Illuminate\Support\Facades\Auth;
use App\Models\Certificates\Certificates;

class Service extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Services = [];
    public $workers = [];
    public $certificates = [];
    public $jobtitles = [];
    public $Worker;
    public $ServiceSearch, $Service, $ServiceId;
    public $user_id, $worker_id, $service_type, $administrative_order_number, $administrative_order_date, $from_date, $to_date, $days, $months, $years, $in_service_salary, $certificates_id, $calculation_order_number, $calculation_order_date, $purpose, $job_title_deletion, $job_title_introduction, $notes;

    protected $listeners = [
        'SelectCertificatesId',
        'SelectJobTitleDeletion',
        'SelectJobTitleIntroduction',

        'employeeAddFromDate' => 'updatedFromDate',
        'employeeAddToDate' => 'updatedToDate',
        'employeeEditFromDate' => 'updatedFromDate',
        'employeeEditToDate' => 'updatedToDate'
    ];
    public function hydrate()
    {
        $this->emit('select2');
        $this->emit('flatpickr');
    }
    public function mount()
    {
        $this->certificates = Certificates::all();
        $this->jobtitles = Jobtitles::all();
    }

    //استدعاء التحصيل الدراسي
    public function SelectCertificatesId($CertificatesIdID)
    {
        $certificates_id = Certificates::find($CertificatesIdID);
        if ($certificates_id) {
            $this->certificates_id = $CertificatesIdID;
        } else {
            $this->certificates_id = null;
        }
    }

    //استدعاء العنوان الوظيفي المحذوف
    public function SelectJobTitleDeletion($JobTitleDeletionID)
    {
        $job_title_deletion = Jobtitles::find($JobTitleDeletionID);
        if ($job_title_deletion) {
            $this->job_title_deletion = $JobTitleDeletionID;
        } else {
            $this->job_title_deletion = null;
        }
    }
    //استدعاء العنوان الوظيفي المستحدث
    public function SelectJobTitleIntroduction($JobTitleIntroductionID)
    {
        $job_title_introduction = Jobtitles::find($JobTitleIntroductionID);
        if ($job_title_introduction) {
            $this->job_title_introduction = $JobTitleIntroductionID;
        } else {
            $this->job_title_introduction = null;
        }
    }


    public function updatedFromDate($value = null)
    {
        $this->from_date = $value ?? $this->from_date;
        $this->calculateDifference();
    }

    public function updatedToDate($value = null)
    {
        $this->to_date = $value ?? $this->to_date;
        $this->calculateDifference();
    }

    public function employeeAddFromDate($date)
    {
        $this->from_date = Carbon::createFromFormat('Y-m-d', $date)->format('Y-m-d');
    }

    public function employeeAddToDate($date)
    {
        $this->to_date = Carbon::createFromFormat('Y-m-d', $date)->format('Y-m-d');
    }

    public function calculateDifference()
    {
        if ($this->from_date && $this->to_date) {
            try {
                $from_date = Carbon::createFromFormat('Y-m-d', $this->from_date);
                $to_date = Carbon::createFromFormat('Y-m-d', $this->to_date);
                $diff = $to_date->diff($from_date);

                $this->days = $diff->d;  // الفرق بالأيام
                $this->months = $diff->m;   // الفرق بالأشهر
                $this->years = $diff->y;    // الفرق بالسنوات
            } catch (\Exception $e) {
                $this->days = $this->months = $this->years = null;
            }
        }
    }

    public function render()
    {
        $ServiceSearch = '%' . $this->ServiceSearch . '%';
        $workers = Workers::where('full_name', 'Like', $ServiceSearch)->orderBy('id', 'ASC')->paginate(10);

        $links = $workers;
        $this->workers = collect($workers->items());
        return view('livewire.services.service', [
            'links' => $links
        ]);
    }

    public function AddServiceModal($WorkerID)
    {
        $this->reset('worker_id', 'service_type', 'administrative_order_number', 'administrative_order_date', 'from_date', 'to_date', 'days', 'months', 'years', 'in_service_salary', 'certificates_id', 'calculation_order_number', 'calculation_order_date', 'purpose', 'job_title_deletion', 'job_title_introduction', 'notes');
        $this->resetValidation();
        $this->dispatchBrowserEvent('AddServiceModal');

        $this->Worker = Workers::find($WorkerID);
        $this->worker_id = $WorkerID;
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'worker_id' => 'required',
            'service_type' => 'required',
            'administrative_order_number' => 'required',
            'administrative_order_date' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'days' => 'required',
            'months' => 'required',
            'years' => 'required',
            'in_service_salary' => 'required',
            'certificates_id' => 'required',
            'calculation_order_number' => 'required',
            'calculation_order_date' => 'required',
            'purpose' => 'required',
            'job_title_deletion' => 'required',
            'job_title_introduction' => 'required',

        ], [
            'worker_id.required' => 'حقل اسم الموظف مطلوب',
            'service_type.required' => 'حقل نوع الخدمة مطلوب',
            'administrative_order_number.required' => 'حقل رقم امر الاداري مطلوب',
            'administrative_order_date.required' => 'حقل تاريخ امر الاداري مطلوب',
            'from_date.required' => 'حقل من تاريخ مطلوب',
            'to_date.required' => 'حقل الى تاريخ مطلوب',
            'days.required' => 'حقل يوم مطلوب',
            'months.required' => 'حقل شهر مطلوب',
            'years.required' => 'حقل سنة مطلوب',
            'in_service_salary.required' => 'حقل الراتب خلال المدة مطلوب',
            'certificates_id.required' => 'حقل الشهادة مطلوب',
            'calculation_order_number.required' => 'حقل رقم امر الاحتساب مطلوب',
            'calculation_order_date.required' => 'حقل تاريخ امر الاحتساب مطلوب',
            'purpose.required' => 'حقل الغرض مطلوب',
            'job_title_deletion.required' => 'حقل العنوان الوظيفي الحذف مطلوب',
            'job_title_introduction.required' => 'حقل العنوان الوظيفي الاستحداث مطلوب',
        ]);

        Services::create([
            'user_id' => Auth::User()->id,
            'worker_id' => $this->worker_id,
            'service_type' => $this->service_type,
            'administrative_order_number' => $this->administrative_order_number,
            'administrative_order_date' => $this->administrative_order_date,
            'from_date' => $this->from_date,
            'to_date' => $this->to_date,
            'days' => $this->days,
            'months' => $this->months,
            'years' => $this->years,
            'in_service_salary' => $this->in_service_salary,
            'certificates_id' => $this->certificates_id,
            'calculation_order_number' => $this->calculation_order_number,
            'calculation_order_date' => $this->calculation_order_date,
            'purpose' => $this->purpose,
            'job_title_deletion' => $this->job_title_deletion,
            'job_title_introduction' => $this->job_title_introduction,
            'notes' => $this->notes,

        ]);
        $this->reset(['worker_id', 'service_type', 'administrative_order_number', 'administrative_order_date', 'from_date', 'to_date', 'days', 'months', 'years', 'in_service_salary', 'certificates_id', 'calculation_order_number', 'calculation_order_date', 'purpose', 'job_title_deletion', 'job_title_introduction', 'notes']);
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetService($ServiceId)
    {
        $this->resetValidation();

        $this->Service  = Services::find($ServiceId);
        $this->ServiceId = $this->Service->id;
        $this->user_id = $this->Service->user_id;
        $this->worker_id = $this->Service->worker_id;
        $this->service_type = $this->Service->service_type;
        $this->administrative_order_number = $this->Service->administrative_order_number;
        $this->administrative_order_date = $this->Service->administrative_order_date;
        $this->from_date = $this->Service->from_date;
        $this->to_date = $this->Service->to_date;
        $this->days = $this->Service->days;
        $this->months = $this->Service->months;
        $this->years = $this->Service->years;
        $this->in_service_salary = $this->Service->in_service_salary;
        $this->certificates_id = $this->Service->certificates_id;
        $this->calculation_order_number = $this->Service->calculation_order_number;
        $this->calculation_order_date = $this->Service->calculation_order_date;
        $this->purpose = $this->Service->purpose;
        $this->job_title_deletion = $this->Service->job_title_deletion;
        $this->job_title_introduction = $this->Service->job_title_introduction;
        $this->notes = $this->Service->notes;
    }
}

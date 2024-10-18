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

class service extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Services = [];
    public $workers = [];
    public $certificates = [];
    public $jobtitles = [];
    public $serviceSearch, $service, $serviceId;
    public $user_id, $workers_id, $start_work_date, $service_type, $administrative_order_number, $administrative_order_date, $from_date, $to_date, $in_service_salary, $certificates_id, $calculation_order_number, $calculation_order_date, $purpose, $job_title_deletion, $job_title_introduction;
    public $days, $months, $years;

    protected $listeners = [
        'SelectWorkersId',
        'SelectCertificatesId',
        'SelectJobTitleDeletion',
        'SelectJobTitleIntroduction',
    ];
    public function hydrate()
    {
        $this->emit('select2');
        $this->emit('flatpickr');
    }
    public function mount()
    {
        $this->workers = Workers::all();
        $this->certificates = Certificates::all();
        $this->jobtitles = Jobtitles::all();
    }

    //استدعاء اسم الموظف
    public function SelectWorkersId($WorkersIdID)
    {
        $workers_id = Workers::find($WorkersIdID);
        if ($workers_id) {
            $this->workers_id = $WorkersIdID;
            $this->start_work_date = $workers_id->start_work_date;
        } else {
            $this->workers_id = null;
            $this->start_work_date = null;
        }
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

    public function updatedFromDate()
    {
        $this->calculateDifference();
    }

    public function updatedToDate()
    {
        $this->calculateDifference();
    }


    public function calculateDifference()
    {
        if ($this->from_date && $this->to_date) {
            $from_date = Carbon::createFromFormat('d-m-Y', $this->from_date);
            $to_date = Carbon::createFromFormat('d-m-Y', $this->to_date);
            $diff = $to_date->diff($from_date);

            $this->days = $diff->days;  // الفرق بالأيام
            $this->months = $diff->m;   // الفرق بالأشهر
            $this->years = $diff->y;    // الفرق بالسنوات
        }
    }

    public function render()
    {
        $serviceSearch = '%' . $this->serviceSearch . '%';
        $Services = Services::where('user_id', 'LIKE', $serviceSearch)
            ->orWhere('workers_id', 'LIKE', $serviceSearch)
            ->orWhere('service_type', 'LIKE', $serviceSearch)
            ->orWhere('administrative_order_number', 'LIKE', $serviceSearch)
            ->orWhere('administrative_order_date', 'LIKE', $serviceSearch)
            ->orWhere('from_date', 'LIKE', $serviceSearch)
            ->orWhere('to_date', 'LIKE', $serviceSearch)
            ->orWhere('in_service_salary', 'LIKE', $serviceSearch)
            ->orWhere('certificates_id', 'LIKE', $serviceSearch)
            ->orWhere('calculation_order_number', 'LIKE', $serviceSearch)
            ->orWhere('calculation_order_date', 'LIKE', $serviceSearch)
            ->orWhere('purpose', 'LIKE', $serviceSearch)
            ->orWhere('job_title_deletion', 'LIKE', $serviceSearch)
            ->orWhere('job_title_introduction', 'LIKE', $serviceSearch)


            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Services;
        $this->Services = collect($Services->items());
        return view('livewire.services.service', [
            'links' => $links
        ]);
    }

    public function AddserviceModalShow()
    {
        $this->reset(['workers_id', 'service_type', 'administrative_order_number', 'administrative_order_date', 'from_date', 'to_date', 'in_service_salary', 'certificates_id', 'calculation_order_number', 'calculation_order_date', 'purpose', 'job_title_deletion', 'job_title_introduction']);
        $this->resetValidation();
        $this->dispatchBrowserEvent('serviceModalShow');
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'workers_id' => 'required',
            'service_type' => 'required',
            'administrative_order_number' => 'required',
            'administrative_order_date' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'in_service_salary' => 'required',
            'certificates_id' => 'required',
            'calculation_order_number' => 'required',
            'calculation_order_date' => 'required',
            'purpose' => 'required',
            'job_title_deletion' => 'required',
            'job_title_introduction' => 'required',

        ], [
            'workers_id.required' => 'حقل اسم الموظف مطلوب',
            'service_type.required' => 'حقل نوع الخدمة مطلوب',
            'administrative_order_number.required' => 'حقل رقم امر الاداري مطلوب',
            'administrative_order_date.required' => 'حقل تاريخ امر الاداري مطلوب',
            'from_date.required' => 'حقل من تاريخ مطلوب',
            'to_date.required' => 'حقل الى تاريخ مطلوب',
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
            'workers_id' => $this->workers_id,
            'service_type' => $this->service_type,
            'administrative_order_number' => $this->administrative_order_number,
            'administrative_order_date' => $this->administrative_order_date,
            'from_date' => $this->from_date,
            'to_date' => $this->to_date,
            'in_service_salary' => $this->in_service_salary,
            'certificates_id' => $this->certificates_id,
            'calculation_order_number' => $this->calculation_order_number,
            'calculation_order_date' => $this->calculation_order_date,
            'purpose' => $this->purpose,
            'job_title_deletion' => $this->job_title_deletion,
            'job_title_introduction' => $this->job_title_introduction,

        ]);
        $this->reset(['workers_id', 'service_type', 'administrative_order_number', 'administrative_order_date', 'from_date', 'to_date', 'in_service_salary', 'certificates_id', 'calculation_order_number', 'calculation_order_date', 'purpose', 'job_title_deletion', 'job_title_introduction']);
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function Getservice($serviceId)
    {
        $this->resetValidation();

        $this->service  = Services::find($serviceId);
        $this->serviceId = $this->service->id;
        $this->user_id = $this->service->user_id;
        $this->workers_id = $this->service->workers_id;
        $this->service_type = $this->service->service_type;
        $this->administrative_order_number = $this->service->administrative_order_number;
        $this->administrative_order_date = $this->service->administrative_order_date;
        $this->from_date = $this->service->from_date;
        $this->to_date = $this->service->to_date;
        $this->in_service_salary = $this->service->in_service_salary;
        $this->certificates_id = $this->service->certificates_id;
        $this->calculation_order_number = $this->service->calculation_order_number;
        $this->calculation_order_date = $this->service->calculation_order_date;
        $this->purpose = $this->service->purpose;
        $this->job_title_deletion = $this->service->job_title_deletion;
        $this->job_title_introduction = $this->service->job_title_introduction;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'workers_id' => 'required:services',
            'service_type' => 'required:services',
            'administrative_order_number' => 'required:services',
            'administrative_order_date' => 'required:services',
            'from_date' => 'required:services',
            'to_date' => 'required:services',
            'in_service_salary' => 'required:services',
            'certificates_id' => 'required:services',
            'calculation_order_number' => 'required:services',
            'calculation_order_date' => 'required:services',
            'purpose' => 'required:services',
            'job_title_deletion' => 'required:services',
            'job_title_introduction' => 'required:services',

        ], [
            'workers_id.required' => 'حقل اسم الموظف مطلوب',
            'service_type.required' => 'حقل نوع الخدمة مطلوب',
            'administrative_order_number.required' => 'حقل رقم امر الاداري مطلوب',
            'administrative_order_date.required' => 'حقل تاريخ امر الاداري مطلوب',
            'from_date.required' => 'حقل من تاريخ مطلوب',
            'to_date.required' => 'حقل الى تاريخ مطلوب',
            'in_service_salary.required' => 'حقل الراتب خلال المدة مطلوب',
            'certificates_id.required' => 'حقل الشهادة مطلوب',
            'calculation_order_number.required' => 'حقل رقم امر الاحتساب مطلوب',
            'calculation_order_date.required' => 'حقل تاريخ امر الاحتساب مطلوب',
            'purpose.required' => 'حقل الغرض مطلوب',
            'job_title_deletion.required' => 'حقل العنوان الوظيفي الحذف مطلوب',
            'job_title_introduction.required' => 'حقل العنوان الوظيفي الاستحداث مطلوب',
        ]);

        $Services = Services::find($this->serviceId);
        $Services->update([
            'user_id' => Auth::User()->id,
            'workers_id' => $this->workers_id,
            'service_type' => $this->service_type,
            'administrative_order_number' => $this->administrative_order_number,
            'administrative_order_date' => $this->administrative_order_date,
            'from_date' => $this->from_date,
            'to_date' => $this->to_date,
            'in_service_salary' => $this->in_service_salary,
            'certificates_id' => $this->certificates_id,
            'calculation_order_number' => $this->calculation_order_number,
            'calculation_order_date' => $this->calculation_order_date,
            'job_title_deletion' => $this->job_title_deletion,
            'job_title_introduction' => $this->job_title_introduction,

        ]);
        $this->reset(['workers_id', 'service_type', 'administrative_order_number', 'administrative_order_date', 'from_date', 'to_date', 'in_service_salary', 'certificates_id', 'calculation_order_number', 'calculation_order_date', 'purpose', 'job_title_deletion', 'job_title_introduction']);
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Services = Services::find($this->serviceId);

        if ($Services) {

            $Services->delete();
            $this->reset(['workers_id', 'service_type', 'administrative_order_number', 'administrative_order_date', 'from_date', 'to_date', 'in_service_salary', 'certificates_id', 'calculation_order_number', 'calculation_order_date', 'purpose', 'job_title_deletion', 'job_title_introduction']);
            $this->dispatchBrowserEvent('success', [
                'message' => 'تم حذف البيانات بنجاح',
                'title' => 'الحذف'
            ]);
        }
    }
}

<?php

namespace App\Http\Livewire\Services;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\Workers\Workers;
use App\Models\Services\Services;
use Illuminate\Support\Facades\Auth;

class service extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Services = [];
    public $workers = [];
    public $serviceSearch, $service, $serviceId;
    public $user_id, $workers_id, $service_type, $administrative_order_number, $administrative_order_date, $from_date, $to_date, $in_service_salary, $calculation_order_number, $calculation_order_date, $job_title_deletion, $job_title_introduction;


    protected $listeners = [
        'SelectWorkerId',
    ];
    public function hydrate()
    {
        $this->emit('select2');
        $this->emit('flatpickr');
    }
    public function mount()
    {
        $this->workers = Workers::all();
    }
    public function SelectWorkersId($WorkersIdID)
    {
        $workers_id = Workers::find($WorkersIdID);
        if ($workers_id) {
            $this->workers_id = $WorkersIdID;
        } else {
            $this->workers_id = null;
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
            ->orWhere('calculation_order_number', 'LIKE', $serviceSearch)
            ->orWhere('calculation_order_date', 'LIKE', $serviceSearch)
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
        $this->reset(['workers_id','service_type','administrative_order_number','administrative_order_date','from_date','to_date','in_service_salary','calculation_order_number','calculation_order_date','job_title_deletion','job_title_introduction']);
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
            'calculation_order_number' => 'required',
            'calculation_order_date' => 'required',
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
            'calculation_order_number.required' => 'حقل رقم امر الاحتساب مطلوب',
            'calculation_order_date.required' => 'حقل تاريخ امر الاحتساب مطلوب',
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
            'calculation_order_number' => $this->calculation_order_number,
            'calculation_order_date' => $this->calculation_order_date,
            'job_title_deletion' => $this->job_title_deletion,
            'job_title_introduction' => $this->job_title_introduction,

        ]);
        $this->reset(['workers_id','service_type','administrative_order_number','administrative_order_date','from_date','to_date','in_service_salary','calculation_order_number','calculation_order_date','job_title_deletion','job_title_introduction']);
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
        $this->calculation_order_number = $this->service->calculation_order_number;
        $this->calculation_order_date = $this->service->calculation_order_date;
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
            'calculation_order_number' => 'required:services',
            'calculation_order_date' => 'required:services',
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
            'calculation_order_number.required' => 'حقل رقم امر الاحتساب مطلوب',
            'calculation_order_date.required' => 'حقل تاريخ امر الاحتساب مطلوب',
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
            'calculation_order_number' => $this->calculation_order_number,
            'calculation_order_date' => $this->calculation_order_date,
            'job_title_deletion' => $this->job_title_deletion,
            'job_title_introduction' => $this->job_title_introduction,

        ]);
        $this->reset(['workers_id','service_type','administrative_order_number','administrative_order_date','from_date','to_date','in_service_salary','calculation_order_number','calculation_order_date','job_title_deletion','job_title_introduction']);
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
            $this->reset(['workers_id','service_type','administrative_order_number','administrative_order_date','from_date','to_date','in_service_salary','calculation_order_number','calculation_order_date','job_title_deletion','job_title_introduction']);
            $this->dispatchBrowserEvent('success', [
                'message' => 'تم حذف البيانات بنجاح',
                'title' => 'الحذف'
            ]);
        }
    }
}

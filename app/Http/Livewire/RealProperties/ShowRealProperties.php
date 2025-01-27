<?php

namespace App\Http\Livewire\RealProperties;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Plots\Plots;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use App\Models\Provinces\Provinces;
use App\Models\Realities\Realities;
use Illuminate\Support\Facades\Auth;
use App\Models\RealProperty\BuyerTenant;
use App\Models\Governorates\Governorates;
use App\Models\Propertytypes\Propertytypes;
use App\Models\RealProperty\SaleTenantReceipts;
use App\Models\RealProperty\RealEstateBondsSaleRental;

class ShowRealProperties extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Plotid, $Provinceid;

    public $Realities = [];
    public $Realitie;
    public $Plot, $Province, $province_number, $province_name, $plot_number;
    public $governorates = [];
    public $propertytypes = [];
    public $Districts = [];
    public $branches = [];
    public $province_id, $plot_id, $property_number, $area_in_meters, $area_in_olok, $area_in_donum, $count, $date, $volume_number, $bond_type, $ownership, $property_type, $governorate, $district, $mortgage_notes, $registered_office, $specialized_department, $notes;
    public $filePreview, $property_deed_image, $previewRealitieDeedImage;
    public $BuyerTenant, $buyer, $tenant, $chooseBuyerTenant, $buyer_tenant_name, $buyer_calculator_number, $buyer_tenant_phone_number, $buyer_tenant_email, $buyer_tenant_type, $buyer_tenant_notes;
    public $from_date, $to_date, $number_of_months, $insurance_amount, $sale_amount, $net_amount, $monthly_amount, $real_estate_status, $company_department_email, $alert_duration, $real_estate_statement, $real_estate_bonds_number, $buyer_tenant_calculator_number;
    public $receipt_number, $receipt_date, $receipt_payer_name, $receipt_payment_amount, $receipt_from_date, $receipt_to_date, $receipt_attach, $receipt_notes;
    public $notifications = 0;
    public $visibility = 'false';
    public $search = ['property_number' => '', 'count' => '', 'mortgage_notes' => '', 'volume_number' => '', 'visibility' => '',];

    protected $listeners = [
        'SelectFromDate',
        'SelectToDate',
        'SelectGovernorate',
        'SelectDistrict',
        'SelectPropertyType',
        'SelectReceiptDate'
    ];

    public function hydrate()
    {
        $this->emit('select2');
        $this->emit('flatpickr');
    }

    public function mount()
    {
        // جلب بيانات المقاطعة والقطعة
        $this->Plot = Plots::with('GetProvinces')->find($this->Plotid);

        if ($this->Plot) {
            $this->Province = $this->Plot->GetProvinces;
            $this->province_number = $this->Province->province_number ?? '';
            $this->province_name = $this->Province->province_name ?? '';
            $this->plot_number = $this->Plot->plot_number ?? '';
        }

        $this->governorates = Governorates::all();
        $this->propertytypes = Propertytypes::all();

        $this->Province = Provinces::find($this->Provinceid);
        if ($this->Province) {
            $section = $this->Province->Getsection;
            if ($section) {
                $this->branches = $section->GetBranch;
            }
        }
    }

    public function render()
    {
        $searchPropertyNumber = '%' . $this->search['property_number'] . '%';
        $searchCount = '%' . $this->search['count'] . '%';
        $searchMortgageNotes = $this->search['mortgage_notes'];
        $searchVolumeNumber = '%' . $this->search['volume_number'] . '%';
        $searchVisibility = $this->search['visibility'];

        $Realities = Realities::query()
            ->where('plot_id', $this->Plotid)
            ->when($this->search['property_number'], function ($query) use ($searchPropertyNumber) {
                $query->where('property_number', 'LIKE', $searchPropertyNumber);
            })
            ->when($this->search['count'], function ($query) use ($searchCount) {
                $query->where('count', 'LIKE', $searchCount);
            })
            ->when($this->search['mortgage_notes'], function ($query) use ($searchMortgageNotes) {
                $query->where('mortgage_notes', $searchMortgageNotes);
            })
            ->when($this->search['volume_number'], function ($query) use ($searchVolumeNumber) {
                $query->where('volume_number', 'LIKE', $searchVolumeNumber);
            })
            ->when($this->search['visibility'] !== '', function ($query) use ($searchVisibility) {
                $query->where('visibility', $searchVisibility);
            })
            ->orderBy('id', 'ASC')
            ->paginate(10);

        $links = $Realities;
        $this->Realities = collect($Realities->items());

        return view('livewire.real-properties.show-real-properties', [
            'links' => $links,
            'Realities' => $Realities,
        ]);
    }

    public function addRealProperty()
    {
        $this->reset('province_id', 'plot_id', 'property_number', 'area_in_meters', 'area_in_olok', 'area_in_donum', 'count', 'date', 'volume_number', 'bond_type', 'ownership', 'property_type', 'governorate', 'district', 'mortgage_notes', 'registered_office', 'specialized_department', 'property_deed_image', 'notes', 'visibility');
        $this->resetValidation();
        $this->dispatchBrowserEvent('addRealPropertyModal');
    }

    public function chooseBuyerTenant($value)
    {
        $this->chooseBuyerTenant = $value;
    }

    //من تاريخ
    public function SelectFromDate($FromDate)
    {
        $this->from_date = $FromDate;
        $this->NumberOfMonths();
    }
    //الى تاريخ
    public function SelectToDate($ToDate)
    {
        $this->to_date = $ToDate;
        $this->NumberOfMonths();
    }

    //  حساب عدد الاشهر
    public function NumberOfMonths()
    {
        if($this->from_date && $this->to_date)
        {
            $FromDate = Carbon::parse($this->from_date);
            $ToDate = Carbon::parse($this->to_date);

            $Months = $FromDate->diffInMonths($ToDate);

            //  مع مراعات الايام
            if ($FromDate->copy()->addMonths($Months)->lt($ToDate)) {
                $Months++;
            }
            $this->number_of_months = $Months;
        }
    }

    public function percentAmount()
    {
        if($this->insurance_amount && $this->sale_amount && ($this->sale_amount > $this->insurance_amount))
        {
            $Percent_5 = ($this->sale_amount - $this->insurance_amount) * 0.05;
            $Percent_2 = $Percent_5 * 0.02;
            $this->net_amount = ceil(($this->sale_amount - $Percent_5) / 20);
            $this->monthly_amount = ceil($this->net_amount / 12);
        }elseif($this->sale_amount <= $this->insurance_amount){
            $this->net_amount = 0;
            $this->monthly_amount = 0;
        }
    }

    public function Visibility()
    {
        if(!$this->notifications)
        {
            $this->notifications = 1;
        }else{
            $this->notifications = 0;
        }
    }

    //المحافظة
    public function SelectGovernorate($GovernorateID)
    {
        $this->governorate = $GovernorateID;
        $Governorate = Governorates::find($GovernorateID);
        $this->Districts = $Governorate->GetDistrict;
        $this->reset('district');
    }

    //الاقضية
    public function SelectDistrict($DistrictID)
    {
        $this->district = $DistrictID;
    }

    //نوع السند
    public function SelectPropertyType($PropertyTypeID)
    {
        $property_type = Propertytypes::find($PropertyTypeID);
        if ($property_type) {
            $this->property_type = $PropertyTypeID;
        } else {
            $this->property_type = null;
        }
    }

    //تاريخ الوصل
    public function SelectReceiptDate($receiptDate)
    {
        $this->receipt_date = $receiptDate;
    }

    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'property_number' => [
                'required',
                Rule::unique('realities')->where(function ($query) {
                    return $query->where('plot_id', $this->Plotid);
                }),
            ],
            'area_in_meters' => 'required',
            'area_in_olok' => 'required',
            'area_in_donum' => 'required',
            'count' => 'required',
            'date' => 'required',
            'volume_number' => 'required',
            'bond_type' => 'required',
            'ownership' => 'required',
            'property_type' => 'required',
            'governorate' => 'required',
            'district' => 'required',
            'mortgage_notes' => 'required',
            'registered_office' => 'required',
            'property_deed_image' => 'required|file|mimes:jpeg,png,jpg,pdf|max:1024',

        ], [
            'property_number.required' => 'حقل رقم العقار مطلوب',
            'property_number.unique' => 'رقم العقار موجود مسبقًا ضمن هذه القطعة',
            'area_in_meters.required' => 'حقل المساحة بالمتر مطلوب',
            'area_in_olok.required' => 'حقل المساحة بالأولك مطلوب',
            'area_in_donum.required' => 'حقل المساحة بالدونم مطلوب',
            'count.required' => 'حقل العدد مطلوب',
            'date.required' => 'حقل التاريخ مطلوب',
            'volume_number.required' => 'حقل رقم الجلد مطلوب',
            'bond_type.required' => 'حقل نوع السند مطلوب',
            'ownership.required' => 'حقل العائدية مطلوب',
            'property_type.required' => 'حقل جنس العقار مطلوب',
            'governorate.required' => 'حقل المحافظة مطلوب',
            'district.required' => 'حقل القضاء مطلوب',
            'mortgage_notes.required' => 'حقل إشارات التأمينات مطلوب',
            'registered_office.required' => 'حقل الدائرة المسجل لديها مطلوب',
            'specialized_department.required' => 'حقل الشعبة المختصة مطلوب',
            'property_deed_image.required' => 'ملف السند العقاري مطلوب.',
            'property_deed_image.max' => 'يجب ألا يزيد حجم ملف السند العقاري عن 1024 كيلوبايت.',
            'property_deed_image.mimes' => 'الملف ليس صورة أو PDF',
        ]);

        $plot = Plots::find($this->Plotid);
        $province_id = $plot->province_id;
        $this->property_deed_image->store('public/Realities/' . $this->Province->province_number . '/' . $this->plot_number . '/' . $this->property_number);

        Realities::create([
            'user_id' => Auth::User()->id,
            'province_id' => $province_id,
            'plot_id' => $this->Plotid,
            'property_number' => $this->property_number,
            'area_in_meters' => $this->area_in_meters,
            'area_in_olok' => $this->area_in_olok,
            'area_in_donum' => $this->area_in_donum,
            'count' => $this->count,
            'date' => $this->date,
            'volume_number' => $this->volume_number,
            'bond_type' => $this->bond_type,
            'ownership' => $this->ownership,
            'property_type' => $this->property_type,
            'governorate' => $this->governorate,
            'district' => $this->district,
            'mortgage_notes' => $this->mortgage_notes,
            'registered_office' => $this->registered_office,
            'specialized_department' => $this->specialized_department,
            'property_deed_image' => $this->property_deed_image->hashName(),
            'notes' => $this->notes,
            'visibility' => $this->visibility,

        ]);
        $this->reset('property_number', 'area_in_meters', 'area_in_olok', 'area_in_donum', 'count', 'date', 'volume_number', 'bond_type', 'ownership', 'property_type', 'governorate', 'district', 'mortgage_notes', 'registered_office', 'specialized_department', 'property_deed_image', 'notes', 'visibility');
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetRealProperty($RealitieId)
    {
        $this->reset('property_number', 'area_in_meters', 'area_in_olok', 'area_in_donum', 'count', 'date', 'volume_number', 'bond_type', 'ownership', 'property_type', 'governorate', 'district', 'mortgage_notes', 'registered_office', 'specialized_department', 'property_deed_image', 'filePreview', 'notes', 'visibility');
        $this->resetValidation();
        $this->dispatchBrowserEvent('editRealitieModalShow');

        $this->Realitie  = Realities::find($RealitieId);
        $this->property_number = $this->Realitie->property_number;
        $this->area_in_meters = $this->Realitie->area_in_meters;
        $this->area_in_olok = $this->Realitie->area_in_olok;
        $this->area_in_donum = $this->Realitie->area_in_donum;
        $this->count = $this->Realitie->count;
        $this->date = $this->Realitie->date;
        $this->volume_number = $this->Realitie->volume_number;
        $this->bond_type = $this->Realitie->bond_type;
        $this->ownership = $this->Realitie->ownership;
        $this->property_type = $this->Realitie->property_type;
        $this->governorate = $this->Realitie->governorate;
        $this->district = $this->Realitie->district;
        $this->mortgage_notes = $this->Realitie->mortgage_notes;
        $this->registered_office = $this->Realitie->registered_office;
        $this->specialized_department = $this->Realitie->specialized_department;
        $this->previewRealitieDeedImage = $this->Realitie->property_deed_image;
        $this->notes = $this->Realitie->notes;
        $this->visibility = $this->Realitie->visibility;

        $this->reset('chooseBuyerTenant', 'buyer_tenant_name', 'buyer_calculator_number', 'buyer_tenant_phone_number', 'buyer_tenant_email', 'notes');

        $this->BuyerTenant = BuyerTenant::where('property_number', $this->property_number)->first();
    }

    public function SaleTenant()
    {
        $this->resetValidation();
        $Validation = $this->validate([
            /* 'property_number' => [
                'required',
                Rule::unique('realities')->where(function ($query) {
                    return $query->where('plot_id', $this->Plotid);
                }),
            ], */
            'buyer_tenant_name' => 'required',
            'buyer_calculator_number' => 'required',
            'buyer_tenant_phone_number' => 'required',
            'buyer_tenant_email' => 'required',
        ], [
            'buyer_tenant_name.required' => 'أسم المشتري أو المستأجر مطلوب',
            'buyer_calculator_number.required' => 'رقم الحاسبة للمشتري مطلوب',
            'buyer_tenant_phone_number.required' => 'رقم هاتف المشتري أو المستأجر مطلوب',
            'buyer_tenant_email.required' => 'البريد الالكتروني للمشتري أو المستأجر مطلوب',
        ]);

        $Validation['user_id'] = Auth::User()->id;
        $Validation['property_number'] = $this->property_number;
        $Validation['notes'] = $this->buyer_tenant_notes;
        $Validation['buyer_tenant_type'] = $this->chooseBuyerTenant;

        $BuyerTenant = BuyerTenant::create($Validation);


        $this->resetValidation();
        $Validation = $this->validate([
            /* 'property_number' => [
                'required',
                Rule::unique('realities')->where(function ($query) {
                    return $query->where('plot_id', $this->Plotid);
                }),
            ], */
            'from_date' => 'required',
            'to_date' => 'required',
            'number_of_months' => 'required',
            'insurance_amount' => 'required',
            'sale_amount' => 'required',
            'net_amount' => 'required',
            'monthly_amount' => 'required',
            'alert_duration' => 'required',
            'company_department_email' => 'required',
            'real_estate_status' => 'required',
            'notifications' => 'required',

        ], [
            'from_date.required' => 'رقم السند العقاري مطلوب',
            'to_date.required' => 'أسم المشتري أو المستأجر مطلوب',
            'number_of_months.required' => 'رقم الحاسبة للمشتري أو المستأجر مطلوب',
            'insurance_amount.required' => 'رقم هاتف المشتري أو المستأجر مطلوب',
            'sale_amount.required' => 'بيان العقار مطلوب',
            'net_amount.required' => 'مبلغ التأمين مطلوب',
            'monthly_amount.required' => 'مبلغ الرسو مطلوب',
            'alert_duration.required' => 'المبلغ الصافي	مطلوب',
            'company_department_email.required' => 'حالة العقار مطلوب',
            'real_estate_status.required' => 'الاشعارات مطلوب',
            'notifications.required' => 'الاشعارات مطلوب',
        ]);

        $Validation['user_id'] = Auth::User()->id;
        $Validation['buyer_tenant_id'] = $BuyerTenant->id;
        $Validation['property_number'] = $this->property_number;
        if($this->chooseBuyerTenant == 'buyer'){
            $Validation['real_estate_statement'] = 'مباع';
        }else{
            $Validation['real_estate_statement'] = 'مستأجر';
        }
        $Validation['notes'] = $this->notes;

        RealEstateBondsSaleRental::create($Validation);

        $this->reset('chooseBuyerTenant', 'buyer_tenant_name', 'buyer_calculator_number', 'buyer_tenant_phone_number', 'buyer_tenant_email', 'buyer_tenant_notes');

        $this->reset('from_date', 'to_date', 'property_number', 'company_department_email', 'number_of_months', 'monthly_amount', 'alert_duration',
            'real_estate_statement', 'insurance_amount', 'sale_amount', 'net_amount', 'real_estate_status', 'notifications', 'notes');

        $this->dispatchBrowserEvent('success', [
            'message' => 'تمت الاضافة بنجاح',
            'title' => 'اضافة'
        ]);
    }

    public function ReceiptStore()
    {
        $this->resetValidation();
        $Validation = $this->validate([
            'receipt_number' => 'required',
            'receipt_date' => 'required',
            'receipt_payer_name' => 'required',
            'receipt_payment_amount' => 'required',
            'receipt_from_date' => 'required',
            'receipt_to_date' => 'required',
            //'attach' => 'required',
        ], [
            'receipt_number.required' => 'أسم المشتري أو المستأجر مطلوب',
            'receipt_date.required' => 'أسم المشتري أو المستأجر مطلوب',
            'receipt_payer_name.required' => 'أسم المشتري أو المستأجر مطلوب',
            'receipt_payment_amount.required' => 'أسم المشتري أو المستأجر مطلوب',
            'receipt_from_date.required' => 'أسم المشتري أو المستأجر مطلوب',
            'receipt_to_date.required' => 'أسم المشتري أو المستأجر مطلوب',
            //'attach.required' => 'أسم المشتري أو المستأجر مطلوب',
        ]);

        $Validation['receipt_attach'] = Auth::User()->id;
        $Validation['user_id'] = Auth::User()->id;
        $Validation['buyer_tenant_id'] = $this->BuyerTenant->id;
        $Validation['property_number'] = $this->property_number;
        $Validation['receipt_notes'] = $this->receipt_notes;
        $Validation['receipt_type'] = $this->BuyerTenant->buyer_tenant_type == 'buyer' ? 'بيع':'ايجار';

        SaleTenantReceipts::create($Validation);

        $this->reset('receipt_number', 'receipt_date', 'receipt_payer_name', 'receipt_payment_amount', 'receipt_from_date', 'receipt_to_date', 'notes');

        $this->dispatchBrowserEvent('success', [
            'message' => 'تمت الاضافة بنجاح',
            'title' => 'اضافة'
        ]);
    }



    public function storeBuyerTenant()
    {
        $this->resetValidation();
        $Validation = $this->validate([
            /* 'property_number' => [
                'required',
                Rule::unique('realities')->where(function ($query) {
                    return $query->where('plot_id', $this->Plotid);
                }),
            ], */
            'buyer_tenant_name' => 'required',
            'buyer_calculator_number' => 'required',
            'buyer_tenant_phone_number' => 'required',
            'buyer_tenant_email' => 'required',
        ], [
            'buyer_tenant_name.required' => 'أسم المشتري أو المستأجر مطلوب',
            'buyer_calculator_number.required' => 'رقم الحاسبة للمشتري مطلوب',
            'buyer_tenant_phone_number.required' => 'رقم هاتف المشتري أو المستأجر مطلوب',
            'buyer_tenant_email.required' => 'البريد الالكتروني للمشتري أو المستأجر مطلوب',
        ]);

        $Validation['user_id'] = Auth::User()->id;
        $Validation['property_number'] = $this->property_number;
        $Validation['notes'] = $this->notes;
        $Validation['buyer_tenant_type'] = $this->chooseBuyerTenant;

        BuyerTenant::create($Validation);

        $this->reset('chooseBuyerTenant', 'buyer_tenant_name', 'buyer_calculator_number', 'buyer_tenant_phone_number', 'buyer_tenant_email', 'notes');

        $this->dispatchBrowserEvent('success', [
            'message' => 'تمت الاضافة بنجاح',
            'title' => 'اضافة'
        ]);
    }

    public function sale()
    {
        $this->resetValidation();
        $Validation = $this->validate([
            /* 'property_number' => [
                'required',
                Rule::unique('realities')->where(function ($query) {
                    return $query->where('plot_id', $this->Plotid);
                }),
            ], */
            'from_date' => 'required',
            'to_date' => 'required',
            'number_of_months' => 'required',
            'insurance_amount' => 'required',
            'sale_amount' => 'required',
            'net_amount' => 'required',
            'monthly_amount' => 'required',
            'alert_duration' => 'required',
            'company_department_email' => 'required',
            'real_estate_status' => 'required',
            'notifications' => 'required',

        ], [
            'from_date.required' => 'رقم السند العقاري مطلوب',
            'to_date.required' => 'أسم المشتري أو المستأجر مطلوب',
            'number_of_months.required' => 'رقم الحاسبة للمشتري أو المستأجر مطلوب',
            'insurance_amount.required' => 'رقم هاتف المشتري أو المستأجر مطلوب',
            'sale_amount.required' => 'بيان العقار مطلوب',
            'net_amount.required' => 'مبلغ التأمين مطلوب',
            'monthly_amount.required' => 'مبلغ الرسو مطلوب',
            'alert_duration.required' => 'المبلغ الصافي	مطلوب',
            'company_department_email.required' => 'حالة العقار مطلوب',
            'real_estate_status.required' => 'الاشعارات مطلوب',
            'notifications.required' => 'الاشعارات مطلوب',
        ]);

        $Validation['user_id'] = Auth::User()->id;
        $Validation['buyer_tenant_id'] = $this->BuyerTenant->id;
        $Validation['property_number'] = $this->property_number;
        $Validation['real_estate_statement'] = 'مباع';
        $Validation['notes'] = $this->notes;

        RealEstateBondsSaleRental::create($Validation);

        $this->reset('property_number', 'buyer_tenant_name', 'buyer_tenant_calculator_number', 'buyer_tenant_phone_number', 'buyer_tenant_email', 'company_department_email',
            'real_estate_statement', 'insurance_amount', 'sale_amount', 'net_amount', 'real_estate_status', 'notifications', 'notes');

        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function tenant()
    {
        $this->resetValidation();
        $Validation = $this->validate([
            /* 'property_number' => [
                'required',
                Rule::unique('realities')->where(function ($query) {
                    return $query->where('plot_id', $this->Plotid);
                }),
            ], */
            'from_date' => 'required',
            'to_date' => 'required',
            'number_of_months' => 'required',
            'insurance_amount' => 'required',
            'sale_amount' => 'required',
            'net_amount' => 'required',
            'monthly_amount' => 'required',
            'alert_duration' => 'required',
            'company_department_email' => 'required',
            'real_estate_status' => 'required',
            'notifications' => 'required',

        ], [
            'from_date.required' => 'رقم السند العقاري مطلوب',
            'to_date.required' => 'أسم المشتري أو المستأجر مطلوب',
            'number_of_months.required' => 'رقم الحاسبة للمشتري أو المستأجر مطلوب',
            'insurance_amount.required' => 'رقم هاتف المشتري أو المستأجر مطلوب',
            'sale_amount.required' => 'بيان العقار مطلوب',
            'net_amount.required' => 'مبلغ التأمين مطلوب',
            'monthly_amount.required' => 'مبلغ الرسو مطلوب',
            'alert_duration.required' => 'المبلغ الصافي	مطلوب',
            'company_department_email.required' => 'حالة العقار مطلوب',
            'real_estate_status.required' => 'الاشعارات مطلوب',
            'notifications.required' => 'الاشعارات مطلوب',
        ]);

        $Validation['user_id'] = Auth::User()->id;
        $Validation['buyer_tenant_id'] = $this->BuyerTenant->id;
        $Validation['property_number'] = $this->property_number;
        $Validation['real_estate_statement'] = 'مستأجر';
        $Validation['notes'] = $this->notes;

        RealEstateBondsSaleRental::create($Validation);

        $this->reset('property_number', 'buyer_tenant_name', 'buyer_tenant_calculator_number', 'buyer_tenant_phone_number', 'buyer_tenant_email', 'company_department_email',
            'real_estate_statement', 'insurance_amount', 'sale_amount', 'net_amount', 'real_estate_status', 'notifications', 'notes');

        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }
}


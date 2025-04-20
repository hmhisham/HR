<?php

namespace App\Http\Livewire\RealProperties;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Plots\Plots;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use App\Models\Tracking\Tracking;
use Illuminate\Support\Facades\DB;
use App\Models\Provinces\Provinces;
use App\Models\Realities\Realities;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\RealProperty\BuyerTenant;
use App\Models\Governorates\Governorates;
use App\Models\Propertytypes\Propertytypes;
use App\Models\RealProperty\BuyerTenantFiles;
use App\Models\RealProperty\SaleTenantReceipts;
use App\Models\RealProperty\RealEstateBondsSaleRental;

class ShowRealProperties extends Component
{
  use WithFileUploads;
  use WithPagination;
  protected $paginationTheme = 'bootstrap';

  public $Plotid, $Provinceid;

<<<<<<< HEAD
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
    public $receipt_number, $receipt_date, $receipt_payer_name, $receipt_from_date, $receipt_to_date, $receipt_attach, $receipt_notes, $attachFile;
    public $Percent_2 = 0;
    public $Percent_5 = 0;
    public $notifications = 0;
    public $visibility = 'false';
    public $search = [
        'property_number' => '',
        'count' => '',
        'mortgage_notes' => '',
        'volume_number' => '',
        'buyer_tenant_type' => ''
    ];

    public $receipt_payment_amount = 0; // القيمة المدخلة في الحقل
    public $totalPaid = 0;              // المجموع المدفوع
    public $remainingAmount = 0;        // المتبقي

    // إضافة المتغيرات العامة للملفات
    public $valuation_report_file, $buyer_documents_file;
    public $basra_municipality_statement_file, $governorate_municipality_statement_file;
    public $written_pledge_file, $company_deed_25_file, $official_gazette_file;
    public $bidder_deposits_file, $sales_committee_minutes_file;
    public $payment_receipt_2_percent_file, $property_registration_letter_file;
    public $buyer_deed_23_file;

    protected $listeners = [
        'SelectFromDate',
        'SelectToDate',
        'SelectGovernorate',
        'SelectDistrict',
        'SelectPropertyType',
        'SelectReceiptDate',
        'openUploadFiles',
        'SelectSeceiptDate',
        'SelectReceiptFromDate',
        'SelectReceiptToDate',
        'calculateAmounts'  // إضافة المستمع الجديد
    ];
=======
  public $Realities = [];
  public $Realitie;
  public $Plot, $Province, $province_number, $province_name, $plot_number;
  public $governorates = [];
  public $propertytypes = [];
  public $Districts = [];
  public $branches = [];
  public $province_id, $plot_id, $property_number, $area_in_meters, $area_in_olok, $area_in_donum, $count, $date, $volume_number, $bond_type, $ownership, $property_type, $governorate, $district, $mortgage_notes, $registered_office, $specialized_department, $notes;
  public $filePreview, $property_deed_image, $previewRealitieDeedImage;
  public $BuyerTenant, $buyer, $tenant, $chooseBuyerTenant, $buyer_tenant_name, $buyer_computer_number, $buyer_tenant_phone_number, $buyer_tenant_email, $buyer_tenant_type, $buyer_tenant_notes;
  public $from_date, $to_date, $number_of_months, $insurance_amount, $sale_amount, $net_amount, $monthly_amount, $real_estate_status, $company_department_email, $alert_duration, $real_estate_statement, $real_estate_bonds_number, $buyer_tenant_computer_number;
  public $receipt_number, $receipt_date, $receipt_payer_name, $receipt_payment_amount, $receipt_from_date, $receipt_to_date, $receipt_attach, $receipt_notes, $attachFile;
  public $Percent_2 = 0;
  public $Percent_5 = 0;
  public $notifications = 0;
  public $visibility = 'false';
  public $search = ['property_number' => '', 'count' => '', 'mortgage_notes' => '', 'volume_number' => ''];

  protected $listeners = [
    'SelectFromDate',
    'SelectToDate',
    'SelectGovernorate',
    'SelectDistrict',
    'SelectPropertyType',
    'SelectReceiptDate'
  ];
>>>>>>> 00f11ddd74f76cbca93548f9f3b4de63da9f751c

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

<<<<<<< HEAD
    public function render()
    {
        $searchPropertyNumber = '%' . $this->search['property_number'] . '%';
        $searchMortgageNotes = $this->search['mortgage_notes'];
        $searchBuyerTenantType = $this->search['buyer_tenant_type'];

        $Realities = Realities::query()
            ->where('plot_id', $this->Plotid)
            ->when($this->search['property_number'], function ($query) use ($searchPropertyNumber) {
                $query->where('property_number', 'LIKE', $searchPropertyNumber);
            })
            ->when($this->search['mortgage_notes'], function ($query) use ($searchMortgageNotes) {
                $query->where('mortgage_notes', $searchMortgageNotes);
            })
            ->when($this->search['buyer_tenant_type'], function ($query) use ($searchBuyerTenantType) {
                $query->whereHas('GetBuyerTenant', function ($subQuery) use ($searchBuyerTenantType) {
                    $subQuery->where('buyer_tenant_type', $searchBuyerTenantType);
                });
            })
            ->where('specialized_department', 15)
            ->where('visibility', '1')
            ->orderBy('id', 'ASC')
            ->paginate(10);
=======
  public function render()
  {
    $searchPropertyNumber = '%' . $this->search['property_number'] . '%';
    $searchCount = '%' . $this->search['count'] . '%';
    $searchMortgageNotes = $this->search['mortgage_notes'];
    $searchVolumeNumber = '%' . $this->search['volume_number'] . '%';

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
      ->where('specialized_department', 15)
      ->where('visibility', '1')
      ->orderBy('id', 'ASC')
      ->paginate(10);
>>>>>>> 00f11ddd74f76cbca93548f9f3b4de63da9f751c

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
    if ($this->from_date && $this->to_date) {
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

<<<<<<< HEAD
    public function addRealProperty()
    {
        $this->reset('from_date', 'to_date', 'property_number', 'company_department_email', 'number_of_months', 'monthly_amount', 'alert_duration', 'real_estate_statement', 'insurance_amount', 'sale_amount', 'net_amount', 'real_estate_status', 'notifications', 'notes');
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

    //تاريخ الوصل
    public function SelectReceiptDate($date)
    {
        $this->receipt_date = $date;
    }

    public function SelectReceiptFromDate($date)
    {
        $this->receipt_from_date = $date;
    }

    public function SelectReceiptToDate($date)
    {
        $this->receipt_to_date = $date;
    }

    //  حساب عدد الاشهر
    public function NumberOfMonths()
    {
        if ($this->from_date && $this->to_date) {
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
        // Convert values to float to ensure proper calculation
        $saleAmount = floatval($this->sale_amount);
        $months = intval($this->number_of_months);

        // ذا كان عدد الأشهر يساوي صفر (دفع كامل بدون أقساط)
        if ($months == 0) {
            $this->Percent_5 = 0;
            $this->Percent_2 = $saleAmount * 0.02;
            $this->net_amount = $saleAmount;
            $this->monthly_amount = 0;
        }
        // إذا كان هناك أقساط (دفع مقطوع)
        else {
            $this->Percent_5 = $saleAmount * 0.05;
            $this->Percent_2 = $saleAmount * 0.02;
            //$this->net_amount = ceil($saleAmount - $this->Percent_5);
            $this->net_amount = $saleAmount;
            //$this->monthly_amount = ceil($this->net_amount / $months);
            $this->monthly_amount = 100000;
        }
=======
  /* public function percentAmount()
    {
        if($this->insurance_amount && $this->sale_amount && ($this->sale_amount > $this->insurance_amount))
        {
            $Percent_5 = ($this->sale_amount - $this->insurance_amount) * 0.05;
            $Percent_2 = $Percent_5 * 0.02;
            $this->net_amount = ceil($this->sale_amount - $Percent_5);
            $this->monthly_amount = ceil($this->net_amount / $this->number_of_months);
        }elseif($this->sale_amount <= $this->insurance_amount){
            $this->net_amount = 0;
            $this->monthly_amount = 0;
        }
    } */

  public function percentAmount()
  {
    // ذا كان عدد الأشهر يساوي صفر (دفع كامل بدون أقساط)
    if ($this->number_of_months == 0) {
      $this->Percent_5 = 0; // نسبة 5% من مبلغ الرسو
      $this->Percent_2 = $this->sale_amount * 0.02; // نسبة 2% من مبلغ الرسو
      $this->net_amount = $this->sale_amount; // المبلغ الصافي يساوي مبلغ الرسو
      $this->monthly_amount = 0; // لا يوجد دفع شهري
>>>>>>> 00f11ddd74f76cbca93548f9f3b4de63da9f751c
    }
    // إذا كان هناك أقساط (دفع مقطوع)
    else {
      $this->Percent_5 = $this->sale_amount * 0.05; // نسبة 5% من مبلغ الرسو
      $this->Percent_2 = $this->sale_amount * 0.02; // نسبة 2% من مبلغ الرسو
      $this->net_amount = ceil($this->sale_amount - $this->Percent_5); // المبلغ الصافي بعد خصم Percent_5
      $this->monthly_amount = ceil($this->net_amount / $this->number_of_months); // المبلغ الشهري يتم تقسيمه على عدد الأشهر
    }
  }

  public function Visibility()
  {
    if (!$this->notifications) {
      $this->notifications = 1;
    } else {
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

<<<<<<< HEAD
    public function saveFiles()
    {
        $this->validate([
            'valuation_report_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'buyer_documents_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'basra_municipality_statement_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'governorate_municipality_statement_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'written_pledge_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'company_deed_25_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'official_gazette_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'bidder_deposits_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'sales_committee_minutes_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'payment_receipt_2_percent_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'property_registration_letter_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'buyer_deed_23_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120'
        ], [
            'valuation_report_file.mimes' => 'يجب أن يكون الملف من نوع: pdf, jpg, jpeg, png',
            'valuation_report_file.max' => 'حجم الملف يجب أن لا يتجاوز 5 ميجابايت',
            'buyer_documents_file.mimes' => 'يجب أن يكون الملف من نوع: pdf, jpg, jpeg, png',
            'buyer_documents_file.max' => 'حجم الملف يجب أن لا يتجاوز 5 ميجابايت',
            'basra_municipality_statement_file.mimes' => 'يجب أن يكون الملف من نوع: pdf, jpg, jpeg, png',
            'basra_municipality_statement_file.max' => 'حجم الملف يجب أن لا يتجاوز 5 ميجابايت',
            'governorate_municipality_statement_file.mimes' => 'يجب أن يكون الملف من نوع: pdf, jpg, jpeg, png',
            'governorate_municipality_statement_file.max' => 'حجم الملف يجب أن لا يتجاوز 5 ميجابايت',
            'written_pledge_file.mimes' => 'يجب أن يكون الملف من نوع: pdf, jpg, jpeg, png',
            'written_pledge_file.max' => 'حجم الملف يجب أن لا يتجاوز 5 ميجابايت',
            'company_deed_25_file.mimes' => 'يجب أن يكون الملف من نوع: pdf, jpg, jpeg, png',
            'company_deed_25_file.max' => 'حجم الملف يجب أن لا يتجاوز 5 ميجابايت',
            'official_gazette_file.mimes' => 'يجب أن يكون الملف من نوع: pdf, jpg, jpeg, png',
            'official_gazette_file.max' => 'حجم الملف يجب أن لا يتجاوز 5 ميجابايت',
            'bidder_deposits_file.mimes' => 'يجب أن يكون الملف من نوع: pdf, jpg, jpeg, png',
            'bidder_deposits_file.max' => 'حجم الملف يجب أن لا يتجاوز 5 ميجابايت',
            'sales_committee_minutes_file.mimes' => 'يجب أن يكون الملف من نوع: pdf, jpg, jpeg, png',
            'sales_committee_minutes_file.max' => 'حجم الملف يجب أن لا يتجاوز 5 ميجابايت',
            'payment_receipt_2_percent_file.mimes' => 'يجب أن يكون الملف من نوع: pdf, jpg, jpeg, png',
            'payment_receipt_2_percent_file.max' => 'حجم الملف يجب أن لا يتجاوز 5 ميجابايت',
            'property_registration_letter_file.mimes' => 'يجب أن يكون الملف من نوع: pdf, jpg, jpeg, png',
            'property_registration_letter_file.max' => 'حجم الملف يجب أن لا يتجاوز 5 ميجابايت',
            'buyer_deed_23_file.mimes' => 'يجب أن يكون الملف من نوع: pdf, jpg, jpeg, png',
            'buyer_deed_23_file.max' => 'حجم الملف يجب أن لا يتجاوز 5 ميجابايت',
        ]);

        $buyerTenantFiles = BuyerTenantFiles::firstOrNew([
            'buyer_tenant_id' => $this->BuyerTenant->id,
        ]);

        $fileFields = [
            'valuation_report_file',
            'buyer_documents_file',
            'basra_municipality_statement_file',
            'governorate_municipality_statement_file',
            'written_pledge_file',
            'company_deed_25_file',
            'official_gazette_file',
            'bidder_deposits_file',
            'sales_committee_minutes_file',
            'payment_receipt_2_percent_file',
            'property_registration_letter_file',
            'buyer_deed_23_file'
        ];

        $updates = [];

        foreach ($fileFields as $field) {
            if ($this->$field && $this->$field instanceof \Illuminate\Http\UploadedFile) {
                // Delete old file if exists
                if ($buyerTenantFiles->$field) {
                    Storage::delete('public/Realities/' . $this->province_number . '/' .
                        $this->plot_number . '/' . $this->property_number . '/' .
                        $buyerTenantFiles->$field);
                }

                // Use hashName() for secure file naming
                $fileName = $this->$field->hashName();

                $this->$field->storeAs(
                    'public/Realities/' . $this->province_number . '/' . $this->plot_number . '/' . $this->property_number,
                    $fileName
                );

                $updates[$field] = $fileName;
            }
        }

        if (!empty($updates)) {
            $buyerTenantFiles->fill($updates);
            $buyerTenantFiles->save();
        }

        // =================================
        Tracking::create([
            'user_id' => Auth::id(),
            'page_name' => 'مستندات العقار',
            'operation_type' => 'رفع ملفات',
            'operation_time' => now()->format('Y-m-d H:i:s'),
            'details' => "محضر التثمين: " . ($this->valuation_report_file ? 'تم الرفع' : 'غير موجود') . ' - ' . "\nمستمسكات المشتري: " . ($this->buyer_documents_file ? 'تم الرفع' : 'غير موجود') . ' - ' . "\nبيان عدم استفادة البلدية والبلديات البصرة: " . ($this->basra_municipality_statement_file ? 'تم الرفع' : 'غير موجود') . ' - ' . "\nبيان عدم استفادة البلدية والبلديات مسقط الراس: " . ($this->governorate_municipality_statement_file ? 'تم الرفع' : 'غير موجود') . ' - ' . "\nالاقرار الخطي: " . ($this->written_pledge_file ? 'تم الرفع' : 'غير موجود') . ' - ' . "\nالسند العقاري 25 للشركة: " . ($this->company_deed_25_file ? 'تم الرفع' : 'غير موجود') . ' - ' . "\nاعلان الجريدة الرسمية: " . ($this->official_gazette_file ? 'تم الرفع' : 'غير موجود') . ' - ' . "\nوصولات تامينات المزايدين 5%: " . ($this->bidder_deposits_file ? 'تم الرفع' : 'غير موجود') . ' - ' . "\nمحضر لجنة البيع: " . ($this->sales_committee_minutes_file ? 'تم الرفع' : 'غير موجود') . ' - ' . "\وصل التسديد 2 %: " . ($this->payment_receipt_2_percent_file ? 'تم الرفع' : 'غير موجود') . ' - ' . "\nكتاب تسجيل عقار الى التسجيل العقاري: " . ($this->property_registration_letter_file ? 'تم الرفع' : 'غير موجود') . ' - ' . "\nالسند العقاري 23 باسم المشتري: " . ($this->buyer_deed_23_file ? 'تم الرفع' : 'غير موجود'),
        ]);
        // =================================

        $this->reset('valuation_report_file', 'buyer_documents_file', 'basra_municipality_statement_file', 'governorate_municipality_statement_file', 'written_pledge_file', 'company_deed_25_file', 'official_gazette_file', 'bidder_deposits_file', 'sales_committee_minutes_file', 'payment_receipt_2_percent_file', 'property_registration_letter_file', 'buyer_deed_23_file');
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حفظ الملفات بنجاح',
            'title' => 'حفظ'
        ]);
    }

    private function storeFile($file, $property_number)
    {
        if (!$file) {
            return null;
        }

        $basePath = 'public/Realities/' . $this->province_number . '/' . $this->plot_number . '/' . $property_number;

        // إضافة مجلد فرعي حسب نوع المستخدم
        $path = $basePath . '/' . ($this->BuyerTenant->buyer_tenant_type === 'مشتري' ? 'buyer' : 'tenant');

        if (!Storage::exists($path)) {
            Storage::makeDirectory($path);
        }

        // إنشاء اسم فريد للملف
        $extension = $file->getClientOriginalExtension();
        $fileName = time() . '_' . uniqid() . '.' . $extension;

        return $file->storeAs($path, $fileName);
    }

    private function deleteFile($property_number, $filename)
    {
        if (!$filename) {
            return;
        }

        $basePath = 'public/Realities/' . $this->province_number . '/' . $this->plot_number . '/' . $property_number;
        $path = $basePath . '/' . ($this->BuyerTenant->buyer_tenant_type === 'مشتري' ? 'buyer' : 'tenant') . '/' . $filename;

        Storage::delete($path);
    }

    public function SaleTenant()
    {
        $this->resetValidation();

        if (empty($this->property_number)) {
            $this->dispatchBrowserEvent('error', [
                'message' => 'رقم العقار غير موجود',
                'title' => 'خطأ'
            ]);
            return;
        }

        if (empty($this->chooseBuyerTenant)) {
            $this->dispatchBrowserEvent('error', [
                'message' => 'يرجى اختيار نوع (مشتري/مستأجر)',
                'title' => 'خطأ'
            ]);
            return;
        }

        // اختبار فيما اذا كان المشتري لديه عقار سابق مسجل ام لا
        if ($this->chooseBuyerTenant === 'buyer') {
            $existingBuyer = BuyerTenant::where('buyer_calculator_number', $this->buyer_calculator_number)
                ->where('buyer_tenant_type', 'مشتري')
                ->first();

            if ($existingBuyer) {
                $this->dispatchBrowserEvent('error', [
                    'message' => 'هذا المشتري لديه عقار مسجل مسبقاً',
                    'title' => 'خطأ'
                ]);
                return;
            }
        }

        $this->validate([
            'buyer_tenant_name' => 'required',
            'buyer_calculator_number' => [
                $this->chooseBuyerTenant === 'buyer' ? 'required' : 'nullable',
                Rule::unique('buyer_tenant')->where(function ($query) {
                    return $query->where('property_number', $this->property_number);
                }),
            ],
            //'buyer_tenant_phone_number' => 'required',
            //'buyer_tenant_email' => 'required|email',
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
            'number_of_months' => 'required|numeric|min:0',
            'insurance_amount' => 'required|numeric|min:0',
            'sale_amount' => 'required|numeric|min:0',
            'net_amount' => 'required|numeric|min:0',
            'monthly_amount' => 'required|numeric|min:0',
            'alert_duration' => 'required|numeric|min:0',
            //'company_department_email' => 'required|email',
            'real_estate_status' => 'required',
        ], [
            'buyer_tenant_name.required' => 'أسم المشتري أو المستأجر مطلوب',
            'buyer_calculator_number.required' => 'رقم الحاسبة للمشتري مطلوب',
            'buyer_tenant_phone_number.required' => 'رقم هاتف المشتري أو المستأجر مطلوب',
            'buyer_tenant_email.required' => 'البريد الالكتروني للمشتري أو المستأجر مطلوب',
            'from_date.required' => 'رقم السند العقاري مطلوب',
            'to_date.required' => 'أسم المشتري أو المستأجر مطلوب',
            'number_of_months.required' => 'رقم الحاسبة للمشتري أو المستأجر مطلوب',
            'insurance_amount.required' => 'رقم هاتف المشتري أو المستأجر مطلوب',
            'sale_amount.required' => 'بيان العقار مطلوب',
            'net_amount.required' => 'مبلغ التثمين مطلوب',
            'monthly_amount.required' => 'مبلغ الرسو مطلوب',
            'alert_duration.required' => 'المبلغ الصافي	مطلوب',
            'company_department_email.required' => 'البريد الالكتروني للقسم او الشركة مطلوب',
            'real_estate_status.required' => 'حالة العقار مطلوب',
            'notifications.required' => 'الاشعارات مطلوب',
        ]);

        BuyerTenant::create([
            'user_id' => Auth::user()->id,
            'property_number' => $this->property_number,
            'buyer_tenant_name' => $this->buyer_tenant_name,
            'buyer_calculator_number' => $this->chooseBuyerTenant === 'buyer' ? $this->buyer_calculator_number : null,
            'buyer_tenant_phone_number' => $this->buyer_tenant_phone_number,
            'buyer_tenant_email' => $this->buyer_tenant_email,
            'from_date' => $this->from_date,
            'to_date' => $this->to_date,
            'number_of_months' => $this->number_of_months,
            'insurance_amount' => $this->insurance_amount,
            'sale_amount' => $this->sale_amount,
            'net_amount' => $this->net_amount,
            'monthly_amount' => $this->monthly_amount,
            'alert_duration' => $this->alert_duration,
            'company_department_email' => $this->company_department_email,
            'notifications' => $this->notifications ? 1 : 0,
            'notes' => $this->buyer_tenant_notes,
            'buyer_tenant_type' => $this->chooseBuyerTenant == 'buyer' ? 'مشتري' : 'مستأجر',
        ]);

        Realities::where('property_number', $this->property_number)
            ->update(['mortgage_notes' => $this->real_estate_status]);

        // =================================
        Tracking::create([
            'user_id' => Auth::id(),
            'page_name' => 'عمليات الشراء/الإيجار',
            'operation_type' => 'إضافة',
            'operation_time' => now()->format('Y-m-d H:i:s'),
            'details' => "نوع العملية: " . ($this->chooseBuyerTenant === 'buyer' ? 'مشتري' : 'مستأجر') . ' - ' . "\nاسم المشتري/المستأجر: " . $this->buyer_tenant_name . ' - ' . "\nرقم الحاسبة: " . $this->buyer_calculator_number . ' - ' . "\nرقم الهاتف: " . $this->buyer_tenant_phone_number . ' - ' . "\nالبريد الإلكتروني: " . $this->buyer_tenant_email . ' - ' . "\nرقم العقار: " . $this->property_number . ' - ' . "\nمن تاريخ: " . $this->from_date . ' - ' . "\nإلى تاريخ: " . $this->to_date . ' - ' . "\nعدد الأشهر: " . $this->number_of_months . ' - ' . "\nمبلغ التأمين: " . $this->insurance_amount . ' - ' . "\nمبلغ البيع: " . $this->sale_amount . ' - ' . "\nالمبلغ الصافي: " . $this->net_amount . ' - ' . "\nالمبلغ الشهري: " . $this->monthly_amount . ' - ' . "\nمدة التنبيه: " . $this->alert_duration . ' - ' . "\nبريد الشركة/القسم: " . $this->company_department_email . ' - ' . "\nحالة العقار: " . $this->real_estate_status . ' - ' . "\nالإشعارات: " . $this->notifications,
        ]);
        // =================================

        $this->reset('buyer_tenant_name', 'buyer_calculator_number', 'buyer_tenant_phone_number', 'buyer_tenant_email', 'from_date', 'to_date', 'number_of_months', 'insurance_amount', 'sale_amount', 'net_amount', 'monthly_amount', 'alert_duration', 'company_department_email', 'real_estate_status');

        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetRealProperty($RealitieId)
    {
        $this->reset('buyer_tenant_name', 'buyer_calculator_number', 'buyer_tenant_phone_number', 'buyer_tenant_email', 'from_date', 'to_date', 'number_of_months', 'insurance_amount', 'sale_amount', 'net_amount', 'monthly_amount', 'alert_duration', 'company_department_email', 'real_estate_status');

        $this->resetValidation();
        $this->dispatchBrowserEvent('editRealitieModalShow');
=======
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
>>>>>>> 00f11ddd74f76cbca93548f9f3b4de63da9f751c

    $this->reset('chooseBuyerTenant', 'buyer_tenant_name', 'buyer_computer_number', 'buyer_tenant_phone_number', 'buyer_tenant_email', 'notes');
    $this->reset('receipt_number', 'receipt_date', 'receipt_payer_name', 'receipt_payment_amount', 'receipt_from_date', 'receipt_to_date', 'attachFile');

<<<<<<< HEAD

        $this->BuyerTenant = BuyerTenant::where('property_number', $this->property_number)->first();
        if ($this->BuyerTenant) {
            $this->buyer_tenant_name = $this->BuyerTenant->buyer_tenant_name;
            $this->buyer_calculator_number = $this->BuyerTenant->buyer_calculator_number;
            $this->buyer_tenant_phone_number = $this->BuyerTenant->buyer_tenant_phone_number;
            $this->buyer_tenant_email = $this->BuyerTenant->buyer_tenant_email;
            $this->insurance_amount = $this->BuyerTenant->insurance_amount;
            $this->buyer_tenant_notes = $this->BuyerTenant->notes;
            $this->sale_amount = $this->BuyerTenant->sale_amount;
            $saleAmount = floatval($this->sale_amount);
            $this->Percent_2 = $saleAmount * 0.02;
            $this->Percent_5 = $this->number_of_months > 0 ? $saleAmount * 0.05 : 0;
            $this->net_amount = $this->BuyerTenant->net_amount;
            $this->monthly_amount = $this->BuyerTenant->monthly_amount;
            $this->alert_duration = $this->BuyerTenant->alert_duration;
            $this->company_department_email = $this->BuyerTenant->company_department_email;
            $this->real_estate_status = $this->Realitie->mortgage_notes;
            $this->notifications = $this->BuyerTenant->notifications;
            $this->from_date = $this->BuyerTenant->from_date;
            $this->to_date = $this->BuyerTenant->to_date;
            $this->number_of_months = $this->BuyerTenant->number_of_months;
            $this->buyer_tenant_type = $this->BuyerTenant->buyer_tenant_type;
            if ($this->buyer_tenant_type == 'مشتري') {
                $this->chooseBuyerTenant = 'buyer';
            } else {
                $this->chooseBuyerTenant = 'tenant';
            }

            $this->totalPaid = SaleTenantReceipts::where('buyer_tenant_id', $this->BuyerTenant->id)
                ->sum('receipt_payment_amount');
            $this->remainingAmount = $this->BuyerTenant->net_amount - $this->totalPaid;
        } else {
            $this->buyer_tenant_name = '';
            $this->buyer_calculator_number = '';
            $this->buyer_tenant_phone_number = '';
            $this->buyer_tenant_email = '';
            $this->insurance_amount = '';
            $this->buyer_tenant_notes = '';
            $this->sale_amount = '';
            $this->Percent_2 = 0;
            $this->Percent_5 = 0;
            $this->net_amount = '';
            $this->monthly_amount = '';
            $this->alert_duration = '';
            $this->company_department_email = '';
            $this->real_estate_status = '';
            $this->notifications = '';
            $this->number_of_months = '';
            $this->buyer_tenant_type = '';
        }

        $this->calculateAmounts();
    }

    public function UpdateSaleTenant()
    {
        $this->resetValidation();
        $Validation = $this->validate([
            'buyer_tenant_name' => 'required',
            'buyer_calculator_number' => [
                $this->chooseBuyerTenant === 'buyer' ? 'required' : 'nullable',
                Rule::unique('buyer_tenant')->where(function ($query) {
                    return $query->where('property_number', $this->property_number);
                })->ignore($this->BuyerTenant->id ?? null),
            ],
            'buyer_tenant_phone_number' => 'required',
            'buyer_calculator_number.required' => 'رقم الحاسبة للمشتري مطلوب',
            //'buyer_tenant_phone_number.required' => 'رقم هاتف المشتري أو المستأجر مطلوب',
            //'buyer_tenant_email.required' => 'البريد الالكتروني للمشتري أو المستأجر مطلوب',
            'from_date.required' => 'رقم السند العقاري مطلوب',
            'to_date.required' => 'أسم المشتري أو المستأجر مطلوب',
            'number_of_months.required' => 'رقم الحاسبة للمشتري أو المستأجر مطلوب',
            'insurance_amount.required' => 'رقم هاتف المشتري أو المستأجر مطلوب',
            'sale_amount.required' => 'بيان العقار مطلوب',
            'net_amount.required' => 'مبلغ التثمين مطلوب',
            'monthly_amount.required' => 'مبلغ الرسو مطلوب',
            'alert_duration.required' => 'المبلغ الصافي	مطلوب',
            //'company_department_email.required' => 'البريد الالكتروني للقسم او الشركة مطلوب',
            'real_estate_status.required' => 'حالة العقار مطلوب',
            'notifications.required' => 'الاشعارات مطلوب',
        ]);

        unset($Validation['real_estate_status']);

        $Validation['user_id'] = Auth::User()->id;
        $Validation['property_number'] = $this->property_number;
        $Validation['notes'] = $this->buyer_tenant_notes;
        $Validation['buyer_tenant_type'] = $this->buyer_tenant_type;

        $this->BuyerTenant->update($Validation);

        Realities::where('property_number', $this->property_number)
            ->update(['mortgage_notes' => $this->real_estate_status]);

        // =================================
        Tracking::create([
            'user_id' => Auth::id(),
            'page_name' => 'عمليات الشراء/الإيجار',
            'operation_type' => 'إضافة',
            'operation_time' => now()->format('Y-m-d H:i:s'),
            'details' => "نوع العملية: " . ($this->chooseBuyerTenant === 'buyer' ? 'مشتري' : 'مستأجر') . ' - ' . "\nاسم المشتري/المستأجر: " . $this->buyer_tenant_name . ' - ' . "\nرقم الحاسبة: " . $this->buyer_calculator_number . ' - ' . "\nرقم الهاتف: " . $this->buyer_tenant_phone_number . ' - ' . "\nالبريد الإلكتروني: " . $this->buyer_tenant_email . ' - ' . "\nرقم العقار: " . $this->property_number . ' - ' . "\nمن تاريخ: " . $this->from_date . ' - ' . "\nإلى تاريخ: " . $this->to_date . ' - ' . "\nعدد الأشهر: " . $this->number_of_months . ' - ' . "\nمبلغ التأمين: " . $this->insurance_amount . ' - ' . "\nمبلغ البيع: " . $this->sale_amount . ' - ' . "\nالمبلغ الصافي: " . $this->net_amount . ' - ' . "\nالمبلغ الشهري: " . $this->monthly_amount . ' - ' . "\nمدة التنبيه: " . $this->alert_duration . ' - ' . "\nبريد الشركة/القسم: " . $this->company_department_email . ' - ' . "\nحالة العقار: " . $this->real_estate_status . ' - ' . "\nالإشعارات: " . $this->notifications,
        ]);
        // =================================

        $this->reset('buyer_tenant_name', 'buyer_calculator_number', 'buyer_tenant_phone_number', 'buyer_tenant_email', 'from_date', 'to_date', 'number_of_months', 'insurance_amount', 'sale_amount', 'net_amount', 'monthly_amount', 'alert_duration', 'company_department_email', 'real_estate_status');

        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function updatedAttachFile()
    {
        $this->validate([
            'receipt_attach' => 'file|max:1024', // الحد الأقصى للحجم 1 ميجابايت
        ], [
            'receipt_attach.max' => 'يجب ألا يزيد حجم ملف الشهادة عن 1024 كيلوبايت.'
        ]);
    }

    public function ReceiptStore()
    {
        $this->resetValidation();

        if ($this->remainingAmount < 0) {
            $this->addError('receipt_payment_amount', 'المبلغ المدخل يتجاوز المبلغ المتبقي');
            return;
        }

        $Validation = $this->validate([
            'receipt_number' => 'required',
            'receipt_date' => 'required',
            'receipt_payment_amount' => 'required',
            'receipt_from_date' => 'required',
            'receipt_to_date' => 'required',
            'receipt_attach' => 'required',
        ], [
            'receipt_number.required' => 'رقم الايصال مطلوب',
            'receipt_date.required' => 'تاريخ الايصال مطلوب',
            'receipt_payment_amount.required' => 'المبلغ المدفوع مطلوب',
            'receipt_from_date.required' => 'الحقل مطلوب',
            'receipt_to_date.required' => 'الحقل مطلوب',
            'receipt_attach.required' => 'ملف الايصال مطلوب',
        ]);

        $path = 'public/Realities/' . $this->province_number . '/' .
            $this->plot_number . '/' . $this->property_number;

        // Delete old file if exists
        $oldReceipt = SaleTenantReceipts::where('buyer_tenant_id', $this->BuyerTenant->id)
            ->where('receipt_number', $this->receipt_number)
            ->first();

        if ($oldReceipt && $oldReceipt->receipt_attach) {
            Storage::delete($path . '/' . $oldReceipt->receipt_attach);
        }

        // Use hashName() for secure file naming
        $fileName = null;
        if ($this->receipt_attach && $this->receipt_attach instanceof \Illuminate\Http\UploadedFile) {
            $fileName = $this->receipt_attach->hashName();
            $this->receipt_attach->storeAs($path, $fileName);
        }

        $Validation['buyer_tenant_id'] = $this->BuyerTenant->id;
        $Validation['property_number'] = $this->property_number;
        $Validation['receipt_notes'] = $this->receipt_notes;
        $Validation['receipt_type'] = $this->BuyerTenant->buyer_tenant_type === 'مشتري' ? 'بيع' : 'ايجار';
        $Validation['receipt_attach'] = $fileName;
        $Validation['user_id'] = Auth::User()->id;

        SaleTenantReceipts::create($Validation);

        $this->calculateAmounts();

        // =================================
        Tracking::create([
            'user_id' => Auth::id(),
            'page_name' => 'إيصالات الدفع',
            'operation_type' => 'إضافة',
            'operation_time' => now()->format('Y-m-d H:i:s'),
            'details' => "رقم الإيصال: " . $this->receipt_number . ' - ' . "\nتاريخ الإيصال: " . $this->receipt_date . ' - ' . "\nالمبلغ المدفوع: " . $this->receipt_payment_amount . ' - ' . "\nمن تاريخ: " . $this->receipt_from_date . ' - ' . "\nإلى تاريخ: " . $this->receipt_to_date . ' - ' . "\nمرفق الإيصال: " . $this->receipt_attach,
        ]);
        // =================================

        $this->reset('receipt_number', 'receipt_date', 'receipt_payment_amount', 'receipt_from_date', 'receipt_to_date', 'receipt_notes', 'receipt_attach');

        $this->dispatchBrowserEvent('success', [
            'message' => 'تمت الاضافة بنجاح',
            'title' => 'اضافة'
        ]);
    }

    public function openUploadFiles($realityId)
    {
        $this->reset([
            'valuation_report_file',
            'buyer_documents_file',
            'basra_municipality_statement_file',
            'governorate_municipality_statement_file',
            'written_pledge_file',
            'company_deed_25_file',
            'official_gazette_file',
            'bidder_deposits_file',
            'sales_committee_minutes_file',
            'payment_receipt_2_percent_file',
            'property_registration_letter_file',
            'buyer_deed_23_file'
        ]);

        $this->Realitie = Realities::findOrFail($realityId);
        $this->property_number = $this->Realitie->property_number;

        $buyerTenant = BuyerTenant::where('property_number', $this->property_number)->first();
        if (!$buyerTenant) {
            $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => 'لم يتم العثور على بيانات المشتري/المستأجر']);
            return;
        }

        $filesRecord = BuyerTenantFiles::where('buyer_tenant_id', $buyerTenant->id)->first();

        // تعيين BuyerTenant إما من السجل الموجود أو إنشاء سجل جديد
        if (!$filesRecord) {
            $this->BuyerTenant = $buyerTenant;
        } else {
            $this->BuyerTenant = $buyerTenant;
            $filesRecord->buyerTenant = $buyerTenant;
            $this->BuyerTenant = $filesRecord;
        }

        $this->dispatchBrowserEvent('show-upload-modal');
    }

    public function setPaymentPeriod($years)
    {
        if (!$this->from_date) {
            $this->dispatchBrowserEvent('error', [
                'message' => 'يرجى اختيار تاريخ البداية أولاً',
                'title' => 'خطأ'
            ]);
            return;
        }

        $fromDate = Carbon::parse($this->from_date);

        if ($years === 0) {
            // تعيين تاريخ النهاية نفس تاريخ البداية
            $this->to_date = $this->from_date;
        } else {
            // إضافة 20 سنة
            $this->to_date = $fromDate->copy()->addYears($years)->format('Y-m-d');
        }

        // تحديث عدد الأشهر
        $this->NumberOfMonths();

        // إعادة حساب المبالغ
        $this->percentAmount();
    }

    public function calculateAmounts()
    {
        if (!$this->BuyerTenant) {
            return;
        }

        try {
            // حساب المبالغ المدفوعة سابقاً
            $previousPaid = SaleTenantReceipts::where('buyer_tenant_id', $this->BuyerTenant->id)
                ->sum('receipt_payment_amount');

            // المبلغ المدخل حالياً
            $currentAmount = !empty($this->receipt_payment_amount) ? floatval($this->receipt_payment_amount) : 0;

            // إجمالي المبلغ المدفوع (السابق + الحالي)
            $this->totalPaid = $previousPaid + $currentAmount;

            // المبلغ المتبقي
            $netAmount = floatval($this->BuyerTenant->net_amount);
            $this->remainingAmount = $netAmount - $this->totalPaid;

            // التحقق من تجاوز المبلغ المتبقي
            if ($this->remainingAmount < 0) {
                $this->addError('receipt_payment_amount', 'المبلغ المدخل يتجاوز المبلغ المتبقي');
                $this->receipt_payment_amount = 0;
                $this->totalPaid = $previousPaid;
                $this->remainingAmount = $netAmount - $previousPaid;
            }

            // إرسال التحديثات للواجهة
            $this->dispatchBrowserEvent('updateAmounts', [
                'totalPaid' => number_format($this->totalPaid),
                'remainingAmount' => number_format($this->remainingAmount),
                'netAmount' => number_format($netAmount)
            ]);

        } catch (\Exception $e) {
            $this->addError('receipt_payment_amount', 'حدث خطأ في حساب المبالغ');
        }
    }

    public function updatedReceiptPaymentAmount($value)
    {
        if (!is_numeric($value)) {
            $this->receipt_payment_amount = 0;
        }
        $this->calculateAmounts();
    }
=======
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
      'buyer_computer_number' => 'required',
      'buyer_tenant_phone_number' => 'required',
      'buyer_tenant_email' => 'required',
    ], [
      'buyer_tenant_name.required' => 'أسم المشتري أو المستأجر مطلوب',
      'buyer_computer_number.required' => 'رقم الحاسبة للمشتري مطلوب',
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
      'net_amount.required' => 'مبلغ التثمين مطلوب',
      'monthly_amount.required' => 'مبلغ الرسو مطلوب',
      'alert_duration.required' => 'المبلغ الصافي	مطلوب',
      'company_department_email.required' => 'حالة العقار مطلوب',
      'real_estate_status.required' => 'الاشعارات مطلوب',
      'notifications.required' => 'الاشعارات مطلوب',
    ]);

    $Validation['user_id'] = Auth::User()->id;
    $Validation['buyer_tenant_id'] = $BuyerTenant->id;
    $Validation['property_number'] = $this->property_number;
    if ($this->chooseBuyerTenant == 'buyer') {
      $Validation['real_estate_statement'] = 'مباع';
    } else {
      $Validation['real_estate_statement'] = 'مستأجر';
    }
    $Validation['notes'] = $this->notes;

    RealEstateBondsSaleRental::create($Validation);

    $this->reset('chooseBuyerTenant', 'buyer_tenant_name', 'buyer_computer_number', 'buyer_tenant_phone_number', 'buyer_tenant_email', 'buyer_tenant_notes');

    $this->reset(
      'from_date',
      'to_date',
      'property_number',
      'company_department_email',
      'number_of_months',
      'monthly_amount',
      'alert_duration',
      'real_estate_statement',
      'insurance_amount',
      'sale_amount',
      'net_amount',
      'real_estate_status',
      'notifications',
      'notes'
    );

    $this->dispatchBrowserEvent('success', [
      'message' => 'تمت الاضافة بنجاح',
      'title' => 'اضافة'
    ]);
  }

  public function updatedAttachFile()
  {
    //$this->attachFile = $this->attachFile->temporaryUrl();

    $this->validate([
      'receipt_attach' => 'file|max:1024', // الحد الأقصى للحجم 1 ميجابايت
    ], [
      'receipt_attach.max' => 'يجب ألا يزيد حجم ملف الشهادة عن 1024 كيلوبايت.'
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
      'receipt_attach' => 'required',
    ], [
      'receipt_number.required' => 'رقم الايصال مطلوب',
      'receipt_date.required' => 'تاريخ الايصال مطلوب',
      'receipt_payer_name.required' => 'أسم المسدد مطلوب',
      'receipt_payment_amount.required' => 'المبلغ المدفوع مطلوب',
      'receipt_from_date.required' => 'الحقل مطلوب',
      'receipt_to_date.required' => 'الحقل مطلوب',
      'receipt_attach.required' => 'ملف الايصال مطلوب',
    ]);

    $Validation['buyer_tenant_id'] = $this->BuyerTenant->id;
    $Validation['property_number'] = $this->property_number;
    $Validation['receipt_notes'] = $this->receipt_notes;
    $Validation['receipt_type'] = $this->BuyerTenant->buyer_tenant_type == 'buyer' ? 'بيع' : 'ايجار';
    $Validation['receipt_attach'] = $this->receipt_attach->hashName();
    $Validation['user_id'] = Auth::User()->id;

    $attachFile = $this->receipt_attach->store('public/Real-Property/Payment-Receipts/' . $this->property_number . '/' . $this->BuyerTenant->id);

    if ($attachFile) {
      SaleTenantReceipts::create($Validation);
    }

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
      'buyer_computer_number' => 'required',
      'buyer_tenant_phone_number' => 'required',
      'buyer_tenant_email' => 'required',
    ], [
      'buyer_tenant_name.required' => 'أسم المشتري أو المستأجر مطلوب',
      'buyer_computer_number.required' => 'رقم الحاسبة للمشتري مطلوب',
      'buyer_tenant_phone_number.required' => 'رقم هاتف المشتري أو المستأجر مطلوب',
      'buyer_tenant_email.required' => 'البريد الالكتروني للمشتري أو المستأجر مطلوب',
    ]);

    $Validation['user_id'] = Auth::User()->id;
    $Validation['property_number'] = $this->property_number;
    $Validation['notes'] = $this->notes;
    $Validation['buyer_tenant_type'] = $this->chooseBuyerTenant;

    BuyerTenant::create($Validation);

    $this->reset('chooseBuyerTenant', 'buyer_tenant_name', 'buyer_computer_number', 'buyer_tenant_phone_number', 'buyer_tenant_email', 'notes');

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

    $this->reset(
      'property_number',
      'buyer_tenant_name',
      'buyer_tenant_computer_number',
      'buyer_tenant_phone_number',
      'buyer_tenant_email',
      'company_department_email',
      'real_estate_statement',
      'insurance_amount',
      'sale_amount',
      'net_amount',
      'real_estate_status',
      'notifications',
      'notes'
    );

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
      'net_amount.required' => 'مبلغ التثمين مطلوب',
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

    $this->reset(
      'property_number',
      'buyer_tenant_name',
      'buyer_tenant_computer_number',
      'buyer_tenant_phone_number',
      'buyer_tenant_email',
      'company_department_email',
      'real_estate_statement',
      'insurance_amount',
      'sale_amount',
      'net_amount',
      'real_estate_status',
      'notifications',
      'notes'
    );

    $this->dispatchBrowserEvent('success', [
      'message' => 'تم الاضافه بنجاح',
      'title' => 'اضافه'
    ]);
  }
>>>>>>> 00f11ddd74f76cbca93548f9f3b4de63da9f751c
}

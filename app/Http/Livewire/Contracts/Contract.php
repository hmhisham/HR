<?php

namespace App\Http\Livewire\Contracts;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\Tenants\Tenants;
use App\Models\Contracts\Contracts;
use Illuminate\Support\Facades\Auth;

class Contract extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Contracts = [];
    public $ContractSearch, $Contract, $ContractId, $tenants;
    public $user_id, $property_folder_id, $document_contract_number,  $start_date, $approval_date, $end_date, $tenant_name, $annual_rent_amount, $amount_in_words, $lease_duration, $usage_type, $phone_number, $address, $notes, $selected_property_folder_id, $selected_property_name, $selected_id;
    public $search = ['property_folder_id' => '', 'start_date' => '', 'end_date' => '', 'tenant_name' => '', 'annual_rent_amount' => '', 'notes' => ''];

    protected $listeners = [
        'SelectTenantName',
    ];


    public function SelectTenantName($tenantId)
    {
        $this->tenant_name = $tenantId ? (int) $tenantId : null;
    }

    public function mount($selected_property_folder_id = null, $selected_property_name = null, $id = null, $property_id = null, $property_name = null)
    {
        // تنظيف وتأمين المعاملات
        $this->selected_property_folder_id = $this->sanitizeInput($selected_property_folder_id ?: $property_id);
        $this->selected_property_name = $this->sanitizeInput($selected_property_name ?: $property_name);
        $this->selected_id = $this->sanitizeNumericInput($id);

        // التحقق من صحة المعاملات
        $this->validateInputs();

        $this->tenants = Tenants::select('id', 'name')->orderBy('name')->get();
        $this->emit('select2');
    }

    private function sanitizeInput($input)
    {
        if (is_null($input)) return null;
        return htmlspecialchars(strip_tags(trim($input)), ENT_QUOTES, 'UTF-8');
    }

    private function sanitizeNumericInput($input)
    {
        if (is_null($input)) return null;
        return is_numeric($input) ? (int) $input : null;
    }

    private function validateInputs()
    {
        // التحقق من أن ID رقمي وموجب
        if ($this->selected_id && ($this->selected_id <= 0)) {
            $this->selected_id = null;
        }

        // التحقق من طول النصوص لمنع الهجمات
        if ($this->selected_property_name && strlen($this->selected_property_name) > 255) {
            $this->selected_property_name = substr($this->selected_property_name, 0, 255);
        }

        if ($this->selected_property_folder_id && strlen($this->selected_property_folder_id) > 100) {
            $this->selected_property_folder_id = substr($this->selected_property_folder_id, 0, 100);
        }
    }

    private function isValidId($id)
    {
        return is_numeric($id) && $id > 0 && $id <= 999999999; // حد أقصى معقول للـ ID
    }

    private function isValidPropertyFolderId($folderId)
    {
        if (is_null($folderId)) return false;
        // التحقق من أن المعرف يحتوي على أحرف وأرقام آمنة فقط (بما في ذلك العربية)
        return preg_match('/^[a-zA-Z0-9\-_\p{Arabic}\s]{1,100}$/u', $folderId);
    }

    public function render()
    {
        // ✅ الحصول على قيمة البحث العام
        $ContractSearch = '%' . $this->ContractSearch . '%';

        $Contracts = Contracts::query()
            ->where(function ($query) use ($ContractSearch) {
                $query->where('property_folder_id', 'LIKE', $ContractSearch)

                    ->orWhere('start_date', 'LIKE', $ContractSearch)
                    ->orWhere('end_date', 'LIKE', $ContractSearch)
                    ->orWhere('tenant_name', 'LIKE', $ContractSearch)
                    ->orWhere('annual_rent_amount', 'LIKE', $ContractSearch)
                    ->orWhere('notes', 'LIKE', $ContractSearch);
            })
            ->when($this->search['property_folder_id'], function ($query) {
                $property_folder_idSearch = '%' . $this->search['property_folder_id'] . '%';
                $query->where('property_folder_id', 'LIKE', $property_folder_idSearch);
            })

            ->when($this->search['start_date'], function ($query) {
                $start_dateSearch = '%' . $this->search['start_date'] . '%';
                $query->where('start_date', 'LIKE', $start_dateSearch);
            })
            ->when($this->search['end_date'], function ($query) {
                $end_dateSearch = '%' . $this->search['end_date'] . '%';
                $query->where('end_date', 'LIKE', $end_dateSearch);
            })
            ->when($this->search['tenant_name'], function ($query) {
                $tenant_nameSearch = '%' . $this->search['tenant_name'] . '%';
                $query->where('tenant_name', 'LIKE', $tenant_nameSearch);
            })
            ->when($this->search['annual_rent_amount'], function ($query) {
                $annual_rent_amountSearch = '%' . $this->search['annual_rent_amount'] . '%';
                $query->where('annual_rent_amount', 'LIKE', $annual_rent_amountSearch);
            })
            ->when($this->search['notes'], function ($query) {
                $notesSearch = '%' . $this->search['notes'] . '%';
                $query->where('notes', 'LIKE', $notesSearch);
            })
            ->when($this->selected_property_folder_id, function ($query) {
                // التحقق من أن القيمة آمنة قبل الاستعلام
                if ($this->isValidPropertyFolderId($this->selected_property_folder_id)) {
                    $query->where('property_folder_id', $this->selected_property_folder_id);
                }
            })
            ->when($this->selected_id, function ($query) {
                // التحقق من أن ID رقمي وموجب
                if ($this->isValidId($this->selected_id)) {
                    $query->where('id', $this->selected_id);
                }
            })
            ->orderBy('id', 'ASC')
            ->paginate(10);

        $links = $Contracts;
        $this->Contracts = collect($Contracts->items());

        return view('livewire.contracts.contract', [
            'Contracts' => $Contracts,
            'links' => $links
        ]);
    }


    public function AddContractModalShow()
    {
        $this->reset([
            'property_folder_id',
            'document_contract_number',

            'start_date',
            'approval_date',
            'end_date',
            'tenant_name',
            'annual_rent_amount',
            'amount_in_words',
            'lease_duration',
            'usage_type',
            'phone_number',
            'address',
            'notes'
        ]);
        $this->resetValidation();
        $this->dispatchBrowserEvent('ContractModalShow');
    }

    public function store()
    {
        $this->resetValidation();
        $this->validate([


            'document_contract_number' => 'required',

            'start_date' => 'required',
            'approval_date' => 'required',
            'end_date' => 'required',
            'tenant_name' => 'required',
            'annual_rent_amount' => 'required',

            'lease_duration' => 'required',
            'usage_type' => 'required',

            'notes' => 'required',
        ], [


            'document_contract_number.required' => 'حقل رقم العقد في المستند مطلوب',
             'start_date.required' => 'حقل تاريخ بداية العقد مطلوب',
            'approval_date.required' => 'حقل تاريخ المصادقة على العقد مطلوب',
            'end_date.required' => 'حقل تاريخ انتهاء العقد مطلوب',
            'tenant_name.required' => 'حقل اسم المستأجر مطلوب',
            'annual_rent_amount.required' => 'حقل مبلغ التأجير للسنة الواحدة مطلوب',
            'lease_duration.required' => 'حقل مدة الإيجار مطلوب',
            'usage_type.required' => 'حقل نوع الاستغلال مطلوب',

            'notes.required' => 'حقل الملاحظات مطلوب'
        ]);
        Contracts::create([
            'user_id' => Auth::id(),
            'property_folder_id' => $this->selected_property_folder_id,
            'document_contract_number' => $this->document_contract_number,
             'start_date' => $this->start_date,
            'approval_date' => $this->approval_date,
            'end_date' => $this->end_date,
            'tenant_name' => $this->tenant_name,
            'annual_rent_amount' => $this->annual_rent_amount,
            'lease_duration' => $this->lease_duration,
            'usage_type' => $this->usage_type,

            'notes' => $this->notes
        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الإضافة بنجاح',
            'title' => 'إضافة'
        ]);
    }

    public function GetContract($ContractId)
    {
        $this->resetValidation();
        $this->Contract = Contracts::find($ContractId);
        if (!$this->Contract) {
            $this->dispatchBrowserEvent('error', [
                'message' => 'لم يتم العثور على السجل المطلوب.'
            ]);
            return;
        }
        $this->ContractId = $this->Contract->id;
        $this->user_id = $this->Contract->user_id;
        $this->property_folder_id = $this->Contract->property_folder_id;
        $this->document_contract_number = $this->Contract->document_contract_number;
         $this->start_date = $this->Contract->start_date;
        $this->approval_date = $this->Contract->approval_date;
        $this->end_date = $this->Contract->end_date;
        $this->tenant_name = $this->Contract->tenant_name;
        $this->annual_rent_amount = $this->Contract->annual_rent_amount;
        $this->amount_in_words = $this->Contract->amount_in_words;
        $this->lease_duration = $this->Contract->lease_duration;
        $this->usage_type = $this->Contract->usage_type;
        $this->phone_number = $this->Contract->phone_number;
        $this->address = $this->Contract->address;
        $this->notes = $this->Contract->notes;
        // إعادة تهيئة Flatpickr عند فتح نافذة التعديل
        $this->dispatchBrowserEvent('flatpickr');
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([

            'property_folder_id' => 'required:contracts',
            'document_contract_number' => 'required:contracts',
             'start_date' => 'required:contracts',
            'approval_date' => 'required:contracts',
            'end_date' => 'required:contracts',
            'tenant_name' => 'required:contracts',
            'annual_rent_amount' => 'required:contracts',
            'amount_in_words' => 'required:contracts',
            'lease_duration' => 'required:contracts',
            'usage_type' => 'required:contracts',
            'phone_number' => 'required:contracts',
            'address' => 'required:contracts',
            'notes' => 'required:contracts',
        ], [

            'property_folder_id.required' => 'حقل  مطلوب',
            'document_contract_number.required' => 'حقل رقم العقد في المستند مطلوب',
             'start_date.required' => 'حقل تاريخ بداية العقد مطلوب',
            'approval_date.required' => 'حقل تاريخ المصادقة على العقد مطلوب',
            'end_date.required' => 'حقل تاريخ انتهاء العقد مطلوب',
            'tenant_name.required' => 'حقل اسم المستأجر مطلوب',
            'annual_rent_amount.required' => 'حقل مبلغ التأجير للسنة الواحدة مطلوب',
            'amount_in_words.required' => 'حقل المبلغ كتابةً مطلوب',
            'lease_duration.required' => 'حقل مدة الإيجار مطلوب',
            'usage_type.required' => 'حقل نوع الاستغلال مطلوب',
            'phone_number.required' => 'حقل رقم الهاتف مطلوب',
            'address.required' => 'حقل العنوان مطلوب',
            'notes.required' => 'حقل الملاحظات مطلوب'
        ]);
        $Contracts = Contracts::find($this->ContractId);
        $Contracts->update([
            'user_id' => Auth::id(),
            'property_folder_id' => $this->property_folder_id,
            'document_contract_number' => $this->document_contract_number,
             'start_date' => $this->start_date,
            'approval_date' => $this->approval_date,
            'end_date' => $this->end_date,
            'tenant_name' => $this->tenant_name,
            'annual_rent_amount' => $this->annual_rent_amount,
            'amount_in_words' => $this->amount_in_words,
            'lease_duration' => $this->lease_duration,
            'usage_type' => $this->usage_type,
            'phone_number' => $this->phone_number,
            'address' => $this->address,
            'notes' => $this->notes
        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Contracts = Contracts::find($this->ContractId);

        if ($Contracts) {
            $Contracts->delete();
            $this->reset();
            $this->dispatchBrowserEvent('success', [
                'message' => 'تم الحذف بنجاح',
                'title' => 'حذف'
            ]);
        }
    }
}

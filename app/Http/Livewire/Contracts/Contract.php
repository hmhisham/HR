<?php

namespace App\Http\Livewire\Contracts;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

use Livewire\WithPagination;
use App\Models\Contracts\Contracts;
use App\Models\Propertyfolder\Propertyfolder;

class Contract extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Contracts = [];
    public $ContractSearch, $Contract, $ContractId;
    public $user_id, $property_folder_id, $document_contract_number, $start_date, $approval_date, $end_date, $tenant_name, $annual_rent_amount, $lease_duration, $usage_type, $notes, $file;
    public $tenants = [];
    public $filePreviewPath = null;
    public $currentPropertyFolder = null;

    protected $listeners = [
        'SelectTenantName',
    ];
    public $search = ['property_folder_id' => '', 'document_contract_number' => '', 'end_date' => '', 'tenant_name' => '', 'annual_rent_amount' => '', 'notes' => ''];

    public function mount($property_folder_id = null)
    {
        $this->tenants = \App\Models\Tenants\Tenants::select('id', 'name')->orderBy('name')->get();
        
        if ($property_folder_id) {
            $this->property_folder_id = $property_folder_id;
            $this->currentPropertyFolder = Propertyfolder::find($property_folder_id);
        }
    }
    public function SelectTenantName($value)
    {
        $this->tenant_name = $value ? (int) $value : null;
    }

    public function updatedFile()
    {
        // When a temporary file is selected, create a public preview copy
        if ($this->file instanceof \Livewire\TemporaryUploadedFile) {
            $this->filePreviewPath = $this->file->store('tmp', 'public');
        } else {
            $this->filePreviewPath = null;
        }
    }

    public function updatingContractSearch()
    {
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $Contracts = Contracts::with('tenant');

        // ✅ تطبيق البحث العام فقط إذا كان هناك نص للبحث
        if (!empty($this->ContractSearch)) {
            $ContractSearch = '%' . $this->ContractSearch . '%';
            $Contracts->where(function ($query) use ($ContractSearch) {
                $query->where('property_folder_id', 'LIKE', $ContractSearch)
                    ->orWhere('document_contract_number', 'LIKE', $ContractSearch)
                    ->orWhere('end_date', 'LIKE', $ContractSearch)
                    ->orWhere('annual_rent_amount', 'LIKE', $ContractSearch)
                    ->orWhere('notes', 'LIKE', $ContractSearch)
                    ->orWhereHas('tenant', function ($tenantQuery) use ($ContractSearch) {
                        $tenantQuery->where('name', 'LIKE', $ContractSearch);
                    });
            });
        }

        // ✅ تطبيق البحث المحدد لكل عمود
        $Contracts->when($this->search['property_folder_id'], function ($query) {
                $property_folder_idSearch = '%' . $this->search['property_folder_id'] . '%';
                $query->where('property_folder_id', 'LIKE', $property_folder_idSearch);
            })
            ->when($this->search['document_contract_number'], function ($query) {
                $document_contract_numberSearch = '%' . $this->search['document_contract_number'] . '%';
                $query->where('document_contract_number', 'LIKE', $document_contract_numberSearch);
            })
            ->when($this->search['end_date'], function ($query) {
                $end_dateSearch = '%' . $this->search['end_date'] . '%';
                $query->where('end_date', 'LIKE', $end_dateSearch);
            })
            ->when($this->search['tenant_name'], function ($query) {
                $tenant_nameSearch = '%' . $this->search['tenant_name'] . '%';
                $query->whereHas('tenant', function ($tenantQuery) use ($tenant_nameSearch) {
                    $tenantQuery->where('name', 'LIKE', $tenant_nameSearch);
                });
            })
            ->when($this->search['annual_rent_amount'], function ($query) {
                $annual_rent_amountSearch = '%' . $this->search['annual_rent_amount'] . '%';
                $query->where('annual_rent_amount', 'LIKE', $annual_rent_amountSearch);
            })
            ->when($this->search['notes'], function ($query) {
                $notesSearch = '%' . $this->search['notes'] . '%';
                $query->where('notes', 'LIKE', $notesSearch);
            });

        $Contracts = $Contracts->orderBy('id', 'ASC')->paginate(10);

        $links = $Contracts;
        $this->Contracts = collect($Contracts->items());

        return view('livewire.contracts.contract', [
            'Contracts' => $Contracts,
            'links' => $links,
            'propertyfolder' => $this->currentPropertyFolder
        ]);
    }


    public function AddContractModalShow()
    {
        // $this->reset();
        $this->reset([
            'user_id',
            'property_folder_id',
            'document_contract_number',
            'start_date',
            'approval_date',
            'end_date',
            'tenant_name',
            'annual_rent_amount',
            'lease_duration',
            'usage_type',
            'notes',
            'file',
            'filePreviewPath'
        ]);

        $this->resetValidation();
        $this->dispatchBrowserEvent('ContractModalShow');
    }

    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'user_id' => 'required',
            'property_folder_id' => 'required',
            'document_contract_number' => 'required',
            'start_date' => 'required',
            'approval_date' => 'required',
            'end_date' => 'required',
            'tenant_name' => 'required',
            'annual_rent_amount' => 'required',
            'lease_duration' => 'required',
            'usage_type' => 'required',
            'notes' => 'required',
            'file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10240',
        ], [
            'user_id.required' => 'حقل  مطلوب',
            'property_folder_id.required' => 'حقل  مطلوب',
            'document_contract_number.required' => 'حقل رقم العقد في المستند مطلوب',
            'start_date.required' => 'حقل تاريخ بداية العقد مطلوب',
            'approval_date.required' => 'حقل تاريخ المصادقة على العقد مطلوب',
            'end_date.required' => 'حقل تاريخ انتهاء العقد مطلوب',
            'tenant_name.required' => 'حقل اسم المستأجر مطلوب',
            'annual_rent_amount.required' => 'حقل مبلغ التأجير للسنة الواحدة مطلوب',
            'lease_duration.required' => 'حقل مدة الإيجار مطلوب',
            'usage_type.required' => 'حقل نوع الاستغلال مطلوب',
            'notes.required' => 'حقل الملاحظات مطلوب',
            'file.required' => 'حقل الملف مطلوب'
        ]);
        if ($this->file instanceof \Livewire\TemporaryUploadedFile) {
            $file = $this->file->store('uploads', 'public');
        }
        Contracts::create([
            'user_id' => $this->user_id,
            'property_folder_id' => $this->property_folder_id,
            'document_contract_number' => $this->document_contract_number,
            'start_date' => $this->start_date,
            'approval_date' => $this->approval_date,
            'end_date' => $this->end_date,
            'tenant_name' => $this->tenant_name,
            'annual_rent_amount' => str_replace(',', '', $this->annual_rent_amount),
            'lease_duration' => $this->lease_duration,
            'usage_type' => $this->usage_type,
            'notes' => $this->notes,
            'file' => $file
        ]);
        // Clean up temporary public preview file
        if ($this->filePreviewPath) {
            Storage::disk('public')->delete($this->filePreviewPath);
            $this->filePreviewPath = null;
        }
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
        $this->annual_rent_amount = number_format($this->Contract->annual_rent_amount);
        $this->lease_duration = $this->Contract->lease_duration;
        $this->usage_type = $this->Contract->usage_type;
        $this->notes = $this->Contract->notes;
        $this->file = $this->Contract->file;
        // إعادة تهيئة Flatpickr عند فتح نافذة التعديل
        $this->dispatchBrowserEvent('flatpickr');
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'user_id' => 'required:contracts',
            'property_folder_id' => 'required:contracts',
            'document_contract_number' => 'required:contracts',
            'start_date' => 'required:contracts',
            'approval_date' => 'required:contracts',
            'end_date' => 'required:contracts',
            'tenant_name' => 'required:contracts',
            'annual_rent_amount' => 'required:contracts',
            'lease_duration' => 'required:contracts',
            'usage_type' => 'required:contracts',
            'notes' => 'required:contracts',
            'file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10240',
        ], [
            'user_id.required' => 'حقل  مطلوب',
            'property_folder_id.required' => 'حقل  مطلوب',
            'document_contract_number.required' => 'حقل رقم العقد في المستند مطلوب',
            'start_date.required' => 'حقل تاريخ بداية العقد مطلوب',
            'approval_date.required' => 'حقل تاريخ المصادقة على العقد مطلوب',
            'end_date.required' => 'حقل تاريخ انتهاء العقد مطلوب',
            'tenant_name.required' => 'حقل اسم المستأجر مطلوب',
            'annual_rent_amount.required' => 'حقل مبلغ التأجير للسنة الواحدة مطلوب',
            'lease_duration.required' => 'حقل مدة الإيجار مطلوب',
            'usage_type.required' => 'حقل نوع الاستغلال مطلوب',
            'notes.required' => 'حقل الملاحظات مطلوب',
            'file.required' => 'حقل الملف مطلوب'
        ]);
        $Contracts = Contracts::find($this->ContractId);
        if ($this->file instanceof \Livewire\TemporaryUploadedFile) {
            $file = $this->file->store('uploads', 'public');
        } else {
            $file = $this->Contract->file;
        }
        $Contracts->update([
            'user_id' => $this->user_id,
            'property_folder_id' => $this->property_folder_id,
            'document_contract_number' => $this->document_contract_number,
            'start_date' => $this->start_date,
            'approval_date' => $this->approval_date,
            'end_date' => $this->end_date,
            'tenant_name' => $this->tenant_name,
            'annual_rent_amount' => str_replace(',', '', $this->annual_rent_amount),
            'lease_duration' => $this->lease_duration,
            'usage_type' => $this->usage_type,
            'notes' => $this->notes,
            'file' => $file
        ]);
        // Clean up temporary public preview file
        if ($this->filePreviewPath) {
            Storage::disk('public')->delete($this->filePreviewPath);
            $this->filePreviewPath = null;
        }
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
            if ($Contracts->file) {
                $filePath = 'storage/' . $Contracts->file;
                if (\File::exists($filePath)) {
                    \File::delete($filePath);
                }
            }
            $Contracts->delete();
            $this->reset();
            $this->dispatchBrowserEvent('success', [
                'message' => 'تم الحذف بنجاح',
                'title' => 'حذف'
            ]);
        }
    }
}

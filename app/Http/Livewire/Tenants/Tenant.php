<?php

namespace App\Http\Livewire\Tenants;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Tenants\Tenants;
use Illuminate\Support\Facades\Auth;

class Tenant extends Component
{
    use WithPagination, WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $Tenants = [];
    public $TenantSearch, $Tenant, $TenantId;
    public $user_id, $name, $phone, $email, $address, $pdf_file, $notes;
    public $search = ['user_id' => '', 'name' => '', 'phone' => '', 'email' => '', 'address' => '', 'pdf_file' => '', 'notes' => ''];
    public $pdfPreviewUrl = null;
    public function render()
    {
        // ✅ الحصول على قيمة البحث العام
        $TenantSearch = '%' . $this->TenantSearch . '%';

        $Tenants = Tenants::query()
            ->where(function ($query) use ($TenantSearch) {
                $query->where('user_id', 'LIKE', $TenantSearch)
                    ->orWhere('name', 'LIKE', $TenantSearch)
                    ->orWhere('phone', 'LIKE', $TenantSearch)
                    ->orWhere('email', 'LIKE', $TenantSearch)
                    ->orWhere('address', 'LIKE', $TenantSearch)
                    ->orWhere('pdf_file', 'LIKE', $TenantSearch)
                    ->orWhere('notes', 'LIKE', $TenantSearch);
            })
            ->when($this->search['user_id'], function ($query) {
                $user_idSearch = '%' . $this->search['user_id'] . '%';
                $query->where('user_id', 'LIKE', $user_idSearch);
            })
            ->when($this->search['name'], function ($query) {
                $nameSearch = '%' . $this->search['name'] . '%';
                $query->where('name', 'LIKE', $nameSearch);
            })
            ->when($this->search['phone'], function ($query) {
                $phoneSearch = '%' . $this->search['phone'] . '%';
                $query->where('phone', 'LIKE', $phoneSearch);
            })
            ->when($this->search['email'], function ($query) {
                $emailSearch = '%' . $this->search['email'] . '%';
                $query->where('email', 'LIKE', $emailSearch);
            })
            ->when($this->search['address'], function ($query) {
                $addressSearch = '%' . $this->search['address'] . '%';
                $query->where('address', 'LIKE', $addressSearch);
            })
            ->when($this->search['pdf_file'], function ($query) {
                $pdf_fileSearch = '%' . $this->search['pdf_file'] . '%';
                $query->where('pdf_file', 'LIKE', $pdf_fileSearch);
            })
            ->when($this->search['notes'], function ($query) {
                $notesSearch = '%' . $this->search['notes'] . '%';
                $query->where('notes', 'LIKE', $notesSearch);
            })
            ->orderBy('id', 'ASC')
            ->paginate(10);

        $links = $Tenants;
        $this->Tenants = collect($Tenants->items());

        return view('livewire.tenants.tenant', [
            'Tenants' => $Tenants,
            'links' => $links
        ]);
    }
    public function AddTenantModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('TenantModalShow');
    }
    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'pdf_file' => 'required|file|mimes:pdf|max:10240', // 10MB max, PDF only
        ], [
            'name.required' => 'حقل اسم المستأجر مطلوب',
            'phone.required' => 'حقل رقم الهاتف مطلوب',
            'email.required' => 'حقل البريد الإلكتروني مطلوب',
            'email.email' => 'يجب أن يكون البريد الإلكتروني صحيحاً',
            'address.required' => 'حقل العنوان مطلوب',
            'pdf_file.required' => 'حقل المستمسكات مطلوب',
            'pdf_file.file' => 'يجب أن يكون الملف صالحاً',
            'pdf_file.mimes' => 'يجب أن يكون الملف من نوع PDF فقط',
            'pdf_file.max' => 'حجم الملف يجب أن يكون أقل من 10 ميجابايت',
        ]);

        // رفع الملف وحفظه
        $fileName = null;
        if ($this->pdf_file) {
            $fileName = $this->pdf_file->store('tenants', 'public');
        }

        Tenants::create([
            'user_id' => Auth::id(),
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
            'pdf_file' => $fileName,
            'notes' => $this->notes
        ]);

        // Clean up temporary preview file
        $this->cleanupTempFile();
        
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الإضافة بنجاح',
            'title' => 'إضافة'
        ]);
    }

    public function emptyy()
    {
        $this->cleanupTempFile();
        $this->pdf_file = null;
        $this->pdfPreviewUrl = null;
        $this->resetValidation('pdf_file');
    }

    public function updatedPdfFile()
    {
        $this->resetValidation('pdf_file');
        
        if ($this->pdf_file) {
            // Validate the file
            $this->validate([
                'pdf_file' => 'file|mimes:pdf|max:10240'
            ], [
                'pdf_file.file' => 'يجب أن يكون الملف صالحاً',
                'pdf_file.mimes' => 'يجب أن يكون الملف من نوع PDF فقط',
                'pdf_file.max' => 'حجم الملف يجب أن يكون أقل من 10 ميجابايت',
            ]);

            // Generate a preview URL using a temporary storage approach
            try {
                // Ensure temp directory exists
                $tempDir = storage_path('app/public/temp');
                if (!file_exists($tempDir)) {
                    mkdir($tempDir, 0755, true);
                }
                
                $tempPath = 'temp/preview_' . uniqid() . '.pdf';
                $this->pdf_file->storeAs('public', $tempPath);
                $this->pdfPreviewUrl = asset('storage/' . $tempPath);
            } catch (\Exception $e) {
                $this->pdfPreviewUrl = null;
            }
        } else {
            $this->pdfPreviewUrl = null;
        }
    }

    private function cleanupTempFile()
    {
        if ($this->pdfPreviewUrl) {
            try {
                $path = str_replace(asset('storage/'), '', $this->pdfPreviewUrl);
                $fullPath = storage_path('app/public/' . $path);
                if (file_exists($fullPath)) {
                    unlink($fullPath);
                }
            } catch (\Exception $e) {
                // Ignore cleanup errors
            }
        }
    }
    public function GetTenant($TenantId)
    {
        $this->resetValidation();
        $this->Tenant = Tenants::find($TenantId);
        if (!$this->Tenant) {
            $this->dispatchBrowserEvent('error', [
                'message' => 'لم يتم العثور على السجل المطلوب.'
            ]);
            return;
        }
        $this->TenantId = $this->Tenant->id;
        $this->user_id = $this->Tenant->user_id;
        $this->name = $this->Tenant->name;
        $this->phone = $this->Tenant->phone;
        $this->email = $this->Tenant->email;
        $this->address = $this->Tenant->address;
        $this->pdf_file = $this->Tenant->pdf_file;
        $this->notes = $this->Tenant->notes;
        // إعادة تهيئة Flatpickr عند فتح نافذة التعديل
        $this->dispatchBrowserEvent('flatpickr');
    }
    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'user_id' => 'required:tenants',
            'name' => 'required:tenants',
            'phone' => 'required:tenants',
            'email' => 'required:tenants',
            'address' => 'required:tenants',
            'pdf_file' => 'required:tenants',
            'notes' => 'required:tenants',
        ], [
            'user_id.required' => 'حقل  مطلوب',
            'name.required' => 'حقل اسم المستأجر مطلوب',
            'phone.required' => 'حقل رقم الهاتف مطلوب',
            'email.required' => 'حقل البريد الإلكتروني مطلوب',
            'address.required' => 'حقل العنوان مطلوب',
            'pdf_file.required' => 'حقل المستمسكات مطلوب',
            'notes.required' => 'حقل الملاحظات مطلوب'
        ]);
        $Tenants = Tenants::find($this->TenantId);
        $Tenants->update([
            'user_id' => $this->user_id,
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
            'pdf_file' => $this->pdf_file,
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
        $Tenants = Tenants::find($this->TenantId);

        if ($Tenants) {
            $Tenants->delete();
            $this->reset();
            $this->dispatchBrowserEvent('success', [
                'message' => 'تم الحذف بنجاح',
                'title' => 'حذف'
            ]);
        }
    }
}

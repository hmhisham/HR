<?php

namespace App\Http\Livewire\Rental;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use App\Models\Rental\Rental as RentalModel;
use App\Models\Tenants\Tenants;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Rental extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Rentals = [];
    public $RentalSearch, $Rental, $RentalId;
    public $user_id, $tenant_name, $date, $amount, $pdf_file, $notes;
    public $tenants = [];
    public $filePreviewPath = null;
    public $remove_file = false;
    public $property_folder_id = null;

    protected $listeners = [
        'SelectTenantName',
    ];

    public $search = ['tenant_name' => '', 'date' => '', 'amount' => '', 'notes' => ''];

    protected $rules = [
        'tenant_name' => 'required',
        'date' => 'required|date',
        'amount' => 'required|numeric|min:0',
        'pdf_file' => 'nullable|file|mimes:pdf|max:10240',
        'notes' => 'nullable|string|max:1000'
    ];

    

    public function SelectTenantName($value)
    {
        $this->tenant_name = $value ? (int) $value : null;
    }

    public function updatedPdfFile()
    {
        // When a temporary file is selected, create a public preview copy
        if ($this->pdf_file instanceof \Livewire\TemporaryUploadedFile) {
            $this->filePreviewPath = $this->pdf_file->store('tmp', 'public');
        } else {
            $this->filePreviewPath = null;
        }
    }

    public function clearTempPdf()
    {
        // Clear validation state for pdf_file
        $this->resetValidation('pdf_file');
        // Delete temporary preview file if exists
        if ($this->filePreviewPath && \Illuminate\Support\Facades\Storage::disk('public')->exists($this->filePreviewPath)) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($this->filePreviewPath);
        }
        $this->filePreviewPath = null;
        $this->pdf_file = null;
    }

    public function updatingRentalSearch()
    {
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $Rentals = RentalModel::with('tenant');

        // تصفية حسب رقم الأضبارة إن وجد
        if (!empty($this->property_folder_id)) {
            $Rentals->where('property_folder_id', $this->property_folder_id);
        }

        // تطبيق البحث العام فقط إذا كان هناك نص للبحث
        if (!empty($this->RentalSearch)) {
            $RentalSearch = '%' . $this->RentalSearch . '%';
            $Rentals->where(function ($query) use ($RentalSearch) {
                $query->where('date', 'LIKE', $RentalSearch)
                    ->orWhere('amount', 'LIKE', $RentalSearch)
                    ->orWhere('notes', 'LIKE', $RentalSearch)
                    ->orWhereHas('tenant', function ($tenantQuery) use ($RentalSearch) {
                        $tenantQuery->where('name', 'LIKE', $RentalSearch);
                    });
            });
        }

        // تطبيق البحث المحدد لكل عمود
        $Rentals->when($this->search['tenant_name'], function ($query) {
                $tenant_nameSearch = '%' . $this->search['tenant_name'] . '%';
                $query->whereHas('tenant', function ($tenantQuery) use ($tenant_nameSearch) {
                    $tenantQuery->where('name', 'LIKE', $tenant_nameSearch);
                });
            })
            ->when($this->search['date'], function ($query) {
                $dateSearch = '%' . $this->search['date'] . '%';
                $query->where('date', 'LIKE', $dateSearch);
            })
            ->when($this->search['amount'], function ($query) {
                $amountSearch = '%' . $this->search['amount'] . '%';
                $query->where('amount', 'LIKE', $amountSearch);
            })
            ->when($this->search['notes'], function ($query) {
                $notesSearch = '%' . $this->search['notes'] . '%';
                $query->where('notes', 'LIKE', $notesSearch);
            });

        $Rentals = $Rentals->orderBy('id', 'DESC')->paginate(10);

        $links = $Rentals;
        $this->Rentals = collect($Rentals->items());

        return view('livewire.rental.rental', [
            'Rentals' => $Rentals,
            'links' => $links,
        ]);
    }

    public function mount($property_folder_id = null)
    {
        $this->tenants = Tenants::all();
        $this->property_folder_id = $property_folder_id;
    }

    public function AddRentalModalShow()
    {
        $this->resetValidation();
        $this->reset();
        $this->remove_file = false;
        $this->tenants = Tenants::all();
        $this->dispatchBrowserEvent('flatpickr');
    }

    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'tenant_name' => 'required',
            'date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'pdf_file' => 'nullable|file|mimes:pdf|max:10240',
            'notes' => 'nullable|string|max:1000'
        ], [
            'tenant_name.required' => 'اسم المستأجر مطلوب',
            'date.required' => 'التاريخ مطلوب',
            'date.date' => 'يجب أن يكون التاريخ صحيحاً',
            'amount.required' => 'المبلغ مطلوب',
            'amount.numeric' => 'يجب أن يكون المبلغ رقماً',
            'amount.min' => 'يجب أن يكون المبلغ أكبر من أو يساوي صفر',
            'pdf_file.file' => 'يجب أن يكون الملف صحيحاً',
            'pdf_file.mimes' => 'يجب أن يكون الملف من نوع PDF',
            'pdf_file.max' => 'حجم الملف يجب أن يكون أقل من 10 ميجابايت',
            'notes.max' => 'الملاحظات يجب أن تكون أقل من 1000 حرف'
        ]);

        try {
            $file = null;
            if ($this->pdf_file instanceof \Livewire\TemporaryUploadedFile) {
                $file = $this->pdf_file->store('uploads/rentals', 'public');
            }

            RentalModel::create([
                'user_id' => Auth::user()->id,
                'property_folder_id' => $this->property_folder_id,
                'tenant_name' => $this->tenant_name,
                'date' => $this->date,
                'amount' => str_replace(',', '', $this->amount),
                'pdf_file' => $file,
                'notes' => $this->notes
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
        } catch (\Exception $e) {
            // Clean up uploaded file if database save fails
            if ($file && Storage::disk('public')->exists($file)) {
                Storage::disk('public')->delete($file);
            }
            
            // Clean up temporary public preview file
            if ($this->filePreviewPath) {
                Storage::disk('public')->delete($this->filePreviewPath);
                $this->filePreviewPath = null;
            }
            
            $this->dispatchBrowserEvent('error', [
                'message' => 'حدث خطأ أثناء الإضافة: ' . $e->getMessage(),
                'title' => 'خطأ'
            ]);
        }
    }

    public function GetRental($RentalId)
    {
        $this->resetValidation();
        $this->Rental = RentalModel::find($RentalId);
        if (!$this->Rental) {
            $this->dispatchBrowserEvent('error', [
                'message' => 'لم يتم العثور على السجل المطلوب.'
            ]);
            return;
        }
        $this->RentalId = $this->Rental->id;
        $this->user_id = $this->Rental->user_id;
        $this->tenant_name = $this->Rental->tenant_name;
        $this->date = $this->Rental->date;
        $this->amount = number_format($this->Rental->amount);
        $this->pdf_file = $this->Rental->pdf_file;
        $this->notes = $this->Rental->notes;
        $this->remove_file = false;
        // إعادة تهيئة Flatpickr عند فتح نافذة التعديل
        $this->dispatchBrowserEvent('flatpickr');
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'tenant_name' => 'required',
            'date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'pdf_file' => 'nullable|file|mimes:pdf|max:10240',
            'notes' => 'nullable|string|max:1000'
        ], [
            'tenant_name.required' => 'اسم المستأجر مطلوب',
            'date.required' => 'التاريخ مطلوب',
            'date.date' => 'يجب أن يكون التاريخ صحيحاً',
            'amount.required' => 'المبلغ مطلوب',
            'amount.numeric' => 'يجب أن يكون المبلغ رقماً',
            'amount.min' => 'يجب أن يكون المبلغ أكبر من أو يساوي صفر',
            'pdf_file.file' => 'يجب أن يكون الملف صحيحاً',
            'pdf_file.mimes' => 'يجب أن يكون الملف من نوع PDF',
            'pdf_file.max' => 'حجم الملف يجب أن يكون أقل من 10 ميجابايت',
            'notes.max' => 'الملاحظات يجب أن تكون أقل من 1000 حرف'
        ]);

        $Rental = RentalModel::find($this->RentalId);
        
        if (!$Rental) {
            $this->dispatchBrowserEvent('error', [
                'message' => 'محضر التأجير غير موجود',
                'title' => 'خطأ'
            ]);
            return;
        }

        try {
            $file = $Rental->pdf_file; // Keep existing file by default
            $oldFile = $Rental->pdf_file; // Store old file path for cleanup
            
            // Handle new file upload
            if ($this->pdf_file instanceof \Livewire\TemporaryUploadedFile) {
                // Store new file first
                $file = $this->pdf_file->store('uploads/rentals', 'public');
            }

            // Explicitly remove existing file if requested and no new file uploaded
            if ($this->remove_file && !($this->pdf_file instanceof \Livewire\TemporaryUploadedFile)) {
                $file = null;
            }

            $Rental->update([
                'user_id' => Auth::user()->id,
                'tenant_name' => $this->tenant_name,
                'date' => $this->date,
                'amount' => str_replace(',', '', $this->amount),
                'pdf_file' => $file,
                'notes' => $this->notes
            ]);

            // Only delete old file after successful database update
            if ($oldFile && $oldFile !== $file) {
                if (Storage::disk('public')->exists($oldFile)) {
                    Storage::disk('public')->delete($oldFile);
                }
            }

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
        } catch (\Exception $e) {
            // Clean up new file if database update fails
            if ($this->pdf_file instanceof \Livewire\TemporaryUploadedFile && isset($file) && $file !== $oldFile) {
                if (Storage::disk('public')->exists($file)) {
                    Storage::disk('public')->delete($file);
                }
            }
            
            // Clean up temporary public preview file
            if ($this->filePreviewPath) {
                Storage::disk('public')->delete($this->filePreviewPath);
                $this->filePreviewPath = null;
            }
            
            $this->dispatchBrowserEvent('error', [
                'message' => 'حدث خطأ أثناء التعديل: ' . $e->getMessage(),
                'title' => 'خطأ'
            ]);
        }
    }

    public function destroy()
    {
        $Rental = RentalModel::find($this->RentalId);
        
        if (!$Rental) {
            $this->dispatchBrowserEvent('error', [
                'message' => 'محضر التأجير غير موجود',
                'title' => 'خطأ'
            ]);
            return;
        }

        try {
            // Delete associated file if exists
            if ($Rental->pdf_file && Storage::disk('public')->exists($Rental->pdf_file)) {
                Storage::disk('public')->delete($Rental->pdf_file);
            }
            
            $Rental->delete();
            
            $this->reset();
            $this->dispatchBrowserEvent('success', [
                'message' => 'تم الحذف بنجاح',
                'title' => 'حذف'
            ]);
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('error', [
                'message' => 'حدث خطأ أثناء الحذف: ' . $e->getMessage(),
                'title' => 'خطأ'
            ]);
        }
    }
}

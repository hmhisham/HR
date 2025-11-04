<?php

namespace App\Http\Livewire\Valuation;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\Valuation\Valuation as ValuationModel;

class Valuation extends Component
{
    use WithPagination, WithFileUploads;
    protected $paginationTheme = 'bootstrap';

    public $Valuations = [];
    public $ValuationSearch, $Valuation, $ValuationId;
    public $user_id, $date, $amount, $pdf_file, $notes;
    public $filePreviewPath = null;
    public $remove_file = false;
    public $property_folder_id = null;

    public $search = ['date' => '', 'amount' => '', 'notes' => ''];

    protected $rules = [
        'date' => 'required|date',
        'amount' => 'required|numeric|min:0',
        'pdf_file' => 'nullable|file|mimes:pdf|max:10240',
        'notes' => 'nullable|string|max:1000'
    ];

    public function updatingValuationSearch()
    {
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedPdfFile()
    {
        if ($this->pdf_file instanceof \Livewire\TemporaryUploadedFile) {
            $this->filePreviewPath = $this->pdf_file->store('tmp', 'public');
        } else {
            $this->filePreviewPath = null;
        }
    }

    public function clearTempPdf()
    {
        $this->resetValidation('pdf_file');
        if ($this->filePreviewPath && Storage::disk('public')->exists($this->filePreviewPath)) {
            Storage::disk('public')->delete($this->filePreviewPath);
        }
        $this->filePreviewPath = null;
        $this->pdf_file = null;
    }

    public function mount($property_folder_id = null)
    {
        $this->property_folder_id = $property_folder_id;
    }

    public function render()
    {
        $Valuations = ValuationModel::query();

        if (!empty($this->property_folder_id)) {
            $Valuations->where('property_folder_id', $this->property_folder_id);
        }

        if (!empty($this->ValuationSearch)) {
            $ValuationSearch = '%' . $this->ValuationSearch . '%';
            $Valuations->where(function ($query) use ($ValuationSearch) {
                $query->where('date', 'LIKE', $ValuationSearch)
                      ->orWhere('amount', 'LIKE', $ValuationSearch)
                      ->orWhere('notes', 'LIKE', $ValuationSearch);
            });
        }

        $Valuations->when($this->search['date'], function ($query) {
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

        $Valuations = $Valuations->orderBy('id', 'DESC')->paginate(10);

        $links = $Valuations;
        $this->Valuations = collect($Valuations->items());

        return view('livewire.valuation.valuation', [
            'Valuations' => $Valuations,
            'links' => $links,
        ]);
    }

    public function AddValuationModalShow()
    {
        $this->resetValidation();
        $this->reset([
            'user_id', 'date', 'amount', 'pdf_file', 'notes',
            'filePreviewPath', 'remove_file', 'Valuation', 'ValuationId',
            'ValuationSearch', 'search',
        ]);
        $this->remove_file = false;
        $this->dispatchBrowserEvent('flatpickr');
    }

    public function store()
    {
        $this->resetValidation();
        if (empty($this->property_folder_id)) {
            $this->dispatchBrowserEvent('error', [
                'message' => 'يرجى فتح صفحة محضر التثمين من داخل اضبارة العقار أو تحديد اضبارة العقار أولاً.',
                'title' => 'فشل الإضافة'
            ]);
            return;
        }

        $this->validate();

        try {
            $file = null;
            if ($this->pdf_file instanceof \Livewire\TemporaryUploadedFile) {
                $file = $this->pdf_file->store('uploads/valuations', 'public');
            }

            ValuationModel::create([
                'user_id' => Auth::user()->id,
                'property_folder_id' => $this->property_folder_id,
                'date' => $this->date,
                'amount' => str_replace(',', '', $this->amount),
                'pdf_file' => $file,
                'notes' => $this->notes,
            ]);

            if ($this->filePreviewPath) {
                Storage::disk('public')->delete($this->filePreviewPath);
                $this->filePreviewPath = null;
            }

            $this->reset([
                'user_id', 'date', 'amount', 'pdf_file', 'notes',
                'filePreviewPath', 'remove_file', 'Valuation', 'ValuationId',
                'ValuationSearch', 'search',
            ]);

            $this->dispatchBrowserEvent('success', [
                'message' => 'تم الإضافة بنجاح',
                'title' => 'إضافة'
            ]);
        } catch (\Exception $e) {
            if ($file && Storage::disk('public')->exists($file)) {
                Storage::disk('public')->delete($file);
            }
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

    public function GetValuation($ValuationId)
    {
        $this->resetValidation();
        $this->Valuation = ValuationModel::find($ValuationId);
        if (!$this->Valuation) {
            $this->dispatchBrowserEvent('error', ['message' => 'لم يتم العثور على السجل المطلوب.']);
            return;
        }
        $this->ValuationId = $this->Valuation->id;
        $this->user_id = $this->Valuation->user_id;
        $this->date = $this->Valuation->date;
        $this->amount = number_format($this->Valuation->amount);
        $this->pdf_file = $this->Valuation->pdf_file;
        $this->notes = $this->Valuation->notes;
        $this->remove_file = false;
        $this->dispatchBrowserEvent('flatpickr');
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate();

        $Valuation = ValuationModel::find($this->ValuationId);
        if (!$Valuation) {
            $this->dispatchBrowserEvent('error', ['message' => 'محضر التثمين غير موجود', 'title' => 'خطأ']);
            return;
        }

        try {
            $file = $Valuation->pdf_file;
            $oldFile = $Valuation->pdf_file;

            if ($this->pdf_file instanceof \Livewire\TemporaryUploadedFile) {
                $file = $this->pdf_file->store('uploads/valuations', 'public');
            }

            if ($this->remove_file && !($this->pdf_file instanceof \Livewire\TemporaryUploadedFile)) {
                $file = null;
            }

            $Valuation->update([
                'user_id' => Auth::user()->id,
                'date' => $this->date,
                'amount' => str_replace(',', '', $this->amount),
                'pdf_file' => $file,
                'notes' => $this->notes,
            ]);

            if ($oldFile && $oldFile !== $file) {
                if (Storage::disk('public')->exists($oldFile)) {
                    Storage::disk('public')->delete($oldFile);
                }
            }

            if ($this->filePreviewPath) {
                Storage::disk('public')->delete($this->filePreviewPath);
                $this->filePreviewPath = null;
            }

            $this->reset([
                'user_id', 'date', 'amount', 'pdf_file', 'notes',
                'filePreviewPath', 'remove_file', 'Valuation', 'ValuationId',
                'ValuationSearch', 'search',
            ]);

            $this->dispatchBrowserEvent('success', ['message' => 'تم التعديل بنجاح', 'title' => 'تعديل']);
        } catch (\Exception $e) {
            if ($this->pdf_file instanceof \Livewire\TemporaryUploadedFile && isset($file) && $file !== $oldFile) {
                if (Storage::disk('public')->exists($file)) {
                    Storage::disk('public')->delete($file);
                }
            }
            if ($this->filePreviewPath) {
                Storage::disk('public')->delete($this->filePreviewPath);
                $this->filePreviewPath = null;
            }
            $this->dispatchBrowserEvent('error', ['message' => 'حدث خطأ أثناء التعديل: ' . $e->getMessage(), 'title' => 'خطأ']);
        }
    }

    public function destroy()
    {
        $Valuation = ValuationModel::find($this->ValuationId);
        if (!$Valuation) {
            $this->dispatchBrowserEvent('error', ['message' => 'محضر التثمين غير موجود', 'title' => 'خطأ']);
            return;
        }

        try {
            if ($Valuation->pdf_file && Storage::disk('public')->exists($Valuation->pdf_file)) {
                Storage::disk('public')->delete($Valuation->pdf_file);
            }

            $Valuation->delete();

            $this->reset([
                'user_id', 'date', 'amount', 'pdf_file', 'notes',
                'filePreviewPath', 'remove_file', 'Valuation', 'ValuationId',
                'ValuationSearch', 'search',
            ]);

            $this->dispatchBrowserEvent('success', ['message' => 'تم الحذف بنجاح', 'title' => 'حذف']);
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('error', ['message' => 'حدث خطأ أثناء الحذف: ' . $e->getMessage(), 'title' => 'خطأ']);
        }
    }
}


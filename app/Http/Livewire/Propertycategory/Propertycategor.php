<?php

namespace App\Http\Livewire\Propertycategory;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\Propertycategory\Propertycategory;

class Propertycategor extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $Propertycategory = [];
    public $propertycategorSearch, $propertycategor, $propertycategorId;
    public $category, $notes;
    public $search = ['category' => '', 'notes' => ''];

    public function render()
    {
        $categorySearch = '%' . $this->search['category'] . '%';
        $notesSearch = '%' . $this->search['notes'] . '%';

        $Propertycategory = Propertycategory::query()
            ->when($this->search['category'], function ($query) use ($categorySearch) {
                $query->where('category', 'LIKE', $categorySearch);
            })
            ->when($this->search['notes'], function ($query) use ($notesSearch) {
                $query->where('notes', 'LIKE', $notesSearch);
            })
            ->orderBy('id', 'ASC')
            ->paginate(10);

        $links = $Propertycategory;
        $this->Propertycategory = collect($Propertycategory->items());
        return View('livewire.propertycategory.propertycategor', [
            'Propertycategory' => $Propertycategory,
            'links' => $links
        ]);
    }

    public function AddpropertycategorModalShow()
    {
        $this->reset(['category', 'notes']);
        $this->resetValidation();
        $this->dispatchBrowserEvent('propertycategorModalShow');
    }

    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'category' => 'required|unique:propertycategory,category',
        ], [
            'category.required' => 'حقل نوع العقار مطلوب',
            'category.unique' => 'حقل نوع العقار موجود مسبقا',
        ]);
        Propertycategory::create([
            'user_id' => Auth::id(),
            'category' => $this->category,
            'notes' => $this->notes,
        ]);
        $this->reset(['category', 'notes']);
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }
    public function Getpropertycategor($propertycategorId)
    {
        $this->resetValidation();
        $this->propertycategor  = Propertycategory::find($propertycategorId);
        $this->propertycategorId = $this->propertycategor->id;
        $this->category = $this->propertycategor->category;
        $this->notes = $this->propertycategor->notes;
    }
    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'category' => 'required|unique:propertycategory,category,' . $this->propertycategor->id . ',id',
        ], [
            'category.required' => 'حقل نوع العقار مطلوب',
            'category.unique' => 'حقل نوع العقار موجود مسبقا',
        ]);
        $Propertycategory = Propertycategory::find($this->propertycategorId);
        $Propertycategory->update([
            'user_id' => Auth::id(),
            'category' => $this->category,
            'notes' => $this->notes,
        ]);
        $this->reset(['category', 'notes']);
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }
    public function destroy()
    {
        $Propertycategory = Propertycategory::find($this->propertycategorId);
        if ($Propertycategory) {
            $Propertycategory->delete();
            $this->reset();
            $this->dispatchBrowserEvent('success', [
                'message' => 'تم حذف البيانات بنجاح',
                'title' => 'الحذف'
            ]);
        }
    }
}

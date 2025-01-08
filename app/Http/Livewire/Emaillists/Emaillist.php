<?php

namespace App\Http\Livewire\Emaillists;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\Emaillists\Emaillists;

class emaillist extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $Emaillists = [];
    public $emaillistSearch, $emaillist, $emaillistId;
    public $department, $email, $notes;
    public $search = ['department' => '', 'email' => '', 'notes' => ''];

    public function render()
    {
        $departmentSearch = '%' . $this->search['department'] . '%';
        $emailSearch = '%' . $this->search['email'] . '%';
        $notesSearch = '%' . $this->search['notes'] . '%';

        $Emaillists = Emaillists::query()
            ->when($this->search['department'], function ($query) use ($departmentSearch) {
                $query->where('department', 'LIKE', $departmentSearch);
            })
            ->when($this->search['email'], function ($query) use ($emailSearch) {
                $query->where('email', 'LIKE', $emailSearch);
            })
            ->when($this->search['notes'], function ($query) use ($notesSearch) {
                $query->where('notes', 'LIKE', $notesSearch);
            })

            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Emaillists;
        $this->Emaillists = collect($Emaillists->items());

        return view('livewire.emaillists.emaillist', [
            'Emaillists' => $Emaillists,
            'links' => $links
        ]);
    }

    public function AddemaillistModalShow()
    {
        $this->reset(['department', 'email', 'notes']);
        $this->resetValidation();
        $this->dispatchBrowserEvent('emaillistModalShow');
    }

    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'department' => 'required',
            'email' => 'required|email|unique:users,email',
        ], [
            'department.required' => 'حقل القسم مطلوب',
            'email.required' => 'حقل البريد الإلكتروني مطلوب',
            'email.email' => 'الرجاء إدخال بريد إلكتروني صحيح.',
            'email.unique' => 'البريد الإلكتروني موجود مسبقا',
        ]);

        Emaillists::create([
            'user_id' => Auth::id(),
            'department' => $this->department,
            'email' => $this->email,
            'notes' => $this->notes,
        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function Getemaillist($emaillistId)
    {
        $this->resetValidation();
        $this->emaillist  = Emaillists::find($emaillistId);
        $this->emaillistId = $this->emaillist->id;
        $this->department = $this->emaillist->department;
        $this->email = $this->emaillist->email;
        $this->notes = $this->emaillist->notes;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'department' => 'required',
            'email' => 'required|email|unique:emaillists,email,' . $this->emaillist->id,
        ], [
            'department.required' => 'حقل القسم مطلوب',
            'email.required' => 'حقل البريد الإلكتروني مطلوب',
            'email.email' => 'الرجاء إدخال بريد إلكتروني صحيح.',
            'email.unique' => 'البريد الإلكتروني موجود مسبقا',
        ]);
        $Emaillists = Emaillists::find($this->emaillistId);
        $Emaillists->update([
            'user_id' => Auth::id(),
            'department' => $this->department,
            'email' => $this->email,
            'notes' => $this->notes,
        ]);
        $this->reset(['department', 'email', 'notes']);
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Emaillists = Emaillists::find($this->emaillistId);
        if ($Emaillists) {
            $Emaillists->delete();
            $this->reset();
            $this->dispatchBrowserEvent('success', [
                'message' => 'تم حذف البيانات بنجاح',
                'title' => 'الحذف'
            ]);
        }
    }
}

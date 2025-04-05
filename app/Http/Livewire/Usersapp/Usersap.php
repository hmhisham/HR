<?php

namespace App\Http\Livewire\Usersapp;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\Usersapp\Usersapp;
use Illuminate\Support\Facades\Auth;

class Usersap extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Usersapp = [];
    public $UsersapSearch, $Usersap, $UsersapId;
    public $user_id, $computer_number, $name, $password, $email, $phone_number, $national_id, $status, $note, $token;
    public $search = ['computer_number' => '', 'name' => '', 'email' => '', 'phone_number' => '', 'status' => '', 'note' => ''];

    public function render()
    {

        $computer_numberSearch = '%' . $this->search['computer_number'] . '%';
        $nameSearch = '%' . $this->search['name'] . '%';
        $emailSearch = '%' . $this->search['email'] . '%';
        $phone_numberSearch = '%' . $this->search['phone_number'] . '%';
        $statusSearch = '%' . $this->search['status'] . '%';
        $noteSearch = '%' . $this->search['note'] . '%';
        $Usersapp = Usersapp::query()
            ->when($this->search['computer_number'], function ($query) use ($computer_numberSearch) {
                $query->where('computer_number', 'LIKE', $computer_numberSearch);
            })
            ->when($this->search['name'], function ($query) use ($nameSearch) {
                $query->where('name', 'LIKE', $nameSearch);
            })
            ->when($this->search['email'], function ($query) use ($emailSearch) {
                $query->where('email', 'LIKE', $emailSearch);
            })
            ->when($this->search['phone_number'], function ($query) use ($phone_numberSearch) {
                $query->where('phone_number', 'LIKE', $phone_numberSearch);
            })
            ->when($this->search['status'], function ($query) use ($statusSearch) {
                $query->where('status', 'LIKE', $statusSearch);
            })
            ->when($this->search['note'], function ($query) use ($noteSearch) {
                $query->where('note', 'LIKE', $noteSearch);
            })

            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Usersapp;
        $this->Usersapp = collect($Usersapp->items());
        return View('livewire.usersapp.usersap', [
            'Usersapp' => $Usersapp,
            'links' => $links
        ]);
    }


    public function AddUsersapModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('UsersapModalShow');
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'computer_number' => 'required|unique:usersapps,computer_number',
            'name' => 'required',
            'password' => 'required',
            'email' => 'nullable|email',
            'phone_number' => 'nullable|regex:/^07\d{9}$/',
        ], [
            'computer_number.required' => 'حقل رقم الحاسبة مطلوب',
            'computer_number.unique' => 'رقم الحاسبة موجود مسبقاً',
            'name.required' => 'حقل الاسم مطلوب',
            'password.required' => 'حقل كلمة السر مطلوب',
            'email.email' => 'يجب ادخال بريد الكتروني صحيح',
            'phone_number.regex' => 'رقم الهاتف يجب أن يبدأ ب 07 ويتكون من 11 رقم',
        ]);

        Usersapp::create([
            'user_id' => Auth::user()->id,
            'computer_number' => $this->computer_number,
            'name' => $this->name,
            'password' => $this->password,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'national_id' => $this->national_id,
            'status' => $this->status,
            'note' => $this->note,
            'token' => $this->token,
        ]);

        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetUsersap($UsersapId)
    {
        $this->resetValidation();

        $this->Usersap  = Usersapp::find($UsersapId);
        $this->UsersapId = $this->Usersap->id;
        $this->user_id = $this->Usersap->user_id;
        $this->computer_number = $this->Usersap->computer_number;
        $this->name = $this->Usersap->name;
        $this->password = $this->Usersap->password;
        $this->email = $this->Usersap->email;
        $this->phone_number = $this->Usersap->phone_number;
        $this->national_id = $this->Usersap->national_id;
        $this->status = $this->Usersap->status;
        $this->note = $this->Usersap->note;
        $this->token = $this->Usersap->token;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'computer_number' => 'required|unique:usersapps,computer_number,' . $this->UsersapId,
            'name' => 'required',
            'password' => 'required',
            'email' => 'nullable|email',
            'phone_number' => 'nullable|regex:/^07\d{9}$/',
        ], [
            'computer_number.required' => 'حقل رقم الحاسبة مطلوب',
            'computer_number.unique' => 'رقم الحاسبة موجود مسبقاً',
            'name.required' => 'حقل الاسم مطلوب',
            'password.required' => 'حقل كلمة السر مطلوب',
            'email.email' => 'يجب ادخال بريد الكتروني صحيح',
            'phone_number.regex' => 'رقم الهاتف يجب أن يبدأ ب 07 ويتكون من 11 رقم',
        ]);

        $Usersapp = Usersapp::find($this->UsersapId);
        $Usersapp->update([
            'user_id' => Auth::user()->id,
            'computer_number' => $this->computer_number,
            'name' => $this->name,
            'password' => $this->password,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'national_id' => $this->national_id,
            'status' => $this->status,
            'note' => $this->note,
            'token' => $this->token,
        ]);

        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Usersapp = Usersapp::find($this->UsersapId);

        if ($Usersapp) {

            $Usersapp->delete();
            $this->reset();
            $this->dispatchBrowserEvent('success', [
                'message' => 'تم حذف البيانات بنجاح',
                'title' => 'الحذف'
            ]);
        }
    }
}

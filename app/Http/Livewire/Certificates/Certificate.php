<?php

namespace App\Http\Livewire\Certificates;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Certificates\Certificates;

class Certificate extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Certificates = [];
    public $CertificateSearch, $Certificate, $CertificateId;
    public $certificates_name;


    public function render()
    {
        $CertificateSearch = '%' . $this->CertificateSearch . '%';
        $Certificates = Certificates::where('certificates_name', 'LIKE', $CertificateSearch)


            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Certificates;
        $this->Certificates = collect($Certificates->items());
        return view('livewire.certificates.certificate', [
            'links' => $links
        ]);
    }

    public function AddCertificateModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('CertificateModalShow');
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'certificates_name' => 'required|unique:certificates',

        ], [
            'certificates_name.required' => 'حقل الاسم مطلوب',
            'certificates_name.unique' => 'الأسم موجود',
        ]);

        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);
        Certificates::create([
            'certificates_name' => $this->certificates_name,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetCertificate($CertificateId)
    {
        $this->resetValidation();

        $this->Certificate  = Certificates::find($CertificateId);
        $this->CertificateId = $this->Certificate->id;
        $this->certificates_name = $this->Certificate->certificates_name;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'certificates_name' => 'required|unique:certificates',

        ], [
            'certificates_name.required' => 'حقل الاسم مطلوب',
            'certificates_name.unique' => 'الأسم موجود',
        ]);

        $Certificates = Certificates::find($this->CertificateId);
        $Certificates->update([
            'certificates_name' => $this->certificates_name,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Certificates = Certificates::find($this->CertificateId);
        $Certificates->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات  بنجاح',
            'title' => 'الحذف '
        ]);
    }
}

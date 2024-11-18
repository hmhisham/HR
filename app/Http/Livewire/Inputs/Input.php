<?php

namespace App\Http\Livewire\Inputs;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\Iaccts\Iaccts;
use App\Models\Inputs\Inputs;
use App\Models\Itypes\Itypes;
use App\Models\Idepartments\Idepartments;

class Input extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Inputs = [];
    public $itypes = [];
    public $iaccts = [];
    public $idepartments = [];
    public $InputSearch, $Input, $InputId;
    public $user_id, $patch, $itype, $idocument, $idate, $idept, $icredt, $iacct, $isub, $icd = '', $idep, $irem, $note;

    protected $listeners = [
        'SelectItype',
        'SelectIacct',
        'SelectIdept',

        'SelectIacct' => 'updateIcd',
    ];
    public function hydrate()
    {
        $this->emit('select2');
        $this->emit('flatpickr');
    }
    public function mount()
    {
        $this->itypes = Itypes::all();
        $this->iaccts = Iaccts::all();
        $this->idepartments = Idepartments::all();
    }

    //استدعاء نوع القيد
    public function SelectItype($ItypeID)
    {
        $itype = Itypes::find($ItypeID);
        if ($itype) {
            $this->itype = $ItypeID;
        } else {
            $this->itype = null;
        }
    }
    //استدعاء الدليل المحاسبي
    public function SelectIacct($IacctID)
    {
        $iacct = Iaccts::find($IacctID);
        if ($iacct) {
            $this->iacct = $IacctID;
        } else {
            $this->iacct = null;
        }
    }

    //استدعاء قيد القسم
    public function SelectIdept($IdeptID)
    {
        $idept = Idepartments::find($IdeptID);
        if ($idept) {
            $this->idept = $IdeptID;
        } else {
            $this->idept = null;
        }
    }

    //اخذ رقم بداية الدليل
    public function updateIcd($iacctId)
    {
        $iacct = Iaccts::find($iacctId);
        if ($iacct) {
            $this->icd = substr($iacct->iacct, 0, 1); // افتراض أن الرقم الأول هو المطلوب
        } else {
            $this->icd = '';
        }
    }

    public function render()
    {
        $InputSearch = '%' . $this->InputSearch . '%';
        $Inputs = Inputs::where('patch', 'LIKE', $InputSearch)
            ->orWhere('itype', 'LIKE', $InputSearch)
            ->orWhere('idocument', 'LIKE', $InputSearch)
            ->orWhere('idate', 'LIKE', $InputSearch)
            ->orWhere('idept', 'LIKE', $InputSearch)
            ->orWhere('icredt', 'LIKE', $InputSearch)
            ->orWhere('iacct', 'LIKE', $InputSearch)
            ->orWhere('isub', 'LIKE', $InputSearch)
            ->orWhere('icd', 'LIKE', $InputSearch)
            ->orWhere('idep', 'LIKE', $InputSearch)
            ->orWhere('irem', 'LIKE', $InputSearch)
            ->orWhere('note', 'LIKE', $InputSearch)


            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Inputs;
        $this->Inputs = collect($Inputs->items());
        return view('livewire.inputs.input', [
            'links' => $links
        ]);
    }

    public function AddInputModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('InputModalShow');
    }


    public function store()
    {
        $this->resetValidation();

        // التحقق من وجود مبلغ المدين أو مبلغ الدائن
        if (empty($this->idept) && empty($this->icredt)) {
            $this->addError('idept', 'يجب إدخال مبلغ المدين أو مبلغ الدائن.');
            $this->addError('icredt', 'يجب إدخال مبلغ المدين أو مبلغ الدائن.');
            return;
        }

        // التحقق من الحقول الأخرى
        $this->validate([
            'patch' => 'required',
            'itype' => 'required',
            'idocument' => 'required',
            'idate' => 'required',
            'iacct' => 'required',
            'isub' => 'required',
            'icd' => 'required',
            'idep' => 'required',
            'irem' => 'required',
        ], [
            'patch.required' => 'حقل رقم الزرمة مطلوب',
            'itype.required' => 'حقل نوع القيد مطلوب',
            'idocument.required' => 'حقل رقم المستند مطلوب',
            'idate.required' => 'حقل تاريخ المستند مطلوب',
            'iacct.required' => 'حقل الدليل مطلوب',
            'isub.required' => 'حقل الافرادي مطلوب',
            'icd.required' => 'حقل بداية الدليل مطلوب',
            'idep.required' => 'حقل القسم مطلوب',
            'irem.required' => 'حقل البيان مطلوب',
        ]);

        Inputs::create([
            'patch' => $this->patch,
            'itype' => $this->itype,
            'idocument' => $this->idocument,
            'idate' => $this->idate,
            'idept' => $this->idept ?? 0, // وضع القيمة الافتراضية 0 إذا لم يتم إدخالها
            'icredt' => $this->icredt ?? 0, // وضع القيمة الافتراضية 0 إذا لم يتم إدخالها
            'iacct' => $this->iacct,
            'isub' => $this->isub,
            'icd' => $this->icd,
            'idep' => $this->idep,
            'irem' => $this->irem,
            'note' => $this->note,
        ]);

        $this->reset();

        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }


    public function GetInput($InputId)
    {
        $this->resetValidation();

        $this->Input  = Inputs::find($InputId);
        $this->InputId = $this->Input->id;
        $this->user_id = $this->Input->user_id;
        $this->patch = $this->Input->patch;
        $this->itype = $this->Input->itype;
        $this->idocument = $this->Input->idocument;
        $this->idate = $this->Input->idate;
        $this->idept = $this->Input->idept;
        $this->icredt = $this->Input->icredt;
        $this->iacct = $this->Input->iacct;
        $this->isub = $this->Input->isub;
        $this->icd = $this->Input->icd;
        $this->idep = $this->Input->idep;
        $this->irem = $this->Input->irem;
        $this->note = $this->Input->note;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            //'user_id' => 'required:inputs',
            'patch' => 'required:inputs',
            'itype' => 'required:inputs',
            'idocument' => 'required:inputs',
            'idate' => 'required:inputs',
            'idept' => 'required:inputs',
            'icredt' => 'required:inputs',
            'iacct' => 'required:inputs',
            'isub' => 'required:inputs',
            'icd' => 'required:inputs',
            'idep' => 'required:inputs',
            'irem' => 'required:inputs',
            //'note' => 'required:inputs',

        ], [
            //'user_id.required' => 'حقل رقم المستخدم مطلوب',
            'patch.required' => 'حقل رقم الزرمة مطلوب',
            'itype.required' => 'حقل نوع القيد مطلوب',
            'idocument.required' => 'حقل رقم المستند مطلوب',
            'idate.required' => 'حقل تاريخ المستند مطلوب',
            'idept.required' => 'حقل مبلغ المدين مطلوب',
            'icredt.required' => 'حقل مبلغ الدائن مطلوب',
            'iacct.required' => 'حقل الدليل مطلوب',
            'isub.required' => 'حقل الافرادي مطلوب',
            'icd.required' => 'حقل بداية الدليل مطلوب',
            'idep.required' => 'حقل القسم مطلوب',
            'irem.required' => 'حقل البيان مطلوب',
            //'note.required' => 'حقل ملاحظات مطلوب',
        ]);

        $Inputs = Inputs::find($this->InputId);
        $Inputs->update([
            //'user_id' => $this->user_id,
            'patch' => $this->patch,
            'itype' => $this->itype,
            'idocument' => $this->idocument,
            'idate' => $this->idate,
            'idept' => $this->idept,
            'icredt' => $this->icredt,
            'iacct' => $this->iacct,
            'isub' => $this->isub,
            'icd' => $this->icd,
            'idep' => $this->idep,
            'irem' => $this->irem,
            'note' => $this->note,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Inputs = Inputs::find($this->InputId);

        if ($Inputs) {

            $Inputs->delete();
            $this->reset();
            $this->dispatchBrowserEvent('success', [
                'message' => 'تم حذف البيانات بنجاح',
                'title' => 'الحذف'
            ]);
        }
    }
}

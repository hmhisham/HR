<?php

namespace App\Http\Livewire\Positions;

use Livewire\Component;

use App\Models\Units\Units;
use Livewire\WithPagination;
use App\Models\Branch\Branch;
use App\Models\Workers\Workers;
use App\Models\Linkages\Linkages;
use App\Models\Sections\Sections;
use App\Models\Positions\Positions;
use Illuminate\Support\Facades\Auth;

class Position extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $workers = [];
    public $linkages = [];
    public $sections = [];
    public $branch = [];
    public $units = [];
    public $Positions = [];
    public $PositionSearch, $Position, $PositionId;
    public $user_id, $worker_id, $linkage_id, $section_id, $branch_id, $unit_id, $position_name, $position_order_number, $position_order_date, $position_start_date, $commissioning_type, $commissioning_statu, $p_notes;


    protected $listeners = [
        'SelectWorkerId',
        'GetLinkage',
        'GetSection',
        'GetBranch',
        'GetUnit',
    ];
    public function hydrate()
    {
        $this->emit('select2');
        $this->emit('flatpickr');
    }
    public function mount()
    {
        $this->workers = Workers::all();
        $this->linkages = Linkages::all();
    }

    public function SelectWorkerId($WorkerIdID)
    {
        $worker_id = Workers::find($WorkerIdID);
        if ($worker_id) {
            $this->worker_id = $WorkerIdID;
        } else {
            $this->worker_id = null;
        }
    }

    public function GetLinkage($Linkage_id)
    {
        $this->linkage_id = $Linkage_id;
        $this->sections = Sections::where('linkage_id', $Linkage_id)->get();
    }

    public function GetSection($Section_id)
    {
        $this->section_id = $Section_id;
        $this->branch = Branch::where('section_id', $Section_id)->get();
    }

    public function GetBranch($Branch_id)
    {
        $this->branch_id = $Branch_id;
        $this->units = Units::where('branch_id', $Branch_id)->get();
    }

    public function GetUnit($Unit_id)
    {
        $this->unit_id = $Unit_id;
    }

    public function render()
    {
        $PositionSearch = '%' . $this->PositionSearch . '%';
        $Positions = Positions::where('user_id', 'LIKE', $PositionSearch)
            ->orWhere('worker_id', 'LIKE', $PositionSearch)
            ->orWhere('linkage_id', 'LIKE', $PositionSearch)
            ->orWhere('section_id', 'LIKE', $PositionSearch)
            ->orWhere('branch_id', 'LIKE', $PositionSearch)
            ->orWhere('unit_id', 'LIKE', $PositionSearch)
            ->orWhere('position_name', 'LIKE', $PositionSearch)
            ->orWhere('position_order_number', 'LIKE', $PositionSearch)
            ->orWhere('position_order_date', 'LIKE', $PositionSearch)
            ->orWhere('position_start_date', 'LIKE', $PositionSearch)
            ->orWhere('commissioning_type', 'LIKE', $PositionSearch)
            ->orWhere('commissioning_statu', 'LIKE', $PositionSearch)
            ->orWhere('p_notes', 'LIKE', $PositionSearch)


            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Positions;
        $this->Positions = collect($Positions->items());
        return view('livewire.positions.position', [
            'links' => $links
        ]);
    }

    public function AddPositionModalShow()
    {
        $this->reset(['worker_id', 'linkage_id', 'section_id', 'branch_id', 'unit_id', 'position_name', 'position_order_number', 'position_order_date', 'position_start_date', 'commissioning_type', 'commissioning_statu', 'p_notes']);
        $this->resetValidation();
        $this->dispatchBrowserEvent('PositionModalShow');
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'worker_id' => 'required',
            'linkage_id' => 'required',
            'section_id' => 'required',
            'branch_id' => 'required',
            'unit_id' => 'required',
            'position_name' => 'required',
            'position_order_number' => 'required',
            'position_order_date' => 'required',
            'position_start_date' => 'required',
            'commissioning_type' => 'required',
            'commissioning_statu' => 'required',


        ], [
            'worker_id.required' => 'حقل الاسم مطلوب',
            'linkage_id.required' => 'حقل الارتباط مطلوب',
            'section_id.required' => 'حقل القسم مطلوب',
            'branch_id.required' => 'حقل الشعبة مطلوب',
            'unit_id.required' => 'حقل الوحدة مطلوب',
            'position_name.required' => 'حقل اسم المنصب مطلوب',
            'position_order_number.required' => 'حقل رقم امر التكليف مطلوب',
            'position_order_date.required' => 'حقل تاريخ أمر التكليف مطلوب',
            'position_start_date.required' => 'حقل تاريخ المباشرة بالنصب مطلوب',
            'commissioning_type.required' => 'حقل نوع التكليف مطلوب',
            'commissioning_statu.required' => 'حقل حالة التكليف مطلوب',

        ]);

        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);


        Positions::create([
            'user_id' => Auth::id(),
            'user_id' => $this->user_id,
            'worker_id' => $this->worker_id,
            'linkage_id' => $this->linkage_id,
            'section_id' => $this->section_id,
            'branch_id' => $this->branch_id,
            'unit_id' => $this->unit_id,
            'position_name' => $this->position_name,
            'position_order_number' => $this->position_order_number,
            'position_order_date' => $this->position_order_date,
            'position_start_date' => $this->position_start_date,
            'commissioning_type' => $this->commissioning_type,
            'commissioning_statu' => $this->commissioning_statu,
            'p_notes' => $this->p_notes,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetPosition($PositionId)
    {
        $this->resetValidation();

        $this->Position  = Positions::find($PositionId);
        $this->PositionId = $this->Position->id;
        $this->user_id = $this->Position->user_id;
        $this->worker_id = $this->Position->worker_id;
        $this->linkage_id = $this->Position->linkage_id;
        $this->section_id = $this->Position->section_id;
        $this->branch_id = $this->Position->branch_id;
        $this->unit_id = $this->Position->unit_id;
        $this->position_name = $this->Position->position_name;
        $this->position_order_number = $this->Position->position_order_number;
        $this->position_order_date = $this->Position->position_order_date;
        $this->position_start_date = $this->Position->position_start_date;
        $this->commissioning_type = $this->Position->commissioning_type;
        $this->commissioning_statu = $this->Position->commissioning_statu;
        $this->p_notes = $this->Position->p_notes;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([

            'worker_id' => 'required:positions',
            'linkage_id' => 'required:positions',
            'section_id' => 'required:positions',
            'branch_id' => 'required:positions',
            'unit_id' => 'required:positions',
            'position_name' => 'required:positions',
            'position_order_number' => 'required:positions',
            'position_order_date' => 'required:positions',
            'position_start_date' => 'required:positions',
            'commissioning_type' => 'required:positions',
            'commissioning_statu' => 'required:positions',


        ], [
         
            'worker_id.required' => 'حقل الاسم مطلوب',
            'linkage_id.required' => 'حقل الارتباط مطلوب',
            'section_id.required' => 'حقل القسم مطلوب',
            'branch_id.required' => 'حقل الشعبة مطلوب',
            'unit_id.required' => 'حقل الوحدة مطلوب',
            'position_name.required' => 'حقل اسم المنصب مطلوب',
            'position_order_number.required' => 'حقل رقم امر التكليف مطلوب',
            'position_order_date.required' => 'حقل تاريخ أمر التكليف مطلوب',
            'position_start_date.required' => 'حقل تاريخ المباشرة بالنصب مطلوب',
            'commissioning_type.required' => 'حقل نوع التكليف مطلوب',
            'commissioning_statu.required' => 'حقل حالة التكليف مطلوب',

        ]);

        $Positions = Positions::find($this->PositionId);
        $Positions->update([
            'user_id' => Auth::id(),
            'worker_id' => $this->worker_id,
            'linkage_id' => $this->linkage_id,
            'section_id' => $this->section_id,
            'branch_id' => $this->branch_id,
            'unit_id' => $this->unit_id,
            'position_name' => $this->position_name,
            'position_order_number' => $this->position_order_number,
            'position_order_date' => $this->position_order_date,
            'position_start_date' => $this->position_start_date,
            'commissioning_type' => $this->commissioning_type,
            'commissioning_statu' => $this->commissioning_statu,
            'p_notes' => $this->p_notes,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Positions = Positions::find($this->PositionId);

        if ($Positions) {

            $Positions->delete();
            $this->reset();
            $this->dispatchBrowserEvent('success', [
                'message' => 'تم حذف البيانات بنجاح',
                'title' => 'الحذف'
            ]);
        }
    }
}

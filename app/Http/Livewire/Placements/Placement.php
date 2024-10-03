<?php

namespace App\Http\Livewire\Placements;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\Workers\Workers;
use App\Models\Linkages\Linkages;
use App\Models\Sections\Sections;
use Illuminate\Support\Facades\Auth;
use App\Models\Placements\Placements;

class Placement extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $workers = [];
    public $linkages = [];
    public $sections = [];
    public $Placements = [];
    public $PlacementSearch, $Placement, $PlacementId;
    public $user_id, $worker_id, $linkage_id, $section_id, $branch_id, $unit_id, $placement_order_number, $placement_order_date, $release_date, $start_date;


    protected $listeners = [
        'SelectWorkerId',
        'SelectLinkageId',
        'SelectSectionId',
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


    public function SelectLinkageId($Linkage_id)
    {
        $this->linkage_id = $Linkage_id;
        $this->sections = Sections::where('linkage_id', $Linkage_id)->get();
    }

    public function SelectSectionId($SectionIdID)
    {
        $section_id = Sections::find($SectionIdID);
        if ($section_id) {
            $this->section_id = $SectionIdID;
        } else {
            $this->section_id = null;
        }
    }
    public function render()
    {
        $PlacementSearch = '%' . $this->PlacementSearch . '%';
        $Placements = Placements::where('user_id', 'LIKE', $PlacementSearch)
            ->orWhere('worker_id', 'LIKE', $PlacementSearch)
            ->orWhere('linkage_id', 'LIKE', $PlacementSearch)
            ->orWhere('section_id', 'LIKE', $PlacementSearch)
            ->orWhere('branch_id', 'LIKE', $PlacementSearch)
            ->orWhere('unit_id', 'LIKE', $PlacementSearch)
            ->orWhere('placement_order_number', 'LIKE', $PlacementSearch)
            ->orWhere('placement_order_date', 'LIKE', $PlacementSearch)
            ->orWhere('release_date', 'LIKE', $PlacementSearch)
            ->orWhere('start_date', 'LIKE', $PlacementSearch)


            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Placements;
        $this->Placements = collect($Placements->items());
        return view('livewire.placements.placement', [
            'links' => $links
        ]);
    }

    public function AddPlacementModalShow()
    {
        // $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('PlacementModalShow');
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
            'placement_order_number' => 'required',
            'placement_order_date' => 'required',
            'release_date' => 'required',
            'start_date' => 'required',

        ], [

            'worker_id.required' => 'حقل الاسم مطلوب',
            'linkage_id.required' => 'حقل الارتباط مطلوب',
            'section_id.required' => 'حقل القسم مطلوب',
            'branch_id.required' => 'حقل الشعبة مطلوب',
            'unit_id.required' => 'حقل الوحدة مطلوب',
            'placement_order_number.required' => 'حقل رقم أمر التنسيب مطلوب',
            'placement_order_date.required' => 'حقل تاريخ أمر التنسيب مطلوب',
            'release_date.required' => 'حقل تاريخ الانفكاك مطلوب',
            'start_date.required' => 'حقل تاريخ المباشرة مطلوب',
        ]);

        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);


        Placements::create([
            'user_id' => Auth::id(),
            'user_id' => $this->user_id,
            'worker_id' => $this->worker_id,
            'linkage_id' => $this->linkage_id,
            'section_id' => $this->section_id,
            'branch_id' => $this->branch_id,
            'unit_id' => $this->unit_id,
            'placement_order_number' => $this->placement_order_number,
            'placement_order_date' => $this->placement_order_date,
            'release_date' => $this->release_date,
            'start_date' => $this->start_date,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetPlacement($PlacementId)
    {
        $this->resetValidation();

        $this->Placement  = Placements::find($PlacementId);
        $this->PlacementId = $this->Placement->id;
        $this->user_id = $this->Placement->user_id;
        $this->worker_id = $this->Placement->worker_id;
        $this->linkage_id = $this->Placement->linkage_id;
        $this->section_id = $this->Placement->section_id;
        $this->branch_id = $this->Placement->branch_id;
        $this->unit_id = $this->Placement->unit_id;
        $this->placement_order_number = $this->Placement->placement_order_number;
        $this->placement_order_date = $this->Placement->placement_order_date;
        $this->release_date = $this->Placement->release_date;
        $this->start_date = $this->Placement->start_date;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'user_id' => 'required:placements',
            'worker_id' => 'required:placements',
            'linkage_id' => 'required:placements',
            'section_id' => 'required:placements',
            'branch_id' => 'required:placements',
            'unit_id' => 'required:placements',
            'placement_order_number' => 'required:placements',
            'placement_order_date' => 'required:placements',
            'release_date' => 'required:placements',
            'start_date' => 'required:placements',

        ], [
            'user_id.required' => 'حقل رقم المستخدم مطلوب',
            'worker_id.required' => 'حقل الاسم مطلوب',
            'linkage_id.required' => 'حقل الارتباط مطلوب',
            'section_id.required' => 'حقل القسم مطلوب',
            'branch_id.required' => 'حقل الشعبة مطلوب',
            'unit_id.required' => 'حقل الوحدة مطلوب',
            'placement_order_number.required' => 'حقل رقم أمر التنسيب مطلوب',
            'placement_order_date.required' => 'حقل تاريخ أمر التنسيب مطلوب',
            'release_date.required' => 'حقل تاريخ الانفكاك مطلوب',
            'start_date.required' => 'حقل تاريخ المباشرة مطلوب',
        ]);

        $Placements = Placements::find($this->PlacementId);
        $Placements->update([
            'user_id' => $this->user_id,
            'worker_id' => $this->worker_id,
            'linkage_id' => $this->linkage_id,
            'section_id' => $this->section_id,
            'branch_id' => $this->branch_id,
            'unit_id' => $this->unit_id,
            'placement_order_number' => $this->placement_order_number,
            'placement_order_date' => $this->placement_order_date,
            'release_date' => $this->release_date,
            'start_date' => $this->start_date,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Placements = Placements::find($this->PlacementId);

        if ($Placements) {

            $Placements->delete();
            $this->reset();
            $this->dispatchBrowserEvent('success', [
                'message' => 'تم حذف البيانات بنجاح',
                'title' => 'الحذف'
            ]);
        }
    }
}

<?php
namespace App\Http\Livewire\Placements;
use Livewire\Component;
use App\Models\Units\Units;
use Livewire\WithPagination;
use App\Models\Branch\Branch;
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
    public $branch = [];
    public $units = [];
    public $Placements = [];
    public $PlacementSearch, $Placement, $PlacementId, $linkageName, $SectionsName, $branch_name, $UnitName;
    public $user_id, $worker_id, $worker_full_name, $linkage_id, $section_id, $branch_id, $unit_id, $placement_order_number, $placement_order_date, $release_date, $start_date;

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

    public function render()
    {
        return view('livewire.placements.show-placement.show-placement');
    }

    public function GetPlacement($PlacementId)
    {
        $this->resetValidation();
        $this->Placement = Placements::find($PlacementId);
        $this->PlacementId = $this->Placement->id;
        $this->worker_id = $this->Placement->worker_id;
        $this->linkage_id = $this->Placement->linkage_id;
        $this->section_id = $this->Placement->section_id;
        $this->branch_id = $this->Placement->branch_id;
        $this->unit_id = $this->Placement->unit_id;
        $this->placement_order_number = $this->Placement->placement_order_number;
        $this->placement_order_date = $this->Placement->placement_order_date;
        $this->release_date = $this->Placement->release_date;
        $this->start_date = $this->Placement->start_date;
        $this->sections = $this->Placement->Getlinkage->GetSections;
        $this->linkageName = $this->Placement->Getsection->Getlinkage->Linkages_name;
        $this->SectionsName = $this->Placement->Getsection->section_name;
        $this->branch = $this->Placement->Getsection->GetBranch;
        $this->units = $this->Placement->Getbranc->GetUnit;
        $this->worker_full_name = $this->Placement->Getworker->full_name;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'worker_id' => 'required:placements',
            'linkage_id' => 'required:placements',
            //'section_id' => 'required:placements',
            'placement_order_number' => 'required:placements',
            'placement_order_date' => 'required:placements',
            'release_date' => 'required:placements',
            'start_date' => 'required:placements',
        ], [
            'worker_id.required' => 'حقل الاسم مطلوب',
            'linkage_id.required' => 'حقل الارتباط مطلوب',
            //'section_id.required' => 'حقل القسم مطلوب',
            'placement_order_number.required' => 'حقل رقم أمر التنسيب مطلوب',
            'placement_order_date.required' => 'حقل تاريخ أمر التنسيب مطلوب',
            'release_date.required' => 'حقل تاريخ الانفكاك مطلوب',
            'start_date.required' => 'حقل تاريخ المباشرة مطلوب',
        ]);
        $Placements = Placements::find($this->PlacementId);
        $Placements->update([
            'user_id' => Auth::id(),
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
        $this->reset(['id', 'worker_id', 'linkage_id', 'section_id', 'branch_id', 'unit_id', 'placement_order_number', 'placement_order_date', 'release_date', 'start_date']);
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
            $this->reset(['id', 'worker_id', 'linkage_id', 'section_id', 'branch_id', 'unit_id', 'placement_order_number', 'placement_order_date', 'release_date', 'start_date']);
            $this->dispatchBrowserEvent('success', [
                'message' => 'تم حذف البيانات بنجاح',
                'title' => 'الحذف'
            ]);
        }
    }
}

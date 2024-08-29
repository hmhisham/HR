<?php
namespace App\Http\Livewire\Workers;
use Livewire\Component;
use App\Models\Areas\Areas;
use Livewire\WithPagination;
use App\Models\Workers\Workers;
use App\Models\Districts\Districts;
use App\Models\Governorates\Governorates;

class AddWorker extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $currentTap = 1;
    public $GovernorateID   ,$governorate_id , $district_id , $area_id   ;
    public $Governorates = [];
    public $Districts = [];
    public $Areas = [];
    public $graduations=[];
    public $specializations=[];



    public function mount()
    {
        $this->Governorates = Governorates::all();
        $this->Areas = Areas::all();
        $this->Districts = Districts::all();
    }

    Public function render(){
    return view('livewire.Workers.AddWorker');

    }

    public function GetDistricts($GovernorateID)
    {
        $this->GovernorateID = $GovernorateID;
        $this->Districts = Districts::where('governorate_id', $GovernorateID)->get();
    }
    public function GetAreas($DistrictID)
    {
        $this->Areas = Areas::where('governorate_id', $this->GovernorateID)
            ->where('district_id', $DistrictID)
            ->get();
    }


    public function buttonStep($step)
    {
        if ($step == 1) {
            $this->currentTap = 1;
        }

    elseif  ($step == 2) {
        $this->currentTap = 2;
    }
    elseif  ($step == 3) {
        $this->currentTap = 3;
    }
    elseif  ($step == 4) {
        $this->currentTap = 4;
    }
    elseif  ($step == 5) {
        $this->currentTap = 5;
    }
    elseif  ($step == 6) {
        $this->currentTap = 6;
    }
    elseif  ($step == 7) {
        $this->currentTap = 7;
    }
    elseif  ($step == 8) {
        $this->currentTap = 8;
    }
    }






 }

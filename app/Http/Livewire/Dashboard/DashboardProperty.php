<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Bonds\Bonds;
use App\Models\Boycotts\Boycotts;
use App\Models\Property\Property;

class DashboardProperty extends Component
{
    public function render()
    {
        return view('livewire.dashboard.dashboard-property');
    }
    public $boycottsCount,$propertyCount,$bondsCount;

    public function mount()
    {
        $this->boycottsCount = Boycotts::count();
        $this->bondsCount = Bonds::count();
        $this->propertyCount = Property::where('isdeleted', 0)->count();
    }
}

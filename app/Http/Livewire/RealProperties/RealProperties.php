<?php

namespace App\Http\Livewire\RealProperties;

use Livewire\Component;
use App\Models\Plots\Plots;
use Livewire\WithPagination;
use App\Models\Branch\Branch;
use Livewire\WithFileUploads;
use App\Models\Governorates\Governorates;
use App\Models\Propertytypes\Propertytypes;

class RealProperties extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Plots = [];
    public $propertytypes = [];
    public $governorates = [];
    public $Districts = [];
    public $branch = [];
    public $filePreview, $property_deed_image;
    public $search = ['province_number' => '', 'province_name' => '', 'plot_number' => ''];

    public function mount()
    {
        //$this->Plot = Plots::all();
        $this->governorates = Governorates::all();
        $this->propertytypes = Propertytypes::all();
        $this->branch = Branch::all();
    }

    public function render()
    {
        $searchNumber = '%' . $this->search['province_number'] . '%';
        $searchName = '%' . $this->search['province_name'] . '%';
        $searchPlotNumber = '%' . $this->search['plot_number'] . '%';

        $Plots = Plots::with(['GetProvinces', 'GetRealities'])
            ->when($this->search['province_number'], function ($query) use ($searchNumber) {
                $query->whereHas('GetProvinces', function ($q) use ($searchNumber) {
                    $q->where('province_number', 'LIKE', $searchNumber);
                });
            })
            ->when($this->search['province_name'], function ($query) use ($searchName) {
                $query->whereHas('GetProvinces', function ($q) use ($searchName) {
                    $q->where('province_name', 'LIKE', $searchName);
                });
            })
            ->when($this->search['plot_number'], function ($query) use ($searchPlotNumber) {
                $query->where('plot_number', 'LIKE', $searchPlotNumber);
            })
            ->where('specialized_department', 17)
            ->where('visibility', '1')
            ->orderBy('id', 'ASC')
            ->paginate(10);

        $links = $Plots;
        $this->Plots = collect($Plots->items());

        return view('livewire.real-properties.real-properties', [
            'links' => $links,
        ]);
    }
}

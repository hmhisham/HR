<?php

namespace App\Http\Livewire\Plots;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Plots\Plots;
use App\Models\Provinces\Provinces;
use Illuminate\Support\Facades\Auth;

class Plot extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Provinces = [];
    public $Province;
    public $plot, $plotId;
    public $user_id, $province_id, $plot_name;
    public $search = ['province_number' => '', 'province_name' => ''];

    /* public function updated($propertyName)
    {
        $this->resetPage();
    } */

    public function render()
    {
        /* $searchNumber = '%' . $this->search['province_number'] . '%';
        $searchName = '%' . $this->search['province_name'] . '%'; */

        /* $Provinces = Provinces::query()
            ->when($this->search['province_number'], function ($query) use ($searchNumber) {
                $query->where('province_number', 'LIKE', $searchNumber);
            })
            ->when($this->search['province_name'], function ($query) use ($searchName) {
                $query->orWhere('province_name', 'LIKE', $searchName);
            })
            ->orderBy('id', 'ASC')
            ->paginate(10); */

        $this->Provinces = Provinces::all();

        /* $links = $Provinces;
        $this->Provinces = collect($Provinces->items()); */

        return view('livewire.plots.plot', [
            /* 'Provinces' => $Provinces, */
            /* 'links' => $links */
        ]);
    }

    public function AddPlot($ProvinceID)
    {
        $this->reset('province_id', 'plot_name');
        $this->resetValidation();
        $this->dispatchBrowserEvent('AddPlotModal');

        $this->province_id = $ProvinceID;
    }

    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'plot_name' => 'required',
        ], [
            'plot_name.required' => 'حقل رقم القطعة مطلوب',
        ]);

        Plots::create([
            'user_id' => Auth::User()->id,
            'province_id' => $this->province_id,
            'plot_name' => $this->plot_name,
        ]);

        //$this->reset();
        /* $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]); */
    }

    public function GetPlot($plotId)
    {
        $this->resetValidation();

        $this->plot = Plots::find($plotId);
        $this->plotId = $this->plot->id;
        $this->user_id = $this->plot->user_id;
        $this->province_id = $this->plot->province_id;
        $this->plot_name = $this->plot->plot_name;
    }
}

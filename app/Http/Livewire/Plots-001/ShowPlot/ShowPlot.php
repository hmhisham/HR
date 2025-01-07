<?php

namespace App\Http\Livewire\Plots\ShowPlot;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Plots\Plots;
use App\Models\Provinces\Provinces;
use Illuminate\Support\Facades\Auth;

class ShowPlot extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Plots = [];
    public $ProvincePlots = [];
    public $province = [];
    public $Province;
    public $plotSearch, $plot, $plotId;
    public $user_id, $province_id, $plot_name;

    public function mount($province_id)
    {
        $this->province_id = $province_id;
        $this->Province = Provinces::find($this->province_id);
        $this->ProvincePlots = $this->Province ? $this->Province->GetPlots : [];
    }

    public function render()
    {
        $plotSearch = '%' . $this->plotSearch . '%';
        $Plots = Plots::where('province_id', $this->province_id)
            ->where(function ($query) use ($plotSearch) {
                $query->where('user_id', 'LIKE', $plotSearch)
                    ->orWhere('province_id', 'LIKE', $plotSearch)
                    ->orWhere('plot_name', 'LIKE', $plotSearch);
            })
            ->orderBy('id', 'ASC')
            ->paginate(10);

        return view('livewire.plots.show-plot.show-plot', [
            'ProvincePlots' => $Plots,
            'links' => $Plots
        ]);
    }

    public function AddplotModal()
    {
        $this->reset('plot_name');
        $this->resetValidation();
        $this->dispatchBrowserEvent('AddPlotModal');
    }

    public function store()
    {
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

        $this->resetExcept('province_id');
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetPlot($plotId)
    {
        $this->resetValidation();
        $this->plot = Plots::find($plotId);

        if ($this->plot) {
            $this->plotId = $this->plot->id;
            $this->user_id = $this->plot->user_id;
            $this->province_id = $this->plot->province_id;
            $this->plot_name = $this->plot->plot_name;
            $this->province = $this->plot->GetProvince;
        }
    }

    public function update()
    {
        $this->validate([
            'plot_name' => 'required',
        ], [
            'plot_name.required' => 'حقل رقم القطعة مطلوب',
        ]);

        $Plots = Plots::find($this->plotId);
        $Plots->update([
            'user_id' => Auth::User()->id,
            'province_id' => $this->province_id,
            'plot_name' => $this->plot_name,
        ]);

        $this->resetExcept('province_id');
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
        $this->mount($this->province_id);
    }

    public function destroy()
    {
        $Plots = Plots::find($this->plotId);

        if ($Plots) {
            $Plots->delete();
            $this->reset();
            $this->dispatchBrowserEvent('success', [
                'message' => 'تم حذف البيانات بنجاح',
                'title' => 'الحذف'
            ]);
            $this->mount($this->province_id);
        }
    }
}

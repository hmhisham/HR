<?php

namespace App\Http\Livewire\Plot;

use Livewire\Component;
use App\Models\Plots\Plots;
use App\Models\Provinces\Provinces;
use Illuminate\Support\Facades\Auth;

class Show extends Component
{
    public $Provinceid;
    public $Province;
    public $Plots = [];
    public $plot_number, $Plot;

    public function mount()
    {
        $this->Province = Provinces::find($this->Provinceid);
        $this->Plots = $this->Province->GetPlots;
    }

    public function render()
    {
        return view('livewire.plot.show');
    }

    public function addPlotModal()
    {
        $this->reset('plot_number');
        $this->resetValidation();
        $this->dispatchBrowserEvent('PlotModalShow');
    }

    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'plot_number' => 'required',
        ], [
            'plot_number.required' => 'رقم القطعة مطلوب',
        ]);

        Plots::create([
            'user_id' => Auth::User()->id,
            'province_id' => $this->Province->id,
            'plot_number' => $this->plot_number,
        ]);

        $this->reset('plot_number');
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافة بنجاح',
            'title' => 'اضافة'
        ]);
        $this->mount();
    }

    public function GetPlot($Plotid)
    {
        $this->Plot = Plots::find($Plotid);
        $this->plot_number = $this->Plot->plot_number;

        $this->dispatchBrowserEvent('editPlotModalShow');
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'plot_number' => 'required',
        ], [
            'plot_number.required' => 'رقم القطعة مطلوب',
        ]);

        $this->Plot->update([
            'user_id' => Auth::User()->id,
            'plot_number' => $this->plot_number,
        ]);

        $this->reset('plot_number');
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
        $this->mount();
    }

    public function destroy()
    {
        $this->Plot->delete();

        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الحذف بنجاح',
            'title' => 'حذف'
        ]);
        $this->mount();
    }
}

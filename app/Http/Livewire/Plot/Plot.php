<?php

namespace App\Http\Livewire\Plot;

use Livewire\Component;
use App\Models\Plots\Plots;
use App\Models\Provinces\Provinces;
use Illuminate\Support\Facades\Auth;

class Plot extends Component
{
    public $Provinces = [];
    public $Province, $ProvinceId;
    public $province_number, $province_name;
    public $plot_number;

    public function mount()
    {
        $this->Provinces = Provinces::all();
    }

    public function render()
    {
        return view('livewire.plot.plot');
    }

    public function AddProvinceModal()
    {
        $this->reset('province_number', 'province_name');
        $this->resetValidation();
        $this->dispatchBrowserEvent('ProvinceModalShow');
    }

    public function storeProvince()
    {
        $this->resetValidation();
        $this->validate([
            'province_number' => 'required|unique:provinces,province_number',
            'province_name' => 'required',

        ], [
            'province_number.required' => 'حقل رقم المقاطعة مطلوب',
            'province_number.unique' => 'رقم المقاطعة موجود',
            'province_name.required' => 'حقل اسم المقاطعة مطلوب',
        ]);

        Provinces::create([
            'user_id' => Auth::User()->id,
            'province_number' => $this->province_number,
            'province_name' => $this->province_name,
        ]);

        $this->reset('province_number', 'province_name');
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافة بنجاح',
            'title' => 'اضافة'
        ]);
        $this->mount();
    }

    public function GetProvince($ProvinceId, $isPlot = false)
    {
        $this->resetValidation();

        $this->Province = Provinces::find($ProvinceId);
        $this->ProvinceId = $this->Province->id;
        $this->province_number = $this->Province->province_number;
        $this->province_name = $this->Province->province_name;

        if (!$isPlot) {
            $this->dispatchBrowserEvent('editProvinceModalShow');
        } else {
            $this->dispatchBrowserEvent('addPlotToProvinceModal');
        }
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'province_number' => 'required|unique:provinces,province_number,' . $this->Province->id . ',id',
            'province_name' => 'required:provinces',

        ], [
            'province_number.required' => 'حقل رقم المقاطعة مطلوب',
            'province_number.unique' => 'رقم المقاطعة موجود',
            'province_name.required' => 'حقل اسم المقاطعة مطلوب',
        ]);

        $this->Province->update([
            'user_id' => Auth::User()->id,
            'province_number' => $this->province_number,
            'province_name' => $this->province_name,
        ]);

        $this->reset('province_number', 'province_name');
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
        $this->mount();
    }

    public function addPlotToProvince($ProvinceId)
    {
        $this->reset('plot_name');
        $this->dispatchBrowserEvent('addPlotToProvinceModal');
    }

    public function storePlot()
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
}

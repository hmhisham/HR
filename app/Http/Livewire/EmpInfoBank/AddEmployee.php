<?php

namespace App\Http\Livewire\EmpInfoBank;

use Livewire\Component;

class AddEmployee extends Component
{
    public $currentStep = 1;
    public $activatedStep = 'active';
    public $crossedStep = 'crossed';

    public function render()
    {
        return view('livewire.emp-info-bank.add-employee');
    }
}

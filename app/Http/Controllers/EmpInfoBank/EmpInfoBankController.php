<?php

namespace App\Http\Controllers\EmpInfoBank;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Livewire\Districts\District;

class EmpInfoBankController extends Controller
{
    public function index()
    {
        Return View('content.EmpInfoBank.index');
    }

    public function addEmployee()
    {
        Return View('content.EmpInfoBank.addEmployee');
    }

 
}

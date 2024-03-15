<?php

namespace App\Http\Controllers\EmpInfoBank;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

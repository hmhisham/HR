<?php
namespace App\Http\Controllers\Inputs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class InputsController extends Controller
{
    public function index()
    {
        Return View('content.Inputs.index'); 
    }
}

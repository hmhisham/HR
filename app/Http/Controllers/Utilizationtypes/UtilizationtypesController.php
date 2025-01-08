<?php
namespace App\Http\Controllers\Utilizationtypes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class UtilizationtypesController extends Controller
{
    public function index()
    {
        return view('content.Utilizationtypes.index');
    }
}

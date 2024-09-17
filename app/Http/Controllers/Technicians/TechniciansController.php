<?php
namespace App\Http\Controllers\Technicians;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class TechniciansController extends Controller
{
    public function index()
    {
        Return View('content.Technicians.index'); 
    }
}

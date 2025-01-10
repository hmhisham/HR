<?php
namespace App\Http\Controllers\Realities;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RealitiesController extends Controller
{
    public function index()
    {
        return view('content.Realities.index');
    }

    public function ShowRealitie($Plotid)
    {
        return view('content.Realities.show', [
            'Plotid' => $Plotid
        ]);
    }
}

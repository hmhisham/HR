<?php
namespace App\Http\Controllers\Realities;

use App\Http\Controllers\Controller;
use App\Models\Plots\Plots;
use Illuminate\Http\Request;

class RealitiesController extends Controller
{
    public function index()
    {
        return view('content.Realities.index');
    }

    public function ShowRealitie($Plotid)
    {
        $Plot = Plots::with('GetProvinces')->find($Plotid);
        $Province = $Plot->GetProvinces;

        return view('content.Realities.show', [
            'Plotid' => $Plotid,
            'Provinceid' => $Province->id,
            'Province' => $Province,
            'Plot' => $Plot,
        ]);
    }
}

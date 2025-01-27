<?php

namespace App\Http\Controllers\RealProperty;

use App\Models\Plots\Plots;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RealProperty\BuyerTenant;
use App\Http\Livewire\RealProperties\RealProperties;

class RealPropertyController extends Controller
{
    public function index()
    {
        return view('content.RealProperty.index');
    }

    public function showRealProperty($Plotid)
    {
        $Plot = Plots::with('GetProvinces')->find($Plotid);
        $Province = $Plot->GetProvinces;

        return view('content.RealProperty.show-real-properties', [
            'Plotid' => $Plotid,
            'Provinceid' => $Province->id,
            'Province' => $Province,
            'Plot' => $Plot,
        ]);
    }

    public function ShowBuyerTenant($RealPropertyNumber, $BuyerTenantid)
    {
        /* $Plot = RealProperties::where('property_number')->find($RealPropertyNumber);
        $Plot = BuyerTenant::with('GetProvinces')->find($BuyerTenantid);
        $Province = $Plot->GetProvinces; */

        return view('content.RealProperty.show-buyer-tenant', [
            'RealPropertyNumber' => $RealPropertyNumber,
            'BuyerTenantid' => $BuyerTenantid,
        ]);
    }
}

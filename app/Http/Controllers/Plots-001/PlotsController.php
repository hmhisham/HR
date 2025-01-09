<?php
namespace App\Http\Controllers\Plots;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class PlotsController extends Controller
{
    public function index()
    {
        return view('content.Plots.index');
    }

    public function PlotShow($id)
    {
        return view('content.Plots.show', [
            'id' => $id
        ]);
    }
}
<?php
namespace App\Http\Controllers\Positions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class PositionsController extends Controller
{
    public function index()
    {
        return view('content.Positions.index');
    }
}

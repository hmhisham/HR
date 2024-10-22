<?php
namespace App\Http\Controllers\Positions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class PositionsController extends Controller
{
    public function index()
    {
        Return View('content.Positions.index'); 
    }
}

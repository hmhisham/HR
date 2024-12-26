<?php
namespace App\Http\Controllers\Iaccts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class IacctsController extends Controller
{
    public function index()
    {
        return view('content.Iaccts.index');
    }
}

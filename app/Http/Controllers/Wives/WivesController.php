<?php
namespace App\Http\Controllers\Wives;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class WivesController extends Controller
{
    public function index()
    {
        return view('content.Wives.index');
    }
}

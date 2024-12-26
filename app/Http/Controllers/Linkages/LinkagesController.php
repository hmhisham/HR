<?php
namespace App\Http\Controllers\Linkages;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class LinkagesController extends Controller
{
    public function index()
    {
        return view('content.Linkages.index');
    }
}

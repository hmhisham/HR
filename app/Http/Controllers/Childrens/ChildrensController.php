<?php
namespace App\Http\Controllers\Childrens;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class ChildrensController extends Controller
{
    public function index()
    {
        return view('content.Childrens.index');
    }
}

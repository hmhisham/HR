<?php
namespace App\Http\Controllers\Childrens;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class ChildrensController extends Controller
{
    public function index()
    {
        Return View('content.Childrens.index'); 
    }
}

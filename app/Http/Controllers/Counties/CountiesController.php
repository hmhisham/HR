<?php
namespace App\Http\Controllers\Counties;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class CountiesController extends Controller
{
    public function index()
    {
        Return View('content.Counties.index'); 
    }
}

<?php
namespace App\Http\Controllers\Itypes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class ItypesController extends Controller
{
    public function index()
    {
        Return View('content.Itypes.index'); 
    }
}
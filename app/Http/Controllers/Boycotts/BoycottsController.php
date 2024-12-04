<?php
namespace App\Http\Controllers\Boycotts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class BoycottsController extends Controller
{
    public function index()
    {
        Return View('content.Boycotts.index'); 
    }
}

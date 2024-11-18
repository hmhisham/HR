<?php
namespace App\Http\Controllers\Iaccts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class IacctsController extends Controller
{
    public function index()
    {
        Return View('content.Iaccts.index'); 
    }
}

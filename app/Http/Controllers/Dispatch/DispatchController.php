<?php
namespace App\Http\Controllers\Dispatch;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class DispatchController extends Controller
{
    public function index()
    {
        Return View('content.Dispatch.index'); 
    }
}

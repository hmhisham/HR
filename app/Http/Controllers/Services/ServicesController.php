<?php
namespace App\Http\Controllers\Services;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class ServicesController extends Controller
{
    public function index()
    {
        Return View('content.Services.index'); 
    }
}

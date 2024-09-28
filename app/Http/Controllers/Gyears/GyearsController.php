<?php
namespace App\Http\Controllers\Gyears;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class GyearsController extends Controller
{
    public function index()
    {
        Return View('content.Gyears.index'); 
    }
}

<?php
namespace App\Http\Controllers\Propertypayd;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class PropertypaydController extends Controller
{
    public function index()
    {
        Return View('content.Propertypayd.index'); 
    }
}

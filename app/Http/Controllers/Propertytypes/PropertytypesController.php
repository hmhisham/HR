<?php
namespace App\Http\Controllers\Propertytypes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class PropertytypesController extends Controller
{
    public function index()
    {
        Return View('content.Propertytypes.index'); 
    }
}

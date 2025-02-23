<?php
namespace App\Http\Controllers\Propertypayd;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class PropertypaydController extends Controller
{
    public function index($id)
    {
        return view('content.Propertypayd.index', compact('id'));
    }
}

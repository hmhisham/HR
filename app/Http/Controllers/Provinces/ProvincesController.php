<?php
namespace App\Http\Controllers\Provinces;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class ProvincesController extends Controller
{
    public function index()
    {
        return view('content.Provinces.index');
    }
}

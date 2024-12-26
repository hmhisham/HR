<?php
namespace App\Http\Controllers\Holidays;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class HolidaysController extends Controller
{
    public function index()
    {
        return view('content.Holidays.index');
    }
}

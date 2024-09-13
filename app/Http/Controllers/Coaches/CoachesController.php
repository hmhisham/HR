<?php
namespace App\Http\Controllers\Coaches;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class CoachesController extends Controller
{
    public function index()
    {
        Return View('content.Coaches.index'); 
    }
}

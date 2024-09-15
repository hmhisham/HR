<?php
namespace App\Http\Controllers\Linkages;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class LinkagesController extends Controller
{
    public function index()
    {
        Return View('content.Linkages.index'); 
    }
}

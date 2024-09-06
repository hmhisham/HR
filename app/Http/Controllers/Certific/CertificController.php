<?php
namespace App\Http\Controllers\Certific;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class CertificController extends Controller
{
    public function index()
    {
        Return View('content.Certific.index'); 
    }
}

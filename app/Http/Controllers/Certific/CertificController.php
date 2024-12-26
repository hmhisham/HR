<?php
namespace App\Http\Controllers\Certific;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CertificController extends Controller
{
    public function index()
    {
        return view('content.Certific.index');
    }

    public function CertifiShow($id)
    {
        return view('content.Certific.show', [
            'id' => $id
        ]);
    }
}

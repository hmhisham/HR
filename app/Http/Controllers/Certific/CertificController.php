<?php
namespace App\Http\Controllers\Certific;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CertificController extends Controller
{
    public function index()
    {
        Return View('content.Certific.index');
    }

    public function CertifiShow($id)
    {
        Return View('content.Certific.show', [
            'id' => $id
        ]);
    }
}

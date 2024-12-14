<?php
namespace App\Http\Controllers\Services;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class ServicesController extends Controller
{
    public function index()
    {
        Return View('content.Services.index'); 
    }

 public function ServiceShow($id)
    {
        Return View('content.Services.show', [
            'id' => $id
        ]);
    }
}

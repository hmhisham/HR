<?php
namespace App\Http\Controllers\Services;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class ServicesController extends Controller
{
    public function index()
    {
        return view('content.Services.index');
    }

 public function ServiceShow($id)
    {
        return view('content.Services.show', [
            'id' => $id
        ]);
    }
}

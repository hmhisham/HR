<?php

namespace App\Http\Controllers\PrivateEmployeeFiles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrivateEmployeeFilesController extends Controller
{
    public function index()
    {
        return view('content.PrivateEmployeeFiles.index');
    }
}

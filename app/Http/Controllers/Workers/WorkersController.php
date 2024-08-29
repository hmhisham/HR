<?php

namespace App\Http\Controllers\Workers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Return View('content.Workers.index');
    }

    public function addWorker()
    {
        Return View('content.Workers.addWorker');
    }

}

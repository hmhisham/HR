<?php

namespace App\Http\Controllers\Workers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkersController extends Controller
{
    /**z
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.Workers.index');
    }

    public function addWorker()
    {
        //Return View('content.Workers.forms-pickers');
        return view('content.Workers.addWorker');
    }

}

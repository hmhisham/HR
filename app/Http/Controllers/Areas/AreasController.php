<?php

namespace App\Http\Controllers\Areas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AreasController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:area-list|area-create|area-edit|area-delete', ['only' => ['index','store']]);
        $this->middleware('permission:area-create', ['only' => ['create','store']]);
        $this->middleware('permission:area-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:area-delete', ['only' => ['destroy']]);
    }

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Return View('content.Areas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

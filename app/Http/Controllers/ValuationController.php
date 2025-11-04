<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValuationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($property_folder_id = null)
    {
        return view('content.Valuation.index', [
            'property_folder_id' => $property_folder_id
        ]);
    }
}


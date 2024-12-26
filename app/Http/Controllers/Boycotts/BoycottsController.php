<?php

namespace App\Http\Controllers\Boycotts;

use App\Http\Controllers\Controller;
use App\Models\Boycotts\Boycotts;
use Yajra\DataTables\DataTables;

class BoycottsController extends Controller
{
    public function index()
    {
        return view('content.Boycotts.index');
    }
    public function getData()
    {
        $boycotts = Boycotts::select(['id', 'boycott_number', 'boycott_name']);

        return DataTables::of($boycotts)
            ->addColumn('action', function ($row) {
                return view('partials.action-buttons', compact('row'))->render();
            })
            ->rawColumns(['action']) // Ensure HTML isn't escaped
            ->make(true);
    }


}

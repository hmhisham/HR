<?php

namespace App\Http\Controllers\Penalties;

use Illuminate\Http\Request;
use App\Models\Workers\Workers;
use App\Http\Controllers\Controller;

class WorkerSearchController extends Controller
{
    public function search(Request $request)
    {
        $workers = Workers::where('full_name', 'LIKE', $request->input('term', '').'%')->
            orderBy('full_name', 'ASC')->
            take(10)->
            get(['id', 'full_name as text']);

        return ['results' => $workers];
    }
}

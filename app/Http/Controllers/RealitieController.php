<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\RealitiesExport;
use Maatwebsite\Excel\Facades\Excel;


class RealitieController extends Controller
{

    public function export(Request $request)
    {
        $selectedIds = $request->input('ids'); // الحصول على IDs المحددة من الرابط
        $selectedIdsArray = $selectedIds ? explode(',', $selectedIds) : null;

        return Excel::download(new RealitiesExport($selectedIdsArray), 'realities.xlsx');
    }
}

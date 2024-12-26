<?php
namespace App\Http\Controllers\Placements;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class PlacementsController extends Controller
{
    public function index()
    {
        return view('content.Placements.index');
    }

    public function PlacementShow($id)
    {
        return view('content.Placements.show', [
            'id' => $id
        ]);
    }
}

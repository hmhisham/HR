<?php
namespace App\Http\Controllers\Property;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class PropertyController extends Controller
{
    public function index()
    {
        return view('content.Property.index');
    }

    public function PropertyShow($id)
    {
        return view('content.Property.show', [
            'id' => $id
        ]);
    }
}

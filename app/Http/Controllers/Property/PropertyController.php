<?php
namespace App\Http\Controllers\Property;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class PropertyController extends Controller
{
    public function index()
    {
        Return View('content.Property.index');
    }

    public function PropertyShow($id)
    {
        Return View('content.Property.show', [
            'id' => $id
        ]);
    }
}

<?php
namespace App\Http\Controllers\Propertylocation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class PropertylocationController extends Controller
{
    public function index()
    {
        Return View('content.Propertylocation.index'); 
    }

    public function PropertylocatioShow($id)
    {
        Return View('content.Propertylocation.show', [
            'id' => $id
        ]);
    }
}

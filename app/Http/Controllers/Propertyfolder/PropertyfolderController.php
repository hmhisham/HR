<?php
namespace App\Http\Controllers\Propertyfolder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class PropertyfolderController extends Controller
{
    public function index()
    {
        Return View('content.Propertyfolder.index'); 
    }

    public function PropertyfoldeShow($id)
    {
        Return View('content.Propertyfolder.show', [
            'id' => $id
        ]);
    }
}

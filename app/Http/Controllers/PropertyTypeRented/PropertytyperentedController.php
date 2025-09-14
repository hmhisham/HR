<?php
namespace App\Http\Controllers\Propertytyperented;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class PropertytyperentedController extends Controller
{
    public function index()
    {
        Return View('content.Propertytyperented.index'); 
    }

    public function PropertytyperenteShow($id)
    {
        Return View('content.Propertytyperented.show', [
            'id' => $id
        ]);
    }
}

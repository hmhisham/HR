<?php
namespace App\Http\Controllers\Descriptionrented;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class DescriptionrentedController extends Controller
{
    public function index()
    {
        Return View('content.Descriptionrented.index'); 
    }

    public function DescriptionrenteShow($id)
    {
        Return View('content.Descriptionrented.show', [
            'id' => $id
        ]);
    }
}

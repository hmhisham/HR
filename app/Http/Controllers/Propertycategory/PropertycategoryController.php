<?php
namespace App\Http\Controllers\Propertycategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class PropertycategoryController extends Controller
{
    public function index()
    {
        Return View('content.Propertycategory.index'); 
    }
}

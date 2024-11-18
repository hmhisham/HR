<?php
namespace App\Http\Controllers\Idepartments;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class IdepartmentsController extends Controller
{
    public function index()
    {
        Return View('content.Idepartments.index'); 
    }
}

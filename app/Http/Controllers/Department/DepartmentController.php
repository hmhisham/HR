<?php
namespace App\Http\Controllers\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class DepartmentController extends Controller
{
    public function index()
    {
        Return View('content.Department.index'); 
    }
}
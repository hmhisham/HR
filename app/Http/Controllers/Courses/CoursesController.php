<?php
namespace App\Http\Controllers\Courses;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class CoursesController extends Controller
{
    public function index()
    {
        Return View('content.Courses.index'); 
    }
}

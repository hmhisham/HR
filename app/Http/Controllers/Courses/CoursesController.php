<?php
namespace App\Http\Controllers\Courses;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class CoursesController extends Controller
{
    public function index()
    {
        return view('content.Courses.index');
    }
}

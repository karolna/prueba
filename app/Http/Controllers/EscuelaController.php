<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Student;

class EscuelaController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $courses = Course::all();
        return view('dashboard', compact('students', 'courses'));
    }
    
}

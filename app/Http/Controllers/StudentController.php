<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Course;


class StudentController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function index() {
        $students = Student::all();
        return view('students.index', compact('students'));
    }
    
    // Registrar estudiante 

    public function create() {
        return view('students.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name'=> 'required|string|max:200',
            'cedula' => 'required|string|max:25',
            'email' => 'nullable|string',
        ]);
        Student::create($request->only('name','cedula','description'));
        return redirect()->route('students.create')->with('success', 'Estudiante registrado.');
    }
    //asignar curso a un estudiante 
    public function createCoursesByStudentForm ( $studentId){
        $student=Student::findOrFail($studentId);
        $courses = Course::all();
        return view('students.assign', compact('student', 'courses'));
    }

    public function createCoursesByStudent (Request $request, $studentId){
        $request->validate([

            
            'courses'=> 'required|array',
            'courses.*' => 'exists:courses,id',
        ]);
        $student = Student::findOrFail($studentId);
        $student->courses()->sync($request->courses);
        return redirect()->route('students.assign.form', $studentId)->with('success', 'Cursos asignados al estudiante.');
    }

    public function showAssignedCourses($id)
    {
        $student = Student::with('courses')->findOrFail($id);
        return view('students.assigned-courses', compact('student'));
    }
}

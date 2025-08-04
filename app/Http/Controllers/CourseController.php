<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Student;



class CourseController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index() {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }
    // Registrar cursos 

    public function create() {
        return view('courses.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name'=> 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        Course::create($request->only('name','description'));
        return redirect()->route('courses.create')->with('success', 'Curso registrado.');
    }

    //asignar estudiantes a un curso 
    public function createStudentsByCourseForm ( $courseId){
        $course=Course::findOrFail($courseId);
        $students = Student::all();
        return view('courses.assign', compact('course', 'students'));
    }

    public function createStudentsByCourse (Request $request, $courseId){
        $request->validate([
            'students'=> 'required|array',
            'students.*' => 'exists:students,id',
        ]);
        $course = Course::findOrFail($courseId);
        $course->students()->sync($request->students);
        return redirect()->route('courses.assign.form', $courseId)->with('success', 'Estudiantes asignados al curso.');
    }

    public function showAssignedStudents($id)
    {
        $course = Course::with('students')->findOrFail($id);
        return view('courses.assigned-students', compact('course'));
    }
}

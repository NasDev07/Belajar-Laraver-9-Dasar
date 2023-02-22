<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        // eloquent orm (rekomendasikan)
        // query builder (masih ok)
        // raw query (tidak recomendasikan)

        // $student = Student::with('class.homeroomTeacher', 'extracurriculars')->get(); // select * from students
        $student = Student::get(); // select * from students
        return view('student', ['studentList' => $student]);
    }

    public function show($id)
    {
        $student = Student::with(['class.homeroomTeacher', 'extracurriculars'])->findOrFail($id);
        return view('student-detail', ['student' => $student]);
    }

    public function create()
    {
        $class = ClassRoom::select('id', 'name')->get();
        return view('student-add', ['class' => $class]);
    }

    public function store(Request $request)
    {
        $student = new Student();

        // $student->name = $request->name;
        // $student->gende = $request->gende;
        // $student->nis = $request->nis;
        // $student->class_id = $request->class_id;
        // $student->save();

        $student->create($request->all());

        return redirect('/students');
    }
}

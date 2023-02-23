<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentCreateRequest;
use App\Models\ClassRoom;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function index()
    {
        // eloquent orm (rekomendasikan)
        // query builder (masih ok)
        // raw query (tidak recomendasikan)

        // $student = Student::with('class.homeroomTeacher', 'extracurriculars')->get(); // select * from students
        $student = Student::paginate(10); // select * from students
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

    public function store(StudentCreateRequest $request)
    {
        // $validated = $request->validate([
        //     'nis' => 'unique:students|max:10|required',
        //     'name' => 'max:50|required',
        //     'class_id' => 'required',
        //     'gende' => 'required',
        // ]);

        $student = Student::create($request->all());

        if ($student) {
            Session::flash('status', 'success');
            Session::flash('message', 'add new students success');
        }

        return redirect('/students');
    }

    public function edit(Request $request, $id)
    {
        $student = Student::with('class')->findOrFail($id);
        $class = ClassRoom::where('id', '!=', $student->class->id)->get(['id', 'name']);

        return view('student-edit', ['student' => $student, 'class' => $class]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $student = Student::findOrFail($id);
        $student->update($request->all());

        if ($student) {
            Session::flash('status', 'success');
            Session::flash('message', 'update students success');
        }

        return redirect('/students');
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);
        return view('student-delete', ['student' => $student]);
    }

    public function destroy($id)
    {
        $deletedstudent = Student::findOrFail($id);
        $deletedstudent->delete();

        if ($deletedstudent) {
            Session::flash('status', 'success');
            Session::flash('message', 'delete students success');
        }

        return redirect('/students');
    }

    public function deletedStudent()
    {
        $studentdeleted = Student::onlyTrashed()->get(); // select * from students
        return view('student-delete-list', ['studentDeleted' => $studentdeleted]);
    }

    public function restore($id)
    {
        $deletedstudent = Student::withTrashed()->where('id', $id)->restore();

        if ($deletedstudent) {
            Session::flash('status', 'success');
            Session::flash('message', 'restore students success');
        }

        return redirect('/students');
    }
}

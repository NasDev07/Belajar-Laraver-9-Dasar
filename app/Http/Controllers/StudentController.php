<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StudentCreateRequest;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        // eloquent orm (rekomendasikan)
        // query builder (masih ok)
        // raw query (tidak recomendasikan)

        $keyword = $request->keyword;

        $student = Student::with('class')
            ->where('name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('gende', $keyword)
            ->orWhere('nis', 'LIKE', '%' . $keyword . '%')
            ->orWhereHas('class', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            })
            ->paginate(10);

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

        $newName = '';

        if ($request->file('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->name . '-' . now()->timestamp . '.' . $extension;
            $request->file('photo')->storeAS('photo', $newName);
        }

        $request['image'] = $newName;
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
        //upload new image
        $student = Student::findOrFail($id);
        $oldPhoto = $student->image;
        $file_path = 'photo/' . $oldPhoto;

        $newName = '';

        if ($request->file('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->name . '-' . now()->timestamp . '.' . $extension;
            $request->file('photo')->storeAS('photo', $newName);
            $request['image'] = $newName;

            //delete old image
            if (isset($oldPhoto) || $oldPhoto != '') {
                if (Storage::exists($file_path)) {
                    Storage::delete($file_path);
                } else {
                    dd('file gk ada!');
                }
            }
        } else {
            $student['image'] = $oldPhoto;
        }

        //update image
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

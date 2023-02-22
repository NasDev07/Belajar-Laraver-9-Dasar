<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $techer = Teacher::all();
        return view('teacher', ['teacherList' => $techer]);
    }

    public function show($id)
    {
        $techer = Teacher::with('class.students')->findOrFail($id);
        return view('teacher-detail', ['teacher' => $techer]);
    }
}

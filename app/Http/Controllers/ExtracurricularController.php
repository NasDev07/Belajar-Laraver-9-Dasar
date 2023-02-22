<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use Illuminate\Http\Request;

class ExtracurricularController extends Controller
{
    public function index()
    {
        // $skskul = Extracurricular::with('students')->get();
        $skskul = Extracurricular::get();
        return view('ektracurricular', ['ekskulList' => $skskul]);
    }

    public function show($id)
    {
        $skskul = Extracurricular::with('students')->findOrFail($id);
        return view('ektracurricular-detail', ['ekskul' => $skskul]);
    }
}

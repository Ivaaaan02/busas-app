<?php

namespace App\Http\Controllers;

use App\Models\Student_Graduation_Info;
use Illuminate\Http\Request;

class Student_Graduation_InfoController extends Controller
{
    public function index()
    {
        $student_Graduation_Infos = Student_Graduation_Info::all();
        return view('student_Graduation_Infos.index', compact('student_Graduation_Infos'));
    }

    public function create()
    {
        return view('student_Graduation_Infos.create');
    }

    public function store(Request $request)
    {
        $student_Graduation_Info = new Student_Graduation_Info();
        $student_Graduation_Info->fill($request->all());
        $student_Graduation_Info->save();
        return redirect()->route('student_Graduation_Infos.index');
    }

    public function show($id)
    {
        $student_Graduation_Info = Student_Graduation_Info::find($id);
        return view('student_Graduation_Infos.show', compact('student_Graduation_Info'));
    }

    public function edit($id)
    {
        $studentGraduationInfo = Student_Graduation_Info::find($id);
        return view('student_Graduation_Infos.edit', compact('student_Graduation_Info'));
    }

    public function update(Request $request, $id)
    {
        $student_Graduation_Info = Student_Graduation_Info::find($id);
        $student_Graduation_Info->fill($request->all());
        $student_Graduation_Info->save();
        return redirect()->route('student_Graduation_Infos.index');
    }

    public function destroy($id)
    {
        $student_Graduation_Info = Student_Graduation_Info::find($id);
        $student_Graduation_Info->delete();
        return redirect()->route('student_Graduation_Infos.index');
    }
}
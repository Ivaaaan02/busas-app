<?php

namespace App\Http\Controllers;

use App\Models\Student_Registration_Info;
use Illuminate\Http\Request;

class Student_Registration_InfoController extends Controller
{
    public function index()
    {
        $student_Registration_Infos = Student_Registration_Info::all();
        return view('student_Registration_Infos.index', compact('student_Registration_Infos'));
    }

    public function create()
    {
        return view('student_Registration_Infos.create');
    }

    public function store(Request $request)
    {
        $student_Registration_Info = new Student_Registration_Info();
        $student_Registration_Info->fill($request->all());
        $student_Registration_Info->save();
        return redirect()->route('student_Registration_Infos.index');
    }

    public function show($id)
    {
        $student_Registration_Info = Student_Registration_Info::find($id);
        return view('student_Registration_Infos.show', compact('student_Registration_Info'));
    }

    public function edit($id)
    {
        $student_Registration_Info = Student_Registration_Info::find($id);
        return view('student_Registration_Infos.edit', compact('student_Registration_Info'));
    }

    public function update(Request $request, $id)
    {
        $student_Registration_Info = Student_Registration_Info::find($id);
        $student_Registration_Info->fill($request->all());
        $student_Registration_Info->save();
        return redirect()->route('student_Registration_Infos.index');
    }

    public function destroy($id)
    {
        $student_Registration_Info = Student_Registration_Info::find($id);
        $student_Registration_Info->delete();
        return redirect()->route('student_Registration_Infos.index');
    }
}
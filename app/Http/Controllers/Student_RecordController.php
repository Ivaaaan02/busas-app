<?php

namespace App\Http\Controllers;

use App\Models\Student_Record;
use Illuminate\Http\Request;

class Student_RecordController extends Controller
{
    public function index()
    {
        $student_Records = Student_Record::all();
        return view('student_Records.index', compact('student_Records'));
    }

    public function create()
    {
        return view('student_Records.create');
    }

    public function store(Request $request)
    {
        $student_Record = new Student_Record();
        $student_Record->fill($request->all());
        $student_Record->save();
        return redirect()->route('student_Records.index');
    }

    public function show($id)
    {
        $student_Record = Student_Record::find($id);
        return view('student_Records.show', compact('student_Record'));
    }

    public function edit($id)
    {
        $student_Record = Student_Record::find($id);
        return view('student_Records.edit', compact('student_Record'));
    }

    public function update(Request $request, $id)
    {
        $student_Record = Student_Record::find($id);
        $student_Record->fill($request->all());
        $student_Record->save();
        return redirect()->route('student_Records.index');
    }

    public function destroy($id)
    {
        $student_Record = Student_Record::find($id);
        $student_Record->delete();
        return redirect()->route('student_Records.index');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $student = new Student();
        $student->fill($request->all());
        $student->save();
        return redirect()->route('students.index');
    }

    public function show($id)
    {
        $student = Student::find($id);
        return view('students.show', compact('student'));
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->fill($request->all());
        $student->save();
        return redirect()->route('students.index');
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('students.index');
    }
}
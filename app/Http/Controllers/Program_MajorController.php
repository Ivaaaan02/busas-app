<?php

namespace App\Http\Controllers;

use App\Models\Program_Major;
use Illuminate\Http\Request;

class Program_MajorController extends Controller
{
    public function index()
    {
        $program_Majors = Program_Major::all();
        return view('program_Majors.index', compact('program_Majors'));
    }

    public function create()
    {
        return view('program_Majors.create');
    }

    public function store(Request $request)
    {
        $program_Major = new Program_Major();
        $program_Major->fill($request->all());
        $program_Major->save();
        return redirect()->route('program_Majors.index');
    }

    public function show($id)
    {
        $program_Major = Program_Major::find($id);
        return view('program_Majors.show', compact('program_Major'));
    }

    public function edit($id)
    {
        $program_Major = Program_Major::find($id);
        return view('program_Majors.edit', compact('program_Major'));
    }

    public function update(Request $request, $id)
    {
        $program_Major = Program_Major::find($id);
        $program_Major->fill($request->all());
        $program_Major->save();
        return redirect()->route('program_Majors.index');
    }

    public function destroy($id)
    {
        $program_Major = Program_Major::find($id);
        $program_Major->delete();
        return redirect()->route('program_Majors.index');
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        return view('programs.index', compact('programs'));
    }

    public function create()
    {
        return view('programs.create');
    }

    public function store(Request $request)
    {
        $program = new Program();
        $program->fill($request->all());
        $program->save();
        return redirect()->route('programs.index');
    }

    public function show($id)
    {
        $program = Program::find($id);
        return view('programs.show', compact('program'));
    }

    public function edit($id)
    {
        $program = Program::find($id);
        return view('programs.edit', compact('program'));
    }

    public function update(Request $request, $id)
    {
        $program = Program::find($id);
        $program->fill($request->all());
        $program->save();
        return redirect()->route('programs.index');
    }

    public function destroy($id)
    {
        $program = Program::find($id);
        $program->delete();
        return redirect()->route('programs.index');
    }
}
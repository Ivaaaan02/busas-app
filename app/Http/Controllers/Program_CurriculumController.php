<?php

namespace App\Http\Controllers;

use App\Models\Program_Curriculum;
use Illuminate\Http\Request;

class Program_CurriculumController extends Controller
{
    public function index()
    {
        $program_Curricula = Program_Curriculum::all();
        return view('program_Curricula.index', compact('program_Curricula'));
    }

    public function create()
    {
        return view('program_Curricula.create');
    }

    public function store(Request $request)
    {
        $program_Curriculum = new Program_Curriculum();
        $program_Curriculum->fill($request->all());
        $program_Curriculum->save();
        return redirect()->route('program_Curricula.index');
    }

    public function show($id)
    {
        $program_Curriculum = Program_Curriculum::find($id);
        return view('program_Curricula.show', compact('program_Curriculum'));
    }

    public function edit($id)
    {
        $program_Curriculum = Program_Curriculum::find($id);
        return view('program_Curricula.edit', compact('program_Curriculum'));
    }

    public function update(Request $request, $id)
    {
        $program_Curriculum = Program_Curriculum::find($id);
        $program_Curriculum->fill($request->all());
        $program_Curriculum->save();
        return redirect()->route('program_Curricula.index');
    }

    public function destroy($id)
    {
        $program_Curriculum = Program_Curriculum::find($id);
        $program_Curriculum->delete();
        return redirect()->route('program_Curricula.index');
    }
}
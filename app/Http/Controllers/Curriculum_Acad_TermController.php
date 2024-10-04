<?php

namespace App\Http\Controllers;

use App\Models\Curriculum_Acad_Term;
use Illuminate\Http\Request;

class Curriculum_Acad_TermController extends Controller
{
    public function index()
    {
        $curriculum_Acad_Terms = Curriculum_Acad_Term::all();
        return view('curriculum_Acad_Terms.index', compact('curriculum_Acad_Terms'));
    }

    public function create()
    {
        return view('curriculum_Acad_Terms.create');
    }

    public function store(Request $request)
    {
        $curriculum_Acad_Term = new Curriculum_Acad_Term();
        $curriculum_Acad_Term->fill($request->all());
        $curriculum_Acad_Term->save();
        return redirect()->route('curriculum_Acad_Terms.index');
    }

    public function show($id)
    {
        $curriculum_Acad_Term = Curriculum_Acad_Term::find($id);
        return view('curriculum_Acad_Terms.show', compact('curriculum_Acad_Term'));
    }

    public function edit($id)
    {
        $curriculum_Acad_Term = Curriculum_Acad_Term::find($id);
        return view('curriculum_Acad_Terms.edit', compact('curriculum_Acad_Term'));
    }

    public function update(Request $request, $id)
    {
        $curriculum_Acad_Term = Curriculum_Acad_Term::find($id);
        $curriculum_Acad_Term->fill($request->all());
        $curriculum_Acad_Term->save();
        return redirect()->route('curriculum_Acad_Terms.index');
    }

    public function destroy($id)
    {
        $curriculum_Acad_Term = Curriculum_Acad_Term::find($id);
        $curriculum_Acad_Term->delete();
        return redirect()->route('curriculum_Acad_Terms.index');
    }
}
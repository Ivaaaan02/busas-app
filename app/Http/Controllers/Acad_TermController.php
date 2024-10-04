<?php

namespace App\Http\Controllers;

use App\Models\Acad_Term;
use Illuminate\Http\Request;

class Acad_TermController extends Controller
{
    public function index()
    {
        $acad_Terms = Acad_Term::all();
        return view('acad_Terms.index', compact('acad_Terms'));
    }

    public function create()
    {
        return view('acad_Terms.create');
    }

    public function store(Request $request)
    {
        $acad_Term = new Acad_Term();
        $acad_Term->fill($request->all());
        $acad_Term->save();
        return redirect()->route('acad_Terms.index');
    }

    public function show($id)
    {
        $acad_Term = Acad_Term::find($id);
        return view('acad_Terms.show', compact('acad_Term'));
    }

    public function edit($id)
    {
        $acad_Term = Acad_Term::find($id);
        return view('acad_Terms.edit', compact('acad_Term'));
    }

    public function update(Request $request, $id)
    {
        $acad_Term = Acad_Term::find($id);
        $acad_Term->fill($request->all());
        $acad_Term->save();
        return redirect()->route('acad_Terms.index');
    }

    public function destroy($id)
    {
        $acad_Term = Acad_Term::find($id);
        $acad_Term->delete();
        return redirect()->route('acad_Terms.index');
    }
}
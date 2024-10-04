<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    public function index()
    {
        $curricula = Curriculum::all();
        return view('curricula.index', compact('curricula'));
    }

    public function create()
    {
        return view('curricula.create');
    }

    public function store(Request $request)
    {
        $curriculum = new Curriculum();
        $curriculum->fill($request->all());
        $curriculum->save();
        return redirect()->route('curricula.index');
    }

    public function show($id)
    {
        $curriculum = Curriculum::find($id);
        return view('curricula.show', compact('curriculum'));
    }

    public function edit($id)
    {
        $curriculum = Curriculum::find($id);
        return view('curricula.edit', compact('curriculum'));
    }

    public function update(Request $request, $id)
    {
        $curriculum = Curriculum::find($id);
        $curriculum->fill($request->all());
        $curriculum->save();
        return redirect()->route('curricula.index');
    }

    public function destroy($id)
    {
        $curriculum = Curriculum::find($id);
        $curriculum->delete();
        return redirect()->route('curricula.index');
    }
}
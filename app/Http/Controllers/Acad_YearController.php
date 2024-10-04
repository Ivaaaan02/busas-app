<?php

namespace App\Http\Controllers;

use App\Models\Acad_Year;
use Illuminate\Http\Request;

class Acad_YearController extends Controller
{
    public function index()
    {
        $acad_Years = Acad_Year::all();
        return view('acad_Years.index', compact('acad_Years'));
    }

    public function create()
    {
        return view('acad_Years.create');
    }

    public function store(Request $request)
    {
        $acad_Year = new Acad_Year();
        $acad_Year->fill($request->all());
        $acad_Year->save();
        return redirect()->route('acad_Years.index');
    }

    public function show($id)
    {
        $acad_Year = Acad_Year::find($id);
        return view('acad_Years.show', compact('acad_Year'));
    }

    public function edit($id)
    {
        $acad_Year = Acad_Year::find($id);
        return view('acad_Years.edit', compact('acad_Year'));
    }

    public function update(Request $request, $id)
    {
        $acad_Year = Acad_Year::find($id);
        $acad_Year->fill($request->all());
        $acad_Year->save();
        return redirect()->route('acad_Years.index');
    }

    public function destroy($id)
    {
        $acad_Year = Acad_Year::find($id);
        $acad_Year->delete();
        return redirect()->route('acad_Years.index');
    }
}
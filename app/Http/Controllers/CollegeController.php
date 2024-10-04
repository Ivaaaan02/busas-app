<?php

namespace App\Http\Controllers;

use App\Models\College;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    public function index()
    {
        $colleges = College::all();
        return view('colleges.index', compact('colleges'));
    }

    public function create()
    {
        return view('colleges.create');
    }

    public function store(Request $request)
    {
        $college = new College();
        $college->fill($request->all());
        $college->save();
        return redirect()->route('colleges.index');
    }

    public function show($id)
    {
        $college = College::find($id);
        return view('colleges.show', compact('college'));
    }

    public function edit($id)
    {
        $college = College::find($id);
        return view('colleges.edit', compact('college'));
    }

    public function update(Request $request, $id)
    {
        $college = College::find($id);
        $college->fill($request->all());
        $college->save();
        return redirect()->route('colleges.index');
    }

    public function destroy($id)
    {
        $college = College::find($id);
        $college->delete();
        return redirect()->route('colleges.index');
    }
}
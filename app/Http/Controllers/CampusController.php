<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use Illuminate\Http\Request;

class CampusController extends Controller
{
    public function index()
    {
        $campuses = Campus::all();
        return view('campuses.index', compact('campuses'));
    }

    public function create()
    {
        return view('campuses.create');
    }

    public function store(Request $request)
    {
        $campus = new Campus();
        $campus->fill($request->all());
        $campus->save();
        return redirect()->route('campuses.index');
    }

    public function show($id)
    {
        $campus = Campus::find($id);
        return view('campuses.show', compact('campus'));
    }

    public function edit($id)
    {
        $campus = Campus::find($id);
        return view('campuses.edit', compact('campus'));
    }

    public function update(Request $request, $id)
    {
        $campus = Campus::find($id);
        $campus->fill($request->all());
        $campus->save();
        return redirect()->route('campuses.index');
    }

    public function destroy($id)
    {
        $campus = Campus::find($id);
        $campus->delete();
        return redirect()->route('campuses.index');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Signatory;
use Illuminate\Http\Request;

class SignatoryController extends Controller
{
    public function index()
    {
        $signatories = Signatory::all();
        return view('signatories.index', compact('signatories'));
    }

    public function create()
    {
        return view('signatories.create');
    }

    public function store(Request $request)
    {
        $signatory = new Signatory();
        $signatory->fill($request->all());
        $signatory->save();
        return redirect()->route('signatories.index');
    }

    public function show($id)
    {
        $signatory = Signatory::find($id);
        return view('signatories.show', compact('signatory'));
    }

    public function edit($id)
    {
        $signatory = Signatory::find($id);
        return view('signatories.edit', compact('signatory'));
    }

    public function update(Request $request, $id)
    {
        $signatory = Signatory::find($id);
        $signatory->fill($request->all());
        $signatory->save();
        return redirect()->route('signatories.index');
    }

    public function destroy($id)
    {
        $signatory = Signatory::find($id);
        $signatory->delete();
        return redirect()->route('signatories.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    public function index()
    {
        $criterias = Criteria::all();
        return view('criterias.index', compact('criterias'));
    }

    public function create()
    {
        return view('criterias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:criterias|max:10',
            'name' => 'required',
            'weight' => 'required|integer|min:1',
            'type' => 'required|in:benefit,cost',
        ]);

        Criteria::create($request->all());
        return redirect()->route('criterias.index')->with('success', 'Kriteria berhasil ditambahkan');
    }

    public function show(Criteria $criteria)
    {
        return view('criterias.show', compact('criteria'));
    }

    public function edit(Criteria $criteria)
    {
        return view('criterias.edit', compact('criteria'));
    }

    public function update(Request $request, Criteria $criteria)
    {
        $request->validate([
            'code' => 'required|max:10|unique:criterias,code,'.$criteria->id,
            'name' => 'required',
            'weight' => 'required|integer|min:1',
            'type' => 'required|in:benefit,cost',
        ]);

        $criteria->update($request->all());
        return redirect()->route('criterias.index')->with('success', 'Kriteria berhasil diperbarui');
    }

    public function destroy(Criteria $criteria)
    {
        $criteria->delete();
        return redirect()->route('criterias.index')->with('success', 'Kriteria berhasil dihapus');
    }
}   
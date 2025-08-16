<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function index()
    {
        $professors = Professor::with('course')->latest()->paginate(10);
        return view('professors.index', compact('professors'));
    }

    public function create()
    {
        return view('professors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required','string','max:255'],
        ]);

        try {
            Professor::create($validated);
            return redirect()->route('professors.index')->with('success','Professor created successfully.');
        } catch (\Throwable $e) {
            report($e);
            return back()->withInput()->with('error','Failed to create professor. Please try again.');
        }
    }

    public function show(Professor $professor)
    {
        $professor->load('course');
        return view('professors.show', compact('professor'));
    }

    public function edit(Professor $professor)
    {
        return view('professors.edit', compact('professor'));
    }

    public function update(Request $request, Professor $professor)
    {
        $validated = $request->validate([
            'name' => ['required','string','max:255'],
        ]);

        try {
            $professor->update($validated);
            return redirect()->route('professors.index')->with('success','Professor updated successfully.');
        } catch (\Throwable $e) {
            report($e);
            return back()->withInput()->with('error','Failed to update professor. Please try again.');
        }
    }

    public function destroy(Professor $professor)
    {
        try {
            $professor->delete();
            return redirect()->route('professors.index')->with('success','Professor deleted successfully.');
        } catch (\Throwable $e) {
            report($e);
            return back()->with('error','Failed to delete professor. Please try again.');
        }
    }
}

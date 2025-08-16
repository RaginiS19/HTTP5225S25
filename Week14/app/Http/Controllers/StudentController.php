<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()->paginate(10);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'fname' => ['required','string','max:255'],
            'lname' => ['required','string','max:255'],
            'email' => ['nullable','email','max:255'],
        ]);

        try {
            Student::create($validated);
            return redirect()->route('students.index')->with('success', 'Student created successfully.');
        } catch (\Throwable $e) {
            report($e);
            return back()->withInput()->with('error', 'Failed to create student. Please try again.');
        }
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'fname' => ['required','string','max:255'],
            'lname' => ['required','string','max:255'],
            'email' => ['nullable','email','max:255'],
        ]);

        try {
            $student->update($validated);
            return redirect()->route('students.index')->with('success', 'Student updated successfully.');
        } catch (\Throwable $e) {
            report($e);
            return back()->withInput()->with('error', 'Failed to update student. Please try again.');
        }
    }

    public function destroy(Student $student)
    {
        try {
            $student->delete();
            return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
        } catch (\Throwable $e) {
            report($e);
            return back()->with('error', 'Failed to delete student. Please try again.');
        }
    }
}

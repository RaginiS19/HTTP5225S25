<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('courses')->latest()->paginate(10);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('students.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'fname' => ['required','string','max:255'],
            'lname' => ['required','string','max:255'],
            'email' => ['nullable','email','max:255'],
            'course_ids' => ['nullable', 'array'],
            'course_ids.*' => ['exists:courses,id'],
        ]);

        try {
            $student = Student::create([
                'fname' => $validated['fname'],
                'lname' => $validated['lname'],
                'email' => $validated['email'],
            ]);

            // Attach selected courses
            if (isset($validated['course_ids'])) {
                $student->courses()->attach($validated['course_ids']);
            }

            return redirect()->route('students.index')->with('success', 'Student created successfully.');
        } catch (\Throwable $e) {
            report($e);
            return back()->withInput()->with('error', 'Failed to create student. Please try again.');
        }
    }

    public function show(Student $student)
    {
        $student->load('courses');
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $courses = Course::all();
        $student->load('courses');
        return view('students.edit', compact('student', 'courses'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'fname' => ['required','string','max:255'],
            'lname' => ['required','string','max:255'],
            'email' => ['nullable','email','max:255'],
            'course_ids' => ['nullable', 'array'],
            'course_ids.*' => ['exists:courses,id'],
        ]);

        try {
            $student->update([
                'fname' => $validated['fname'],
                'lname' => $validated['lname'],
                'email' => $validated['email'],
            ]);

            // Sync selected courses
            $courseIds = $validated['course_ids'] ?? [];
            $student->courses()->sync($courseIds);

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

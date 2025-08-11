<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->paginate(10);
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required','string','max:255'],
            'description' => ['nullable','string'],
        ]);

        try {
            Course::create($validated);
            return redirect()->route('courses.index')->with('success','Course created successfully.');
        } catch (\Throwable $e) {
            report($e);
            return back()->withInput()->with('error','Failed to create course. Please try again.');
        }
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'name' => ['required','string','max:255'],
            'description' => ['nullable','string'],
        ]);

        try {
            $course->update($validated);
            return redirect()->route('courses.index')->with('success','Course updated successfully.');
        } catch (\Throwable $e) {
            report($e);
            return back()->withInput()->with('error','Failed to update course. Please try again.');
        }
    }

    public function destroy(Course $course)
    {
        try {
            $course->delete();
            return redirect()->route('courses.index')->with('success','Course deleted successfully.');
        } catch (\Throwable $e) {
            report($e);
            return back()->with('error','Failed to delete course. Please try again.');
        }
    }
}

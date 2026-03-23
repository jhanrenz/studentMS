<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->get();
        return view('courses.index',compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50'
        ]);
        Course::create([
            'name' => $request->name,
        ]);
        return redirect()->route('courses.index')->with('success', 'courses created successfully');
    }

    public function edit(Course $course)
    {
        return view('courses.edit',compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|string|max:50'
        ]);
        $course->update([
            'name' => $request->name,
        ]);
        return redirect()->route('courses.index')->with('success', 'course updated successfully');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'course deleted success');
    }
}

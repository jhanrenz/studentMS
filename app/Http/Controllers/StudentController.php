<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('course')->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('students.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Image upload
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/students'), $imageName);

        Student::create([
            'course_id' => $request->course_id,
            'name' => $request->name,
            'email' => $request->email,
            'image' => $imageName,
        ]);

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }


    public function edit(Student $student)
    {
        $courses = Course::all();
        return view('students.edit', compact('student', 'courses'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/students'), $imageName);
            $student->image = $imageName;
        }

        $student->update([
            'course_id' => $request->course_id,
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }

    public function dashboard()
    {
        return view('students.dashboard');
    }
}
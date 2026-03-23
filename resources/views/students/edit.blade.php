@extends('layouts.app')

@section('content')

<h4>Edit Student</h4>

<form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Course</label>
        <select name="course_id" class="form-control">
            @foreach($courses as $course)
                <option value="{{ $course->id }}" {{ $student->course_id == $course->id ? 'selected' : '' }}>
                    {{ $course->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" value="{{ $student->name }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" value="{{ $student->email }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Current Image</label><br>
        <img src="{{ asset('images/students/'.$student->image) }}" width="100">
    </div>

    <div class="mb-3">
        <label>Change Image</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button class="btn btn-primary">Update</button>

</form>

@endsection